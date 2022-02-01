<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ResubCategory;
use Carbon\Carbon;
use Auth;
use Image;

class ResubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function create(){
        $allCategory=Category::where('is_active',1)->where('is_deleted',0)->orderBy('id','DESC')->get();
        $allSubCategory=SubCategory::where('is_active',1)->where('is_deleted',0)->orderBy('id','DESC')->get();
        return view('backend.resubCategory.create',compact('allCategory','allSubCategory'));
    }
    // store
    public function store(Request $request){
       
        $validated = $request->validate([
            'name' => 'required|unique:resub_categories',
            'category' => 'required',
            'subcategory' => 'required',
        ]);
        $proname = $request->name;
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $proname);
        $insert=ReSubCategory::insertGetId([
            'name'=>$request->name,
            'category'=>$request->category,
            'sub_category'=>$request->subcategory,
            'slug'=>$slug,
            'updated_by'=>Auth::user()->id,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            $notification = array(
                'messege' => 'Insert success!',
                'alert-type' => 'success'
              );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'insert Faild!',
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }
    // all slider
    public function index(){
        $alldata=ReSubCategory::where('is_deleted',0)->select(['category','sub_category','name','id','is_active'])->orderBy('id','DESC')->get();
        return view('backend.resubcategory.index',compact('alldata'));
    }
    // active
    public function active($id){
        $active=ReSubCategory::where('id',$id)->update([
            'is_active'=>1,
            'updated_by'=>Auth::user()->id,
            'updated_at'=>Carbon::now()->todateTimeString(),
        ]);
        if($active){
            $notification = array(
                'messege' => 'Active success!',
                'alert-type' => 'success'
              );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Active Faild!',
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }
    // Deactive
    public function deactive($id){
        $Deactive=ReSubCategory::where('id',$id)->update([
            'is_active'=>0,
            'updated_by'=>Auth::user()->id,
            'updated_at'=>Carbon::now()->todateTimeString(),
        ]);
        if($Deactive){
            $notification = array(
                'messege' => 'Deactive success!',
                'alert-type' => 'success'
              );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Deactive Faild!',
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }
    // edit
    public function edit($id){
        $allCategory=Category::where('is_active',1)->where('is_deleted',0)->orderBy('id','DESC')->get();
        $allSubCategory=SubCategory::where('is_active',1)->where('is_deleted',0)->orderBy('id','DESC')->get();
        $edit=ReSubCategory::where('id',$id)->first();
        return view('backend.resubcategory.update',compact('edit','allCategory','allSubCategory'));
    }
    // delete
    public function delete($id){
        $delete=ReSubCategory::where('id',$id)->update([
            'is_deleted'=>1,
            'updated_by'=>Auth::user()->id,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($delete){
            $notification = array(
                'messege' => 'Delete success!',
                'alert-type' => 'success'
              );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Delete Faild!',
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }
    // update
    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
        ]);
        $proname = $request->name;
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $proname);
        $update=ReSubCategory::where('id',$request->id)->update([
            'name'=>$request->name,
            'category'=>$request->category,
            'sub_category'=>$request->subcategory,
            'slug'=>$slug,
            'updated_by'=>Auth::user()->id,
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
