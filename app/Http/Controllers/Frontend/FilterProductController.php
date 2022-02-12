<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FilterProductController extends Controller
{
    public function filter(Request $request)
    {
        // dd($request->all());
        if (isset($request["subcategory"])) {
            $products = Product::isActive()->isDeleted()->where('category_id', $request->category)->whereIn('subcategory_id', $request->subcategory)->paginate(4);
        }
        if (isset($request["brand"])) {
            $products = Product::isActive()->isDeleted()->where('category_id', $request->category)->whereIn('brand_id', $request->brand)->paginate(4);
        }
        if (isset($request["brand"]) && isset($request["subcategory"])) {
            $products = Product::isActive()->isDeleted()->where('category_id', $request->category)->whereIn('subcategory_id', $request->subcategory)->whereIn('brand_id', $request->brand)->paginate(4);
        }
        if ($request->subcategory == null && $request->brand == null && $request->category != null) {
            $products = Product::isActive()->isDeleted()->where('category_id', $request->category)->paginate(4);
        }
        // dd($products);
        return view('frontend.shop.filter-product.filter-category-shop', compact('products'));
    }

}
