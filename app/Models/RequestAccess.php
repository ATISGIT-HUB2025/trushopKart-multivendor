<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestAccess extends Model
{
    use HasFactory;

    protected $table = 'request_access';

    protected $fillable = [
        'name',
        'lname',
        'email',
        'mobile',
        'address',
        'subject',
        'details',
        'comment',
        'status',
    ];

    // const STATUS_SENT = 0;
    // const STATUS_APPROVED = 1;
    // const STATUS_REJECTED = 2;

    // public static function getStatusOptions()
    // {
    //     return [
    //         self::STATUS_SENT => 'Request Sent',
    //         self::STATUS_APPROVED => 'Approved',
    //         self::STATUS_REJECTED => 'Rejected',
    //     ];
    // }

    // public function getStatusLabelAttribute()
    // {
    //     return self::getStatusOptions()[$this->status] ?? 'Unknown';
    // }
}
