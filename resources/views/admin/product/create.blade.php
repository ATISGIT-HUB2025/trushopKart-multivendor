@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product</h1>

          </div>


          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Product</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label>Book Sample PDF</label>
                            <input type="file" class="form-control" name="book_sample" accept="application/pdf">
                        </div>


                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputState">Category</label>
                                    <select id="inputState" class="form-control main-category" name="category">
                                      <option value="">Select</option>
                                      @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputState">Sub Category</label>
                                    <select id="inputState" class="form-control sub-category" name="sub_category">
                                        <option value="">Select</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputState">Child Category</label>
                                    <select id="inputState" class="form-control child-category" name="child_category">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputState">Brand</label>
                                    <select id="inputState" class="form-control" name="brand">
                                        <option value="">Select</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>     

                            {{-- <div class="form-group">
                                <label>SKU</label>
                                <input type="text" class="form-control" name="sku" value="{{old('sku')}}">
                            </div> --}}
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price" value="{{old('price')}}">
                                    </div>
                                </div>
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label>MVoucher Point</label>
                                        <input type="number" class="form-control" name="coin_price" value="1">
                                    </div>
                                </div>
                         </div>
                     <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Refferal Points</label>
                                        <input type="number" class="form-control" name="referral_points_max_use" value="1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Offer Price</label>
                                        <input type="text" class="form-control" name="offer_price" value="{{old('offer_price')}}">
                                    </div>
                                 </div>     
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Stock Quantity</label>
                                        <input type="number" min="0" class="form-control" name="qty" value="{{old('qty')}}">
                                    </div>
                                 </div>   
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
                        </div>
                        
                  <div class="row">
                         <div class="col-md-4">
                            <div class="form-group">
                                <label>Video Link</label>
                                <input type="text" class="form-control" name="video_link" value="{{old('video_link')}}">
                            </div>
                          </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputState">Product Type</label>
                                <select id="inputState" class="form-control" name="product_type">
                                    <option value="">Select</option>
                                    <option value="new_arrival">New Arrival</option>
                                    <option value="featured_product">Featured</option>
                                    <option value="top_product">Top Product</option>
                                    <option value="best_product">Best Product</option>
                                </select>
                            </div>
                        </div>
                          <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Key</label>
                                    <textarea name="product_key" class="form-control"></textarea>
                                </div> 
                            </div>  
                      </div>
                        {{-- <div class="row">
                            <div class="col-md-6">
                                  <div class="form-group">
                                   <label>Play Store Link</label>
                                   <input type="text" class="form-control" name="play_store_link" value="{{old('play_store_link')}}">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                           <div class="form-group">
                            <label>App Store Link</label>
                            <input type="text" class="form-control" name="app_store_link" value="{{old('app_store_link')}}">
                        </div>
                        </div>
                        </div> --}}


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

                        <div class="form-group">
                            <label>Seo Title</label>
                            <input type="text" class="form-control" name="seo_title" value="{{old('seo_title')}}">
                        </div>

                        <div class="form-group">
                            <label>Seo Description</label>
                            <textarea name="seo_description" class="form-control"></textarea>
                        </div>

               
                    <!-- Best Protection for Android START-->
                        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                            <h4 class="text-2xl font-bold text-gray-800 mb-4">Best Protection for Android</h4>

                            <!-- Main Title -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                                <input type="text" name="best_protectIon_android_heading" placeholder="Enter title"
                                    class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>

                            <!-- Tab Selectors -->
                            <div class="flex gap-2 mt-4 mb-6">
                                @for ($i = 1; $i <= 3; $i++)
                                    <button type="button" onclick="showAndroidFeature({{ $i }})"
                                            class="android-tab-btn px-4 py-2 rounded-md border border-gray-300 text-sm hover:bg-green-100"
                                            id="android-tab-btn-{{ $i }}">
                                        Feature {{ $i }}
                                    </button>
                                @endfor
                            </div>

                            <!-- Android Feature Tabs -->
                            @for ($i = 1; $i <= 3; $i++)
                                @php
                                    $suffix = chr(96 + $i); // a, b, c
                                @endphp
                                <div class="android-feature-tab" id="android-feature-{{ $i }}" style="{{ $i == 1 ? '' : 'display:none;' }}">
                                    <div class="bg-white rounded-xl shadow-md p-6 mb-6 space-y-4">
                                        <h5 class="text-lg font-semibold text-gray-700">Feature {{ $i }}</h5>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
                                            <input type="file" name="best_protectIon_android_icon_{{ $suffix }}"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Sub Title <span class="text-red-500">*</span></label>
                                            <input type="text" name="best_protectIon_android__{{ $suffix }}_title" placeholder="Enter subtitle"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                            <textarea name="best_protectIon_android__{{ $suffix }}_desc" rows="3" placeholder="Enter description"
                                                    class="w-full border border-gray-300 rounded-md p-2 text-sm summernote"></textarea>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                      <!-- Best Protection for Android END-->

                       <!-- Best Protection for iOS START -->
                    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <h4 class="text-2xl font-bold text-gray-800 mb-4">Best Protection for iOS</h4>

                        <!-- Main Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                            <input type="text" name="best_protectIon_ios_heading" placeholder="Enter title"
                                class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>

                        <!-- Tab Selectors -->
                        <div class="flex gap-2 mt-4 mb-6">
                            @for ($i = 1; $i <= 6; $i++)
                                <button type="button" onclick="showFeature({{ $i }})"
                                        class="tab-btn px-4 py-2 rounded-md border border-gray-300 text-sm hover:bg-blue-100"
                                        id="tab-btn-{{ $i }}">
                                    Feature {{ $i }}
                                </button>
                            @endfor
                        </div>

                        <!-- Feature Tabs -->
                        @for ($i = 1; $i <= 6; $i++)
                            @php
                                $suffix = chr(96 + $i); // a, b, c...
                            @endphp
                            <div class="feature-tab" id="feature-{{ $i }}" style="{{ $i == 1 ? '' : 'display:none;' }}">
                                <div class="bg-white rounded-xl shadow-md p-6 mb-6 space-y-4">
                                    <h5 class="text-lg font-semibold text-gray-700">Feature {{ $i }}</h5>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
                                        <input type="file" name="best_protectIon_ios_icon_{{ $suffix }}"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Sub Title <span class="text-red-500">*</span></label>
                                        <input type="text" name="best_protectIon_ios__{{ $suffix }}_title" placeholder="Enter subtitle"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                        <textarea name="best_protectIon_ios__{{ $suffix }}_desc" rows="3" placeholder="Enter description"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                         @endfor
                  </div>
                        <!-- Best Protection for iOS END -->

                    <!-- System Requirements: Add Form for Android & iOS -->
                        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                            <h4 class="text-2xl font-bold text-gray-800 mb-4">Add System Requirements</h4>

                            <!-- Tabs -->
                            <div class="flex gap-2 mb-4">
                                <button type="button" onclick="showSysAddTab('android')" id="sys-add-tab-android"
                                        class="sys-add-tab-btn px-4 py-2 border rounded bg-green-100">
                                    Android
                                </button>
                                <button type="button" onclick="showSysAddTab('ios')" id="sys-add-tab-ios"
                                        class="sys-add-tab-btn px-4 py-2 border rounded hover:bg-blue-100">
                                    iOS
                                </button>
                            </div>

                            <!-- Android Fields -->
                            <div id="sys-add-android" class="sys-add-tab">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Main Title (Android)</label>
                                        <input type="text" name="system_req_title_android" placeholder="Enter Android title"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Operating System</label>
                                        <input type="text" name="system_req_operating_system_android" placeholder="e.g., Android 10+"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                        <textarea name="system_req_desc_android" rows="3" placeholder="Enter details"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm summernote"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- iOS Fields -->
                            <div id="sys-add-ios" class="sys-add-tab" style="display: none;">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Main Title (iOS)</label>
                                        <input type="text" name="system_req_title_ios" placeholder="Enter iOS title"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Operating System</label>
                                        <input type="text" name="system_req_operating_system_ios" placeholder="e.g., iOS 14+"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                        <textarea name="system_req_desc_ios" rows="3" placeholder="Enter details"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- System Requirements ios And End -->
                         
                    
                           <!-- The Best Cyber-Security in the World – Android -->
                            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                                <h4 class="text-2xl font-bold text-gray-800 mb-4">The Best Cyber-Security in the World - Android</h4>

                                <!-- Main Title -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                                    <input type="text" name="cyber_security_title_android" placeholder="Enter title"
                                        class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                </div>

                                <!-- Tab Selectors -->
                                <div class="flex gap-2 mt-4 mb-6">
                                    @for ($i = 1; $i <= 3; $i++)
                                        <button type="button" onclick="showCyberSecurityFeature('android', {{ $i }})"
                                            class="android-tab-btn px-4 py-2 rounded-md border border-gray-300 text-sm hover:bg-green-100"
                                            id="android-tab-btn-{{ $i }}">
                                            Feature {{ $i }}
                                        </button>
                                    @endfor
                                </div>

                                <!-- Android Feature Tabs -->
                                @for ($i = 1; $i <= 3; $i++)
                                    @php $suffix = chr(96 + $i); @endphp
                                    <div class="android-feature-tab" id="android-featuresecure-{{ $i }}" style="{{ $i == 1 ? '' : 'display:none;' }}">
                                        <div class="bg-white rounded-xl shadow-md p-6 mb-6 space-y-4">
                                            <h5 class="text-lg font-semibold text-gray-700">Feature {{ $i }}</h5>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
                                                <input type="file" name="cyber_security_android_icon_{{ $suffix }}"
                                                    class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Sub Title</label>
                                                <input type="text" name="cyber_security_android_{{ $suffix }}_title" placeholder="Enter subtitle"
                                                    class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                                <textarea name="cyber_security_android_{{ $suffix }}_desc" rows="3" placeholder="Enter description"
                                                    class="w-full border border-gray-300 rounded-md p-2 text-sm summernote"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                              <!-- The Best Cyber-Security in the World – Android END -->
                            <!-- The Best Cyber-Security in the World – iOS -->
                                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                                    <h4 class="text-2xl font-bold text-gray-800 mb-4">The Best Cyber-Security in the World - iOS</h4>

                                    <!-- Main Title -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                                        <input type="text" name="cyber_security_title_ios" placeholder="Enter title"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                    </div>

                                    <!-- Tab Selectors -->
                                    <div class="flex gap-2 mt-4 mb-6">
                                        @for ($i = 1; $i <= 3; $i++)
                                            <button type="button" onclick="showCyberSecurityFeature('ios', {{ $i }})"
                                                class="ios-tab-btn px-4 py-2 rounded-md border border-gray-300 text-sm hover:bg-green-100"
                                                id="ios-tab-btn-{{ $i }}">
                                                Feature {{ $i }}
                                            </button>
                                        @endfor
                                    </div>

                                    <!-- iOS Feature Tabs -->
                                    @for ($i = 1; $i <= 3; $i++)
                                        @php $suffix = chr(96 + $i); @endphp
                                        <div class="ios-feature-tab" id="ios-featuresecure-{{ $i }}" style="{{ $i == 1 ? '' : 'display:none;' }}">
                                            <div class="bg-white rounded-xl shadow-md p-6 mb-6 space-y-4">
                                                <h5 class="text-lg font-semibold text-gray-700">Feature {{ $i }}</h5>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
                                                    <input type="file" name="cyber_security_ios_icon_{{ $suffix }}"
                                                        class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Sub Title</label>
                                                    <input type="text" name="cyber_security_ios_{{ $suffix }}_title" placeholder="Enter subtitle"
                                                        class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                                    <textarea name="cyber_security_ios_{{ $suffix }}_desc" rows="3" placeholder="Enter description"
                                                        class="w-full border border-gray-300 rounded-md p-2 text-sm summernote"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                 <!-- The Best Cyber-Security in the World – iOS END -->
                                  <!--Main FOOOTER START -->
                                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                                    <h4 class="text-2xl font-bold text-gray-800 mb-4">Information About Product in Detail</h4>

                                    <!-- Main Title -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                                        <input type="text" name="footer_main_title_product" placeholder="Protecting over 500,000,000 users worldwide"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                    </div>

                                    <!-- Feature Section (only one, no tab switching) -->
                                    <div class="bg-white rounded-xl shadow-md p-6 mt-6 space-y-4">
                                        <h5 class="text-lg font-semibold text-gray-700">Feature</h5>

                                        <!-- Sub Title -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Sub Title</label>
                                            <input type="text" name="footer_sub_title_product"
                                                placeholder="Powerful, Intuitive, Ultrafast, Featherlight Antivirus Software"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                        </div>

                                        <!-- Description -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                            <textarea name="footer_desc_product" rows="3" placeholder="Enter description"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm summernote"></textarea>
                                        </div>
                                    </div>
                                </div>

                                 <!-- Main FOOOTER END -->



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
        </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('body').on('change', '.main-category', function(e){
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
    <!-- JavaScript -->
<script>
    function showFeature(index) {
        for (let i = 1; i <= 6; i++) {
            document.getElementById('feature-' + i).style.display = (i === index) ? 'block' : 'none';
            document.getElementById('tab-btn-' + i).classList.toggle('bg-blue-500', i === index);
            document.getElementById('tab-btn-' + i).classList.toggle('text-white', i === index);
        }
    }

    // Optional: highlight the first tab by default
    document.addEventListener('DOMContentLoaded', () => {
        showFeature(1);
    });
</script>
<script>
    function showAndroidFeature(index) {
        for (let i = 1; i <= 3; i++) {
            document.getElementById('android-feature-' + i).style.display = (i === index) ? 'block' : 'none';
            document.getElementById('android-tab-btn-' + i).classList.toggle('bg-green-500', i === index);
            document.getElementById('android-tab-btn-' + i).classList.toggle('text-white', i === index);
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        showAndroidFeature(1);
    });
</script>

<script>
    function showSysAddTab(platform) {
        document.querySelectorAll('.sys-add-tab').forEach(el => el.style.display = 'none');
        document.querySelectorAll('.sys-add-tab-btn').forEach(btn => btn.classList.remove('bg-green-100', 'bg-blue-100'));
        const tab = document.getElementById('sys-add-' + platform);
        if (tab) tab.style.display = 'block';
        const btn = document.getElementById('sys-add-tab-' + platform);
        if (btn) btn.classList.add(platform === 'android' ? 'bg-green-100' : 'bg-blue-100');
    }

    document.addEventListener('DOMContentLoaded', () => showSysAddTab('android'));
</script>
<script>
    function showCyberSecurityFeature(platform, index) {
        for (let i = 1; i <= 3; i++) {
            const tab = document.getElementById(`${platform}-featuresecure-${i}`);
            const btn = document.getElementById(`${platform}-tab-btn-${i}`);

            if (tab && btn) {
                if (i === index) {
                    tab.style.display = 'block';
                    btn.classList.add('bg-green-100', 'text-white', 'bg-green-500');
                } else {
                    tab.style.display = 'none';
                    btn.classList.remove('bg-green-100', 'text-white', 'bg-green-500');
                }
            }
        }
    }
</script>


@endpush
