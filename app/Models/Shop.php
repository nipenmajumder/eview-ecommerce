<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    public function ShopCategory()
    {
        return $this->belongsTo('App\Models\ShopCategory', 'shopcategory_id', 'id');
    }
}
