@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pending Admissions</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Filter Admissions</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.admission.pending') }}" method="GET" class="row">
                    <div class="col-md-2">
                        <select name="state" class="form-control">
                            <option value="">Select State</option>
                            @foreach($states as $state)
                                <option value="{{ $state }}" {{ request('state') == $state ? 'selected' : '' }}>
                                    {{ $state }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="district" class="form-control">
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                                <option value="{{ $district }}" {{ request('district') == $district ? 'selected' : '' }}>
                                    {{ $district }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="taluka" class="form-control">
                            <option value="">Select Taluka</option>
                            @foreach($talukas as $taluka)
                                <option value="{{ $taluka }}" {{ request('taluka') == $taluka ? 'selected' : '' }}>
                                    {{ $taluka }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="cluster" class="form-control">
                            <option value="">Select Cluster</option>
                            @foreach($clusters as $cluster)
                                <option value="{{ $cluster }}" {{ request('cluster') == $cluster ? 'selected' : '' }}>
                                    {{ $cluster }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="school_name" class="form-control">
                            <option value="">Select School</option>
                            @foreach($schools as $school)
                                <option value="{{ $school }}" {{ request('school_name') == $school ? 'selected' : '' }}>
                                    {{ $school }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('admin.admission.pending') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </form>
            </div>
        </div>


        <div class="card mt-4">
            <div class="card-header">
                <h4>All Pending Admissions</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Parent Mobile</th>
                            <th>School Name</th>
                            <th>Standard</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admissions as $admission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $admission->full_name }}</td>
                            <td>{{ $admission->email }}</td>
                            <td>{{ $admission->parent_mobile }}</td>
                            <td>{{ $admission->school_name }}</td>
                            <td>{{ $admission->standard }}</td>
                            <td>
                                <a href="{{ route('admin.admission.show', $admission->id) }}" class="btn btn-info">View</a>
                                <form action="{{ route('admin.admission.change-status', $admission->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form action="{{ route('admin.admission.change-status', $admission->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
