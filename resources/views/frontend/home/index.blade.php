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


    <!-- Paragraph-->
    <div class="title1 section-t-space">
        <h4>special offer</h4>
        <h2 class="title-inner1">top collection</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3">
                <div class="product-para">
                    <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
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
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html">
                                        <img src="{{asset('frontend')}}/assets/images/furniture/product/1.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
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
                                <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                        sale</span></div>
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{asset('frontend')}}/assets/images/furniture/product/2.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="product-page(no-sidebar).html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h4>$500.00</h4>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                        sale</span></div>
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{asset('frontend')}}/assets/images/furniture/product/3.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="product-page(no-sidebar).html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h4>$500.00</h4>
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
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{asset('frontend')}}/assets/images/furniture/product/4.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
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
                                <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                        sale</span></div>
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{asset('frontend')}}/assets/images/furniture/product/5.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="product-page(no-sidebar).html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h4>$500.00</h4>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                        sale</span></div>
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{asset('frontend')}}/assets/images/furniture/product/6.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="product-page(no-sidebar).html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h4>$500.00</h4>
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
        </div>
    </section>
    <!-- Product slider end -->


    <!-- category -->
    <div class="category-bg ratio3_2">
        <div class="container-fluid p-0">
            <div class="row order-section">
                <div class="col-sm-8 p-0">
                    <a href="#" class="image-block">
                        <div id="block" style="width: 100%; height:48vh;" data-vide-bg="{{asset('frontend')}}/assets/video/video.mp4"
                            data-vide-options="position: 0% 50%"></div>
                    </a>
                </div>
                <div class="col-sm-4 p-0">
                    <div class="contain-block even">
                        <div>
                            <h6>new products</h6>
                            <a href="#">
                                <h2>zipper storage bag</h2>
                            </a><a href="#" class="btn btn-solid category-btn">-80% off</a>
                            <a href="#">
                                <h6><span>shop now</span></h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 p-0">
                    <a href="#" class="image-block">
                        <img alt="" src="{{asset('frontend')}}/assets/images/furniture/banner/7.jpg"
                            class="img-fluid blur-up lazyload bg-img">
                    </a>
                </div>
                <div class="col-sm-4 p-0">
                    <div class="contain-block even">
                        <div>
                            <h6>new products</h6>
                            <a href="#">
                                <h2>zipper storage bag</h2>
                            </a><a href="#" class="btn btn-solid category-btn">-80% off</a>
                            <a href="#">
                                <h6><span>shop now</span></h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 p-0">
                    <a href="#" class="image-block"><img alt="" src="{{asset('frontend')}}/assets/images/furniture/banner/6.jpg"
                            class="img-fluid blur-up lazyload bg-img"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- category end -->


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
                                                    aria-hidden="true"></i></a> <a href="compare.html"
                                                title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
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
                                                    aria-hidden="true"></i></a> <a href="compare.html"
                                                title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
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
                                                    aria-hidden="true"></i></a> <a href="compare.html"
                                                title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
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
                                                    aria-hidden="true"></i></a> <a href="compare.html"
                                                title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
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
                                                    aria-hidden="true"></i></a> <a href="compare.html"
                                                title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
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


    <!-- instagram section -->
    <section class="instagram ratio_square">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-0">
                    <h2 class="title-borderless"># instagram</h2>
                    <div class="slide-7 no-arrow slick-instagram">
                        <div>
                            <a href="#">
                                <div class="instagram-box"><img src="{{asset('frontend')}}/assets/images/furniture/insta/1.jpg"
                                        class="bg-img" alt="img">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"><img src="{{asset('frontend')}}/assets/images/furniture/insta/2.jpg"
                                        class="bg-img" alt="img">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"><img src="{{asset('frontend')}}/assets/images/furniture/insta/3.jpg"
                                        class="bg-img" alt="img">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"><img src="{{asset('frontend')}}/assets/images/furniture/insta/4.jpg"
                                        class="bg-img" alt="img">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"><img src="{{asset('frontend')}}/assets/images/furniture/insta/5.jpg"
                                        class="bg-img" alt="img">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"><img src="{{asset('frontend')}}/assets/images/furniture/insta/6.jpg"
                                        class="bg-img" alt="img">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"><img src="{{asset('frontend')}}/assets/images/furniture/insta/7.jpg"
                                        class="bg-img" alt="img">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"><img src="{{asset('frontend')}}/assets/images/furniture/insta/8.jpg"
                                        class="bg-img" alt="img">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- instagram section end -->

@endsection