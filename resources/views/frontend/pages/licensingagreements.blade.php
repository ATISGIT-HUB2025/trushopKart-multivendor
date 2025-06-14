@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || licensing-agreements
@endsection

@section('content')


  <!-- awards start -->
      <section class="tf-page-title">
        <div class="container">
          <div class="box-title text-center">
            <h4 class="title text-warning">Licensing Agreements</h4>
            <div class="breadcrumb-list">
              <a class="breadcrumb-item text-white" href="index.html">Home</a>
              <div class="breadcrumb-item dot"><span></span></div>
              <div class="breadcrumb-item current text-grey-2">
                Licensing Agreements
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="flat-spacing-24">
        <div class="container">
          <div class="mb-5">
            <div class="flat-title relative mb_5">
              <h3 class="title fw-normal fst-italic font-3 letter-0">
                End User License Agreements &  Warranties
              </h3>
              
            </div>
            <div class="row gy-3">
                @foreach ($data as $item)
                    
              <div class="col-lg-3">
                <div
                  class="card p-4 hover-overlay animate-dark"
                  style="cursor: pointer; width: 100%; height: 100px"
                >
                  <a href="" class="mb-menu-link" download target="_blank">
                    <i
                      class="bi bi-file-pdf text-dark"
                      style="font-size: 18px"
                    ></i>
                    <span class="title"><?=$item->title ?></span>
                  </a>
                </div>
              </div>


                @endforeach
        
            </div>
          </div>

       
        </div>
      </section>

      <!-- awards end -->


@endsection