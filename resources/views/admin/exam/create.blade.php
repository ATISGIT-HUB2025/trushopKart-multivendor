@extends('admin.layouts.master')

@section('content')
<style>
    .select2-selection__choice {
    background-color: #2b2525 !important;
}
</style>
<section class="section">
    <div class="section-header">
        <h1>Create Exam</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Exam</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.exam.store')}}" method="POST" enctype="multipart/form-data">
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
                                <label>Subject</label>
                                <input type="text" class="form-control" name="subject" value="{{old('subject')}}">
                            </div>

                            <div class="form-group">
                                <label>Standard</label>
                                <select class="form-control" name="standard">
                                    <option value="">Select Standard</option>
                                    <option value="1st">1st Standard</option>
                                    <option value="2nd">2nd Standard</option>
                                    <option value="3rd">3rd Standard</option>
                                    <option value="4th">4th Standard</option>
                                    <option value="5th">5th Standard</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Medium</label>
                                <select class="form-control" name="medium">
                                    <option value="">Select Medium</option>
                                    <option value="English">English</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Bengali">Bengali</option>
                                    <!-- Add more options as needed -->
                                </select>
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

                            <div class="form-group">
                                <label>Select Center Had</label>
                                <select class="form-control" name="center_hed[]" id="center_hed" multiple="multiple">
                                    @foreach($user as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
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

<!-- Include Select2 CSS and JS -->
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