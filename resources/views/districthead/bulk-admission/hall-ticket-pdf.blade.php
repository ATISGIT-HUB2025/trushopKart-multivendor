<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 15px;
        }
        .container {
            border: 3px solid #000;
            padding: 20px;
            margin-bottom: 20px;
            page-break-after: always;
        }
        .header {
            position: relative;
            width: 100%;
            margin-bottom: 30px;
            /* height: 120px; */
        }
        .header-center {
            text-align: center;
            /* padding: 0 120px; */
        }
        .photo-box {
            border: 1px dotted #000;
            width: 150px;
            height: 150px;
            margin: 0 auto;
            margin-bottom: 20px;
            text-align: center;
            line-height: 150px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
        }
        .signature {
            text-align: right;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    @foreach($students as $student)
    <div class="container">
        <div class="header">
            <div class="header-center">
                <h3 style="color: #dc3545">Dhyeya Prakashan Academy Maharashtra Operated</h3>
                <h3>"I Am Winner" State-Level Competition Exam 2024</h3>
                <h3>Hall Ticket</h3>
            </div>
        </div>

        <div class="photo-box">
            Student Photo
        </div>

        <table class="table">
            <tr>
                <th width="30%">Student ID:</th>
                <td>{{ $student->student_id }}</td>
            </tr>
            <tr>
                <th>Full Name:</th>
                <td>{{ $student->full_name }}</td>
            </tr>
            <tr>
                <th>Date of Birth:</th>
                <td>{{ $student->birth_date->format('d M, Y') }}</td>
            </tr>
            <tr>
                <th>School:</th>
                <td>{{ $student->school_name }}</td>
            </tr>
            <tr>
                <th>Standard:</th>
                <td>{{ $student->standard }}</td>
            </tr>
            <tr>
                <th>Center:</th>
                <td>{{ $student->center_name }}</td>
            </tr>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th>Exam Date</th>
                    <th>Time</th>
                    <th>Paper</th>
                    <th>Subjects</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>11/02/2024</td>
                    <td>11:00 AM to 12:30 PM</td>
                    <td>1</td>
                    <td>English & Mathematics</td>
                </tr>
                <tr>
                    <td>11/02/2024</td>
                    <td>1:30 PM to 3:00 PM</td>
                    <td>2</td>
                    <td>General Knowledge & Intelligence</td>
                </tr>
            </tbody>
        </table>

        <div class="signature">
            <p>Coordinator<br>
            "I Am Winner" State-Level Competition Exam</p>
        </div>
    </div>
    @endforeach
</body>
</html>
