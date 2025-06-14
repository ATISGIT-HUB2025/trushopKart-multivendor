<!DOCTYPE html>
<html lang="en">
<head>
    <title>Exam Questions PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        h2 {
            text-align: center;
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            vertical-align: top;
            padding: 10px;
        }
        .question {
            width: 80%;
        }
        .marks {
            width: 20%;
            text-align: right;
            font-weight: bold;
        }
        .option-label {
            display: flex;
            align-items: center;
        }
        .option-label input {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h2>Exam Questions</h2>

    <table>
        @foreach($questions as $index => $question)
            <tr>
                <td class="question">
                    <p><strong>Q.{{ $index + 1 }}</strong> {{ $question->question }}</p>
                    <div class="options">
                        <label class="option-label"><input type="checkbox"> a) {{ $question->option_a }}</label>
                        <label class="option-label"><input type="checkbox"> b) {{ $question->option_b }}</label>
                        <label class="option-label"><input type="checkbox"> c) {{ $question->option_c }}</label>
                        <label class="option-label"><input type="checkbox"> d) {{ $question->option_d }}</label>
                    </div>
                </td>
                <td class="marks">{{ $question->marks }} - Marks</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
