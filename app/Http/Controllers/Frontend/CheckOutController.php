<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ShippingRule;
use App\Models\UserAddress;
use App\Models\GeneralSetting;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Product;
use App\Models\MRewardPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{   
    public function index()
    {   
        $productId = session('selected_product_id');
        if(!$productId){
            toastr('Someting went wrong try agin later!', 'error', 'Error');
            return redirect('/'); 
        }
        $product = \App\Models\Product::find($productId);
        $addresses = UserAddress::where('user_id', Auth::user()->id)->get();
        $shippingMethods = ShippingRule::where('status', 1)->get();
        return view('frontend.pages.checkout', compact('addresses', 'shippingMethods','product'));
    }

    public function createAddress(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'phone' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'country' => ['required', 'max: 200'],
            'state' => ['required', 'max: 200'],
            'city' => ['required', 'max: 200'],
            'zip' => ['required', 'max: 200'],
            'address' => ['required', 'max: 200']
        ]);

        $address = new UserAddress();
        $address->user_id = Auth::user()->id;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->email = $request->email;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->address = $request->address;
        $address->save();

        toastr('Address created successfully!', 'success', 'Success');

        return redirect()->back();

    }

    // public function checkOutFormSubmit(Request $request)
    // {
    //    $request->validate([
    //     'shipping_method_id' => ['required', 'integer'],
    //     'shipping_address_id' => ['required', 'integer'],
    //    ]);

    //    $shippingMethod = ShippingRule::findOrFail($request->shipping_method_id);
    //    if($shippingMethod){
    //        Session::put('shipping_method', [
    //             'id' => $shippingMethod->id,
    //             'name' => $shippingMethod->name,
    //             'type' => $shippingMethod->type,
    //             'cost' => $shippingMethod->cost
    //        ]);
    //    }
    //    $address = UserAddress::findOrFail($request->shipping_address_id)->toArray();
    //    if($address){
    //        Session::put('address', $address);
    //    }

    //    return response(['status' => 'success', 'redirect_url' => route('user.payment')]);
    // }

    

// public function checkOutFormSubmit(Request $request)
// {
//     $request->validate([
//         'payment_method' => ['required', 'string'],
//         'shipping_address_id' => ['required', 'integer'],
//     ]);

//     $paymentMethod = $request->payment_method;
//     Session::put('payment_method', $paymentMethod);

//     $address = UserAddress::findOrFail($request->shipping_address_id)->toArray();
//     if ($address) {
//         Session::put('address', $address);
//     }

//     $productId = session('selected_product_id');
//     if (!$productId) {
//         return response([
//             'status' => 'error',
//             'message' => 'Something went wrong. Try again later!',
//         ]);
//     }

//     $product = \App\Models\Product::find($productId);
//     if (!$product) {
//         return response([
//             'status' => 'error',
//             'message' => 'Product not found!',
//         ]);
//     }

//     $user = Auth::user();

//     // 🧮 Common setup
//     $gst = 0;
//     $basePrice = 0;
//     $total = 0;


//     if ($paymentMethod === 'inr') {
//         $basePrice = $product->offer_price ?? $product->price;
//         $redeemPoints = 0;
//         // 🔁 Check if MPoint redemption is active
//         if (Session::get('redeem_active')) {
//             $redeemPoints = Session::get('redeem_points', 0);
//             $redeemValue = Session::get('redeem_value', 0);


//              if ($redeemPoints > 0) {
//         $user = Auth::user();

//         // Deduct from wallet
//         $user->wallet_points = max(0, $user->wallet_points - $redeemPoints);
//         $user->save();

//         // Optional: Log the transaction
//         \App\Models\MRewardPoint::create([
//             'transaction_id' => rand(),
//             'user_id' => $user->id,
//             'points' => $redeemPoints,
//             'point_rate' => \App\Models\GeneralSetting::first()->mpoint_value ?? 1.5,
//             'type' => 'debit',
//             'status' => 'approved',
//             'note' => 'Redeemed on checkout',
//         ]);

//         // Clear session values after deduction
//         // Session::forget(['redeem_active', 'redeem_points', 'redeem_value']);
        

//             // Apply discount to base price
//             $basePrice = max(0, $basePrice - $redeemValue);
//         }

//         $gst = round($basePrice * 0.18, 2);
//         $total = round($basePrice + $gst, 2);
//     }

//      if (Session::get('referral_redeem_active')) {
//         $redeemValue = Session::get('referral_redeem_value', 0);
//         $basePrice = max(0, $basePrice - $redeemValue);
//         // Optional: Log the transaction for referral redemption
//         \App\Models\ReferralRedemption::create([
//             'user_id' => $user->id,
//             'redeem_value' => $redeemValue,
//             'status' => 'approved',
//             'note' => 'Redeemed on checkout',
//         ]);
//         // Clear session values after deduction
//         Session::forget(['referral_redeem_active', 'referral_redeem_value']);

//      }


//       $gst = round($basePrice * 0.18, 2);
//         $total = round($basePrice + $gst, 2);
        
//     } else {
//         // 🪙 Paid using points
//         $basePrice = $product->coin_price;
//         $gst = 0;
//         $total = $basePrice;
//         $redeemPoints = 0;
//         // 🔁 Clear any redeem session since not using INR
//         // Session::forget(['redeem_active', 'redeem_points', 'redeem_value']);
//     }

//     return response([
//         'status' => 'success',
//         'payment_method' => $paymentMethod,
//         'redirect_url' => route('user.payment'),
//         'price' => number_format($total, 2),
//         'base' => number_format($basePrice, 2),
//         'gst' => number_format($gst, 2),
//         'redeempoints' => $redeemPoints,
//     ]);


// }


// public function checkOutFormSubmit(Request $request)
// {
//     $request->validate([
//         'payment_method' => ['required', 'string'],
//         'shipping_address_id' => ['required', 'integer'],
//     ]);

//     $paymentMethod = $request->payment_method;
//     Session::put('payment_method', $paymentMethod);

//     $address = UserAddress::findOrFail($request->shipping_address_id)->toArray();
//     if ($address) {
//         Session::put('address', $address);
//     }

//     $productId = session('selected_product_id');
//     if (!$productId) {
//         return response([
//             'status' => 'error',
//             'message' => 'Something went wrong. Try again later!',
//         ]);
//     }

//     $product = \App\Models\Product::find($productId);
//     if (!$product) {
//         return response([
//             'status' => 'error',
//             'message' => 'Product not found!',
//         ]);
//     }

//     $user = Auth::user();

//     // Start with original base price
//     $basePrice = $product->offer_price ?? $product->price;
//     $originalBasePrice = $basePrice;

//     $mpointRedeemPoints = 0;
//     $mpointRedeemValue = 0;
//     $referralRedeemValue = 0;

//     if ($paymentMethod === 'inr') {

//         // Step 1: Apply MPoint Redemption
//         if (Session::get('redeem_active')) {
//             $mpointRedeemPoints = Session::get('redeem_points', 0);
//             $mpointRedeemValue = Session::get('redeem_value', 0);

//             if ($mpointRedeemPoints > 0 && $mpointRedeemValue > 0) {
//                 // Deduct from wallet
//                 $user->wallet_points = max(0, $user->wallet_points - $mpointRedeemPoints);
//                 $user->save();

//                 // Log MPoint debit transaction
//                 \App\Models\MRewardPoint::create([
//                     'transaction_id' => rand(),
//                     'user_id' => $user->id,
//                     'points' => $mpointRedeemPoints,
//                     'point_rate' => \App\Models\GeneralSetting::first()->mpoint_value ?? 1.5,
//                     'type' => 'debit',
//                     'status' => 'approved',
//                     'note' => 'MPoint redeemed on checkout',
//                 ]);

//                 $basePrice = max(0, $basePrice - $mpointRedeemValue);
//                 // Clear session
//                 Session::forget(['redeem_active', 'redeem_points', 'redeem_value']);
//             }
//         }

//         // Step 2: Apply Referral Redemption
//         if (Session::get('referral_redeem_active')) {
//             $referralRedeemValue = Session::get('referral_redeem_value', 0);

//             if ($referralRedeemValue > 0) {
//                 // Log referral redemption
//                 \App\Models\MRewardPoint::create([
//                     'transaction_id' => rand(),
//                     'user_id' => $user->id,
//                     'points' => $referralRedeemValue,
//                     'point_rate' => \App\Models\GeneralSetting::first()->mpoint_value ?? 1.5,
//                     'type' => 'debit',
//                     'status' => 'approved',
//                     'note' => 'referral_bonus',
//                 ]);

//                 $basePrice = max(0, $basePrice - $referralRedeemValue);
//                 // Clear session
//                 Session::forget(['referral_redeem_active', 'referral_redeem_value']);
//             }
//         }

//         // Step 3: Calculate GST and Total
//         $gst = round($basePrice * 0.18, 2);
//         $total = round($basePrice + $gst, 2);

//     } else {
//         // If using points for full product purchase
//         $basePrice = $product->coin_price;
//         $gst = 0;
//         $total = $basePrice;
//     }

//     return response([
//         'status' => 'success',
//         'payment_method' => $paymentMethod,
//         'redirect_url' => route('user.payment'),
//         'price' => number_format($total, 2),
//         'base' => number_format($basePrice, 2),
//         'gst' => number_format($gst, 2),
//         'mpoints_used' => $mpointRedeemPoints,
//         'mpoints_value' => number_format($mpointRedeemValue, 2),
//         'referral_used' => number_format($referralRedeemValue, 2),
//         'original_price' => number_format($originalBasePrice, 2),
//     ]);
// }


public function checkOutFormSubmit(Request $request)
{
    $request->validate([
        'payment_method' => ['required', 'string'],
        'shipping_address_id' => ['required', 'integer'],
    ]);

    $paymentMethod = $request->payment_method;
    Session::put('payment_method', $paymentMethod);

    $address = UserAddress::findOrFail($request->shipping_address_id)->toArray();
    if ($address) {
        Session::put('address', $address);
    }

    $productId = session('selected_product_id');
    if (!$productId) {
        return response([
            'status' => 'error',
            'message' => 'Something went wrong. Try again later!',
        ]);
    }

    $product = \App\Models\Product::find($productId);
    if (!$product) {
        return response([
            'status' => 'error',
            'message' => 'Product not found!',
        ]);
    }

    $user = Auth::user();

    $basePrice = $product->offer_price ?? $product->price;
    $gst = 0;
    $total = 0;
    $redeemPoints = 0;
    $referralRedeemValue = 0;

    if ($paymentMethod === 'inr') {

        // 🔸 1. Apply MPoint Redeem
        // if (Session::get('redeem_active')) {
        //     $redeemPoints = Session::get('redeem_points', 0);
        //     $redeemValue = Session::get('redeem_value', 0);

        //     if ($redeemPoints > 0) {
        //         // Deduct MPoints from user
        //         $user->wallet_points = max(0, $user->wallet_points - $redeemPoints);
        //         $user->save();

        //         // Log MPoint transaction
        //       $mpointReedemDebit =  \App\Models\MRewardPoint::create([
        //             'transaction_id' => rand(),
        //             'user_id' => $user->id,
        //             'points' => $redeemPoints,
        //             'point_rate' => \App\Models\GeneralSetting::first()->mpoint_value ?? 1.5,
        //             'type' => 'debit',
        //             'status' => 'pending',
        //             'note' => 'Redeemed on checkout',
        //         ]);

        //          session([
        //             'mpointReedemDebit' => $mpointReedemDebit,
        //         ]);

        //         $basePrice = max(0, $basePrice - $redeemValue);
        //     }
        // }


        if (Session::get('redeem_active')) {
    $redeemPoints = Session::get('redeem_points', 0);
    $redeemValue = Session::get('redeem_value', 0);

    if ($redeemPoints > 0) {
        // Deduct MPoints from user
        $user->wallet_points = max(0, $user->wallet_points - $redeemPoints);
        $user->save();

        $effectivePointRate = $user->getEffectiveMPointRate();

        $mpointReedemDebit = \App\Models\MRewardPoint::create([
            'transaction_id' => rand(),
            'user_id' => $user->id,
            'points' => $redeemPoints,
            'point_rate' => $effectivePointRate,
            'type' => 'debit',
            'status' => 'pending',
            'rupees' => $redeemValue ?? 0,
            'note' => 'Redeemed on checkout',
        ]);

        session([
            'mpointReedemDebit' => $mpointReedemDebit,
        ]);

        $basePrice = max(0, $basePrice - $redeemValue);
    }
}
        if (Session::get('referral_redeem_active')) {
            $referralRedeemValue = Session::get('referral_redeem_value', 0);
            $basePrice = max(0, $basePrice - $referralRedeemValue);
            
           $reward = \App\Models\MRewardPoint::create([
                    'transaction_id' => rand(),
                    'user_id' => $user->id,
                    'points' => $referralRedeemValue,
                    'point_rate' => \App\Models\GeneralSetting::first()->mpoint_value ?? 1.5,
                    'type' => 'debit',
                    'status' => 'pending',
                    'rupees' => $referralRedeemValue ?? 0,
                    'note' => 'referral_bonus',
            ]);

           session([
            'rewardData' => $reward,
        ]);
        }

        $gst = round($basePrice * 0.18, 2);
        $total = round($basePrice + $gst, 2);
    } else {
        $basePrice = $product->coin_price;
        $gst = 0;
        $total = $basePrice;
        $redeemPoints = 0;
        Session::forget(['redeem_active', 'redeem_points', 'redeem_value']);
        Session::forget(['referral_redeem_active', 'referral_redeem_value']);
    }
    return response([
        'status' => 'success',
        'payment_method' => $paymentMethod,
        'redirect_url' => route('user.payment'),
        'price' => number_format($total, 2),
        'base' => number_format($basePrice, 2),
        'gst' => number_format($gst, 2),
        'redeempoints' => $redeemPoints,
        'referral_value' => $referralRedeemValue,
    ]);
}


public function updateCheckout(Request $request)
{
    $request->validate([
        'payment_method' => ['required', 'string'],
        'shipping_address_id' => ['required', 'integer'],
    ]);

    $paymentMethod = $request->payment_method;
    Session::put('payment_method', $paymentMethod);

    $address = UserAddress::findOrFail($request->shipping_address_id)->toArray();
    if ($address) {
        Session::put('address', $address);
    }

    $productId = session('selected_product_id');
    if (!$productId) {
        return response([
            'status' => 'error',
            'message' => 'Something went wrong. Try again later!',
        ]);
    }

    $product = \App\Models\Product::find($productId);
    if (!$product) {
        return response([
            'status' => 'error',
            'message' => 'Product not found!',
        ]);
    }

    $user = Auth::user();

    // Base price from offer_price or price
    $basePrice = $product->offer_price ?? $product->price;
    $gst = 0;
    $total = 0;
    $redeemPoints = 0;
    $redeemValue = 0;
    $referralRedeemValue = 0;

    if ($paymentMethod === 'inr') {

        // 1. Apply MPoint Redeem if active and not already processed
        if (Session::get('redeem_active') && !Session::has('mpointRedeemProcessed')) {
            $redeemPoints = Session::get('redeem_points', 0);
            $redeemValue = Session::get('redeem_value', 0);

            if ($redeemPoints > 0 && $redeemValue > 0) {
                // Deduct wallet points safely
                $user->wallet_points = max(0, $user->wallet_points - $redeemPoints);
                $user->save();

                $pointRate = \App\Models\GeneralSetting::first()->mpoint_value ?? 1.5;

                $mpointRedeemDebit = \App\Models\MRewardPoint::create([
                    'transaction_id' => rand(),
                    'user_id' => $user->id,
                    'points' => $redeemPoints,
                    'point_rate' => $pointRate,
                    'type' => 'debit',
                    'status' => 'pending',
                    'rupees' => $redeemValue ?? 0,
                    'note' => 'Redeemed on checkout',
                ]);

                Session::put('mpointRedeemProcessed', true);
                Session::put('mpointReedemDebit', $mpointRedeemDebit);

                // Deduct redeem value from base price
                $basePrice = max(0, $basePrice - $redeemValue);
            }
        } else {
            // If MPoint redeem already processed in session, 
            // retrieve values so calculation remains consistent
            $redeemPoints = Session::get('redeem_points', 0);
            $redeemValue = Session::get('redeem_value', 0);
            $basePrice = max(0, $basePrice - $redeemValue);
        }

        // 2. Apply Referral Redeem (always reapply)
        if (Session::get('referral_redeem_active')) {
            $referralRedeemValue = Session::get('referral_redeem_value', 0);
            if ($referralRedeemValue > 0) {
                $basePrice = max(0, $basePrice - $referralRedeemValue);

                // Check if rewardData already stored to avoid duplicate
                if (!Session::has('rewardData')) {
                    $reward = \App\Models\MRewardPoint::create([
                        'transaction_id' => rand(),
                        'user_id' => $user->id,
                        'points' => $referralRedeemValue,
                        'point_rate' => \App\Models\GeneralSetting::first()->mpoint_value ?? 1.5,
                        'type' => 'debit',
                        'status' => 'pending',
                        'rupees' => $referralRedeemValue ?? 0,
                        'note' => 'referral_bonus',
                    ]);

                    Session::put('rewardData', $reward);
                }
            }
        } else {
            $referralRedeemValue = 0;
            Session::forget('rewardData');
        }

        // 3. Calculate GST and total after deductions
        $gst = round($basePrice * 0.18, 2);
        $total = round($basePrice + $gst, 2);

    } else {
        // Payment with MCoins — no MPoint or referral redeem applied
        $basePrice = $product->coin_price;
        $gst = 0;
        $total = $basePrice;
        $redeemPoints = 0;
        $referralRedeemValue = 0;

        // Clear redeem sessions since coins are used
        Session::forget([
            'redeem_active', 'redeem_points', 'redeem_value',
            'mpointRedeemProcessed', 'mpointReedemDebit',
            'referral_redeem_active', 'referral_redeem_value', 'rewardData'
        ]);
    }

    return response([
        'status' => 'success',
        'payment_method' => $paymentMethod,
        'redirect_url' => route('user.payment'),
        'price' => number_format($total, 2),
        'base' => number_format($basePrice, 2),
        'gst' => number_format($gst, 2),
        'redeempoints' => $redeemPoints,
        'referral_value' => $referralRedeemValue,
    ]);
}


// public function checkout_redeem_preview(Request $request)
// {
//     $productId = session('selected_product_id');
//     $product = Product::findOrFail($productId);
//     $user = Auth::user();
//     $redeem = $request->redeem;

//     $basePrice = $product->offer_price ?? $product->price;
//     $coinLimitValue = $product->coin_price; // now treated as value (not point limit)

//     $userPoints = $user->wallet_points ?? 0;
//     $pointRate = GeneralSetting::first()->mpoint_value ?? 1.5;

//     // Max redeemable value allowed (as per product coin_price or base price)
//     $maxRedeemValue = min($coinLimitValue, $basePrice);

//     // Calculate how much value user can redeem based on their point balance
//     $maxUserRedeemValue = floor($userPoints * $pointRate);

//     // Actual redeem value (final value to subtract from price)
//     $redeemValue = $redeem ? min($maxUserRedeemValue, $maxRedeemValue) : 0;

//     // Points used = redeem value ÷ pointRate
//     $usedPoints = $redeem ? ceil($redeemValue / $pointRate) : 0;

//     $finalBase = max(0, $basePrice - $redeemValue);
//     $gst = round($finalBase * 0.18, 2);
//     $total = round($finalBase + $gst, 2);

//     // 🔸 Set or remove redeem session
//     if ($redeem) {
//         session([
//             'redeem_active' => true,
//             'redeem_points' => $usedPoints,
//             'redeem_value' => $redeemValue
//         ]);
//     } else {
//         session()->forget(['redeem_active', 'redeem_points', 'redeem_value']);
//     }

//     return response()->json([
//         'status' => 'success',
//         'base' => number_format($finalBase, 2),
//         'gst' => number_format($gst, 2),
//         'total' => number_format($total, 2),
//         'redeem_info' => $redeem
//     ? "<div class='text-dark'>
//        Redeemed {$redeemValue} MPoints.<br>
//         Remaining MPoints: " . number_format(($userPoints - $usedPoints) * $pointRate, 2) . "
//        </div>"
//     : ''

//     ]);
// }

// public function checkout_redeem_preview(Request $request)
// {
//     $productId = session('selected_product_id');
//     $product = Product::findOrFail($productId);
//     $user = Auth::user();
//     $redeem = $request->redeem;


//     $basePrice = $product->offer_price ?? $product->price;
//     $coinLimitValue = $product->coin_price; // treated as INR value limit for redeem

//     // 🔸 Calculate total INR value of approved MPoint balance from transactions
//     $userRewardValue = $user->mrewardPoints()
//         ->where('status', 'approved')
//         ->where('note', '!=', 'referral_bonus')
//         ->get()
//         ->sum(function ($txn) {
//             $value = $txn->points * $txn->point_rate;
//             return $txn->type === 'credit' ? $value : -$value;
//         });

//     // 🔸 Maximum allowed to redeem is the lower of the coin limit or product price
//     $maxRedeemValue = min($coinLimitValue, $basePrice);

//     // 🔸 Final redeem value (what user will redeem)
//     $redeemValue = $redeem ? min($userRewardValue, $maxRedeemValue) : 0;

//     // 🔸 Calculate total MPoints used (across mixed rates: approximate)
//     $usedPoints = 0;
//     if ($redeem && $redeemValue > 0) {
//         $remaining = $redeemValue;

//         // Process user's transactions in order to estimate how many points were used
//         $transactions = $user->mrewardPoints()
//             ->where('status', 'approved')
//             ->where('note', '!=', 'referral_bonus')
//             ->orderBy('created_at') // older ones first
//             ->get();

//         foreach ($transactions as $txn) {
//             $txnValue = $txn->points * $txn->point_rate;
//             $isCredit = $txn->type === 'credit';
//             $value = $isCredit ? $txnValue : -$txnValue;
            
//             if ($value <= 0) continue;

//             if ($value <= $remaining) {
//                 $usedPoints += $txn->points;
//                 $remaining -= $value;
//             } else {
//                 // Partial usage
//                 $usedPoints += ceil($remaining / $txn->point_rate);
//                 break;
//             }
//         }
//     }


//     $finalBase = max(0, $basePrice - $redeemValue);
//     $gst = round($finalBase * 0.18, 2);
//     $total = round($finalBase + $gst, 2);


//     // 🔸 Set or clear redeem session
//     if ($redeem) {
//         session([
//             'redeem_active' => true,
//             'redeem_points' => $usedPoints,
//             'redeem_value' => $redeemValue
//         ]);
//     } else {
//         session()->forget(['redeem_active', 'redeem_points', 'redeem_value']);
//     }

//     return response()->json([
//         'status' => 'success',
//         'base' => number_format($finalBase, 2),
//         'gst' => number_format($gst, 2),
//         'total' => number_format($total, 2),
//         'redeem_info' => $redeem
//             ? "<div class='text-dark'>
//                 Redeemed ₹" . number_format($redeemValue, 2) . " worth of MPoints.<br>
//                 Remaining MPoints Value: ₹" . number_format($userRewardValue - $redeemValue, 2) . "
//                </div>"
//             : ''
//     ]);
// }


public function checkout_redeem_preview(Request $request)
{
    $productId = session('selected_product_id');
    $product = Product::findOrFail($productId);
    $user = Auth::user();
    $redeem = $request->redeem;

    $basePrice = $product->offer_price ?? $product->price;
    $coinLimitValue = $product->coin_price; // Max INR value allowed to redeem

    // ✅ Get total credit rupees (excluding referral bonus)
    $totalRupeesCredit = $user->mrewardPoints()
        ->where('status', 'approved')
        ->where('type', 'credit')
        ->where('note', '!=', 'referral_bonus')
        ->sum('rupees');

    // ✅ Get total debit rupees
    $totalRupeesDebit = $user->mrewardPoints()
        ->where('status', 'approved')
        ->where('type', 'debit')
        ->where('note', '!=', 'referral_bonus')
        ->sum('rupees');

    // ✅ Available redeemable balance in INR
    $userRewardValue = $totalRupeesCredit - $totalRupeesDebit;

    // ✅ Final redeem value based on allowed max and balance
    $maxRedeemValue = min($coinLimitValue, $basePrice);
    $redeemValue = $redeem ? min($userRewardValue, $maxRedeemValue) : 0;

    // 🔸 Estimate used points just for tracking, based on rupees (optional)
    $usedPoints = 0;
    if ($redeem && $redeemValue > 0) {
        $remaining = $redeemValue;

        // Order by creation for proper deduction
        $transactions = $user->mrewardPoints()
            ->where('status', 'approved')
            ->where('type', 'credit')
            ->where('note', '!=', 'referral_bonus')
            ->orderBy('created_at')
            ->get();

        foreach ($transactions as $txn) {
            if ($txn->rupees <= 0) continue;

            if ($txn->rupees <= $remaining) {
                $usedPoints += $txn->points;
                $remaining -= $txn->rupees;
            } else {
                // Proportional points for remaining value
                $usedPoints += ceil(($remaining / $txn->rupees) * $txn->points);
                break;
            }
        }
    }

    $finalBase = max(0, $basePrice - $redeemValue);
    $gst = round($finalBase * 0.18, 2);
    $total = round($finalBase + $gst, 2);

    // 🔸 Set or clear session
    if ($redeem) {
        session([
            'redeem_active' => true,
            'redeem_points' => $usedPoints,
            'redeem_value' => $redeemValue,
        ]);
    } else {
        session()->forget(['redeem_active', 'redeem_points', 'redeem_value']);
    }

    return response()->json([
        'status' => 'success',
        'base' => number_format($finalBase, 2),
        'gst' => number_format($gst, 2),
        'total' => number_format($total, 2),
        'redeem_info' => $redeem
            ? "<div class='text-dark'>
                Redeemed " . number_format($redeemValue) . "  MVoucher Points.<br>
                Remaining MVoucher Points : " . number_format($userRewardValue - $redeemValue) . "
               </div>"
            : ''
    ]);
}





public function saveneworder(Request $request)
{
    $transaction_id = $request->transaction_id;
    $payment_method = $request->payment_method;


    
    // $request->validate([
    //         'screenshot' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    // ]);


    $screenshotPath = null;
   if ($request->hasFile('screenshot')) {
    $file = $request->file('screenshot');
    $filename = time() . '_' . $file->getClientOriginalName();
    $destinationPath = public_path('screenshots');

    // Ensure the directory exists
    if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0755, true);
    }

    $file->move($destinationPath, $filename);
    $screenshotPath = 'screenshots/' . $filename; // Store this path in DB
}


    $productId = session('selected_product_id');
    $validity_period = session('validity_period');
    $pc_count = session('pc_count');
    $rewardData = session('rewardData');
    $mpointReedemDebit = session('mpointReedemDebit');


    if (!$productId) {
        return redirect()->back()->with('error', 'Something went wrong. Try again later!');
    }

    $product = \App\Models\Product::find($productId);
    if (!$product) {
        return redirect()->back()->with('error', 'Product not found!');
    }

     if ($payment_method === 'inr') {
    $basePrice = $product->offer_price ?? $product->price;

    $redeemValue = 0;
    if (Session::get('redeem_active')) {
        $redeemValue = Session::get('redeem_value', 0);
    }

    $referralRedeemValue = 0;
    if (Session::get('referral_redeem_active')) {
        $referralRedeemValue = Session::get('referral_redeem_value', 0);
    }

    // Total redemption amount (MPoints + Referral)
    $totalRedeem = $redeemValue + $referralRedeemValue;

    // Clamp redeem amount to basePrice
    $totalRedeem = min($totalRedeem, $basePrice);

    // Apply redemption
    $basePriceAfterRedeem = max(0, $basePrice - $totalRedeem);

    // GST on reduced base price
    $gst = round($basePriceAfterRedeem * 0.18, 2);

    // Final total
    $total = round($basePriceAfterRedeem + $gst, 2);
}
 else {
        $basePrice = $product->coin_price;
        $gst = 0;
        $total = $basePrice;
    }

    $setting = GeneralSetting::first();
    $order = new Order();
    $order->invocie_id = rand(1, 999999);
    $order->user_id = Auth::id();
    $order->sub_total = $total;
    $order->amount = $total;
    $order->currency_name = $setting->currency_name;
    $order->transaction_id = $transaction_id;
    $order->currency_icon = $setting->currency_icon;
    $order->product_qty = 1;
    $order->payment_method = $payment_method;
    $order->paidpoints = $request->mypoints ?? 0;
    $order->product_id = $productId;
    $order->payment_status = 'pending';
    $order->order_address = json_encode(Session::get('address'));
    $order->shpping_method = null;
    $order->coupon = null;
    $order->validity_period = $validity_period;
    $order->pc_count = $pc_count;
    $order->screenshot = $screenshotPath;
    $order->order_status = 'pending';
    $order->save();

    // Store transaction details

    if (isset($rewardData) && isset($rewardData->id)) {
        MRewardPoint::where('id', $rewardData->id)->update(['status' => 'approved']);
    }

    if (isset($mpointReedemDebit) && isset($mpointReedemDebit->id)) {
        MRewardPoint::where('id', $mpointReedemDebit->id)->update(['status' => 'approved']);
    }

    $transaction = new Transaction();
    $transaction->order_id = $order->id;
    $transaction->transaction_id = $transaction_id;
    $transaction->payment_method = $payment_method;
    $transaction->amount = $total;
    $transaction->amount_real_currency = $total;
    $transaction->amount_real_currency_name = $setting->currency_name;
    $transaction->save();

    // Session::forget(['redeem_active', 'redeem_points', 'redeem_value']);
    Session::forget([
    'redeem_active', 'redeem_points', 'redeem_value',
    'referral_redeem_active', 'referral_redeem_value','mpointReedemDebit', 'rewardData'
]);
    return redirect('/products')->with('success', 'Your order has been placed successfully.');
}


public function store_product_session(Request $request){
         $request->validate([
        'product_id' => 'required|integer|exists:products,id',
    ]);

    session(
        ['selected_product_id' => $request->product_id],
        ['pc_count' => $request->pc_count],
        ['validity_period' => $request->validity_period],
    );


    

    return response()->json(['status' => 'success', 'message' => 'Checkout Processing ...']);
    }

    // public function checkout_redeem_referral(Request $request) {
    //     $productId = session('selected_product_id');
    // $product = Product::findOrFail($productId);
    // $user = Auth::user();

    // $basePrice = $product->offer_price ?? $product->price;

    // if ($request->redeem) {
    //     // Redeem Referral Wallet
    //     $referralWallet = auth()->user()->refer_wallet_points ?? 0;
       
    //     $maxreedem = $product->referral_points_max_use ?? 0;

    //     $maxRedeemValue = min($referralWallet, $basePrice);

    //     $finalBase = max(0, $basePrice - $maxRedeemValue);
    //     $gst = round($finalBase * 0.18, 2);
    //     $total = round($finalBase + $gst, 2);

    //     session([
    //         'referral_redeem_active' => true,
    //         'referral_redeem_value' => $maxRedeemValue,
    //     ]);

    //     return response()->json([
    //         'status' => 'success',
    //         'total' => number_format($total, 2),
    //         'redeem_info' => "<div class='text-dark'>
    //             Referral Wallet Redeemed: ₹" . number_format($maxRedeemValue, 2) . "<br>
    //             Remaining Wallet: ₹" . number_format($referralWallet - $maxRedeemValue, 2) . "
    //         </div>"
    //     ]);
    // } else {
    //     // Remove Redemption
    //     $gst = round($basePrice * 0.18, 2);
    //     $total = round($basePrice + $gst, 2);

    //     session()->forget(['referral_redeem_active', 'referral_redeem_value']);

    //     return response()->json([
    //         'status' => 'success',
    //         'total' => number_format($total, 2),
    //         'redeem_info' => "<div class='text-warning'>
    //             Referral redemption removed. Back to full price.
    //         </div>"
    //     ]);
    // }
    // }


 public function checkout_redeem_referral(Request $request)
{
    $productId = session('selected_product_id');
    $product = Product::findOrFail($productId);
    $user = Auth::user();

    $basePrice = $product->offer_price ?? $product->price;
    $gstRate = 0.18;

    if ($request->redeem) {
        $referralWallet = auth()->user()->refer_wallet_points ?? 0;
        $maxAllowed = $product->referral_points_max_use ?? 0;

        $redeemValue = min($referralWallet, $maxAllowed, $basePrice);
        $finalBase = max(0, $basePrice - $redeemValue);
        $gst = round($finalBase * $gstRate, 2);
        $total = round($finalBase + $gst, 2);

        session([
            'referral_redeem_active' => true,
            'referral_redeem_value' => $redeemValue,
        ]);

        // ✅ Store Redemption in MRewardPoint (debit)
     
        return response()->json([
            'status' => 'success',
            'subtotal' => number_format($finalBase, 2),
            'gst' => number_format($gst, 2),
            'total' => number_format($total, 2),
            'redeem_info' => "
                <div class='text-dark'>
                    <strong>Referral Redemption Summary:</strong><br>
                    Redeemed " . number_format($redeemValue) . " Points from Referral Wallet.<br>
                    Remaining Referral Wallet Balance: " . number_format($referralWallet - $redeemValue) . ' Points' . "<br>
                    Max Allowed for this product: " . number_format($maxAllowed) . ' Points'."
                </div>"
        ]);
    } else {
        $gst = round($basePrice * $gstRate, 2);
        $total = round($basePrice + $gst, 2);

        session()->forget(['referral_redeem_active', 'referral_redeem_value']);

        return response()->json([
            'status' => 'success',
            'subtotal' => number_format($basePrice, 2),
            'gst' => number_format($gst, 2),
            'total' => number_format($total, 2),
            'redeem_info' => "
                <div class='text-warning'>
                    Referral redemption removed. Back to full price.
                </div>"
        ]);
    }
}



public function checkoutPricePreview(Request $request)
{
    $productId = session('selected_product_id');
    $product = Product::findOrFail($productId);
    $user = Auth::user();

    $basePrice = $product->offer_price ?? $product->price;
    $gst = 0;
    $total = 0;
    $redeemPoints = 0;
    $referralRedeemValue = 0;

    // 🟢 Apply MPoint
    if (Session::get('redeem_active')) {
        $redeemPoints = Session::get('redeem_points', 0);
        $redeemValue = Session::get('redeem_value', 0);
        $basePrice -= $redeemValue;
    }

    // 🔵 Apply Referral Wallet
    if (Session::get('referral_redeem_active')) {
        $referralRedeemValue = Session::get('referral_redeem_value', 0);
        $basePrice -= $referralRedeemValue;
    }

    $basePrice = max(0, $basePrice);
    $gst = round($basePrice * 0.18, 2);
    $total = round($basePrice + $gst, 2);

    return response()->json([
        'status' => 'success',
        'base' => number_format($basePrice, 2),
        'gst' => number_format($gst, 2),
        'total' => number_format($total, 2),
    ]);
}



}