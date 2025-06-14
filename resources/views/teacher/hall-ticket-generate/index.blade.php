@extends('teacher.layouts.master')
@section('title')
Bulk Hall Ticket Generate
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('teacher.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    
                <h3><i class="fas fa-file-alt"></i> Bulk Hall Tciket Generate</h3>

                    <div class="container">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                          <h2></h2>
                                <div>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
                                        Upload Excel
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="admissionTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Student Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Sample data -->
                                        <tr>
                                            <td>1</td>
                                            <td>John Doe</td>
                                            <td>john@example.com</td>
                                            <td>1234567890</td>
                                            <td>
                                                <button class="btn btn-sm btn-info">Edit</button>
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection