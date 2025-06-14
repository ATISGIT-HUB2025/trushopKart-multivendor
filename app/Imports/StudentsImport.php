<?php

namespace App\Imports;

use App\Models\StudentAdmission;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    private $teacherId;

    public function __construct($teacherId)
    {
        $this->teacherId = $teacherId;
    }

    public function model(array $row)
    {
        // Log::info($row); 
        return new StudentAdmission([
            'teacher_id' => $this->teacherId,
            'user_type' => $row['user_type'],
            'division' => $row['division'],
            'sr_no' => $row['srno'],
            'district' => $row['district'],
            'taluka' => $row['taluka'],
            'cluster' => $row['cluster'],
            'exam_center' => $row['exam_centre'],
            'name' => $row['name'],
            'gender' => $row['mf'],
            'birth_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['birth_date']),
            'std' => $row['std'],
            'medium' => $row['medium'],
            'school_name' => $row['school_name'],
            'udise_no_school' => $row['udise_no_school'],
            'student_serial_id' => $row['student_sarial_id'],
            'parent_mobile_number' => $row['parent_mobile_number'],
            'teacher_mobile_number' => $row['teacher_mobile_number'],
            'barcode' => $row['barcode'],
            'seat_no' => $row['seat_no'],
            'paper_1' => $row['paper_1'],
            'paper_2' => $row['paper_2']
        ]);
    }
}
