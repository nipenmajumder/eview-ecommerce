<h5 class="card-header">My Cart <span class="text-secondary float-right">({{Cart::count();}})</span></h5>
<input type="hidden" name="total_item" id="total_item" value="{{Cart::count();}}">
<input type="hidden" name="total_qty" id="total_qty" value="{{Cart::count();}}">
<div class="cart-list-product" style="overflow-y: auto;
height: 400px;">
    @foreach(Cart::content() as  $cartItem)
    <div class="cart-list-product">
        <a class="float-right remove-cart" onclick="deletedata(this)"  id="{{$cartItem->rowId}}"><i class="mdi mdi-close"></i></a>
        @foreach($cartItem->options as $key => $image)
            @if($key==0)
                <img class="img-fluid" src="{{asset('uploads/product/'.$image)}}" alt="">
            @endif
        @endforeach
        <span class="badge badge-success">50% OFF</span>
        <h5><a href="#">{{Str::limit($cartItem->name,20)}}</a></h5>
        <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
        <h6><strong><span class="mdi mdi-approval"></span> Quantity</strong> - {{$cartItem->qty}}</h6>
        <p class="offer-price mb-0">৳ {{$cartItem->subtotal}}  
            {{-- <i class="mdi mdi-tag-outline"></i> <span class="regular-price">$800.99</span> --}}
        </p>
    </div>
    <input type="hidden" name="products[]"  value="{{Cart::content()}}">
 
   @endforeach
</div>
@php 
$deliveryCharge = 50;
@endphp
<div class="cart-sidebar-footer">
   <div class="cart-store-details">
      <input type="hidden" id="delivery_charge" name="delivery_charge" value="{{$deliveryCharge}}">
      <input type="hidden" id="total_amount" name="total_amount" value="@php echo  str_replace(',', '', Cart::subtotal()) + $deliveryCharge;@endphp">
      <p >Sub Total <strong class="float-right" >৳ {{Cart::subtotal()}}</strong></p>
      <p >Delivery Charges <strong class="float-right text-danger" > + ৳ {{$deliveryCharge}} </strong></p>
   </div>
   <a><button class="btn btn-secondary btn-lg btn-block text-left" type="submit"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Payment </span><span class="float-right"><strong>৳ @php echo  str_replace(',', '', Cart::subtotal()) + $deliveryCharge;@endphp</strong> <span class="mdi mdi-chevron-right"></span></span></button></a>
</div>
</div>