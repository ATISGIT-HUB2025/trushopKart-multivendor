@extends('frontend.dashboard.layouts.master')

@section('title')
{{$settings->site_name}} || Profile
@endsection

@section('content')
<style>
  .inupt_user{
        background-color: #e2e1e1;
  }
  </style>

  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <h4>basic information</h4>

                    <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <!-- <div class="col-md-2">
                                <div class="wsus__dash_pro_img">
                                  <img src="{{Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/ts-2.jpg')}}" alt="img" class="img-fluid w-100">
                                  <input type="file" name="image">
                                </div>
                            </div> -->
                            <div class="col-md-12 mt-5">
                              <div class="wsus__dash_pro_single">
                                <i class="fas fa-user-tie"></i>
                                <input type="text" placeholder="Name" name="name"  class="inupt_user" value="{{Auth::user()->name}}" readonly>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="wsus__dash_pro_single">
                                <i class="fal fa-envelope-open"></i>
                                <input class="inupt_user" type="email" placeholder="Email" name="email" value="{{Auth::user()->email}}" readonly>
                              </div>
                            </div>
                                       <!-- Add this code before the email field -->
                        <div class="col-md-12">
                            <div class="wsus__dash_pro_single">
                                <i class="fas fa-mobile-alt"></i>

                                <input class="inupt_user" type="text" placeholder="phone number" name="phone" value="{{Auth::user()->phone}}"readonly>
                            </div>
                        </div>

                        </div>
                        <div class="col-xl-12">
                            <button class="common_btn mb-4 mt-2" type="submit">upload</button>
                        </div>
                    </form>


                    <div class="wsus__dash_pass_change mt-2">
                   <form action="{{ route('user.profile.update.password') }}" method="POST">
    @csrf
    <div class="row">
        <h4>Update Password</h4>

        <!-- Current Password -->
        <div class="col-xl-4 col-md-6">
            <div class="wsus__dash_pro_single position-relative">
                <i class="fas fa-unlock-alt"></i>
                <input type="password" placeholder="Current Password" name="current_password" id="current_password">
                <i class="fas fa-eye toggle-password" toggle="#current_password"></i>
            </div>
        </div>

        <!-- New Password -->
        <div class="col-xl-4 col-md-6">
            <div class="wsus__dash_pro_single position-relative">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="New Password" name="password" id="new_password">
                <i class="fas fa-eye toggle-password" toggle="#new_password"></i>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="col-xl-4">
            <div class="wsus__dash_pro_single position-relative">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm Password" name="password_confirmation" id="confirm_password">
                <i class="fas fa-eye toggle-password" toggle="#confirm_password"></i>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-xl-12">
            <button class="common_btn" type="submit">Upload</button>
        </div>
    </div>
</form>
                    </div>


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


<script>
document.querySelectorAll('.toggle-password').forEach(function (eyeIcon) {
    eyeIcon.style.cursor = 'pointer';

    eyeIcon.addEventListener('click', function () {
        const input = document.querySelector(this.getAttribute('toggle'));
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
});
</script>

@endsection
