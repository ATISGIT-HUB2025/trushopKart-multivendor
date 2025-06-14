<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeritLIstRank extends Model
{
    use HasFactory;

    protected $table = 'merit_lIst_rank'; // Explicitly defining the table name

    protected $fillable = [
        'role',
        'rank',
        
    ];

  
    
}
