<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoShop extends Model
{
    use HasFactory;


    protected $table = 'photo_gallery';
    protected $fillable = [
        'image',
        'status',
    ];
}
