<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterHad extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_category_id',
        'name',
        'description',
        'duration',
        'total_marks',
        'pass_marks',
        'price',
        'is_paid',
        'is_certificate',
        'status',
        'conditions',
        'audio',
        'video',
        'is_upcoming',
        'start_date',
        'end_date',
        'subject',
        'standard', 
        'medium'
    ];

    protected $casts = [
        'is_upcoming' => 'boolean',
        'is_certificate' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        
    ];



    public function category()
    {
        return $this->belongsTo(ExamCategory::class, 'exam_category_id');
    }

    public function questions()
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function getTimeRemainingAttribute()
    {
        return now()->diffForHumans($this->start_date, ['parts' => 3]);
    }
}
