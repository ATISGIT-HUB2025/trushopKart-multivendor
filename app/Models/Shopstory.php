<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopstory extends Model
{
    use HasFactory;
    
 protected $table = 'shop_story';
    protected $fillable = [
        'content',
    ];
}
