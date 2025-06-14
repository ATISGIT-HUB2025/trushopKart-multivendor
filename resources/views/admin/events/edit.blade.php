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
                        <h4>Edit Event</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.events.update', $event->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <img src="{{asset($event->image)}}" width="200px" alt="">
                                <br>
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{$event->title}}">
                            </div>

                            <div class="form-group">
                                <label>Start Date and Time</label>
                                <input type="datetime-local" class="form-control" name="start_datetime" value="{{$event->start_datetime->format('Y-m-d\TH:i')}}">
                            </div>

                            <div class="form-group">
                                <label>End Date and Time</label>
                                <input type="datetime-local" class="form-control" name="end_datetime" value="{{$event->end_datetime->format('Y-m-d\TH:i')}}">
                            </div>

                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" class="form-control" name="location" value="{{$event->location}}">
                            </div>

                            <div class="form-group">
                                <label>Organizer</label>
                                <input type="text" class="form-control" name="organizer" value="{{$event->organizer}}">
                            </div>

                            <div class="form-group">
                                <label>Video URL</label>
                                <input type="url" class="form-control" name="video_url" value="{{$event->video_url}}">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control summernote">{!!$event->description!!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="status">
                                    <option {{$event->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$event->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                                </select>
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
