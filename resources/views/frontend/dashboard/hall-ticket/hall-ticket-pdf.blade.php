<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Ticket</title>
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
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            position: relative;
            width: 100%;
            margin-bottom: 30px;
            height: 120px;
        }

        .logo-left {
            position: absolute;
            left: 0;
            top: 0;
            width: 80px;
            height: 80px;
        }

        .logo-right {
            position: absolute;
            right: 0;
            top: 0;
            width: 80px;
            height: 80px;
        }

        .header-center {
            width: 70%;
            margin: 0 auto;
            text-align: center;
            padding: 0 120px;
            margin-left: -25px;
        }

        .text-danger {
            color: #dc3545;
        }

        .content-row {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }

        .photo-box {
            border: 1px dotted #000;
            width: 200px;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            margin: 0 auto;
            margin-bottom: 35px;
        }

        .student-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;

        }

        .details-section {
            flex: 1;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .table-info {
            background-color: #e3f2fd;
        }

        .instructions {
            border: 1px solid #000;
            padding: 15px;
            margin: 20px 0;
        }

        .instructions h6 {
            background-color: #e3f2fd;
            text-align: center;
            font-weight: bold;
            padding: 8px;
            margin: 0;
            font-size: 15px;
        }

        .instructions ol {
            margin: 0;
            padding-left: 20px;
        }

        .instructions li {
            margin-bottom: 8px;
        }

        .signature {
            text-align: right;
            margin-top: 30px;
        }

        h3 {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img class="logo-left" src="{{ public_path('frontend/images/1.png') }}" alt="Logo">
            <div class="header-center">
                <h3 class="text-danger">Dhyeya Prakashan Academy Maharashtra Operated</h3>
                <h3>"I Am Winner" State-Level Competition Exam 2024</h3>
                <h3>Admit Card</h3>
            </div>
            <img class="logo-right" src="{{ public_path('frontend/images/2.png') }}" alt="Logo">
        </div>

        <div class="content-row">
            <div class="photo-box">
                @if($user->image)
                <img class="student-photo" src="{{ public_path($user->image) }}" alt="Student Photo">
                @else
                <h6>Student Photograph</h6>
                @endif
            </div>
            <div class="details-section">
                <table class="table">
                    <tr>
                        <th width="20%">Unique ID:</th>
                        <td width="30%">{{ $user->student_id ?? '8040370049' }}</td>
                        <th width="20%">Seat No:</th>
                        <td width="30%">804037024001</td>
                    </tr>
                    <tr>
        <th>Student Name:</th>
        <td>{{ $admission->full_name ?? $user->name }}</td>
        <th>Gender:</th>
        <td>{{ $admission->gender ?? 'N/A' }}</td>
    </tr>
    <tr>
        <th>Medium:</th>
        <td>{{ $admission->medium ?? 'English' }}</td>
        <th>Class:</th>
        <td>{{ $admission->standard ?? '1st' }}</td>
    </tr>
    
    <tr>
        <th>District:</th>
        <td>{{ $admission->district ?? 'N/A' }}</td>
        <th>Taluka:</th>
        <td>{{ $admission->taluka ?? 'N/A' }}</td>
    </tr>
    <tr>
        <th>School Name:</th>
        <td colspan="3">{{ $admission->school_name ?? 'N/A' }}</td>
    </tr>
    <tr>
        <th>Exam Center:</th>
        <td colspan="3">{{ $center->name ?? 'N/A' }}</td>
    </tr>
                </table>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr class="table-info">
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

        <div class="instructions">
            <h6>Instructions</h6>
            <ol>
                <li>Candidates should report to the exam hall 30 minutes before the start of each paper with their admit card.</li>
                <li>Carefully read all the instructions printed on the answer sheet and question paper cover before starting to write answers.</li>
                <li>Use only a blue or black ballpoint pen for marking answers.</li>
                <li>Ensure the answer sheet is not torn or crumpled as it will be scanned for evaluation.</li>
                <li>Marks will not be awarded for answers marked on torn or incomplete answer sheets.</li>
            </ol>
            <h6 style="background: none; border: none; text-align: left;">Note: Admissions for the 2024-25 academic year will begin on February 12. Free basic guidance courses in English and Mathematics will be conducted in April-May 2024 for these students.</h6>
        </div>


        <div class="signature">
            <h6 style="margin-bottom: 5px;">Coordinator</h6>
            <h6 style="margin-top: 0;">"I Am Winner" State-Level Competition Exam</h6>
        </div>
    </div>
</body>

</html>