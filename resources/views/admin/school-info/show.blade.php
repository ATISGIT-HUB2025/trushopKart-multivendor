@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>School Details</h1>
    </div>
    
    <div class="section-body">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4>School #{{ $primaryresult->id }}</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5 class="text-muted">Basic Information</h5>
                        <p><strong>Sr. No:</strong> {{ $primaryresult->sr_no }}</p>
                        <p><strong>Division:</strong> {{ $primaryresult->division }}</p>
                        <p><strong>District:</strong> {{ $primaryresult->district }}</p>
                        <p><strong>Taluka:</strong> {{ $primaryresult->taluka }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-muted">School Details</h5>
                        <p><strong>Cluster:</strong> {{ $primaryresult->cluster }}</p>
                        <p><strong>UDISE:</strong> {{ $primaryresult->udise }}</p>
                        <p><strong>School Name:</strong> {{ $primaryresult->school_name }}</p>
                        <p><strong>Village/Town:</strong> {{ $primaryresult->village_town }}</p>
                    </div>
                </div>
                <div class="text-end">
                    <a href="{{ route('admin.school-info.index') }}" class="btn btn-secondary">Back to List</a>
                    <a href="{{ route('admin.school-info.edit', $primaryresult->id) }}" class="btn btn-primary">Edit School</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
