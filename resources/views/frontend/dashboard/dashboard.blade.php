@extends('frontend.dashboard.layouts.master')
@section('title')
{{$settings->site_name}} || Dashboard
@endsection
@section('content')
<section id="wsus__dashboard">
  <div class="container-fluid">
    @include('frontend.dashboard.layouts.sidebar')
    <div class="row">
      <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <h3>User Dashboard</h3>
        <br>
        <div class="dashboard_content">
          <div class="wsus__dashboard">
            <style>
              .dashboard-card {
                display: block;
                padding: 1.5rem;
                border-radius: 15px;
                height: 100%;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
              }

              .dashboard-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
              }

              .card-content {
                display: flex;
                align-items: center;
                gap: 1.5rem;
                color: white;
              }

              .icon-wrapper {
                background: rgba(255, 255, 255, 0.2);
                padding: 1rem;
                border-radius: 12px;
                font-size: 2rem;
              }

              .text-wrapper {
                flex-grow: 1;
              }

              .text-wrapper p {
                margin: 0;
                font-size: 0.9rem;
                opacity: 0.9;
              }

              .text-wrapper h4 {
                margin: 0.5rem 0 0;
                font-size: 1.5rem;
                font-weight: 600;
              }

              .gradient-red {
                background: linear-gradient(135deg, #FF6B6B 0%, #FF8E8E 100%);
              }

              .gradient-green {
                background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%);
              }

              .gradient-blue {
                background: linear-gradient(135deg, #2196F3 0%, #03A9F4 100%);
              }

              @media (max-width: 768px) {
                .card-content {
                  flex-direction: column;
                  text-align: center;
                  gap: 1rem;
                }
              }
            </style>


            <div class="row">
              <div class="col-xl-4 col-6 col-md-4 mb-4">
                <a class="dashboard-card gradient-red" href="{{route('user.orders.index')}}">
                  <div class="card-content">
                    <div class="icon-wrapper">
                      <i class="fas fa-cart-plus"></i>
                    </div>
                    <div class="text-wrapper">
                      <p class="text-light">Total Order</p>
                      <h4 class="text-light">{{$totalOrder}}</h4>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-xl-4 col-6 col-md-4 mb-4">
                <a class="dashboard-card gradient-green" href="javascript:void(0)">
                  <div class="card-content">
                    <div class="icon-wrapper">
                      <i class="fas fa-cart-plus"></i>
                    </div>
                    <div class="text-wrapper text-light">
                      <p class="text-light">Total Amount</p>
                      <h4 class="text-light">{{$totalAmount}}</h4>
                      <!-- <h4 class="text-light">{{$pendingOrder}}</h4> -->
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-xl-4 col-6 col-md-4 mb-4">
                <a class="dashboard-card gradient-blue" href="{{route('user.review.index')}}">
                  <div class="card-content">
                    <div class="icon-wrapper">
                      <i class="fas fa-star"></i>
                    </div>
                    <div class="text-wrapper">
                      <p class="text-light">Wishlist</p>
                      <h4 class="text-light">{{$reviews}}</h4>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            {{-- <!-- Announcement Section -->
            <div class="announcement-section mt-4">
              <div class="section-header d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0"><i class="fas fa-bullhorn me-2"></i>Important Announcements</h4>
                <div class="announcement-filters">
                  <button class="btn btn-sm btn-outline-primary active" data-filter="all">All</button>
                  <button class="btn btn-sm btn-outline-danger" data-filter="exam">Exams</button>
                  <button class="btn btn-sm btn-outline-success" data-filter="result">Results</button>
                  <button class="btn btn-sm btn-outline-info" data-filter="event">Events</button>
                </div>
              </div> --}}

              {{-- <div class="row">
                <div class="col-12">
                  <div class="announcement-container">
                    @forelse($announcements as $announcement)
                    <div class="announcement-card {{ $announcement->type }}-card">
                      <div class="announcement-content">
                        <span class="badge bg-{{ $announcement->type === 'exam' ? 'danger' : ($announcement->type === 'result' ? 'success' : 'info') }} mb-2">
                          {{ ucfirst($announcement->type) }}
                        </span>
                        <h5><i class="fas {{ $announcement->icon ?? 'fa-bullhorn' }} me-2"></i>{{ $announcement->title }}</h5>
                        <p class="announcement-text">{{ $announcement->description }}</p>
                        <div class="announcement-meta">
                          <span><i class="far fa-calendar me-1"></i>{{ $announcement->announcement_date->format('M d, Y') }}</span>
                          @if($announcement->location)
                          <span><i class="fas fa-map-marker-alt me-1"></i>{{ $announcement->location }}</span>
                          @endif
                          @if($announcement->link)
                          <span><i class="fas fa-link me-1"></i><a href="{{ $announcement->link }}">View Details</a></span>
                          @endif
                        </div>
                      </div>
                    </div>
                    @empty
                    <div class="col-12">
                      <p class="text-center">No announcements available.</p>
                    </div>
                    @endforelse
                  </div>

                </div>
              </div> --}}
            {{-- </div> --}}

            <style>
              .announcement-section {
                background: #fff;
                padding: 2rem;
                border-radius: 15px;
                box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
              }

              .announcement-filters {
                gap: 0.5rem;
                display: flex;
              }

              .announcement-filters .btn {
                margin-left: 0.5rem;
              }

              .announcement-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 1.5rem;
              }

              .announcement-card {
                background: #f8f9fa;
                border-radius: 12px;
                padding: 1.5rem;
                transition: all 0.3s ease;
              }

              .exam-card {
                border-left: 4px solid #dc3545;
              }

              .result-card {
                border-left: 4px solid #198754;
              }

              .event-card {
                border-left: 4px solid #0dcaf0;
              }

              .announcement-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
              }

              .announcement-content h5 {
                color: #2c3e50;
                margin-bottom: 0.8rem;
                font-weight: 600;
              }

              .announcement-text {
                color: #6c757d;
                font-size: 0.95rem;
                margin-bottom: 1rem;
              }

              .announcement-meta {
                display: flex;
                justify-content: space-between;
                color: #6c757d;
                font-size: 0.85rem;
              }

              .announcement-meta a {
                color: #0d6efd;
                text-decoration: none;
              }

              .announcement-meta a:hover {
                text-decoration: underline;
              }

              .badge {
                padding: 0.5em 1em;
                font-weight: 500;
              }

              @media (max-width: 768px) {
                .announcement-container {
                  grid-template-columns: 1fr;
                }

                .announcement-filters {
                  display: grid;
                  grid-template-columns: repeat(2, 1fr);
                  gap: 0.5rem;
                  margin-top: 1rem;
                }

                .announcement-filters .btn {
                  margin-left: 0;
                }
              }
            </style>



          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection