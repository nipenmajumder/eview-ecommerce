<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class FrontendController extends Controller
{
    // home section
    public function home()
    {

        $allSlider         = Slider::select(['image'])->where('is_active', 1)->get();
        $allProduct        = Product::where('is_deleted', 0)->where('is_active', 1)->orderBy('id', 'DESC')->limit(10)->get();
        $allelevenproduct  = Product::where('have_a_discount', 1)->where('is_active', 1)->where('offer', '11_offer')->where('is_deleted', 0)->orderBy('id', 'DESC')->limit(10)->get();
        $allSpecialproduct = Product::where('have_a_discount', 1)->where('is_active', 1)->where('offer', 'special_offer')->where('is_deleted', 0)->orderBy('id', 'DESC')->get();
        $alltweentyproduct = Product::where('have_a_discount', 1)->where('is_active', 1)->where('offer', '22_offer')->where('is_deleted', 0)->orderBy('id', 'DESC')->get();

        $topSaleCategory = Category::where('is_deleted', 0)->where('is_active', 1)
            ->with(['product' => function ($query) {
                $query->where('is_deleted', 0)->where('is_active', 1)->orderBy('id', 'DESC');
            }])->limit(4)->get();


        $mainfivecategory=Category::where('is_deleted', 0)->where('is_active', 1)->orderby('id','DESC')->get();
        return view('frontend.home.index', compact('mainfivecategory','allSlider', 'allProduct', 'allelevenproduct', 'allSpecialproduct', 'alltweentyproduct', 'topSaleCategory'));

    }
    // product details
    public function productDetails($slug, $id)
    {
        $data = Product::where('id', $id)->with('Category', 'SubCategory_id')->where('is_active', 1)->first();
        // dd($data);
        $related_products = Product::where('category_id', $data->category_id)->where('is_active', 1)->where('id', '!=', $data->id)
            ->select('product_name', 'product_price', 'image')
            ->limit(6)->orderBy('id', 'DESC')->get();
        // dd($related_products);
        return view('frontend.product_details.details', compact('data', 'related_products'));
    }
    public function aboutUs()
    {
        $data = AboutUs::select(['details', 'id'])->where('keyword', 'about_us')->first();
        return view('frontend.pages.about_us', compact('data'));
    }
    public function privacyPolicy()
    {
        $data = AboutUs::select(['details', 'id'])->where('keyword', 'privacy_policy')->first();
        return view('frontend.pages.privacy_policy', compact('data'));
    }
    public function termsCondition()
    {
        $data = AboutUs::select(['details', 'id'])->where('keyword', 'terms_condition')->first();
        return view('frontend.pages.terms_condition', compact('data'));
    }
}
