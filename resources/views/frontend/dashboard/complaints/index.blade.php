@extends('frontend.dashboard.layouts.master')

@section('title')
    {{$settings->site_name}} || Complaints
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')

        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fas fa-comment-alt"></i> Complaints</h3>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#complaintModal">
                                    Create Complaint
                                </button>
                            </div>
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Complaint Modal -->
<div class="modal fade" id="complaintModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Complaint</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('user.complaints.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label>Message</label>
                        <textarea class="form-control" name="message" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Barcode (if any)</label>
                        <input type="text" class="form-control" name="barcode">
                    </div>
                    <div class="mb-3">
                        <label>Image (if any)</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Complaint</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
