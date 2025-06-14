@extends('admin.layouts.master')

@section('content')

<style>
    .select2-selection__choice {
    background-color: #2b2525 !important;
}
</style>
<section class="section">
    <div class="section-header">
        <h1>Edit Exam</h1>
    </div>


    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Exam</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.exam.update', $exam->id)}}" method="POST" enctype="multipart/form-data">
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
                                <textarea name="conditions"
                                    class="form-control summernote">{{$exam->conditions}}</textarea>
                            </div>


                            <div class="form-group">
                                <label>Duration (minutes)</label>
                                <input type="number" class="form-control" name="duration" value="{{$exam->duration}}">
                            </div>

                            <div class="form-group">
                                <label>Total Marks</label>
                                <input type="number" class="form-control" name="total_marks"
                                    value="{{$exam->total_marks}}">
                            </div>

                            <div class="form-group">
                                <label>Pass Marks</label>
                                <input type="number" class="form-control" name="pass_marks"
                                    value="{{$exam->pass_marks}}">
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" step="0.01" class="form-control" name="price"
                                    value="{{$exam->price}}">
                            </div>

                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control" name="subject" value="{{$exam->subject}}">
                            </div>

                            <div class="form-group">
                                <label>Standard</label>
                                <select class="form-control" name="standard">
                                    <option value="">Select Standard</option>
                                    <option value="1st" {{$exam->standard == '1st' ? 'selected' : ''}}>1st Standard</option>
                                    <option value="2nd" {{$exam->standard == '2nd' ? 'selected' : ''}}>2nd Standard</option>
                                    <option value="3rd" {{$exam->standard == '3rd' ? 'selected' : ''}}>3rd Standard</option>
                                    <option value="4th" {{$exam->standard == '4th' ? 'selected' : ''}}>4th Standard</option>
                                    <option value="5th" {{$exam->standard == '5th' ? 'selected' : ''}}>5th Standard</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Medium</label>
                                <select class="form-control" name="medium">
                                    <option value="">Select Medium</option>
                                    <option value="English" {{$exam->medium == 'English' ? 'selected' : ''}}>English</option>
                                    <option value="Hindi" {{$exam->medium == 'Hindi' ? 'selected' : ''}}>Hindi</option>
                                    <option value="Bengali" {{$exam->medium == 'Bengali' ? 'selected' : ''}}>Bengali</option>
                                    <!-- Add more options as needed -->
                                </select>
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

                            <div class="form-group">
                                <label>Select Center Had</label>
                                <select class="form-control" name="center_hed[]" id="center_hed" multiple="multiple">
                                    @php 
                                        $selectedCenters = is_array(json_decode($exam->center_hed, true)) ? json_decode($exam->center_hed, true) : []; 
                                    @endphp
                                    @foreach($user as $value)
                                        <option @if(!empty($exam->center_hed) && in_array($value->id, $selectedCenters)) selected @endif value="{{$value->id}}">
                                            {{$value->name}}
                                        </option>
                                    @endforeach
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $('#center_hed').select2({
            placeholder: "Select Center Had",
            allowClear: true,
            tags: true // Allows adding and removing options
        });
    });
</script>
@endpush