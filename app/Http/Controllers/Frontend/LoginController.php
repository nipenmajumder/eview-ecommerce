<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\CustomerRegister;
use App\Mail\ForgetPassword;
use Auth;
use App\Models\User;
use Mail;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    // submit
    public function loginSubmit(Request $request){
          //  return $request;
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $notification = array(
            'messege' => 'Login success!',
            'alert-type' => 'success'
            );
        
            return redirect()->intended(route('customer.dashboard'))->with($notification);
        }else{
            $notification = array(
            'messege' => 'Email/password Doesnot Match!',
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // register
    public function register(){
        return view('auth.register');
    }
    // register Store
    public function registerStore(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required|confirmed|min:6',
            'email' => 'required|email|unique:users',
        ]);

        $hash=md5($request->email);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->verification_code = rand(11111, 99999);
        $user->is_verified = 0;
        $user->save();
        $email = $request->email;

        Mail::to($email)->send(new CustomerRegister($user->verification_code,$request->email,$request->name));

        return redirect('/email/verify/'.$user->id.'/'. $hash);
    }
    // 
    public function emailverify($id){
        return view('auth.verify',compact('id'));
    }
    public function emailverifySubmit(Request $request){
            $id=$request->id;
            $check=User::where('id',$id)->where('verification_code',$request->code)->first();
            if($check){
                $update=User::where('id',$id)->update([
                    'is_verified'=>1,
                ]);
                return redirect('/login');
            }else{
                return redirect()->back();
            }
    }
    // forget password
    public function forgetPassword(){
        return view('auth.forgetpassword');
    }
    // forget password
    public function forgetPasswordSubmit(Request $request){
        $request->validate([
            'email' => 'required',
        ]);
        $check=User::where('email',$request->email)->select(['id','email','verification_code'])->first();
        if($check){
                $verify_id=md5($request->email);
                $code=rand(5555,12345);
                $update=User::where('id', $check->id)->update([
                    'verification_code'=>$code,
                ]);
             
                Mail::to($request->email)->send(new ForgetPassword($code,$verify_id));
                return redirect('forget-password/verify/'.$check->id.'/'.$verify_id);

        }else{
            $notification = array(
                'messege' => 'This Email Does Not exist!',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }

    //
    public function forgetCodeVerify($id){
        return view('auth.verifyForgetPin',compact('id'));
    } 

    // verify store confirm
    public function forgetCodeVerifyStore(Request $request){
      
        $request->validate([
            'code' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);
        $check=User::where('id',$request->id)->where('verification_code',$request->code)->select(['verification_code','id'])->first();
        if($check){
            $update=User::where('id',$request->id)->update([
                'password'=>Hash::make($request->password),
            ]);
            if($update){
                $notification = array(
                    'messege' => 'Password Changed Success!',
                    'alert-type' => 'success'
                    );
                return redirect()->route('login')->with($notification);
            }else{
                $notification = array(
                    'messege' => 'Password Changed Faild!',
                    'alert-type' => 'error'
                    );
                return redirect()->back()->with($notification);
            }

        }else{
            $notification = array(
                'messege' => 'Verification Code Is Worng!',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }


    }
}
