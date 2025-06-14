<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\GeneralSetting;
use App\Models\MRewardPoint;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\RateLimiter as FacadesRateLimiter;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
   
   
    if (!Session::get('email_verified_'.$request->email)) {
        return response()->json(['status' => 'error', 'message' => 'Email not verified via OTP']);
    }


    // $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed','min:8' ],
    //         // Rules\Password::defaults()
    //     ]);


    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'phone' => ['required', 'numeric', 'digits:10', 'unique:users,phone'],
        'password' => ['required', 'confirmed', 'min:8'],
        'referral_code' => ['nullable', 'exists:users,refer_code'],
        ],[
            'referral_code.exists' => 'The referral code in the URL is invalid or does not exist.',
        ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422);
    }

    $referralCode = $request->referral_code ?? Session::get('referral_code');

    $referrer = null;
    if ($referralCode) {
        // Check if referral code is valid (based on referral_code column or student_id etc.)
        $referrer = User::where('refer_code', $referralCode)->first();

        if (!$referrer) {
            // Optional: throw validation error
            throw ValidationException::withMessages([
                'name' => ['Referral code is invalid.'],
            ]);
        }
    }

    // Create user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
        'student_id' => User::generateStudentId(),
        'refer_by' => $referralCode,
        'refer_code' => User::generateReferCode(),
    ]);
    $refersetting = GeneralSetting::first();
        $referamount = $refersetting->refer_points ?? 0;
        $value = $refersetting->mpoint_value ?? 1;
        

    // Reward referral
    if ($referrer) {
        

        // Add reward to referrer
        $referrer->increment('total_refer_earn', $referamount);
        
        // Add reward to referred user
        MRewardPoint::create([
            'transaction_id' => rand(),
            'user_id' => $referrer->id ?? null,
            // 'points' => $referamount / $value,
            'points' => $referamount,
            'point_rate' => $value,
            'type' => 'credit',
            'status' => 'approved',
            'rupees' => $referamount,
            'note' => 'referral_bonus',
        ]);
    }

    $signupBonus = 50; 
      MRewardPoint::create([
            'transaction_id' => rand(),
            'user_id' => $user->id,
            'points' => $signupBonus,
            'point_rate' => $value,
            'type' => 'credit',
            'status' => 'approved',
            'rupees' =>  $signupBonus,
            'note' => 'referral_bonus',
        ]);

    event(new Registered($user));
    Auth::login($user);
   return response()->json([
    'status' => 'success',
    'redirect' => '/products', // Always return this
]);
    }
    
// public function sendOtp(Request $request)
// {
//     $validator = Validator::make($request->all(), [
//         'email' => 'required|email|unique:users,email',
//         // 'phone' => 'required|numeric|unique:users,phone'
//     ]);

//     if ($validator->fails()) {
//         return response()->json([
//             'status' => 'error',
//             'errors' => $validator->errors()
//         ], 422);
//     }

//     $otp = rand(100000, 999999);
//     $email = $request->email;

//     Session::put("email_otp_$email", $otp);
//     Session::put("otp_expiry_$email", now()->addMinutes(10));

//     Mail::raw("Your OTP code is $otp", function ($message) use ($email) {
//         $message->to($email)->subject("Verify your Email");
//     });

//     return response()->json([
//         'status' => 'success',
//         'message' => 'OTP sent successfully'
//     ]);
// }


// public function sendOtp(Request $request)
// {
//     $throttleKey = 'otp-request:' . $request->ip();
    
//     // Limit to 1 request per minute
//     if (FacadesRateLimiter::tooManyAttempts($throttleKey, 1)) {
//         $seconds = FacadesRateLimiter::availableIn($throttleKey);
//         return response()->json([
//             'status' => 'error',
//             'message' => "Please wait {$seconds} seconds before requesting another OTP."
//         ], 429);
//     }
    
//     FacadesRateLimiter::hit($throttleKey, 60); // 60 seconds = 1 minute

//     $validator = Validator::make($request->all(), [
//         'email' => 'required|email|unique:users,email',
//     ]);

//     if ($validator->fails()) {
//         return response()->json([
//             'status' => 'error',
//             'errors' => $validator->errors()
//         ], 422);
//     }

//     $otp = rand(100000, 999999);
//     $email = $request->email;

//     // Store OTP and expiry in session
//     Session::put("email_otp_$email", $otp);
//     Session::put("otp_expiry_$email", now()->addMinutes(10)); // OTP valid for 10 minutes

//     try {
//         // Send OTP via email
//         Mail::raw("Your OTP code is $otp", function ($message) use ($email) {
//             $message->to($email)->subject("Verify your Email");
//         });

//         return response()->json([
//             'status' => 'success',
//             'message' => 'OTP sent successfully'
//         ]);
//     } catch (\Exception $e) {
//         return response()->json([
//             'status' => 'error',
//             'message' => 'Failed to send OTP. Please try again.'
//         ], 500);
//     }
// }

// public function verifyOtp(Request $request)
// {
//     $request->validate(['email' => 'required|email', 'otp' => 'required']);

//     $email = $request->email;
//     $otp = $request->otp;
//     $savedOtp = Session::get("email_otp_$email");
    
//     $expiry = Session::get("otp_expiry_$email");

//     if (!$savedOtp || !$expiry || now()->gt($expiry)) {
//         return response()->json(['status' => 'error', 'message' => 'OTP expired or not found']);
//     }

//     if ($otp == $savedOtp) {
//         Session::put("email_verified_$email", true);
//         return response()->json(['status' => 'verified']);
//     }

//     return response()->json(['status' => 'error', 'message' => 'Invalid OTP']);
// }


// public function sendOtp(Request $request)
// {
//     $throttleKey = 'otp-request:' . $request->ip();
    
  

//     $validator = Validator::make($request->all(), [
//         'email' => 'required|email|unique:users,email',
//     ]);

//     if ($validator->fails()) {
//         return response()->json([
//             'status' => 'error',
//             'errors' => $validator->errors()
//         ], 422);
//     }

//       if (FacadesRateLimiter::tooManyAttempts($throttleKey, 1)) {
//         $seconds = FacadesRateLimiter::availableIn($throttleKey);
//         return response()->json([
//             'status' => 'error',
//             'message' => "Please wait {$seconds} seconds before requesting another OTP."
//         ], 429);
//     }
    
//     FacadesRateLimiter::hit($throttleKey, 60);

//     $otp = rand(100000, 999999);
//     $email = $request->email;

//     Session::put("email_otp_$email", $otp);
//     Session::put("otp_expiry_$email", now()->addMinutes(10));

//     try {
        
//       Mail::raw("$otp is your OTP to access Trueshop kart registration process. OTP is confidential and valid for 10 minutes. For security reasons, DO NOT share this OTP with anyone.", function ($message) use ($email) {
//     $message->to($email)->subject("Verify your Email");
// });


//         return response()->json([
//             'status' => 'success',
//             'message' => 'OTP sent successfully'
//         ]);
//     } catch (\Exception $e) {
//         return response()->json([
//             'status' => 'error',
//             'message' => 'Failed to send OTP. Please try again.'
//         ], 500);
//     }
// }



public function sendOtp(Request $request)
{
    $throttleKey = 'otp-request:' . $request->ip();

    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users,email',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422);
    }

    if (FacadesRateLimiter::tooManyAttempts($throttleKey, 1)) {
        $seconds = FacadesRateLimiter::availableIn($throttleKey);
        return response()->json([
            'status' => 'error',
            'message' => "Please wait {$seconds} seconds before requesting another OTP."
        ], 429);
    }

    FacadesRateLimiter::hit($throttleKey, 60);

    $otp = rand(100000, 999999);
    $email = $request->email;

    Session::put("email_otp_$email", $otp);
    Session::put("otp_expiry_$email", now()->addMinutes(10));

    try {
        Mail::send('mail.otp', ['otp' => $otp], function ($message) use ($email) {
            $message->to($email)
                    ->subject('Verify your Email');
        });

        return response()->json([
            'status' => 'success',
            'message' => 'OTP sent successfully'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to send OTP. Please try again.'
        ], 500);
    }
}

public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required|digits:6'
    ]);

    $email = $request->email;
    $otp = $request->otp;
    $savedOtp = Session::get("email_otp_$email");
    $expiry = Session::get("otp_expiry_$email");

    if (!$savedOtp || !$expiry || now()->gt($expiry)) {
        return response()->json([
            'status' => 'error',
            'message' => 'OTP expired or invalid. Please request a new one.'
        ]);
    }

    if ($otp == $savedOtp) {
        Session::put("email_verified_$email", true);
        Session::forget("email_otp_$email");
        Session::forget("otp_expiry_$email");
        
        return response()->json([
            'status' => 'verified'
        ]);
    }

    return response()->json([
        'status' => 'error',
        'message' => 'Invalid OTP code. Please try again.'
    ]);
}



}