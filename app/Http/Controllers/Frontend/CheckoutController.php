<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ShoppingCharge;
use App\Models\User;
use Carbon\Carbon;
use Devfaysal\BangladeshGeocode\Models\Division;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        $user      = User::isUser()->isVerified()->first();
        $divisions = Division::all();
        return view("frontend.checkout.checkout", compact('user', 'divisions'));
    }

    public function getCheckoutCartItem()
    {
        $cartData       = Cart::content();
        $shoppingCharge = ShoppingCharge::get();
        return view('frontend.checkout.checkoutAjax', compact('cartData', 'shoppingCharge'));
    }

    public function save(Request $request)
    {
        // dd($request->all());
        if (Cart::content()->count() > 0) {

            $validated = $request->validate([
                'shipping_name'     => 'required',
                'shipping_phone'    => 'required',
                'shipping_email'    => 'required',
                'shipping_zip'      => 'required',
                'shipping_division' => 'required',
                'shipping_city'     => 'required',
                'shipping_address'  => 'required',
                'customer_id'       => 'required',
                'total_item'        => 'required',
                'total_qty'         => 'required',
                'delivery_charge'   => 'required',
                'total_amount'      => 'required',
                'payment_status'    => 'required',
            ]);
            // dd($request->all());
            $orderId = Auth::user()->id . rand(5555, 99999);
            if ($request->shipping_city == 47) {
                $delivery_charge = shoppingChargeDhaka();
                $total_amount    = str_replace(',', '', Cart::subtotal()) + $delivery_charge;
            } else {
                $delivery_charge = shoppingChargeOutOfDhaka();
                $total_amount    = str_replace(',', '', Cart::subtotal()) + $delivery_charge;
            }
            $insert = Order::insertGetId([
                'shipping_name'     => $request->shipping_name,
                'shipping_phone'    => $request->shipping_phone,
                'shipping_email'    => $request->shipping_email,
                'shipping_zip'      => $request->shipping_zip,
                'shipping_division' => $request->shipping_division,
                'shipping_city'     => $request->shipping_city,
                'shipping_address'  => $request->shipping_address,
                'customer_id'       => $request->customer_id,
                'total_item'        => $request->total_item,
                'total_qty'         => $request->total_qty,
                'cart_total'        => str_replace(',', '', Cart::subtotal()),
                'delivery_charge'   => $delivery_charge,
                'total_amount'      => $total_amount,
                'order_id'          => $orderId,
                'payment_status'    => $request->payment_status,
                'products'          => json_encode($request->products),
                'created_at'        => Carbon::now()->toDateTimeString(),
            ]);
            $update = Order::where('id', $insert)->update([
                'invoice_id' => $insert . rand(111, 99999),
            ]);
            $cartData     = Cart::content();
            $company_data = [];
            foreach ($cartData as $item) {
                $products[] = [
                    'id'           => $item->id,
                    'product_name' => $item->name,
                    'image'        => $item->options[1],
                    'sku'          => $item->options[1],
                    'shop_id'      => $item->options[2],
                    'qty'          => $item->qty,
                    'price'        => $item->price,
                    'subtotal'     => $item->subtotal,
                ];

                $company_id = $item->options[2];
                array_push($company_data, $company_id);
            }

            $update = Order::where('id', $insert)->update([
                'products'   => json_encode($products),
                'company_id' => json_encode($company_data),
            ]);

            Cart::destroy();
            return redirect('/checkout/payment/' . $orderId);
        } else {
            $notification = [
                'messege'    => 'Your cart is empty! Please shop Somethings',
                'alert-type' => 'error',
            ];
            return \redirect('/shop')->with($notification);
        }
    }

    public function paymentMethods($order_id)
    {
        $data    = Order::where('order_id', $order_id)->first();
        $product = json_decode($data->products);
        return view("frontend.checkout.paymentMethod", compact('data', 'product'));
    }
    public function pay(Request $request)
    {
        if ($request->status == '1') {
            $update = Order::where('order_id', $request->order_id)->update([
                'status' => 1,
            ]);
            if ($update) {
                $notification = [
                    'messege'    => 'Your Order  Has Successfully Completed',
                    'alert-type' => 'success',
                ];
                return \redirect('/dashboard/orders')->with($notification);
            }

        } elseif ($request->status == '2') {
            $request->validate([
                'payment_method' => 'required',
                'trx_number'     => 'required',
            ]);
            $update = Order::where('order_id', $request->order_id)->update([
                'status'         => 2,
                'payment_method' => $request->payment_method,
                'trx_number'     => $request->trx_number,
            ]);
            if ($update) {
                $notification = [
                    'messege'    => 'Your Order  Has Successfully Completed',
                    'alert-type' => 'success',
                ];
                return redirect('/dashboard/orders')->with($notification);
            }
        }
    }
}
