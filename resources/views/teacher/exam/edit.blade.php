@extends('teacher.layouts.master')

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('teacher.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fas fa-file-alt"></i> Edit Exam</h3>

                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Exam</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('teacher.exam.update', $exam->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="exam_category_id">
                                        <option value="">Select</option>
                                        @foreach($categories as $category)
                                        <option {{$exam->exam_category_id == $category->id ? 'selected' : ''}}
                                            value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$exam->name}}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description">{{$exam->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Exam Conditions</label>
                                    <textarea name="conditions" class="form-control summernote">{{$exam->conditions}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Duration (minutes)</label>
                                    <input type="number" class="form-control" name="duration" value="{{$exam->duration}}">
                                </div>

                                <div class="form-group">
                                    <label>Total Marks</label>
                                    <input type="number" class="form-control" name="total_marks" value="{{$exam->total_marks}}">
                                </div>

                                <div class="form-group">
                                    <label>Pass Marks</label>
                                    <input type="number" class="form-control" name="pass_marks" value="{{$exam->pass_marks}}">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" step="0.01" class="form-control" name="price" value="{{$exam->price}}">
                                </div>

                                <div class="form-group">
                                    <label>Is Paid?</label>
                                    <select class="form-control" name="is_paid">
                                        <option {{$exam->is_paid == 1 ? 'selected' : ''}} value="1">Yes</option>
                                        <option {{$exam->is_paid == 0 ? 'selected' : ''}} value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Is Certificate?</label>
                                    <select class="form-control" name="is_certificate">
                                        <option {{$exam->is_certificate == 1 ? 'selected' : ''}} value="1">Yes</option>
                                        <option {{$exam->is_certificate == 0 ? 'selected' : ''}} value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option {{$exam->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                        <option {{$exam->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Is Upcoming?</label>
                                    <select class="form-control" name="is_upcoming" id="is_upcoming">
                                        <option {{$exam->is_upcoming == 1 ? 'selected' : ''}} value="1">Yes</option>
                                        <option {{$exam->is_upcoming == 0 ? 'selected' : ''}} value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group date-fields" style="display: {{$exam->is_upcoming ? 'block' : 'none'}};">
                                    <label>Start Date</label>
                                    <input type="datetime-local" class="form-control" name="start_date" 
                                        value="{{$exam->start_date ? $exam->start_date->format('Y-m-d\TH:i') : ''}}">
                                </div>

                                <div class="form-group date-fields" style="display: {{$exam->is_upcoming ? 'block' : 'none'}};">
                                    <label>End Date</label>
                                    <input type="datetime-local" class="form-control" name="end_date"
                                        value="{{$exam->end_date ? $exam->end_date->format('Y-m-d\TH:i') : ''}}">
                                </div>

                                <div class="form-group">
                                    <label>Audio Instructions (Optional)</label>
                                    @if($exam->audio)
                                    <div class="mb-2">
                                        <audio controls>
                                            <source src="{{asset($exam->audio)}}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                    @endif
                                    <input type="file" class="form-control" name="audio" accept="audio/*">
                                    <small class="text-muted">Supported formats: MP3, WAV, OGG (Max: 10MB)</small>
                                </div>

                                <div class="form-group">
                                    <label>Video Instructions (Optional)</label>
                                    @if($exam->video)
                                    <div class="mb-2">
                                        <video width="320" height="240" controls>
                                            <source src="{{asset($exam->video)}}" type="video/mp4">
                                            Your browser does not support the video element.
                                        </video>
                                    </div>
                                    @endif
                                    <input type="file" class="form-control" name="video" accept="video/*">
                                    <small class="text-muted">Supported formats: MP4, MOV, AVI (Max: 50MB)</small>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
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
