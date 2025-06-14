@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Shop Story
@endsection

@section('content')

<style>
    .hover-img .img-style > img{
            max-height: 300px;
            object-fit: cover;
        }
</style>




 <!-- awards start -->
      <section class="tf-page-title">
        <div class="container">
          <div class="box-title text-center">
            <h4 class="title text-warning">Trueshopkart Awards</h4>
            <div class="breadcrumb-list">
              <a class="breadcrumb-item text-white" href="index.html">Home</a>
              <div class="breadcrumb-item dot"><span></span></div>
              <div class="breadcrumb-item current text-grey-2">
                Trueshopkart Awards
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="flat-spacing-24">
        <div class="container">
          <div class="flat-wrap-cls tf-grid-layout tf-col-2 xl-col-3">
            @foreach ($data as $item)
    <div class="wg-cls style-abs2 style-lg hover-img">
        <a href="#" class="image-wrap relative">
            <div class="image img-style">
                <img
                  src="{{ url('/') }}/{{ $item->image }}"
                  data-src="{{ url('/') }}/{{ $item->image }}"
                  alt=""
                  class="ls-is-cached lazyloaded"
                />
            </div>
            <div class="cls-btn text-center">
               <p
  class="tf-btn btn-white hover-dark fs-12 fw-light"
  style="border-radius: 0; margin: 0; padding: 0;"
>
  {!! strip_tags($item->short_desc, '<b><i><strong><em><br>') !!}
</p>

            </div>
            <span class="tf-overlay"></span>
        </a>
        <div class="cls-content text-center">
            <p class="text-type text-xl-2 fw-medium link">
               {{$item->title}}
            </p>
        </div>
    </div>
@endforeach

           
          </div>
        </div>
      </section>

      <!-- awards end -->

@endsection