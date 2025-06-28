<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\VendorListDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\VendorTransaction;

class VendorListController extends Controller
{
    public function index(VendorListDataTable $dataTable)
    {
        return $dataTable->render('admin.vendor-list.index');
    }

    public function changeStatus(Request $request)
    {
        $customer = User::findOrFail($request->id);
        $customer->status = $request->status == 'true' ? 'active' : 'inactive';
        $customer->save();

        return response(['message' => 'Status has been updated!']);
    }

    public function viewVendorInfo($vendorid)
    {
        $vendor = User::findOrFail($vendorid);

        $mvendor = Vendor::where('user_id', $vendorid)->first();


        return view('admin.vendor-list.view', compact('vendor','mvendor'));
    }


 public function vendorSalesOverview(Request $request, $vendorId)
{
    $vendor = Vendor::with('user')->findOrFail($vendorId);

    // Get all product IDs of this vendor
    $productIds = $vendor->products()->pluck('id');

    // Base query
    $ordersQuery = Order::whereIn('product_id', $productIds);

    // Filter by date
    if ($request->filter == 'today') {
        $ordersQuery->whereDate('created_at', Carbon::today());
    } elseif ($request->filter == 'month') {
        $ordersQuery->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year);
    } elseif ($request->from && $request->to) {
        $ordersQuery->whereBetween('created_at', [$request->from, $request->to]);
    }

    $totalOrders = $ordersQuery->count();
    $totalAmount = $ordersQuery->sum('amount');
    $orders = $ordersQuery->with('product')->get();

    return response()->json([
        'totalOrders' => $totalOrders,
        'totalAmount' => $totalAmount,
        'orders' => $orders
    ]);
}

public function fetch_transactions(Request $request, Vendor $vendor)
{
    $query = VendorTransaction::where('vendor_id', $vendor->id);

    switch ($request->filter) {
        case 'today':
            $query->whereDate('paid_at', Carbon::today());
            break;
        case 'this_week':
            $query->whereBetween('paid_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            break;
        case 'this_month':
            $query->whereMonth('paid_at', Carbon::now()->month)
                  ->whereYear('paid_at', Carbon::now()->year);
            break;
        case 'this_year':
            $query->whereYear('paid_at', Carbon::now()->year);
            break;
        case 'custom':
            if ($request->from && $request->to) {
                $query->whereBetween('paid_at', [
                    Carbon::parse($request->from)->startOfDay(),
                    Carbon::parse($request->to)->endOfDay()
                ]);
            }
            break;
    }

    $transactions = $query->latest()->get();

    // Count by status
    $completed = $query->clone()->where('status', 'completed')->sum('amount');
    $pending = $query->clone()->where('status', 'pending')->sum('amount');
    $failed = $query->clone()->where('status', 'failed')->sum('amount');

    return response()->json([
        'transactions' => $transactions,
        'counts' => [
            'completed' => $completed,
            'pending' => $pending,
            'failed' => $failed,
        ]
    ]);
}


    // Store new payment
    public function store_transaction(Request $request, Vendor $vendor)
    {

        
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'required|string',
            'transaction_id' => 'nullable|string|max:100',
            'status' => 'required|string',
            'note' => 'nullable|string',
            'paid_at' => 'nullable|date'
        ]);


       VendorTransaction::create([
    'vendor_id' => $request->vendor_id, // or 
    'amount' => $request->amount,
    'payment_method' => $request->payment_method,
    'transaction_id' => $request->transaction_id,
    'status' => $request->status,
    'note' => $request->note,
    'paid_at' => $request->paid_at ?? now(),
]);

        return response()->json(['message' => 'Payment added successfully']);
    }
    
}