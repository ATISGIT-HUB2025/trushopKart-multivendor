@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Question</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Question</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.exam-question.update', $question->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Select Exam</label>
                                    <select class="form-control" name="exam_id">
                                        <option value="">Select</option>
                                        @foreach($exams as $exam)
                                            <option {{$question->exam_id == $exam->id ? 'selected' : ''}} value="{{$exam->id}}">{{$exam->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Add this after exam selection -->
<div class="form-group">
    <label>Select Section</label>
    <select class="form-control" name="section_id">
        <option value="">Select</option>
        @foreach($sections as $section)
            <option value="{{$section->id}}" {{$question->section_id == $section->id ? 'selected' : ''}}>{{$section->title}}</option>
        @endforeach
    </select>
</div>


                                <div class="form-group">
                                    <label>Question</label>
                                    <textarea class="form-control" name="question">{{$question->question}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Option A</label>
                                    <input type="text" class="form-control" name="option_a" value="{{$question->option_a}}">
                                </div>

                                <div class="form-group">
                                    <label>Option B</label>
                                    <input type="text" class="form-control" name="option_b" value="{{$question->option_b}}">
                                </div>

                                <div class="form-group">
                                    <label>Option C</label>
                                    <input type="text" class="form-control" name="option_c" value="{{$question->option_c}}">
                                </div>

                                <div class="form-group">
                                    <label>Option D</label>
                                    <input type="text" class="form-control" name="option_d" value="{{$question->option_d}}">
                                </div>

                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <select class="form-control" name="correct_answer">
                                        <option {{$question->correct_answer == 'a' ? 'selected' : ''}} value="a">Option A</option>
                                        <option {{$question->correct_answer == 'b' ? 'selected' : ''}} value="b">Option B</option>
                                        <option {{$question->correct_answer == 'c' ? 'selected' : ''}} value="c">Option C</option>
                                        <option {{$question->correct_answer == 'd' ? 'selected' : ''}} value="d">Option D</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Marks</label>
                                    <input type="number" class="form-control" name="marks" value="{{$question->marks}}">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option {{$question->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                        <option {{$question->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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
