<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\VendorOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class VendorOrderController extends Controller
{



    
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

    
public function changePaymentStatus(Request $request)
{
    $order = Order::with('transaction')->findOrFail($request->id);
    $order->payment_status = $request->status;

    if ($request->status == 1) {
        $userAddress = json_decode($order->order_address, true);
        $email = $userAddress['email'] ?? null;

        if ($email) {
            $product = Product::find($order->product_id);
             $order->order_status =  "delivered";
            
               // 📧 Prepare data for email
                $data = [
                    'name' => $userAddress['name'] ?? 'Customer',
                    'product_name' => $product->name ?? 'Your Product',
                    'order' => $order,
                    'address' => (object) $userAddress,
                ];
                
                 $order->order_status =  "delivered";

                Mail::send('mail.orderupdate', $data, function ($message) use ($email) {
                    $message->to($email)->subject('Your recent order update');
                });
                
          
        }
    }
    
    $order->save();
    return response(['status' => 'success', 'message' => 'Updated Payment Status Successfully']);
}



    public function index(VendorOrderDataTable $dataTable)
    {
        return $dataTable->render('vendor.order.index');
    }

    public function show(string $id)
    {
        $order = Order::with(['orderProducts'])->findOrFail($id);
        return view('vendor.order.show', compact('order'));
    }

    public function orderStatus(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = $request->status;
        $order->save();

        toastr('Status Updated Successfully!', 'success', 'Success');

        return redirect()->back();
    }
}