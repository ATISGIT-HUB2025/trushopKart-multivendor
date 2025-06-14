@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Shop Story
@endsection

@section('content')


      <!-- story start -->
      <section class="tf-page-title">
        <div class="container">
          <div class="box-title text-center">
            <h4 class="title text-warning">BShopee Story</h4>
            <div class="breadcrumb-list">
              <a class="breadcrumb-item text-white" href="index.html">Home</a>
              <div class="breadcrumb-item dot"><span></span></div>
              <div class="breadcrumb-item current text-grey-2">
                BShopee Story
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="s-term-user flat-spacing-13">
        <div class="container">
          <div class="content shadow-sm p-4">
            <div class="term-item">
              <div class="text-wrap">
                <p class="term-text body-text text-main">
                     {!!@$shopstory->content!!}
                </p>
              </div>
            </div>

          
          </div>
        </div>
      </section>
      <!-- story end -->


@endsection
