<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeSearch($query, $search)
    {
        return $query->where('product_name', 'LIKE', $search . '%');

    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function scopeIsApprove($query)
    {
        return $query->where('is_approve', 1);
    }
    public function scopeIsDeleted($query)
    {
        return $query->where('is_deleted', 0);
    }

    public function scopeNotID($query, $id)
    {
        return $query->where('id', '!=', $id);
    }

    public function scopeIsID($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeOffer11($query)
    {
        return $query->where('offer', '11_offer');
    }

    public function scopeOffer22($query)
    {
        return $query->where('offer', '22_offer');
    }

    public function scopeSpecialOffer($query)
    {
        return $query->where('offer', 'special_offer');
    }
    public function scopeHaveDiscount($query)
    {
        return $query->where('have_a_discount', 1);
    }

    public function Category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function SubCategory_id()
    {
        return $this->belongsTo('App\Models\SubCategory', 'subcategory_id', 'id');
    }
    public function Vendor()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function MainShop()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id', 'id');
    }

}
