<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ReReReSubCategory;
use App\Models\ReReSubCategory;
use App\Models\ResubCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products      = Product::query()->orderBy('id', 'DESC')->where('is_active', 1)->paginate(4);
        $category_data = Category::isActive()->get();
        $brands        = Brand::active()->orderBy('id', 'DESC')->get();
        return view('frontend.shop.index', compact('products', 'brands', 'category_data'));
    }

    public function categoryWishProduct(Request $request)
    {
        $products          = Product::query()->orderBy('id', 'DESC')->where('is_active', 1);
        $brands            = Brand::active()->orderBy('id', 'DESC')->get();
        $category_data     = null;
        $childCategory     = null;
        $subChildCategory  = null;
        $reReSubCategory   = null;
        $reReReSubCategory = null;
        //category
        if ($request->category != null) {
            $category_data = Category::with('subCategory', 'subCategory.reSubCategory')->where('id', $request->category)->first();

            if ($category_data) {
                $products = $products->where("category_id", $category_data->id)->paginate(4);
            }
        }
        //sub category
        else if ($request->child_category != null) {
            $childCategory = SubCategory::with('reSubCategory')->where('id', $request->child_category)->first();
            if ($childCategory) {
                $products = $products->where('subcategory_id', $childCategory->id)->paginate(4);
            }
        }
        //re sub category
        elseif ($request->sub_child_category != null) {
            $subChildCategory = ResubCategory::where('id', $request->sub_child_category)->first();
            if ($subChildCategory) {
                $products = $products->where('resubcategory_id', $subChildCategory->id)->paginate(4);
            }
        }
        // re re sub category
        elseif ($request->re_re_sub_category != null) {
            $reReSubCategory = ReReSubCategory::where('id', $request->re_re_sub_category)->first();
            if ($reReSubCategory) {
                $products = $products->where('child_resubcategory', $reReSubCategory->id)->paginate(4);
            }
        }
        // re re re sub category
        elseif ($request->re_re_re_sub_category != null) {
            $reReReSubCategory = ReReReSubCategory::where('id', $request->re_re_re_sub_category)->first();
            if ($reReReSubCategory) {
                $products = $products->where('grand_childresubcategory_id', $reReReSubCategory->id)->paginate(4);
            }
        } else {
            //
        }
        return view('frontend.shop.category-wish-shop', compact('products', 'brands', 'category_data', 'childCategory', 'subChildCategory', 'reReSubCategory', 'reReReSubCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
