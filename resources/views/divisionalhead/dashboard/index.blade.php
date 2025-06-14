@extends('divisionalhead.layouts.master')
@section('title')
{{$settings->site_name}} || Dashboard
@endsection
@section('content')
<section id="wsus__dashboard">
  <div class="container-fluid">
    @include('divisionalhead.layouts.sidebar')
    <div class="row">
      <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content">
          <div class="wsus__dashboard">
            <div class="row g-4">
              <!-- Today's Orders -->
              <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                  <div class="card-body d-flex align-items-center">
                    <div class="icon-container bg-primary text-white rounded-circle me-3">
                      <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div>
                      <h6 class="text-muted mb-1">Today's Orders</h6>
                      <h3 class="mb-0">30</h3>
                      <small class="text-success"><i class="fas fa-arrow-up"></i> 12% increase</small>
                    </div>
                  </div>
                  <a href="{{route('vendor.orders.index')}}" class="stretched-link"></a>
                </div>
              </div>

              <!-- Total Orders -->
              <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                  <div class="card-body d-flex align-items-center">
                    <div class="icon-container bg-success text-white rounded-circle me-3">
                      <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                      <h6 class="text-muted mb-1">Total Orders</h6>
                      <h3 class="mb-0">100</h3>
                      <small class="text-info">Monthly growth</small>
                    </div>
                  </div>
                  <a href="{{route('vendor.orders.index')}}" class="stretched-link"></a>
                </div>
              </div>

              <!-- Total Admissions -->
              <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                  <div class="card-body d-flex align-items-center">
                    <div class="icon-container bg-warning text-white rounded-circle me-3">
                      <i class="fas fa-user-graduate"></i>
                    </div>
                    <div>
                      <h6 class="text-muted mb-1">Total Admissions</h6>
                      <h3 class="mb-0">600</h3>
                      <small class="text-primary">New students</small>
                    </div>
                  </div>
                  <a href="{{route('vendor.products.index')}}" class="stretched-link"></a>
                </div>
              </div>

              <!-- Monthly Earnings -->
              <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                  <div class="card-body d-flex align-items-center">
                    <div class="icon-container bg-danger text-white rounded-circle me-3">
                      <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div>
                      <h6 class="text-muted mb-1">Monthly Earnings</h6>
                      <h3 class="mb-0">₹20,000</h3>
                      <small class="text-success"><i class="fas fa-arrow-up"></i> 20% increase</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <style>
              .icon-container {
                width: 50px;
                height: 50px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
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