<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Auth;
use Carbon\Carbon;
use Image;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // Dashboard index
    public function index(){
        return view('backend.home.index');
    }
    // 
    public function adminProfile(){
        return view('backend.adminSetting.profile');
    }
    // admin profile update
    public function adminProfileUpdate(){
        return view('backend.adminSetting.profileUpdate');
    }
    // admin Profile Updatesubmit
    public function adminProfileUpdateSubmit(Request $request){
        $validated = $request->validate([
            'user_name' => 'required',
            'phone' => 'required',
        ]);
        $update = Admin::where('id', Auth::user()->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_name' => $request->user_name,
            'company' => $request->company,
            'designation' => $request->designation,
            'phone' => $request->phone,
            'company_site' => $request->company_site,
            'country' => $request->country,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('image')) {
           
            $image = $request->file('image');
            $ImageName = 'admin' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(350, 350)->save('uploads/adminimage/' . $ImageName);
            Admin::where('id', Auth::user()->id)->update([
                'image' => $ImageName,
            ]);
        }
        if($update) {
            $notification = array(
                'messege' => 'Update Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // email update
    public function adminEmailUpdate(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'confirmemail' => 'required_with:email|same:email',
        ]);
        $update=Admin::where('id',Auth::user()->id)->update([
            'email'=>$request->email,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($update) {
            $notification = array(
                'messege' => 'Update Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    // admin password update
    public function adminUpdatePassword(Request $request){
      
        $validatedData = $request->validate([
                'current_password' => 'required|min:6',
                'password' => 'required|min:6',
                'password_confirmation' => 'required',
        ]);
         $password=Auth::user()->password;
         $oldpass=$request->current_password;
         $newpass=$request->password;
         $confirm=$request->password_confirmation;
         if (Hash::check($oldpass,$password)) {
              if ($newpass === $confirm) {
                   $user=Admin::find(Auth::id());
                   $user->password=Hash::make($request->password);
                   $user->save();
                   Auth::logout();
                   $notification=array(
                     'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                     'alert-type'=>'success'
                      );
                    return Redirect()->route('admin.login')->with($notification);
              }else{
                  $notification=array(
                     'messege'=>'New password and Confirm Password not matched!',
                     'alert-type'=>'error'
                      );
                    return Redirect()->back()->with($notification);
              }
         }else{
           $notification=array(
                   'messege'=>'Old Password not matched!',
                   'alert-type'=>'error'
                    );
                  return Redirect()->back()->with($notification);
         }
    }
    // logout
    public function logout(){
        Auth::logout();
        $notification = array(
            'messege' => 'Logout success',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.login')->with($notification);
    }
}
