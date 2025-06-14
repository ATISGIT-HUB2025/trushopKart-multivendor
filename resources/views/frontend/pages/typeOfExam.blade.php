@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Types of Admission
@endsection

@section('content')
<section id="wsus__breadcrumb">
    <div class="wsus_breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Select Your Admission Package</h4>
                    <ul>
                        <li><a href="{{route('home')}}">home</a></li>
                        <li><a href="javascript:;">admission packages</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="container py-5">
    <div class="row g-4 justify-content-center">
        @foreach ($packages as $package)
        <div class="col-lg-6 col-md-6">
            <div class="package-card h-100">
                <div class="package-header bg-primary text-white">
                <h3>{{ Str::title($package->package_name) }} Package</h3>
                    <span class="badge bg-white text-primary">{{ $loop->first ? 'Most Popular' : '' }}</span>
                </div>
                <div class="package-body">
                    <div class="package-features">
                        <h4>{{ $package->package_title ?? 'Package Features' }}</h4>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> {{ $package->facility_1 }}</li>
                            <li><i class="fas fa-check-circle"></i> {{ $package->facility_2 }}</li>
                            <li><i class="fas fa-check-circle"></i> {{ $package->facility_3 }}</li>
                            <li><i class="fas fa-check-circle"></i> {{ $package->facility_4 }}</li>
                            <li><i class="fas fa-check-circle"></i> {{ $package->facility_5 }}</li>
                        </ul>
                    </div>
                    <form action="{{ route('type-of-admission') }}" method="POST">
                        @csrf
                        <button name="exam_type" value="{{ $package->package_name }}" class="btn btn-primary btn-lg w-100">
                            {{ $package->button_name }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<style>
    .package-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .package-card:hover {
        transform: translateY(-5px);
    }

    .package-header {
        padding: 20px;
        text-align: center;
        position: relative;
    }

    .package-header h3 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
    }

    .package-header .badge {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 500;
    }

    .package-body {
        padding: 30px;
    }

    .package-features h4 {
        color: #333;
        margin-bottom: 20px;
        font-size: 20px;
    }

    .package-features ul {
        list-style: none;
        padding: 0;
        margin-bottom: 30px;
    }

    .package-features li {
        margin-bottom: 15px;
        color: #666;
        display: flex;
        align-items: center;
    }

    .package-features li i {
        color: #28a745;
        margin-right: 10px;
    }

    .btn-lg {
        padding: 12px 30px;
        font-weight: 500;
        border-radius: 8px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>
@endsection