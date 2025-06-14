@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Partner/Teacher Information</h1>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>All Access Requests</h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="requestsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Subject</th>
                            <th>Details</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $request)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $request->name }} {{ $request->lname }}</td>
                            <td>{{ $request->email }}</td>
                            <td>{{ $request->mobile }}</td>
                            <td>{{ $request->subject }}</td>
                            <td>{{ $request->details }}</td>
                            <td>
                                @switch($request->status)
                                    @case(0)
                                        <span class="badge bg-warning">Pending</span>
                                        @break
                                    @case(1)
                                        <span class="badge bg-success">Approved</span>
                                        @break
                                    @case(2)
                                        <span class="badge bg-danger">Rejected</span>
                                        @break
                                    @default
                                        <span class="badge bg-secondary">Unknown</span>
                                @endswitch
                            </td>
                            <td>
                         
                                    @if ($request->status === 0)
                                        <button class="btn btn-sm btn-success status-btn" data-id="{{ $request->id }}" data-status="1">Approve</button>
                                        <button class="btn btn-sm btn-danger status-btn" data-id="{{ $request->id }}" data-status="2">Reject</button>
                                    @endif
                                    <!-- <a href="#" class="btn btn-sm btn-info">View</a>
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $request->id }}">Delete</button> -->
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
        $('#requestsTable').DataTable();

        $('.delete-btn').on('click', function() {
            if (confirm('Are you sure you want to delete this request?')) {
                let id = $(this).data('id');
                $.ajax({
                    url: `/admin/request-access/${id}`,
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


          // APPROVE/REJECT button
          $('.status-btn').on('click', function() {
            let id = $(this).data('id');
            let status = $(this).data('status');

            $.ajax({
                url: `/admin/request-access/update-status/${id}`,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        location.reload();
                    }
                },
                error: function() {
                    toastr.error('Failed to update status.');
                }
            });
        });
    });
</script>
@endpush
@endsection
