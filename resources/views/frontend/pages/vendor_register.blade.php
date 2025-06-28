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

   <!-- PERSONAL INFO -->
    <div class="bg-light p-3 rounded mb-4">
        <div class="col-12" id="otp_verified_message" style="display: none">
    <div style="max-width: 400px; margin: 30px auto; padding: 20px; background: #f0fdf4; border: 2px solid #34d399; border-radius: 12px; text-align: center; font-family: Arial, sans-serif; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <div style="    font-size: 30px;
    color: #10b981;
    margin-bottom: 10px;">✔️</div>
    <h2 style="    color: #065f46;
    margin: 0px 0;
    font-size: 20px;
    line-height: 1;
    margin-bottom: 10px;">OTP Verified Successfully!</h2>
    <p style="color: #047857; font-size: 16px;">
        Your phone number has been securely verified. You're now ready to continue.
    </p>
</div>

</div>

        <h5 class="mb-3">Personal Information</h5>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-user"></i>
            <input type="text" name="name" required class="form-control" placeholder="Full Name" value="{{ old('name') }}">
            {{-- @error('name') <small class="text-danger">{{ $message }}</small> @enderror --}}
        </div>

        <div class="row">
           
            <div class="col-md-12">
   
   <div class="row">
     <div class="col-md-6">
                     <div class="wsus__dash_pro_single">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" id="inputemail" required class="form-control" placeholder="Email Address" value="{{ old('email') }}">
    </div>
    </div>

    <div class="col-md-6 d-flex align-items-center mt-2 mt-md-0 wsus__dash_pro_single">
    <button type="button" class="btn btn-success" id="sendOtpBtnemail">Send OTP</button>
</div>

 <div class="col-12" id="otp_section_email" style="display: none;">
   <div class="row">
     <div class="col-md-6">
        <div class="wsus__dash_pro_single">
            <i class="fas fa-key"></i>
            <input type="text" name="otp" id="otpemail" class="form-control" placeholder="Enter OTP">
        </div>
    </div>
    <div class="col-md-6 d-flex align-items-center ">
        <div class="wsus__dash_pro_single">
            <button type="button" id="verify_otp_btnemail" class="btn btn-success me-2">Verify OTP</button>
        <button type="button" id="resend_otp_btnemail" class="btn btn-secondary" disabled>Resend OTP (<span id="timeremail" class="text-white">60</span>s)</button>
        </div>
    </div>
   </div>
</div>

    

      


         <div class="col-md-6">
    <div class="wsus__dash_pro_single">
        <i class="fas fa-phone"></i>
        <input type="text" name="phone" id="phone_input" required class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
    </div>
</div>
<div class="col-md-6 d-flex align-items-center mt-2 mt-md-0 wsus__dash_pro_single">
    <button type="button" id="send_otp_btn" class="btn btn-info">Send OTP</button>
</div>
 </div>

        <div class="row" id="otp_section" style="display: none;">
    <div class="col-md-6">
        <div class="wsus__dash_pro_single">
            <i class="fas fa-key"></i>
            <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter OTP">
        </div>
    </div>
    <div class="col-md-6 d-flex align-items-center ">
        <div class="wsus__dash_pro_single">
            <button type="button" id="verify_otp_btn" class="btn btn-success me-2">Verify OTP</button>
        <button type="button" id="resend_otp_btn" class="btn btn-secondary" disabled>Resend OTP (<span id="timer" class="text-white">60</span>s)</button>
        </div>
    </div>
</div>


        <div class="row">
            <div class="col-md-6">
                <div class="wsus__dash_pro_single">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" required class="form-control" placeholder="Password">
                    {{-- @error('password') <small class="text-danger">{{ $message }}</small> @enderror --}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="wsus__dash_pro_single">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password_confirmation" required class="form-control" placeholder="Confirm Password">
                </div>
            </div>
        </div>
    </div>


    <!-- SHOP DETAILS -->
    <div class="bg-light p-3 rounded mb-4">
        <h5 class="mb-3">Company Details</h5>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-image"></i>
            <input type="file" name="shop_image" required class="form-control">
            {{-- @error('shop_image') <small class="text-danger">{{ $message }}</small> @enderror --}}
        </div>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-store"></i>
            <input type="text" name="shop_name" required class="form-control" placeholder="Company Name" value="{{ old('shop_name') }}">
            {{-- @error('shop_name') <small class="text-danger">{{ $message }}</small> @enderror --}}
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="wsus__dash_pro_single">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="shop_email" required class="form-control" placeholder="Company Email" value="{{ old('shop_email') }}">
                    {{-- @error('shop_email') <small class="text-danger">{{ $message }}</small> @enderror --}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="wsus__dash_pro_single">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="shop_phone" required class="form-control" placeholder="Company Phone" value="{{ old('shop_phone') }}">
                    {{-- @error('shop_phone') <small class="text-danger">{{ $message }}</small> @enderror --}}
                </div>
            </div>
        </div>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-map-marker-alt"></i>
            <input type="text" name="shop_address" required class="form-control" placeholder="Company Address" value="{{ old('shop_address') }}">
            {{-- @error('shop_address') <small class="text-danger">{{ $message }}</small> @enderror --}}
        </div>

        <div class="wsus__dash_pro_single">
            <textarea name="about" class="form-control"  required rows="4" placeholder="About You">{{ old('about') }}</textarea>
            {{-- @error('about') <small class="text-danger">{{ $message }}</small> @enderror --}}
        </div>
    </div>
        <button type="submit"  id="submit_btn" class="btn btn-primary w-100 py-2" disabled>Submit</button>
    </form>

</div>

                </div>
             
            </div>
        </div>
    </section>
    <!--============================
       VENDORS END
    ==============================-->

    @section('footerLinks')

<script>
    let timerInterval;

    var phoneInput = document.getElementById('phone_input');
    var sendBtn = document.getElementById('send_otp_btn');
    var verifyBtn = document.getElementById('verify_otp_btn');
    var resendBtn = document.getElementById('resend_otp_btn');
    var timerSpan = document.getElementById('timer');
    var otpSection = document.getElementById('otp_section');

    sendBtn.addEventListener('click', () => {
        var phone = phoneInput.value.trim();
        if (!phone) return toastr.error('Please enter a phone number.');

        fetch(`{{ url('/vendor-send-otp') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ phone })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                otpSection.style.display = 'flex';
                toastr.success(data.message || 'OTP sent to your mobile number.');
                if (data.remaining) startResendTimer(data.remaining);
            } else {
                toastr.error(data.message || 'Failed to send OTP.');
                if (data.remaining) startResendTimer(data.remaining);
            }
        })
        .catch(() => toastr.error('Something went wrong while sending OTP.'));
    });

    verifyBtn.addEventListener('click', () => {
    var phone = phoneInput.value.trim();
    var otp = document.getElementById('otp').value.trim();
    var verifiedMessage = document.getElementById('otp_verified_message');
    var submitBtn = document.getElementById('submit_btn');

    if (!otp) return toastr.warning('Please enter the OTP.');

    fetch(`{{ url('/vendor-verify-otp') }}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ phone, otp })
    })
    .then(res => res.json())
    .then(data => {
        if (data.verified) {
            toastr.success('OTP verified successfully!');
            otpSection.style.display = 'none'; // Hide OTP section
            sendBtn.style.display = 'none'; // Hide OTP section
            verifiedMessage.style.display = 'inline'; // Show success message
            submitBtn.disabled = false; // Enable form submit
        } else {
            toastr.error(data.message || 'Invalid OTP.');
        }
    })
    // .catch(() => toastr.error('OTP verification failed.'));
});

    resendBtn.addEventListener('click', () => {
        var phone = phoneInput.value.trim();
        if (!phone) return toastr.error('Please enter a phone number.');

        fetch(`{{ url('/vendor-send-otp') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ phone })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                toastr.info(data.message || 'OTP resent to your mobile.');
                if (data.remaining) startResendTimer(data.remaining);
            } else {
                toastr.error(data.message || 'Failed to resend OTP.');
                if (data.remaining) startResendTimer(data.remaining);
            }
        })
        .catch(() => toastr.error('Something went wrong while resending OTP.'));
    });

    function startResendTimer(seconds) {
        resendBtn.disabled = true;
        timerSpan.textContent = seconds;
        clearInterval(timerInterval);

        timerInterval = setInterval(() => {
            seconds--;
            timerSpan.textContent = seconds;
            if (seconds <= 0) {
                clearInterval(timerInterval);
                resendBtn.disabled = false;
                timerSpan.textContent = '0';
            }
        }, 1000);
    }
</script>


<script>
    let timerInterval2;

    var emailinput = document.getElementById('inputemail');
    var sendBtn = document.getElementById('sendOtpBtnemail');
    var verifyBtn = document.getElementById('verify_otp_btnemail');
    var resendBtn = document.getElementById('resend_otp_btnemail');
    var timerSpan = document.getElementById('timeremail');
    var otpSection = document.getElementById('otp_section_email');

    sendBtn.addEventListener('click', () => {
        var email = emailinput.value.trim();
        if (!email) return toastr.error('Please enter an Email Address.');

        sendBtn.innerText = 'Sending...';
        sendBtn.disabled = true;

        fetch(`{{ url('/send-otp-email') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ email })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                otpSection.style.display = 'flex';
                sendBtn.style.display = 'none';
                toastr.success(data.message || 'OTP sent to your email.');
                sendBtn.innerText = 'Sent';
                if (data.remaining) startResendTimer(data.remaining);
            } else {
                toastr.error(data.message || 'Failed to send OTP.');
                sendBtn.innerText = 'Send OTP';
                if (data.remaining) startResendTimer(data.remaining);
            }
            sendBtn.disabled = false;
        })
        .catch(() => {
            toastr.error('Something went wrong while sending OTP.');
            sendBtn.innerText = 'Send OTP';
            sendBtn.disabled = false;
        });
    });

    verifyBtn.addEventListener('click', () => {
        var email = emailinput.value.trim();
        var otp = document.getElementById('otpemail').value.trim();
        var verifiedMessage = document.getElementById('otp_verified_messageemail');
        var submitBtn = document.getElementById('submit_btn');

        if (!otp) return toastr.warning('Please enter the OTP.');

        fetch(`{{ url('/vendor-verify-otp') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ email, otp })
        })
        .then(res => res.json())
        .then(data => {
            if (data.verified) {
                toastr.success('OTP verified successfully!');
                otpSection.style.display = 'none';
                sendBtn.style.display = 'none';
                verifiedMessage.style.display = 'inline';
                submitBtn.disabled = false;
            } else {
                toastr.error(data.message || 'Invalid OTP.');
            }
        })
        .catch(() => toastr.error('OTP verification failed.'));
    });

    resendBtn.addEventListener('click', () => {
        var email = emailinput.value.trim();
        if (!email) return toastr.error('Please enter an Email Address.');

        resendBtn.innerText = 'Resending...';
        resendBtn.disabled = true;

        fetch(`{{ url('/send-otp-email') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ email })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                toastr.info(data.message || 'OTP resent to your email.');
                resendBtn.innerText = 'Resent';
                if (data.remaining) startResendTimer(data.remaining);
            } else {
                toastr.error(data.message || 'Failed to resend OTP.');
                resendBtn.innerText = 'Resend OTP';
                if (data.remaining) startResendTimer(data.remaining);
            }
        })
        .catch(() => {
            toastr.error('Something went wrong while resending OTP.');
            resendBtn.innerText = 'Resend OTP';
            resendBtn.disabled = false;
        });
    });

    function startResendTimer(seconds) {
        resendBtn.disabled = true;
        timerSpan.textContent = seconds;
        clearInterval(timerInterval2);

        timerInterval2 = setInterval(() => {
            seconds--;
            timerSpan.textContent = seconds;
            if (seconds <= 0) {
                clearInterval(timerInterval2);
                resendBtn.disabled = false;
                resendBtn.innerText = 'Resend OTP';
                timerSpan.textContent = '0';
            }
        }, 1000);
    }
</script>


    @endsection

    @endsection
