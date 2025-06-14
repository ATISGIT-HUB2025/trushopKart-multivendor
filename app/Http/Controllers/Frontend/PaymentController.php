<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\CodSetting;
use App\Models\Exam;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\PaypalSetting;
use App\Models\Product;
use App\Models\RazorpaySetting;
use App\Models\StripeSetting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Charge;
use Stripe\Stripe;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function index()
    {
        if(!Session::has('address')){
            return redirect()->route('user.checkout');
        }
        return view('frontend.pages.payment');
    }

    public function paymentSuccess()
    {
        return view('frontend.pages.payment-success');
    }

    public function storeOrder($paymentMethod, $paymentStatus, $transactionId, $paidAmount, $paidCurrencyName)
    {
        $setting = GeneralSetting::first();

        $order = new Order();
        $order->invocie_id = rand(1, 999999);
        $order->user_id = Auth::user()->id;
        $order->sub_total = getCartTotal();
        $order->amount =  getFinalPayableAmount();
        $order->currency_name = $setting->currency_name;
        $order->currency_icon = $setting->currency_icon;
        $order->product_qty = \Cart::content()->count();
        $order->payment_method = $paymentMethod;
        $order->payment_status = $paymentStatus;
        $order->order_address = json_encode(Session::get('address'));
        $order->shpping_method = json_encode(Session::get('shipping_method'));
        $order->coupon = json_encode(Session::get('coupon'));
        $order->order_status = 'pending';
        $order->save();

        // store order products
        foreach(\Cart::content() as $item){
            $product = Product::find($item->id);
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->id;
            $orderProduct->vendor_id = $product->vendor_id;
            $orderProduct->product_name = $product->name;
            $orderProduct->variants = json_encode($item->options->variants);
            $orderProduct->variant_total = $item->options->variants_total;
            $orderProduct->unit_price = $item->price;
            $orderProduct->qty = $item->qty;
            $orderProduct->save();

            // update product quantity
            $updatedQty = ($product->qty - $item->qty);
            $product->qty = $updatedQty;
            $product->save();
        }

        // store transaction details
        $transaction = new Transaction();
        $transaction->order_id = $order->id;
        $transaction->transaction_id = $transactionId;
        $transaction->payment_method = $paymentMethod;
        $transaction->amount = getFinalPayableAmount();
        $transaction->amount_real_currency = $paidAmount;
        $transaction->amount_real_currency_name = $paidCurrencyName;
        $transaction->save();

    }

    protected function handleAdmissionPayment($paymentMethod, $transactionId)
    {
        $admissionData = Session::get('admission_data');
        
        $admission = Admission::create([
            ...$admissionData,
            'payment_status' => 'completed',
            'transaction_id' => $transactionId,
            'status' => 'pending'
        ]);
    
        Session::forget(['admission_data', 'admission_fee']);
        
        return redirect()->route('admission.success');
    }


    public function clearSession()
    {
        \Cart::destroy();
        Session::forget('address');
        Session::forget('shipping_method');
        Session::forget('coupon');
    }


    public function paypalConfig()
    {
        $paypalSetting = PaypalSetting::first();
        $config = [
            'mode'    => $paypalSetting->mode === 1 ? 'live' : 'sandbox',
            'sandbox' => [
                'client_id'         => $paypalSetting->client_id,
                'client_secret'     => $paypalSetting->secret_key,
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => $paypalSetting->client_id,
                'client_secret'     => $paypalSetting->secret_key,
                'app_id'            => '',
            ],

            'payment_action' => 'Sale',
            'currency'       => $paypalSetting->currency_name,
            'notify_url'     => '',
            'locale'         => 'en_US',
            'validate_ssl'   =>  true,
        ];
        return $config;
    }

    /** Paypal redirect */
    public function payWithPaypal()
    {
        $config = $this->paypalConfig();
        $paypalSetting = PaypalSetting::first();

        $provider = new PayPalClient($config);
        $provider->getAccessToken();


        // calculate payable amount depending on currency rate
        $total = getFinalPayableAmount();
        $payableAmount = round($total*$paypalSetting->currency_rate, 2);


        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('user.paypal.success'),
                "cancel_url" => route('user.paypal.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => $config['currency'],
                        "value" => $payableAmount
                    ]
                ]
            ]
        ]);

        if(isset($response['id']) && $response['id'] != null){
            foreach($response['links'] as $link){
                if($link['rel'] === 'approve'){
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('user.paypal.cancel');
        }

    }

    public function paypalSuccess(Request $request)
    {
        $config = $this->paypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            // calculate payable amount depending on currency rate
            $paypalSetting = PaypalSetting::first();
            $total = getFinalPayableAmount();
            $paidAmount = round($total*$paypalSetting->currency_rate, 2);

            $this->storeOrder('paypal', 1, $response['id'], $paidAmount, $paypalSetting->currency_name);

            // clear session
            $this->clearSession();

            return redirect()->route('user.payment.success');
        }

        return redirect()->route('user.paypal.cancel');
    }

    public function paypalCancel()
    {
        toastr('Someting went wrong try agin later!', 'error', 'Error');
        return redirect()->route('user.payment');
    }


    /** Stripe Payment */

    public function payWithStripe(Request $request)
    {

        // calculate payable amount depending on currency rate
        $stripeSetting = StripeSetting::first();
        $total = getFinalPayableAmount();
        $payableAmount = round($total * $stripeSetting->currency_rate, 2);

        Stripe::setApiKey($stripeSetting->secret_key);
       $response = Charge::create([
            "amount" => $payableAmount * 100,
            "currency" => $stripeSetting->currency_name,
            "source" => $request->stripe_token,
            "description" => "product purchase!"
        ]);

        if($response->status === 'succeeded'){
            $this->storeOrder('stripe', 1, $response->id, $payableAmount, $stripeSetting->currency_name);
            // clear session
            $this->clearSession();

            return redirect()->route('admission-success');
        }else {
            toastr('Someting went wrong try agin later!', 'error', 'Error');
            return redirect()->route('payment');
        }

    }

    public function reexamPayment($exam_id)
{
    $exam = Exam::findOrFail($exam_id);
    $payment_type = 'reexam';
    $reexam_fee = 200; // Set re-exam fee
    
    return view('frontend.pages.payment', compact('payment_type', 'reexam_fee', 'exam'));
}


public function handleReexamPayment(Request $request)
{
    $razorPaySetting = RazorpaySetting::first();
    $api = new Api($razorPaySetting->razorpay_key, $razorPaySetting->razorpay_secret_key);

    try {
        if($request->has('razorpay_payment_id')) {
            $payment = $api->payment->fetch($request->razorpay_payment_id);
            $response = $payment->capture(['amount' => $payment->amount]);

            if($response['status'] == 'captured') {
                session(['reexam_transaction_id' => $response['id']]);
                
                // Get exam_id from request
                $examId = $request->exam_id;
                
                return redirect()->route('quiz-instraction', ['exam_id' => $examId]);
            }
        }
    } catch(\Exception $e) {
        \Log::error('Razorpay Reexam Payment Error:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
    }
}



    /** Razorpay payment */
  
    

    /** pay with cod */
   
   
    public function payWithRazorPay(Request $request)
    {
        $razorPaySetting = RazorpaySetting::first();
        $api = new Api($razorPaySetting->razorpay_key, $razorPaySetting->razorpay_secret_key);
    
        // Check if this is an admission payment
        if(Session::has('admission_data')) {
            return $this->handleRazorpayAdmissionPayment($request, $api);
        }
        
        // Handle regular product purchase payment
        return $this->handleRazorpayProductPayment($request, $api);
    }
    
    private function handleRazorpayAdmissionPayment($request, $api)
    {
        $admissionData = Session::get('admission_data');
        $admissionFee = Session::get('admission_fee');

        // Log::info('Admission Data:', ['data' => $admissionData]);
    
        try {
            if($request->has('razorpay_payment_id')) {
                $payment = $api->payment->fetch($request->razorpay_payment_id);
                $response = $payment->capture(['amount' => $payment->amount]);
    
                if($response['status'] == 'captured') {
                    $admission = Admission::create([
                        'full_name' => $admissionData['full_name'],
                        'date_of_birth' => $admissionData['date_of_birth'],
                        'division' => $admissionData['division'],
                        'sr_no' => $admissionData['sr_no'],
                        'udise_no_school' => $admissionData['udise_no_school'],
                        // 'paper_1' => $admissionData['paper_1'],
                        // 'paper_2' => $admissionData['paper_2'],
                        'district' => $admissionData['district'],
                        'taluka' => $admissionData['taluka'],
                        'cluster' => $admissionData['cluster'],
                        'school_name' => $admissionData['school_name'],
                        'medium' => $admissionData['medium'],
                        'standard' => $admissionData['standard'],
                        'email' => $admissionData['email'],
                        // 'center_id' => $admissionData['center_id'],
                        'gender' => $admissionData['gender'],
                        'user_type' => $admissionData['user_type'],
                        'parent_mobile' => $admissionData['parent_mobile'],
                        'teacher_mobile' => $admissionData['teacher_mobile'],
                        'photo' => $admissionData['photo'] ?? null,
                        'selected_exam' => $admissionData['selected_exam'] ?? 'General Exam',
                        'exam_type' => $admissionFee['exam_type'],
                        'admission_fee' => $admissionFee['base_fee'],
                        'additional_fee' => $admissionFee['additional_fee'],
                        'total_fee' => $admissionFee['total_fee'],
                        'payment_status' => 'completed',
                        'transaction_id' => $response['id'],
                        'status' => 'pending'
                    ]);
    
                    Session::forget(['admission_data', 'admission_fee']);
                    return redirect()->route('admission.success');
                }
            }
        } catch(\Exception $e) {
            \Log::error('Razorpay Payment Error:', [
                'error' => $e->getMessage(),
                'admission_data' => $admissionData
            ]);
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
    
    private function handleRazorpayProductPayment($request, $api)
    {
        $razorPaySetting = RazorpaySetting::first();
        
        try {
            if($request->has('razorpay_payment_id')) {
                $payment = $api->payment->fetch($request->razorpay_payment_id);
                $response = $payment->capture(['amount' => $payment->amount]);
    
                if($response['status'] == 'captured') {
                    $this->storeOrder(
                        'razorpay',
                        1,
                        $response['id'],
                        getFinalPayableAmount(),
                        $razorPaySetting->currency_name
                    );
    
                    $this->clearSession();
                    return redirect()->route('user.payment.success');
                }
            }
        } catch(\Exception $e) {
            \Log::error('Razorpay Product Payment Error:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    
        return redirect()->back()->with('error', 'Invalid payment session');
    }
    
    
    
    public function payWithCod(Request $request)
    {
        $codPaySetting = CodSetting::first();
        $setting = GeneralSetting::first();
        if($codPaySetting->status == 0){
            return redirect()->back();
        }

        // amount calculation
       $total = getFinalPayableAmount();
       $payableAmount = round($total, 2);


        $this->storeOrder('COD', 0, \Str::random(10), $payableAmount, $setting->currency_name);
        // clear session
        $this->clearSession();

        return redirect()->route('user.payment.success');
            

    }

}