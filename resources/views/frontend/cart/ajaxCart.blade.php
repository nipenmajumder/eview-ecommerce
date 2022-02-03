<div><img src="{{ asset('frontend/assets') }}/images/icon/cart.png" class="img-fluid blur-up lazyload" alt=""> <i
        class="ti-shopping-cart"></i></div>
<span class="cart_qty_cls">{{ $cartData->count() }}</span>
<ul class="show-div shopping-cart">
    @foreach(Cart::content() as $cartItem)
    <li>
        <div class="media">
            @foreach($cartItem->options as $key => $image)
            @if($key==0)
            <a href="#"><img alt="" class="me-3" src="{{asset('uploads/products/'.$image)}}"></a>
            @endif
            @endforeach
            <div class="media-body">
                <a href="#">
                    <h4>{{Str::limit($cartItem->name,20)}}</h4>
                </a>
                <h4><span>{{$cartItem->qty}} x $ {{$cartItem->price}}</span></h4>
            </div>
        </div>
        <div class="close-circle"><a onclick="deletedata(this)" id="{{$cartItem->rowId}}"><i class="fa fa-times"
                    aria-hidden="true"></i></a></div>
    </li>
    @endforeach
    <li>
        <div class="total">
            <h5>subtotal : <span>${{Cart::subtotal()}}</span></h5>
        </div>
    </li>
    <li>
        <div class="buttons"><a href="{{ url('/products/cart') }}" class="view-cart">view
                cart</a> <a href="{{ url('/products/checkout') }}" class="checkout">checkout</a></div>
    </li>
</ul>