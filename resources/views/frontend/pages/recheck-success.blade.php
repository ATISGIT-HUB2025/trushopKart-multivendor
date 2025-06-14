@extends('frontend.layouts.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
                    </div>
                    <h2 class="mb-4">Reacheck Successful!</h2>
                    <p class="lead text-muted mb-4">
                        Thank you for submitting your recheck request. We have received your payment and our team will review your request shortly. You will receive updates through SMS.
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-home me-2"></i>Return to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
