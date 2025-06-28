<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class VendorProfileController extends Controller
{
    public function index()
    {
        return view('vendor.dashboard.profile');
    }

    public function bank(Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'account_holder_name' => 'required|string|max:255',
            'bank_name'            => 'required|string|max:255',
            'account_number'       => 'required|string|max:30',
            'ifsc_code'            => 'required|string|max:20',
            'branch_name'          => 'required|string|max:255',
            'upi_id'               => 'nullable|string|max:100',
        ]);

        $user = Auth::user();

        // Prepare JSON data
        $bankDetails = [
            'account_holder_name' => $request->account_holder_name,
            'bank_name'           => $request->bank_name,
            'account_number'      => $request->account_number,
            'ifsc_code'           => $request->ifsc_code,
            'branch_name'         => $request->branch_name,
            'upi_id'              => $request->upi_id,
        ];

        $user->bank_details = json_encode($bankDetails);
        $user->save();

        return redirect()->back()->with('success', 'Bank details updated successfully.');
    }

    return view('vendor.dashboard.bank');
}


    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,'.Auth::user()->id],
            'image' => ['image', 'max:2048']
        ]);

        $user = Auth::user();

        if($request->hasFile('image')){
            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }

            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = 'uploads/'.$imageName;

            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Profile Updated Successfully!');
        return redirect()->back();

    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required','confirmed', 'min:8']
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toastr()->success('Profile Password Updated Successfully!');
        return redirect()->back();
    }
}