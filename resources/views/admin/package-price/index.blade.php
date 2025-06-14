@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Package Price</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Package Price</h4>
                        <div class="card-header-action">
                            <a href="{{route('admin.package-price.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Package Name</th>
                                        <th>Package Title</th>
                                        <th>Button Name</th>
                                        <th>Price</th>
                                        <th>Facility 1</th>
                                        <th>Facility 2</th>
                                        <th>Facility 3</th>
                                        <th>Facility 4</th>
                                        <th>Facility 5</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($exams as $exam)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$exam->package_name}}</td>
                                        <td>{{$exam->package_title}}</td>
                                        <td>{{$exam->button_name}}</td>
                                        <td>{{$exam->price}}</td>
                                        <td>{{$exam->facility_1}}</td>
                                        <td>{{$exam->facility_2}}</td>
                                        <td>{{$exam->facility_3}}</td>
                                        <td>{{$exam->facility_4}}</td>
                                        <td>{{$exam->facility_5}}</td>
                                        <td>
                                           
                                            <a href="{{route('admin.package-price.edit', $exam->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="javascript:;" data-id="{{$exam->id}}" class="btn btn-danger btn-sm delete-hed"><i class="fas fa-trash"></i></a>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
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
    $(document).on('click', '.delete-hed', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let url = `package-price/${id}`;

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