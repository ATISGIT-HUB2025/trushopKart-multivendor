<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class SchoolForVisiting extends Model
{
    protected $table = 'school_for_visiting'; // Ensure this matches the actual table name

    use HasApiTokens, HasFactory, Notifiable;
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'created_by',
        'date',
        'visit_sr_no',
        'traveling_start_time',
        'traveling_end_time',
        'district',
        'taluka',
        'village',
        'school_name',
        'udise_no',
        'hm_name',
        'mobile_no',
        'total_students',
        'std_marathi',
        'std_semi',
        'std_english',
        'final_marathi',
        'final_semi',
        'final_english',
        'total_bill',
        'online_bill',
        'cash_bill',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    
   
}
