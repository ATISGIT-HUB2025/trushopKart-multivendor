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
                                            <th class="fw-bold">Stardard</th>
                                            <th class="fw-bold">Fees</th>
                                            <th class="fw-bold">Status</th>
                                            <th class="fw-bold">Session Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $key => $student)
                                        <tr>
                                            <td>{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->standard }}</td>
                                            <td>{{ $student->fees }}</td>
                                           
                                            <td>
                                                <span class="badge bg-{{ $student->status === 'active' ? 'success' : 'danger' }}">
                                                    {{ ucfirst($student->status) }}
                                                </span>
                                            </td>
                                            <td>
                                            <span class="badge bg-{{ $student->end_date && $student->start_date &&  $student->end_date >= $student->start_date? 'success' : 'danger' }}">
                                                 <?= $student->end_date && $student->start_date &&  $student->end_date >= $student->start_date? "Running" : "Expire" ?>
                                                    <!-- {{ ucfirst($student->start_date) }}  -->
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $students->links('pagination::bootstrap-4') }}
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