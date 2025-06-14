@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Result</h1>
    </div>
    
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.merit-list-rank.update', $rank->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-3 ">
                    <label>Role</label>
                    <select class="form-control" name="role">
                        <option value="">Select role</option>
                        <option value="state" {{ $rank->role == 'state' ? 'selected' : '' }}>State</option>
                        <option value="division" {{ $rank->role == 'division' ? 'selected' : '' }}>Division</option>
                        <option value="district" {{ $rank->role == 'district' ? 'selected' : '' }}>District</option>
                        <option value="taluka" {{ $rank->role == 'taluka' ? 'selected' : '' }}>Taluka</option>
                        <option value="center" {{ $rank->role == 'center' ? 'selected' : '' }}>Center</option>
                    </select>
                </div>

                <div class="form-group mb-3 ">
                    <label>Rank</label>
                    <input type = "number" name="rank"  class="form-control" value="{{ $rank->rank }}">
                        
                </div>

                    <div class="text-end">
                      
                        <button type="submit" class="btn btn-primary">Update Result</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Select Standard",
            allowClear: true
        });
    });
</script>



@endsection
