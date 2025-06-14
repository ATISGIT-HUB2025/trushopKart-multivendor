<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamCategory extends Model

{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'logo',
        'description',
        'exam_date',
        'duration',
        'medium',
        'total_marks',
        'eligibility',
        'mode',
        'serial',
        'status'
    ];
}
