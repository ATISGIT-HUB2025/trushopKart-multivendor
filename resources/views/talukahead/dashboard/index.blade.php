@extends('talukahead.layouts.master')
@section('title')
{{$settings->site_name}} || Dashboard
@endsection
@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('talukahead.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content">
                    <div class="wsus__dashboard">
                        <div class="row g-4">
                            <!-- Today's Orders -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card h-100 border-0" style="background: linear-gradient(45deg, #4158d0, #c850c0);">
                                    <div class="card-body position-relative overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="position-relative z-1">
                                                <span class="d-block text-white-50 mb-1">Total Orders</span>
                                                <h3 class="text-white mb-2">{{ $talukaTotalOrders }}</h3>
                                                <!-- <div class="d-flex align-items-center text-white-50">
                                                    <i class="fas fa-arrow-up me-1"></i>
                                                    <span class="text-light">12% increase</span>
                                                </div> -->
                                            </div>
                                            <div class="display-4 text-white-50 position-relative z-1">
                                                <i class="fas fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="position-absolute top-50 end-0 transform-center opacity-10">
                                            <i class="fas fa-shopping-cart fa-5x text-white"></i>
                                        </div>
                                        <a href="{{route('vendor.orders.index')}}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Orders -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card h-100 border-0" style="background: linear-gradient(45deg, #00b09b, #96c93d);">
                                    <div class="card-body position-relative overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="position-relative z-1">
                                                <span class="d-block text-white-50 mb-1">Total Pending Orders</span>
                                                <h3 class="text-white mb-2">{{ $talukaTotalOrdersPending }}</h3>
                                                <!-- <div class="d-flex align-items-center text-white-50">
                                                    <i class="fas fa-chart-line me-1"></i>
                                                    <span class="text-light">Monthly growth</span>
                                                </div> -->
                                            </div>
                                            <div class="display-4 text-white-50 position-relative z-1">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                        </div>
                                        <div class="position-absolute top-50 end-0 transform-center opacity-10">
                                            <i class="fas fa-chart-bar fa-5x text-white"></i>
                                        </div>
                                        <a href="{{route('vendor.orders.index')}}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Admissions -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card h-100 border-0" style="background: linear-gradient(45deg, #ff0844, #ffb199);">
                                    <div class="card-body position-relative overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="position-relative z-1">
                                                <span class="d-block text-white-50 mb-1">Total Admissions</span>
                                                <h3 class="text-white mb-2">{{ $talukaTotalAdmissions }}</h3>
                                                <div class="d-flex align-items-center text-white-50">
                                                    <i class="fas fa-user-plus me-1"></i>
                                                    <span class="text-light">New students</span>
                                                </div>
                                            </div>
                                            <div class="display-4 text-white-50 position-relative z-1">
                                                <i class="fas fa-user-graduate"></i>
                                            </div>
                                        </div>
                                        <div class="position-absolute top-50 end-0 transform-center opacity-10">
                                            <i class="fas fa-user-graduate fa-5x text-white"></i>
                                        </div>
                                        <a href="{{route('vendor.products.index')}}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Monthly Earnings -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card h-100 border-0" style="background: linear-gradient(45deg, #1e3c72, #2a5298);">
                                    <div class="card-body position-relative overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="position-relative z-1">
                                                <span class="d-block text-white-50 mb-1">Total Earnings</span>
                                                <h3 class="text-white mb-2">₹{{ $talukaMonthlyEarning }}</h3>
                                                <div class="d-flex align-items-center text-white-50">
                                                    <i class="fas fa-arrow-up me-1"></i>
                                                    <!-- <span class="text-light">20% increase</span> -->
                                                </div>
                                            </div>
                                            <div class="display-4 text-white-50 position-relative z-1">
                                                <i class="fas fa-dollar-sign"></i>
                                            </div>
                                        </div>
                                        <div class="position-absolute top-50 end-0 transform-center opacity-10">
                                            <i class="fas fa-dollar-sign fa-5x text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- Bulk Adminssion  -->

                             <div class="col-xl-3 col-md-6">
                                <div class="card h-100 border-0" style="background: linear-gradient(45deg, #ff0844, #ffb199);">
                                    <div class="card-body position-relative overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="position-relative z-1">
                                                <span class="d-block text-white-50 mb-1">Bulk Admission Total</span>
                                                <h3 class="text-white mb-2">{{ $BulkAdmission_count }}</h3>
                                                <div class="d-flex align-items-center text-white-50">
                                                    <i class="fas fa-user-plus me-1"></i>
                                                    <span class="text-light">Bulk Admission</span>
                                                </div>
                                            </div>
                                            <div class="display-4 text-white-50 position-relative z-1">
                                                <i class="fas fa-user-graduate"></i>
                                            </div>
                                        </div>
                                        <div class="position-absolute top-50 end-0 transform-center opacity-10">
                                            <i class="fas fa-user-graduate fa-5x text-white"></i>
                                        </div>
                                        <a href="{{route('vendor.products.index')}}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                             
                            <!-- Today's Admission -->
                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card h-100 border-0" style="background: linear-gradient(45deg, #614385, #516395);">
                                    <div class="card-body position-relative overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="position-relative z-1">
                                                <span class="d-block text-white-50 mb-1">Today's Admission</span>
                                                <h3 class="text-white mb-2">15</h3>
                                                <div class="d-flex align-items-center text-white-50">
                                                    <i class="fas fa-user-plus me-1"></i>
                                                    <span class="text-light">New today</span>
                                                </div>
                                            </div>
                                            <div class="display-4 text-white-50 position-relative z-1">
                                                <i class="fas fa-user-check"></i>
                                            </div>
                                        </div>
                                        <div class="position-absolute top-50 end-0 transform-center opacity-10">
                                            <i class="fas fa-user-check fa-5x text-white"></i>
                                        </div>
                                        <a href="{{route('vendor.products.index')}}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Today's Visit -->
                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card h-100 border-0" style="background: linear-gradient(45deg, #11998e, #38ef7d);">
                                    <div class="card-body position-relative overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="position-relative z-1">
                                                <span class="d-block text-white-50 mb-1">Today's Visit</span>
                                                <h3 class="text-white mb-2">45</h3>
                                                <div class="d-flex align-items-center  text-white-50 ">
                                                    <i class="fas fa-arrow-up me-1"></i>
                                                    <span class="text-light">Active today</span>
                                                </div>
                                            </div>
                                            <div class="display-4 text-white-50 position-relative z-1">
                                                <i class="fas fa-walking"></i>
                                            </div>
                                        </div>
                                        <div class="position-absolute top-50 end-0 transform-center opacity-10">
                                            <i class="fas fa-walking fa-5x text-white"></i>
                                        </div>
                                        <a href="{{route('vendor.products.index')}}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Total Visit -->
                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card h-100 border-0" style="background: linear-gradient(45deg, #834d9b, #d04ed6);">
                                    <div class="card-body position-relative overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="position-relative z-1">
                                                <span class="d-block text-white-50 mb-1">Total Visit</span>
                                                <h3 class="text-white mb-2">1,250</h3>
                                                <div class="d-flex align-items-center text-white-50">
                                                    <i class="fas fa-chart-line me-1"></i>
                                                    <span class="text-light">All time</span>
                                                </div>
                                            </div>
                                            <div class="display-4 text-white-50 position-relative z-1">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                        <div class="position-absolute top-50 end-0 transform-center opacity-10">
                                            <i class="fas fa-users fa-5x text-white"></i>
                                        </div>
                                        <a href="{{route('vendor.products.index')}}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div> -->


                        </div>

                        <style>
                            .transform-center {
                                transform: translate(50%, -50%);
                            }

                            .opacity-10 {
                                opacity: 0.1;
                            }

                            .z-1 {
                                z-index: 1;
                            }

                            .card {
                                transition: transform 0.2s ease-in-out;
                            }

                            .card:hover {
                                transform: translateY(-5px);
                            }
                        </style>




                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection