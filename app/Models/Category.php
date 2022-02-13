<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function scopeIsActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeIsDeleted($query)
    {
        return $query->where('is_deleted', 0);
    }
    public function Product()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function subCategory()
    {
        return $this->hasMany('App\Models\SubCategory', 'category')->where('is_active', 1)->where('is_deleted', 0);
    }
}
