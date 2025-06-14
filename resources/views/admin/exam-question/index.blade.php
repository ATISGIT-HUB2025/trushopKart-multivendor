@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Exam Questions</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Questions</h4>
                            <div class="card-header-action">
                                <a href="{{route('admin.exam-question.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Exam</th>
                                            <th>Question</th>
                                            <th>Marks</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($questions as $question)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$question->exam->name}}</td>
                                            <td>{{$question->question}}</td>
                                            <td>{{$question->marks}}</td>
                                            <td>
                                                @if($question->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.exam-question.edit', $question->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="javascript:;" data-id="{{$question->id}}" class="btn btn-danger btn-sm delete-item"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$questions->links()}}
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
    $(document).ready(function(){
        $('.delete-item').on('click', function(){
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
                        url: "{{ route('admin.exam-question.destroy', '') }}/" + id,
                        data: {_token: "{{csrf_token()}}"},
                        success: function(response){
                            if(response.status === 'success'){
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
