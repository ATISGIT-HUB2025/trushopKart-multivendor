<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePrice extends Model
{
    use HasFactory;

    protected $table = 'package_price'; // Explicit table name
    protected $fillable = ['package_name', 'package_title', 'button_name', 'price', 'facility_1', 'facility_2', 'facility_3', 'facility_4', 'facility_5'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function grandChildCategories()
    {
        return $this->hasMany(GrandChildCategory::class);
    }
}
