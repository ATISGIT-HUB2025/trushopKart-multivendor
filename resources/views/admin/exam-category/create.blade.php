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
                            <h4>Create Exam Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.exam-category.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" class="form-control" name="logo">
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
                                    <label>Exam Date</label>
                                    <input type="text" class="form-control" name="exam_date" value="{{old('exam_date')}}">
                                </div>

                                <div class="form-group">
                                    <label>Duration</label>
                                    <input type="text" class="form-control" name="duration" value="{{old('duration')}}">
                                </div>

                                <div class="form-group">
                                    <label>Medium</label>
                                    <input type="text" class="form-control" name="medium" value="{{old('medium')}}">
                                </div>

                                <div class="form-group">
                                    <label>Total Marks</label>
                                    <input type="text" class="form-control" name="total_marks" value="{{old('total_marks')}}">
                                </div>

                                <div class="form-group">
                                    <label>Eligibility</label>
                                    <input type="text" class="form-control" name="eligibility" value="{{old('eligibility')}}">
                                </div>

                                <div class="form-group">
                                    <label>Mode</label>
                                    <input type="text" class="form-control" name="mode" value="{{old('mode')}}">
                                </div>

                                <div class="form-group">
                                    <label>Serial</label>
                                    <input type="number" class="form-control" name="serial" value="{{old('serial')}}">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
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
