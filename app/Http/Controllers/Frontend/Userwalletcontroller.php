<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MRewardPoint;
use App\DataTables\UserMRewardDataTable;

use App\Models\GeneralSetting;


class Userwalletcontroller extends Controller
{
 

    public function wallet(UserMRewardDataTable $dataTable)
    {
        return $dataTable->render('frontend.wallet.index');
    }

    public function wallet_submit(Request $request){

          $request->validate([
           'transaction_id' => ['required', 'unique:mreward_points,transaction_id'],

            'screenshot' => ['required'],
            'points' => ['required', 'numeric',],
            'screenshot' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ],[
             'transaction_id.unique' => 'Duplicate alert! Each transaction ID must be unique. Please enter a different one.',
        ]);


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


    
    $setting = GeneralSetting::first();
    $rate = $setting->mpoint_value ?? 1;

    MRewardPoint::create([
        'user_id' => auth()->id(),
        'scanner_wallet_id' => $request->scanner_wallet_id,
        'transaction_id' => $request->transaction_id,
        'rupees' => $request->rupees,
        'screenshot' => $screenshotPath,
        'points' => $request->points, // You can make this dynamic later
        'point_rate' => $rate,
        'type' => 'credit',
        'note' => 'Added with custom rate',
    ]);
    return back()->with("success", "Voucher Point Request request has been placed successfully.");
}



}