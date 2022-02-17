<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function orderReport()
    {
        return view('backend.orderreport.index');
    }
    public function Report(Request $request)
    {

        $from = $request->from;
        $to   = $request->to;
        $data = Order::whereBetween('created_at', [$from, $to])->with('Customer')->get();

        //return $data;
        return view('backend.orderreport.index', compact('data'));
    }

    public function productReport()
    {
        $alldata = Product::where('is_deleted', 0)
            ->select(['product_name', 'id'])
            ->orderBy('id', 'DESC')->get();
        return view('backend.productreport.index', compact('alldata'));
    }
    public function productWiseReport(Request $request)
    {
        // $alldata = Product::where('is_deleted', 0)
        //     ->select(['product_name', 'id'])
        //     ->orderBy('id', 'DESC')->get();

        // if ($request->product == 'all') {

        //     $data = Product::select(['id', 'product_name', 'product_sku', 'product_qty', 'sell_qty'])->orderBy('sell_qty', 'DESC')->get();

        //     return view('backend.productreport.index', compact('alldata', 'data'));
        // }
        // if ($request->product != 'all') {
        //     $data = Product::where('id', $request->product)->select(['id', 'product_name', 'product_qty', 'product_sku', 'sell_qty'])->get();
        //     return view('backend.productreport.index', compact('alldata', 'data'));
        // }
    }
}
