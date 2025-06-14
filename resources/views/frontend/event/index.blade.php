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
<section id="wsus__breadcrumb">
    <div class="wsus_breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Event</h4>
                    <ul>
                        <li><a href="{{route('home')}}">home</a></li>
                        <li><a href="javascript:;">Event</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
        BREADCRUMB END
    ==============================-->


<!--============================
        PAYMENT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
    <div class="container py-5">
        <div class="row gy-3">
            @foreach($events as $event)
            <div class="col-lg-4">
                <a href="{{ route('event.details', $event->id) }}">
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
                            <img src="{{ asset($event->image) }}" class="card-img-top" alt="Event Image" />
                            <div class="image-overlay text-over text-center d-flex justify-content-center align-items-center">
                                <div class="event-title">
                                    {{ $event->title }}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--============================
        PAYMENT PAGE END
    ==============================-->
@endsection