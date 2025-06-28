<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Str;




class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'created_by',
        'status',
        'unique_id',
        'original_password',
        'student_id',
        'refer_by',
        'refer_code',
        'bank_details'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


public function referrals()
{
    return $this->hasMany(User::class, 'refer_by', 'refer_code');
}


public static function generateReferCode()
{
    do {
        $code = strtolower(Str::random(7));
    } while (
        !preg_match('/[a-z]/', $code) || // must contain at least one letter
        !preg_match('/[0-9]/', $code) || // must contain at least one number
        self::where('refer_code', $code)->exists()
    );

    return $code;
}


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function vendor()
    {
        return $this->hasOne(Vendor::class);
    }

    public static function generateStudentId()
    {
        $year = date('y');
        $lastUser = self::orderBy('id', 'desc')->first();

        if (!$lastUser) {
            $number = 1;
        } else {
            $lastId = substr($lastUser->student_id, -4);
            $number = intval($lastId) + 1;
        }

        return $year . str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public function admition()
    {
        return $this->belongsTo(Admission::class, 'email');
    }


    public function mrewardPoints()
{
    return $this->hasMany(MRewardPoint::class);
}

public function getWalletPointsAttribute()
{
    return $this->mrewardPoints()
        ->where('status', 'approved')
         ->where('note', '!=', 'referral_bonus') 
        ->get()
        ->sum(function ($txn) {
            return $txn->type === 'credit' ? $txn->points : -$txn->points;
        });
}


// public function getWalletValueInrAttribute()
// {
//     return $this->mrewardPoints()
//         ->where('status', 'approved')
//         ->where('note', '!=', 'referral_bonus') 
//         ->get()
//         ->sum(function ($txn) {
//             $value = $txn->points * $txn->point_rate;
//             return $txn->type === 'credit' ? $value : -$value;
//         });
// }

public function getWalletValueInrAttribute()
{
 

    $totalRupees = $this->mrewardPoints()
           ->where('status', 'approved')
           ->where('type', 'credit')
        ->where('note', '!=', 'referral_bonus') 
        ->sum('rupees');

        $debitAmount = $this->mrewardPoints()
           ->where('status', 'approved')
           ->where('type', 'debit')
           ->where('note', '!=', 'referral_bonus')
           ->sum('rupees');

    return ceil($totalRupees - $debitAmount);
}



public function getEffectiveMPointRate()
{
    $credits = $this->mrewardPoints()
        ->where('status', 'approved')
        ->where('type', 'credit')
        ->where('note', '!=', 'referral_bonus')
        ->get();

    if ($credits->isEmpty()) {
        return \App\Models\GeneralSetting::first()->mpoint_value ?? 1.5;
    }

    $totalValue = $credits->sum(fn ($txn) => $txn->points * $txn->point_rate);
    $totalPoints = $credits->sum('points');

    return $totalPoints > 0 ? round($totalValue / $totalPoints, 2) : 1.5;
}





public function getReferWalletPointsAttribute()
{
    return $this->mrewardPoints()
        ->where('status', 'approved')
        ->where('note', 'referral_bonus')
        ->get()
        ->sum(function ($txn) {
            return $txn->type === 'credit' ? $txn->points : -$txn->points;
        });
}


// public function getReferWalletPointsAttribute()
// {
//     return $this->mrewardPoints()
//         ->where('status', 'approved')
//         ->where('note', 'referral_bonus')
//         ->get()
//         ->sum(function ($txn) {
//               $value = $txn->points * $txn->point_rate;
//             return $txn->type === 'credit' ? $value : -$value;
//         });
// }





}