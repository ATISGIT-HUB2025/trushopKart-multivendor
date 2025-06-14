<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\NewsletterSubscriber;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\SchoolForVisiting;
use App\Models\MRewardPoint;
use Stripe\Review;
use App\Models\ProductLicenceKey;
use App\DataTables\UserMRewardDataTable;


class AdminController extends Controller
{


    public function updatempointdetail(Request $request){
        $row = MRewardPoint::findOrFail($request->id);
        $row->points = $request->points;
        $row->point_rate = $request->point_rate;
        $row->rupees = $request->rupees;
        $row->save();
        
        return redirect()->back()->with('success','Updated Successfully');
        
    }

    public function mpoint_purchase(UserMRewardDataTable $dataTable){
         return $dataTable->render('admin.mpoint_purchase');
    }

  public function mreward_approve($id)
{
    $row = MRewardPoint::findOrFail($id);

    if ($row->status === 'approved') {
        return redirect()->back()->with('info', 'This transaction is already approved.');
    }

    if ($row->status === 'rejected') {
        return redirect()->back()->with('warning', 'This transaction was already rejected.');
    }

    $row->status = 'approved';
    $row->save();

    return redirect()->back()->with('success', 'MReward points approved and added to user wallet.');
}


public function mreward_reject($id)
{
    $row = MRewardPoint::findOrFail($id);

    if ($row->status === 'rejected') {
        return redirect()->back()->with('info', 'This transaction is already rejected.');
    }

    if ($row->status === 'approved') {
        return redirect()->back()->with('warning', 'This transaction has already been approved.');
    }

    $row->status = 'rejected';
    $row->save();

    return redirect()->back()->with('success', 'MReward point transaction rejected.');
}



    public function dashboard()
    {
        $todaysOrder = Order::whereDate('created_at', Carbon::today())->count();
        $todaysPendingOrder = Order::whereDate('created_at', Carbon::today())
        ->where('order_status', 'pending')->count();
        $totalOrders = Order::count();
        $totalPendingOrders = Order::where('order_status', 'pending')->count();
        $totalCanceledOrders = Order::where('order_status', 'canceled')->count();
        $totalCompleteOrders = Order::where('order_status', 'delivered')->count();

        $todaysEarnings = Order::where('order_status','!=', 'canceled')
        ->where('payment_status',1)
        ->whereDate('created_at', Carbon::today())
        ->sum('sub_total');

        $monthEarnings = Order::where('order_status','!=', 'canceled')
        ->where('payment_status',1)
        ->whereMonth('created_at', Carbon::now()->month)
        ->sum('sub_total');

        $yearEarnings = Order::where('order_status','!=', 'canceled')
        ->where('payment_status',1)
        ->whereYear('created_at', Carbon::now()->year)
        ->sum('sub_total');

        $totalReview = ProductReview::count();

        $totalBrands = Brand::count();
        $totalCategories = Category::count();
        $totalBlogs = Blog::count();
        $totalSubscriber = NewsletterSubscriber::count();
        $totalVendors = User::where('role', 'vendor')->count();
        $totalUsers = User::where('role', 'user')->count();
        $pendingKeysCount = ProductLicenceKey::whereNull('assigned_user')->count();


        return view('admin.dashboard', compact(
            'todaysOrder',
            'todaysPendingOrder',
            'totalOrders',
            'totalPendingOrders',
            'totalCanceledOrders',
            'totalCompleteOrders',
            'todaysEarnings',
            'monthEarnings',
            'yearEarnings',
            'totalReview',
            'totalBrands',
            'totalCategories',
            'totalBlogs',
            'totalSubscriber',
            'totalVendors',
            'totalUsers',
            'pendingKeysCount'
        ));
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function schoolForVisitingGet()
    { 
        $data['schoolForVisitings'] = SchoolForVisiting::whereHas('user', function ($query) {
            $query->where('role', 'state_head');
        })->get();
        
        return view('admin.school_for_visiting.index', $data);
    }

    public function mreward_transaction($id){
         $tx = MRewardPoint::findOrFail($id);

    return response()->json([
        'transaction_id' => $tx->transaction_id,
        'amount' => $tx->rupees,
        'screenshot' => $tx->screenshot ? asset($tx->screenshot) : null,
    ]);
    }

}