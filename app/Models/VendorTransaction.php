<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorTransaction extends Model
{
    use HasFactory;


    protected $table = 'vendor_transactions';

     protected $fillable = [
        'vendor_id',
        'amount',
        'payment_method',
        'transaction_id',
        'status',
        'note',
        'paid_at',
    ];

    // Relationships
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    
}