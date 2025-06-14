@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Standards</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Standards</h4>
                        <div class="card-header-action">
                            <a href="{{route('admin.standard.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Standard</th>
                                        <th>Fees</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($standards as $standard)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$standard->standard}}</td>
                                        <td>{{$standard->fees}}</td>
                                        <td>{{$standard->start_date}}</td>
                                        <td>{{$standard->end_date}}</td>
                                        <td>
                                           
                                            <a href="{{route('admin.standard.edit', $standard->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="javascript:;" data-id="{{$standard->id}}" class="btn btn-danger btn-sm delete-hed"><i class="fas fa-trash"></i></a>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                        </td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$standards->links()}}
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
        let url = `standard/${id}`;

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