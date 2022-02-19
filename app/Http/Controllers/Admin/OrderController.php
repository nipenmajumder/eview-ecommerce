<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function allneworder(){

        $alldata=Order::where('order_status',0)->orderBy('id','DESC')->get();
        return view('backend.order.neworder',compact('alldata'));
    }
    public function invoiceOrder($id){

        $data=Order::where('id',$id)->first();
        return view('backend.order.invoice',compact('data'));
    }
    // 
    public function updateOrder($id){
        $data=Order::where('id',$id)->first();
        return view('backend.order.orderupdate',compact('data'));
    }
    // update order controller
    public function updateOrderSubmit(Request $request){
     
        $product_data = [];
        $company_data = [];
        $total_price=0;
        $total_item=0;
        $total_qty=0;
        foreach ($request->id as $key => $item) {
            $products[] = [
                'id'           => $request->id[$key],
                'product_name' => $request->product_name[$key] ?? '',
                'image'        => $request->image[$key] ?? '',
                'sku'          => $request->sku[$key] ?? '',
                'shop_id'      => $request->shop_id[$key] ?? '',
                'qty'          => $request->qty[$key] ?? '',
                'price'        => $request->price[$key] ?? '',
                'subtotal'     => $request->subtotal[$key] ?? '',
            ];
            $company_id = $request->shop_id[$key];
            array_push($company_data, $company_id);
            $total_item++;
            $total_qty=$total_qty + $request->qty[$key];
            $total_price=$total_price + $request->subtotal[$key];
        }
        

        $update=Order::where('id',$request->row_id)->update([
            'products'=>json_encode($products),
            'total_item'=>$total_item,
            'total_qty'=>$total_qty,
            'cart_total'=>$total_price,
            'company_id'=>$company_data,
            'total_amount'=>$total_price + $request->delivery_charge,
        ]);
        if($update){
            $notification = array(
                'messege' => 'Insert success!',
                'alert-type' => 'success'
              );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'insert Faild!',
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
       
    }


    // 
    public function Processingstatus($id){
        $update=Order::where('id',$id)->update([
            'order_status'=>1,
        ]);
        if($update){
            $notification = array(
                'messege' => 'Insert success!',
                'alert-type' => 'success'
              );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'insert Faild!',
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }
    // 
    public function deleverorder($id){
        // $update=Order::where('id',$id)->update([
        //     'order_status'=>3,
        // ]);
        $productsellqtyupdate=Order::where('id',$id)->first();
    
        foreach(json_decode($productsellqtyupdate->products) as $key => $nproduct){

            $sell_qty=Product::where('id',$nproduct->id)->update([
                'sell_qty'=>Product::where('id',$nproduct->id)->first()->sell_qty + $nproduct->qty,
            ]);

        }


        // if($update){
        //     $notification = array(
        //         'messege' => 'Insert success!',
        //         'alert-type' => 'success'
        //       );
        //     return redirect()->back()->with($notification);
        // }else{
        //     $notification = array(
        //         'messege' => 'insert Faild!',
        //         'alert-type' => 'error'
        //       );
        //     return redirect()->back()->with($notification);
        // }
    }
        // 
    public function rehjectorder($id){
        $update=Order::where('id',$id)->update([
            'order_status'=>2,
        ]);
        if($update){
            $notification = array(
                'messege' => 'Insert success!',
                'alert-type' => 'success'
                );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'insert Faild!',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }
    public function returnorder($id){
        $update=Order::where('id',$id)->update([
            'order_status'=>4,
        ]);
        if($update){
            $notification = array(
                'messege' => 'Insert success!',
                'alert-type' => 'success'
                );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'insert Faild!',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }

    public function processingorder(){
        $alldata=Order::where('order_status',1)->orderBy('id','DESC')->get();
        return view('backend.order.processingorder',compact('alldata'));
    }
}
