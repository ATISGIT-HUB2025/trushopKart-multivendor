@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Results Management</h1>
    </div>
    <div class="card-body">
        <div class="card">


            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>All Results</h4>
                <div class="d-flex gap-3 align-items-center">

                    <div class="input-group" style="width: 300px;">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-filter"></i>
                        </span>
                        <select id="centerFilter" style="width:200px" class="form-select border-primary shadow-sm">
                            <option value="">Select Exam Center</option>
                            @foreach($centers as $center)
                            <option value="{{ $center->exam_centre }}" {{ request('center') == $center->exam_centre ? 'selected' : '' }}>
                                {{ $center->exam_centre }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <button id="downloadCenterCertificates" class="btn btn-success" style="display: none;">
                        <i class="fas fa-download"></i> Download All Certificates
                    </button>

                    <!-- New toggle buttons for certificate and marksheet -->
                    <div class="ml-3 d-flex ">
                        <div class="custom-control custom-switch mr-3">
                            <input type="checkbox" class="custom-control-input" id="certificateToggle"
                                {{ $settings->show_certificate_button ? 'checked' : '' }}>
                            <label class="custom-control-label" for="certificateToggle">Certificate Download</label>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="marksheetToggle"
                                {{ $settings->show_marksheet_button ? 'checked' : '' }}>
                            <label class="custom-control-label" for="marksheetToggle">Marksheet Download</label>
                        </div>
                    </div>


                    <div class="btn-group">
                        <!-- <a style="margin-right: 10px;" href="{{ route('admin.result.create') }}" class="btn btn-primary ">
                            <i class="fas fa-upload me-1"></i> Upload Results
                        </a> -->
                        <button id="deleteAllBtn" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i> Delete All
                        </button>
                    </div>
                </div>
            </div>


            <style>
                #meritFilter {
                    padding: 0.6rem;
                    font-size: 0.95rem;
                    transition: all 0.3s ease;
                }

                #meritFilter:focus {
                    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
                }

                .input-group-text {
                    border: 1px solid #0d6efd;
                }

                .btn-group .btn {
                    padding: 0.6rem 1.2rem;
                    font-weight: 500;
                }
            </style>




            <div class="card-body">
                <table class="table table-bordered" id="resultsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>School</th>
                            <th>Standard</th>
                            <th>Total Marks</th>
                            <th>Percentage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($primaryresults as $result)
                        <tr>
                            <td>{{ $result->id }}</td>
                            <td>{{ $result->name }}</td>
                            <td>{{ $result->school_name }}</td>
                            <td>{{ $result->std }}</td>
                            <td>{{ $result->total_marks }}</td>
                            <td>{{ $result->percentage }}%</td>
                            <td>
                                <a href="{{ route('admin.result.show', $result->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('admin.result.edit', $result->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $result->id }}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#resultsTable').DataTable({
            order: [[3, 'asc']]
        });

        // Add merit filter functionality
        $('#meritFilter').on('change', function() {
            let meritType = $(this).val();
            let url = new URL(window.location.href);

            if (meritType) {
                url.searchParams.set('merit_type', meritType);
            } else {
                url.searchParams.delete('merit_type');
            }

            window.location.href = url.toString();
        });

        $('.delete-btn').on('click', function() {
            if (confirm('Are you sure you want to delete this result?')) {
                let id = $(this).data('id');
                $.ajax({
                    url: `/admin/result/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message);
                            location.reload();
                        }
                    }
                });
            }
        });


        $('#deleteAllBtn').on('click', function() {
            if (confirm('Are you sure you want to delete all results? This action cannot be undone.')) {
                const urlParams = new URLSearchParams(window.location.search);
                const adminExamId = urlParams.get('admin_exam_id');
                $.ajax({
                    url: '/admin/delete-all-result',
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        admin_exam_id: adminExamId
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message);
                            location.reload();
                        }
                    }
                });
            }
        });








    });


    $(document).ready(function() {
        $('#centerFilter').on('change', function() {
            let center = $(this).val();
            let url = new URL(window.location.href);

            if (center) {
                url.searchParams.set('center', center);
                $('#downloadCenterCertificates').show();
            } else {
                url.searchParams.delete('center');
                $('#downloadCenterCertificates').hide();
            }

            window.location.href = url.toString();
        });

        // Show button on page load if center is selected
        if ($('#centerFilter').val()) {
            $('#downloadCenterCertificates').show();
        }

        $('#downloadCenterCertificates').on('click', function() {
            let center = $('#centerFilter').val();
            window.location.href = `/admin/download-center-certificates/${center}`;
        });

        // Certificate Toggle
        $('#certificateToggle').on('change', function() {
            $.ajax({
                url: "{{ route('admin.result.toggle-certificate-button') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                    }
                }
            });
        });


        // Marksheet Toggle
        $('#marksheetToggle').on('change', function() {
            $.ajax({
                url: "{{ route('admin.result.toggle-marksheet-button') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                    }
                }
            });
        });


    });
</script>
@endpush
@endsection