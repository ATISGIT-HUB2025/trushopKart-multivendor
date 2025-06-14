<!DOCTYPE html>
<html>
<head>
    <title>Exam Results</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2>Exam Results Report</h2>
    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Exam Name</th>
                <th>Total Questions</th>
                <th>Correct Answers</th>
                <th>Obtained Marks</th>
                <th>Status</th>
                <th>Completion Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{$result->user->name}}</td>
                <td>{{$result->exam->name}}</td>
                <td>{{$result->total_questions}}</td>
                <td>{{$result->correct_answers}}</td>
                <td>{{$result->obtained_marks}}</td>
                <td>{{$result->passed ? 'Passed' : 'Failed'}}</td>
                <td>{{$result->completed_at->format('d M Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
