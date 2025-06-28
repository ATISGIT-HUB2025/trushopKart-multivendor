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
use Illuminate\Support\Facades\DB;
use App\Models\EMailConfiguration;
use Illuminate\Support\Facades\Http; 

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
    
    'email' => [
        'required',
        'numeric',
    ],
    
    'email_c_phone' => [
        'required',
        'email',
        'max:255',
        'unique:users,email',
    ],
    
    'password' => [
        'required',
        'string',
        'min:8',
        'confirmed'
    ],
    
    'referral_code' => [
        'nullable',
        'exists:users,refer_code',
    ],
], [
    // Custom Messages
    'name.required' => 'Name is required.',
    'email.required' => 'Phone number is required.',
    'email.numeric' => 'Phone number must contain only digits.',
    'email.digits' => 'Phone number must be exactly 10 digits.',
    'email.unique' => 'Phone number is already taken.',
    
    'email_c_phone.required' => 'Email is required.',
    'email_c_phone.email' => 'Please enter a valid email address.',
    'email_c_phone.max' => 'Email must not be more than 255 characters.',
    'email_c_phone.unique' => 'Email is already taken.',
    
    'password.required' => 'Password is required.',
    'password.min' => 'Password must be at least 8 characters.',
    'password.confirmed' => 'Password confirmation does not match.',
    'referral_code.exists' => 'The referral code is invalid or does not exist.',
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
        'email' => $request->email_c_phone,
        'phone' => $request->email,
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
    
// public function sendOtps(Request $request)
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


// public function sendOtps(Request $request)
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


// public function sendOtps(Request $request)
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



// public function sendOtp(Request $request)
// {
//     $input = $request->email; // same field for both email or mobile
//     $throttleKey = 'otp-request:' . $request->ip();

//     $isEmail = filter_var($input, FILTER_VALIDATE_EMAIL);
//     $isMobile = preg_match('/^[0-9]{10,15}$/', $input); // adjust length as needed

//     if (!$isEmail && !$isMobile) {
//         return response()->json([
//             'status' => 'error',
//             'message' => 'Enter a valid email address or mobile number.',
//         ], 422);
//     }

//     if ($isEmail) {
//         // Additional email uniqueness check
//         $validator = Validator::make(['email' => $input], [
//             'email' => 'required|email|unique:users,email',
//         ]);

//         if ($validator->fails()) {
//             return response()->json([
//                 'status' => 'error',
//                 'errors' => $validator->errors()
//             ], 422);
//         }
//     }

//     // Throttle OTP requests (1 per 60 seconds)
//     // if (FacadesRateLimiter::tooManyAttempts($throttleKey, 1)) {
//     //     $seconds = FacadesRateLimiter::availableIn($throttleKey);
//     //     return response()->json([
//     //         'status' => 'error',
//     //         'message' => "Please wait {$seconds} seconds before requesting another OTP."
//     //     ], 429);
//     // }

//     FacadesRateLimiter::hit($throttleKey, 60); // allow 1 attempt per minute

//     // Generate OTP
//     $otp = rand(100000, 999999);

//     // Store OTP in session
//     // Session::put("otp_$input", $otp);
//     // Session::put("otp_expiry_$input", now()->addMinutes(10));

    
//     Session::put("email_otp_$input", $otp);
//     Session::put("otp_expiry_$input", now()->addMinutes(10));
//     try {
//         if ($isEmail) {
//             // Send via Email
//             Mail::send('mail.otp', ['otp' => $otp], function ($message) use ($input) {
//                 $message->to($input)
//                         ->subject('Verify your Email');
//             });

//             return response()->json([
//                 'status' => 'success',
//                 'message' => 'OTP sent successfully to your email.'
//             ]);
//         } else {
//            // 1. Try to get API key from DB
//             $config = EmailConfiguration::first();
//             $apiKey = $config?->whatsap_api_key;

//             // 2. Fallback to hardcoded key if DB key is empty
//             if (empty($apiKey)) {
//                 $apiKey = '2f233ed1a046484f9bfa0f985e4d0f0b'; // your static fallback key
//             }

//             // 3. Final check: if still empty, return error
//             if (empty($apiKey)) {
//                 return response()->json([
//                     'status' => 'error',
//                     'message' => 'WhatsApp API key is not configured in the database or fallback.',
//                 ], 500);
//             }

//             // Send OTP via WhatsApp
//             $msg = "Your OTP is $otp";
//             $mobile = $input;

//             $response = Http::get("http://wapi.nationalsms.in/wapp/v2/api/send", [
//                 'apikey' => $apiKey,
//                 'mobile' => $mobile,
//                 'msg' => $msg,
//             ]);

//             $data = $response->json();

//             // Success
//             if (isset($data['status']) && strtolower($data['status']) === 'success') {
//                 return response()->json([
//                     'status' => 'success',
//                     'message' => 'OTP sent successfully via WhatsApp.'
//                 ]);
//             }else{
//                  return response()->json([
//                     'status' => 'error',
//                     'message' => $data['msg'] ?? 'Failed to send OTP via WhatsApp.',
//                 ]);

//             }

//             // Any other failure
//             return response()->json([
//                 'status' => 'error',
//                 'message' => $data['msg'] ?? 'Failed to send OTP via WhatsApp.',
//             ], 500);

//         }
//     } catch (\Exception $e) {
//         return response()->json([
//             'status' => 'error',
//             'message' => 'Failed to send OTP. Please try again.'
//         ], 500);
//     }
// }

public function sendOtp(Request $request)
{
    $email = $request->email;
    $throttleKey = 'otp-request:' . $request->ip();

    $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    $isMobile = preg_match('/^[0-9]{10,15}$/', $email);
    if (!$isMobile) {
        return response()->json([
            'status' => 'error',
            'message' => 'Enter a valid mobile number.',
        ], 422);
    }



      $validator = Validator::make(['email' => $email], [
    'email' => [
        'required',
        'numeric',
        'unique:users,phone',
    ],
], [
    'email.required' => 'Phone number is required.',
    'email.numeric' => 'Phone number must be a number.',
    'email.unique' => 'Phone number is already registered.',
]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        
    if ($isEmail) {
        // Additional email uniqueness check
        // $validator = Validator::make(['email' => $email], [
        //     'email' => 'required|email|unique:users,email',
        // ]);
    }

    if (FacadesRateLimiter::tooManyAttempts($throttleKey, 1)) {
        $seconds = FacadesRateLimiter::availableIn($throttleKey);
        return response()->json([
            'status' => 'error',
            'message' => "Please wait {$seconds} seconds before requesting another OTP."
        ], 429);
    }


    $otp = rand(100000, 999999);
    $email = $request->email;
    
    Session::put("otp_expiry_$email", now()->addMinutes(10));
    Session::put("email_otp_$email", $otp);
    

    try {
        if ($isEmail) {
            // Send via Email
            Mail::send('mail.otp', ['otp' => $otp], function ($message) use ($email) {
                $message->to($email)
                        ->subject('Verify your Email');
            });

            return response()->json([
                'status' => 'success',
                'message' => 'OTP sent successfully to your email.'
            ]);
        } else {
           // 1. Try to get API key from DB
            $config = DB::table('email_configurations')->first();
            $apiKey = $config?->whatsap_api_key;

            // 2. Fallback to hardcoded key if DB key is empty
            if (empty($apiKey)) {
                $apiKey = '11f564bd9e86487fbea50c24113d7578'; // your static fallback key
            }

            // 3. Final check: if still empty, return error
            if (empty($apiKey)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'WhatsApp API key is not configured in the database or fallback.',
                ], 500);
            }

            // Send OTP via WhatsApp
          $msg = "Your Trueshopkart verification code is: $otp. Do not share this OTP with anyone. It is valid for 10 minutes.";
            $mobile = $email;

            $response = Http::get("http://wapi.nationalsms.in/wapp/v2/api/send", [
                'apikey' => $apiKey,
                'mobile' => $mobile,
                'msg' => $msg,
            ]);

            $data = $response->json();

            // Success
            if (isset($data['status']) && strtolower($data['status']) === 'success') {
                return response()->json([
                    'status' => 'success',
                    'message' => 'OTP sent successfully via WhatsApp.'
                ]);
                FacadesRateLimiter::hit($throttleKey, 60);

            }else{
                 return response()->json([
                    'status' => 'error',
                    'message' => $data['msg'] ?? 'Failed to send OTP via WhatsApp.',
                ]);

            }   

            // Any other failure
            return response()->json([
                'status' => 'error',
                'message' => $data['msg'] ?? 'Failed to send OTP via WhatsApp.',
            ], 500);

        }
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to send OTP. Please try again.'
        ], 500);
    }
}

// public function sendOtpold(Request $request)
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

//     if (FacadesRateLimiter::tooManyAttempts($throttleKey, 1)) {
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
//         Mail::send('mail.otp', ['otp' => $otp], function ($message) use ($email) {
//             $message->to($email)
//                     ->subject('Verify your Email');
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


public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required',
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


// public function verifyOtp(Request $request)
// {
//     $request->validate([
//         'email' => 'required', // This is actually phone or email
//         'otp' => 'required|digits:6'
//     ]);

//     $input = $request->email; // Can be either email or phone
//     $otp = $request->otp;

//     $savedOtp = Session::get("otp_$input");
//     $expiry = Session::get("otp_expiry_$input");

//     if (!$savedOtp || !$expiry || now()->gt($expiry)) {
//         return response()->json([
//             'status' => 'error',
//             'message' => 'OTP expired or invalid. Please request a new one.'
//         ]);
//     }

//     if ($otp == $savedOtp) {
//         Session::put("otp_verified_$input", true);
//         Session::forget("otp_$input");
//         Session::forget("otp_expiry_$input");

//         return response()->json([
//             'status' => 'success',
//             'message' => 'OTP verified successfully.'
//         ]);
//     }

//     return response()->json([
//         'status' => 'error',
//         'message' => 'Invalid OTP code. Please try again.'
//     ]);
// }

}