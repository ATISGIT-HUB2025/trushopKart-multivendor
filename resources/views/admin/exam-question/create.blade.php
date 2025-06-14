@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Question</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create New Question</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.exam-question.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Select Exam</label>
                                    <select class="form-control" name="exam_id">
                                        <option value="">Select</option>
                                        @foreach($exams as $exam)
                                            <option value="{{$exam->id}}">{{$exam->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Add this after exam selection -->
<div class="form-group">
    <label>Select Section</label>
    <select class="form-control" name="section_id">
        <option value="">Select</option>
        @foreach($sections as $section)
            <option value="{{$section->id}}" {{old('section_id') == $section->id ? 'selected' : ''}}>{{$section->title}}</option>
        @endforeach
    </select>
</div>


                                <div class="form-group">
                                    <label>Question</label>
                                    <textarea class="form-control" name="question">{{old('question')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Option A</label>
                                    <input type="text" class="form-control" name="option_a" value="{{old('option_a')}}">
                                </div>

                                <div class="form-group">
                                    <label>Option B</label>
                                    <input type="text" class="form-control" name="option_b" value="{{old('option_b')}}">
                                </div>

                                <div class="form-group">
                                    <label>Option C</label>
                                    <input type="text" class="form-control" name="option_c" value="{{old('option_c')}}">
                                </div>

                                <div class="form-group">
                                    <label>Option D</label>
                                    <input type="text" class="form-control" name="option_d" value="{{old('option_d')}}">
                                </div>

                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <select class="form-control" name="correct_answer">
                                        <option value="a">Option A</option>
                                        <option value="b">Option B</option>
                                        <option value="c">Option C</option>
                                        <option value="d">Option D</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Marks</label>
                                    <input type="number" class="form-control" name="marks" value="{{old('marks')}}">
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
