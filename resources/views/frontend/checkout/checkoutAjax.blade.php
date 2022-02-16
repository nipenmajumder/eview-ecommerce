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

        <li>Delevery Charge <span class="count" id="shopping_amount">৳<p style="margin-top: 4px;
            color: var(--theme-deafult); display: inline;">{{shoppingChargeDefault() }}</p></span>
        </li>
    </ul>
    <ul class="total">
        <li>Total <span class="count">৳<p style="margin-top: 4px;
            color: var(--theme-deafult); display: inline;" id="delfult_grand_total_amount">{{ str_replace(',', '',
                    Cart::subtotal()) +
                    shoppingChargeDefault() }}</p></span>
        </li>
    </ul>
</div>
{{-- @php echo str_replace(',', '', Cart::subtotal()) + $deliveryCharge;@endphp --}}
<div class="payment-box">
    <input type="hidden" name="products[]" value="{{Cart::content()}}">
    <input type="hidden" id="shopping_amount" name="delivery_charge" value="{{shoppingChargeDefault() }}">
    <input type="hidden" id="delfult_grand_total_amount_2" name="total_amount" value="{{ str_replace(',', '', Cart::subtotal()) +
            shoppingChargeDefault() }}">
    <input type="hidden" name="total_item" id="total_item" value="{{Cart::count();}}">
    <input type="hidden" name="total_qty" id="total_qty" value="{{Cart::count();}}">
    <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
    <div class="text-end">
        <button type="submit" class="btn-solid btn">Place Order</button>
    </div>
</div>