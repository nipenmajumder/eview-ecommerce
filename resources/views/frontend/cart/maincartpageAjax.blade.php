<table class="table cart-table cart_summary">
    <thead>
        <tr class="table-head">
            <th scope="col">Product</th>
            <th scope="col">Description</th>
            <th scope="col">Unit price</th>
            <th scope="col">Qty</th>
            <th scope="col">Total</th>
            <th scope="col">Remove</th>
        </tr>
    </thead>
    <tbody>
        @foreach(Cart::content() as $cartItem)
        <tr>
            @foreach($cartItem->options as $key => $image)
            @if($key==0)
            <td><a><img src="{{asset('uploads/products/'.$image)}}" alt=""></a>
            </td>
            @endif
            @endforeach
            <td><a href="#">{{$cartItem->name}}</a>
                <div class="mobile-cart-content row">
                    <div class="col">
                        <h2 class="td-color">
                            <p class="text-primary">In stock</p>
                        </h2>
                    </div>
                    <div class="col">
                        <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a>
                        </h2>
                    </div>
                </div>
            </td>

            <td>
                <h2 class="td-color">৳{{ $cartItem->price }}</h2>
            </td>
            <td>
                <div class="qty-box">
                    <div class="input-group">
                        <input type="number" onchange="cartqtyupdate(this)" id="{{ $cartItem->rowId }}" max="10" min="1"
                            value="{{$cartItem->qty}}" name="qty" class="form-control input-number">
                    </div>
                </div>
            </td>
            <td>
                <h2 class="td-color">৳{{ $cartItem->price * $cartItem->qty }}</h2>
            </td>
            <td><a onclick="deletedata(this)" id="{{$cartItem->rowId}}" class="icon"><i class="ti-close"></i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="table-responsive-md">
    <table class="table cart-table ">
        <tfoot>
            <tr>
                <td>total price :</td>
                <td>
                    <h2>৳{{Cart::subtotal()}}</h2>
                </td>
            </tr>
        </tfoot>
    </table>
</div>