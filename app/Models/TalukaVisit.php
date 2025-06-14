<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TalukaVisit extends Model
{
    protected $fillable = [
        'school_name',
        'total_book_order',
        'total_book_payment',
        'total_admission',
        'total_admission_payment'
    ];
}
