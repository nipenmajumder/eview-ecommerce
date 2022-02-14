<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;



class SubcriptionController extends Controller
{
    public function store(Request $request){
       
        $validated = $request->validate([
            'email' => 'required|unique:subscriptions|max:25',
        ]);
        $insert=Subscription::insert([
            'email'=>$request->email,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            $notification = array(
                'messege' => 'Subscription success!',
                'alert-type' => 'success'
              );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Subscription Faild!',
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }
}
