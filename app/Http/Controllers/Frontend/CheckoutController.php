<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        $user    = User::where('id', Auth::user()->id)->where('is_verified', 1)->first();
        $country = DB::table('country')->where('id', auth()->user()->country)->first();

        // return $user;
        // dd($user);
        return view("frontend.checkout.checkout", compact('user', 'country'));
    }

    public function getCheckoutCartItem()
    {
        $cartData = Cart::content();
        //return $cartData;
        return view('frontend.checkout.checkoutAjax', compact('cartData'));
    }

    public function save(Request $request)
    {

        $validated = $request->validate([
            'shipping_name'    => 'required',
            'shipping_phone'   => 'required',
            'shipping_email'   => 'required',
            'shipping_zip'     => 'required',
            'country_name'     => 'required',
            'city_name'        => 'required',
            'shipping_address' => 'required',
            'customer_id'      => 'required',
            'total_item'       => 'required',
            'total_qty'        => 'required',
            'delivery_charge'  => 'required',
            'total_amount'     => 'required',
        ]);
        $orderId = Auth::user()->id . rand(5555, 99999) . date('dmy');
        $insert  = Order::insertGetId([
            'shipping_name'    => $request->shipping_name,
            'shipping_phone'   => $request->shipping_phone,
            'shipping_email'   => $request->shipping_email,
            'shipping_zip'     => $request->shipping_zip,
            'division'         => $request->division,
            'district'         => $request->district,
            'shipping_address' => $request->shipping_address,
            'billing_id'       => $request->billing_id,
            'total_item'       => $request->total_item,
            'total_qty'        => $request->total_qty,
            'delivery_charge'  => $request->delivery_charge,
            'total_amount'     => $request->total_amount,
            'order_id'         => $orderId,
            'products'         => json_encode($request->products),
            'created_at'       => Carbon::now()->toDateTimeString(),
        ]);

        $update = Order::where('id', $insert)->update([
            'invoice_id' => $insert . rand(111, 99999),
        ]);

        $cartData = Cart::content();
        // $array = array();
        foreach ($cartData as $item) {
            $products[] = [
                'id'           => $item->id,
                'product_name' => $item->name,
                'sku'          => $item->option,
                'qty'          => $item->qty,
                'price'        => $item->price,
                'subtotal'     => $item->subtotal,
            ];
        }
        $update = Order::where('id', $insert)->update([
            'products' => json_encode($products),
        ]);

        Cart::destroy();
        return redirect('/checkout/payment/' . $orderId);
    }

    public function paymentMethods($order_id)
    {
        // return $order_id;
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
            Alert::toast('Your Order  Has Successfully Completed', 'success');
            return redirect('/dashboard/orders');
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
            Alert::toast('Your Order Has Successfully Completed', 'success');
            return redirect('/dashboard/orders');
        }
    }
}
