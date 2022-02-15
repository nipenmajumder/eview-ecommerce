<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ReReReSubCategory;
use App\Models\ReReSubCategory;
use App\Models\ResubCategory;
use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\SubCategory;
use Devfaysal\BangladeshGeocode\Models\District;

class ApiController extends Controller
{
    // get subcategory
    public function getSubcategory($cate_id)
    {
        $allSubCategory = SubCategory::where('category', $cate_id)->where('is_deleted', 0)->where('is_active', 1)->select(['name', 'id'])->get();
        return response()->json($allSubCategory);
    }
    // get resubcate
    public function getReSubcategory($subcate_id)
    {
        $maindata = ReSubCategory::where('sub_category', $subcate_id)->where('is_deleted', 0)->where('is_active', 1)->select(['name', 'id'])->get();
        return response()->json($maindata);
    }
    // re re subcategory
    public function getReReSubcategory($resubcate_id)
    {

        $maindata = ReReSubCategory::where('re_sub_category', $resubcate_id)->where('is_deleted', 0)->where('is_active', 1)->select(['name', 'id'])->get();
        return response()->json($maindata);

    }
    // re re re subcategory
    public function getreReReSubcategory($resubcate_id)
    {
        $maindata = ReReReSubCategory::where('re_re_sub_category', $resubcate_id)->where('is_deleted', 0)->where('is_active', 1)->select(['name', 'id'])->get();
        return response()->json($maindata);
    }

    // get shop
    public function getShop($shop_id)
    {

        $data     = Shop::where('id', $shop_id)->select(['id', 'shopcategory_id'])->first();
        $maindata = ShopCategory::where('id', $data->shopcategory_id)->first();
        return response()->json($maindata);

    }

    // get product
    public function getProductdetails($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        return response()->json($product);
    }

    public function getDistrict($division_id)
    {
        $data = District::where('division_id', $division_id)->get();
        return response()->json($data);
    }
}
