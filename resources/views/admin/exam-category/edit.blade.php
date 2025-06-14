@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Exam Categories</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Exam Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.exam-category.update', $examCategory->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Preview</label>
                                    <br>
                                    <img width="200" src="{{asset($examCategory->logo)}}" alt="">
                                </div>

                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$examCategory->name}}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description">{{$examCategory->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Exam Date</label>
                                    <input type="text" class="form-control" name="exam_date" value="{{$examCategory->exam_date}}">
                                </div>

                                <div class="form-group">
                                    <label>Duration</label>
                                    <input type="text" class="form-control" name="duration" value="{{$examCategory->duration}}">
                                </div>

                                <div class="form-group">
                                    <label>Medium</label>
                                    <input type="text" class="form-control" name="medium" value="{{$examCategory->medium}}">
                                </div>

                                <div class="form-group">
                                    <label>Total Marks</label>
                                    <input type="text" class="form-control" name="total_marks" value="{{$examCategory->total_marks}}">
                                </div>

                                <div class="form-group">
                                    <label>Eligibility</label>
                                    <input type="text" class="form-control" name="eligibility" value="{{$examCategory->eligibility}}">
                                </div>

                                <div class="form-group">
                                    <label>Mode</label>
                                    <input type="text" class="form-control" name="mode" value="{{$examCategory->mode}}">
                                </div>

                                <div class="form-group">
                                    <label>Serial</label>
                                    <input type="number" class="form-control" name="serial" value="{{$examCategory->serial}}">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option {{$examCategory->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                        <option {{$examCategory->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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
