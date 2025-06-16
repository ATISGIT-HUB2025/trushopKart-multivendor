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
                    <h4>Update Product</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
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

                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputState">Brand</label>
                                <select id="inputState" class="form-control" name="brand">
                                    <option value="">Select</option>
                                    @foreach ($brands as $brand)
                                        <option {{$brand->id == $product->brand_id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" value="{{$product->price}}">
                            </div>
                        </div>
                         <div class="col-md-4">   
                            <div class="form-group">
                                <label>MVoucher Point</label>
                                <input type="number" class="form-control" name="coin_price" value="{{$product->coin_price}}">
                            </div>
                        </div>
                </div>          

                        {{-- <div class="form-group">
                            <label>SKU</label>
                            <input type="text" class="form-control" name="sku" value="{{$product->sku}}">
                        </div> --}}

               <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Offer Price</label>
                                <input type="text" class="form-control" name="offer_price" value="{{$product->offer_price}}">
                            </div>
                        </div> 
                        <div class="col-md-4">
                              <div class="form-group">
                                     <label>Refferal Points</label>
                                    <input type="number" class="form-control" name="referral_points_max_use" value="{{$product->referral_points_max_use}}">
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Stock Quantity</label>
                                <input type="number" min="0" class="form-control" name="qty" value="{{$product->qty}}">
                            </div>
                        </div> 
                </div> 
                
                <div class="row">
                    <div class="col-md-4">
                       <div class="form-group">
                            <label>Video Link</label>
                            <input type="text" class="form-control" name="video_link" value="{{$product->video_link}}">
                        </div>
                   </div>
                    <div class="col-md-4">
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
                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label>Product Key</label>
                            <textarea name="product_key" class="form-control">{!! $product->product_key !!}</textarea>
                        </div>
                    </div>
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
                            <label>Seo Title</label>
                            <input type="text" class="form-control" name="seo_title" value="{{$product->seo_title}}">
                        </div>
                        <div class="form-group">
                            <label>Seo Description</label>
                            <textarea name="seo_description" class="form-control">{!!$product->seo_description!!}</textarea>
                        </div>

                        <!-- Best Protection for Android START-->
                        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                            <h4 class="text-2xl font-bold text-gray-800 mb-4">Best Protection for Android</h4>

                            <!-- Main Title -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                                <input type="text" name="best_protectIon_android_heading" placeholder="Enter title"
                                    value="{{ $attributes['best_protectIon_android_heading'] ?? '' }}"
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

                                        <!-- Icon Upload + Preview -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
                                            @if (!empty($attributes["best_protectIon_android_icon_{$suffix}"]))
                                                <div class="mb-2">
                                                    <img src="{{ asset($attributes["best_protectIon_android_icon_{$suffix}"]) }}"
                                                        alt="Icon" class="w-12 h-12 object-contain" />
                                                </div>
                                            @endif
                                            <input type="file" name="best_protectIon_android_icon_{{ $suffix }}"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                        </div>

                                        <!-- Sub Title -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Sub Title <span class="text-red-500">*</span></label>
                                            <input type="text" name="best_protectIon_android__{{ $suffix }}_title" placeholder="Enter subtitle"
                                                value="{{ $attributes["best_protectIon_android__{$suffix}_title"] ?? '' }}"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                        </div>

                                        <!-- Description -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                            <textarea name="best_protectIon_android__{{ $suffix }}_desc" rows="3" placeholder="Enter description"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm summernote">
                                                {{ $attributes["best_protectIon_android__{$suffix}_desc"] ?? '' }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <!-- Best Protection for Android END -->

                        <!-- Best Protection for iOS START -->
                        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                            <h4 class="text-2xl font-bold text-gray-800 mb-4">Best Protection for iOS</h4>

                            <!-- Main Title -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                                <input type="text" name="best_protectIon_ios_heading" placeholder="Enter title"
                                    value="{{ $attributes['best_protectIon_ios_heading'] ?? '' }}"
                                    class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>

                            <!-- Tab Selectors -->
                            <div class="flex gap-2 mt-4 mb-6">
                                @for ($i = 1; $i <= 6; $i++)
                                    <button type="button" onclick="showFeature({{ $i }})"
                                            class="android-tab-btn px-4 py-2 rounded-md border border-gray-300 text-sm hover:bg-green-100"
                                            id="tab-btn-{{ $i }}">
                                        Feature {{ $i }}
                                    </button>
                                @endfor
                            </div>

                            <!-- iOS Feature Tabs -->
                            @for ($i = 1; $i <= 6; $i++)
                                @php
                                    $suffix = chr(96 + $i); // a-f
                                @endphp
                                <div class="feature-tab" id="feature-{{ $i }}" style="{{ $i == 1 ? '' : 'display:none;' }}">
                                    <div class="bg-white rounded-xl shadow-md p-6 mb-6 space-y-4">
                                        <h5 class="text-lg font-semibold text-gray-700">Feature {{ $i }}</h5>

                                        <!-- Icon Upload + Preview -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
                                            @if (!empty($attributes["best_protectIon_ios_icon_{$suffix}"]))
                                                <div class="mb-2">
                                                    <img src="{{ asset($attributes["best_protectIon_ios_icon_{$suffix}"]) }}"
                                                        alt="Icon" class="w-12 h-12 object-contain" />
                                                </div>
                                            @endif
                                            <input type="file" name="best_protectIon_ios_icon_{{ $suffix }}"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                        </div>

                                        <!-- Sub Title -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Sub Title <span class="text-red-500">*</span></label>
                                            <input type="text" name="best_protectIon_ios__{{ $suffix }}_title" placeholder="Enter subtitle"
                                                value="{{ $attributes["best_protectIon_ios__{$suffix}_title"] ?? '' }}"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                        </div>

                                        <!-- Description -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                            <textarea name="best_protectIon_ios__{{ $suffix }}_desc" rows="3" placeholder="Enter description"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm summernote">
                                                {{ $attributes["best_protectIon_ios__{$suffix}_desc"] ?? '' }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <!-- Best Protection for iOS END -->
                         <!-- System Requirements: Edit Form for Android & iOS -->
                            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                                <h4 class="text-2xl font-bold text-gray-800 mb-4">Edit System Requirements</h4>

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
                                                value="{{ old('system_req_title_android', $attributes['system_req_title_android'] ?? '') }}"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Operating System</label>
                                            <input type="text" name="system_req_operating_system_android" placeholder="e.g., Android 10+"
                                                value="{{ old('system_req_operating_system_android', $attributes['system_req_operating_system_android'] ?? '') }}"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                            <textarea name="system_req_desc_android" rows="3" placeholder="Enter details"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm summernote">{{ old('system_req_desc_android', $attributes['system_req_desc_android'] ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- iOS Fields -->
                                <div id="sys-add-ios" class="sys-add-tab" style="display: none;">
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Main Title (iOS)</label>
                                            <input type="text" name="system_req_title_ios" placeholder="Enter iOS title"
                                                value="{{ old('system_req_title_ios', $attributes['system_req_title_ios'] ?? '') }}"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Operating System</label>
                                            <input type="text" name="system_req_operating_system_ios" placeholder="e.g., iOS 14+"
                                                value="{{ old('system_req_operating_system_ios', $attributes['system_req_operating_system_ios'] ?? '') }}"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                            <textarea name="system_req_desc_ios" rows="3" placeholder="Enter details"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm summernote">{{ old('system_req_desc_ios', $attributes['system_req_desc_ios'] ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- System Requirements Edit End -->
                             <!-- The Best Cyber-Security in the World – Android -->
                                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                                    <h4 class="text-2xl font-bold text-gray-800 mb-4">The Best Cyber-Security in the World - Android</h4>

                                    <!-- Main Title -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                                        <input type="text" name="cyber_security_title_android" placeholder="Enter title"
                                            value="{{ old('cyber_security_title_android', $attributes['cyber_security_title_android'] ?? '') }}"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                    </div>

                                    <!-- Tab Selectors -->
                                 <!-- Tab Selectors -->
                                    <div class="flex gap-2 mt-4 mb-6">
                                        @for ($i = 1; $i <= 3; $i++)
                                            <button type="button"
                                                onclick="showCyberSecurityFeature('android', {{ $i }})"
                                                class="android-tab-btn px-4 py-2 rounded-md border border-gray-300 text-sm hover:bg-green-100 {{ $i == 1 ? 'bg-green-200 font-semibold' : '' }}"
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
                                                        value="{{ old("cyber_security_android_{$suffix}_title", $attributes["cyber_security_android_{$suffix}_title"] ?? '') }}"
                                                        class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                                    <textarea name="cyber_security_android_{{ $suffix }}_desc" rows="3" placeholder="Enter description"
                                                        class="w-full border border-gray-300 rounded-md p-2 text-sm summernote">{{ old("cyber_security_android_{$suffix}_desc", $attributes["cyber_security_android_{$suffix}_desc"] ?? '') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>  
                     <!-- The Best Cyber-Security in the World – Anroid and -->
                      <!-- The Best Cyber-Security in the World – iOS -->
                        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                            <h4 class="text-2xl font-bold text-gray-800 mb-4">The Best Cyber-Security in the World - iOS</h4>

                            <!-- Main Title -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                                <input type="text" name="cyber_security_title_ios" placeholder="Enter title"
                                    value="{{ old('cyber_security_title_ios', $attributes['cyber_security_title_ios'] ?? '') }}"
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
                                                value="{{ old("cyber_security_ios_{$suffix}_title", $attributes["cyber_security_ios_{$suffix}_title"] ?? '') }}"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                            <textarea name="cyber_security_ios_{{ $suffix }}_desc" rows="3" placeholder="Enter description"
                                                class="w-full border border-gray-300 rounded-md p-2 text-sm summernote">{{ old("cyber_security_ios_{$suffix}_desc", $attributes["cyber_security_ios_{$suffix}_desc"] ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <!-- The Best Cyber-Security in the World – iOS END -->
                         <!-- Main FOOOTER START -->
                            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                                <h4 class="text-2xl font-bold text-gray-800 mb-4">Information About Product in Detail</h4>

                                <!-- Main Title -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                                    <input type="text" name="footer_main_title_product" placeholder="Protecting over 500,000,000 users worldwide"
                                        value="{{ old('footer_main_title_product', $attributes['footer_main_title_product'] ?? '') }}"
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
                                            value="{{ old('footer_sub_title_product', $attributes['footer_sub_title_product'] ?? '') }}"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm" />
                                    </div>

                                    <!-- Description -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                        <textarea name="footer_desc_product" rows="3" placeholder="Enter description"
                                            class="w-full border border-gray-300 rounded-md p-2 text-sm summernote">{{ old('footer_desc_product', $attributes['footer_desc_product'] ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Main FOOOTER END -->

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
        </section>
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
    // Android Tabs
    function showAndroidFeature(index) {
        document.querySelectorAll('.android-feature-tab').forEach(tab => tab.style.display = 'none');
        document.querySelectorAll('.android-tab-btn').forEach(btn => {
            btn.classList.remove('bg-green-500', 'text-white');
        });
        document.getElementById('android-feature-' + index).style.display = 'block';
        const activeBtn = document.getElementById('android-tab-btn-' + index);
        activeBtn.classList.add('bg-green-500', 'text-white');
    }

    // iOS Tabs
    function showFeature(index) {
        document.querySelectorAll('.feature-tab').forEach(tab => tab.style.display = 'none');
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-blue-500', 'text-white');
        });
        document.getElementById('feature-' + index).style.display = 'block';
        const activeBtn = document.getElementById('tab-btn-' + index);
        activeBtn.classList.add('bg-blue-500', 'text-white');
    }
    // document.addEventListener('DOMContentLoaded', () => {
    //     showAndroidFeature(1);
    //     showFeature(1);
    // });
</script>

<script>
    function showSysAddTab(platform) {
        // Hide both tab contents
        document.getElementById('sys-add-android').style.display = 'none';
        document.getElementById('sys-add-ios').style.display = 'none';

        // Remove active styles from both buttons
        document.querySelectorAll('.sys-add-tab-btn').forEach(btn => {
            btn.classList.remove('bg-green-500', 'bg-blue-500', 'text-white');
            btn.classList.add('bg-gray-100'); // default inactive style
        });

        // Show selected tab and apply active style
        if (platform === 'android') {
            document.getElementById('sys-add-android').style.display = 'block';
            const androidBtn = document.getElementById('sys-add-tab-android');
            androidBtn.classList.remove('bg-gray-100');
            androidBtn.classList.add('bg-green-500', 'text-white');
        } else if (platform === 'ios') {
            document.getElementById('sys-add-ios').style.display = 'block';
            const iosBtn = document.getElementById('sys-add-tab-ios');
            iosBtn.classList.remove('bg-gray-100');
            iosBtn.classList.add('bg-blue-500', 'text-white');
        }
    }

    // Optional: Default to Android on load
    document.addEventListener('DOMContentLoaded', () => {
        showSysAddTab('android');
    });
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
