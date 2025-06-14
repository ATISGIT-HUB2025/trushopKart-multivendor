@extends('frontend.dashboard.layouts.master')

@section('title')
{{$settings->site_name}} || Application
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')

        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="far fa-user"></i> Applications</h3>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Date of Birth</th>
                                    <th>School Name</th>
                                    <th>Standard</th>
                                    <th>Exam Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admissions as $admission)
                                <tr>
                                    <td>{{$admission->full_name}}</td>
                                    <td>{{$admission->date_of_birth->format('d/m/Y')}}</td>
                                    <td>{{$admission->school_name}}</td>
                                    <td>{{$admission->standard}}</td>
                                    <td>{{$admission->exam_type}}</td>
                                    <td>{{$admission->status}}</td>
                                    <td>
                                        <a href="{{ route('user.application.download', $admission->id) }}" 
                                           class="btn btn-primary btn-sm">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
