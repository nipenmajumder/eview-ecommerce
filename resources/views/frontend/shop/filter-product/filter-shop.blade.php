<div class="row margin-res">
    @foreach ($products as $product)
    <div class="col-xl-3 col-6 col-grid-box">
        <form id="cartsection-{{ $product->id }}">
            <input type="hidden" name="id" value="{{$product->id}}">
            <input type="hidden" name="name" value="{{$product->product_name}}">
            <input type="hidden" name="product_sku" value="{{$product->product_sku}}">
            <input type="hidden" name="image" value="{{$product->image}}">
            <input type="hidden" name="price" value="{{$product->product_price}}">
            <input type="hidden" name="product_quantity" value="1">
            <div class="product-box">
                <div class="img-wrapper">
                    <div class="front">
                        <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}"><img
                                src="{{ asset('uploads/products/'.$product->image) }}"
                                class="img-fluid blur-up lazyload bg-img" alt=""></a>
                    </div>
                    <div class="cart-detail">
                        <button id="{{$product->id}}" type="button" onclick="addtocart(this)" title="Add to cart"><i
                                class="ti-shopping-cart"></i></button>
                        <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                aria-hidden="true"></i></a>
                        <a class="productdetails" data-id="{{ $product->id }}" data-bs-toggle="modal"
                            data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                aria-hidden="true"></i></a>
                        <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="product-detail">
                    <div>
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>{{ $product->product_name }}</h6>
                        </a>
                        <h4>৳ {{ $product->product_price }}</h4>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endforeach
</div>
<div class="product-pagination">
    <div class="theme-paggination-block">
        <div class="row">
            {{ $products->links() }}
            {{-- <div class="col-xl-6 col-md-6 col-sm-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span
                                    aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                                <span class="sr-only">Previous</span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                    aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                <span class="sr-only">Next</span></a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="product-search-count-bottom">
                    <h5>Showing Products 1-24 of 10 Result</h5>
                </div>
            </div> --}}
        </div>
    </div>
</div>