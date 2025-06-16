@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Vendor Register
@endsection

@section('content')


<style>
    h5, .display-sm {
    font-size: 20px;
    line-height: 38px;
}
.fl-message{
    color: #fff;
}
</style>

    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>vendors</h4>
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li><a href="javascript:;">vendors</a></li>
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
      VENDORS START
    ==============================-->
    <section id="wsus__product_page" class="wsus__vendors">
        <div class="container">
            <div class="row">
                <div class="">
                 <div class="row justify-content-center">
    <form  class="col-md-8" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-4 bg-white shadow-sm p-3 text-center border">
        <h3 class="h4">Vendor Registration</h3>
        <p class="mb-0 small">Fill in the form below to become a vendor</p>
    </div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <!-- PERSONAL INFO -->
    <div class="bg-light p-3 rounded mb-4">
        <h5 class="mb-3">Personal Information</h5>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-user"></i>
            <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
            {{-- @error('name') <small class="text-danger">{{ $message }}</small> @enderror --}}
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="wsus__dash_pro_single">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}">
                    {{-- @error('email') <small class="text-danger">{{ $message }}</small> @enderror --}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="wsus__dash_pro_single">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
                    {{-- @error('phone') <small class="text-danger">{{ $message }}</small> @enderror --}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="wsus__dash_pro_single">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    {{-- @error('password') <small class="text-danger">{{ $message }}</small> @enderror --}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="wsus__dash_pro_single">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                </div>
            </div>
        </div>
    </div>

    <!-- SHOP DETAILS -->
    <div class="bg-light p-3 rounded mb-4">
        <h5 class="mb-3">Company Details</h5>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-image"></i>
            <input type="file" name="shop_image" class="form-control">
            {{-- @error('shop_image') <small class="text-danger">{{ $message }}</small> @enderror --}}
        </div>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-store"></i>
            <input type="text" name="shop_name" class="form-control" placeholder="Company Name" value="{{ old('shop_name') }}">
            {{-- @error('shop_name') <small class="text-danger">{{ $message }}</small> @enderror --}}
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="wsus__dash_pro_single">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="shop_email" class="form-control" placeholder="Company Email" value="{{ old('shop_email') }}">
                    {{-- @error('shop_email') <small class="text-danger">{{ $message }}</small> @enderror --}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="wsus__dash_pro_single">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="shop_phone" class="form-control" placeholder="Company Phone" value="{{ old('shop_phone') }}">
                    {{-- @error('shop_phone') <small class="text-danger">{{ $message }}</small> @enderror --}}
                </div>
            </div>
        </div>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-map-marker-alt"></i>
            <input type="text" name="shop_address" class="form-control" placeholder="Company Address" value="{{ old('shop_address') }}">
            {{-- @error('shop_address') <small class="text-danger">{{ $message }}</small> @enderror --}}
        </div>

        <div class="wsus__dash_pro_single">
            <textarea name="about" class="form-control" rows="4" placeholder="About You">{{ old('about') }}</textarea>
            {{-- @error('about') <small class="text-danger">{{ $message }}</small> @enderror --}}
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">Submit</button>
</form>

</div>

                </div>
             
            </div>
        </div>
    </section>
    <!--============================
       VENDORS END
    ==============================-->
@endsection
