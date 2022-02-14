<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ApproveProductController extends Controller
{
    public function index(){
        $alldata=Product::where('is_deleted',0)->where('is_active',1)->where('is_approve',0)->get();
        return view('backend.productApprove.index',compact('alldata'));
    }

    // approve
    public function approve($id){

        $update=Product::where('id',$id)->update([
            'is_approve'=>1,
        ]);
        if ($update) {
            $notification = [
                'messege'    => 'Approve success!',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'messege'    => 'Approve Faild!',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }
    }
    public function reject($id){

        $update=Product::where('id',$id)->update([
            'is_approve'=>2,
        ]);
        if ($update) {
            $notification = [
                'messege'    => 'Rejected!',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'messege'    => 'Rejected Faild!',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }
    }
    // reject
}
