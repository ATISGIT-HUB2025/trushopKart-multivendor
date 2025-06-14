@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Exams</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Exams</h4>
                        <div class="card-header-action">
                            <a href="{{route('admin.exam.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Duration</th>
                                        <th>Total Marks</th>
                                        <th>Pass Marks</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($exams as $exam)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$exam->name}}</td>
                                        <td>{{$exam->category->name}}</td>
                                        <td>{{$exam->duration}} mins</td>
                                        <td>{{$exam->total_marks}}</td>
                                        <td>{{$exam->pass_marks}}</td>
                                        <td>${{$exam->price}}</td>
                                        <td>
                                            @if($exam->status == 1)
                                            <span class="badge badge-success">Active</span>
                                            @else
                                            <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.exam.preview', $exam->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="{{route('admin.exam.edit', $exam->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="javascript:;" data-id="{{$exam->id}}" class="btn btn-danger btn-sm delete-item"><i class="fas fa-trash"></i></a>
                                        </td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$exams->links()}}
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
        $('.delete-item').on('click', function() {
            let id = $(this).data('id');
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
                        url: "{{ url('admin/exam') }}/" + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                )
                                window.location.reload();
                            }
                        }
                    })
                }
            })
        })
    })
</script>
@endpush