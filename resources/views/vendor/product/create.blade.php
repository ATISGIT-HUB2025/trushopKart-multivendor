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
            <h4 class="h4 mb-4"><i class="far fa-user"></i> Create Product</h4>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <form action="{{route('vendor.products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                     <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        {{-- <div class="form-group">
    <label>Book Sample PDF</label>
    <input type="file" class="form-control" name="book_sample" accept="application/pdf">
</div> --}}


                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        </div>


                        <div class="form-group">
                            <label for="inputState">Brand</label>
                            <select id="inputState" class="form-control" name="brand">
                                <option value="">Select</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label>SKU</label>
                            <input type="text" class="form-control" name="sku" value="{{old('sku')}}">
                        </div> --}}

                        <div class="form-group">
                            <label>Mrp</label>
                            <input type="text" class="form-control" required name="mrp" id="mrp" value="{{old('mrp')}}">
                        </div>

                         <div class="form-group">
                            <label>Gst (in Percentage %)</label>
                            <input type="text" required class="form-control" name="gst" id="gst" value="{{old('gst')}}">
                        </div>

                        <div class="mrp_gst_output my-3">
                            <div><strong>MRP Without GST:</strong> <span id="priceWithoutGst">--</span></div>
                            <div><strong>MRP With GST:</strong> <span id="priceWithGst">--</span></div>
                        </div>

                       <h4 class="mb-4">Combo Product Management</h4>

<div class="form-group">
    <label for="product_mode"><strong>Product Mode</strong></label>
    <select class="form-select" id="product_mode" name="product_mode">
        <option value="single">Single</option>
        <option value="combo">Combo</option>
    </select>
</div>

<!-- Combo Products Table -->
<div class="card d-none mt-4 mb-4" id="combo_products_box">
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
                @foreach($allProducts as $product)
                    <tr>
                        <td>
                            <input type="checkbox" name="combo_products[]" value="{{ $product->id }}" class="combo_product_checkbox">
                        </td>
                        <td>{{ $product->name ?? "-" }}</td>
                        <td>
                            @if($product->thumb_image)
                                <a href="{{ asset($product->thumb_image) }}" target="_blank">
                                    <img src="{{ asset($product->thumb_image) }}" alt="Product" width="40" height="40">
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
                            <label>MVoucher Point</label>
                            <input type="number" class="form-control" required name="coin_price" value="1">
                        </div>

                        <div class="form-group">
                            <label>Refferal Points</label>
                            <input type="number" class="form-control" required name="referral_points_max_use" value="1">
                        </div> --}}

                        {{-- <div class="form-group">
                            <label>Offer Price</label>
                            <input type="text" class="form-control" required name="offer_price" value="{{old('offer_price')}}">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Offer Start Date</label>
                                    <input type="text" class="form-control datepicker" name="offer_start_date" value="{{old('offer_start_date')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Offer End Date</label>
                                    <input type="text" class="form-control datepicker" name="offer_end_date" value="{{old('offer_end_date')}}">
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label>Stock Quantity</label>
                            <input type="number" min="0" class="form-control" name="qty"  value="{{old('qty')}}">
                        </div>

                        <div class="form-group">
                            <label>Video Link</label>
                            <input type="text" class="form-control" name="video_link" value="{{old('video_link')}}">
                        </div>


                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea name="short_description" class="form-control"></textarea>
                        </div>


                        <div class="form-group">
                            <label>Long Description</label>
                            <textarea name="long_description" class="form-control summernote"></textarea>
                        </div>


                         <div class="form-group">
                            <label>Android Description</label>
                            <textarea name="android_desc" class="form-control summernote"></textarea>
                        </div>


                         <div class="form-group">
                            <label>IOS Description</label>
                            <textarea name="ios_desc" class="form-control summernote"></textarea>
                        </div>

                        {{-- <div class="form-group">
                            <label for="inputState">Product Type</label>
                            <select id="inputState" class="form-control" name="product_type">
                                <option value="">Select</option>
                                <option value="new_arrival">New Arrival</option>
                                <option value="featured_product">Featured</option>
                                <option value="top_product">Top Product</option>
                                <option value="best_product">Best Product</option>
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label>Seo Title</label>
                            <input type="text" class="form-control" name="seo_title" value="{{old('seo_title')}}">
                        </div>

                        <div class="form-group">
                            <label>Seo Description</label>
                            <textarea name="seo_description" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
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
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{route('vendor.product.get-subcategories')}}",
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
                    url: "{{route('vendor.product.get-child-categories')}}",
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
        $('#product_mode').on('change', function () {
            if ($(this).val() === 'combo') {
                $('#combo_products_box').removeClass('d-none');
            } else {
                $('#combo_products_box').addClass('d-none');
                $('.combo_product_checkbox').prop('checked', false);
                $('#select_all_products').prop('checked', false);
            }
        });

        $('#select_all_products').on('change', function () {
            $('.combo_product_checkbox').prop('checked', this.checked);
        });

        // Trigger on page load
        $('#product_mode').trigger('change');
    });
    
</script>


@endpush
