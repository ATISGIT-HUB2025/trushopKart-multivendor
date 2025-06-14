@extends('state_head.layouts.master')
@section('title')
Bulk Admission
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('state_head.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fas fa-file-alt"></i> Bulk Admission</h3>

                    <div class="container">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Bulk Admission</h4>
                                <div>
                                    <a href="{{ route('state_head.bulk-admission.create') }}" class="btn btn-primary me-2">
                                        Bulk Admission
                                    </a>
                                    <a href="{{ route('state_head.generate-tickets') }}" class="btn btn-success">
                                        Generate Hall Tickets
                                    </a>

                                </div>
                            </div>


                            <div class="card-body">
                                <table class="table table-bordered" id="admissionTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Student Name</th>
                                            <th>School</th>
                                            <th>Standard</th>
                                            <th>Center</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->sr_no }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->school_name }}</td>
                                            <td>{{ $student->std }}</td>
                                            <td>{{ $student->exam_center }}</td>
                                            <td>
                                                <a href="{{ route('state_head.bulk-admission.show', $student->id) }}" class="btn btn-sm btn-success">View</a>
                                                <a href="{{ route('state_head.bulk-admission.edit', $student->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $student->id }}">Delete</button>
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

@push('scripts')
<script>
    $(document).ready(function() {
        $('#admissionTable').DataTable();

        $('.delete-btn').on('click', function() {
            if (confirm('Are you sure you want to delete this student?')) {
                let id = $(this).data('id');
                $.ajax({
                    url: `/state_head/bulk-admission/${id}`,
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
</script>
@endpush