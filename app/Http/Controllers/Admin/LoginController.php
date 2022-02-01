<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    public function login(){
        return view('backend.login.login');
    }
    // admin login 
    public function loginSubmit(Request $request){
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:6'
          ]);
         
          if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $notification = array(
              'messege' => 'Login success!',
              'alert-type' => 'success'
            );
            return redirect()->intended(route('admin.home'))->with($notification);
          }else{
            $notification = array(
              'messege' => 'Email/password Doesnot Match!',
              'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
          }
    }
}
