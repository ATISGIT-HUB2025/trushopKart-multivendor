<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolInfo extends Model
{
    protected $fillable = [
        'sr_no',
        'division',
        'district',
        'taluka', 
        'cluster',
        'udise',
        'school_name',
        'village_town'
    ];
}
