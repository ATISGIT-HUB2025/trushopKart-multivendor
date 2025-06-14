<?php

namespace App\Imports;

use App\Models\SchoolForVisiting;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SchoolForVisitingImport implements ToModel, WithHeadingRow
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function model(array $row)
    {
        Log::info($row); 

        // echo "<pre>"; print_r($row);die;
        return new SchoolForVisiting([
        'created_by'=>$this->id,
        'date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date'])->format('Y-m-d'),
        'visit_sr_no' => $row['visit_sr_no'],
        'traveling_start_time' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['start_time_traveling'])->format('H:i'),
         'traveling_end_time' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['end_time_traveling'])->format('H:i'),
        'district' => $row['district'],
        'taluka' => $row['taluka'],
        'village' => $row['village'],
        'school_name' => $row['school_name'],
        'udise_no' => $row['udise_no'],
        'hm_name' => $row['hm_name'],
        'mobile_no' => $row['mobile_no'],
        'total_students' => $row['total_students'],
        'std_marathi' => $row['std_marathi'],
        'std_semi' => $row['std_semi'],
        'std_english' => $row['std_english'],
        'final_marathi' => $row['final_marathi'],
        'final_semi' => $row['final_semi'],
        'final_english' => $row['final_english'],
        'total_bill' => $row['total_bill'],
        'online_bill' => $row['online_bill'],
        'cash_bill' => $row['cash_bill'],
        ]);
    }
}
