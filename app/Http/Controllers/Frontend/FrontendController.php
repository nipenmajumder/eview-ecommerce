<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;


class FrontendController extends Controller
{
    // home section
    public function home(){

        $allSlider=Slider::select(['image'])->where('is_active',1)->get();
        $allProduct=Product::where('is_deleted',0)->orderBy('id','DESC')->limit(10)->get();
        $allelevenproduct=Product::where('have_a_discount',1)->where('offer','11_offer')->where('is_deleted',0)->orderBy('id','DESC')->limit(10)->get();
        $allSpecialproduct=Product::where('have_a_discount',1)->where('offer','special_offer')->where('is_deleted',0)->orderBy('id','DESC')->get();
        $alltweentyproduct=Product::where('have_a_discount',1)->where('offer','22_offer')->where('is_deleted',0)->orderBy('id','DESC')->get();
        
        $topSaleCategory=Category::where('is_deleted',0)->where('is_active',1)
        ->with(['product' => function ($query) {
            $query->where('is_deleted', 0)->where('is_active', 1)->orderBy('id','DESC');
        }])->limit(4)->get();
        return view('frontend.home.index',compact('allSlider','allProduct','allelevenproduct','allSpecialproduct','alltweentyproduct','topSaleCategory'));

    }
    // product details
    public function productDetails($slug,$id){
        $data=Product::where('id',$id)->with('Category','SubCategory_id')->first();
        return view('frontend.product_details.details',compact('data'));
    }
}
