@extends('frontend.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Quiz Result</h3>
        </div>
        <div class="card-body">
            <h4>Score: {{ $result->obtained_marks }} / {{ $result->exam->total_marks }}</h4>
            <p>Correct Answers: {{ $result->correct_answers }}</p>
            <p>Wrong Answers: {{ $result->wrong_answers }}</p>
            <p>Status: {{ $result->passed ? 'Passed' : 'Failed' }}</p>
        </div>
    </div>
</div>
@endsection


