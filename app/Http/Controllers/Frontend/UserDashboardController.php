<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\Wishlist;
use App\Models\Admission;
use App\Models\Center;
use App\Models\SchoolInfo;
use App\Models\Standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Session;




class UserDashboardController extends Controller
{
    
    public function index()
    {
        $totalOrder = Order::where('user_id', Auth::user()->id)->count();
        $totalAmount = Order::where('user_id', Auth::user()->id)->sum('amount');
        $pendingOrder = Order::where('user_id', Auth::user()->id)
            ->where('order_status', 'pending')->count();
        $completeOrder = Order::where('user_id', Auth::user()->id)
        ->where('order_status', 'delivered')->count();
        $reviews = ProductReview::where('user_id', Auth::user()->id)->count();
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->count();
        $announcements = Announcement::active()
        ->orderBy('announcement_date', 'desc')
        ->get();

        return view('frontend.dashboard.dashboard', compact(
            'totalOrder',
            'pendingOrder',
            'totalAmount',
            'completeOrder',
            'announcements',
            'reviews',
            'wishlist'
        ));
    }

public function Renew(Request $request){
    // echo Auth::user()->email;die;
    $user = Admission::where('email',Auth::user()->email)->first();
    $centers = Center::where('status', 1)->get();
        $divisions = SchoolInfo::distinct('division')->pluck('division');
        $standards = Standard::get();
        $user_standards = Standard::where('id',$user->standard)->first();

        $districts = SchoolInfo::where('division', $user->division)
        ->distinct('district')
        ->pluck('district');

        $talukas = SchoolInfo::where('district', $user->district)
            ->distinct('taluka')
            ->pluck('taluka');

            $clusters = SchoolInfo::where('taluka', $user->taluka)
            ->distinct('cluster')
            ->pluck('cluster');

            $schools = SchoolInfo::where('cluster', $user->cluster)
            ->distinct('school_name')
            ->pluck('school_name');

            $udiseNumbers = SchoolInfo::
        distinct('udise')
        ->pluck('udise');

        $villageTowns = SchoolInfo::where('udise', $user->udise)
        ->distinct('village_town')
        ->pluck('village_town');
    
    return view('frontend.dashboard.renew', compact(
        'user','centers', 'divisions', 'standards','districts','talukas','clusters','schools','udiseNumbers','villageTowns','user_standards'
       
    ));
}

public function renewData(Request $request){
    
    // echo "<pre>"; print_r($request->all());die;
    $setting = GeneralSetting::first();
    $order = new Order();
    $order->invocie_id = rand(1, 999999);
    $order->user_id = Auth::user()->id;
    $order->sub_total = $request->amount;
    $order->amount =  $request->amount;
    $order->currency_name = $setting->currency_name;
    $order->currency_icon = $setting->currency_icon;
    $order->product_qty = \Cart::content()->count();
    $order->payment_method = 'razorpay';
    $order->payment_status = '1';
    $order->order_address = json_encode(Session::get('address'));
    $order->shpping_method = json_encode(Session::get('shipping_method'));
    $order->coupon = json_encode(Session::get('coupon'));
    $order->order_status = 'pending';
    $order->save();

    $transaction = new Transaction();
    $transaction->order_id = $order->id;
    $transaction->transaction_id = $request->payment_id;
    $transaction->payment_method = 'razorpay';
    $transaction->amount = $request->amount;
    $transaction->amount_real_currency = $request->amount;
    $transaction->amount_real_currency_name = $request->currency;
    $transaction->save();

    $user = Admission::where('email',Auth::user()->email)->first();

 $standard =   Standard::where('id','>',$user->standard)->first();

   

    $user->standard = $standard->id;
    $user->save();
    return redirect()->route('user.renew');
}

}