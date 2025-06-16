<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageUploadTrait;


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

}