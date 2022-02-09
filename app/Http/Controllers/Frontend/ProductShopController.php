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
    public function categoryWishProduct($id)
    {
        $products = Product::query()->orderBy('id', 'DESC')->where('is_active', 1)->where("category_id", $id)->paginate(4);
        $brands   = Brand::active()->orderBy('id', 'DESC')->get();
        $category = Category::with('subCategory')->where('id', $id)->first();
        return view('frontend.shop.category-shop', \compact('products', 'brands', 'category'));
    }

    public function subCategoryWishProduct($id)
    {
        $products    = Product::query()->orderBy('id', 'DESC')->where('is_active', 1)->where("subcategory_id", $id)->paginate(4);
        $brands      = Brand::active()->orderBy('id', 'DESC')->get();
        $subCategory = SubCategory::with('reSubCategory')->where('id', $id)->first();
        return view('frontend.shop.sub-category-shop', \compact('products', 'brands', 'subCategory'));
    }
    public function reSubCategoryWishProduct($id)
    {
        $products      = Product::query()->orderBy('id', 'DESC')->where('is_active', 1)->where("resubcategory_id", $id)->paginate(4);
        $brands        = Brand::active()->orderBy('id', 'DESC')->get();
        $reSubCategory = ResubCategory::with('reReSubCategory')->where('id', $id)->first();
        return view('frontend.shop.re-sub-category-shop', \compact('products', 'brands', 'reSubCategory'));
    }
    public function reReSubCategoryWishProduct($id)
    {
        $products          = Product::query()->orderBy('id', 'DESC')->where('is_active', 1)->where("child_resubcategory", $id)->paginate(4);
        $brands            = Brand::active()->orderBy('id', 'DESC')->get();
        $reReReSubCategory = ReReSubCategory::with('reReReSubCategory')->where('id', $id)->first();
        return view('frontend.shop.re-re-sub-category-shop', \compact('products', 'brands', 'reReReSubCategory'));
    }
    public function reReReSubCategoryWishProduct($id)
    {
        $products            = Product::query()->orderBy('id', 'DESC')->where('is_active', 1)->where("grand_childresubcategory_id", $id)->paginate(4);
        $brands              = Brand::active()->orderBy('id', 'DESC')->get();
        $reReReReSubCategory = ReReReSubCategory::where('id', $id)->first();
        return view('frontend.shop.re-re-re-sub-category-shop', \compact('products', 'brands', 'reReReReSubCategory'));
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
