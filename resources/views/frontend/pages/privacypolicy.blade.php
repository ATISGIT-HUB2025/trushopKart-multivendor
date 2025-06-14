@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Payment
@endsection

@section('content')



   <!-- blog start -->
      <section class="tf-page-title">
        <div class="container">
          <div class="box-title text-center">
            <h4 class="title text-warning">Privacy Policy</h4>
            <div class="breadcrumb-list">
              <a class="breadcrumb-item text-white" href="index.html">Home</a>
              <div class="breadcrumb-item dot"><span></span></div>
              <div class="breadcrumb-item current text-grey-2">
                Privacy Policy
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="s-term-user flat-spacing-13">
        <div class="container">
          <div class="content">
            <div class="term-item">
              
              <div class="text-wrap">
                <p class="term-text body-text text-main text-justify">
                   {!!@$data->content!!}
                </p>
                
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- blog end -->


@endsection