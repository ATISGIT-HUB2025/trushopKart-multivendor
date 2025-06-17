@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Login
@endsection

@section('content')

<style>
    .parent_form_group{
        position: relative;;
    }
    .myinput{
            position: absolute;
    right: -10px;
    }

    #ref_info_box {
    margin-bottom: 15px;
    padding: 10px;
    border-radius: 5px;
}


#otp_action_btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

span#countdown {
    color: #fff;
}

/* Add these styles to your existing CSS */
#otp_action_btn:disabled,
#resend_otp_btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

#otp_loader, 
#register_loader {
    font-size: 14px;
    font-weight: 500;
}

.d-flex.justify-content-between {
    gap: 10px;
}

.common_btn {
    flex: 1;
    white-space: nowrap;
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
                        <h4>login / register</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">login / register</a></li>
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
       LOGIN/REGISTER PAGE START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__login_reg_area">
                        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-homes" type="button" role="tab" aria-controls="pills-homes"
                                    aria-selected="true">login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-profiles" type="button" role="tab"
                                    aria-controls="pills-profiles" aria-selected="true">signup</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent2">
                            <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                                aria-labelledby="pills-home-tab2">
                                <div class="wsus__login">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="wsus__login_input">
    <i class="fas fa-user-tie"></i>
    <input id="login" type="text" name="login" value="{{old('login')}}" 
           placeholder="Email or Unique ID">
</div>

<div class="wsus__login_input parent_form_group">
    <i class="fas fa-key"></i>
    <input id="password" type="password" name="password" placeholder="Password">
    <i class="fas fa-eye  myinput"></i>
</div>



                                        <div class="wsus__login_save">
                                            <div class="form-check form-switch">
                                                <input id="remember_me" name="remember" class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckDefault">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Remember
                                                    me</label>
                                            </div>
                                            <a class="forget_p" href="{{ route('password.request') }}">forget password ?</a>
                                        </div>

                                        <button class="common_btn" type="submit">login</button>
                                        {{-- <p class="social_text">Sign in with social account</p>
                                        <ul class="wsus__login_link">
                                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul> --}}
                                    </form>
                                </div>
                            </div>


                            
                            <div class="tab-pane fade" id="pills-profiles" role="tabpanel"
                                aria-labelledby="pills-profile-tab2">
                               <div class="wsus__login">
    <form id="otpForm">
        @csrf
        <div class="wsus__login_input">
            <i class="far fa-envelope"></i>
            <!-- <input id="verify_email" name="email" type="email" placeholder="Enter Email to Get OTP"> -->
            <input id="verify_email" name="email" type="text" placeholder="Enter Email or Mobile Number">

        </div>

        <div class="wsus__login_input d-none" id="otp_input_box">
            <i class="fas fa-key"></i>
            <input id="email_otp" type="text" placeholder="Enter OTP">
        </div>
        
        <div class="d-flex justify-content-between mt-3">
            <button type="button" class="common_btn" id="verify_otp_btn" style="display: none;">Verify OTP</button>
            <button type="button" class="common_btn" id="send_otp_btn">Send OTP</button>
            <button type="button" class="common_btn" id="resend_otp_btn" style="display: none;" disabled>
                Resend OTP (<span id="countdown">60</span>s)
            </button>
        </div>

        <div id="otp_loader" class="mt-2 text-primary d-none">Sending OTP...</div>
    </form>

    <form id="registerForm" method="POST" class="d-none">
        @csrf
        <input type="hidden" name="email" id="final_email">

        <div class="wsus__login_input">
            <i class="fas fa-user-tie"></i>
            <input name="name" type="text" placeholder="Name">
        </div>

        <div class="wsus__login_input">
            <i class="far fa-mobile"></i>
            <!-- <input id="verify_phone" name="phone" type="text" placeholder="Enter Mobile Number"> -->
             @php
                $phone = '';
                foreach (Session::all() as $key => $value) {
                    if (Str::startsWith($key, 'otp_verified_') && !Str::contains($key, 'expiry')) {
                        $phone = Str::after($key, 'otp_verified_');
                    }
                }
            @endphp

            <input id="verify_phone" name="phone" type="text" placeholder="Enter Mobile Number" value="{{ $phone }}" disable>

        </div>
        
        <div class="wsus__login_input parent_form_group">
            <i class="fas fa-key"></i>
            <input name="password" type="password" placeholder="Password">
            <i class="fas fa-eye myinput"></i>
        </div>

        <input type="text" name="referral_code" class="d-none" value="{{ request()->get('ref') }}">

        <div class="wsus__login_input parent_form_group">
            <i class="fas fa-key"></i>
            <input name="password_confirmation" type="password" placeholder="Confirm Password">
            <i class="fas fa-eye myinput"></i>
        </div>

        <button class="common_btn mt-4" type="submit" id="register_btn">Sign Up</button>
        <div id="register_loader" class="mt-2 text-primary d-none">Registering...</div>
    </form>

    <div id="ref_info_box" class="alert alert-success d-none mt-4">
        <strong>Referral Code:</strong> <span id="ref_code"></span> Signup Bonus 50 Reward Point </b>
    </div>
</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
       LOGIN/REGISTER PAGE END
    ==============================-->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script>
    document.querySelectorAll('.myinput').forEach(function (eyeIcon) {
        eyeIcon.addEventListener('click', function () {
            const parent = eyeIcon.closest('.wsus__login_input');
            const passwordInput = parent.querySelector('input[type="password"], input[type="text"]');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const ref = urlParams.get("ref");

    if (ref) {
        // Activate Signup tab
        const signupTab = document.getElementById("pills-profile-tab2");
        const signupPane = document.getElementById("pills-profiles");
        const loginTab = document.getElementById("pills-home-tab2");
        const loginPane = document.getElementById("pills-homes");

        // Remove 'active show' from login pane
        loginTab.classList.remove("active");
        loginPane.classList.remove("active", "show");

        // Add 'active show' to signup pane
        signupTab.classList.add("active");
        signupPane.classList.add("active", "show");

        // Show referral info
        const infoBox = document.getElementById("ref_info_box");
        const refCode = document.getElementById("ref_code");
        infoBox.classList.remove("d-none");
        refCode.textContent = ref;
    }
});


</script>
{{-- 
<script>
document.addEventListener("DOMContentLoaded", function () {
    const otpBtn = document.getElementById('otp_action_btn');
    const emailInput = document.getElementById('verify_email');
    const otpInputBox = document.getElementById('otp_input_box');
    const otpField = document.getElementById('email_otp');
    const otpLoader = document.getElementById('otp_loader');
    const otpForm = document.getElementById('otpForm');
    const registerForm = document.getElementById('registerForm');
    const registerLoader = document.getElementById('register_loader');
    const finalEmail = document.getElementById('final_email');
    // const finalPhone = document.getElementById('final_phone');

    otpBtn.addEventListener('click', function () {
        const email = emailInput.value;
        const stage = otpBtn.getAttribute('data-stage');

        if (!email) {
            toastr.error("Please enter an email.");
            return;
        }

        if (stage === 'send') {
            otpLoader.classList.remove('d-none', 'text-danger');
            otpLoader.classList.add('text-primary');
            otpLoader.textContent = "Sending OTP...";

            fetch("{{ route('send.email.otp') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email: email})
            })
            .then(response => {
                if (response.status === 422) return response.json().then(data => { throw data; });
                return response.json();
            })
            .then(res => {
                otpLoader.classList.add('d-none');
                otpLoader.classList.remove('text-danger');
                otpLoader.textContent = '';

                if (res.status === 'success') {
                    toastr.success("OTP sent successfully!");
                    otpInputBox.classList.remove('d-none');
                    otpBtn.textContent = 'Verify OTP';
                    otpBtn.setAttribute('data-stage', 'verify');
                } else {
                    otpLoader.classList.remove('d-none', 'text-primary');
                    otpLoader.classList.add('text-danger');
                    otpLoader.textContent = res.message || 'Something went wrong';
                    toastr.error(res.message || 'Something went wrong');
                }
            })
            .catch(error => {
                otpLoader.classList.remove('d-none', 'text-primary');
                otpLoader.classList.add('text-danger');
                console.log(error);
                if (error.errors && error.errors.email) {
                    otpLoader.textContent = error.errors.email[0];
                    toastr.error(error.errors.email[0]);
                } else {
                    otpLoader.textContent = 'Validation error occurred.';
                    toastr.error('Validation error occurred.');
                }
            });

        } else if (stage === 'verify') {
            const otp = otpField.value;
            if (!otp) {
                toastr.error("Please enter the OTP.");
                return;
            }

            otpLoader.classList.remove('d-none');
            otpLoader.textContent = "Verifying...";

            fetch("{{ route('verify.email.otp') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email: email, otp: otp })
            })
            .then(response => response.json())
            .then(res => {
                otpLoader.classList.add('d-none');
                if (res.status === 'verified') {
                    toastr.success("Email verified successfully!");
                    otpForm.style.display = 'none';
                    registerForm.classList.remove('d-none');
                    finalEmail.value = email;
                    // finalPhone.value = phone;
                } else {
                    toastr.error(res.message);
                }
            });
        }
    });

    // Register form submit
registerForm.addEventListener('submit', function (e) {
    e.preventDefault();
    registerLoader.classList.remove('d-none');

    const formData = new FormData(registerForm);
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    fetch('{{ route("register.ajax") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    })
    .then(async response => {
        const text = await response.text();

        try {
            const res = JSON.parse(text);
            registerLoader.classList.add('d-none');

            if (res.status === 'success') {
                toastr.success("Registration successful!");
                window.location.href = res.redirect || '/user/dashboard';
            } else if (res.errors) {
                // Loop through validation errors and display them
                for (const [field, messages] of Object.entries(res.errors)) {
                    messages.forEach(msg => toastr.error(msg));
                }
            } else {
                toastr.error(res.message || 'Registration failed. Please try again.');
            }
        } catch (err) {
            registerLoader.classList.add('d-none');
            console.error('Invalid JSON response:', text);
            toastr.error('Something went wrong. Please try again or contact support.');
        }
    })
    .catch(error => {
        registerLoader.classList.add('d-none');
        console.error('Request failed:', error);
        toastr.error('Network error occurred. Please try again.');
    });
});
});
</script> --}}


<script>
    document.querySelectorAll('.myinput').forEach(function (eyeIcon) {
        eyeIcon.addEventListener('click', function () {
            const parent = eyeIcon.closest('.wsus__login_input');
            const passwordInput = parent.querySelector('input[type="password"], input[type="text"]');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    });
</script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
    // OTP Elements
    const sendOtpBtn = document.getElementById('send_otp_btn');
    const verifyOtpBtn = document.getElementById('verify_otp_btn');
    const resendOtpBtn = document.getElementById('resend_otp_btn');
    const emailInput = document.getElementById('verify_email');
    const otpInputBox = document.getElementById('otp_input_box');
    const otpField = document.getElementById('email_otp');
    const otpLoader = document.getElementById('otp_loader');
    const countdownDisplay = document.getElementById('countdown');
    
    // Registration Elements
    const registerForm = document.getElementById('registerForm');
    const registerBtn = document.getElementById('register_btn');
    const registerLoader = document.getElementById('register_loader');
    const finalEmail = document.getElementById('final_email');
    
    // Countdown variables
    let countdownInterval;
    let timeLeft = 60;

    // Function to start countdown
    function startCountdown() {
        resendOtpBtn.disabled = true;
        timeLeft = 60;
        countdownDisplay.textContent = timeLeft;
        
        countdownInterval = setInterval(() => {
            timeLeft--;
            countdownDisplay.textContent = timeLeft;
            
            if (timeLeft <= 0) {
                clearInterval(countdownInterval);
                resendOtpBtn.disabled = false;
                countdownDisplay.textContent = '60';
            }
        }, 1000);
    }

    // Send OTP
    sendOtpBtn.addEventListener('click', function() {
        const email = emailInput.value;
        
        if (!email) {
            toastr.error("Please enter an email.");
            return;
        }

        otpLoader.classList.remove('d-none');
        otpLoader.textContent = "Sending OTP...";

        fetch("{{ route('send.email.otp') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => {
            if (response.status === 422) return response.json().then(data => { throw data; });
            return response.json();
        })
        .then(res => {
            otpLoader.classList.add('d-none');
            
            if (res.status === 'success') {
                toastr.success("OTP sent successfully!");
                otpInputBox.classList.remove('d-none');
                sendOtpBtn.style.display = 'none';
                verifyOtpBtn.style.display = 'block';
                resendOtpBtn.style.display = 'block';
                startCountdown();
            } else {
                toastr.error(res.message || 'Failed to send OTP');
            }
        })
        .catch(error => {
            otpLoader.classList.add('d-none');
            if (error.errors?.email) {
                toastr.error(error.errors.email[0]);
            } else {
                toastr.error('Failed to send OTP. Please try again.');
            }
        });
    });

    // Verify OTP
    verifyOtpBtn.addEventListener('click', function() {
        const email = emailInput.value;
        const otp = otpField.value;
        
        if (!otp) {
            toastr.error("Please enter the OTP.");
            return;
        }

        otpLoader.classList.remove('d-none');
        otpLoader.textContent = "Verifying OTP...";

        fetch("{{ route('verify.email.otp') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email: email, otp: otp })
        })
        .then(response => response.json())
        .then(res => {
            otpLoader.classList.add('d-none');
            
            if (res.status === 'verified') {
                toastr.success("Email verified successfully!");
                document.getElementById('otpForm').style.display = 'none';
                registerForm.classList.remove('d-none');
                finalEmail.value = email;
                
                if (countdownInterval) clearInterval(countdownInterval);
            } else {
                toastr.error(res.message || 'Invalid OTP');
            }
        })
        .catch(error => {
            otpLoader.classList.add('d-none');
            toastr.error('Failed to verify OTP. Please try again.');
        });
    });

    // Resend OTP
    resendOtpBtn.addEventListener('click', function() {
        if (resendOtpBtn.disabled) return;
        
        const email = emailInput.value;
        otpLoader.classList.remove('d-none');
        otpLoader.textContent = "Resending OTP...";

        fetch("{{ route('send.email.otp') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => {
            if (response.status === 422) return response.json().then(data => { throw data; });
            return response.json();
        })
        .then(res => {
            otpLoader.classList.add('d-none');
            
            if (res.status === 'success') {
                toastr.success("New OTP sent successfully!");
                startCountdown();
            } else {
                toastr.error(res.message || 'Failed to resend OTP');
            }
        })
        .catch(error => {
            otpLoader.classList.add('d-none');
            if (error.errors?.email) {
                toastr.error(error.errors.email[0]);
            } else {
                toastr.error('Failed to resend OTP. Please try again.');
            }
        });
    });

    // Password show/hide toggle
    document.querySelectorAll('.myinput').forEach(function (eyeIcon) {
        eyeIcon.addEventListener('click', function () {
            const parent = eyeIcon.closest('.wsus__login_input');
            const passwordInput = parent.querySelector('input[type="password"], input[type="text"]');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    });

    // Register form submission
    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        registerLoader.classList.remove('d-none');
        registerBtn.disabled = true;

        const formData = new FormData(registerForm);
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });

        fetch('{{ route("register.ajax") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(async response => {
            const text = await response.text();
            try {
                const res = JSON.parse(text);
                registerLoader.classList.add('d-none');
                registerBtn.disabled = false;

                if (res.status === 'success') {
                    toastr.success("Registration successful!");
                    window.location.href = '/products' || '/products';
                } else if (res.errors) {
                    for (const [field, messages] of Object.entries(res.errors)) {
                        messages.forEach(msg => toastr.error(msg));
                    }
                } else {
                    toastr.error(res.message || 'Registration failed. Please try again.');
                }
            } catch (err) {
                registerLoader.classList.add('d-none');
                registerBtn.disabled = false;
                console.error('Invalid JSON response:', text);
                toastr.error('Something went wrong. Please try again or contact support.');
            }
        })
        .catch(error => {
            registerLoader.classList.add('d-none');
            registerBtn.disabled = false;
            console.error('Request failed:', error);
            toastr.error('Network error occurred. Please try again.');
        });
    });

    // Check for referral code in URL
    const urlParams = new URLSearchParams(window.location.search);
    const ref = urlParams.get("ref");

    if (ref) {
        // Switch to signup tab
        document.getElementById('pills-profile-tab2').click();
        
        // Show referral info
        document.getElementById('ref_info_box').classList.remove('d-none');
        document.getElementById('ref_code').textContent = ref;
    }
});
    </script>

@endsection
