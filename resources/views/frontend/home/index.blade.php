@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
<style>
    section.p-0.product-vertical.overflow-hidden.asif {
        background-color: antiquewhite;
    }
</style>
<!--======================= slider start ==============================  -->
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
                                    <h1>{{ $slider->title }}</h1><a href="{{ url('/shop') }}" class="btn btn-solid">shop
                                        now</a>
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
<!--======================= collection banner start ==============================  -->
@if($allBanner->count() > 0)
<section class="banner-padding absolute-banner pb-0 ratio2_1">
    <div class="container absolute-bg">
        <div class="row partition2">
            @foreach($allBanner as $banners)
            <div class="col-md-4">
                <a href="{{url($banners->url)}}">
                    <div class="collection-banner p-right text-center">
                        <div>
                            <img src="{{ asset('uploads/banner/'.$banners->image) }}"
                                class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner banner-3">
                            <div>
                                <h4>{{$banners->title}}</h4>
                                <h2>{{$banners->discount}}</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!--======================= Top Five Category start ==============================  -->
<div class="container">
    <section class="category-style-1">
        <div class="row">
            <div class="col">
                <div class="category-5 no-arrow">
                    @foreach($mainfivecategory as $fivecat)
                    <div class="category-block">
                        <a href="{{ url('/category/'.$fivecat->slug.'/'.$fivecat->id) }}">
                            <div class="category-image">
                                <img src="{{asset('uploads/category/'.$fivecat->image)}}" class="img-fluid" alt=""
                                    style="height: 230px">
                            </div>
                        </a>
                        <div class="category-details">
                            <a href="{{ url('/category/'.$fivecat->slug.'/'.$fivecat->id) }}">
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

<section class="bag-product ratio_square">
    <div class="container">
        <div class="row">
            <!--======================= Top Sell Product start ==============================  -->
            <div class="col-12">
                <div class="title-basic">
                    <h2 class="title font-fraunces"><i class="ti-bolt"></i>Top Sell Product</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="slide-6-product product-m no-arrow">
                    @foreach($bestsellproduct as $product)
                    <form id="cartsection-{{ $product->id }}">
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->product_name}}">
                        <input type="hidden" name="product_sku" value="{{$product->product_sku}}">
                        <input type="hidden" name="image" value="{{$product->image}}">
                        <input type="hidden" name="shop_id" value="{{$product->shop_id}}">
                        <input type="hidden" name="product_quantity" value="1">
                        <div class="product-box product-wrap product-style-3">
                            <div class="img-wrapper">
                                <div class="lable-block">
                                    @if($today==$eleven && $product->offer=='11_offer' &&
                                    $product->have_a_discount=='1')
                                    <span class="lable3">11% off</span>
                                    @elseif($today==$twenty_two && $product->offer=='22_offer' &&
                                    $product->have_a_discount=='1')
                                    <span class="lable3">22% off</span>
                                    @elseif($product->offer=='special_offer' &&
                                    $product->have_a_discount=='1')
                                    <span class="lable3">special offer</span>
                                    @else
                                    @endif
                                    <span class="lable4">on sale</span>
                                </div>
                                <div class="front">
                                    <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}"><img alt=""
                                            src="{{ asset('uploads/products/'.$product->image) }}"
                                            class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail">
                                    <button id="{{$product->id}}" type="button" onclick="addtocart(this)"
                                        title="Add to cart"><i class="ti-shopping-cart"></i></button>

                                    <a id="{{$product->id}}" href="javascript:void(0)" onclick="addtowishlist(this)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                    <a class="productdetails" data-id="{{ $product->id }}" data-bs-toggle="modal"
                                        data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-info">
                                {{-- <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div> --}}
                                <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                    <h6>{{ $product->product_name }}</h6>
                                </a>
                                <!--======================= offer related codes ================== -->
                                <!-- (#11 offer )-->
                                @if($today==$eleven && $product->offer=='11_offer' && $product->have_a_discount=='1')
                                @php
                                $discounted_price = ($product->product_price)-($product->product_price*(11/100));
                                @endphp
                                <h6>৳ {{ $discounted_price }}
                                    <del>৳ {{ $product->product_price }}</del>
                                </h6>

                                <input type="hidden" name="price" value="{{$discounted_price}}">
                                <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                <!-- (#22_offer)-->
                                @elseif($today==$twenty_two && $product->offer=='22_offer' &&
                                $product->have_a_discount=='1')
                                @php
                                $discounted_price = ($product->product_price)-($product->product_price*(22/100));
                                @endphp
                                <h6>৳ {{ $discounted_price }}
                                    <del>৳ {{ $product->product_price }}</del>
                                </h6>
                                <input type="hidden" name="price" value="{{$discounted_price}}">
                                <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                <!-- (#special_offer) -->
                                @elseif($product->offer=='special_offer' && $product->have_a_discount=='1')
                                <!-- (no offer) -->
                                @elseif($product->have_a_discount=='0')
                                <h6>৳ {{ $product->product_price }}</h6>
                                <input type="hidden" name="price" value="{{$product->product_price}}">
                                @else
                                <!-- (#is offer is comming soon) -->
                                <h6>৳ {{ $product->product_price }}</h6>
                                <input type="hidden" name="price" value="{{$product->product_price}}">
                                <!-- (#2) endif start -->
                                @endif
                                <!--======================= offer related codes end ================== -->
                            </div>
                        </div>
                    </form>
                    @endforeach

                </div>
            </div>
            <!--======================= Top Trending Product start ==============================  -->
            <div class="col-12 section-t-space">
                <div class="title-basic">
                    <h2 class="title font-fraunces"><i class="ti-bolt"></i> Trending Products</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="slide-6-product product-m no-arrow">
                    @foreach($trandingproduct as $product)
                    <form id="cartsection-{{ $product->id }}">
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->product_name}}">
                        <input type="hidden" name="product_sku" value="{{$product->product_sku}}">
                        <input type="hidden" name="image" value="{{$product->image}}">
                        <input type="hidden" name="shop_id" value="{{$product->shop_id}}">
                        <input type="hidden" name="product_quantity" value="1">
                        <div class="product-box product-wrap product-style-3">
                            <div class="img-wrapper">
                                <div class="lable-block">
                                    @if($today==$eleven && $product->offer=='11_offer' &&
                                    $product->have_a_discount=='1')
                                    <span class="lable3">11% off</span>
                                    @elseif($today==$twenty_two && $product->offer=='22_offer' &&
                                    $product->have_a_discount=='1')
                                    <span class="lable3">22% off</span>
                                    @elseif($product->offer=='special_offer' &&
                                    $product->have_a_discount=='1')
                                    <span class="lable3">special offer</span>
                                    @else
                                    @endif
                                    <span class="lable4">on sale</span>
                                </div>
                                <div class="front">
                                    <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}"><img alt=""
                                            src="{{ asset('uploads/products/'.$product->image) }}"
                                            class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail">
                                    <button id="{{$product->id}}" type="button" onclick="addtocart(this)"
                                        title="Add to cart"><i class="ti-shopping-cart"></i></button>

                                    <a id="{{$product->id}}" href="javascript:void(0)" onclick="addtowishlist(this)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                    <a class="productdetails" data-id="{{ $product->id }}" data-bs-toggle="modal"
                                        data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-info">
                                {{-- <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div> --}}
                                <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                    <h6>{{ $product->product_name }}</h6>
                                </a>
                                <!--======================= offer related codes ================== -->

                                <!-- (#11 offer )-->
                                @if($today==$eleven && $product->offer=='11_offer' && $product->have_a_discount=='1')
                                @php
                                $discounted_price = ($product->product_price)-($product->product_price*(11/100));
                                @endphp
                                <h6>৳ {{ $discounted_price }}
                                    <del>৳ {{ $product->product_price }}</del>
                                </h6>

                                <input type="hidden" name="price" value="{{$discounted_price}}">
                                <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                <!-- (#22_offer)-->
                                @elseif($today==$twenty_two && $product->offer=='22_offer' &&
                                $product->have_a_discount=='1')
                                @php
                                $discounted_price = ($product->product_price)-($product->product_price*(22/100));
                                @endphp
                                <h6>৳ {{ $discounted_price }}
                                    <del>৳ {{ $product->product_price }}</del>
                                </h6>
                                <input type="hidden" name="price" value="{{$discounted_price}}">
                                <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                <!-- (#special_offer) -->
                                @elseif($product->offer=='special_offer' && $product->have_a_discount=='1')
                                <!-- (no offer) -->
                                @elseif($product->have_a_discount=='0')
                                <h6>৳ {{ $product->product_price }}</h6>
                                <input type="hidden" name="price" value="{{$product->product_price}}">
                                @else
                                <!-- (#is offer is comming soon) -->
                                <h6>৳ {{ $product->product_price }}</h6>
                                <input type="hidden" name="price" value="{{$product->product_price}}">
                                <!-- (#2) endif start -->
                                @endif
                                <!--======================= offer related codes end ================== -->

                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--======================= Two Big Banner start ==============================  -->

<section class="pb-0 ratio2_1">
    <div class="container">
        <div class="row partition2">
            <div class="col-md-6">
                <a href="{{ url('/11-offer') }}">
                    <div class="collection-banner p-right text-end">
                        <div class="img-part">
                            <img src="{{asset('frontend/')}}/assets/images/marketplace/banner/13.jpg"
                                class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner">
                            <div>
                                <h4>save 11%</h4>
                                <h2>sale</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{ url('/22-offer') }}">
                    <div class="collection-banner p-right text-center">
                        <div class="img-part">
                            <img src="{{asset('frontend/')}}/assets/images/marketplace/banner/14.jpg"
                                class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner">
                            <div>
                                <h4>save 22%</h4>
                                <h2>watch</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!--======================= TOP COLLECTION start ==============================  -->

<section class="section-b-space">
    <div class="container">
        <div class="row multiple-slider">
            <!--======================= new products start ==============================  -->
            <div class="col-lg-3 col-sm-6">
                <div class="theme-card">
                    <h5 class="title-border">new products</h5>
                    <div class="offer-slider slide-1">
                        <div>
                            @foreach($newproduct as $product)
                            <div class="media">
                                <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}"><img
                                        class="img-fluid blur-up lazyload"
                                        src="{{ asset('uploads/products/'.$product->image) }}" alt=""></a>
                                <div class="media-body align-self-center">
                                    {{-- <div class="rating">
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    </div> --}}
                                    <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                        <h6>{{ $product->product_name }}</h6>
                                    </a>
                                    <!--======================= offer related codes ================== -->

                                    <!-- (#11 offer )-->
                                    @if($today==$eleven && $product->offer=='11_offer' &&
                                    $product->have_a_discount=='1')
                                    @php
                                    $discounted_price = ($product->product_price)-($product->product_price*(11/100));
                                    @endphp
                                    <h6>৳ {{ $discounted_price }}
                                        <del>৳ {{ $product->product_price }}</del>
                                    </h6>

                                    <input type="hidden" name="price" value="{{$discounted_price}}">
                                    <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                    <!-- (#22_offer)-->
                                    @elseif($today==$twenty_two && $product->offer=='22_offer' &&
                                    $product->have_a_discount=='1')
                                    @php
                                    $discounted_price = ($product->product_price)-($product->product_price*(22/100));
                                    @endphp
                                    <h6>৳ {{ $discounted_price }}
                                        <del>৳ {{ $product->product_price }}</del>
                                    </h6>
                                    <input type="hidden" name="price" value="{{$discounted_price}}">
                                    <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                    <!-- (#special_offer) -->
                                    @elseif($product->offer=='special_offer' && $product->have_a_discount=='1')
                                    <!-- (no offer) -->
                                    @elseif($product->have_a_discount=='0')
                                    <h6>৳ {{ $product->product_price }}</h6>
                                    <input type="hidden" name="price" value="{{$product->product_price}}">
                                    @else
                                    <!-- (#is offer is comming soon) -->
                                    <h6>৳ {{ $product->product_price }}</h6>
                                    <input type="hidden" name="price" value="{{$product->product_price}}">
                                    <!-- (#2) endif start -->
                                    @endif
                                    <!--======================= offer related codes end ================== -->
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="theme-card">
                    <!--======================= new feature start ==============================  -->
                    <h5 class="title-border">feature product</h5>
                    <div class="offer-slider slide-1">
                        <div>
                            @foreach($featureproduct as $product)
                            <div class="media">
                                <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}"><img
                                        class="img-fluid blur-up lazyload"
                                        src="{{ asset('uploads/products/'.$product->image) }}" alt=""></a>
                                <div class="media-body align-self-center">
                                    {{-- <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i></div> --}}
                                    <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                        <h6>{{ $product->product_name }}</h6>
                                    </a>
                                    <!--======================= offer related codes ================== -->
                                    <!-- (#11 offer )-->
                                    @if($today==$eleven && $product->offer=='11_offer' &&
                                    $product->have_a_discount=='1')
                                    @php
                                    $discounted_price = ($product->product_price)-($product->product_price*(11/100));
                                    @endphp
                                    <h6>৳ {{ $discounted_price }}
                                        <del>৳ {{ $product->product_price }}</del>
                                    </h6>

                                    <input type="hidden" name="price" value="{{$discounted_price}}">
                                    <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                    <!-- (#22_offer)-->
                                    @elseif($today==$twenty_two && $product->offer=='22_offer' &&
                                    $product->have_a_discount=='1')
                                    @php
                                    $discounted_price = ($product->product_price)-($product->product_price*(22/100));
                                    @endphp
                                    <h6>৳ {{ $discounted_price }}
                                        <del>৳ {{ $product->product_price }}</del>
                                    </h6>
                                    <input type="hidden" name="price" value="{{$discounted_price}}">
                                    <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                    <!-- (#special_offer) -->
                                    @elseif($product->offer=='special_offer' && $product->have_a_discount=='1')
                                    <!-- (no offer) -->
                                    @elseif($product->have_a_discount=='0')
                                    <h6>৳ {{ $product->product_price }}</h6>
                                    <input type="hidden" name="price" value="{{$product->product_price}}">
                                    @else
                                    <!-- (#is offer is comming soon) -->
                                    <h6>৳ {{ $product->product_price }}</h6>
                                    <input type="hidden" name="price" value="{{$product->product_price}}">
                                    <!-- (#2) endif start -->
                                    @endif
                                    <!--======================= offer related codes end ================== -->
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="theme-card">
                    <!--======================= best seller start ==============================  -->
                    <h5 class="title-border">best seller</h5>
                    <div class="offer-slider slide-1">
                        <div>
                            @foreach($onlythreeBestproduct as $product)
                            <div class="media">
                                <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}"><img
                                        class="img-fluid blur-up lazyload"
                                        src="{{ asset('uploads/products/'.$product->image) }}" alt=""></a>
                                <div class="media-body align-self-center">
                                    {{-- <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i></div> --}}
                                    <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                        <h6>{{ $product->product_name }}</h6>
                                    </a>
                                    <!--======================= offer related codes ================== -->

                                    <!-- (#11 offer )-->
                                    @if($today==$eleven && $product->offer=='11_offer' &&
                                    $product->have_a_discount=='1')
                                    @php
                                    $discounted_price = ($product->product_price)-($product->product_price*(11/100));
                                    @endphp
                                    <h6>৳ {{ $discounted_price }}
                                        <del>৳ {{ $product->product_price }}</del>
                                    </h6>

                                    <input type="hidden" name="price" value="{{$discounted_price}}">
                                    <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                    <!-- (#22_offer)-->
                                    @elseif($today==$twenty_two && $product->offer=='22_offer' &&
                                    $product->have_a_discount=='1')
                                    @php
                                    $discounted_price = ($product->product_price)-($product->product_price*(22/100));
                                    @endphp
                                    <h6>৳ {{ $discounted_price }}
                                        <del>৳ {{ $product->product_price }}</del>
                                    </h6>
                                    <input type="hidden" name="price" value="{{$discounted_price}}">
                                    <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                    <!-- (#special_offer) -->
                                    @elseif($product->offer=='special_offer' && $product->have_a_discount=='1')
                                    <!-- (no offer) -->
                                    @elseif($product->have_a_discount=='0')
                                    <h6>৳ {{ $product->product_price }}</h6>
                                    <input type="hidden" name="price" value="{{$product->product_price}}">
                                    @else
                                    <!-- (#is offer is comming soon) -->
                                    <h6>৳ {{ $product->product_price }}</h6>
                                    <input type="hidden" name="price" value="{{$product->product_price}}">
                                    <!-- (#2) endif start -->
                                    @endif
                                    <!--======================= offer related codes end ================== -->
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="theme-card">
                    <!--======================= on sale product start ================== -->
                    <h5 class="title-border">on sale</h5>
                    <div class="offer-slider slide-1">
                        <div>
                            @foreach($latestproduct as $product)
                            <div class="media">
                                <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}"><img
                                        class="img-fluid blur-up lazyload"
                                        src="{{ asset('uploads/products/'.$product->image) }}" alt=""></a>
                                <div class="media-body align-self-center">
                                    {{-- <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i></div> --}}
                                    <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                        <h6>{{ $product->product_name }}</h6>
                                    </a>
                                    <!--======================= offer related codes ================== -->
                                    <!-- (#11 offer )-->
                                    @if($today==$eleven && $product->offer=='11_offer' &&
                                    $product->have_a_discount=='1')
                                    @php
                                    $discounted_price = ($product->product_price)-($product->product_price*(11/100));
                                    @endphp
                                    <h6>৳ {{ $discounted_price }}
                                        <del>৳ {{ $product->product_price }}</del>
                                    </h6>

                                    <input type="hidden" name="price" value="{{$discounted_price}}">
                                    <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                    <!-- (#22_offer)-->
                                    @elseif($today==$twenty_two && $product->offer=='22_offer' &&
                                    $product->have_a_discount=='1')
                                    @php
                                    $discounted_price = ($product->product_price)-($product->product_price*(22/100));
                                    @endphp
                                    <h6>৳ {{ $discounted_price }}
                                        <del>৳ {{ $product->product_price }}</del>
                                    </h6>
                                    <input type="hidden" name="price" value="{{$discounted_price}}">
                                    <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                    <!-- (#special_offer) -->
                                    @elseif($product->offer=='special_offer' && $product->have_a_discount=='1')
                                    <!-- (no offer) -->
                                    @elseif($product->have_a_discount=='0')
                                    <h6>৳ {{ $product->product_price }}</h6>
                                    <input type="hidden" name="price" value="{{$product->product_price}}">
                                    @else
                                    <!-- (#is offer is comming soon) -->
                                    <h6>৳ {{ $product->product_price }}</h6>
                                    <input type="hidden" name="price" value="{{$product->product_price}}">
                                    <!-- (#2) endif start -->
                                    @endif
                                    <!--======================= offer related codes end ================== -->
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="p-0 product-vertical overflow-hidden asif">
    <div class="full-banner parallax text-center p-left bg-theme">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="title6">
                        <h2 class="font-fraunces">Top collection</h2>
                    </div>
                    {{-- <div class="product-para">
                        <p class="text-center text-white">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                    </div> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slide-3 no-arrow slick-default-margin full-box">
                        @foreach($onlythreeBestproduct as $product)
                        <div class="theme-card center-align">
                            <div class="offer-slider">
                                <div class="sec-1">
                                    <div class="product-box2">
                                        <div class="media">
                                            <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}"><img
                                                    class="img-fluid blur-up lazyload"
                                                    src="{{ asset('uploads/products/'.$product->image) }}" alt=""></a>
                                            <div class="media-body align-self-center">
                                                {{-- <div class="rating"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i></div> --}}
                                                <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                                    <h6>{{ $product->product_name }}</h6>
                                                </a>
                                                <!--======================= offer related codes ================== -->

                                                <!-- (#11 offer )-->
                                                @if($today==$eleven && $product->offer=='11_offer' &&
                                                $product->have_a_discount=='1')
                                                @php
                                                $discounted_price =
                                                ($product->product_price)-($product->product_price*(11/100));
                                                @endphp
                                                <h6>৳ {{ $discounted_price }}
                                                    <del>৳ {{ $product->product_price }}</del>
                                                </h6>

                                                <input type="hidden" name="price" value="{{$discounted_price}}">
                                                <input type="hidden" name="product_main_price"
                                                    value="{{$product->product_price}}">
                                                <!-- (#22_offer)-->
                                                @elseif($today==$twenty_two && $product->offer=='22_offer' &&
                                                $product->have_a_discount=='1')
                                                @php
                                                $discounted_price =
                                                ($product->product_price)-($product->product_price*(22/100));
                                                @endphp
                                                <h6>৳ {{ $discounted_price }}
                                                    <del>৳ {{ $product->product_price }}</del>
                                                </h6>
                                                <input type="hidden" name="price" value="{{$discounted_price}}">
                                                <input type="hidden" name="product_main_price"
                                                    value="{{$product->product_price}}">
                                                <!-- (#special_offer) -->
                                                @elseif($product->offer=='special_offer' &&
                                                $product->have_a_discount=='1')
                                                <!-- (no offer) -->
                                                @elseif($product->have_a_discount=='0')
                                                <h6>৳ {{ $product->product_price }}</h6>
                                                <input type="hidden" name="price" value="{{$product->product_price}}">
                                                @else
                                                <!-- (#is offer is comming soon) -->
                                                <h6>৳ {{ $product->product_price }}</h6>
                                                <input type="hidden" name="price" value="{{$product->product_price}}">
                                                <!-- (#2) endif start -->
                                                @endif
                                                <!--======================= offer related codes end ================== -->
                                                {{-- <ul class="color-variant">
                                                    <li class="bg-light0"></li>
                                                    <li class="bg-light1"></li>
                                                    <li class="bg-light2"></li>
                                                </ul> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=======================  Top Rated Product start ==============================  -->
<section class="bag-product section-b-space ratio_square">
    <div class="container">
        <div class="row">
            <div class="col-12 section-t-space">
                <div class="title-basic">
                    <h2 class="title font-fraunces"><i class="ti-bolt"></i> Top Rated Product</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="slide-6-product product-m no-arrow">
                    @foreach($topProducts as $product)
                    <form id="cartsection-{{ $product->id }}">
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->product_name}}">
                        <input type="hidden" name="product_sku" value="{{$product->product_sku}}">
                        <input type="hidden" name="image" value="{{$product->image}}">
                        <input type="hidden" name="shop_id" value="{{$product->shop_id}}">
                        <input type="hidden" name="product_quantity" value="1">
                        <div class="product-box product-wrap product-style-3">
                            <div class="img-wrapper">
                                <div class="lable-block">
                                    @if($today==$eleven && $product->offer=='11_offer' &&
                                    $product->have_a_discount=='1')
                                    <span class="lable3">11% off</span>
                                    @elseif($today==$twenty_two && $product->offer=='22_offer' &&
                                    $product->have_a_discount=='1')
                                    <span class="lable3">22% off</span>
                                    @elseif($product->offer=='special_offer' &&
                                    $product->have_a_discount=='1')
                                    <span class="lable3">special offer</span>
                                    @else
                                    @endif
                                    <span class="lable4">on sale</span>
                                </div>
                                <div class="front">
                                    <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}"><img alt=""
                                            src="{{ asset('uploads/products/'.$product->image) }}"
                                            class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail">
                                    <button id="{{$product->id}}" type="button" onclick="addtocart(this)"
                                        title="Add to cart"><i class="ti-shopping-cart"></i></button>

                                    <a id="{{$product->id}}" href="javascript:void(0)" onclick="addtowishlist(this)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                    <a class="productdetails" data-id="{{ $product->id }}" data-bs-toggle="modal"
                                        data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-info">
                                {{-- <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div> --}}
                                <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                    <h6>{{ $product->product_name }}</h6>
                                </a>
                                <!--======================= offer related codes ================== -->

                                <!-- (#11 offer )-->
                                @if($today==$eleven && $product->offer=='11_offer' && $product->have_a_discount=='1')
                                @php
                                $discounted_price = ($product->product_price)-($product->product_price*(11/100));
                                @endphp
                                <h6>৳ {{ $discounted_price }}
                                    <del>৳ {{ $product->product_price }}</del>
                                </h6>

                                <input type="hidden" name="price" value="{{$discounted_price}}">
                                <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                <!-- (#22_offer)-->
                                @elseif($today==$twenty_two && $product->offer=='22_offer' &&
                                $product->have_a_discount=='1')
                                @php
                                $discounted_price = ($product->product_price)-($product->product_price*(22/100));
                                @endphp
                                <h6>৳ {{ $discounted_price }}
                                    <del>৳ {{ $product->product_price }}</del>
                                </h6>
                                <input type="hidden" name="price" value="{{$discounted_price}}">
                                <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                                <!-- (#special_offer) -->
                                @elseif($product->offer=='special_offer' && $product->have_a_discount=='1')
                                <!-- (no offer) -->
                                @elseif($product->have_a_discount=='0')
                                <h6>৳ {{ $product->product_price }}</h6>
                                <input type="hidden" name="price" value="{{$product->product_price}}">
                                @else
                                <!-- (#is offer is comming soon) -->
                                <h6>৳ {{ $product->product_price }}</h6>
                                <input type="hidden" name="price" value="{{$product->product_price}}">
                                <!-- (#2) endif start -->
                                @endif
                                <!--======================= offer related codes end ================== -->

                            </div>
                        </div>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endsection