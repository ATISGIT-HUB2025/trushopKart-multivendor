<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'start_datetime',
        'end_datetime',
        'location',
        'organizer',
        'image',
        'video_url',
        'description',
        'status'
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime'
    ];

    public function participants()
{
    return $this->hasMany(EventParticipant::class);
}

}
