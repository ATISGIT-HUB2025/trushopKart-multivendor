<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\canceledOrderDataTable;
use App\DataTables\deliveredOrderDataTable;
use App\DataTables\droppedOffOrderDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\outForDeliveryOrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\DataTables\processedOrderDataTable;
use App\DataTables\shippedOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.index');
    }

    public function pendingOrders(PendingOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.pending-order');
    }

    public function processedOrders(processedOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.pending-order');
    }

    public function droppedOfOrders(droppedOffOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.dropped-off-order');
    }

    public function shippedOrders(shippedOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.shipped-order');
    }

    public function outForDeliveryOrders(outForDeliveryOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.out-for-delivery-order');
    }

    public function deliveredOrders(deliveredOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.delivered-order');
    }

    public function canceledOrders(canceledOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.canceled-order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);

        // delete order products
        $order->orderProducts()->delete();
        // delete transaction
        $order->transaction()->delete();

        $order->delete();

        return response(['status' => 'success', 'message' => 'Deleted successfully!']);
    }

    public function changeOrderStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        
        // if($order->payment_status == "1"){
        
        $order->order_status = $request->status;
        $order->save();


        return response(['status' => 'success', 'message' => 'Updated Order Status']);
        // }else{
        //     return response(['status' => 'error','message' => 'Please complete the payment first to proceed further.']);
        // }
    }

    // public function changePaymentStatus(Request $request)
    // {
    //     $paymentStatus = Order::findOrFail($request->id);
    //     $paymentStatus->payment_status = $request->status;

    //      if ($request->status == 1) {
    //     $userAddress = json_decode($paymentStatus->order_address, true);
    //     $email = $userAddress['email'] ?? null;

    //     if ($email) {
    //         $product = \App\Models\Product::find($paymentStatus->product_id);

    //         $data = [
    //             'name' => $userAddress['name'] ?? 'Customer',
    //             'product_name' => $product->name ?? 'Your Product',
    //             'licence_key' => $product->product_key,
    //         ];

    //         // Send email
    //         Mail::send('mail.license_key', $data, function ($message) use ($email) {
    //             $message->to($email)->subject('Your Product License Key');
    //         });
    //     }
    // }
    //     $paymentStatus->save();

    //     return response(['status' => 'success', 'message' => 'Updated Payment Status Successfully']);
    // }


//     public function changePaymentStatus(Request $request)
// {
//     $order = Order::with('transaction')->findOrFail($request->id);
//     $order->payment_status = $request->status;

//     if ($request->status == 1) {
//         $userAddress = json_decode($order->order_address, true);
//         $email = $userAddress['email'] ?? null;

//         if ($email) {
//             $product = Product::find($order->product_id);

//             $data = [
//                 'name' => $userAddress['name'] ?? 'Customer',
//                 'product_name' => $product->name ?? 'Your Product',
//                 'licence_key' => $product->product_key,
//                 'order' => $order,
//                 'address' => (object) $userAddress,
//             ];

//             Mail::send('mail.license_key', $data, function ($message) use ($email) {
//                 $message->to($email)->subject('Your Product License Key & Invoice');
//             });
//         }
//     }

//     $order->save();

//     return response(['status' => 'success', 'message' => 'Updated Payment Status Successfully']);
// }



public function changePaymentStatus(Request $request)
{
    $order = Order::with('transaction')->findOrFail($request->id);
    $order->payment_status = $request->status;

    if ($request->status == 1) {
        $userAddress = json_decode($order->order_address, true);
        $email = $userAddress['email'] ?? null;

        if ($email) {
            $product = Product::find($order->product_id);

            // 🔍 Get 1 unassigned licence key
            $licenceKey = \App\Models\ProductLicenceKey::where('product_id', $product->id)
                            ->where('assigned', "N")
                            ->first();

            if ($licenceKey) {
                // ✅ Assign the licence key to this user
                $licenceKey->assigned = "Y";
                $licenceKey->assigned_user = $order->user_id;
                $licenceKey->save();

                // 📧 Prepare data for email
                $data = [
                    'name' => $userAddress['name'] ?? 'Customer',
                    'product_name' => $product->name ?? 'Your Product',
                    'licence_key' => $licenceKey->product_key, // 👈 Use this assigned key
                    'order' => $order,
                    'address' => (object) $userAddress,
                ];
                
                 $order->license_key =  $licenceKey->product_key ?? null;
                 $order->order_status =  "delivered";

                Mail::send('mail.license_key', $data, function ($message) use ($email) {
                    $message->to($email)->subject('Your Product License Key & Invoice');
                });
            } else {
                // ❗ No unassigned keys left
                return response([
                    'status' => 'error',
                    'message' => 'No available license keys for this product.'
                ], 400);
            }
        }
    }
    
    $order->save();
    return response(['status' => 'success', 'message' => 'Updated Payment Status Successfully']);
}



}