<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'exam_id',
        'section_id',
        'question',
        'option_a',
        'option_b', 
        'option_c',
        'option_d',
        'correct_answer',
        'marks',
        'status'
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    // Add section relationship
public function section()
{
    return $this->belongsTo(ExamSection::class);
}

}
