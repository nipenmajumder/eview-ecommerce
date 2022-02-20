<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FilterProductController extends Controller
{
    public function filterShop(Request $request)
    {
        // dd($request->all());
        $products = Product::query()->isActive()->isDeleted()->isApprove();
        if ($request->category == null && $request->brand == null && $request->price == null && $request->sortingval == null) {
            $products = $products;
        }
        if (isset($request["category"])) {
            $products = $products->whereIn('category_id', $request->category);
        }
        if (isset($request["brand"])) {
            $products = $products->whereIn('brand_id', $request->brand);
        }
        if (isset($request["brand"]) && isset($request["category"])) {
            $products = $products->whereIn('category_id', $request->category)->whereIn('brand_id', $request->brand);
        }

        if (isset($request["price"])) {
            $priceVal = implode(',', $request->price);

            if ($priceVal == 1) {
                $products = $products->where('product_price', '>', '1')->where('product_price', '<=', '100');
            } elseif ($priceVal == 2) {
                $products = $products->where('product_price', '>', '101')->where('product_price', '<=', '500');
            } elseif ($priceVal == 3) {
                $products = $products->where('product_price', '>', '501')->where('product_price', '<=', '1000');
            } elseif ($priceVal == 4) {
                $products = $products->where('product_price', '>', '1001')->where('product_price', '<=', '10000');
            }
        }
        if (isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->orderBy('product_name', 'ASC');
            }
        }
        if (isset($request["brand"]) && isset($request["category"])) {
            $products = $products->whereIn('category_id', $request->category)->whereIn('brand_id', $request->brand);
        }
        if (isset($request["category"]) && isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->whereIn('category_id', $request->category)->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('category_id', $request->category)->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('category_id', $request->category)->orderBy('product_name', 'ASC');
            }
        }
        if (isset($request["category"]) && isset($request["brand"]) && isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('category_id', $request->category)->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('category_id', $request->category)->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('category_id', $request->category)->orderBy('product_name', 'ASC');
            }
        }
        $products = $products->get();
        return view('frontend.shop.filter-product.filter-shop', compact('products'));
    }
    public function filterCategoryShop(Request $request)
    {
        $products = Product::query()->isActive()->isDeleted()->isApprove()->where('category_id', $request->category);
        if ($request->subcategory == null && $request->brand == null && $request->price == null && $request->sortingval == null) {
            $products = $products;
        }
        if (isset($request["subcategory"])) {
            $products = $products->whereIn('subcategory_id', $request->subcategory);
        }
        if (isset($request["brand"])) {
            $products = $products->whereIn('brand_id', $request->brand);
        }
        if (isset($request["price"])) {
            $priceVal = implode(',', $request->price);

            if ($priceVal == 1) {
                $products = $products->where('product_price', '>', '1')->where('product_price', '<=', '100');
            } elseif ($priceVal == 2) {
                $products = $products->where('product_price', '>', '101')->where('product_price', '<=', '500');
            } elseif ($priceVal == 3) {
                $products = $products->where('product_price', '>', '501')->where('product_price', '<=', '1000');
            } elseif ($priceVal == 4) {
                $products = $products->where('product_price', '>', '1001')->where('product_price', '<=', '10000');
            }
        }
        if (isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->orderBy('product_name', 'ASC');
            }
        }
        if (isset($request["subcategory"]) && isset($request["brand"])) {
            $products = $products->whereIn('subcategory_id', $request->subcategory)->whereIn('brand_id', $request->brand);
        }
        if (isset($request["subcategory"]) && isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->whereIn('subcategory_id', $request->subcategory)->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('subcategory_id', $request->subcategory)->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('subcategory_id', $request->subcategory)->orderBy('product_name', 'ASC');
            }
        }
        if (isset($request["subcategory"]) && isset($request["brand"]) && isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('subcategory_id', $request->subcategory)->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('subcategory_id', $request->subcategory)->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('subcategory_id', $request->subcategory)->whereIn('brand_id', $request->brand)->orderBy('product_name', 'ASC');
            }
        }
        $products = $products->get();
        return view('frontend.shop.filter-product.filter-category-shop', compact('products'));
    }

    public function filterSubCategoryShop(Request $request)
    {
        $products = Product::query()->isActive()->isDeleted()->isApprove()->where('subcategory_id', $request->sub_category);
        if ($request->sub_category == null && $request->brand == null && $request->price == null && $request->sortingval == null) {
            $products = $products;
        }
        if (isset($request["re_sub_category"])) {
            $products = $products->whereIn('resubcategory_id', $request->re_sub_category);
        }
        if (isset($request["brand"])) {
            $products = $products->whereIn('brand_id', $request->brand);
        }
        if (isset($request["brand"]) && isset($request["re_sub_category"])) {
            $products = $products->whereIn('resubcategory_id', $request->re_sub_category)->whereIn('brand_id', $request->brand);
        }
        if (isset($request["price"])) {
            $priceVal = implode(',', $request->price);
            if ($priceVal == 1) {
                $products = $products->where('product_price', '>', '1')->where('product_price', '<=', '100');
            } elseif ($priceVal == 2) {
                $products = $products->where('product_price', '>', '101')->where('product_price', '<=', '500');
            } elseif ($priceVal == 3) {
                $products = $products->where('product_price', '>', '501')->where('product_price', '<=', '1000');
            } elseif ($priceVal == 4) {
                $products = $products->where('product_price', '>', '1001')->where('product_price', '<=', '10000');
            }
        }
        if (isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->orderBy('product_name', 'ASC');
            }
        }
        if (isset($request["brand"]) && isset($request["re_sub_category"])) {
            $products = $products->whereIn('resubcategory_id', $request->re_sub_category)->whereIn('brand_id', $request->brand);
        }
        if (isset($request["re_sub_category"]) && isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->whereIn('resubcategory_id', $request->re_sub_category)->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('resubcategory_id', $request->re_sub_category)->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('resubcategory_id', $request->re_sub_category)->orderBy('product_name', 'ASC');
            }
        }
        if (isset($request["re_sub_category"]) && isset($request["brand"]) && isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('resubcategory_id', $request->re_sub_category)->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('resubcategory_id', $request->re_sub_category)->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('resubcategory_id', $request->re_sub_category)->whereIn('brand_id', $request->brand)->orderBy('product_name', 'ASC');
            }
        }
        $products = $products->paginate(4);
        return view('frontend.shop.filter-product.filter-sub-category-shop', compact('products'));
    }

    public function filterReSubCategoryShop(Request $request)
    {
        $products = Product::query()->isActive()->isDeleted()->isApprove()->where('resubcategory_id', $request->re_sub_category);
        if ($request->re_re_sub_category == null && $request->brand == null && $request->price == null && $request->sortingval == null) {
            $products = $products;
        }
        if (isset($request["re_re_sub_category"])) {
            $products = $products->whereIn('child_resubcategory', $request->re_re_sub_category)->paginate();
        }
        if (isset($request["brand"])) {
            $products = $products->whereIn('brand_id', $request->brand);
        }

        if (isset($request["price"])) {
            $priceVal = implode(',', $request->price);
            if ($priceVal == 1) {
                $products = $products->where('product_price', '>', '1')->where('product_price', '<=', '100');
            } elseif ($priceVal == 2) {
                $products = $products->where('product_price', '>', '101')->where('product_price', '<=', '500');
            } elseif ($priceVal == 3) {
                $products = $products->where('product_price', '>', '501')->where('product_price', '<=', '1000');
            } elseif ($priceVal == 4) {
                $products = $products->where('product_price', '>', '1001')->where('product_price', '<=', '10000');
            }
        }
        if (isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->orderBy('product_name', 'ASC');
            }
        }
        if (isset($request["brand"]) && isset($request["re_re_sub_category"])) {
            $products = $products->whereIn('child_resubcategory', $request->re_re_sub_category)->whereIn('brand_id', $request->brand);

        }

        if (isset($request["re_re_sub_category"]) && isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->whereIn('child_resubcategory', $request->re_re_sub_category)->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('child_resubcategory', $request->re_re_sub_category)->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('child_resubcategory', $request->re_re_sub_category)->orderBy('product_name', 'ASC');
            }
        }
        if (isset($request["re_re_sub_category"]) && isset($request["brand"]) && isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('child_resubcategory', $request->re_re_sub_category)->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('child_resubcategory', $request->re_re_sub_category)->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('child_resubcategory', $request->re_re_sub_category)->whereIn('brand_id', $request->brand)->orderBy('product_name', 'ASC');
            }
        }
        $products = $products->get();
        return view('frontend.shop.filter-product.filter-re-sub-category-shop', compact('products'));
    }

    public function filter11OfferShop(Request $request)
    {
        // dd($request->all());
        $products = Product::query()->isActive()->isDeleted()->isApprove()->haveDiscount()->offer11()->orderBy('id', 'DESC');
        if ($request->category == null && $request->brand == null && $request->price == null && $request->sortingval == null) {
            $products = $products;
        }
        if (isset($request["category"])) {
            $products = $products->whereIn('category_id', $request->category);
        }
        if (isset($request["brand"])) {
            $products = $products->whereIn('brand_id', $request->brand);
        }
        if (isset($request["brand"]) && isset($request["category"])) {
            $products = $products->whereIn('category_id', $request->category)->whereIn('brand_id', $request->brand);
        }

        if (isset($request["price"])) {
            $priceVal = implode(',', $request->price);

            if ($priceVal == 1) {
                $products = $products->where('product_price', '>', '1')->where('product_price', '<=', '100');
            } elseif ($priceVal == 2) {
                $products = $products->where('product_price', '>', '101')->where('product_price', '<=', '500');
            } elseif ($priceVal == 3) {
                $products = $products->where('product_price', '>', '501')->where('product_price', '<=', '1000');
            } elseif ($priceVal == 4) {
                $products = $products->where('product_price', '>', '1001')->where('product_price', '<=', '10000');
            }
        }
        if (isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->orderBy('product_name', 'ASC');
            }
        }
        if (isset($request["brand"]) && isset($request["category"])) {
            $products = $products->whereIn('category_id', $request->category)->whereIn('brand_id', $request->brand);
        }
        if (isset($request["category"]) && isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->whereIn('category_id', $request->category)->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('category_id', $request->category)->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('category_id', $request->category)->orderBy('product_name', 'ASC');
            }
        }
        if (isset($request["category"]) && isset($request["brand"]) && isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('category_id', $request->category)->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('category_id', $request->category)->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('category_id', $request->category)->orderBy('product_name', 'ASC');
            }
        }
        $products = $products->get();
        return view('frontend.shop.filter-product.filter-offer-11-shop', compact('products'));
    }

    public function filter22OfferShop(Request $request)
    {
        // dd($request->all());
        $products = Product::query()->isActive()->isDeleted()->isApprove()->haveDiscount()->offer22()->orderBy('id', 'DESC');
        if ($request->category == null && $request->brand == null && $request->price == null && $request->sortingval == null) {
            $products = $products;
        }
        if (isset($request["category"])) {
            $products = $products->whereIn('category_id', $request->category);
        }
        if (isset($request["brand"])) {
            $products = $products->whereIn('brand_id', $request->brand);
        }
        if (isset($request["brand"]) && isset($request["category"])) {
            $products = $products->whereIn('category_id', $request->category)->whereIn('brand_id', $request->brand);
        }

        if (isset($request["price"])) {
            $priceVal = implode(',', $request->price);

            if ($priceVal == 1) {
                $products = $products->where('product_price', '>', '1')->where('product_price', '<=', '100');
            } elseif ($priceVal == 2) {
                $products = $products->where('product_price', '>', '101')->where('product_price', '<=', '500');
            } elseif ($priceVal == 3) {
                $products = $products->where('product_price', '>', '501')->where('product_price', '<=', '1000');
            } elseif ($priceVal == 4) {
                $products = $products->where('product_price', '>', '1001')->where('product_price', '<=', '10000');
            }
        }
        if (isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->orderBy('product_name', 'ASC');
            }
        }
        if (isset($request["brand"]) && isset($request["category"])) {
            $products = $products->whereIn('category_id', $request->category)->whereIn('brand_id', $request->brand);
        }
        if (isset($request["category"]) && isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->whereIn('category_id', $request->category)->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('category_id', $request->category)->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('category_id', $request->category)->orderBy('product_name', 'ASC');
            }
        }
        if (isset($request["category"]) && isset($request["brand"]) && isset($request["sortingval"])) {
            $sortVal = implode(',', $request->sortingval);
            if ($sortVal == 1) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('category_id', $request->category)->orderBy('product_price', 'ASC');
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('category_id', $request->category)->orderBy('product_price', 'DESC');
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('brand_id', $request->brand)->whereIn('category_id', $request->category)->orderBy('product_name', 'ASC');
            }
        }
        $products = $products->get();
        return view('frontend.shop.filter-product.filter-offer-22-shop', compact('products'));
    }
}
