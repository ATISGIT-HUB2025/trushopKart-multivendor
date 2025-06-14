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
                        <form action="{{route('admin.standard.update', $standard->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label>Standard</label>
                                <input type="text" class="form-control" name="standard" value="{{$standard->standard}}">
                            </div>

                            <div class="form-group">
                                <label>Fees</label>
                                <input type="text" class="form-control" name="fees" value="{{$standard->fees}}">
                            </div>

                            <div class="form-group">
                                <label>Session Start Date</label>
                                <input type="date" class="form-control" name="start_date" value="{{$standard->start_date}}">
                            </div>

                            <div class="form-group">
                                <label>Session End Date</label>
                                <input type="date" class="form-control" name="end_date" value="{{$standard->end_date}}">
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