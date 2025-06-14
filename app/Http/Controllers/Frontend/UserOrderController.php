<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Mail;
use App\DataTables\UserOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function index(UserOrderDataTable $dataTable)
    {
        return $dataTable->render('frontend.dashboard.order.index');
    }

    public function show(string $id)
    {
        $order = Order::with('product')->findOrFail($id);
      

        return view('frontend.dashboard.order.show', compact('order'));
    }
 public function share_earn(Request $request){
         $referrals = Auth::user()->referrals()->latest()->get();
        return view('frontend.dashboard.share_earn.index',compact('referrals'));
    }


   public function send_referral(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'referral_link' => 'required|url',
    ]);

    Mail::send('mail.referral', ['referral_link' => $request->referral_link], function ($message) use ($request) {
        $message->to($request->email)
                ->subject('You Have Been Invited!');
    });

    return back()->with('success', 'Referral sent successfully!');
}
}