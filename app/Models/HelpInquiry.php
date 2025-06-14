<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpInquiry extends Model
{
    protected $fillable = [
        'category',
        'full_name', 
        'email',
        'mobile',
        'subject',
        'message',
        'is_read'
    ];
}
