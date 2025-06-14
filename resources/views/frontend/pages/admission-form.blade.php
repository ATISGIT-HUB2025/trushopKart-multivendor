@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Admission form
@endsection

@section('content')
<section id="wsus__breadcrumb">
    <div class="wsus_breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Student Registration Form</h4>
                    <ul>
                        <li><a href="{{route('home')}}">home</a></li>
                        <li><a href="javascript:;">registration form</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <form id="admissionForm" action="{{ route('admission.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <div class="row g-4">
                    <!-- Replace the existing photo upload section with this -->
                    <div class="col-12 text-center mb-4">
                        <div class="upload-container">
                            <div class="upload-wrapper">
                                <div class="image-preview">
                                    <img id="preview" src="{{ asset('images/placeholder.png') }}" class="preview-img">
                                    <div class="overlay">
                                        <label for="photo" class="upload-label">
                                            <i class="fas fa-camera fa-lg"></i>
                                            <span>Upload Photo</span>
                                            <input type="file" id="photo" name="photo" class="d-none" accept="image/*"
                                                required>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <small class="text-muted mt-2 d-block">Upload passport size photo (Max 1MB)</small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Select User Type</label>
                            <select class="form-select custom-select" name="user_type" required>
                                <option value="">Choose your category</option>
                                <option value="student_parent">Student/Parents</option>
                                <option value="pratinidhi">Pratinidhi</option>
                                <option value="job_person">Job Person</option>
                                <option value="institution">School/Institute/Coaching Classes/Bulk Admission</option>
                            </select>
                        </div>
                    </div>

                    <!-- State Selection -->
                    <div class="col-md-4">
                        <label class="form-label">State</label>
                        <select class="form-select" name="state" id="state" required>
                            <option value="">Select State</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>

                        </select>
                    </div>



                    <div class="col-md-4">
                        <label class="form-label">Division</label>
                        <select class="form-select" name="division" id="division" required>
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                            <option value="{{ $division }}">{{ $division }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- District Dropdown -->
                    <div class="col-md-4">
                        <label class="form-label">District</label>
                        <select class="form-select" name="district" id="district" required disabled>
                            <option value="">Select District</option>
                        </select>
                    </div>

                    <!-- Taluka Dropdown -->
                    <div class="col-md-4">
                        <label class="form-label">Taluka</label>
                        <select class="form-select" name="taluka" id="taluka" required disabled>
                            <option value="">Select Taluka</option>
                        </select>
                    </div>

                    <!-- Cluster Dropdown -->
                    <div class="col-md-4">
                        <label class="form-label">Cluster</label>
                        <select class="form-select" name="cluster" id="cluster" required disabled>
                            <option value="">Select Cluster</option>
                        </select>
                    </div>


                    <!-- School Information -->
                    <div class="col-md-4">
                        <label class="form-label">School Name</label>
                        <select class="form-select" name="school_name" id="school" required disabled>
                            <option value="">Select School</option>
                        </select>
                    </div>


                    <!-- UDISE Dropdown -->
                    <div class="col-md-4">
                        <label class="form-label">UDISE No</label>
                        <select class="form-select" name="udise_no_school" id="udise" required disabled>
                            <option value="">Select UDISE</option>
                        </select>
                    </div>

                    <!-- Village/Town Dropdown -->
                    <div class="col-md-4">
                        <label class="form-label">Village/Town</label>
                        <select class="form-select" name="village_town" id="village_town" required disabled>
                            <option value="">Select Village/Town</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <!-- <label class="form-label">SR.NO.</label> -->
                        <label class="form-label">Pincode</label>
                        <input type="text" class="form-control" name="sr_no" required>
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
                        <input type="text" class="form-control" name="full_name" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Gender</label>
                        <div class="d-flex gap-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male" required>
                                <label class="form-check-label">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female">
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
                            <option value="<?php echo $standard['id']; ?>"><?php echo $standard['standard']; ?></option>
                            @endforeach
                           
                            <!-- <option value="2">2nd Standard</option>
                            <option value="3">3rd Standard</option>
                            <option value="4">4th Standard</option>
                            <option value="5">5th Standard</option>
                            <option value="6">6th Standard</option>
                            <option value="7">7th Standard</option>
                            <option value="8">8th Standard</option>
                            <option value="9">9th Standard</option>
                            <option value="10">10th Standard</option>
                            <option value="11">11th Standard</option>
                            <option value="12">12th Standard</option> -->
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Medium</label>
                        <select class="form-select" name="medium" required>
                            <option value="">Select Medium</option>
                            <option value="English">English</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Marathi">Marathi</option>
                        </select>
                    </div>



                    <div class="col-md-4">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="date_of_birth" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>



                    <!-- Contact Information -->
                    <div class="col-md-4">
                        <label class="form-label">Parent Mobile Number</label>
                        <input type="tel" class="form-control" name="parent_mobile" pattern="[0-9]{10}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Teacher Mobile Number</label>
                        <input type="tel" class="form-control" name="teacher_mobile" pattern="[0-9]{10}" required>
                    </div>

                    <!-- Location Details -->












<!-- 
                    <div class="col-md-4">
                        <label class="form-label">Paper 1</label>
                        <input type="text" class="form-control" name="paper_1">
                    </div> -->

                    <!-- <div class="col-md-4">
                        <label class="form-label">Paper 2</label>
                        <input type="text" class="form-control" name="paper_2">
                    </div> -->







                    <!-- Self Declaration -->
                    <div class="col-12 mt-4">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Parent's Self Declaration</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="declaration" required>
                                    <label class="form-check-label" for="declaration">
                                        I hereby declare that all the information provided above is true and correct to
                                        the best of my knowledge. I understand that any false information may result in
                                        the rejection of this application.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-4">
                   
                        <button type="submit" class="btn btn-primary btn-lg px-5"
    onclick="window.location.href='{{ route('type-of-admission') }}'">
    Submit Registration
</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .custom-select {
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ced4da;
        background-color: #fff;
        transition: all 0.3s ease;
    }

    .custom-select:hover {
        border-color: #86b7fe;
    }

    .custom-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
    }



    .form-control,
    .form-select {
        padding: 0.75rem 1rem;
        border-radius: 8px;
    }

    .form-control:focus,
    .form-select:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .btn-primary {
        padding: 12px 30px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
    }



    .upload-container {
        padding: 20px;
    }

    .upload-wrapper {
        position: relative;
        width: 200px;
        height: 200px;
        margin: 0 auto;
    }

    .image-preview {
        width: 100%;
        height: 100%;
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        background: #f8f9fa;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .preview-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .image-preview:hover .overlay {
        opacity: 1;
    }

    .upload-label {
        color: white;
        cursor: pointer;
        text-align: center;
        padding: 20px;
    }

    .upload-label i {
        display: block;
        margin-bottom: 8px;
    }

    .upload-label span {
        font-size: 14px;
    }

    .form-select {
        background-color: #fff;
        border: 1px solid #ced4da;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .form-select:hover {
        border-color: #86b7fe;
    }
</style>

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