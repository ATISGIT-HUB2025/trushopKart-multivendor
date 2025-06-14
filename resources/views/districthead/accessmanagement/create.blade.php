@extends('districthead.layouts.master')
@section('title')
{{$settings->site_name}} || Product
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('districthead.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user-plus fs-4 text-primary me-2"></i>
                                <h3 class="h5 mb-0">Add New Employee</h3>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('district.accessmanagement.store') }}" method="POST">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">Full Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                                <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">Phone Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-phone"></i>
                                                </span>
                                                <input type="number" name="phone" class="form-control" placeholder="Enter phone number" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">Role</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-user-tag"></i>
                                                </span>
                                                <select name="role" class="form-select" required>
                                                    <option value="" selected disabled>Select Role</option>
                                                    <option value="subdistrict_head">Subdistrict Head</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                <i class="fas fa-envelope"></i>

                                                </span>
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">Status</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-toggle-on"></i>
                                                </span>
                                                <select name="status" class="form-select" required>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex gap-3">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save me-2"></i>Create Employee
                                    </button>
                                    <a href="{{ route('district.accessmanagement.index') }}" class="btn btn-light px-4">
                                        <i class="fas fa-arrow-left me-2"></i>Back
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
