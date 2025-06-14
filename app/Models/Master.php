<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    protected $table = 'masters'; // Explicitly defining the table name

    protected $fillable = [
        'logo',
        'heading',
        'result_logo',
        'result_heading',
        'administrator_signature',
        'administrator_name',
        'director_signature',
        'director_name',
    ];
}
