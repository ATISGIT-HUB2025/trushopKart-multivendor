@extends('teacher.layouts.master')

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('teacher.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <div class="section-header d-flex justify-content-between align-items-center">
                        <h3><i class="fas fa-file-alt"></i> {{$exam->name}}</h3>
                        <a href="{{ route('teacher.exam.index') }}" class="btn btn-primary">Back to Exams</a>
                    </div>

                    <!-- Exam Details Card -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Exam Overview</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-md-3 col-sm-6">
                                    <div class="border rounded p-3 text-center">
                                        <i class="fas fa-clock fa-2x mb-2 text-primary"></i>
                                        <h5>Duration</h5>
                                        <p class="mb-0">{{$exam->duration}} Minutes</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="border rounded p-3 text-center">
                                        <i class="fas fa-star fa-2x mb-2 text-warning"></i>
                                        <h5>Total Marks</h5>
                                        <p class="mb-0">{{$exam->total_marks}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="border rounded p-3 text-center">
                                        <i class="fas fa-check-circle fa-2x mb-2 text-success"></i>
                                        <h5>Pass Marks</h5>
                                        <p class="mb-0">{{$exam->pass_marks}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="border rounded p-3 text-center">
                                        <i class="fas fa-dollar-sign fa-2x mb-2 text-info"></i>
                                        <h5>Price</h5>
                                        <p class="mb-0">${{$exam->price}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Questions Section -->
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h4 class="mb-0">Questions ({{$exam->questions->count()}})</h4>
                        </div>
                        <div class="card-body">
                            @foreach($exam->questions as $key => $question)
                            <div class="question-wrapper mb-4 p-4 border rounded shadow-sm">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="question-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mr-2" style="width: 25px; height: 25px;">
                                        {{$key + 1}}
                                    </div>
                                    <h5 class="mb-0 ms-3">{{$question->question}}</h5>
                                </div>

                                <div class="options-wrapper ms-5">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="option-item p-3 border rounded mb-2 @if($question->correct_answer == 'a') border-success bg-light @endif">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" disabled @if($question->correct_answer == 'a') checked @endif>
                                                    <label class="form-check-label">
                                                        A) {{$question->option_a}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="option-item p-3 border rounded mb-2 @if($question->correct_answer == 'b') border-success bg-light @endif">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" disabled @if($question->correct_answer == 'b') checked @endif>
                                                    <label class="form-check-label">
                                                        B) {{$question->option_b}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="option-item p-3 border rounded mb-2 @if($question->correct_answer == 'c') border-success bg-light @endif">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" disabled @if($question->correct_answer == 'c') checked @endif>
                                                    <label class="form-check-label">
                                                        C) {{$question->option_c}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="option-item p-3 border rounded mb-2 @if($question->correct_answer == 'd') border-success bg-light @endif">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" disabled @if($question->correct_answer == 'd') checked @endif>
                                                    <label class="form-check-label">
                                                        D) {{$question->option_d}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="question-footer mt-3 ms-5">
                                    <span class="badge text-white bg-primary">Marks: {{$question->marks}}</span>
                                    <span class="badge bg-success ms-2">Correct Answer: Option {{strtoupper($question->correct_answer)}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .question-wrapper:hover {
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }

    .option-item:hover {
        transform: translateX(5px);
        transition: all 0.3s ease;
    }
</style>
@endpush
@endsection
