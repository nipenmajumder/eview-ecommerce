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
        $products      = Product::query()->orderBy('id', 'DESC')->isActive()->isDeleted()->isApprove()->select(['id', 'product_name', 'product_slug', 'product_sku', 'product_price', 'shop_id', 'offer', 'have_a_discount', 'image'])->paginate(12);
        $category_data = Category::orderBy('id', 'DESC')->isActive()->isDeleted()->select(['id', 'name'])->get();
        $brands        = Brand::orderBy('id', 'DESC')->isActive()->isDeleted()->select(['id', 'name'])->get();
        return view('frontend.shop.shop', compact('products', 'brands', 'category_data'));
    }
    public function categoryWishProduct($slug, $id)
    {
        $products = Product::query()->orderBy('id', 'DESC')->isActive()->isDeleted()->isApprove()->where("category_id", $id)->select(['id', 'product_name', 'product_slug', 'product_sku', 'product_price', 'shop_id', 'offer', 'have_a_discount', 'image'])->paginate(12);
        $brands   = Brand::orderBy('id', 'DESC')->isActive()->isDeleted()->select(['id', 'name'])->get();
        $category = Category::with('subCategory')->orderBy('id', 'DESC')->isActive()->isDeleted()->where('id', $id)->first();
        return view('frontend.shop.category-shop', compact('products', 'brands', 'category'));
    }

    public function subCategoryWishProduct($slug, $id)
    {
        $products    = Product::query()->orderBy('id', 'DESC')->isActive()->isDeleted()->isApprove()->where("subcategory_id", $id)->select(['id', 'product_name', 'product_slug', 'product_sku', 'product_price', 'shop_id', 'offer', 'have_a_discount', 'image'])->paginate(12);
        $brands      = Brand::orderBy('id', 'DESC')->isActive()->isDeleted()->select(['id', 'name'])->get();
        $subCategory = SubCategory::with('reSubCategory')->orderBy('id', 'DESC')->isActive()->isDeleted()->where('id', $id)->first();
        return view('frontend.shop.sub-category-shop', compact('products', 'brands', 'subCategory'));
    }
    public function reSubCategoryWishProduct($slug, $id)
    {
        $products      = Product::query()->orderBy('id', 'DESC')->isActive()->isDeleted()->isApprove()->where("resubcategory_id", $id)->select(['id', 'product_name', 'product_slug', 'product_sku', 'product_price', 'shop_id', 'offer', 'have_a_discount', 'image'])->paginate(12);
        $brands        = Brand::orderBy('id', 'DESC')->isActive()->isDeleted()->select(['id', 'name'])->get();
        $reSubCategory = ResubCategory::with('reReSubCategory')->orderBy('id', 'DESC')->isActive()->isDeleted()->where('id', $id)->first();
        return view('frontend.shop.re-sub-category-shop', compact('products', 'brands', 'reSubCategory'));
    }

    public function offer11Store()
    {
        $products      = Product::isDeleted()->isActive()->isApprove()->haveDiscount()->offer11()->orderBy('id', 'DESC')->select(['id', 'product_name', 'product_slug', 'product_sku', 'product_price', 'shop_id', 'offer', 'have_a_discount', 'image'])->paginate(12);
        $category_data = Category::orderBy('id', 'DESC')->isActive()->isDeleted()->select(['id', 'name'])->get();
        $brands        = Brand::orderBy('id', 'DESC')->isActive()->isDeleted()->select(['id', 'name'])->get();
        return view('frontend.shop.offer-11-shop', compact('products', 'brands', 'category_data'));
    }
    public function offer22Store()
    {
        $products      = Product::isDeleted()->isActive()->isApprove()->haveDiscount()->offer22()->orderBy('id', 'DESC')->select(['id', 'product_name', 'product_slug', 'product_sku', 'product_price', 'shop_id', 'offer', 'have_a_discount', 'image'])->paginate(12);
        $category_data = Category::orderBy('id', 'DESC')->isActive()->isDeleted()->select(['id', 'name'])->get();
        $brands        = Brand::orderBy('id', 'DESC')->isActive()->isDeleted()->select(['id', 'name'])->get();
        return view('frontend.shop.offer-22-shop', compact('products', 'brands', 'category_data'));
    }

    public function searchProduct(Request $request)
    {
        $products    = Product::isActive()->isDeleted()->isApprove()->orderBy('id', 'DESC')->select(['id', 'product_name', 'product_slug', 'product_sku', 'product_price', 'shop_id', 'offer', 'have_a_discount', 'image'])->search($request->q)->paginate(4);
        $search_name = $request->q;
        return view('frontend.shop.product_search', compact('products', 'search_name'));
    }
}
