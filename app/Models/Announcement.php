<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'icon',
        'announcement_date',
        'location',
        'link',
        'is_active'
    ];

    protected $casts = [
        'announcement_date' => 'datetime',
        'is_active' => 'boolean'
    ];

    // Scope to get active announcements
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope to filter by type
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
