<div class="order-box">
    <div class="title-box">
        <div>Product <span>Total</span></div>
        {{-- {{ dd(Cart::content()) }} --}}
    </div>
    <ul class="qty">
        @foreach (Cart::content() as $cartItem)

        <li>{{ $cartItem->name }} × {{ $cartItem->qty }} <span>৳{{ $cartItem->subtotal
                }}</span></li>
        @endforeach
    </ul>
    <ul class="sub-total">
        <li>Subtotal <span class="count">৳{{ Cart::subtotal() }}</span></li>
        @php
        $deliveryCharge = 70;
        @endphp
        <li>Delevery Charge<span class="count">৳{{ $deliveryCharge }}</span></li>
    </ul>
    <ul class="total">
        <li>Total <span class="count">৳{{ Cart::subtotal() + $deliveryCharge }}</span>
        </li>
    </ul>
</div>
<div class="payment-box">
    <input type="hidden" name="products[]" value="{{Cart::content()}}">
    <input type="hidden" id="delivery_charge" name="delivery_charge" value="{{ $deliveryCharge }}">
    <input type="hidden" id="total_amount" name="total_amount"
        value="@php echo  str_replace(',', '', Cart::subtotal()) + $deliveryCharge;@endphp">
    <input type="hidden" name="total_item" id="total_item" value="{{Cart::count();}}">
    <input type="hidden" name="total_qty" id="total_qty" value="{{Cart::count();}}">
    <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
    <div class="text-end">
        <button type="submit" class="btn-solid btn">Place Order</button>
    </div>
</div>