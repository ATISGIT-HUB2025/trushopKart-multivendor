<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $table = 'product_attributes';

    protected $fillable = [
        'product_id',
        'name',
        'type',
        'value',
    ];

    /**
     * Relationship: An attribute belongs to a product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
