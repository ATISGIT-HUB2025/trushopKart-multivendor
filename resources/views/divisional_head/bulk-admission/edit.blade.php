@extends('divisional_head.layouts.master')

@section('title')
Edit Student
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('divisional_head.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fas fa-edit"></i> Edit Student</h3>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <form action="{{ route('divisional_head.bulk-admission.update', $student->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Division</label>
                                        <input type="text" name="division" class="form-control" value="{{ $student->division }}" required>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label>SR No</label>
                                        <input type="text" name="sr_no" class="form-control" value="{{ $student->sr_no }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>District</label>
                                        <input type="text" name="district" class="form-control" value="{{ $student->district }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Taluka</label>
                                        <input type="text" name="taluka" class="form-control" value="{{ $student->taluka }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Cluster</label>
                                        <input type="text" name="cluster" class="form-control" value="{{ $student->cluster }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Exam Center</label>
                                        <input type="text" name="exam_center" class="form-control" value="{{ $student->exam_center }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Birth Date</label>
                                        <input type="date" name="birth_date" class="form-control" value="{{ $student->birth_date->format('Y-m-d') }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Standard</label>
                                        <input type="text" name="std" class="form-control" value="{{ $student->std }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Medium</label>
                                        <input type="text" name="medium" class="form-control" value="{{ $student->medium }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>School Name</label>
                                        <input type="text" name="school_name" class="form-control" value="{{ $student->school_name }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>UDISE No</label>
                                        <input type="text" name="udise_no_school" class="form-control" value="{{ $student->udise_no_school }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Student Serial ID</label>
                                        <input type="text" name="student_serial_id" class="form-control" value="{{ $student->student_serial_id }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Parent Mobile</label>
                                        <input type="text" name="parent_mobile_number" class="form-control" value="{{ $student->parent_mobile_number }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Teacher Mobile</label>
                                        <input type="text" name="teacher_mobile_number" class="form-control" value="{{ $student->teacher_mobile_number }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Barcode</label>
                                        <input type="text" name="barcode" class="form-control" value="{{ $student->barcode }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Seat No</label>
                                        <input type="text" name="seat_no" class="form-control" value="{{ $student->seat_no }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Paper 1</label>
                                        <input type="text" name="paper_1" class="form-control" value="{{ $student->paper_1 }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Paper 2</label>
                                        <input type="text" name="paper_2" class="form-control" value="{{ $student->paper_2 }}">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Student</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
