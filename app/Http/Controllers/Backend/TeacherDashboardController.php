<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentAdmission;
class TeacherDashboardController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();
       
        
        $today = Carbon::today();
        
        // Total Orders
        $totalOrders = Order::where('user_id', $userId)->count();
        
        // Today's Orders
        $todaysOrders = Order::where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->count();

            
            $todaysEarnings = Order::where('user_id', $userId)
            ->where('payment_status', 1)
            ->whereDate('created_at', $today)
            ->sum('amount');

            $totalEarnings = Order::where('user_id', $userId)
            ->where('payment_status', 1)
            //->whereDate('created_at', $today)
            ->sum('amount');
            
        
        // Pending Orders (assuming 'pending' is the status value)
        $pendingOrders = Order::where('user_id', $userId)
            ->where('order_status', 'pending')
            ->count();
            $BulkAdmission_count =  StudentAdmission::where('teacher_id', auth()->id())->count();
        return view('teacher.dashboard.dashboard', compact(
            'todaysOrders',
            'pendingOrders',
            'todaysEarnings',
            'totalOrders',
            'BulkAdmission_count',
            'totalEarnings'
        ));
    }
}
