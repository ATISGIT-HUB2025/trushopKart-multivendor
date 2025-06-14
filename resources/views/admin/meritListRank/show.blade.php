@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Result Details</h1>
    </div>

    <div class="section-body">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4>Result #{{ $primaryresult->id }}</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5 class="text-muted">Student Information</h5>
                        <p><strong>Name:</strong> {{ $primaryresult->name ?? 'Not Available' }}</p>
                        <p><strong>Gender:</strong> {{ $primaryresult->gender ?? 'Not Available' }}</p>
                        <p><strong>Birth Date:</strong> {{ $primaryresult->birth_date ? $primaryresult->birth_date->format('d/m/Y') : 'Not Available' }}</p>
                        <p><strong>Standard:</strong> {{ $primaryresult->std ?? 'Not Available' }}</p>
                        <p><strong>Medium:</strong> {{ $primaryresult->medium ?? 'Not Available' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-muted">School Details</h5>
                        <p><strong>School Name:</strong> {{ $primaryresult->school_name ?? 'Not Available' }}</p>
                        <p><strong>UDISE No:</strong> {{ $primaryresult->udise_no ?? 'Not Available' }}</p>
                        <p><strong>Student Saral ID:</strong> {{ $primaryresult->student_saral_id ?? 'Not Available' }}</p>
                        <p><strong>Parent Mobile:</strong> {{ $primaryresult->parent_mobile ?? 'Not Available' }}</p>
                        <p><strong>Teacher Mobile:</strong> {{ $primaryresult->teacher_mobile ?? 'Not Available' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5 class="text-muted">Exam Information</h5>
                        <p><strong>Exam Centre:</strong> {{ $primaryresult->exam_centre }}</p>
                        <p><strong>Seat No:</strong> {{ $primaryresult->seat_no }}</p>
                        <p><strong>Barcode:</strong> {{ $primaryresult->barcode }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-muted">Result Details</h5>
                        <p><strong>First Paper:</strong> {{ $primaryresult->first_paper }}</p>
                        <p><strong>Second Paper:</strong> {{ $primaryresult->second_paper }}</p>
                        <p><strong>Total Marks:</strong> {{ $primaryresult->total_marks }}</p>
                        <p><strong>Percentage:</strong> {{ $primaryresult->percentage }}%</p>
                    </div>
                </div>
                <div class="text-end">
                    <a href="{{ route('admin.admin-result.index') }}" class="btn btn-secondary">Back to List</a>
                    <a href="{{ route('admin.admin-result.edit', $primaryresult->id) }}" class="btn btn-primary">Edit Result</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection