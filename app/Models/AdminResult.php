<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminResult extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'exam_name',
        'standard',
        'logo',
        'logo_2',
        'heading',
        // 'sign',
        'director1_name',
        'director1_sign',
        'director2_name',
        'director2_sign',

    ];

    protected $casts = [
        'birth_date' => 'date',
    ];
    
}
