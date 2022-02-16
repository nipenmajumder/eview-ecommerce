<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function create()
    {
        return view('backend.banner.create');
    }
    // store
    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'title' => 'required',
            'discount' => 'required',
            'url' => 'required',
            'image' => 'required',
        ]);
        $insert = Banner::insertGetId([
            'title' => $request->title,
            'discount' => $request->discount,
            'url' => $request->url,
            'short_desc' => $request->short_desc,
            'image' => '',
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = 'Banner' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/banner/' . $ImageName);
            Banner::where('id', $insert)->update([
                'image' => $ImageName,
            ]);
        }
        if ($insert) {
            $notification = array(
                'messege' => 'insert success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'insert Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // all slider
    public function index()
    {
        $alldata = Banner::select(['title', 'discount', 'url', 'short_desc', 'image', 'id', 'is_active'])->orderBy('id', 'DESC')->get();
        return view('backend.banner.index', compact('alldata'));
    }
    // active
    public function active($id)
    {
        $active = Banner::where('id', $id)->update([
            'is_active' => 1,
            'updated_at' => Carbon::now()->todateTimeString(),
        ]);
        if ($active) {
            $notification = array(
                'messege' => 'Active success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Active Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // Deactive
    public function deactive($id)
    {
        $Deactive = Banner::where('id', $id)->update([
            'is_active' => 0,
            'updated_at' => Carbon::now()->todateTimeString(),
        ]);
        if ($Deactive) {
            $notification = array(
                'messege' => 'Deactive success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Deactive Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // edit
    public function edit($id)
    {
        $edit = Banner::where('id', $id)->select(['title', 'discount', 'url', 'short_desc', 'image', 'id'])->first();
        return view('backend.banner.update', compact('edit'));
    }
    // delete
    public function delete($id)
    {
        $delete = Banner::where('id', $id)->delete();
        if ($delete) {
            $notification = array(
                'messege' => 'Delete success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Delete Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // update
    public function update(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'discount' => 'required',
            'url' => 'required',
            'image' => 'required',
        ]);

        $update = Banner::where('id', $request->id)->update([
            'title' => $request->title,
            'discount' => $request->discount,
            'url' => $request->url,
            'short_desc' => $request->short_desc,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = 'Banner' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/banner/' . $ImageName);
            Banner::where('id', $request->id)->update([
                'image' => $ImageName,
            ]);
        }
        if ($update) {
            $notification = array(
                'messege' => 'Update success!',
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
}
