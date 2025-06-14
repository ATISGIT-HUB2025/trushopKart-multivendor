<!DOCTYPE html>
<html>
<head>
    <title>Exam Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .result-info {
            margin-bottom: 20px;
        }
        .result-summary {
            margin-top: 20px;
            padding: 15px;
            background: #f5f5f5;
            border-radius: 5px;
        }
        .status-passed {
            color: #28a745;
            font-weight: bold;
        }
        .status-failed {
            color: #dc3545;
            font-weight: bold;
        }
        .progress-container {
            margin: 20px 0;
            background: #f0f0f0;
            border: 1px solid #ddd;
            padding: 2px;
        }
        .progress-bar {
            background: #28a745;
            height: 20px;
            width: {{ $correctPercentage }}%;
        }
        .score-details {
    width: 100%;
    display: table;
    table-layout: fixed;
    margin-top: 20px;
}

.score-box {
    display: table-cell;
    text-align: center;
    padding: 10px;
    background: #f8f9fa;
    border: 1px solid #ddd;
    width: 33.33%;
}

    </style>
</head>
<body>
    <div class="header">
        <h2>Exam Result Certificate</h2>
        <p>Date: {{ $result->completed_at->format('d M Y') }}</p>
    </div>

    <div class="result-info">
        <h3>Student Information</h3>
        <p><strong>Name:</strong> {{ $result->user->name }}</p>
        <p><strong>Exam:</strong> {{ $result->exam->name }}</p>
        <p><strong>Status:</strong> 
            <span class="{{ $result->passed ? 'status-passed' : 'status-failed' }}">
                {{ $result->passed ? 'PASSED' : 'FAILED' }}
            </span>
        </p>
    </div>

    <div class="result-summary">
        <h3>Performance Summary</h3>
        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
        <p>Accuracy: {{ number_format($correctPercentage, 1) }}%</p>
        
        <div class="score-details">
            <div class="score-box">
                <h4>Total Questions</h4>
                <p>{{ $result->total_questions }}</p>
            </div>
            <div class="score-box">
                <h4>Correct Answers</h4>
                <p>{{ $result->correct_answers }}</p>
            </div>
            <div class="score-box">
                <h4>Wrong Answers</h4>
                <p>{{ $result->wrong_answers }}</p>
            </div>
        </div>
        
        <p><strong>Final Score:</strong> {{ $result->obtained_marks }}/{{ $result->exam->total_marks }}</p>
    </div>
</body>
</html>
