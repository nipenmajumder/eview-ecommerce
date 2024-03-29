<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // dd($request->all());
        Cart::add($request->id, $request->name, $request->product_quantity, $request->price, [
            $request->image,
            $request->product_sku,
            $request->shop_id,
            $request->product_main_price,
        ]);
        return response()->json([
            'success' => $request->name . ' ' . 'Added to Cart',
        ]);
    }

    public function getFlyingCartItem()
    {
        $flyingCartData = Cart::content();
        //return $cartData;
        return view('frontend.cart.flying-cart', compact('flyingCartData'));
    }
    public function getCartItem()
    {
        $cartData = Cart::content();
        //return $cartData;
        return view('frontend.cart.ajaxCart', compact('cartData'));
    }
    public function getCartQuantity()
    {

        $cartCount = Cart::count();
        return response()->json($cartCount);
    }

    public function getCartData()
    {

        $cartContent = Cart::content();
        // return view('frontend.include.header', \compact('cartContent'));
        // return response()->json($cartContent);
    }

    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json([
            'success' => 'Successfully Removed to Cart',
        ]);
    }

    //
    public function getMainCartItem()
    {
        $cartData = Cart::content();
        return view('frontend.cart.maincartpageAjax', compact('cartData'));
    }

    public function cart()
    {
        $cartData = Cart::content();
        return view('frontend.cart.cartpage', compact('cartData'));
    }

    public function removeFrommainCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json([
            'success' => 'Successfully Removed to Cart',
        ]);
    }

    public function qtyIncrease(Request $request, $rowId)
    {
        Cart::update($rowId, $request->qty);
        return response()->json([
            'success' => 'Successfully Increased Quantity',
        ]);
    }

    public function qtyIncreaseByOne(Request $request, $rowId)
    {
        $mainqty = $request->qty + 1;
        Cart::update($rowId, $mainqty);
        return response()->json([
            'success' => 'Successfully Quantity Changed',
        ]);
    }
    public function qtyDecreaseByOne(Request $request, $rowId)
    {
        $mainqty = $request->qty - 1;
        Cart::update($rowId, $mainqty);
        return response()->json([
            'success' => 'Successfully Quantity Changed',
        ]);
    }
}
