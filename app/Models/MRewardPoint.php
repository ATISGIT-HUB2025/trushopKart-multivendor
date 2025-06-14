<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MRewardPoint extends Model
{
    use HasFactory;

    protected $table = 'mreward_points';

    protected $fillable = [
        'user_id', 'scanner_wallet_id', 'transaction_id',
        'screenshot', 'points', 'point_rate', 'type', 'note','status','rupees'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getInrAmountAttribute()
    {
        return $this->points * $this->point_rate;
    }
    
}