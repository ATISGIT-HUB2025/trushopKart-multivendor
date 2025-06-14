@extends('teacher.layouts.master')
@section('title')
{{$settings->site_name}} || Dashboard
@endsection
@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
    @include('teacher.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content">
            <div class="wsus__dashboard">
            <div class="row g-4">
    <!-- Statistics Cards -->
    <div class="col-12 mb-4">
        <div class="row g-3">
            <!-- Today's Orders -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-primary-subtle rounded-circle p-3">
                                <i class="fas fa-shopping-cart fs-3 text-primary"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Today's Orders</h6>
                                <h3 class="mb-0 fw-bold">{{$todaysOrders}}</h3>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 5px">
                            <div class="progress-bar bg-primary" style="width: 75%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Orders -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-warning-subtle rounded-circle p-3">
                                <i class="fas fa-clock fs-3 text-warning"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Pending Orders</h6>
                                <h3 class="mb-0 fw-bold">{{$pendingOrders}}</h3>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 5px">
                            <div class="progress-bar bg-warning" style="width: 65%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-success-subtle rounded-circle p-3">
                                <i class="fas fa-chart-line fs-3 text-success"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Total Orders</h6>
                                <h3 class="mb-0 fw-bold">{{$totalOrders}}</h3>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 5px">
                            <div class="progress-bar bg-success" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Today's Earnings -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-info-subtle rounded-circle p-3">
                                <i class="fas fa-dollar-sign fs-3 text-info"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Total Amount</h6>
                                <h3 class="mb-0 fw-bold">{{$settings->currency_icon}}{{$totalEarnings}}</h3>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 5px">
                            <div class="progress-bar bg-info" style="width: 70%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-primary-subtle rounded-circle p-3">
                                <i class="fas fa-shopping-cart fs-3 text-primary"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Bulk Admission Total</h6>
                                <h3 class="mb-0 fw-bold">{{$BulkAdmission_count}}</h3>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 5px">
                            <div class="progress-bar bg-primary" style="width: 75%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.stat-card {
    border-radius: 15px;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15) !important;
}

.stat-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.bg-primary-subtle { background-color: rgba(13, 110, 253, 0.1); }
.bg-warning-subtle { background-color: rgba(255, 193, 7, 0.1); }
.bg-success-subtle { background-color: rgba(25, 135, 84, 0.1); }
.bg-info-subtle { background-color: rgba(13, 202, 240, 0.1); }

.progress {
    border-radius: 10px;
    background-color: #f0f2f5;
}

.card-body {
    position: relative;
    z-index: 1;
}

.card-body::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1));
    z-index: -1;
}
</style>


              

            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
