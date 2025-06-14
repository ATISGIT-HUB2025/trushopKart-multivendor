<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Winner Certificate</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Courgette&family=Dancing+Script:wght@400..700&family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&family=Pacifico&family=Satisfy&family=Yellowtail&display=swap");

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .certificate {
            width: 250mm;
            height: 330mm;
            margin-left: -35;
            margin-top: -23.5;
            padding: 0;
            background: white;
            text-align: center;
            background-image: url(5pp.png);
            background-repeat: no-repeat;
            background-size: 250mm 330mm;

        }

        .cert-logo img {
            width: 60px;
            margin: 150px 10px 0 0;

        }

        h1 {
            font-size: 25px;
            color: rgb(159, 33, 26);
            font-family: "Courgette", serif;
            text-transform: uppercase;
            margin: 10px 0;
            font-weight: bold;
        }

        h2 {
            font-size: 18px;
            color: red;
            margin: 5px 0;
        }

        p {
            font-size: 14px;
            margin: 15px 0;
            text-align: left;
            font-weight: 400;
        }

        .name {
            color: rgb(36, 9, 8);
            font-size: 22px;
            font-weight: bold;
            text-align: center;
        }

        .cert-form {
            width: 80%;
            margin: 0px auto;
            border: none !important;
        }

        .cert-form table {
            border-collapse: collapse;
            border: none !important;
        }

        .cert-form td {
            padding: 8px;
            vertical-align: top;
            border: none !important;
        }

        .cert-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 13px;
        }

        .cert-form input {
            height: 25px;
            padding: 2px 5px;
        }



        .table-container {
            margin-top: 30px;
        }

        table {
            width: 75%;
            border-collapse: collapse;
            margin-top: 20px;
            margin: 0 auto;
        }

        table,
        th,
        td {
            border: 2px solid black;
        }

        th,
        td {
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="certificate">
        <div class="cert-logo">

            @php
            $path = public_path('1.jpeg');
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            @endphp
            <img src="{{ $base64 }}" alt="Logo" />

            @php
            $path = public_path('iw2.png');
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            @endphp
            <img src="{{ $base64 }}" alt="Award Icon" />




        </div>

        <h1 style="margin-top: -30px;">Certificate</h1>
        <h2>DHYEYA PRAKASHAN ACADEMY MAHARASHTRA</h2>
        <h2 style="margin-bottom: 25px">I AM WINNER STATE LEVEL EXAM 2025</h2>

        <p style="margin-left: 90">This is to certify that,</p>
        <p class="name">{{ $primaryResult->name }}</p>

        <hr style="width: 75%;" />

        <!-- First form section -->
        <div class="cert-form">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 33%;">
                        <label>Unique ID</label>
                        <input type="text" style="width: 90%;" value="{{ $primaryResult->barcode }}" readonly>
                    </td>
                    <td style="width: 33%;">
                        <label>District</label>
                        <input type="text" style="width: 90%;" value="{{ $primaryResult->district }}" readonly>
                    </td>
                    <td style="width: 33%;">
                        <label>Taluka</label>
                        <input type="text" style="width: 90%;" value="{{ $primaryResult->taluka }}" readonly>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;" colspan="2">
                        <label>Class</label>
                        <input type="text" style="width: 90%;" value="{{ $primaryResult->std }}" readonly>
                    </td>
                    <td style="width: 50%;">
                        <label>Medium</label>
                        <input type="text" style="width: 90%;" value="{{ $primaryResult->medium }}" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label>School</label>
                        <input type="text" style="width: 95%;" value="{{ $primaryResult->school_name }}" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label>Center</label>
                        <input type="text" style="width: 95%;" value="{{ $primaryResult->exam_centre }}" readonly>
                    </td>
                </tr>
            </table>
        </div>




        <p style=" width:80%; margin: 0 auto; text-align: center">
            has successfully participated in the I Am Winner State Level Exam on
            this day of 05/01/2025. Awarded by Dhyeya Prakashan Academy.
        </p>

        <!-- Table Section -->
        <div class="table-container">
            <table>
                <tr>
                    <th>PAPER</th>
                    <th>MAX. MARKS</th>
                    <th>OBTAINED MARKS</th>
                    <th>PERCENTAGE %</th>
                    <th>RANKS</th>
                    <th>RANKING</th>
                </tr>


                <tr>
                    <td>Paper 1</td>
                    <td>100</td>
                    <td>{{ $primaryResult->first_paper }}</td>
                    <td rowspan="4">{{ $primaryResult->percentage }}%</td>
                    <th>STATE</th>
                    <td>{{ $primaryResult->state_merit }}</td>
                </tr>
                <tr>
                    <td>Paper 2</td>
                    <td>100</td>
                    <td>{{ $primaryResult->second_paper }}</td>
                    <th>DIVISION</th>
                    <td>{{ $primaryResult->division_merit }}</td>
                </tr>
                <tr>
                    <th colspan="2">TOTAL</th>
                    <td>{{ $primaryResult->total_marks }}</td>
                    <th>DISTRICT</th>
                    <td>{{ $primaryResult->district_merit }}</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <th>CENTER</th>
                    <td>{{ $primaryResult->center_merit }}</td>
                </tr>


            </table>
        </div>

        <div style="width: 80%; margin-left:110px">
            <p>Congratulations!</p>

            <p>
                We are proud to recognize your outstanding performance in the I Am
                Winner State Level Exam. Your dedication, hard work, and perseverance
                have led you to this remarkable achievement. May this success be the
                foundation for even greater accomplishments in your academic journey and
                beyond. Keep striving for excellence and never stop learning! Best
                wishes for a bright and successful future!
            </p>

        </div>



        <!-- Signature Section -->
        <!-- Signature Section -->
        <div style="width: 100%; text-align: center; margin-top: 20px;">
            <!-- First Group -->
            <div style="display: inline-block; width: 25%; margin-top:20px; text-align: center; vertical-align: top; margin: 0 60px;">
                <div style="margin: 0 10px;">
                    <img src="12.png" alt="" style="width: 150px;" />
                </div>
                <div style="width: 100%; border-top: 2px solid black; padding-top: 5px; font-size: 14px;">
                    I AM WINNER EXAM<br />(ADMINISTRATOR)
                </div>
            </div>
            <!-- Second Group -->
            <div style="display: inline-block; width: 25%; text-align: center; vertical-align: top; margin: 0 80px;">
                <div style="margin: 0 10px;">
                    <img src="13.png" alt="" style="width: 150px;" />
                </div>
                <div style="width: 100%; border-top: 2px solid black; padding-top: 5px; font-size: 14px;">
                    DHYEYA PRAKASHAN ACADEMY<br />(DIRECTOR)
                </div>
            </div>
        </div>





    </div>
</body>

</html>