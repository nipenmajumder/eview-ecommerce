<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function Division()
    {
        return $this->belongsTo('Devfaysal\BangladeshGeocode\Models\Division', 'division', 'id');
    }
    public function District()
    {
        return $this->belongsTo('Devfaysal\BangladeshGeocode\Models\District', 'district', 'id');
    }
    public function Customer()
    {
        return $this->belongsTo('App\Models\User', 'customer_id', 'id');
    }
    // public function Product()
    // {
    //     return $this->belongsTo('App\Models\Product', 'billing_id', 'id');
    // }
}
