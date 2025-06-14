@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Employee</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Employee</h4>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('admin.accessmanagement.store') }}" method="POST">
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
                                                <select name="role" class="form-control" required>
                                                    <option value="" selected disabled>Select Role</option>
                                                    <option value="state_head">State Head</option>
                                                    
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
                                                <select name="status" class="form-control" required>
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
                                    <a href="{{ route('admin.accessmanagement.index') }}" class="btn btn-light px-4">
                                        <i class="fas fa-arrow-left me-2"></i>Back
                                    </a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#is_upcoming').change(function() {
            if ($(this).val() == '1') {
                $('.date-fields').show();
            } else {
                $('.date-fields').hide();
            }
        });
    });
</script>
@endpush