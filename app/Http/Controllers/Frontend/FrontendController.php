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

        $allSlider         = Slider::select(['image'])->isActive()->get();
        $allProduct        = Product::isDeleted()->isActive()->orderBy('id', 'DESC')->limit(10)->get();
        $newProducts       = Product::isDeleted()->isActive()->orderBy('id', 'DESC')->limit(12)->get();
        $allelevenproduct  = Product::haveDiscount()->offer11()->isDeleted()->isActive()->orderBy('id', 'DESC')->limit(10)->get();
        $allSpecialproduct = Product::haveDiscount()->specialOffer()->isDeleted()->isActive()->orderBy('id', 'DESC')->get();
        $alltweentyproduct = Product::haveDiscount()->offer22()->isDeleted()->isActive()->orderBy('id', 'DESC')->get();
        $topSaleCategory   = Category::isDeleted()->isActive()
            ->with(['product' => function ($query) {
                $query->isDeleted()->isActive()->orderBy('id', 'DESC');
            }])->limit(4)->get();
        $mainfivecategory = Category::isDeleted()->isActive()->orderBy('id', 'DESC')->get();
        return view('frontend.home.index', compact('mainfivecategory', 'allSlider', 'allProduct', 'allelevenproduct', 'allSpecialproduct', 'alltweentyproduct', 'topSaleCategory', 'newProducts'));
    }
    // product details
    public function productDetails($slug, $id)
    {
        $data             = Product::isID($id)->with('Category', 'SubCategory_id')->isActive()->first();
        $related_products = Product::where('category_id', $data->category_id)->isActive()->notID($data->id)
            ->select('product_name', 'product_price', 'image')
            ->limit(6)->orderBy('id', 'DESC')->get();
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
