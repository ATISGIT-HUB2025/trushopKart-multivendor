@extends('districthead.layouts.master')
@section('title')
{{$settings->site_name}} || Dashboard
@endsection
@section('content')
<section id="wsus__dashboard">
  <div class="container-fluid">
    @include('districthead.layouts.sidebar')
    <div class="row">
      <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content">
          <div class="wsus__dashboard">
            <div class="row g-4">
                <!-- Total Orders -->
                <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100">
                  <div class="card-body d-flex align-items-center">
                    <div class="icon-container bg-gradient-success text-white rounded-circle me-3">
                      <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                      <h6 class="text-muted mb-1">Total Orders</h6>
                      <h6 class="text-muted mb-1">District Head</h6>
                      <h3 class="mb-0">{{ $totalOrders }}</h3>
                      <!-- <small class="text-info">Monthly growth</small> -->
                    </div>
                  </div>
                  <a href="{{route('vendor.orders.index')}}" class="stretched-link"></a>
                </div>
              </div>

              <!-- Today's Orders -->
              <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100">
                  <div class="card-body d-flex align-items-center">
                    <div class="icon-container bg-gradient-primary text-white rounded-circle me-3">
                      <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div>
                      <h6 class="text-muted mb-1">Total Pending Orders</h6>
                      <h6 class="text-muted mb-1">District Head</h6>
                      <h3 class="mb-0">{{ $todaysOrdersPending }}</h3>
                      <!-- <small class="text-success"><i class="fas fa-arrow-up"></i> 12% increase</small> -->
                    </div>
                  </div>
                  <a href="{{route('vendor.orders.index')}}" class="stretched-link"></a>
                </div>
              </div>

            
              <!-- Total Admissions -->
              <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100">
                  <div class="card-body d-flex align-items-center">
                    <div class="icon-container bg-gradient-warning text-white rounded-circle me-3">
                      <i class="fas fa-user-graduate"></i>
                    </div>
                    <div>
                      <h6 class="text-muted mb-1">Total Admissions</h6>
                      <h6 class="text-muted mb-1">District Head</h6>
                      <h3 class="mb-0">{{ $totalAdmissions }}</h3>
                      <!-- <small class="text-primary">New students</small> -->
                    </div>
                  </div>
                  <a href="{{route('vendor.products.index')}}" class="stretched-link"></a>
                </div>
              </div>

              <!-- Monthly Earnings -->
              <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100">
                  <div class="card-body d-flex align-items-center">
                    <div class="icon-container bg-gradient-danger text-white rounded-circle me-3">
                      <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div>
                      <h6 class="text-muted mb-1">Total Earnings</h6>
                      <h6 class="text-muted mb-1">District Head</h6>
                      <h3 class="mb-0">{{ $monthlyEarning }}</h3>
                      <!-- <small class="text-success"><i class="fas fa-arrow-up"></i> 20% increase</small> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row g-4 mt-2">
            

              <!-- Total Orders -->
              <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100">
                  <div class="card-body d-flex align-items-center">
                    <div class="icon-container bg-gradient-success text-white rounded-circle me-3">
                      <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                      <h6 class="text-muted mb-1">Total Orders</h6>
                      <h6 class="text-muted mb-1">Subdistrict Head</h6>
                      <h3 class="mb-0">{{ $subDistrictTotalOrders }}</h3>
                      <!-- <small class="text-info">Monthly growth</small> -->
                    </div>
                  </div>
                  <a href="{{route('vendor.orders.index')}}" class="stretched-link"></a>
                </div>
              </div>

                <!-- Today's Orders -->
                <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100">
                  <div class="card-body d-flex align-items-center">
                    <div class="icon-container bg-gradient-primary text-white rounded-circle me-3">
                      <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div>
                      <h6 class="text-muted mb-1">Total Orders Pending</h6>
                      <h6 class="text-muted mb-1">Subdistrict Head</h6>
                      <h3 class="mb-0">{{ $subDistrictPendingOrders }}</h3>
                      <!-- <small class="text-success"><i class="fas fa-arrow-up"></i> 12% increase</small> -->
                    </div>
                  </div>
                  <a href="{{route('vendor.orders.index')}}" class="stretched-link"></a>
                </div>
              </div>

              <!-- Total Admissions -->
              <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100">
                  <div class="card-body d-flex align-items-center">
                    <div class="icon-container bg-gradient-warning text-white rounded-circle me-3">
                      <i class="fas fa-user-graduate"></i>
                    </div>
                    <div>
                      <h6 class="text-muted mb-1">Total Admissions</h6>
                      <h6 class="text-muted mb-1">Subdistrict Head</h6>
                      <h3 class="mb-0">{{ $subDistrictTotalAdmissions }}</h3>
                      <!-- <small class="text-primary">New students</small> -->
                    </div>
                  </div>
                  <a href="{{route('vendor.products.index')}}" class="stretched-link"></a>
                </div>
              </div>

              <!-- Monthly Earnings -->
              <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100">
                  <div class="card-body d-flex align-items-center">
                    <div class="icon-container bg-gradient-danger text-white rounded-circle me-3">
                      <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div>
                      <h6 class="text-muted mb-1">Total Earnings</h6>
                      <h6 class="text-muted mb-1">Subdistrict Head</h6>
                      <h3 class="mb-0">{{ $subDistrictMonthlyEarning }}</h3>
                      <!-- <small class="text-success"><i class="fas fa-arrow-up"></i> 20% increase</small> -->
                    </div>
                  </div>
                </div>
              </div>

               <!-- Bulk Adminssion  -->
               <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-info-subtle rounded-circle p-3">
                                <i class="fas fa-user-graduate fs-3 text-info"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Bulk Admission Total</h6>
                                <h6 class="text-muted mb-1">District Head</h6>
                                <h3 class="mb-0">{{ $BulkAdmission_count }}</h3>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 5px">
                            <div class="progress-bar bg-info" style="width: 70%"></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <style>
              .icon-container {
                width: 60px;
                height: 60px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.2));
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
              }

              .card {
                border-radius: 15px;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
              }

              .card:hover {
                transform: translateY(-10px);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
              }

              .bg-gradient-primary {
                background: linear-gradient(135deg, #6a11cb, #2575fc);
              }

              .bg-gradient-success {
                background: linear-gradient(135deg, #00c6ff, #0072ff);
              }

              .bg-gradient-warning {
                background: linear-gradient(135deg, #f7971e, #ffd200);
              }

              .bg-gradient-danger {
                background: linear-gradient(135deg, #f54ea2, #ff7676);
              }
            </style>





          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection