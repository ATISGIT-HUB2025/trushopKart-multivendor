@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Announcement</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Announcement</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.announcements.update', $announcement->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{$announcement->title}}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description">{{$announcement->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" name="type">
                                    <option {{$announcement->type == 'exam' ? 'selected': ''}} value="exam">Exam</option>
                                    <option {{$announcement->type == 'result' ? 'selected': ''}} value="result">Result</option>
                                    <option {{$announcement->type == 'event' ? 'selected': ''}} value="event">Event</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="datetime-local" class="form-control" name="announcement_date" value="{{$announcement->announcement_date->format('Y-m-d\TH:i')}}">
                            </div>
                            <div class="form-group">
                                <label>Location (optional)</label>
                                <input type="text" class="form-control" name="location" value="{{$announcement->location}}">
                            </div>
                            <div class="form-group">
                                <label>Link (optional)</label>
                                <input type="url" class="form-control" name="link" value="{{$announcement->link}}">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="is_active">
                                    <option {{$announcement->is_active == 1 ? 'selected': ''}} value="1">Active</option>
                                    <option {{$announcement->is_active == 0 ? 'selected': ''}} value="0">Inactive</option>
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
