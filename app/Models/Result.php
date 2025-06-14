<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'exam_id', 
        'total_questions',
        'correct_answers',
        'wrong_answers',
        'obtained_marks',
        'passed',
        'answers',
        'completed_at'
    ];

    protected $casts = [
        'answers' => 'array',
        'completed_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}

