@extends('frontend.layouts.master')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="mb-3">Payment Successful!</h2>
            <p class="text-muted">Thank you for your purchase. Your order has been confirmed.</p>

            <a href="{{ route('home') }}" class="btn btn-primary mt-3">Return to Home</a>
        </div>
    </div>
</div>
@endsection