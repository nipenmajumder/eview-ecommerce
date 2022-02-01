<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;

class CustomerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // customer-dashboard
    public function dashboard(){
        if(Auth::user()->is_shop==0){
            return view('frontend.customerDashboard.dashboard');
        }else{
            return redirect('/vendor/dashboard');
        }
        
    }
    // customer logout
    public function logout(){
        Auth::logout();
        return redirect()->route('home.index');
    }
    // profile 
    public function profile(){
        $allcountry=DB::table('country')->get();
        return view('frontend.customerDashboard.profile',compact('allcountry'));
    }
    // profile update
    public function profileUpdate(Request $request){
     
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'main_address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
        ]);
        $update=User::where('id',Auth::user()->id)->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'main_address'=>$request->main_address,
            'country'=>$request->country,
            'city'=>$request->city,
            'zip_code'=>$request->zip_code,
            'google_map'=>$request->google_map,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            $notification = array(
            'messege' => 'Update success!',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Update Faild!',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }
    // 
    public function passwordChange(){
        return view('frontend.customerDashboard.passwordChange');
    }
    // password
    public function passwordChangeStore(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'password_confirmation' => ['same:password'],
        ]);
        $update=User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);
        if($update){
            $notification = array(
            'messege' => 'Update success!',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Update Faild!',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }

    }
}
