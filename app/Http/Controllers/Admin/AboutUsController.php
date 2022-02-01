<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Carbon\Carbon;
use Image;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // update
    public function update(){
        $data=AboutUs::select(['details','id'])->first();
        return view('backend.about-us.update',compact('data'));
    }
    // update Store
    public function updateSubmit(Request $request){
        $this->validate($request, [
            'details'=>'required',
        ]);
        $update=AboutUs::where('id',$request->id)->update([
            'details'=>$request->details,
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
}
