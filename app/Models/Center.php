<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $fillable = ['name', 'total_seats', 'status'];
}
