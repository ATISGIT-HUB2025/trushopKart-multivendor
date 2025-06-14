@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Exam Centers</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Centers</h4>
                        <div class="card-header-action">
                            <a href="{{route('admin.center.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Total Seats</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($centers as $center)
                                    <tr>
                                        <td>{{$center->name}}</td>
                                        <td>{{$center->total_seats}}</td>
                                        <td>
                                            <span class="badge {{$center->status ? 'badge-success' : 'badge-danger'}}">
                                                {{$center->status ? 'Active' : 'Inactive'}}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.center.edit', $center->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('admin.center.destroy', $center->id)}}" class="btn btn-danger btn-sm delete-item"><i class="fas fa-trash"></i></a>
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

<a href="{{route('admin.center.destroy', $center->id)}}" class="btn btn-danger btn-sm delete-item"><i class="fas fa-trash"></i></a>

@push('scripts')
<script>
    $(document).ready(function(){
        $('.delete-item').on('click', function(e){
            e.preventDefault();
            let url = $(this).attr('href');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response){
                            if(response.status === 'success'){
                                Swal.fire(
                                    'Deleted!',
                                    'Center has been deleted.',
                                    'success'
                                )
                                window.location.reload();
                            }
                        }
                    });
                }
            })
        });
    });
</script>
@endpush
