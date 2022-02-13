@extends('layouts.frontend')
@section('title', 'Home')
@section('content')


<!-- Home slider -->
<section class="p-0">
    <div class="slide-1 home-slider">

        @foreach($allSlider as $slider)
        <div>
            <div class="home">
                <img src="{{asset('uploads/slider/'.$slider->image)}}" alt="" class="bg-img blur-up lazyload">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="slider-contain">
                                <div>
                                    <h4>for kids</h4>
                                    <h1>spring collection</h1><a href="#" class="btn btn-solid">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</section>
<!-- Home slider end -->


<!-- collection banner -->
<section class="banner-padding absolute-banner pb-0 ratio2_1">
    <div class="container absolute-bg">
        <div class="row partition2">
            <div class="col-md-4">
                <a href="#">
                    <div class="collection-banner p-right text-center">
                        <div>
                            <img src="{{asset('frontend')}}/assets/images/furniture/banner/2.jpg"
                                class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner banner-3">
                            <div>
                                <h4>save 30%</h4>
                                <h2>outfits</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#">
                    <div class="collection-banner p-right text-center">
                        <div>
                            <img src="{{asset('frontend')}}/assets/images/furniture/banner/3.jpg"
                                class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner banner-3">
                            <div>
                                <h4 class="text-dark">save 60%</h4>
                                <h2 class="text-dark">toys</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#">
                    <div class="collection-banner p-right text-center">
                        <div>
                            <img src="{{asset('frontend')}}/assets/images/furniture/banner/4.jpg"
                                class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner banner-3">
                            <div>
                                <h4 class="text-dark">save 60%</h4>
                                <h2 class="text-dark">toys</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- collection banner end -->


<!-- category start -->
<div class="container">
    <section class="category-style-1">
        <div class="row">
            <div class="col">
                <div class="category-5 no-arrow">
                    @foreach($mainfivecategory as $fivecat)
                    <div class="category-block">
                        <a href="">
                            <div class="category-image">
                                <img src="{{asset('uploads/category/'.$fivecat->image)}}" class="img-fluid" alt="">
                            </div>
                        </a>
                        <div class="category-details">
                            <a href="">
                                <h5>{{ $fivecat->name }}</h5>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
<!-- category end -->

@if($newProducts->count()> 0)
<!-- Paragraph-->
<div class="title1 section-t-space">
    <h2 class="title-inner1">New collection</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-xl-6 offset-xl-3">
            <div class="product-para">

            </div>
        </div>
    </div>
</div>
<!-- Paragraph end -->

<!-- Product slider -->
<section class="section-b-space pt-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-5 product-m no-arrow">
                    @foreach ($newProducts as $product)
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
                                    <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                        <img src="{{ asset('uploads/products/'.$product->image) }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button id="{{$product->id}}" type="button" onclick="addtocart(this)"
                                        title="Add to cart"><i class="ti-shopping-cart"></i></button>

                                    <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                            aria-hidden="true"></i></a>
                                    <a class="productdetails" data-id="{{ $product->id }}" data-bs-toggle="modal"
                                        data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                            aria-hidden="true"></i></a>
                                    <a href="" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                {{-- <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div> --}}
                                <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                    <h6>{{ $product->product_name }}</h6>
                                </a>
                                <h4>${{ $product->product_price }}</h4>

                                {{-- <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul> --}}
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product slider end -->
@endif


<!--=======================  Category wish products start ==============================  -->
@forelse ($topSaleCategory as $category)
<div class="title1 section-t-space">
    <h2 class="title-inner1">{{ $category->name }}</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-xl-6 offset-xl-3">
            <div class="product-para">
            </div>
        </div>
    </div>
</div>
<!-- Paragraph end -->

<!-- Product slider -->
<section class="section-b-space pt-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-5 product-m no-arrow">
                    @foreach ($category->product as $product)
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
                                    <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                        <img src="{{ asset('uploads/products/'.$product->image) }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button id="{{$product->id}}" type="button" onclick="addtocart(this)"
                                        title="Add to cart"><i class="ti-shopping-cart"></i></button>

                                    <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                            aria-hidden="true"></i></a>
                                    <a class="productdetails" data-id="{{ $product->id }}" data-bs-toggle="modal"
                                        data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                            aria-hidden="true"></i></a>
                                    <a href="" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                    <h6>{{ $product->product_name }}</h6>
                                </a>
                                <h4>${{ $product->product_price }}</h4>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@empty

@endforelse

<!-- Product slider end -->





<!-- product section start -->
<section class="">
    <div class="container">
        <div class="row multiple-slider">
            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="theme-tab">
                    <div class="tab-content-cls ratio_asos">
                        <div class="product_4 product-m no-arrow">
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="product-page(no-sidebar).html">
                                            <img src="{{asset('frontend')}}/assets/images/furniture/product/6.jpg"
                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-info cart-wrap">
                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                            title="Add to cart"><i class="ti-shopping-cart"></i></button> <a
                                            href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                aria-hidden="true"></i></a> <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i
                                                class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="product-detail">
                                    <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00 <del>$600.00</del></h4>
                                    <ul class="color-variant">
                                        <li class="bg-light0"></li>
                                        <li class="bg-light1"></li>
                                        <li class="bg-light2"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="product-page(no-sidebar).html">
                                            <img src="{{asset('frontend')}}/assets/images/furniture/product/7.jpg"
                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-info cart-wrap">
                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                            title="Add to cart"><i class="ti-shopping-cart"></i></button> <a
                                            href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                aria-hidden="true"></i></a> <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i
                                                class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="product-detail">
                                    <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00 <del>$600.00</del></h4>
                                    <ul class="color-variant">
                                        <li class="bg-light0"></li>
                                        <li class="bg-light1"></li>
                                        <li class="bg-light2"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="product-page(no-sidebar).html">
                                            <img src="{{asset('frontend')}}/assets/images/furniture/product/8.jpg"
                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-info cart-wrap">
                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                            title="Add to cart"><i class="ti-shopping-cart"></i></button> <a
                                            href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                aria-hidden="true"></i></a> <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i
                                                class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="product-detail">
                                    <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00 <del>$600.00</del></h4>
                                    <ul class="color-variant">
                                        <li class="bg-light0"></li>
                                        <li class="bg-light1"></li>
                                        <li class="bg-light2"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="product-page(no-sidebar).html">
                                            <img src="{{asset('frontend')}}/assets/images/furniture/product/9.jpg"
                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-info cart-wrap">
                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                            title="Add to cart"><i class="ti-shopping-cart"></i></button> <a
                                            href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                aria-hidden="true"></i></a> <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i
                                                class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="product-detail">
                                    <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00 <del>$600.00</del></h4>
                                    <ul class="color-variant">
                                        <li class="bg-light0"></li>
                                        <li class="bg-light1"></li>
                                        <li class="bg-light2"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="product-page(no-sidebar).html">
                                            <img src="{{asset('frontend')}}/assets/images/furniture/product/10.jpg"
                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-info cart-wrap">
                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                            title="Add to cart"><i class="ti-shopping-cart"></i></button> <a
                                            href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                aria-hidden="true"></i></a> <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i
                                                class="ti-reload" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="product-detail">
                                    <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00 <del>$600.00</del></h4>
                                    <ul class="color-variant">
                                        <li class="bg-light0"></li>
                                        <li class="bg-light1"></li>
                                        <li class="bg-light2"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-tools border-0">
                    <div class="banner-goggles ratio2_1">
                        <div class="container p-0">
                            <div class="row partition3">
                                <div class="col-md-6">
                                    <a href="#">
                                        <div class="collection-banner p-right text-end">
                                            <div class="img-part">
                                                <img src="{{asset('frontend')}}/assets/images/furniture/banner/8.jpg"
                                                    class="img-fluid blur-up lazyload bg-img" alt="">
                                            </div>
                                            <div class="contain-banner banner-3">
                                                <div>
                                                    <h4 class="text-dark">10% off</h4>
                                                    <h2 class="text-dark">speaker</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#">
                                        <div class="collection-banner p-right text-end">
                                            <div class="img-part">
                                                <img src="{{asset('frontend')}}/assets/images/furniture/banner/9.jpg"
                                                    class="img-fluid blur-up lazyload bg-img" alt="">
                                            </div>
                                            <div class="contain-banner banner-3">
                                                <div>
                                                    <h4 class="text-light">10% off</h4>
                                                    <h2 class="text-light">earplug</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 mb-0">
                <div class="theme-card">
                    <h5 class="title-border">new products</h5>
                    <div class="offer-slider slide-1">
                        <div>
                            <div class="media">
                                <a href="product-page(no-sidebar).html"><img class="img-fluid blur-up lazyload"
                                        src="{{asset('frontend')}}/assets/images/furniture/pro/1.jpg" alt=""></a>
                                <div class="media-body align-self-center">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00 <del>$600.00</del></h4>
                                </div>
                            </div>
                            <div class="media">
                                <a href="product-page(no-sidebar).html"><img class="img-fluid blur-up lazyload"
                                        src="{{asset('frontend')}}/assets/images/furniture/pro/2.jpg" alt=""></a>
                                <div class="media-body align-self-center">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00</h4>
                                </div>
                            </div>
                            <div class="media">
                                <a href="product-page(no-sidebar).html"><img class="img-fluid blur-up lazyload"
                                        src="{{asset('frontend')}}/assets/images/furniture/pro/3.jpg" alt=""></a>
                                <div class="media-body align-self-center">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00</h4>
                                </div>
                            </div>
                            <div class="media">
                                <a href="product-page(no-sidebar).html"><img class="img-fluid blur-up lazyload"
                                        src="{{asset('frontend')}}/assets/images/furniture/pro/4.jpg" alt=""></a>
                                <div class="media-body align-self-center">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00</h4>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="media">
                                <a href="product-page(no-sidebar).html"><img class="img-fluid blur-up lazyload"
                                        src="{{asset('frontend')}}/assets/images/furniture/pro/1.jpg" alt=""></a>
                                <div class="media-body align-self-center">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00 <del>$600.00</del></h4>
                                </div>
                            </div>
                            <div class="media">
                                <a href="product-page(no-sidebar).html"><img class="img-fluid blur-up lazyload"
                                        src="{{asset('frontend')}}/assets/images/furniture/pro/4.jpg" alt=""></a>
                                <div class="media-body align-self-center">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00</h4>
                                </div>
                            </div>
                            <div class="media">
                                <a href="product-page(no-sidebar).html"><img class="img-fluid blur-up lazyload"
                                        src="{{asset('frontend')}}/assets/images/furniture/pro/2.jpg" alt=""></a>
                                <div class="media-body align-self-center">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00</h4>
                                </div>
                            </div>
                            <div class="media">
                                <a href="product-page(no-sidebar).html"><img class="img-fluid blur-up lazyload"
                                        src="{{asset('frontend')}}/assets/images/furniture/pro/3.jpg" alt=""></a>
                                <div class="media-body align-self-center">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product section end -->


<!-- logo section -->
<section class="tools-brand">
    <div class="container">
        <div class="row bg-light">
            <div class="col-md-12">
                <div class="brand-6 no-arrow">
                    <div>
                        <div class="logo-block">
                            <a href="#">
                                <img src="{{asset('frontend')}}/assets/images/logos/9.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#">
                                <img src="{{asset('frontend')}}/assets/images/logos/10.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#">
                                <img src="{{asset('frontend')}}/assets/images/logos/11.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#">
                                <img src="{{asset('frontend')}}/assets/images/logos/12.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#">
                                <img src="{{asset('frontend')}}/assets/images/logos/13.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#">
                                <img src="{{asset('frontend')}}/assets/images/logos/14.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#">
                                <img src="{{asset('frontend')}}/assets/images/logos/15.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#">
                                <img src="{{asset('frontend')}}/assets/images/logos/16.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- logo section end -->




@endsection