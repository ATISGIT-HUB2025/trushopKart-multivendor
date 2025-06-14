<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Models\About;
use App\Models\PrivacyPolicy;
use App\Models\Center;
use App\Models\Complaint;
use App\Models\EmailConfiguration;
use App\Models\ExamCategory;
use App\Models\RazorpaySetting;
use App\Models\PackagePrice;
use App\Models\TermsAndCondition;
use App\Models\Shopstory;
use App\Models\Licensingagreements;
use App\Models\PhotoShop;
use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;
use App\Models\Awards;
use App\Models\Certificates;
use App\Models\PressRelease;

class PageController extends Controller
{
    public function about()
    {
        $about = About::first();
        return view('frontend.pages.about', compact('about'));
    }
    public function shop_story()
    {
        $shopstory = Shopstory::first();
        return view('frontend.pages.shop_story',compact('shopstory'));
    }
    
    public function awards(){
    $data = Awards::where('status','1')->get();
    return view('frontend.pages.awards',compact('data'));
    }

    public function certificates(){
    $data = Certificates::where('status','1')->get();
    return view('frontend.pages.certificates',compact('data'));
    }

    public function privacypolicy(){
        $data = PrivacyPolicy::first();
    return view('frontend.pages.privacypolicy',compact('data'));
    }

    public function media_room(){
    $data = PressRelease::where('status','1')->get();
    $photo = PhotoShop::where('status','1')->get();
    return view('frontend.pages.mediaroom',compact('data','photo'));
    }

    public function licensing_agreements(){
    $data = Licensingagreements::where('status','1')->get();
    return view('frontend.pages.licensingagreements',compact('data'));
    }

    public function termsAndCondition()
    {
        $terms = TermsAndCondition::first();
        return view('frontend.pages.terms-and-condition', compact('terms'));
    }
    public function admissionCondition()
    {
        $terms = TermsAndCondition::first();
        return view('frontend.pages.admission-condition', compact('terms'));
    }

    public function allExamCategoryView()
    {
        $examCategories = ExamCategory::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('frontend.pages.allExamCategoryView', compact('examCategories'));
    }

    // public function typeOfExam()
    // {

    //     return view('frontend.pages.typeOfExam' );
    // }

    public function typeOfExam(Request $request)
    {
echo 120;die;

// In PageController@typeOfExam
Log::info('Type of exam request', [
    'has_admission_data' => Session::has('admission_data'),
    'session_id' => Session::getId()
]);



        if (!Session::has('admission_data')) {
            return redirect()->route('exam-category');
        }


        if ($request->isMethod('post')) {
            $examType = $request->exam_type;
            $price = DB::table('package_price')->where('package_name', $examType)->first();

            $baseFee = isset($price->price) ? (float)str_replace(',', '', $price->price) : 500; // Base admission fee

            $additionalFee = match ($examType) {
                'complete' => 200,
                'guide' => 100,
                'practice' => 50,
                'basic' => 25
            };

            Session::put('admission_fee', [
                'base_fee' => $baseFee,
                'additional_fee' => $additionalFee,
                'total_fee' => $baseFee + $additionalFee,
                'discount'=> 0,
                'exam_type' => $examType
            ]);

            
            Session::put('admission_data', array_merge(Session::get('admission_data', []), [
                'base_fee' => $baseFee,
                'additional_fee' => $additionalFee,
                'total_fee' => $baseFee + $additionalFee,
                'discount' => 0,
                'exam_type' => $examType,
                'selected_exam'=>'General Exam',
                'admission_fee'=>$baseFee,
                'payment_status'=>'pending'
            ]));

            $data =  Session::get('admission_data');
        // echo "<pre>"; print_r($data);die;
       Admission::create($data);

            return redirect()->route('admission.payment');
        }
       

        $packages = DB::table('package_price')->get();
        return view('frontend.pages.typeOfExam', compact('packages'));
    }

    public function set_discounted_total(Request $request){



            $examType = $request->exam_type;

            $price = DB::table('package_price')->where('package_name', $examType)->first();
            $baseFee = isset($price->price) ? (float)str_replace(',', '', $price->price) : 500; // Base admission fee

            $additionalFee = match ($examType) {
                'complete' => 200,
                'guide' => 100,
                'practice' => 50,
                default => 0
            };

            Session::put('admission_fee', [
                'base_fee' => $baseFee,
                'additional_fee' => $additionalFee,
                'total_fee' => $request->discounted_total,
                'discount'=> $request->discount,
                'exam_type' => $examType
            ]);

            
        

    }



    public function AdmissionSuccess()
    {

        return view('frontend.pages.AdmissionSuccess');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function handleContactForm(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'max:200'],
            'message' => ['required', 'max:1000']
        ]);

        $setting = EmailConfiguration::first();

        Mail::to($setting->email)->send(new Contact($request->subject, $request->message, $request->email));

        return response(['status' => 'success', 'message' => 'Mail sent successfully!']);
    }


    public function recheck()
    {
        return view('frontend.pages.recheck');
    }

    // public function submitRecheck(Request $request)
    // {
    //     $request->validate([
    //         'subject' => 'required|string|max:255',
    //         'message' => 'required|string',
    //         'barcode' => 'nullable|string|max:255',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    //     ]);

    //     $data = [
    //         'subject' => $request->subject,
    //         'message' => $request->message,
    //         'barcode' => $request->barcode
    //     ];

    //     // Handle file upload before session storage
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('uploads/complaints'), $imageName);
    //         $data['image'] = 'uploads/complaints/' . $imageName;
    //     }

    //     Session::put('recheck_data', $data);

    //     $amount = 100; // Amount in INR
    //     $razorpaySetting = RazorpaySetting::first();
    //     $api = new Api($razorpaySetting->razorpay_key, $razorpaySetting->razorpay_secret_key);


    //     $order = $api->order->create([
    //         'amount' => $amount * 100,
    //         'currency' => 'INR',
    //         'payment_capture' => 1
    //     ]);

    //     return view('frontend.pages.recheck-payment', [
    //         'order' => $order,
    //         'amount' => $amount
    //     ]);
    // }

    public function submitRecheck(Request $request)
{
    $request->validate([
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
        'barcode' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'tnxid' => 'nullable|string|max:255',
        'payment_proof' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $data = [
        'subject' => $request->subject,
        'message' => $request->message,
        'barcode' => $request->barcode,
        'tnxid' => $request->tnxid,
        'user_id' => auth()->check() ? auth()->id() : null,
        'status' => 'pending'
    ];

    // Handle complaint image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = 'complaint_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/complaints'), $imageName);
        $data['image'] = 'uploads/complaints/' . $imageName;
    }

    // Handle payment proof image upload
    if ($request->hasFile('payment_proof')) {
        $paymentProof = $request->file('payment_proof');
        $proofName = 'payment_' . time() . '.' . $paymentProof->getClientOriginalExtension();
        $paymentProof->move(public_path('uploads/payments'), $proofName);
        $data['payment_proof'] = 'uploads/payments/' . $proofName;
    }

    // Create complaint directly
    Complaint::create($data);
    
    // Set success message
    Session::put('recheck_success', true);
    
    return redirect()->route('recheck.success');
}


    // public function recheckSuccess()
    // {
    //     if (!Session::has('recheck_success')) {
    //         return redirect()->route('recheck');
    //     }
    //     Session::forget('recheck_success');
    //     return view('frontend.pages.recheck-success');
    // }

    public function recheckSuccess()
{
    if (!Session::has('recheck_success')) {
        return redirect()->route('recheck');
    }
    Session::forget('recheck_success');
    return view('frontend.pages.recheck-success');
}



    public function handleRecheckPayment(Request $request)
    {
        $razorpaySetting = RazorpaySetting::first();
        $api = new Api($razorpaySetting->razorpay_key, $razorpaySetting->razorpay_secret_key);

        try {
            $payment = $api->payment->fetch($request->razorpay_payment_id);

            if ($payment->status === 'captured') {
                $data = Session::get('recheck_data');

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/complaints'), $imageName);
                    $data['image'] = 'uploads/complaints/' . $imageName;
                }

                Complaint::create($data);
                Session::forget('recheck_data');
                Session::put('recheck_success', true);

                return redirect()->route('recheck.success');
            }
        } catch (\Exception $e) {
            toastr()->error('Payment failed. Please try again.');
            return redirect()->route('recheck');
        }
    }
}
