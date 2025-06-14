<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\GeneralSetting;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $referral_code = request()->get('referral_code') ?? null;
        if($referral_code){
            session(['referral_code' => $referral_code]);

            $refersetting = GeneralSetting::first();

            $referamount = $refersetting->refer_points ?? 0;

        }else{
            $refersetting = GeneralSetting::first();
            $referamount = $refersetting->refer_points ?? 0;
        }

        
        return view('auth.login' ,compact('refersetting', 'referamount'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
    
        $request->session()->regenerate();
    
        if($request->user()->status === 'inactive'){
            Auth::guard('web')->logout();
            $request->session()->regenerateToken();
            toastr('account has been banned from website please connect with support!', 'error', 'Account Banned!');
            return redirect('/');
        }

        switch($request->user()->role) {
            case 'admin': 
                return redirect()->intended('/admin/dashboard');
            case 'vendor':
                return redirect()->intended('/vendor/dashboard');
            case 'center_had': 
                return redirect()->intended('/center_hed/dashboard');
            case 'state_head': 
                return redirect()->intended('/state_head/dashboard');
            case 'divisional_head': 
                return redirect()->intended('/divisional_head/dashboard');    
            case 'teacher':
                return redirect()->intended('/teacher/dashboard');
            case 'divisional_head':
                return redirect()->intended('/divisional/dashboard');
            case 'district_head':
                return redirect()->intended('/district/dashboard');
            case 'subdistrict_head':
                return redirect()->intended('/subdistrict/dashboard');
            case 'taluka_head':
                return redirect()->intended('/taluka/dashboard');
            case 'user':
                return redirect()->intended('/products');
            default:
                return redirect()->intended(RouteServiceProvider::HOME);
        }
    
    

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}