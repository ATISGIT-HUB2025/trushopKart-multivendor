@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Center Had</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Center Had</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.center-had.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{old('email')}}">
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                            </div>


                           
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" value="{{old('password')}}">
                            </div>

                          


                            <button type="submit" class="btn btn-primary">Create</button>
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