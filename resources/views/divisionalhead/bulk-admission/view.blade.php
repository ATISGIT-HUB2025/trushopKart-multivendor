@extends('districthead.layouts.master')

@section('title')
View Student
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('districthead.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fas fa-eye"></i> Student Details</h3>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Division</th>
                                            <td>{{ $student->division }}</td>
                                        </tr>
                                        <tr>
                                            <th>SR No</th>
                                            <td>{{ $student->sr_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>District</th>
                                            <td>{{ $student->district }}</td>
                                        </tr>
                                        <tr>
                                            <th>Taluka</th>
                                            <td>{{ $student->taluka }}</td>
                                        </tr>
                                        <tr>
                                            <th>Cluster</th>
                                            <td>{{ $student->cluster }}</td>
                                        </tr>
                                        <tr>
                                            <th>Exam Center</th>
                                            <td>{{ $student->exam_center }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $student->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td>{{ ucfirst($student->gender) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Birth Date</th>
                                            <td>{{ $student->birth_date->format('d M, Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Standard</th>
                                            <td>{{ $student->std }}</td>
                                        </tr>
                                        <tr>
                                            <th>Medium</th>
                                            <td>{{ $student->medium }}</td>
                                        </tr>
                                        <tr>
                                            <th>School Name</th>
                                            <td>{{ $student->school_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>UDISE No</th>
                                            <td>{{ $student->udise_no_school }}</td>
                                        </tr>
                                        <tr>
                                            <th>Student Serial ID</th>
                                            <td>{{ $student->student_serial_id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Parent Mobile</th>
                                            <td>{{ $student->parent_mobile_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Teacher Mobile</th>
                                            <td>{{ $student->teacher_mobile_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Barcode</th>
                                            <td>{{ $student->barcode }}</td>
                                        </tr>
                                        <tr>
                                            <th>Seat No</th>
                                            <td>{{ $student->seat_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>Paper 1</th>
                                            <td>{{ $student->paper_1 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Paper 2</th>
                                            <td>{{ $student->paper_2 }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('district.bulk-admission.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
