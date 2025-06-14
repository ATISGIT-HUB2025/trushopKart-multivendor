<section id="wsus__brand_sleder" class="mt-0 brand_slider_2">
    <div class="container">
        <div class="brand_border">
            <div class="row justify-content-center">
                @foreach ($brands as $brand)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3 d-flex justify-content-center">
                    <div class="wsus__brand_logo p-2" style="width:150px; height:60px;">
                        <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}" class="img-fluid w-100">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
