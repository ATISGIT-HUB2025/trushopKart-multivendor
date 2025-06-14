@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Center Had</h1>
    </div>


    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Center Had</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.center-had.update', $exam->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{$exam->name}}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{$exam->email}}">
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{$exam->phone}}">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" value="{{$exam->original_password}}">
                            </div>

                            


                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
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
        $('#is_upcoming').change(function() {
            if ($(this).val() == '1') {
                $('.date-fields').show();
            } else {
                $('.date-fields').hide();
            }
        });
    });
</script>
@endpush