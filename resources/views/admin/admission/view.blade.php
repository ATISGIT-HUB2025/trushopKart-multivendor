@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Admission Details</h1>
    </div>
    
    
    <div class="section-body">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4>Admission #{{ $admission->id }}</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5 class="text-muted">Personal Information</h5>
                        <p><strong>Full Name:</strong> {{ $admission->full_name }}</p>
                        <p><strong>Email:</strong> {{ $admission->email }}</p>
                        <p><strong>Parent Mobile:</strong> {{ $admission->parent_mobile }}</p>
                        <p><strong>Teacher Mobile:</strong> {{ $admission->teacher_mobile }}</p>
                        <p><strong>Date of Birth:</strong> {{ $admission->date_of_birth->format('d/m/Y') }}</p>
                        <p><strong>Gender:</strong> {{ ucfirst($admission->gender) }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-muted">Location Details</h5>
                        <p><strong>State:</strong> {{ $admission->state }}</p>
                        <p><strong>District:</strong> {{ $admission->district }}</p>
                        <p><strong>Taluka:</strong> {{ $admission->taluka }}</p>
                        <p><strong>Cluster:</strong> {{ $admission->cluster }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5 class="text-muted">Academic Information</h5>
                        <p><strong>School Name:</strong> {{ $admission->school_name }}</p>
                        <p><strong>Medium:</strong> {{ $admission->medium }}</p>
                        <p><strong>Standard:</strong> {{ $admission->standard }}</p>
                        <p><strong>Selected Exam:</strong> {{ $admission->selected_exam }}</p>
                        <p><strong>Exam Type:</strong> {{ $admission->exam_type }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-muted">Payment Information</h5>
                        <p><strong>Admission Fee:</strong> ₹{{ $admission->admission_fee }}</p>
                        <p><strong>Additional Fee:</strong> ₹{{ $admission->additional_fee }}</p>
                        <p><strong>Total Fee:</strong> ₹{{ $admission->total_fee }}</p>
                        <p><strong>Payment Status:</strong> {{ ucfirst($admission->payment_status) }}</p>
                        <p><strong>Transaction ID:</strong> {{ $admission->transaction_id }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-{{ $admission->status == 'approved' ? 'success' : ($admission->status == 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($admission->status) }}</span></p>
                    </div>
                </div>
                @if($admission->photo)
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5 class="text-muted">Student Photo</h5>
                        <img src="{{ asset($admission->photo) }}" alt="Student Photo" class="img-thumbnail" style="max-width: 200px">
                    </div>
                </div>
                @endif
                <div class="text-end">
                    <a href="{{ route('admin.admission.pending') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
