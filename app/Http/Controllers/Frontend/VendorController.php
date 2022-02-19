<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Shop;
use App\Models\User;
use App\Models\Product;
use App\Models\VendorCompany;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // vendor order list
    public function orderList()
    {
 
        $shop = VendorCompany::where('user_id', auth()->user()->id)->first();
        $shop_single_id = [$shop->id];
        $shoplol=$shop->id;
        $item = $shoplol;
        $allorders=Order::where('company_id', 'like', "%{$item}%")->get();
        return view('frontend.vendor.dashboard.order', compact('allorders'));
    }
    //
    public function create()
    {
        if (Auth::user()->is_shop == 1) {
            return redirect('/vendor/dashboard');
        } else {
            $allCountry = DB::table('country')->get();
            return view('frontend.vendor.vendor_create.create', compact('allCountry'));
        }
    }
    //
    public function store(Request $request)
    {

        $insert = VendorCompany::insertGetId([
            'user_id'                => Auth::user()->id,
            'name'                   => $request->name,
            'email'                  => $request->email,
            'phone'                  => $request->phone,
            'company_name'           => $request->company_name,
            'company_address'        => $request->company_address,
            'company_google_map'     => $request->company_google_map,
            'country'                => $request->country,
            'city'                   => $request->city,
            'zip_code'               => $request->zip_code,
            'sale_area'              => $request->sale_area,
            'delevery_possible_area' => $request->delevery_possible_area,
            'bank_name'              => $request->bank_name,
            'bank_account_number'    => $request->bank_account_number,
            'name_of_bank'           => $request->name_of_bank,
            'bank_address'           => $request->bank_address,
            'routing_number'         => $request->routing_number,
            'i_ban'                  => $request->i_ban,
            'swift_code'             => $request->swift_code,
            'created_at'             => Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $ImageName = 'Cate' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/vendorcompany/' . $ImageName);
            VendorCompany::where('id', $insert)->update([
                'image' => $ImageName,
            ]);
        }
        if ($insert) {
            $update = User::where('id', Auth::user()->id)->update([
                'is_shop' => 1,
            ]);
            $notification = [
                'messege'    => 'Vendor Create success!',
                'alert-type' => 'success',
            ];
            return redirect()->route('vendor.dashboard')->with($notification);
        } else {
            $notification = [
                'messege'    => 'insert Faild!',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }
    }

    // vendor dashboard
    public function vendorDashboard()
    {


        $shop = VendorCompany::where('user_id', auth()->user()->id)->first();
        $shop_single_id = [$shop->id];
        $shoplol=$shop->id;
        $item = $shoplol;
        $totalpendingOrder=Order::where('is_deleted',0)->where('order_status',0)->where('company_id', 'like', "%{$item}%")->count();
        $allpendingOrder=Order::where('is_deleted',0)->where('order_status',0)->where('company_id', 'like', "%{$item}%")->limit(5)->get();
            
        $countproduct=Product::where('user_id',Auth::user()->id)->where('is_deleted',0)->count();
        $totalsellproduct=Product::where('user_id',Auth::user()->id)->where('is_deleted',0)->sum('sell_qty');
        $OrderBysellproduct=Product::where('user_id',Auth::user()->id)->where('is_deleted',0)->orderBy('sell_qty','DESC')->limit(5)->get();
     
        return view('frontend.vendor.dashboard.vendor_dashboard',compact('allpendingOrder','OrderBysellproduct','countproduct','totalsellproduct','totalpendingOrder'));
    }
    // 
    public function edit(){
        $id=Auth::user()->id;
        $vendorcompany=VendorCompany::where('user_id', $id)->first();
        if($vendorcompany){

            return view('frontend.vendor.vendor_create.vendorupdate',compact('vendorcompany'));
        }else{
            return redirect('/');
        }
        
    }


    // 
    public function invoicevendorOrder($id){
            $alldata=Order::where('id',$id)->first();
            return view('frontend.vendor.dashboard.invoice',compact('alldata'));
    }
    // vendor update
    public function editUpdate(Request $request){
        
        $insert = VendorCompany::where('id',$request->id)->update([
            'name'                   => $request->name,
            'email'                  => $request->email,
            'phone'                  => $request->phone,
            'company_name'           => $request->company_name,
            'company_address'        => $request->company_address,
            'company_google_map'     => $request->company_google_map,
            'country'                => $request->country,
            'city'                   => $request->city,
            'zip_code'               => $request->zip_code,
            'sale_area'              => $request->sale_area,
            'delevery_possible_area' => $request->delevery_possible_area,
            'bank_name'              => $request->bank_name,
            'bank_account_number'    => $request->bank_account_number,
            'name_of_bank'           => $request->name_of_bank,
            'bank_address'           => $request->bank_address,
            'routing_number'         => $request->routing_number,
            'i_ban'                  => $request->i_ban,
            'swift_code'             => $request->swift_code,
            'updated_at'             => Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $ImageName = 'Cate' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/vendorcompany/' . $ImageName);
            VendorCompany::where('id', $request->id)->update([
                'image' => $ImageName,
            ]);
        }
        if ($insert) {
            $notification = [
                'messege'    => 'Vendor Update success!',
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



    // vndor ad to cart order
    public function myorder(){
        $orders = Order::where('customer_id', Auth::user()->id)->get();
        return view('frontend.vendor.myorder.order',compact('orders'));
    }

}
