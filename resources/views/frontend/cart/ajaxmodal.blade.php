<form id="quickviewcartsection">
    <input type="hidden" name="id" value="{{$product->id}}">
    <input type="hidden" name="name" value="{{$product->product_name}}">
    <input type="hidden" name="product_sku" value="{{$product->product_sku}}">
    <input type="hidden" name="image" value="{{$product->image}}">
    <input type="hidden" name="discount_price" value="">
    <input type="hidden" name="discount_title" value="">
    <input type="hidden" name="shop_id" value="{{$product->shop_id}}">
    <input type="hidden" name="product_sku" value="{{$product->product_sku}}">
    <input type="hidden" name="product_quantity" value="1">
    <input type="hidden" name="user_id" value="{{ Request::ip() }}">
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="quick-view-img">
                <img src="{{ asset('uploads/products/'.$product->image) }}" class="img-fluid blur-up lazyload">
            </div>
        </div>
        <div class="col-lg-6 rtl-text">
            <div class="product-right">
                <h2 id="product_name">{{ $product->product_name }}</h2>

                <div class="border-product">
                    <h6 class="product-title">Product info</h6>
                    <!-- (#11 offer )-->
                    @if($today==$eleven && $product->offer=='11_offer' && $product->have_a_discount=='1')
                    @php
                    $discounted_price = ($product->product_price)-($product->product_price*(11/100));
                    @endphp
                    <h4 class="badge badge-grey-color">11% off</h4>
                    <h3 class="price-detail">৳ {{ $discounted_price }}
                        <del>৳ {{ $product->product_price }}</del>
                    </h3>
                    <input type="hidden" name="price" value="{{$discounted_price}}">
                    <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                    <!-- (#22_offer)-->
                    @elseif($today==$twenty_two && $product->offer=='22_offer' && $product->have_a_discount=='1')
                    @php
                    $discounted_price = ($product->product_price)-($product->product_price*(22/100));
                    @endphp
                    <h4 class="badge badge-grey-color">22% off</h4>
                    <h3 class="price-detail">৳ {{ $discounted_price }}
                        <del>৳ {{ $product->product_price }}</del>
                    </h3>
                    <input type="hidden" name="price" value="{{$discounted_price}}">
                    <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                    <!-- (#special_offer) -->
                    @elseif($product->offer=='special_offer' && $product->have_a_discount=='1')
                    <h4 class="badge badge-grey-color">special offer</h4>
                    <!-- (no offer) -->
                    @elseif($product->have_a_discount==null)
                    <h3 class="price-detail">৳ {{ $product->product_price }}</h3>
                    <input type="hidden" name="price" value="{{$product->product_price}}">
                    @else
                    <!-- (#2) endif start -->
                    @endif
                    @if($product->product_brand !=NULL)<p id="brand">brand:{{ $product->product_brand }}</p>@endif
                    @if($product->product_weight !=NULL) <p>Weight: {{ $product->product_weight }}</p>@endif
                    @if($product->style !=NULL) <p>Style: {{ $product->style }}</p>@endif
                    @if($product->product_materials !=NULL) <p>Materials: {{ $product->product_materials }}
                    </p>
                    @endif
                </div>
                <div class="product-description border-product">
                    <div class="size-box">

                    </div>
                    {{-- <h6 class="product-title">quantity</h6>
                    <div class="qty-box">
                        <div class="input-group"><span class="input-group-prepend"><button type="button"
                                    class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                        class="ti-angle-left"></i></button> </span>
                            <input type="text" name="quantity" class="form-control input-number" value="1">
                            <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus"
                                    data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span>
                        </div>
                    </div> --}}
                </div>
                <div class="product-buttons" id="product_button">
                    <a class="addquickcart btn btn-solid" onclick="quickviewcart()">add to cart</a>
                    <a href="#" class="btn btn-solid">view detail</a>
                </div>
            </div>
        </div>
    </div>
</form>