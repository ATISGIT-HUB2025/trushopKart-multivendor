@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Access Management</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Access Management</h4>
                        <div class="card-header-action">
                            <a href="{{route('admin.accessmanagement.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th class="fw-bold">ID</th>
                                            <th class="fw-bold">Name</th>
                                            <th class="fw-bold">Email</th>
                                            <th class="fw-bold">Phone</th>
                                            <th class="fw-bold">Role</th>
                                            <th class="fw-bold">Password</th>
                                            <th class="fw-bold">Status</th>
                                            <th class="fw-bold">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->unique_id }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td>
                                                <span class="badge bg-info">
                                                    {{ ucfirst(str_replace('_', ' ', $employee->role)) }}
                                                </span>
                                            </td>
                                            
                                            <td>{{ $employee->original_password   }}</td>
                                            <td>
                                                <span class="badge bg-{{ $employee->status === 'active' ? 'success' : 'danger' }}">
                                                    {{ ucfirst($employee->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.accessmanagement.edit', $employee->id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit me-1"></i>Edit
                                                    </a>
                                                    <form action="{{ route('admin.accessmanagement.destroy', $employee->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger ms-1"
                                                            onclick="return confirm('Are you sure you want to delete this employee?')">
                                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                                        </button>
                                                    </form>
                                                </div>
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
</section>
@endsection

@push('scripts')
<script>
    $(document).on('click', '.delete-hed', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let url = `center-had/${id}`;

        if (confirm('Are you sure you want to delete this item?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert('Something went wrong!');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        }
    });
</script>

</script>
@endpush