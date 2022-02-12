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
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a
                                                                href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}"><img
                                                                    src="{{ asset('uploads/products/'.$product->image) }}"
                                                                    class="img-fluid blur-up lazyload bg-img"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="cart-detail"><a href="javascript:void(0)"
                                                                title="Add to Wishlist"><i class="ti-heart"
                                                                    aria-hidden="true"></i></a> <a
                                                                class="productdetails" data-id="{{ $product->id }}"
                                                                href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view" title="Quick View"><i
                                                                    class="ti-search" aria-hidden="true"></i></a> <a
                                                                href="compare.html" title="Compare"><i class="ti-reload"
                                                                    aria-hidden="true"></i></a></div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div>
                                                            <div class="rating"><i class="fa fa-star"></i> <i
                                                                    class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                            </div>
                                                            <a
                                                                href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                                                <h6>{{ $product->product_name }}</h6>
                                                            </a>
                                                            <h4>৳ {{ $product->product_price }}</h4>

                                                        </div>
                                                    </div>
                                                </div>
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