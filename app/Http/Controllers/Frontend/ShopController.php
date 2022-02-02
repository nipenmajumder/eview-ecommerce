<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\VendorCompany;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $allShop         = Shop::where('is_deleted', 0)->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $allShopcategory = ShopCategory::where('is_active', 1)->get();
        return view('frontend.vendor.shop.index', compact('allShop', 'allShopcategory'));
    }
    //
    public function store(Request $request)
    {
        $company_id = VendorCompany::where('user_id', Auth::user()->id)->select(['id'])->first();
        $insert     = Shop::insert([
            'shop_name'       => $request->name,
            'user_id'         => Auth::user()->id,
            'shopcategory_id' => $request->shop_category,
            'company_id'      => $company_id->id,
            'address'         => $request->shop_address,
            'created_at'      => Carbon::now(),
        ]);
        if ($insert) {
            $notification = [
                'messege'    => 'Create success!',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'messege'    => 'insert Faild!',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }
    }
    // edit
    public function edit($id)
    {

        $data = Shop::where('id', $id)->select(['id', 'shop_name', 'address', 'shopcategory_id'])->first();
        return response()->json($data);
    }
    // update
    public function update(Request $request)
    {

        $insert = Shop::where('id', $request->id)->update([
            'shop_name'       => $request->name,
            'shopcategory_id' => $request->shop_category,
            'address'         => $request->shop_address,
            'updated_at'      => Carbon::now(),
        ]);
        if ($insert) {
            $notification = [
                'messege'    => 'Update success!',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'messege'    => 'Update Faild!',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }
    }
    //
    public function delete($id)
    {
        $delete = Shop::where('id', $id)->update([
            'is_deleted' => 1,
        ]);
        if ($delete) {
            $notification = [
                'messege'    => 'Delete success!',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'messege'    => 'Delete Faild!',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }
    }
}
