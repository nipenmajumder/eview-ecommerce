@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
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
<!--======================= collection banner start ==============================  -->
<section class="banner-padding absolute-banner pb-0 ratio2_1">
    <div class="container absolute-bg">
        <div class="row partition2">
            {{-- <div class="col-md-4">
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
            </div> --}}
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
                                <h4 class="text-dark">{{$banners->title}}</h4>
                                <h2 class="text-dark">{{$banners->discount}}</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
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
                                <img src="{{asset('uploads/category/'.$fivecat->image)}}" class="img-fluid" alt="">
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
<!--=======================  New collection products start ==============================  -->
@if($today==16)
@if($alltweentyproduct->count()> 0)

<div class="title1 section-t-space">
    <h2 class="title-inner1">22 Offer Is Here</h2>
</div>
<section class="section-b-space pt-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-5 product-m no-arrow">
                    @foreach ($alltweentyproduct as $product)
                    @php
                    $discounted_price = ($product->product_price)-($product->product_price*(11/100));
                    @endphp
                    <form id="cartsection-{{ $product->id }}">
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->product_name}}">
                        <input type="hidden" name="product_sku" value="{{$product->product_sku}}">
                        <input type="hidden" name="image" value="{{$product->image}}">
                        <input type="hidden" name="shop_id" value="{{$product->shop_id}}">
                        <input type="hidden" name="price" value="{{$discounted_price}}">
                        <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
                        <input type="hidden" name="product_quantity" value="1">
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="lable-block">
                                    @if($product->offer!=null)
                                    <span class="lable3">{{ $product->offer }}</span>
                                    @endif
                                    <span class="lable4">on sale</span>
                                </div>
                                <div class="front">
                                    <a href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                        <img src="{{ asset('uploads/products/'.$product->image) }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button id="{{$product->id}}" type="button" onclick="addtocart(this)"
                                        title="Add to cart"><i class="ti-shopping-cart"></i></button>

                                    <a id="{{$product->id}}" href="javascript:void(0)" onclick="addtowishlist(this)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
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
                                <h4><del>৳{{ $product->product_price }}</del>&nbsp;&nbsp;&nbsp;&nbsp;৳{{
                                    $discounted_price }}</h4>

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
@endif
@endif

<!--=======================  New collection products start ==============================  -->
@if($newProducts->count()> 0)
<div class="title1 section-t-space">
    <h2 class="title-inner1">New collection</h2>
</div>
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
                        <input type="hidden" name="shop_id" value="{{$product->shop_id}}">
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

                                    <a id="{{$product->id}}" href="javascript:void(0)" onclick="addtowishlist(this)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
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
                                <h4>৳{{ $product->product_price }}</h4>

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
@endif
<!--=======================  Category wish products start ==============================  -->
@forelse ($topSaleCategory as $category)
<div class="title1 section-t-space">
    <h2 class="title-inner1">{{ $category->name }}</h2>
</div>

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
                        <input type="hidden" name="shop_id" value="{{$product->shop_id}}">
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

                                    <a id="{{$product->id}}" href="javascript:void(0)" onclick="addtowishlist(this)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
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
                                <h4>৳{{ $product->product_price }}</h4>
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
<!--=======================  top products start ==============================  -->
<div class="title1 section-t-space">
    <h2 class="title-inner1">Top Products</h2>
</div>
<section class="section-b-space pt-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-5 product-m no-arrow">
                    @foreach ($topProducts as $product)
                    <form id="cartsection-{{ $product->id }}">
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->product_name}}">
                        <input type="hidden" name="product_sku" value="{{$product->product_sku}}">
                        <input type="hidden" name="image" value="{{$product->image}}">
                        <input type="hidden" name="shop_id" value="{{$product->shop_id}}">
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

                                    <a id="{{$product->id}}" href="javascript:void(0)" onclick="addtowishlist(this)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>

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
                                <h4>৳{{ $product->product_price }}</h4>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--=======================  Brands List start ==============================  -->
<section class="tools-brand">
    <div class="container">
        <div class="row bg-light">
            <div class="col-md-12">
                <div class="brand-6 no-arrow">
                    @forelse ($activeBrands as $brand)
                    <div>
                        <div class="logo-block">
                            <a href="#">
                                <img src="{{ asset('uploads/brand/'.$brand->image) }}" alt=""
                                    style="height: 115px; width: 115px">
                            </a>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection