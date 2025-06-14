<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $table = 'standards'; // Ensure this matches the actual table name

    use HasApiTokens, HasFactory, Notifiable;
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'standard',
        'start_date',
        'end_date',
        'fees',
    ];

    public function admitions()
    {
        return $this->hasMany(Admission::class, 'standard_id');
    }
   
}
