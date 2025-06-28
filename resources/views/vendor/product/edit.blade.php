@extends('vendor.layouts.master')

@section('title')
{{$settings->site_name}} || Product
@endsection

@section('content')

<style>
    .form-group {
    margin-bottom: 25px;
}
</style>

  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('vendor.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
             <h4 class="h4 mb-4"><i class="far fa-user"></i> Update Product</h4>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <form action="{{route('vendor.products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                   
                  <div class="form-group">
                            <label>Preview</label>
                            <br>
                            <img src="{{asset($product->thumb_image)}}" style="width:200px" alt="">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}">
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputState">Category</label>
                                    <select id="inputState" class="form-control main-category" name="category">
                                      <option value="">Select</option>
                                      @foreach ($categories as $category)
                                        <option {{$category->id == $product->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputState">Sub Category</label>
                                    <select id="inputState" class="form-control sub-category" name="sub_category">
                                        <option value="">Select</option>
                                        @foreach ($subCategories as $subCategory)
                                            <option {{$subCategory->id == $product->sub_category_id ? 'selected' : ''}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputState">Child Category</label>
                                    <select id="inputState" class="form-control child-category" name="child_category">
                                        <option value="">Select</option>
                                        @foreach ($childCategories as $childCategory)
                                            <option {{$childCategory->id == $product->child_category_id ? 'selected' : ''}} value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputState">Brand</label>
                            <select id="inputState" class="form-control" name="brand">
                                <option value="">Select</option>
                                @foreach ($brands as $brand)
                                    <option {{$brand->id == $product->brand_id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label>SKU</label>
                            <input type="text" class="form-control" name="sku" value="{{$product->sku}}">
                        </div> --}}

                        <div class="form-group">
                            <label>Mrp</label>
                            <input type="text" class="form-control" required  id="mrp" name="mrp" value="{{$product->mrp ?? ''}}">
                        </div>

                        

                         <div class="form-group">
                            <label>Gst (in Percentage %)</label>
                            <input type="text" required class="form-control" name="gst" id="gst" value="{{$product->gst ?? ''}}">
                        </div>

                        <div class="mrp_gst_output my-3">
                            <div><strong>MRP Without GST:</strong> <span id="priceWithoutGst">--</span></div>
                            <div><strong>MRP With GST:</strong> <span id="priceWithGst">--</span></div>
                        </div>

                            <h4 class="mb-4">Combo Product Management</h4>

@php
    $selectedComboProducts = $product->combo_products ?? []; // assuming it's array or use json_decode
@endphp


@php
    $selectedComboProducts = json_decode($product->combo_items, true) ?? []; // assuming it's array or use json_decode
@endphp

<div class="form-group">
    <label for="product_mode"><strong>Product Mode</strong></label>
    <select class="form-select" id="product_mode" name="product_mode">
        <option value="single" {{ $product->product_mode === 'single' ? 'selected' : '' }}>Single</option>
        <option value="combo" {{ $product->product_mode === 'combo' ? 'selected' : '' }}>Combo</option>
    </select>
</div>

<!-- Combo Products Table -->
<div class="card mt-4 mb-4 {{ $product->product_mode === 'combo' ? '' : 'd-none' }}" id="combo_products_box">
    <div class="card-header bg-warning text-white">
        <strong>Select Combo Products</strong>
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered table-hover mb-0">
            <thead class="thead-light">
                <tr>
                    <th style="width: 50px;"><input type="checkbox" id="select_all_products"></th>
                    <th>Product Name</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allProducts as $productItem)
                    <tr>
                        <td>
                            <input type="checkbox"
                                   name="combo_products[]"
                                   value="{{ $productItem->id }}"
                                   class="combo_product_checkbox"
                                   {{ in_array($productItem->id, $selectedComboProducts) ? 'checked' : '' }}>
                        </td>
                        <td>{{ $productItem->name ?? '-' }}</td>
                        <td>
                            @if($productItem->thumb_image)
                                <a href="{{ asset($productItem->thumb_image) }}" target="_blank">
                                    <img src="{{ asset($productItem->thumb_image) }}" alt="Product" width="40" height="40">
                                </a>
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


                        {{-- <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" value="{{$product->price}}">
                        </div>


                        <div class="form-group">
                            <label>MVoucher Point</label>
                            <input type="number" class="form-control" name="coin_price" value="{{$product->coin_price}}">
                        </div>

                        <div class="form-group">
                            <label>Offer Price</label>
                            <input type="text" class="form-control" name="offer_price" value="{{$product->offer_price}}">
                        </div>

                         <div class="form-group">
                            <label>Refferal Points</label>
                            <input type="number" class="form-control" name="referral_points_max_use" value="{{$product->referral_points_max_use}}">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Offer Start Date</label>
                                    <input type="text" class="form-control datepicker" name="offer_start_date" value="{{$product->offer_start_date}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Offer End Date</label>
                                    <input type="text" class="form-control datepicker" name="offer_end_date" value="{{$product->offer_end_date}}">
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label>Stock Quantity</label>
                            <input type="number" min="0" class="form-control" name="qty" value="{{$product->qty}}">
                        </div>

                        <div class="form-group">
                            <label>Video Link</label>
                            <input type="text" class="form-control" name="video_link" value="{{$product->video_link}}">
                        </div>

                                            {{-- <div class="row">
                            <div class="col-md-6">
                                  <div class="form-group">
                                   <label>Play Store Link</label>
                                   <input type="text" class="form-control" name="play_store_link" value="{{$product->play_store_link}}">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                           <div class="form-group">
                            <label>App Store Link</label>
                            <input type="text" class="form-control" name="app_store_link" value="{{$product->app_store_link}}">
                        </div>
                        </div>
                        </div> --}}

                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea name="short_description" class="form-control">{!! $product->short_description !!}</textarea>
                        </div>

                         <div class="form-group">
                            <label>Product Key</label>
                            <textarea name="product_key" class="form-control">{!! $product->product_key !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Long Description</label>
                            <textarea name="long_description" class="form-control summernote">{!! $product->long_description !!}</textarea>
                        </div>


                          <div class="form-group">
                            <label>Android Description</label>
                            <textarea name="android_desc" class="form-control summernote">{!! $product->android_desc !!}</textarea>
                        </div>


                         <div class="form-group">
                            <label>IOS Description</label>
                            <textarea name="ios_desc" class="form-control summernote">{!! $product->ios_desc !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="inputState">Product Type</label>
                            <select id="inputState" class="form-control" name="product_type">
                                <option value="">Select</option>
                                <option {{$product->product_type == 'new_arrival' ? 'selected' : ''}} value="new_arrival">New Arrival</option>
                                <option {{$product->product_type == 'featured_product' ? 'selected' : ''}} value="featured_product">Featured</option>
                                <option {{$product->product_type == 'top_product' ? 'selected' : ''}} value="top_product">Top Product</option>
                                <option {{$product->product_type == 'best_product' ? 'selected' : ''}} value="best_product">Best Product</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Seo Title</label>
                            <input type="text" class="form-control" name="seo_title" value="{{$product->seo_title}}">
                        </div>

                        <div class="form-group">
                            <label>Seo Description</label>
                            <textarea name="seo_description" class="form-control">{!!$product->seo_description!!}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option {{$product->status == 1 ? 'selected' : ''}} value="1">Active</option>
                              <option {{$product->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Create</button>


                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('body').on('change', '.main-category', function(e){

                $('.child-category').html('<option value="">Select</option>')

                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.product.get-subcategories')}}",
                    data: {
                        id:id
                    },
                    success: function(data){
                        $('.sub-category').html('<option value="">Select</option>')

                        $.each(data, function(i, item){
                            $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })
            })


            /** get child categories **/
            $('body').on('change', '.sub-category', function(e){
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.product.get-child-categories')}}",
                    data: {
                        id:id
                    },
                    success: function(data){
                        $('.child-category').html('<option value="">Select</option>')

                        $.each(data, function(i, item){
                            $('.child-category').append(`<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })
            })
        })
    </script>
<script>
$(document).ready(function () {
    function calculateGST() {
        let mrp = parseFloat($('#mrp').val()); // base price (without GST)
        let gst = parseFloat($('#gst').val()); // GST %

        if (!isNaN(mrp) && !isNaN(gst)) {
            let gstAmount = (mrp * gst / 100).toFixed(2);
            let priceWithGst = (mrp + parseFloat(gstAmount)).toFixed(2);

            $('#priceWithoutGst').text(mrp.toFixed(2));
            $('#gstAmount').text(gstAmount);
            $('#priceWithGst').text(priceWithGst);
        } else {
            $('#priceWithoutGst').text('--');
            $('#gstAmount').text('--');
            $('#priceWithGst').text('--');
        }
    }

    // Run when values are changed
    $('#mrp, #gst').on('input', calculateGST);

    // ✅ Also run once on page load
    calculateGST();
});


 $(document).ready(function () {

        // When the "Select All" checkbox is clicked
        $('#select_all_products').on('change', function () {
            $('.combo_product_checkbox').prop('checked', $(this).prop('checked'));
        });

        // When any individual checkbox is clicked
        $('.combo_product_checkbox').on('change', function () {
            const total = $('.combo_product_checkbox').length;
            const checked = $('.combo_product_checkbox:checked').length;

            $('#select_all_products').prop('checked', total === checked);
        });

        // Auto-check "Select All" on page load if all are already selected
        const total = $('.combo_product_checkbox').length;
        const checked = $('.combo_product_checkbox:checked').length;
        $('#select_all_products').prop('checked', total > 0 && total === checked);
    });

</script>

@endpush
