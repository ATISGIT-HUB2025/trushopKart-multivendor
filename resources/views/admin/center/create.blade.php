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
                        <h4>Create Center</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.center.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Center Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                                <label>Total Seats</label>
                                <input type="number" class="form-control" name="total_seats" value="{{old('total_seats')}}">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Upload Excel (Optional)</label>
                                <input type="file" class="form-control" name="excel_file">
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
