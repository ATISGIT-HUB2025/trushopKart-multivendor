@extends('teacher.layouts.master')

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('teacher.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fas fa-file-alt"></i> Create Exam</h3>

                    <div class="card">
                        <div class="card-header">
                            <h4>Create New Exam</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('teacher.exam.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="exam_category_id">
                                        <option value="">Select</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description">{{old('description')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Exam Conditions</label>
                                    <textarea name="conditions" class="form-control summernote">{{old('conditions')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Duration (minutes)</label>
                                    <input type="number" class="form-control" name="duration" value="{{old('duration')}}">
                                </div>

                                <div class="form-group">
                                    <label>Total Marks</label>
                                    <input type="number" class="form-control" name="total_marks" value="{{old('total_marks')}}">
                                </div>

                                <div class="form-group">
                                    <label>Pass Marks</label>
                                    <input type="number" class="form-control" name="pass_marks" value="{{old('pass_marks')}}">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" step="0.01" class="form-control" name="price" value="{{old('price')}}">
                                </div>

                                <div class="form-group">
                                    <label>Is Paid?</label>
                                    <select class="form-control" name="is_paid">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Is Certificate?</label>
                                    <select class="form-control" name="is_certificate">
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Is Upcoming?</label>
                                    <select class="form-control" name="is_upcoming" id="is_upcoming">
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>

                                <div class="form-group date-fields" style="display: none;">
                                    <label>Start Date</label>
                                    <input type="datetime-local" class="form-control" name="start_date" value="{{old('start_date')}}">
                                </div>

                                <div class="form-group date-fields" style="display: none;">
                                    <label>End Date</label>
                                    <input type="datetime-local" class="form-control" name="end_date" value="{{old('end_date')}}">
                                </div>

                                <div class="form-group">
                                    <label>Audio Instructions (Optional)</label>
                                    <input type="file" class="form-control" name="audio" accept="audio/*">
                                    <small class="text-muted">Supported formats: MP3, WAV, OGG (Max: 10MB)</small>
                                </div>

                                <div class="form-group">
                                    <label>Video Instructions (Optional)</label>
                                    <input type="file" class="form-control" name="video" accept="video/*">
                                    <small class="text-muted">Supported formats: MP4, MOV, AVI (Max: 50MB)</small>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
@endsection
