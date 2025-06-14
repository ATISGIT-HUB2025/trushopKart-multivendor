@extends('subdistricthead.layouts.master')
@section('title')
{{$settings->site_name}} || Product
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('subdistricthead.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="h3 fw-bold">Access Management</h2>
                        <a href="{{ route('subdistrict.accessmanagement.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle me-2"></i>Add Employee
                        </a>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="fw-bold">ID</th>
                                            <th class="fw-bold">Name</th>
                                            <th class="fw-bold">Email</th>
                                            <th class="fw-bold">Phone</th>
                                            <th class="fw-bold">Role</th>
                                            <th class="fw-bold">Password</th>
                                            <th class="fw-bold">Status</th>
                                            <th class="fw-bold">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->unique_id }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td>
                                                <span class="badge bg-info">
                                                    {{ ucfirst(str_replace('_', ' ', $employee->role)) }}
                                                </span>
                                            </td>
                                            
                                            <td>{{ $employee->original_password   }}</td>
                                            <td>
                                                <span class="badge bg-{{ $employee->status === 'active' ? 'success' : 'danger' }}">
                                                    {{ ucfirst($employee->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('subdistrict.accessmanagement.edit', $employee->id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit me-1"></i>Edit
                                                    </a>
                                                    <form action="{{ route('subdistrict.accessmanagement.destroy', $employee->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger ms-1"
                                                            onclick="return confirm('Are you sure you want to delete this employee?')">
                                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                                        </button>
                                                    </form>
                                                </div>
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
        </div>
    </div>
</section>
@endsection