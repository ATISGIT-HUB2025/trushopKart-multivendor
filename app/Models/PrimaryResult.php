<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_type',
        'admin_result_id',
        'state',
        'division',
        'sr_no',
        'district',
        'taluka', 
        'cluster',
        'exam_centre',
        'name',
        'gender',
        'birth_date',
        'std',
        'medium',
        'school_name',
        'udise_no',
        'student_saral_id',
        'parent_mobile',
        'teacher_mobile',
        'barcode',
        'seat_no',
        'first_paper',
        'second_paper',
        'total_marks',
        'percentage',

        'state_merit',
        'division_merit',
        'district_merit',
        'taluka_merit',
        'center_merit',
        'state_rank',
        'division_rank',
        'district_rank',
        'taluka_rank',
        'center_rank'
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];
    
}
