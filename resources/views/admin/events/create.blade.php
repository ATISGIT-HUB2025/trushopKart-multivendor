@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Event</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Event</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.events.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                            </div>

                            <div class="form-group">
                                <label>Start Date and Time</label>
                                <input type="datetime-local" class="form-control" name="start_datetime" value="{{old('start_datetime')}}">
                            </div>

                            <div class="form-group">
                                <label>End Date and Time</label>
                                <input type="datetime-local" class="form-control" name="end_datetime" value="{{old('end_datetime')}}">
                            </div>

                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" class="form-control" name="location" value="{{old('location')}}">
                            </div>

                            <div class="form-group">
                                <label>Organizer</label>
                                <input type="text" class="form-control" name="organizer" value="{{old('organizer')}}">
                            </div>

                            <div class="form-group">
                                <label>Video URL</label>
                                <input type="url" class="form-control" name="video_url" value="{{old('video_url')}}">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control summernote">{!!old('description')!!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
