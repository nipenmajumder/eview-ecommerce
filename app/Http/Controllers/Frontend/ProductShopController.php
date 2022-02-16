<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
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
        $products      = Product::query()->orderBy('id', 'DESC')->isActive()->isDeleted()->paginate(4);
        $category_data = Category::orderBy('id', 'DESC')->isActive()->isDeleted()->get();
        $brands        = Brand::orderBy('id', 'DESC')->isActive()->isDeleted()->get();
        return view('frontend.shop.shop', compact('products', 'brands', 'category_data'));
    }
    public function categoryWishProduct($slug, $id)
    {

        $products = Product::query()->orderBy('id', 'DESC')->isActive()->isDeleted()->where("category_id", $id)->paginate(4);
        $brands   = Brand::orderBy('id', 'DESC')->isActive()->isDeleted()->get();
        $category = Category::with('subCategory')->orderBy('id', 'DESC')->isActive()->isDeleted()->where('id', $id)->first();
        return view('frontend.shop.category-shop', \compact('products', 'brands', 'category'));
    }

    public function subCategoryWishProduct($slug, $id)
    {
        $products    = Product::query()->orderBy('id', 'DESC')->isActive()->isDeleted()->where("subcategory_id", $id)->paginate(4);
        $brands      = Brand::orderBy('id', 'DESC')->isActive()->isDeleted()->get();
        $subCategory = SubCategory::with('reSubCategory')->orderBy('id', 'DESC')->isActive()->isDeleted()->where('id', $id)->first();
        return view('frontend.shop.sub-category-shop', \compact('products', 'brands', 'subCategory'));
    }
    public function reSubCategoryWishProduct($slug, $id)
    {
        $products      = Product::query()->orderBy('id', 'DESC')->isActive()->isDeleted()->where("resubcategory_id", $id)->paginate(4);
        $brands        = Brand::orderBy('id', 'DESC')->isActive()->isDeleted()->get();
        $reSubCategory = ResubCategory::with('reReSubCategory')->orderBy('id', 'DESC')->isActive()->isDeleted()->where('id', $id)->first();
        return view('frontend.shop.re-sub-category-shop', \compact('products', 'brands', 'reSubCategory'));
    }

    public function searchProduct(Request $request)
    {
        $products    = Product::isActive()->isDeleted()->orderBy('id', 'DESC')->search($request->q)->paginate(4);
        $search_name = $request->q;
        return view('frontend.shop.product_search', compact('products', 'search_name'));
    }
}
