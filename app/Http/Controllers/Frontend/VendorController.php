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
        // dd(auth()->user());
        $shop           = Shop::where('user_id', auth()->user()->id)->first();
        $shop_single_id = [$shop->id];
        // dd($shop_single_id);
        $collect_data = collect(Order::get());
        $get          = $collect_data->contains('company_id', $shop->id);

        dd($get);
        // $orders = Order::where()get();

        return view('frontend.vendor.dashboard.order', compact('orders'));
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
        $countproduct=Product::where('user_id',Auth::user()->id)->where('is_deleted',0)->count();
        return view('frontend.vendor.dashboard.vendor_dashboard',compact('countproduct'));
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
}
