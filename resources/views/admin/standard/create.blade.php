@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Standard</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Standard</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.standard.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label>Standard</label>
                                <input type="text" class="form-control" name="standard" value="{{old('standard')}}">
                            </div>

                            <div class="form-group">
                                <label>Fees</label>
                                <input type="text" class="form-control" name="fees" value="{{old('fees')}}">
                            </div>

                            <div class="form-group">
                                <label>Session Start Date</label>
                                <input type="date" class="form-control" name="start_date" value="{{old('start_date')}}">
                            </div>

                            <div class="form-group">
                                <label>Session End Date</label>
                                <input type="date" class="form-control" name="end_date" value="{{old('end_date')}}">
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