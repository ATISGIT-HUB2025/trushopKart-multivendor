<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\User;
use App\Models\EmailConfiguration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter as FacadesRateLimiter;

class Commoncontroller extends Controller
{
    use ImageUploadTrait;
 public function products(){
    return view('frontend.pages.products');
 }

 public function online_store(){
    return view('frontend.pages.online_store');
 }


 public function vendor_register(Request $request){
   if($request->method() == "POST"){
       $request->validate([
        // Personal info (users table)
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'phone' => ['required', 'max:20', 'unique:users,phone'],
        'password' => ['required', 'min:6', 'confirmed'],

        // Shop info (vendors table)
        'shop_image' => ['required', 'image', 'max:3000'],
        'shop_name' => ['required', 'max:200'],
        'shop_email' => ['required', 'email'],
        'shop_phone' => ['required', 'max:20'],
        'shop_address' => ['required'],
        'about' => ['required'],
    ]);

    if (Auth::check() && Auth::user()->role === 'vendor') {
        return redirect()->back()->withErrors(['error' => 'You are already registered as a vendor.']);
    }

    
    // 1. Create user first
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->password = Hash::make($request->password);
    $user->role = 'user';
    $user->status = 'inactive';
    $user->save();

    // 2. Upload shop image
    $imagePath = $this->uploadImage($request, 'shop_image', 'uploads');

    // 3. Create vendor profile
    $vendor = new Vendor;
    $vendor->user_id = $user->id;
    $vendor->banner = $imagePath;
    $vendor->phone = $request->shop_phone;
    $vendor->email = $request->shop_email;
    $vendor->address = $request->shop_address;
    $vendor->description = $request->about;
    $vendor->shop_name = $request->shop_name;
    $vendor->status = 0;
    $vendor->save();

    return redirect()->back()->with('success','Submitted successfully! Please wait for admin approval.');
 
   }
   return view('frontend.pages.vendor_register');
 }

 public function vendor_send_otp(Request $request)
{$validator = Validator::make($request->all(), [
    'phone' => 'required|numeric'
]);

if ($validator->fails()) {
    return response()->json([
        'success' => false,
        'message' => $validator->errors()->first('phone'), // shows specific error like "The phone must be a number."
    ]);
}


    $phone = $request->phone;

    $lastOtpTime = Session::get('otp_sent_time_' . $phone);
    $now = now();

    if ($lastOtpTime && $now->diffInSeconds($lastOtpTime) < 60) {
        $remaining = 60 - $now->diffInSeconds($lastOtpTime);
        return response()->json([
            'success' => false,
            'message' => "Please wait $remaining seconds before resending OTP.",
            'remaining' => $remaining
        ]);
    }

    $otp = rand(100000, 999999);
    // 1. Try to get API key from DB
    $config = EmailConfiguration::first();
    $apiKey = $config?->whatsap_api_key;

    // 2. Fallback to hardcoded key if DB key is empty
    if (empty($apiKey)) {
        $apiKey = '11f564bd9e86487fbea50c24113d7578'; // your static fallback key
    }

    // 3. Final check: if still empty, return error
    if (empty($apiKey)) {
        return response()->json([
            'success' => false,
            'message' => 'WhatsApp API key is not configured in the database or fallback.',
        ], 500);
    }

    // Send OTP via WhatsApp
    $msg = "Your Trueshopkart verification code is: $otp. Do not share this OTP with anyone. It is valid for 10 minutes.";
    $mobile = $phone;

    $response = Http::get("http://wapi.nationalsms.in/wapp/v2/api/send", [
        'apikey' => $apiKey,
        'mobile' => $mobile,
        'msg' => $msg,
    ]);

    $data = $response->json();

    if (isset($data['status']) && strtolower($data['status']) === 'success') {
        
         Session::put('otp_phone', $otp);
        Session::put('otp_sent_time_' . $phone, $now);
        
        return response()->json([
            'success' => true,
            'message' => 'OTP sent successfully via WhatsApp.',
            'remaining' => 60,
        ]);
       
    
    } else {
        return response()->json([
            'success' => false,
            'message' => $data['msg'] ?? 'Failed to send OTP via WhatsApp.',
        ], 500);
    }
}
 
 public function vendor_verify_otp(Request $request) {
     $email = $request->email;
    $otp = $request->otp;
    $storedOtp = session("email_otp_{$email}");
    if ($storedOtp && $storedOtp == $otp) {
        session()->forget("email_otp_{$email}");;
        session()->forget("otp_sent_time_{$email}");
        return response()->json(['verified' => true]);
    }

    return response()->json(['verified' => false, 'message' => 'OTP does not match.']);
 }

 public function send_otp_email(Request $request)
{
    $validator = Validator::make(['email' => $request->email], [
        'email' => ['required', 'email', 'unique:users,email'],
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => $validator->errors()->first('email'),
        ], 422);
    }

    $throttleKey = 'otp-request:' . $request->ip();

    if (FacadesRateLimiter::tooManyAttempts($throttleKey, 1)) {
        $seconds = FacadesRateLimiter::availableIn($throttleKey);
        return response()->json([
            'status' => 'error',
            'message' => "Please wait {$seconds} seconds before requesting another OTP.",
            'remaining' => $seconds
        ], 429);
    }

    $otp = rand(100000, 999999);
    $email = $request->email;

    Session::put("otp_expiry_$email", now()->addMinutes(10));
    Session::put("email_otp_$email", $otp);

    try {
        Mail::send('mail.otp', ['otp' => $otp], function ($message) use ($email) {
            $message->to($email)->subject('Verify your Email');
        });
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to send OTP email.'
        ], 500);
    }

    FacadesRateLimiter::hit($throttleKey, 60); // 1 request per 60 seconds

    return response()->json([
        'status' => 'success',
        'message' => 'OTP sent successfully to your email.',
        'remaining' => 60
    ]);
}


}