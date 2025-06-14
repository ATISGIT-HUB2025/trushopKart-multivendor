@extends('frontend.layouts.master')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h3>Payment for Recheck Request</h3>
                    <p class="lead">Amount: ₹{{$amount}}</p>
                    <button id="rzp-button" class="btn btn-primary btn-lg">Pay Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "{{ config('razorpay.key') }}",
    "amount": "{{ $order->amount }}",
    "currency": "INR",
    "name": "Recheck Request",
    "description": "Payment for recheck request",
    "order_id": "{{ $order->id }}",
    "handler": function (response){
        window.location.href = "{{ route('recheck.payment.handle') }}?" + 
            "razorpay_payment_id=" + response.razorpay_payment_id +
            "&razorpay_order_id=" + response.razorpay_order_id +
            "&razorpay_signature=" + response.razorpay_signature;
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp = new Razorpay(options);
document.getElementById('rzp-button').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>
@endsection
