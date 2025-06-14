@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Shop Story
@endsection

@section('content')

<style>
    .hover-img .img-style > img{
            height: 300px;
            object-fit: cover;
    }
    .dd_box img{
            min-height: 300px;
    }
</style>


   <!-- awards start -->
      <section class="tf-page-title">
        <div class="container">
          <div class="box-title text-center">
            <h4 class="title text-warning">Media Room</h4>
            <div class="breadcrumb-list">
              <a class="breadcrumb-item text-white" href="/">Home</a>
              <div class="breadcrumb-item dot"><span></span></div>
              <div class="breadcrumb-item current text-grey-2">Media Room</div>
            </div>
          </div>
        </div>
      </section>

      <section class="flat-spacing-24">
        <div class="container">
          <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item mx-3" role="presentation">
              <button
                class="nav-link active"
                id="Press-tab"
                data-bs-toggle="tab"
                data-bs-target="#Press"
                type="button"
                role="tab"
                aria-controls="Press"
                aria-selected="true"
              >
                Press Release
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link"
                id="Gallery-tab"
                data-bs-toggle="tab"
                data-bs-target="#Gallery"
                type="button"
                role="tab"
                aria-controls="Gallery"
                aria-selected="false"
              >
                Photo Gallery
              </button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="Press"
              role="tabpanel"
              aria-labelledby="Press-tab"
            >
            @foreach ($data as $item)
                
              <div class="s-content">
                <div
                  class="blog-item style-2 hover-img mb-4"
                  style="
                    border: 1px dotted #000;
                    border-radius: 20px;
                    padding: 20px;
                  "
                >
                  <div class="entry_image">
                    <a href="#" class="img-style">
                      <div class="dd_box">
                        <img
                          src="{{url('/')}}/<?=$item->image ?>"
                          data-src="{{url('/')}}/<?=$item->image ?>"
                          alt=""
                          class="ls-is-cached lazyloaded"
                          style="width: 100%; height: 100%; object-fit: cover"
                        />
                      </div>
                    </a>
                  </div>
                  <div class="blog-content">
                    <a
                      href="#"
                      class="entry_title d-block text-xl fw-medium link"
                    >
                      <?=$item->title ?>
                    </a>
                    <p class="entry_sub text-md text-main">
                           <?=$item->short_desc ?>
                    </p>
                    <ul class="entry-meta">
                      <li class="entry_date">
                        <p class="text-md">
    {{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y') }}
</p>

                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              
            @endforeach
            </div>
            <div
              class="tab-pane fade"
              id="Gallery"
              role="tabpanel"
              aria-labelledby="Gallery-tab"
            >
              <div class="flat-wrap-cls tf-grid-layout tf-col-2 xl-col-3">
                @foreach ($photo as $item)
                    
                <div class="wg-cls style-abs2 style-lg hover-img">
                  <a href="#" class="image-wrap relative">
                    <div class="image img-style">
                      <img
                        src="{{url('/')}}/<?=$item->image ?>"
                        data-src="{{url('/')}}/<?=$item->image ?>"
                        alt=""
                        class="ls-is-cached lazyloaded"
                      />
                    </div>
                    <span class="tf-overlay"></span>
                  </a>
                </div>
                
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- awards end -->


@endsection