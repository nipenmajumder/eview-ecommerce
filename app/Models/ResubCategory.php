<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResubCategory extends Model
{
    use HasFactory;
    public function Category_id()
    {
        return $this->belongsTo('App\Models\Category', 'category', 'id');
    }
    public function SubCategory_id()
    {
        return $this->belongsTo('App\Models\SubCategory', 'sub_category', 'id');
    }
}
