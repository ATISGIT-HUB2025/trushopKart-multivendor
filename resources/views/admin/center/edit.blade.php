@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Exam Centers</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Center</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.center.update', $center->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Center Name</label>
                                <input type="text" class="form-control" name="name" value="{{$center->name}}">
                            </div>

                            <div class="form-group">
                                <label>Total Seats</label>
                                <input type="number" class="form-control" name="total_seats" value="{{$center->total_seats}}">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option {{$center->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$center->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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
