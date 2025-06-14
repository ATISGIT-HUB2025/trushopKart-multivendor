<!DOCTYPE html>
<html>
<head>
    <title>Admission Details</title>
    <style>
        body { 
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .header { 
            text-align: center; 
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .details { 
            margin-bottom: 20px; 
        }
        .row { 
            margin: 10px 0;
            padding: 5px 0;
        }
        .label { 
            font-weight: bold;
            min-width: 150px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Admission Details</h2>
    </div>
    
    <div class="details">
        <div class="row">
            <span class="label">Full Name:</span> {{$admission->full_name}}
        </div>
        <div class="row">
            <span class="label">Date of Birth:</span> {{$admission->date_of_birth->format('d/m/Y')}}
        </div>
        <div class="row">
            <span class="label">State:</span> {{$admission->state}}
        </div>
        <div class="row">
            <span class="label">District:</span> {{$admission->district}}
        </div>
        <div class="row">
            <span class="label">Taluka:</span> {{$admission->taluka}}
        </div>
        <div class="row">
            <span class="label">Cluster:</span> {{$admission->cluster}}
        </div>
        <div class="row">
            <span class="label">School Name:</span> {{$admission->school_name}}
        </div>
        <div class="row">
            <span class="label">Medium:</span> {{$admission->medium}}
        </div>
        <div class="row">
            <span class="label">Standard:</span> {{$admission->standard}}
        </div>
        <div class="row">
            <span class="label">Email:</span> {{$admission->email}}
        </div>
        <div class="row">
            <span class="label">Gender:</span> {{$admission->gender}}
        </div>
        <div class="row">
            <span class="label">Parent Mobile:</span> {{$admission->parent_mobile}}
        </div>
        <div class="row">
            <span class="label">Teacher Mobile:</span> {{$admission->teacher_mobile}}
        </div>
        <div class="row">
            <span class="label">Selected Exam:</span> {{$admission->selected_exam}}
        </div>
        <div class="row">
            <span class="label">Exam Type:</span> {{$admission->exam_type}}
        </div>
        <div class="row">
            <span class="label">Division:</span> {{$admission->division}}
        </div>
        <div class="row">
            <span class="label">SR No:</span> {{$admission->sr_no}}
        </div>
        <div class="row">
            <span class="label">UDISE School No:</span> {{$admission->udise_no_school}}
        </div>
        <div class="row">
            <span class="label">Student Serial ID:</span> {{$admission->student_serial_id}}
        </div>
        <div class="row">
            <span class="label">Seat No:</span> {{$admission->seat_no}}
        </div>
        <div class="row">
            <span class="label">Paper 1:</span> {{$admission->paper_1}}
        </div>
        <div class="row">
            <span class="label">Paper 2:</span> {{$admission->paper_2}}
        </div>
        <div class="row">
            <span class="label">Payment Status:</span> {{$admission->payment_status}}
        </div>
        <div class="row">
            <span class="label">Transaction ID:</span> {{$admission->transaction_id}}
        </div>
        <div class="row">
            <span class="label">Status:</span> {{$admission->status}}
        </div>
        <div class="row">
            <span class="label">Admission Fee:</span> {{number_format($admission->admission_fee, 2)}}
        </div>
        <div class="row">
            <span class="label">Additional Fee:</span> {{number_format($admission->additional_fee, 2)}}
        </div>
        <div class="row">
            <span class="label">Total Fee:</span> {{number_format($admission->total_fee, 2)}}
        </div>
    </div>
</body>
</html>
