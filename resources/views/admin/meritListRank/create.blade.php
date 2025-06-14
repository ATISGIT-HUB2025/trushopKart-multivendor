@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Merit List Rank</h1>
    </div>
    <div class="section-body">
        <div class="cart">
            <form action="{{ route('admin.merit-list-rank.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3 ">
                    <label>Role</label>
                    <select class="form-control" name="role">
                        <option value="">Select role</option>
                        <option value="state">State</option>
                        <option value="division">Division</option>
                        <option value="district">District</option>
                        <option value="taluka">Taluka</option>
                        <option value="center">Center</option>
                    </select>
                </div>

                <div class="form-group mb-3 ">
                    <label>Rank</label>
                    <input type = "number" name="rank"  class="form-control">
                        
                </div>
                
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
               
               

               
            </form>
        </div>
    </div>

</section>

<!-- CSS for Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select Standard",
            allowClear: true
        });
    });
</script>



@endsection