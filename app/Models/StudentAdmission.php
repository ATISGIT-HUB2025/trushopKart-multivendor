<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAdmission extends Model
{
    protected $fillable = [
        'teacher_id',
        'user_type',
        'division',
        'sr_no',
        'district',
        'taluka',
        'cluster',
        'exam_center',
        'name',
        'gender',
        'birth_date',
        'std',
        'medium',
        'school_name',
        'udise_no_school',
        'student_serial_id',
        'parent_mobile_number',
        'teacher_mobile_number',
        'barcode',
        'seat_no',
        'paper_1',
        'paper_2'
    ];

    protected $casts = [
        'birth_date' => 'date'
    ];
}
