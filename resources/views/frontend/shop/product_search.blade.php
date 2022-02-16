@extends('layouts.frontend')
@section('title', 'Shop')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ $search_name }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $search_name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<!-- section start -->
<section class="section-b-space ratio_asos">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="collection-product-wrapper">
                                    <div class="product-wrapper-grid">
                                        <div class="row margin-res">
                                            @forelse ($products as $product)
                                            <div class="col-xl-3 col-6 col-grid-box">
                                                <form id="cartsection-{{ $product->id }}">
                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                    <input type="hidden" name="name" value="{{$product->product_name}}">
                                                    <input type="hidden" name="product_sku"
                                                        value="{{$product->product_sku}}">
                                                    <input type="hidden" name="image" value="{{$product->image}}">
                                                    <input type="hidden" name="price"
                                                        value="{{$product->product_price}}">
                                                    <input type="hidden" name="shop_id" value="{{$product->shop_id}}">
                                                    <input type="hidden" name="product_quantity" value="1">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a
                                                                    href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}"><img
                                                                        src="{{ asset('uploads/products/'.$product->image) }}"
                                                                        class="img-fluid blur-up lazyload bg-img"
                                                                        alt=""></a>
                                                            </div>
                                                            <div class="cart-detail">
                                                                <button id="{{$product->id}}" type="button"
                                                                    onclick="addtocart(this)" title="Add to cart"><i
                                                                        class="ti-shopping-cart"></i></button>

                                                                <a id="{{$product->id}}" href="javascript:void(0)"
                                                                    onclick="addtowishlist(this)"
                                                                    title="Add to Wishlist"><i class="ti-heart"
                                                                        aria-hidden="true"></i></a>
                                                                <a class="productdetails" data-id="{{ $product->id }}"
                                                                    data-bs-toggle="modal" data-bs-target="#quick-view"
                                                                    title="Quick View"><i class="ti-search"
                                                                        aria-hidden="true"></i></a>
                                                                <a href="compare.html" title="Compare"><i
                                                                        class="ti-reload" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div>
                                                                <div class="rating"><i class="fa fa-star"></i> <i
                                                                        class="fa fa-star"></i> <i
                                                                        class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i> <i
                                                                        class="fa fa-star"></i>
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
                                            @empty
                                            <h5 class="text-center text-danger">no products found</h5>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="product-pagination">
                                        <div class="theme-paggination-block">
                                            <div class="row">
                                                {{ $products->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section End -->
@endsection