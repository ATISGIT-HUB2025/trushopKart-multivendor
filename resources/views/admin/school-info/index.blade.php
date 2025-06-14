@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>School Information Management</h1>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>All Schools</h4>
                <div>
                    <a href="{{ route('admin.school-info.create') }}" class="btn btn-primary me-2">
                        Upload Schools
                    </a>
                    <button id="deleteAllBtn" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Delete All Schools
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="resultsTable">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Division</th>
                            <th>District</th>
                            <th>Taluka</th>
                            <!-- <th>Cluster</th> -->
                            <!-- <th>UDISE</th>
                            <th>School Name</th>
                            <th>Village/Town</th> -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($primaryresults as $school)
                        <tr>
                            <td>{{ $school->sr_no }}</td>
                            <td>{{ $school->division }}</td>
                            <td>{{ $school->district }}</td>
                            <td>{{ $school->taluka }}</td>
                            <!-- <td>{{ $school->cluster }}</td> -->
                            <!-- <td>{{ $school->udise }}</td>
                            <td>{{ $school->school_name }}</td>
                            <td>{{ $school->village_town }}</td> -->
                            <td>
                                <a href="{{ route('admin.school-info.show', $school->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('admin.school-info.edit', $school->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $school->id }}">Delete</button>
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
        $('#resultsTable').DataTable();

        $('.delete-btn').on('click', function() {
            if (confirm('Are you sure you want to delete this school?')) {
                let id = $(this).data('id');
                $.ajax({
                    url: `/admin/school-info/${id}`,
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
            if (confirm('Are you sure you want to delete all school info? This action cannot be undone.')) {
                $.ajax({
                    url: '/admin/delete-all-schoolinfo',
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
@endsection
