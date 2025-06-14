<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLicenceKey extends Model
{
    use HasFactory;

    protected $table = 'product_licence_keys';
    
     protected $fillable = [
        'sr_no',
        'product_key',
        'assigned',
        'assigned_user',
        'product_id'
    ];
    
    
    public function user()
{
    return $this->belongsTo(User::class, 'assigned_user');
}

}