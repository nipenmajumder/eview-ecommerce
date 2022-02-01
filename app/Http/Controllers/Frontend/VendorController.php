<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorCompany;
use DB;
use Carbon\Carbon;
use Image;
use Session;
use Auth;
use App\Models\User;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // 
    public function create(){
        if(Auth::user()->is_shop==1){
            return redirect('/vendor/dashboard');
        }else{
            $allCountry=DB::table('country')->get();
            return view('frontend.vendor.vendor_create.create',compact('allCountry'));
        }
    }
    // 
    public function store(Request $request){

        $insert=VendorCompany::insertGetId([
            'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'company_name'=>$request->company_name,
            'company_address'=>$request->company_address,
            'company_google_map'=>$request->company_google_map,
            'country'=>$request->country,
            'city'=>$request->city,
            'zip_code'=>$request->zip_code,
            'sale_area'=>$request->sale_area,
            'delevery_possible_area'=>$request->delevery_possible_area,
            'bank_name'=>$request->bank_name,
            'bank_account_number'=>$request->bank_account_number,
            'name_of_bank'=>$request->name_of_bank,
            'bank_address'=>$request->bank_address,
            'routing_number'=>$request->routing_number,
            'i_ban'=>$request->i_ban,
            'swift_code'=>$request->swift_code,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = 'Cate' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/vendorcompany/' . $ImageName);
            VendorCompany::where('id',$insert)->update([
                'image' => $ImageName,
            ]);
        }
        if($insert){
            $update=User::where('id',Auth::user()->id)->update([
                'is_shop'=>1,
            ]);
            $notification = array(
                'messege' => 'Vendor Create success!',
                'alert-type' => 'success'
              );
            return redirect()->route('vendor.dashboard')->with($notification);
        }else{
            $notification = array(
                'messege' => 'insert Faild!',
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }


    // vendor dashboard
    public function vendorDashboard(){
        return view('frontend.vendor.dashboard.vendor_dashboard');
    }
}
