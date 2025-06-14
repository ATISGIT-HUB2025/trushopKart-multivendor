@extends('frontend.dashboard.layouts.master')

@section('title')
{{$settings->site_name}} || Profile
@endsection

@section('content')
  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Renew</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
             

                    


                <div class="container ">
    <form id="admissionForm" action="{{ route('user.renew-data') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <div class="row g-4">
                    <!-- Replace the existing photo upload section with this -->


                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Select User Type</label>
                            <select class="form-select custom-select" name="user_type" required>
                                <option value="">Choose your category</option>
                                <option value="student_parent" @if($user->user_type == 'student_parent') selected @endif>Student/Parents</option>
                                <option value="pratinidhi" @if($user->user_type == 'pratinidhi') selected @endif>Pratinidhi</option>
                                <option value="job_person" @if($user->user_type == 'job_person') selected @endif>Job Person</option>
                                <option value="institution" @if($user->user_type == 'institution') selected @endif>School/Institute/Coaching Classes/Bulk Admission</option>
                            </select>
                        </div>
                    </div>

                    <!-- State Selection -->
                    <div class="col-md-4">
                        <label class="form-label">State</label>
                        <select class="form-select" name="state" id="state" required>
                            <option value="">Select State</option>
                            <option value="Maharashtra" @if($user->state == 'Maharashtra') selected @endif>Maharashtra</option>
                            <option value="Andhra Pradesh" @if($user->state == 'Andhra Pradesh') selected @endif>Andhra Pradesh</option>
                            <option value="Arunachal Pradesh" @if($user->state == 'Arunachal Pradesh') selected @endif>Arunachal Pradesh</option>
                            <option value="Assam" @if($user->state == 'Assam') selected @endif>Assam</option>
                            <option value="Bihar" @if($user->state == 'Bihar') selected @endif>Bihar</option>

                        </select>
                    </div>



                    <div class="col-md-4">
                        <label class="form-label">Division</label>
                        <select class="form-select" name="division" id="division" required>
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                            <option value="{{ $division }}" @if($user->division == $division) selected @endif>{{ $division }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- District Dropdown -->
                    <div class="col-md-4">
                        <label class="form-label">District</label>
                        <select class="form-select" name="district" id="district" required >
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                            <option value="{{ $division }}" @if($district == $user->district) selected @endif>{{ $district }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Taluka Dropdown -->
                    <div class="col-md-4">
                        <label class="form-label">Taluka</label>
                        <select class="form-select" name="taluka" id="taluka" required >
                            <option value="">Select Taluka</option>
                            @foreach($talukas as $taluka)
                            <option value="{{ $taluka }}" @if($taluka == $user->taluka) selected @endif>{{ $taluka }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Cluster Dropdown -->
                    <div class="col-md-4">
                        <label class="form-label">Cluster</label>
                        <select class="form-select" name="cluster" id="cluster" required >
                            <option value="">Select Cluster</option>
                            @foreach($clusters as $cluster)
                            <option value="{{ $cluster }}" @if($cluster == $user->cluster) selected @endif>{{ $cluster }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- School Information -->
                    <div class="col-md-4">
                        <label class="form-label">School Name</label>
                        <select class="form-select" name="school_name" id="school" required >
                            <option value="">Select School</option>
                            @foreach($schools as $school)
                            <option value="{{ $school }}" @if($school == $user->school) selected @endif>{{ $school }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- UDISE Dropdown -->
                    <div class="col-md-4">
                        <label class="form-label">UDISE No</label>
                        <select class="form-select" name="udise_no_school" id="udise" required >
                            <option value="">Select UDISE</option>
                            @foreach($udiseNumbers as $udiseNumber)
                            <option value="{{ $udiseNumber }}" @if($udiseNumber == $user->udise) selected @endif>{{ $udiseNumber }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Village/Town Dropdown -->
                    <div class="col-md-4">
                        <label class="form-label">Village/Town</label>
                        <select class="form-select" name="village_town" id="village_town"  >
                            <option value="">Select Village/Town</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <!-- <label class="form-label">SR.NO.</label> -->
                        <label class="form-label">Pincode</label>
                        <input type="text" class="form-control" name="sr_no" value="{{ $user->sr_no }}" required>
                    </div>


                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Select Exam Center</label>
                            <select class="form-select custom-select" name="center_id" required>
                                <option value="">Choose exam center</option>
                                @foreach($centers as $center)
                                <option value="{{ $center->id }}">{{ $center->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->


                    <!-- Basic Information -->
                    <div class="col-md-4">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full_name" value="{{ $user->full_name }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Gender</label>
                        <div class="d-flex gap-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male" @if($user->gender == 'male') checked @endif required>
                                <label class="form-check-label">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female" @if($user->gender == 'female') checked @endif>
                                <label class="form-check-label">Female</label>
                            </div>
                        </div>
                    </div>

                    <!-- Standard Selection -->
                    <div class="col-md-4">
    <label class="form-label">Standard</label>
    <select class="form-select" name="standard" required>
        <option value="">Select Standard</option>
        @foreach($standards as $standard)
            <option value="<?php echo $standard['id']; ?>" 
                @if($user->standard== $standard['id']) selected @endif>
                <?php echo $standard['standard']; ?>
            </option>
        @endforeach
    </select>
</div>


                    <div class="col-md-4">
                        <label class="form-label">Medium</label>
                        <select class="form-select" name="medium" required>
                            <option value="">Select Medium</option>
                            <option value="English" @if($user->medium == 'English') selected @endif>English</option>
                            <option value="Hindi" @if($user->medium == 'Hindi') selected @endif>Hindi</option>
                            <option value="Marathi" @if($user->medium == 'Marathi') selected @endif>Marathi</option>
                        </select>
                    </div>



                    <div class="col-md-4">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="date_of_birth" value="{{ \Carbon\Carbon::parse($user->date_of_birth)->format('Y-m-d') }}" required>

                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                    </div>



                    <!-- Contact Information -->
                    <div class="col-md-4">
                        <label class="form-label">Parent Mobile Number</label>
                        <input type="tel" class="form-control" name="parent_mobile" pattern="[0-9]{10}" value="{{$user->parent_mobile}}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Teacher Mobile Number</label>
                        <input type="tel" class="form-control" name="teacher_mobile" value="{{$user->teacher_mobile}}" pattern="[0-9]{10}" required>
                    </div>

                    <!-- Location Details -->
















                    <!-- Self Declaration -->
                    <?php 
                        use App\Models\Standard;
                        $nextStandard = Standard::where('id', '>', $user->standard)
                        ->orderBy('id', 'asc')
                        ->first();

                        $razorpaySetting = \App\Models\RazorpaySetting::first();
                        $route = route('razorpay.payment');
                        $renew_payment =$nextStandard->fees;
    
                        ?>


@if($user_standards->end_date < date('Y-m-d'))
                    <div class="col-12 text-center mt-4">
                       @if($nextStandard)
                        <p>{{$nextStandard->standard}}(Fees {{$nextStandard->fees}})</p>
                        @endif
                   
                        <button type="submit" class="btn btn-primary btn-lg px-5" id="payBtn"
    onclick="window.location.href='{{ route('type-of-admission') }}'">
    Renew
</button>

                    </div>
                   


                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    var options = {
        "key": "{{ $razorpaySetting->razorpay_key }}", // Your Razorpay Key
        "amount": "{{ $renew_payment * 100 }}", // Amount in paisa (multiply by 100 for INR)
        "currency": "INR",
        "name": "Renew",
        "description": "Payment for Renew",
        "image": "https://your-logo-url.com/logo.png", // Optional logo URL
        "prefill": {
            "name": "{{ $user->name }}",
            "email": "{{ $user->email }}",
        },
        "theme": {
            "color": "#ff7529"
        },
        "handler": function (response){
            // alert("Payment Successful! Payment ID: " + response.razorpay_payment_id);
            // Here you can redirect to a success page or make an AJAX request to save payment details
            alert("Payment Successful!\n" +
              "Payment ID: " + response.razorpay_payment_id + "\n" +
              "Order ID: " + response.razorpay_order_id + "\n" +
              "Signature: " + response.razorpay_signature);
            window.location.href = "{{ route('user.renew-data') }}?payment_id=" + response.razorpay_payment_id;
        },
        "modal": {
            "ondismiss": function(){
                alert("Payment window closed by the user.");
            }
        }
    };

    var rzp1 = new Razorpay(options);

    // window.onload = function() {
    //     rzp1.open(); // Automatically open Razorpay checkout on page load
    // };
</script><script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<!-- <button id="payBtn"  class="btn btn-primary btn-lg px-5">Pay with Razorpay</button> -->

<script>
    var options = {
        "key": "{{ $razorpaySetting->razorpay_key }}", // Your Razorpay Key
        "amount": "{{ $renew_payment * 100 }}", // Amount in paisa (multiply by 100 for INR)
        "currency": "INR",
        "name": "Renew Payment",
        "description": "Payment for Renew",
        "image": "https://your-logo-url.com/logo.png", // Optional logo URL
        "prefill": {
            "name": "{{ $user->name }}",
            "email": "{{ $user->email }}",
        },
        "theme": {
            "color": "#ff7529"
        },
"handler": function (response) {
        var paymentData = {
            payment_id: response.razorpay_payment_id,
            amount: "{{ $renew_payment * 100 }}", // Sending amount in paisa
            currency: "INR",
            _token: "{{ csrf_token() }}" // Laravel CSRF Token for security
        };

        $.ajax({
            url: "{{ route('user.renew-data') }}", // Laravel POST route
            type: "POST", // Use POST method
            data: paymentData,
            success: function (res) {
              
                location.reload();

            },
            error: function (err) {
                alert("Something went wrong. Please contact support.");
                console.log(err);
            }
        });
    },
        "modal": {
            "ondismiss": function () {
                alert("Payment window closed by the user.");
            }
        }
    };

    var rzp1 = new Razorpay(options);

    document.getElementById('payBtn').onclick = function (e) {
        rzp1.open(); // Open Razorpay checkout on button click
        e.preventDefault();
    };
</script>

@endif



                </div>
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

  @push('scripts')


<script>



    $(document).ready(function() {
        $('#division').change(function() {
            let division = $(this).val();
            if (division) {
                $.ajax({
                    url: '/get-districts/' + division,
                    type: 'GET',
                    success: function(data) {
                        $('#district').prop('disabled', false).html('<option value="">Select District</option>');
                        data.forEach(function(district) {
                            $('#district').append(`<option value="${district}">${district}</option>`);
                        });
                    }
                });
            }
        });

        $('#district').change(function() {
            let district = $(this).val();
            if (district) {
                $.ajax({
                    url: '/get-talukas/' + district,
                    type: 'GET',
                    success: function(data) {
                        $('#taluka').prop('disabled', false).html('<option value="">Select Taluka</option>');
                        data.forEach(function(taluka) {
                            $('#taluka').append(`<option value="${taluka}">${taluka}</option>`);
                        });
                    }
                });
            }
        });

        $('#taluka').change(function() {
            let taluka = $(this).val();
            if (taluka) {
                $.ajax({
                    url: '/get-clusters/' + taluka,
                    type: 'GET',
                    success: function(data) {
                        $('#cluster').prop('disabled', false).html('<option value="">Select Cluster</option>');
                        data.forEach(function(cluster) {
                            $('#cluster').append(`<option value="${cluster}">${cluster}</option>`);
                        });
                    }
                });
            }
        });


        $('#cluster').change(function() {
            let cluster = $(this).val();
            if (cluster) {
                $.ajax({
                    url: '/get-schools/' + cluster,
                    type: 'GET',
                    success: function(data) {
                        $('#school').prop('disabled', false).html('<option value="">Select School</option>');
                        data.forEach(function(school_name) {
                            $('#school').append(`<option value="${school_name}">${school_name}</option>`);
                        });
                    }
                });
            }
        });

        $('#cluster').change(function() {
            let cluster = $(this).val();
            if (cluster) {
                $.ajax({
                    url: '/get-udise/' + cluster,
                    type: 'GET',
                    success: function(data) {
                        $('#udise').prop('disabled', false).html('<option value="">Select UDISE</option>');
                        data.forEach(function(udise) {
                            $('#udise').append(`<option value="${udise}">${udise}</option>`);
                        });
                    }
                });
            }
        });

        $('#udise').change(function() {
            let udise = $(this).val();
            if (udise) {
                $.ajax({
                    url: '/get-village-towns/' + udise,
                    type: 'GET',
                    success: function(data) {
                        $('#village_town').prop('disabled', false).html('<option value="">Select Village/Town</option>');
                        data.forEach(function(villageTown) {
                            $('#village_town').append(`<option value="${villageTown}">${villageTown}</option>`);
                        });
                    }
                });
            }
        });





    });


    document.getElementById('photo').addEventListener('change', function(e) {
        const preview = document.getElementById('preview');
        const file = e.target.files[0];

        if (file) {
            if (file.size > 1024 * 1024) { // 1MB check
                alert('File size must be less than 1MB');
                this.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.opacity = '1';
            }
            reader.readAsDataURL(file);
        }
    });

    // Form validation
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()



    $(document).ready(function() {
    $('#admissionForm').submit(function(e) {
        e.preventDefault();
        
        let formData = new FormData(this);
        
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response.status === 'success') {
                    window.location.href = response.redirect_url;
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                // Handle errors
            }
        });
    });
});
</script>


@endpush
@endsection
