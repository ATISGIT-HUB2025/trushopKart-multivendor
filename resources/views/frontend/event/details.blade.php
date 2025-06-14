@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || About
@endsection

@section('content')

<style>
  a.card-link {
    text-decoration: none;
  }

  .thumbnail-date-day,
  .thumbnail-date-month {
    color: #fff;
  }

  .thumbnail {
    border-radius: 3px;
    height: 52px;
    width: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }

  .thumbnail-date-day {
    font-size: 24px;
    font-weight: 700;
  }

  .thumbnail-date-month {
    font-size: 10px;
    text-transform: uppercase;
  }

  .tags-list-town {
    background-color: #053f71;
    padding: 4px 6px;
    border-radius: 2px;
    color: #fff;
    font-size: 12px;
  }

  .text-over {
    font-size: 1.3em;
    font-weight: 900;
    color: #fff;
    padding: 20px;
  }

  .card {
    border: 1px solid #eee;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border-radius: 0;
  }

  .card-img-top {
    border-radius: 0;
  }

  .image-container {
    position: relative;
    overflow: hidden;
  }

  .image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.57);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .bottom-left,
  .bottom-right,
  .top-right {
    position: absolute;
    z-index: 2;
  }

  .bottom-left {
    bottom: 14px;
    left: 16px;
  }

  .bottom-right {
    bottom: 8px;
    right: 16px;
    color: #fff;
    font-size: 10px;
  }

  .top-right {
    top: 16px;
    right: 16px;
  }

  /* =============result_top_box==================== */

  .result_top_box {
    border: 1px solid red;
    padding: 10px;
    margin-bottom: 10px;
  }

  .student_info {
    border: 1px solid red;
    padding: 10px;
    margin-bottom: 10px;
  }

  .student_result {
    border: 1px solid red;
    padding: 10px;
    margin-bottom: 10px;
  }

  .barcode_result {
    border: 1px solid red;
    padding: 10px;
    margin-bottom: 10px;
  }

  .in_icon {
    background: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 20px;
    height: 20px;
    border-radius: 50px;
  }

  .icon-list {
    display: flex;
    justify-content: space-between;
  }

  .icons {
    display: flex;
    gap: 10px;
  }

  .in_icon i {
    font-size: 8px;
  }
</style>
<!--============================
        BREADCRUMB START
    ==============================-->
<!--============================
        BREADCRUMB END
    ==============================-->


<!--============================
        PAYMENT PAGE START
    ==============================-->
<section id="">
  <div class="container py-5">
    <div class="row gy-3">
      <div class="col-lg-8">
        <div class="card h-100" style="position: relative">
          <div class="bottom-right">DPAM</div>
          <div class="top-right">
            <div class="tags-list mb-2">
              <span class="tags-list-town text-uppercase">{{ $event->location }}</span>
            </div>
          </div>
          <div class="image-container">
            <div class="bottom-left">
              <div class="thumbnail" style="background-color: #053f71">
                <div class="thumbnail-date">
                  <span class="thumbnail-date-day">{{ $event->start_datetime->format('d') }}</span>
                  <span class="thumbnail-date-month">{{ $event->start_datetime->format('M') }}</span>
                </div>
              </div>
            </div>
            <img src="{{ asset($event->image) }}" class="card-img-top img-fluid" alt="Event Image" />
          </div>

          <div class="p-3">
            <h2>{{ $event->title }}</h2>
            <div>
              <p class="" style="text-align: justify">
                {!! $event->description !!}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        @if($event->video_url)
        <div class="card">
          <iframe width="100%" height="200" src="{{ $event->video_url }}" frameborder="0" allowfullscreen></iframe>
        </div>
        @endif
        <div class="card p-4">
          <h4 class="text-primary">Event Details</h4>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row" style="font-size: 14px">Event Name</th>
                <td>{{ $event->title }}</td>
              </tr>
              <tr>
                <th scope="row" style="font-size: 14px">Event Start Date</th>
                <td>{{ $event->start_datetime->format('d M Y, h:i A') }}</td>
              </tr>
              <tr>
                <th scope="row" style="font-size: 14px">Event End Date</th>
                <td>{{ $event->end_datetime->format('d M Y, h:i A') }}</td>
              </tr>
              <tr>
                <th scope="row" style="font-size: 14px">Event Location</th>
                <td>{{ $event->location }}</td>
              </tr>
              <tr>
                <th scope="row" style="font-size: 14px">Event Organizer</th>
                <td>{{ $event->organizer }}</td>
              </tr>
            </tbody>
          </table>

          <div class="mt-3">
            @auth
            @if($isAlreadyRegistered)
            <button type="button" class="btn btn-success w-100" disabled>
              <i class="fas fa-check-circle me-2"></i>Already Registered
            </button>
            @else
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#joinEventModal">
              <i class="fas fa-calendar-check me-2"></i>Join This Event
            </button>
            @endif
            @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">
              <i class="fas fa-sign-in-alt me-2"></i>Login to Join Event
            </a>
            @endauth
          </div>


        </div>
      </div>
    </div>
  </div>
</section>

@auth
<!-- Join Event Modal -->
<div class="modal fade" id="joinEventModal" tabindex="-1" aria-labelledby="joinEventModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="joinEventModalLabel">Join "{{ $event->title }}"</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('event.join') }}" method="POST">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event->id }}">
        <div class="modal-body">
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
          </div>
          <div class="mb-3">
            <label for="additional_info" class="form-label">Additional Information</label>
            <textarea class="form-control" id="additional_info" name="additional_info" rows="3"></textarea>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="agreeTerms" name="agree_terms" required>
            <label class="form-check-label" for="agreeTerms">
              I agree to the terms and conditions of the event
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit Registration</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endauth
<!--============================
        PAYMENT PAGE END
    ==============================-->
@endsection