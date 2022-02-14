<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function allneworder(){

        $alldata=Order::where('order_status',0)->orderBy('id','DESC')->get();
        return view('backend.order.neworder',compact('alldata'));
    }
    public function invoiceOrder($id){

        $data=Order::where('id',$id)->first();
        return view('backend.order.invoice',compact('data'));
    }
}
