<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{


    
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'barcode',
        'image',
        'status',
            'tnxid',
        'payment_proof'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
