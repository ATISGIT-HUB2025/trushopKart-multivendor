<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressRelease extends Model
{
    use HasFactory;

    protected $table = 'press_release';
    protected $fillable = [
        'title',
        'short_desc',
        'image',
        'status',
    ];
}
