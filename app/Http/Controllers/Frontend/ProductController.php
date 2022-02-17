<?php

namespace App\Http\Controllers\Frontend;

use Image;
use Carbon\Carbon;
use App\Models\Shop;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // product index
    public function index()
    {
        $allCategory = Category::where('is_deleted', 0)->where('is_active', 1)->get();
        $allshop     = Shop::where('user_id', Auth::user()->id)->where('is_deleted', 0)->where('is_active', 1)->get();
        $allbrand    = Brand::where('is_deleted', 0)->where('is_active', 1)->get();
        $allProduct  = Product::where('user_id', Auth::user()->id)->where('is_deleted', 0)->select(['id', 'product_name', 'product_sku', 'image', 'product_price', 'category_id'])->with('Category')->orderBy('id', 'DESC')->get();
        return view('frontend.vendor.product.index', compact('allCategory', 'allshop', 'allbrand', 'allProduct'));
    }
    //
    public function store(Request $request)
    {

        $proname = $request->product_name;
        $slug    = preg_replace('/[^A-Za-z0-9-]+/', '-', $proname);

        $shop_id = Shop::where('user_id', Auth::user()->id)->select(['id'])->first();

        $insert = Product::insertGetId([
            'product_name'                => $request->product_name,
            'product_slug'                => $slug,
            'shop_id'                     => $request->product_shop,
            'user_id'                     => Auth::user()->id,

            'product_sku'                 => $shop_id->id . rand(22, 876) . '-' . $request->product_sku,
            'category_id'                 => $request->category,
            'product_size'                => $request->product_size,
            'product_qty'                 => $request->product_qty,
            'subcategory_id'              => $request->subcategory,
            'resubcategory_id'            => $request->resubcategory,
            'child_resubcategory'         => $request->childresubcategory,
            'grand_childresubcategory_id' => $request->grandchildresubcategory,

            'product_brand'               => $request->product_brand,
            'product_price'               => $request->price,
            'product_weight'              => $request->product_weight,
            'product_details'             => $request->product_details,
            'style'                       => $request->product_style,
            'age_group'                   => $request->age_group,
            'product_gender'              => $request->gender,
            'product_materials'           => $request->product_materials,
            'product_condition'           => $request->product_condition,
            'product_tags'                => $request->tag,

            'have_a_discount'             => $request->have_a_discount,
            'offer'                       => $request->offer,
            'discount_price'              => $request->discount_price,
            'discount_price_type'         => $request->discount_price_type,
            'from_date'                   => $request->from_date,
            'to_date'                     => $request->to_date,
            'offer_stock_type'            => $request->offer_stock_type,
            'offer_qty'                   => $request->offer_qty,
            'discount_condition'          => $request->discount_condition,
            'offer_stock_type'            => $request->offer_stock_type,
            'offer_qty'                   => $request->offer_qty,
            'created_at'                  => Carbon::now()->toDateTimeString(),
        ]);

        if ($request->hasFile('product_img')) {

            $image     = $request->file('product_img');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/products/' . $ImageName);
            Product::where('id', $insert)->update([
                'image' => $ImageName,
            ]);
        }

        $photos = [];
        if ($request->hasFile('images')) {

            foreach ($request->images as $key => $photo) {

                $photoName    = uniqid() . "." . $photo->getClientOriginalExtension();
                $resizedPhoto = Image::make($photo)->save('uploads/products/' . $photoName);

                array_push($photos, $photoName);
            }
            Product::where('id', $insert)->update([
                'gallary_image' => json_encode($photos),
            ]);
        }

        if ($insert) {
            $notification = [
                'messege'    => 'Insert success!',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'messege'    => 'Insert Faild!',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {

        $edit = Product::where('id', $id)->first();
        $allCategory = Category::where('is_deleted', 0)->where('is_active', 1)->get();
        $allshop     = Shop::where('user_id', Auth::user()->id)->where('is_deleted', 0)->where('is_active', 1)->get();
        $allbrand    = Brand::where('is_deleted', 0)->where('is_active', 1)->get();
        return view('frontend.vendor.product.ajaxupdate', compact('allCategory', 'allshop', 'allbrand', 'edit'));
    }
    //
    public function update(Request $request)
    {

        $proname = $request->product_name;
        $slug    = preg_replace('/[^A-Za-z0-9-]+/', '-', $proname);

        $shop_id = Shop::where('user_id', Auth::user()->id)->select(['id'])->first();

        $insert = Product::where('id', $request->id)->update([
            'product_name'                => $request->product_name,
            'product_slug'                => $slug,
            'shop_id'                     => $request->product_shop,
            'product_sku'                 => $request->product_sku,
            'category_id'                 => $request->category,
            'product_size'                => $request->product_size,
            'product_qty'                 => $request->product_qty,
            'subcategory_id'              => $request->subcategory,
            'resubcategory_id'            => $request->resubcategory,
            'child_resubcategory'         => $request->childresubcategory,
            'grand_childresubcategory_id' => $request->grandchildresubcategory,

            'product_brand'               => $request->product_brand,
            'product_price'               => $request->price,
            'product_weight'              => $request->product_weight,
            'product_details'             => $request->product_details,
            'style'                       => $request->product_style,
            'age_group'                   => $request->age_group,
            'product_gender'              => $request->gender,
            'product_materials'           => $request->product_materials,
            'product_condition'           => $request->product_condition,
            'product_tags'                => $request->tag,
            'have_a_discount'             => $request->have_a_discount,
            'offer'                       => $request->offer,
            'discount_price'              => $request->discount_price,
            'discount_price_type'         => $request->discount_price_type,
            'from_date'                   => $request->from_date,
            'to_date'                     => $request->to_date,
            'offer_stock_type'            => $request->offer_stock_type,
            'offer_qty'                   => $request->offer_qty,
            'discount_condition'          => $request->discount_condition,
            'offer_stock_type'            => $request->offer_stock_type,
            'offer_qty'                   => $request->offer_qty,
            'updated_at'                  => Carbon::now()->toDateTimeString(),
        ]);

        if ($request->hasFile('product_img')) {

            $image     = $request->file('product_img');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/products/' . $ImageName);
            Product::where('id', $request->id)->update([
                'image' => $ImageName,
            ]);
        }

        $photos = [];
        if ($request->hasFile('images')) {

            foreach ($request->images as $key => $photo) {
                $photoName    = uniqid() . "." . $photo->getClientOriginalExtension();
                $resizedPhoto = Image::make($photo)->save('uploads/products/' . $photoName);
                array_push($photos, $photoName);
            }
            Product::where('id', $request->id)->update([
                'gallary_image' => json_encode($photos),
            ]);
        }

        if ($insert) {
            $notification = [
                'messege'    => 'Insert success!',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'messege'    => 'Insert Faild!',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }
    }
}
