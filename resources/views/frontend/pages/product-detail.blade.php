@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Product Details
@endsection

@section('content')

@section('headerLinks')

<style>
    .footer_2{
        margin-top:0px;
    }
    .bg-info-subtle {
    background-color: #cff4fc !important;
}
.bi-check-circle::before {
    content: "" !important;
}
.combo-item.active {
    background-color:#033364 !important;
    border: 2px solid #28a745;
    transform: scale(1.02);
}

h6.mb-1.fw-bold.text-dark.labelForcomboItems {
      font-size: 10px;
    line-height: normal;
    font-weight: 400 !important;
}

.combo-item.active h6.mb-1.fw-bold.text-dark.labelForcomboItems{
    color: #fff !important;
}

.combo-item .price_for_combo{
    font-size: 12px;
}

</style>

 <link rel="stylesheet" href="{{ url('fronttheme') }}/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ url('fronttheme') }}/css/animate.css" />
     <link rel="stylesheet" href="{{ url('fronttheme') }}/css/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('fronttheme') }}/css/custom.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

@endsection

@section('footerLinks')

    {{-- <script src="{{ url('fronttheme') }}/js/jquery.min.js"></script> --}}
    <script src="{{ url('fronttheme') }}/js/swiper-bundle.min.js"></script>
    <script src="{{ url('fronttheme') }}/js/carousel.js"></script>
    {{-- <script src="{{ url('fronttheme') }}/js/bootstrap-select.min.js"></script> --}}
    {{-- <script src="{{ url('fronttheme') }}/js/lazysize.min.js"></script> --}}
    {{-- <script src="{{ url('fronttheme') }}/js/count-down.js"></script> --}}
    {{-- <script src="{{ url('fronttheme') }}/js/wow.min.js"></script> --}}
    {{-- <script src="{{ url('fronttheme') }}/js/multiple-modal.js"></script> --}}
    {{-- <script src="{{ url('fronttheme') }}/js/infinityslide.js"></script> --}}
    {{-- <script src="{{ url('fronttheme') }}/js/simpleParallaxVanilla.umd.js"></script> --}}
    {{-- <script src="{{ url('fronttheme') }}/js/paralaxei.js"></script> --}}
    {{-- <script src="{{ url('fronttheme') }}/js/drift.min.js"></script> --}}
    {{-- <script src="{{ url('fronttheme') }}/js/main.js"></script> --}}
    {{-- <script src="{{ url('fronttheme') }}/js/photoswipe-lightbox.umd.min.js"></script> --}}
    {{-- <script src="{{ url('fronttheme') }}/js/photoswipe.umd.min.js"></script> --}}


@endsection


  <!--==========================
      PRODUCT MODAL VIEW START
    ===========================-->
    <section class="product_popup_modal">
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="far fa-times"></i></button>
                        <div class="row">
                            <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                                <div class="wsus__quick_view_img">
                                    <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                        href="https://youtu.be/7m16dFI1AF8">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    <div class="row modal_slider">
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="{{ url('fronttheme') }}/images/zoom1.jpg" alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="{{ url('fronttheme') }}/images/zoom2.jpg" alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="{{ url('fronttheme') }}/images/zoom3.jpg" alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="{{ url('fronttheme') }}/images/zoom4.jpg" alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="wsus__pro_details_text">
                                    <a class="title" href="#">Electronics Black Wrist Watch</a>
                                    <p class="wsus__stock_area"><span class="in_stock">in stock</span> (167 item)</p>
                                    <h4>$50.00 <del>$60.00</del></h4>
                                    <p class="review">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>20 review</span>
                                    </p>
                                    <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                                    <div class="wsus_pro_hot_deals">
                                        <h5>offer ending time : </h5>
                                        <div class="simply-countdown simply-countdown-one"></div>
                                    </div>
                                    <div class="wsus_pro_det_color">
                                        <h5>color :</h5>
                                        <ul>
                                            <li><a class="blue" href="#"><i class="far fa-check"></i></a></li>
                                            <li><a class="orange" href="#"><i class="far fa-check"></i></a></li>
                                            <li><a class="yellow" href="#"><i class="far fa-check"></i></a></li>
                                            <li><a class="black" href="#"><i class="far fa-check"></i></a></li>
                                            <li><a class="red" href="#"><i class="far fa-check"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="wsus_pro__det_size">
                                        <h5>size :</h5>
                                        <ul>
                                            <li><a href="#">S</a></li>
                                            <li><a href="#">M</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">XL</a></li>
                                        </ul>
                                    </div>
                                    <div class="wsus__quentity">
                                        <h5>quentity :</h5>
                                        <form class="select_number">
                                            <input class="number_area" type="text" min="1" max="100" value="1" />
                                        </form>
                                        <h3>$50.00</h3>
                                    </div>
                                    <div class="wsus__selectbox">
                                        <div class="row">
                                            <div class="col-xl-6 col-sm-6">
                                                <h5 class="mb-2">select:</h5>
                                                <select class="select_2" name="state">
                                                    <option>default select</option>
                                                    <option>select 1</option>
                                                    <option>select 2</option>
                                                    <option>select 3</option>
                                                    <option>select 4</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-6 col-sm-6">
                                                <h5 class="mb-2">select:</h5>
                                                <select class="select_2" name="state">
                                                    <option>default select</option>
                                                    <option>select 1</option>
                                                    <option>select 2</option>
                                                    <option>select 3</option>
                                                    <option>select 4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="wsus__button_area">
                                        {{-- <li><a class="add_cart" href="#">add to cart</a></li> --}}
                                        
                                        <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                        <li><a href="#"><i class="far fa-random"></i></a></li>
                                    </ul>
                                    <p class="brand_model"><span>model :</span> 12345670</p>
                                    <p class="brand_model"><span>brand :</span> The Northland</p>
                                    <div class="wsus__pro_det_share">
                                        <h5>share :</h5>
                                        <ul class="d-flex">
                                            <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a class="whatsapp" href="#"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
      PRODUCT MODAL VIEW END
    ===========================-->


    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>products details</h4>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/">Product</a></li>
                            <li><a href="javascript:;">product details</a></li>
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
        PRODUCT DETAILS START
    ==============================-->
    <section id="wsus__product_details">
        <div class="container">
            <div class="wsus__details_bg">
                <div class="row">
                    <div class="col-xl-4 col-md-5 col-lg-5" style="z-index:999">
                        <div id="sticky_pro_zoom" >
                            <div class="exzoom hidden" id="exzoom">
                                <div class="exzoom_img_box">
                                    @if ($product->video_link)
                                        <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                            href="{{$product->video_link}}">
                                            <i class="fas fa-play"></i>
                                        </a>
                                    @endif
                                    <ul class='exzoom_img_ul'>
                                        <li><img class="zoom ing-fluid w-100" src="{{asset($product->thumb_image)}}" alt="product"></li>
                                        @foreach ($product->productImageGalleries as $productImage)
                                            <li><img class="zoom ing-fluid w-100" src="{{asset($productImage->image)}}" alt="product"></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> <i
                                            class="far fa-chevron-left"></i> </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> <i
                                            class="far fa-chevron-right"></i> </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-md-7 col-lg-7 tf-product-info-wrap ">
                        <div class="wsus__pro_details_text">
                            <a class="title" href="javascript:;">{{$product->name}}</a>
                            @if ($product->qty > 0)
                            <p class="wsus__stock_area"><span class="in_stock">in stock</span> ({{$product->qty}} item)</p>
                            @elseif ($product->qty === 0)
                            <p class="wsus__stock_area"><span class="in_stock">stock out</span> ({{$product->qty}} item)</p>
                            @endif
                            @if (checkDiscount($product))
                                <h4>{{$settings->currency_icon}}{{$product->offer_price}} <del>{{$settings->currency_icon}}{{$product->price}}</del></h4>
                            @else
                                <h4>{{$settings->currency_icon}}{{$product->price}}</h4>
                            @endif
                            <p class="wsus__pro_rating">
                                @php
                                $avgRating = $product->reviews()->avg('rating');
                                $fullRating = round($avgRating);
                                @endphp

                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $fullRating)
                                    <i class="fas fa-star"></i>
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                @endfor

                                <span>({{count($product->reviews)}} review)</span>
                            </p>
                           <p class="description">{!! $product->short_description !!}</p>

                            <form class="shopping-cart-form">
                                <div class="wsus__selectbox">
                                    <div class="row">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        @foreach ($product->variants as $variant)
                                        @if ($variant->status != 0)
                                            <div class="col-xl-6 col-sm-6">
                                                <h5 class="mb-2">{{$variant->name}}: </h5>
                                                <select class="select_2" name="variants_items[]">
                                                    @foreach ($variant->productVariantItems as $variantItem)
                                                        @if ($variantItem->status != 0)
                                                            <option value="{{$variantItem->id}}" {{$variantItem->is_default == 1 ? 'selected' : ''}}>{{$variantItem->name}} (${{$variantItem->price}})</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        @endforeach

                                    </div>
                                </div>

                                {{-- <div class="wsus__quentity">
                                    <h5>quentity :</h5>
                                    <div class="select_number">
                                        <input class="number_area" name="qty" type="text" min="1" max="100" value="1" />
                                    </div>

                                </div> --}}


                                @if ($product->id == 54)
                                  
                                
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="variant-picker-label">
                                            <label class="mb-2 fs-12">Number of PCs:</label>
                                            <select class="form-select form-control pc-count" style="font-size: 12px">
                                              <option selected>choose an option</option>
                                              <option>3 Devices</option>
                                            </select>
                                          </div>
                                        </div>

                                    <div class="col-lg-6 mt-3 mt-sm-0">
                                      <div class="variant-picker-label">
                                        <label class="mb-2 fs-12">Period of validity</label>
                                        <select class="form-select form-control validity-period" style="font-size: 12px">
                                          <option selected>Choose an option</option>
                                          <option>1 year</option>
                                        </select>
                                      </div>
                                      </div>

                                 </div>

                                 @endif


@php
    $selectedComboProducts = json_decode($product->combo_items, true) ?? [];
    $comboProducts = \App\Models\Product::whereIn('id', $selectedComboProducts)->get();
@endphp

@if($product->product_mode === 'combo')
<div class="card mt-4 mb-4" id="combo_products_display_box">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <strong><i class="fas fa-boxes me-1"></i> Select Combo Products</strong>
        <span class="badge bg-light text-dark" id="combo-selected-count">0 Selected</span>
    </div>
    <div class="card-body p-3">
        <div class="row">
            @foreach($comboProducts as $productItem)
                <div class="col-md-6 mb-3">
                    <div class="combo-item product-card border rounded p-3 shadow-sm d-flex align-items-center gap-3" style="transition: 0.3s;">
                        <input type="checkbox"
                               name="combo_products[]"
                               value="{{ $productItem->id }}"
                               id="combo_{{ $productItem->id }}"
                               class="form-check-input combo_product_checkbox me-2">

                        <label for="combo_{{ $productItem->id }}"
                               class="d-flex align-items-center gap-3 w-100 cursor-pointer mb-0">
                            <img src="{{ asset($productItem->thumb_image ?? 'default.png') }}"
                                 alt="{{ $productItem->name }}"
                                 width="60" height="60"
                                 class="rounded border" style="object-fit: cover;">
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold text-dark labelForcomboItems">{{ $productItem->name }}</h6>
                                <small class="text-muted"> @if (checkDiscount($product))
                                <h4 class="price_for_combo">{{$settings->currency_icon}}{{$product->offer_price}} <del>{{$settings->currency_icon}}{{$product->price}}</del></h4>
                            @else
                                <h4 class="price_for_combo">{{$settings->currency_icon}}{{$product->price}}</h4>
                            @endif</small>
                            </div>
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif




                                <ul class="wsus__button_area mt-3 mt-sm-3">
                                    {{-- <li><button type="submit" class="add_cart" href="#">add to cart</button></li> --}}
                                   
                                      <li class="">
                                        <button type="button"  class="purchasenowbutton common_btn button_yy me-3" data-id="{{ $product->id }}">
                                          Purchase Now
                                        </button>
                                      </li>

                                                                        
                                                                          @if($product->book_sample)
                                          <li>
                                              <button type="button" class="add_cart" data-bs-toggle="modal" data-bs-target="#pdfModal">
                                                  View Sample PDF
                                              </button>
                                          </li>
                                      @endif

                                    <li><a style="border: 1px solid gray;
                                        padding: 7px 11px;
                                        border-radius: 100%;" href="javascript:;" class="add_to_wishlist" data-id="{{$product->id}}"><i class="fal fa-heart"></i></a></li>



                                </ul>
                            </form>
                            <p class="brand_model"><span>brand :</span> {{$product->brand->name}}</p>
                            
                        </div>

                          <div class="mb-3">
                      <div class="product-stock bg-info-subtle p-3 mb-3">
                        <p class="fs-16 fw-bold">
                          Best protection for Android devices
                        </p>
                      </div>
                          {!! $product->android_desc !!}
                      <!-- <ul class="d-flex flex-column" style="gap: 10px">
                        <li>
                          <i class="bi bi-check-circle"></i> Best protection for
                          your Android smartphone and tablet
                        </li>
                        <li>
                          <i class="bi bi-check-circle"></i> Protects you from
                          falling victim to link-based mobile scams IMPROVED
                        </li>
                        <li>
                          <i class="bi bi-check-circle"></i> Secure VPN for a
                          fast, anonymous and safe experience while surfing the
                          web – 200 MB/ day IMPROVED
                        </li>
                        <li>
                          <i class="bi bi-check-circle"></i> Remotely locate,
                          lock and wipe your Android device in case of loss or
                          theft
                        </li>
                        <li>
                          <i class="bi bi-check-circle"></i> Account Privacy
                          that verifies whether your email account has been
                          breached
                        </li>
                        <li>
                          <i class="bi bi-check-circle"></i> Minimal impact on
                          battery life
                        </li>
                      </ul> -->

                      <div class="product-stock bg-info-subtle p-3 mb-3 mt-3">
                        <p class="fs-16 fw-bold">
                          Enjoy your iOS. We keep it safe.
                        </p>
                      </div>
                          {!! $product->ios_desc !!}
                      <!-- <ul class="d-flex flex-column" style="gap: 10px">
                        <li>
                          <i class="bi bi-check-circle"></i> Get the most
                          powerful protection against threats with the least
                          impact on battery
                        </li>
                        <li>
                          <i class="bi bi-check-circle"></i> Protect your
                          personal data: passwords, address, social and
                          financial information
                        </li>
                        <li>
                          <i class="bi bi-check-circle"></i> Easily check your
                          phone security to detect and fix misconfigurations
                          that might expose it
                        </li>
                        <li>
                          <i class="bi bi-check-circle"></i> Avoid accidental
                          data exposure and misuse for all installed apps
                        </li>
                        <li>
                          <i class="bi bi-check-circle"></i> Scan your device to
                          achieve optimal security and privacy settings
                        </li>
                        <li>
                          <i class="bi bi-check-circle"></i> Gain usage insights
                          into your online activity and history of prevented
                          incidents
                        </li>
                        <li>
                          <i class="bi bi-check-circle"></i> Check your online
                          accounts against data breaches
                        </li>
                        <li>
                          <i class="bi bi-check-circle"></i> Encrypt all
                          internet traffic with the included VPN
                        </li>
                      </ul> -->
                    </div>
                    </div>

                </div>
            </div>

            {{-- <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__pro_det_description">
                        <div class="wsus__details_bg">
                            <ul class="nav nav-pills mb-3" id="pills-tab3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab7" data-bs-toggle="pill"
                                        data-bs-target="#pills-home22" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Description</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Vendor Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab2" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact2" type="button" role="tab"
                                        aria-controls="pills-contact2" aria-selected="false">Reviews</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent4">
                                <div class="tab-pane fade  show active " id="pills-home22" role="tabpanel"
                                    aria-labelledby="pills-home-tab7">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="wsus__description_area">
                                                {!!$product->long_description!!}
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="wsus__pro_det_vendor">
                                        <div class="row">
                                            <div class="col-xl-6 col-xxl-5 col-md-6">
                                                <div class="wsus__vebdor_img">
                                                    <img src="{{asset($product->vendor->banner)}}" alt="vensor" class="img-fluid w-100">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-xxl-7 col-md-6 mt-4 mt-md-0">
                                                <div class="wsus__pro_det_vendor_text">
                                                    <h4>{{$product->vendor->user->name}}</h4>
                                                    <p class="rating">
                                                        @php
                                                        $avgRating = $product->reviews()->avg('rating');
                                                        $fullRating = round($avgRating);
                                                        @endphp

                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $fullRating)
                                                            <i class="fas fa-star"></i>
                                                            @else
                                                            <i class="far fa-star"></i>
                                                            @endif
                                                        @endfor

                                                        <span>({{count($product->reviews)}} review)</span>
                                                    </p>
                                                    <p><span>Store Name:</span> {{$product->vendor->shop_name}}</p>
                                                    <p><span>Address:</span> {{$product->vendor->address}}</p>
                                                    <p><span>Phone:</span> {{$product->vendor->phone}}</p>
                                                    <p><span>mail:</span> {{$product->vendor->email}}</p>
                                                    <a href="vendor_details.html" class="see_btn">visit store</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="wsus__vendor_details">
                                                    {!!$product->vendor->description!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact2" role="tabpanel"
                                    aria-labelledby="pills-contact-tab2">
                                    <div class="wsus__pro_det_review">
                                        <div class="wsus__pro_det_review_single">
                                            <div class="row">
                                                <div class="col-xl-8 col-lg-7">
                                                    <div class="wsus__comment_area">
                                                        <h4>Reviews <span>{{count($reviews)}}</span></h4>
                                                        @foreach ($reviews as $review)
                                                        <div class="wsus__main_comment">
                                                            <div class="wsus__comment_img">
                                                                <img src="{{asset($review->user->image)}}" alt="user"
                                                                    class="img-fluid w-100">
                                                            </div>
                                                            <div class="wsus__comment_text reply">
                                                                <h6>{{$review->user->name}} <span>{{$review->rating}} <i
                                                                            class="fas fa-star"></i></span></h6>
                                                                <span>{{date('d M Y', strtotime($review->created_at))}}</span>
                                                                <p>{{$review->review}}
                                                                </p>
                                                                <ul class="">
                                                                    @if (count($review->productReviewGalleries) > 0)

                                                                    @foreach ($review->productReviewGalleries as $image)

                                                                    <li><img src="{{asset($image->image)}}" alt="product"
                                                                            class="img-fluid "></li>
                                                                    @endforeach
                                                                    @endif

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        @endforeach

                                                        <div class="mt-5">
                                                            @if ($reviews->hasPages())
                                                                {{$reviews->links()}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-5 mt-4 mt-lg-0">
                                                    @auth
                                                    @php
                                                        $isBrought = false;
                                                        $orders = \App\Models\Order::where(['user_id' => auth()->user()->id, 'order_status' => 'delivered'])->get();
                                                        foreach ($orders as $key => $order) {
                                                           $existItem = $order->orderProducts()->where('product_id', $product->id)->first();

                                                           if($existItem){
                                                            $isBrought = true;
                                                           }
                                                        }

                                                    @endphp

                                                    @if ($isBrought === true)
                                                    <div class="wsus__post_comment rev_mar" id="sticky_sidebar3">
                                                        <h4>write a Review</h4>
                                                        <form action="{{route('user.review.create')}}" enctype="multipart/form-data" method="POST">
                                                            @csrf
                                                            <p class="rating">
                                                                <span>select your rating : </span>
                                                            </p>

                                                            <div class="row">

                                                                <div class="col-xl-12 mb-4">
                                                                    <div class="wsus__single_com">
                                                                        <select name="rating" id="" class="form-control">
                                                                            <option value="">Select</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-12">
                                                                    <div class="col-xl-12">
                                                                        <div class="wsus__single_com">
                                                                            <textarea cols="3" rows="3" name="review"
                                                                                placeholder="Write your review"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="img_upload">
                                                                <div class="">
                                                                    <input type="file" name="images[]" multiple>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="product_id" id="" value="{{$product->id}}">
                                                            <input type="hidden" name="vendor_id" id="" value="{{$product->vendor_id}}">

                                                            <button class="common_btn" type="submit">submit
                                                                review</button>
                                                        </form>
                                                    </div>
                                                    @endif
                                                    @endauth

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}
        </div>
    </section>
    <!--============================
        PRODUCT DETAILS END
    ==============================-->

      <!-- Take a Look Inside -->
      <section class="flat-spacing-30 section-results pb-0">
        <div class="container">
          <div class="flat-title relative mb_5">
            <h3 class="title fw-normal fst-italic font-3 letter-0">
              Best Protection for Android
            </h3>
            <p class="fs-14">
              Bitdefender Mobile Security provides unbeatable cloud-based
              malware detection and a smart anti-theft experience for your
              Android device, with virtually no battery impact.
            </p>
          </div>
          <div class="row gy-4">
            <div class="col-lg-4">
              <div
                style="
                  width: 100%;
                  height: 80px;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  text-align: center;
                "
              >
                <img
                  src="{{ url('fronttheme') }}/images/icon/protection1.png"
                  alt="icon"
                  style="width: 100%; height: 100%; object-fit: contain"
                />
              </div>
              <div>
                <h6 class="fs-16 text-center fw-medium">Protection</h6>
              </div>
              <hr />
              <div class="mb-3">
                <p class="fs-12 text-justify">
                  Bitdefender`s mobile security app keeps your Android device
                  safe from all new and existing online threats.
                </p>
              </div>
              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">Malware Scanner</h6>
                <p class="fs-12 text-justify">
                  Receive in-depth information about the type of threats you are
                  protected against, so you know first-hand you’ve made the
                  right choice to safeguard your Android devices.
                </p>
              </div>
              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">
                  On-Demand & On-Install Scan
                </h6>
                <p class="fs-12 text-justify">
                  Scan your Android phone or tablet any time to make sure all
                  your apps are clean. Plus, the antivirus module automatically
                  scans each app once you install it, and immediately lets you
                  know whether it poses any danger.
                </p>
              </div>
              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">Web Protection</h6>
                <p class="fs-12 text-justify">
                  Browsing the Internet can take you to dangerous places, but
                  Bitdefender Android security is always there to protect you.
                  Our anti-phishing system scans webpages and warns you when you
                  come across fraudulent pages.
                </p>
              </div>
              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">Scam Alert</h6>
                <p class="fs-12 text-justify">
                  Keeps mobile devices safe from phishing, scam and fraud
                  attempts by scanning suspicious links received via texts,
                  messaging apps and notifications. Also halts propagation by
                  preventing forwarding of these links.
                </p>
              </div>
              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">WearON</h6>
                <p class="fs-12 text-justify">
                  WearON extends mobile security to your smart watch. And if you
                  don’t know where your phone is, use WearON from your Android
                  to activate a sound alert so you can easily find it. Receive
                  an alert when you step too far away from your phone, so you
                  never leave it behind.
                </p>
              </div>

              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">Anti-Theft</h6>
                <p class="fs-12 text-justify">
                  With Bitdefender Anti-Theft, you can remotely locate, lock,
                  wipe or send a message to your device in case of loss or
                  theft. Plus, your Android phone is capable of self-defense: it
                  snaps a mugshot of anyone who tries to tamper with it in your
                  absence, then sends it to you in your Bitdefender Central
                  account.
                </p>
              </div>
            </div>

            <div class="col-lg-4">
              <div
                style="
                  width: 100%;
                  height: 80px;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  text-align: center;
                "
              >
                <img
                  src="{{ url('fronttheme') }}/images/icon/protection2.png"
                  alt="icon"
                  style="width: 100%; height: 100%; object-fit: contain"
                />
              </div>
              <div>
                <h6 class="fs-16 text-center fw-medium">Performance</h6>
              </div>
              <hr />
              <div class="mb-3">
                <p class="fs-12 text-justify">
                  Bitdefender Mobile Security for Android reacts instantly to
                  online threats without compromising your system’s performance.
                </p>
              </div>
              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">Autopilot</h6>
                <p class="fs-12 text-justify">
                  Bitdefender Autopilot is designed to act as a Security Advisor
                  and to give you deeper insights into your security posture.
                  Its smart capabilities mean that it can recommend security
                  actions in the context of your system needs and usage
                  patterns.
                </p>
              </div>
              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">
                  Battery & Performance Saver
                </h6>
                <p class="fs-12 text-justify">
                  We designed Bitdefender Mobile Security for Android to give
                  you the most effective protection, combined with efficient
                  power management. Since most heavy lifting takes place in the
                  cloud, it doesn’t drain your device’s resources, and your
                  battery life remains virtually unaffected.
                </p>
              </div>
              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">Fast & Light-Weight</h6>
                <p class="fs-12 text-justify">
                  Bitdefender Mobile Security for Android is amazingly powerful
                  against malware, yet easy on your phone’s resources, so you
                  won’t see any negative impact on performance. On-demand
                  scanning is lightning fast, and the app only adds a second to
                  the reboot time.
                </p>
              </div>
            </div>

            <div class="col-lg-4">
              <div
                style="
                  width: 100%;
                  height: 80px;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  text-align: center;
                "
              >
                <img
                  src="{{ url('fronttheme') }}/images/icon/protection3.png"
                  alt="icon"
                  style="width: 100%; height: 100%; object-fit: contain"
                />
              </div>

              <div>
                <h6 class="fs-16 text-center fw-medium">Privacy</h6>
              </div>
              <hr />
              <div class="mb-3">
                <p class="fs-12 text-justify">
                  Bitdefender’s mobile security app takes care of your online
                  privacy and personal information.
                </p>
              </div>
              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">
                  Advanced Threat Defense
                </h6>
                <p class="fs-12 text-justify">
                  Bitdefender Mobile Security for Android & iOS uses a technique
                  called behavioral detection to closely monitor active apps.
                  The moment it detects anything suspicious, it takes instant
                  action to prevent infections.
                </p>
              </div>
              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">
                  Bitdefender VPN <span class="badge bg-success">Improved</span>
                </h6>
                <p class="fs-12 text-justify">
                  With Bitdefender VPN, you can stop worrying about privacy on
                  the web. It protects your online presence by encrypting all
                  Internet traffic. Bitdefender Mobile Security for Android
                  includes up to 200 MB per day of encrypted traffic for your
                  Android device.
                </p>
              </div>
              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">App Lock</h6>
                <p class="fs-12 text-justify">
                  App Lock protects your most sensitive apps so no one can mess
                  with your settings or private info. Bitdefender Mobile
                  Security for Android adds an extra layer of protection by
                  giving you the possibility to lock apps with a PIN code. With
                  Smart Unlock, you can set your phone to allow direct access to
                  your protected apps when using a trusted Wi-Fi network.
                </p>
              </div>
              <div class="mb-3">
                <h6 class="fs-14 fw-bolder text-grey-2">Account Privacy</h6>
                <p class="fs-12 text-justify">
                  Check if your online accounts have been involved in any data
                  breaches. With so many popular websites and apps issuing
                  warnings about database leaks, it’s easy to lose track of your
                  exposed accounts. Account Privacy notifies you when your
                  sensitive data is at risk, and lets you take action depending
                  on its status.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- / Take a Look Inside -->

      <div class="bg-light pt-5">
        <div class="container">
          <div class="flat-title relative mb_5">
            <h3 class="title fw-normal fst-italic font-3 letter-0">
              Best Protection for your iOS devices
            </h3>
            <p>
              You get the most innovative technologies that predict, prevent,
              detect and remediate even the latest cyber-threats, anywhere in
              the world
            </p>
          </div>
          <div class="row gy-4">
            <div class="col-lg-4">
              <div
                style="
                  width: 100%;
                  height: 40px;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  text-align: center;
                "
              >
                <img
                  src="{{ url('fronttheme') }}/images/icon/protects-your-personal-data.svg"
                  alt="icon"
                  style="width: 100%; height: 100%; object-fit: contain"
                />
              </div>
              <div class="pt-3 border-bottom">
                <h6 class="fs-16 text-center fw-medium">
                  Protects your personal data
                </h6>
              </div>
              <div class="mb-3 mt-3">
                <p class="fs-12 text-justify text-center">
                  Your passwords, address, social and financial information are
                  now safe.
                </p>
              </div>
            </div>

            <div class="col-lg-4">
              <div
                style="
                  width: 100%;
                  height: 40px;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  text-align: center;
                "
              >
                <img
                  src="{{ url('fronttheme') }}/images/icon/prevents-interception.svg"
                  alt="icon"
                  style="width: 100%; height: 100%; object-fit: contain"
                />
              </div>
              <div class="pt-3 border-bottom">
                <h6 class="fs-16 text-center fw-medium">
                  Prevents interception
                </h6>
              </div>
              <div class="mb-3 mt-3">
                <p class="fs-12 text-justify text-center">
                  You can use your card online without worrying that your
                  financial data will be stolen.
                </p>
              </div>
            </div>

            <div class="col-lg-4">
              <div
                style="
                  width: 100%;
                  height: 40px;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  text-align: center;
                "
              >
                <img
                  src="{{ url('fronttheme') }}/images/icon/keeps-you-informed.svg"
                  alt="icon"
                  style="width: 100%; height: 100%; object-fit: contain"
                />
              </div>
              <div class="pt-3 border-bottom">
                <h6 class="fs-16 text-center fw-medium">Helps you stay safe</h6>
              </div>
              <div class="mb-3 mt-3">
                <p class="fs-12 text-justify text-center">
                  You can easily scan your phone to learn if there are any
                  misconfigurations that put your data at risk and close those
                  gaps to enjoy complete security.
                </p>
              </div>
            </div>

            <div class="col-lg-4">
              <div
                style="
                  width: 100%;
                  height: 40px;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  text-align: center;
                "
              >
                <img
                  src="{{ url('fronttheme') }}/images/icon/filters-traffic-for-all-apps.svg"
                  alt="icon"
                  style="width: 100%; height: 100%; object-fit: contain"
                />
              </div>
              <div class="pt-3 border-bottom">
                <h6 class="fs-16 text-center fw-medium">
                  Filters traffic for all apps
                </h6>
              </div>
              <div class="mb-3 mt-3">
                <p class="fs-12 text-justify text-center">
                  It’s not just your browsing activity that gets protected. Any
                  app on your iPhone that sends information over the internet is
                  prevented from misusing it.
                </p>
              </div>
            </div>

            <div class="col-lg-4">
              <div
                style="
                  width: 100%;
                  height: 40px;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  text-align: center;
                "
              >
                <img
                  src="{{ url('fronttheme') }}/images/icon/provides-usage-insights.svg"
                  alt="icon"
                  style="width: 100%; height: 100%; object-fit: contain"
                />
              </div>
              <div class="pt-3 border-bottom">
                <h6 class="fs-16 text-center fw-medium">
                  Provides usage insights
                </h6>
              </div>
              <div class="mb-3 mt-3">
                <p class="fs-12 text-justify text-center">
                  See what your online activity looks like: daily usage, traffic
                  categorization and incidents prevented.
                </p>
              </div>
            </div>

            <div class="col-lg-4">
              <div
                style="
                  width: 100%;
                  height: 40px;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  text-align: center;
                "
              >
                <img
                  src="{{ url('fronttheme') }}/images/icon/minimal-impact-on-battery-life.svg"
                  alt="icon"
                  style="width: 100%; height: 100%; object-fit: contain"
                />
              </div>
              <div class="pt-3 border-bottom">
                <h6 class="fs-16 text-center fw-medium">
                  Minimal impact on battery life
                </h6>
              </div>
              <div class="mb-3 mt-3">
                <p class="fs-12 text-justify text-center">
                  Offers the most powerful protection against threats with the
                  least impact on battery.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- /Brand -->

        <!-- info start -->
        <section class="bg-info-subtle p-3 flat-spacing-30">
          <div class="container">
            <div class="flat-title relative mb_5">
              <h3 class="title fw-normal fst-italic font-3 letter-0">
                System Requirements
              </h3>
            </div>
            <div class="">
              <div class="row">
                <div class="col-lg-6">
                  <div
                    class="mb-3 p-3"
                    style="border: 1px dotted #000; border-radius: 20px"
                  >
                    <p class="fw-bold fs-14 mb-3">
                      <i class="bi bi-shield-check"></i> Bitdefender MOBILE
                      SECURITY for Android
                    </p>
                    <div class="mb-3">
                      <strong>Operating System:</strong> Android 5.0 or later
                    </div>

                    <div class="mb-3">An active Internet connection</div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div
                    class="mb-3 p-3"
                    style="border: 1px dotted #000; border-radius: 20px"
                  >
                    <p class="fw-bold fs-14 mb-3">
                      <i class="bi bi-shield-check"></i> Bitdefender MOBILE
                      SECURITY for iOS
                    </p>
                    <div class="mb-3">
                      <strong>Operating System:</strong> iOS 12 or later
                    </div>

                    <div class="mb-3">An active Internet connection</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- info end -->

        <!-- review start -->
        <section class="flat-spacing-30 bg-light">
          <div class="container">
            <div
              class="flat-title wow fadeInUp"
              style="visibility: visible; animation-name: fadeInUp"
            >
              <h4 class="title">The Best Cyber-Security in the World</h4>
            </div>
            <div class="row gy-4">
              <div class="col-lg-12">
                <h4 class="text-center mb-3 fs-18">Android</h4>
                
                <div class="row">
                <div class="col-lg-4 mb-3">
                     <div
                        class="wg-testimonial wow fadeInLeft"
                        style="visibility: visible; animation-name: fadeInLeft"
                      >
                        <div class="content">
                          <div class="content-top">
                            <div class="box-author">
                              <p class="name-author text-sm fw-medium">
                                AV-Comparatives
                              </p>
                              <div class="box-verified text-main">
                                <i class="bi bi-check"></i>
                                <p class="text-xs fst-italic">June 2022</p>
                              </div>
                            </div>
                            <div class="" style="width: 80px; height: 80px">
                              <img
                                src="{{ url('fronttheme') }}/images/brand/av.png"
                                alt="logo"
                                style="
                                  width: 100%;
                                  height: 100%;
                                  object-fit: contain;
                                "
                              />
                            </div>
                            <p class="text-review text-sm text-main">
                              Bitdefender Mobile Security for Android provides a
                              wide range of tools for monitoring the device’s
                              security and privacy.
                            </p>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4 mb-3">
                      <div
                        class="wg-testimonial wow fadeInLeft"
                        style="visibility: visible; animation-name: fadeInLeft"
                      >
                        <div class="content">
                          <div class="content-top">
                            <div class="box-author">
                              <p class="name-author text-sm fw-medium">PCMag</p>
                              <div class="box-verified text-main">
                                <i class="bi bi-check"></i>
                                <p class="text-xs fst-italic">January 2023</p>
                              </div>
                            </div>
                            <div class="" style="width: 80px; height: 80px">
                              <img
                                src="{{ url('fronttheme') }}/images/brand/pc-rc.jpeg"
                                alt="logo"
                                style="
                                  width: 100%;
                                  height: 100%;
                                  object-fit: contain;
                                "
                              />
                            </div>
                            <p class="text-review text-sm text-main">
                              Bitdefender is PCMag readers’ preferred tool for
                              protecting their Android devices.
                            </p>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4 mb-3">
                     <div
                        class="wg-testimonial wow fadeInLeft"
                        style="visibility: visible; animation-name: fadeInLeft"
                      >
                        <div class="content">
                          <div class="content-top">
                            <div class="box-author">
                              <p class="name-author text-sm fw-medium">
                                AV-Test
                              </p>
                              <div class="box-verified text-main">
                                <i class="bi bi-check"></i>
                                <p class="text-xs fst-italic">March 2023</p>
                              </div>
                            </div>
                            <div class="" style="width: 80px; height: 80px">
                              <img
                                src="{{ url('fronttheme') }}/images/brand/aw.png"
                                alt="logo"
                                style="
                                  width: 100%;
                                  height: 100%;
                                  object-fit: contain;
                                "
                              />
                            </div>
                            <p class="text-review text-sm text-main">
                              This year marks the sixth time we've selected
                              Bitdefender Mobile Security as the best offering
                              on the market for Android Security.
                            </p>
                          </div>
                        </div>
                      </div>
                </div>
               </div>  
                

              </div>

              <div class="col-lg-12">
                <h4 class="text-center mb-3 fs-18">IOS</h4>
                
                <div class="row">
                    <div class="col-lg-4 mb-3">
                         <div
                        class="wg-testimonial wow fadeInLeft"
                        style="visibility: visible; animation-name: fadeInLeft"
                      >
                        <div class="content">
                          <div class="content-top">
                            <div class="box-author">
                              <p class="name-author text-sm fw-medium">
                                AV-Comparatives
                              </p>
                              <div class="box-verified text-main">
                                <i class="bi bi-check"></i>
                                <p class="text-xs fst-italic">January 2023</p>
                              </div>
                            </div>
                            <div class="" style="width: 80px; height: 80px">
                              <img
                                src="{{ url('fronttheme') }}/images/brand/1.png"
                                alt="logo"
                                style="
                                  width: 100%;
                                  height: 100%;
                                  object-fit: contain;
                                "
                              />
                            </div>
                            <p class="text-review text-sm text-main">
                              Product of The Year
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                         <div
                        class="wg-testimonial wow fadeInLeft"
                        style="visibility: visible; animation-name: fadeInLeft"
                      >
                        <div class="content">
                          <div class="content-top">
                            <div class="box-author">
                              <p class="name-author text-sm fw-medium">
                                PC Mag
                              </p>
                              <div class="box-verified text-main">
                                <i class="bi bi-check"></i>
                                <p class="text-xs fst-italic">August 2021</p>
                              </div>
                            </div>
                            <div class="" style="width: 80px; height: 80px">
                              <img
                                src="{{ url('fronttheme') }}/images/brand/pc.png"
                                alt="logo"
                                style="
                                  width: 100%;
                                  height: 100%;
                                  object-fit: contain;
                                "
                              />
                            </div>
                            <p class="text-review text-sm text-main">
                              Outstanding scores in independent lab tests and
                              our web protection tests
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div
                        class="wg-testimonial wow fadeInLeft"
                        style="visibility: visible; animation-name: fadeInLeft"
                      >
                        <div class="content">
                          <div class="content-top">
                            <div class="box-author">
                              <p class="name-author text-sm fw-medium">PCMag</p>
                              <div class="box-verified text-main">
                                <i class="bi bi-check"></i>
                                <p class="text-xs fst-italic">January 2023</p>
                              </div>
                            </div>
                            <div class="" style="width: 80px; height: 80px">
                              <img
                                src="{{ url('fronttheme') }}/images/brand/pc-rc.jpeg"
                                alt="logo"
                                style="
                                  width: 100%;
                                  height: 100%;
                                  object-fit: contain;
                                "
                              />
                            </div>
                            <p class="text-review text-sm text-main">
                              […]Bitdefender emerges on top this year, earning
                              the highest satisfaction ratings on nearly every
                              measure
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
               
              </div>
            </div>
          </div>
        </section>
        <!-- review end -->

        <!-- section-asked-questions -->
        <section class="flat-spacing-3 bg-gradient-8 section-asked-questions mt-5 pb-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-5">
                <div class="content">
                  <h3 class="title fw-normal fst-italic font-3 letter-0">
                    Protecting over 500.000.000 users worldwide
                  </h3>
                  <p class="fw-bold">
                    Powerful, Intuitive, Ultrafast, Featherlight Antivirus
                    Software
                  </p>
                  <p class="text-sm text-main">
                    Hundreds of millions of computer users worldwide rely on
                    Bshopee Antivirus Solutions to stay safe from malware and
                    privacy invaders and to have peace of mind when browsing,
                    banking or shopping online. Bshopee antivirus solutions
                    provide state-of-the-art, proactive protection from
                    e-threats, including online banking attacks.
                    <br />
                    <br />
                    The most powerful cybersecurity in the world includes device
                    anti-theft, firewall, parental controls, social network
                    protection and other useful features. Choose the antivirus
                    protection that best fits your needs, and you’ll have the
                    freedom to enjoy your computer, smartphone or tablet to the
                    max.
                  </p>
                  <div class="bot">
                    <a
                      href="/contact"
                      class="common_btn button_yy"
                    >
                        Contact us
                      
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="faq-wrap" id="accordion1">
                  <div class="widget-accordion">
                    <div
                      class="accordion-title collapsed"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapse1"
                      aria-expanded="false"
                      aria-controls="collapse1"
                      role="button"
                    >
                      <span>What is antivirus software?</span>
                      <span class="bi bi-chevron-double-down"></span>
                    </div>
                    <div
                      id="collapse1"
                      class="accordion-collapse collapse"
                      aria-labelledby="heading1"
                      data-bs-parent="#accordion1"
                    >
                      <div class="accordion-body">
                        <p class="text-main">
                          Antivirus software is a program designed to detect,
                          prevent, and remove malware, including viruses, worms,
                          trojans, ransomware, spyware, and more.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="widget-accordion">
                    <div
                      class="accordion-title collapsed"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapse2"
                      aria-expanded="false"
                      aria-controls="collapse2"
                      role="button"
                    >
                      <span>Why do I need antivirus protection?</span>
                      <span class="bi bi-chevron-double-down"></span>
                    </div>
                    <div
                      id="collapse2"
                      class="accordion-collapse collapse"
                      aria-labelledby="heading2"
                      data-bs-parent="#accordion1"
                    >
                      <div class="accordion-body">
                        <p class="text-main">
                          Antivirus protection helps safeguard your devices and
                          personal information from cyber threats that could
                          lead to data theft, system damage, or loss of privacy.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="widget-accordion">
                    <div
                      class="accordion-title collapsed"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapse3"
                      aria-expanded="false"
                      aria-controls="collapse3"
                      role="button"
                    >
                      <span>How does antivirus software work?</span>
                      <span class="bi bi-chevron-double-down"></span>
                    </div>
                    <div
                      id="collapse3"
                      class="accordion-collapse collapse"
                      aria-labelledby="heading3"
                      data-bs-parent="#accordion1"
                    >
                      <div class="accordion-body">
                        <p class="text-main">
                          Antivirus programs scan files and software on your
                          device for known threats, monitor behavior for
                          suspicious activity, and quarantine or remove harmful
                          programs.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="widget-accordion">
                    <div
                      class="accordion-title collapsed"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapse4"
                      aria-expanded="false"
                      aria-controls="collapse4"
                      role="button"
                    >
                      <span>Is free antivirus software enough?</span>
                      <span class="bi bi-chevron-double-down"></span>
                    </div>
                    <div
                      id="collapse4"
                      class="accordion-collapse collapse"
                      aria-labelledby="heading4"
                      data-bs-parent="#accordion1"
                    >
                      <div class="accordion-body">
                        <p class="text-main">
                          Free antivirus software provides basic protection, but
                          it may lack advanced features like real-time
                          protection, firewall management, VPNs, and ransomware
                          defense offered by paid versions
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="widget-accordion">
                    <div
                      class="accordion-title collapsed"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapse5"
                      aria-expanded="false"
                      aria-controls="collapse5"
                      role="button"
                    >
                      <span>Can antivirus software slow down my computer?</span>
                      <span class="bi bi-chevron-double-down"></span>
                    </div>
                    <div
                      id="collapse5"
                      class="accordion-collapse collapse"
                      aria-labelledby="heading5"
                      data-bs-parent="#accordion1"
                    >
                      <div class="accordion-body">
                        <p class="text-main">
                          While some antivirus programs can slightly impact
                          system performance, modern antivirus solutions are
                          optimized to work efficiently in the background
                          without noticeably slowing your device.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="widget-accordion">
                    <div
                      class="accordion-title collapsed"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapse6"
                      aria-expanded="false"
                      aria-controls="collapse6"
                      role="button"
                    >
                      <span
                        >How often should I update my antivirus software?
                      </span>
                      <span class="bi bi-chevron-double-down"></span>
                    </div>
                    <div
                      id="collapse6"
                      class="accordion-collapse collapse"
                      aria-labelledby="heading6"
                      data-bs-parent="#accordion1"
                    >
                      <div class="accordion-body">
                        <p class="text-main">
                          You should keep your antivirus software updated daily.
                          Regular updates ensure the latest threat definitions
                          are installed to protect against new viruses and
                          malware.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- /section-asked-questions -->

        <!-- product end -->

      </div>


    <!--============================
        RELATED PRODUCT START
    ==============================-->
    {{-- <section id="wsus__flash_sell">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__section_header">
                        <h3>Related Products</h3>
                        <a class="see_btn" href="#">see more <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row flash_sell_slider">
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="{{ url('fronttheme') }}/images/pro3.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="{{ url('fronttheme') }}/images/pro3_3.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">Electronics </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(133 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">hp 24" FHD monitore</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="{{ url('fronttheme') }}/images/pro4.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="{{ url('fronttheme') }}/images/pro4_4.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(17 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's casual fashion watch</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="{{ url('fronttheme') }}/images/pro9.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="{{ url('fronttheme') }}/images/pro9_9.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(120 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's fashion sholder bag</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="{{ url('fronttheme') }}/images/pro2.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="{{ url('fronttheme') }}/images/pro2_2.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(72 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's casual shoes</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="{{ url('fronttheme') }}/images/pro4.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="{{ url('fronttheme') }}/images/pro4_4.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(17 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's casual fashion watch</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
    <!--============================
        RELATED PRODUCT END
    ==============================-->

    <!-- Add this modal at the bottom of your file -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfModalLabel">Book Sample - {{$product->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <embed src="{{asset('storage/'.$product->book_sample)}}" type="application/pdf" width="100%" height="600px">
            </div>
        </div>
    </div>
</div>


@endsection
