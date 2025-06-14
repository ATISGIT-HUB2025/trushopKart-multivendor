<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>certificate</title>

    <link
        rel="stylesheet"
        href="file://{{ public_path('frontend/css/certificate_pdf.css') }}"
        type="text/css" />

</head>

<body>




<div class="result_top_box">
    <div class="logo-container">
        @php
        use App\Models\AdminResult;
        $path = public_path('frontend/images/l1.jpeg');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $masterInfo = AdminResult::where('id',$primaryResult->admin_result_id)->first();
            function getBase64Image($imagePath) {
                $fullPath = public_path($imagePath);
                if (file_exists($fullPath) && !empty($imagePath)) {
                    $type = pathinfo($fullPath, PATHINFO_EXTENSION);
                    $data = file_get_contents($fullPath);
                    return 'data:image/' . $type . ';base64,' . base64_encode($data);
                }
                return ''; 
            }

        $base64Logo = getBase64Image(@$masterInfo->logo ?: 'default_logo.png');
        $base64AdminSig = getBase64Image(@$masterInfo->administrator_signature);
        $base64DirectorSig = getBase64Image(@$masterInfo->director_signature);
        @endphp
        <img src="{{ $base64Logo }}" alt="logo" />
    </div>
    <div class="text-container">
        <h4 class="managed-by">Managed By</h4>
        <h3 class="academy-name">
        {{$masterInfo->heading ?? ''}}
           
        </h3>
    </div>
</div>







<div class="student_info">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Name</th>
                <td>:</td>
                <td colspan="4">{{ $primaryResult->name }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>:</td>
                <td>{{ $primaryResult->gender }}</td>
                <th>Medium</th>
                <td>:</td>
                <td>{{ $primaryResult->medium }}</td>
            </tr>
            <tr>
                <th>Standard</th>
                <td>:</td>
                <td>{{ $primaryResult->std }}</td>
                <th>Seat No.</th>
                <td>:</td>
                <td>{{ $primaryResult->seat_no }}</td>
            </tr>
            <tr>
                <th>Taluka</th>
                <td>:</td>
                <td>{{ $primaryResult->taluka }}</td>
                <th>District</th>
                <td>:</td>
                <td>{{ $primaryResult->district }}</td>
            </tr>
            <tr>
                <th>School Name</th>
                <td>:</td>
                <td colspan="4">{{ $primaryResult->school_name }}</td>
            </tr>
            <tr>
                <th>Exam Centre</th>
                <td>:</td>
                <td colspan="4">{{ $primaryResult->exam_centre }}</td>
            </tr>
            <tr>
                <th>Barcode</th>
                <td>:</td>
                <td colspan="4">{{ $primaryResult->barcode }}</td>
            </tr>
        </tbody>
    </table>
</div>



    <div class="student_result" style="border: 1px solid red; padding: 15px;">
        <table class="table">
            <thead>
                <tr>
                    <th>Paper-1</th>
                    <th>Paper-2</th>
                    <th>Total</th>
                    <th>Percentage</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                @php
                // Fetch percentage
                $percentage = $primaryResult->percentage;

                // Calculate grade based on percentage
                $grade = '';
                if ($percentage >= 90) {
                $grade = 'A+';
                } elseif ($percentage >= 80) {
                $grade = 'A';
                } elseif ($percentage >= 70) {
                $grade = 'B+';
                } elseif ($percentage >= 60) {
                $grade = 'B';
                } elseif ($percentage >= 50) {
                $grade = 'C+';
                } elseif ($percentage >= 40) {
                $grade = 'C';
                } else {
                $grade = 'F';
                }
                @endphp
                <tr>
                    <td>{{ $primaryResult->first_paper }}</td>
                    <td>{{ $primaryResult->second_paper }}</td>
                    <td>{{ $primaryResult->total_marks }}</td>
                    <td>{{ $primaryResult->percentage }}%</td>
                    <td>{{ $grade }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>