@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Reset Password
@endsection

@section('content')


<style>
    .toggle-password {
        cursor: pointer;
        position: absolute;
        right: 15px;
           top: 55px;
        transform: translateY(-50%);
    }
    .password-wrapper {
        position: relative;
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
                        <h4>Reset password</h4>
                        <ul>
                            <li><a href="/login">login</a></li>
                            <li><a href="#">rest password</a></li>
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
        CHANGE PASSWORD START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-10 col-lg-7 m-auto">
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf


                        <div class="wsus__change_password">
                            <h4>reset password</h4>
                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="wsus__single_pass">
                                <label>email</label>
                                <input id="email" type="email" name="email" value="{{old('email', $request->email)}}" placeholder="Email">
                            </div>
<!-- New Password Field -->
<div class="wsus__single_pass password-wrapper">
    <label>New Password</label>
    <input id="password" type="password" name="password" placeholder="New Password">
    <i class="fas fa-eye toggle-password" toggle="#password"></i>
</div>

<!-- Confirm Password Field -->
<div class="wsus__single_pass password-wrapper">
    <label>Confirm Password</label>
    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password">
    <i class="fas fa-eye toggle-password" toggle="#password_confirmation"></i>
</div>


                            <button class="common_btn" type="submit">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CHANGE PASSWORD END
    ==============================-->

<script>
    document.querySelectorAll('.toggle-password').forEach(function (icon) {
        icon.addEventListener('click', function () {
            const input = document.querySelector(this.getAttribute('toggle'));
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });
</script>
@endsection
