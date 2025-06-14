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
                        <h4>Create Announcement</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.announcements.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" name="type">
                                    <option value="exam">Exam</option>
                                    <option value="result">Result</option>
                                    <option value="event">Event</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="datetime-local" class="form-control" name="announcement_date">
                            </div>
                            <div class="form-group">
                                <label>Location (optional)</label>
                                <input type="text" class="form-control" name="location">
                            </div>
                            <div class="form-group">
                                <label>Link (optional)</label>
                                <input type="url" class="form-control" name="link">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="is_active">
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
