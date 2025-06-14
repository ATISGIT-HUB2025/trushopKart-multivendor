<!DOCTYPE html>
<html>
<head>
    <title>Merit List</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h2 { margin-bottom: 5px; }
        .header p { margin-top: 0; color: #777; }
        .merit-badge { 
            display: inline-block; 
            padding: 3px 6px; 
            border-radius: 3px; 
            font-size: 11px;
            margin-bottom: 2px;
        }
        .state { background-color: #f8d7da; }
        .division { background-color: #d4edda; }
        .district { background-color: #d1ecf1; }
        .taluka { background-color: #cce5ff; }
        .center { background-color: #fff3cd; }
    </style>
</head>
<body>
    <div class="header">
        <h2>DPAM Merit List</h2>
        <p>Generated on: {{ date('d-m-Y') }}</p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>Std</th>
                <th>District</th>
                <th>Percentage</th>
                <th>Merit Achievement</th>
            </tr>
        </thead>
        <tbody>
            @foreach($meritStudents as $student)
            <tr>
                <td>{{ $student->name ?? '-' }}</td>
                <td>{{ $student->barcode ?? '-' }}</td>
                <td>{{ $student->std ?? '-' }}</td>
                <td>{{ $student->district ?? '-' }}</td>
                <td>{{ $student->percentage ?? '0' }}%</td>
                <td>
                    @if($student->state_merit)
                        <div class="merit-badge state">State Rank: {{ $student->state_rank }}</div>
                    @endif
                    
                    @if($student->division_merit)
                        <div class="merit-badge division">Division Rank: {{ $student->division_rank }}</div>
                    @endif
                    
                    @if($student->district_merit)
                        <div class="merit-badge district">District Rank: {{ $student->district_rank }}</div>
                    @endif
                    
                    @if($student->taluka_merit)
                        <div class="merit-badge taluka">Taluka Rank: {{ $student->taluka_rank }}</div>
                    @endif
                    
                    @if($student->center_merit)
                        <div class="merit-badge center">Center Rank: {{ $student->center_rank }}</div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
