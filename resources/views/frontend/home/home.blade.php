@extends('frontend.layouts.master')
@section('title')
{{$settings->site_name}} || Home
@endsection

@section('content')


<style>
    .brand_slider_2 .wsus__brand_logo img {
    height: 100%;
    object-fit: contain;
    margin-top: 7px;
}

.vvbox a.common_btn , .button_yy{
    min-width: 170px;
    text-align: center;
}


@media(max-width:410px){
    .vvbox a.common_btn, .button_yy {
    min-width: 130px;
    text-align: center;
}
}

</style>


    <!--============================
        BANNER PART 2 START
    ==============================-->
    @include('frontend.home.sections.banner-slider')
    <!--============================
        BANNER PART 2 END
    ==============================-->


    <!--============================
        FLASH SELL START
    ==============================-->
    {{-- @include('frontend.home.sections.flash-sale') --}}
    <!--============================
        FLASH SELL END
    ==============================-->



    
    <!--============================
        FLASH SELL START
    ==============================-->
    @include('frontend.home.sections.bestseller_products')
    @include('frontend.home.sections.best_virus_detection')
    @include('frontend.home.sections.antivirus_softwere')
    <!--============================
        FLASH SELL END
    ==============================-->


    <!--============================
       MONTHLY TOP PRODUCT START
    ==============================-->
    @include('frontend.home.sections.top-category-product')
    <!--============================
       MONTHLY TOP PRODUCT END
    ==============================-->


    <!--============================
        BRAND SLIDER START
    ==============================-->
    @include('frontend.home.sections.brand-slider')
    <!--============================
        BRAND SLIDER END
    ==============================-->


    <!--============================
        SINGLE BANNER START
    ==============================-->
    {{-- @include('frontend.home.sections.single-banner') --}}
    <!--============================
        SINGLE BANNER END
    ==============================-->


    <!--============================
        HOT DEALS START
    ==============================-->
    {{-- @include('frontend.home.sections.hot-deals') --}}
    <!--============================
        HOT DEALS END
    ==============================-->


    <!--============================
        ELECTRONIC PART START
    ==============================-->
    @include('frontend.home.sections.category-product-slider-one')
    <!--============================
        ELECTRONIC PART END
    ==============================-->

    

    <!--============================
        ELECTRONIC PART START
    ==============================-->
    @include('frontend.home.sections.category-product-slider-two')

    <!--============================
        ELECTRONIC PART END
    ==============================-->


    <!--============================
        LARGE BANNER  START
    ==============================-->
    {{-- @include('frontend.home.sections.large-banner') --}}

    <!--============================
        LARGE BANNER  END
    ==============================-->


    <!--============================
        WEEKLY BEST ITEM START
    ==============================-->
    @include('frontend.home.sections.weekly-best-item')
    <!--============================
        WEEKLY BEST ITEM END
    ==============================-->


    <!--============================
      HOME SERVICES START
    ==============================-->
    {{-- @include('frontend.home.sections.services') --}}
    <!--============================
        HOME SERVICES END
    ==============================-->


    <!--============================
        HOME BLOGS START
    ==============================-->
    @include('frontend.home.sections.blog')
    <!--============================
        HOME BLOGS END
    ==============================-->

@endsection
