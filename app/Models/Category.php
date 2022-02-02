<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function Product()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'category');
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
