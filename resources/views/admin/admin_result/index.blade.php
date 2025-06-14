@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Bulk Results Management</h1>
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
                        <select id="examFilter" style="width:200px" class="form-select border-primary shadow-sm">
                            <option value="">Select Exam Name</option>
                            @foreach($exams as $exam)
                            <option value="{{ $exam->exam_name }}" {{ request('exam') == $exam->exam_name ? 'selected' : '' }}>
                                {{ strtoupper($exam->exam_name) }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <!-- <button id="downloadCenterCertificates" class="btn btn-success" style="display: none;">
                        <i class="fas fa-download"></i> Download All Certificates
                    </button> -->

                    <!-- New toggle buttons for certificate and marksheet -->
                    <!-- <div class="ml-3 d-flex ">
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
                    </div> -->


                    <div class="btn-group">
                        <a style="margin-right: 10px;" href="{{ route('admin.admin-result.create') }}" class="btn btn-primary ">
                             Exam Create
                        </a>
                        <!-- <button id="deleteAllBtn" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i> Delete All
                        </button> -->
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
                            <th>Exam Name</th>
                            <!-- <th>Standard</th> -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminResults  as $key => $result)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $result->exam_name }}</td>
                            <!-- <td>{{ $result->standard }}</td> -->
                           
                            <td>
                            <a href="javascript:void(0);" class="btn btn-primary" data-id="{{ $result->id }}" data-toggle="modal" data-target="#uploadResultModal" style="margin-right: 10px;">
    <i class="fas fa-upload mr-1"></i> Upload Result
</a>


                                <a href="javascript:void(0);" onclick="viewResult({{ $result->id }})" class="btn btn-sm btn-info">View Result</a>
                                <a href="{{ route('admin.admin-result.edit', $result->id) }}" class="btn btn-sm btn-primary">Edit</a>
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

<!-- Upload Result Modal -->
<div class="modal fade" id="uploadResultModal" tabindex="-1" role="dialog" aria-labelledby="uploadResultModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.admin-result-upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadResultModalLabel">Upload Result</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Upload Excel File</label>
                        <input type="file" name="excel_file" class="form-control" accept=".xlsx,.xls" required>
                        <input type="hidden" name="admin_result_id" class="form-control" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ asset('sampleresultexcelnew.xlsx') }}" download class="btn btn-info">Download Sample Excel</a>
                    <button type="submit" class="btn btn-primary">Upload Result</button>
                </div>
            </div>
        </form>
    </div>
</div>



@push('scripts')
<script>


    $(document).on('click', '[data-target="#uploadResultModal"]', function () {
        var resultId = $(this).data('id');
        $('#uploadResultModal input[name="admin_result_id"]').val(resultId);
    });



    $(document).ready(function() {
        $('#resultsTable').DataTable();

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
                    url: `/admin/admin-result/${id}`,
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
                $.ajax({
                    url: '/admin/admin-delete-all-result',
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








    });
    function viewResult(id) {
       
        window.location.href = `/admin/admin-download-certificates/${id}`;
        window.location.href = `/admin/result?admin_exam_id=${id}`;
    }

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

        $('#examFilter').on('change', function() {
            let exam = $(this).val();
            let url = new URL(window.location.href);

            if (exam) {
                url.searchParams.set('exam', exam);
                $('#downloadCenterCertificates').show();
            } else {
                url.searchParams.delete('exam');
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
            window.location.href = `/admin/admin-download-center-certificates/${center}`;
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
                url: "{{ route('admin.admin-result.toggle-marksheet-button') }}",
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