@extends('layouts.frontend')
@section('title', '22 Offer')
@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>22 offer</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">22 Offer</li>
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
                <div class="col-sm-3 collection-filter">
                    <!-- side-bar colleps block stat -->
                    <div class="collection-filter-block">
                        <!-- brand filter start -->
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                    aria-hidden="true"></i> back</span></div>
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">Category</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    @foreach ($category_data ?? [] as $category)
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input category common_selector"
                                            name="category" id="{{ $category->id }}" value="{{ $category->id }}">
                                        <label class="form-check-label" for="{{ $category->id }}">{{ $category->name
                                            }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <!-- brand filter start -->

                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">brand</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    @foreach ($brands ?? [] as $brand)
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input brand common_selector"
                                            name="brand" id="b-{{ $brand->id }}" value="{{ $brand->id }}">
                                        <label class="form-check-label" for="b-{{ $brand->id }}">{{ $brand->name
                                            }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">Price</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter mt-3 mb-2 ">
                                    <div class="custom-control custom-radio mt-2">
                                        <input type="radio" class="custom-control-input common_selector price"
                                            name="price" id="p-1" value="1">
                                        <label class="custom-control-label" for="p-1">৳10 to ৳100</label>
                                    </div>
                                    <div class="custom-control custom-radio mt-2">
                                        <input type="radio" class="custom-control-input common_selector price"
                                            name="price" id="p-2" value="2">
                                        <label class="custom-control-label" for="p-2">৳101 to ৳500</label>
                                    </div>
                                    <div class="custom-control custom-radio mt-2">
                                        <input type="radio" class="custom-control-input common_selector price"
                                            name="price" id="p-3" value="3">
                                        <label class="custom-control-label" for="p-3">৳501 to ৳1000</label>
                                    </div>
                                    <div class="custom-control custom-radio mt-2">
                                        <input type="radio" class="custom-control-input common_selector price"
                                            name="price" id="p-4" value="4">
                                        <label class="custom-control-label" for="p-4">৳1001 to 10000</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                {{-- <div class="top-banner-wrapper">
                                    <a href="#"><img src="{{asset('frontend')}}/assets/images/mega-menu/2.jpg"
                                            class="img-fluid blur-up lazyloaded" alt=""></a>
                                    <div class="top-banner-content small-section">
                                        <h4>BIGGEST DEALS ON TOP BRANDS</h4>
                                        <p>The trick to choosing the best wear for yourself is to keep in mind your
                                            body type, individual style, occasion and also the time of day or
                                            weather.
                                            In addition to eye-catching products from top brands, we also offer an
                                            easy 30-day return and exchange policy, free and fast shipping across
                                            all pin codes, cash or card on delivery option, deals and discounts,
                                            among other perks. So, sign up now and shop for westarn wear to your
                                            heart’s content on Multikart. </p>
                                    </div>
                                </div> --}}
                                <div class="collection-product-wrapper">
                                    <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i
                                                            class="fa fa-filter" aria-hidden="true"></i> Filter</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-filter-content">
                                                    <div class="search-count">
                                                        <h5>Showing All Products </h5>
                                                    </div>
                                                    <div class="collection-view">
                                                        <ul>
                                                            <li><i class="fa fa-th grid-layout-view"></i></li>
                                                            <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-page-filter">
                                                        <select class="common_selector" name="sortBy" id="sortBy">
                                                            <option selected value="">Select</option>
                                                            <option value="1">Price (Low to High)</option>
                                                            <option value="2">Price (High to Low)</option>
                                                            <option value="3">Name (A to Z)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrapper-grid" id="defultData">
                                        <div class="row margin-res">
                                            @foreach ($products as $product)
                                            <div class="col-xl-3 col-6 col-grid-box">
                                                <form id="cartsection-{{ $product->id }}">
                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                    <input type="hidden" name="name" value="{{$product->product_name}}">
                                                    <input type="hidden" name="product_sku"
                                                        value="{{$product->product_sku}}">
                                                    <input type="hidden" name="image" value="{{$product->image}}">
                                                    <input type="hidden" name="shop_id" value="{{$product->shop_id}}">
                                                    <input type="hidden" name="product_quantity" value="1">
                                                    <div class="product-box">

                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                @if($today==$eleven && $product->offer=='11_offer' &&
                                                                $product->have_a_discount=='1')
                                                                <span class="lable3">11% off</span>
                                                                @elseif($today==$twenty_two &&
                                                                $product->offer=='22_offer' &&
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
                                                                <a
                                                                    href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
                                                                    <img src="{{ asset('uploads/products/'.$product->image) }}"
                                                                        class="img-fluid blur-up lazyload bg-img"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <div class="cart-info cart-wrap">
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
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            {{-- <div class="rating"><i class="fa fa-star"></i> <i
                                                                    class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                            </div> --}}
                                                            <a
                                                                href="{{url('/products/'.$product->product_slug.'/'.$product->id)}}">
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

                                                            <input type="hidden" name="price"
                                                                value="{{$discounted_price}}">
                                                            <input type="hidden" name="product_main_price"
                                                                value="{{$product->product_price}}">
                                                            <!-- (#22_offer)-->
                                                            @elseif($today==$twenty_two && $product->offer=='22_offer'
                                                            &&
                                                            $product->have_a_discount=='1')
                                                            @php
                                                            $discounted_price =
                                                            ($product->product_price)-($product->product_price*(22/100));
                                                            @endphp
                                                            <h6>৳ {{ $discounted_price }}
                                                                <del>৳ {{ $product->product_price }}</del>
                                                            </h6>
                                                            <input type="hidden" name="price"
                                                                value="{{$discounted_price}}">
                                                            <input type="hidden" name="product_main_price"
                                                                value="{{$product->product_price}}">
                                                            <!-- (#special_offer) -->
                                                            @elseif($product->offer=='special_offer' &&
                                                            $product->have_a_discount=='1')
                                                            <!-- (no offer) -->
                                                            @elseif($product->have_a_discount=='0')
                                                            <h6>৳ {{ $product->product_price }}</h6>
                                                            <input type="hidden" name="price"
                                                                value="{{$product->product_price}}">
                                                            @else
                                                            <!-- (#is offer is comming soon) -->
                                                            <h6>৳ {{ $product->product_price }}</h6>
                                                            <input type="hidden" name="price"
                                                                value="{{$product->product_price}}">
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
                                                </form>

                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="container-fluid p-0">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12">
                                                            {{$products -> links('vendor.pagination.custom')}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrapper-grid" id="filterData"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
<script>
    function onClickCategory(){
        // alert('hi');
    }
</script>
<script>
    $(document).ready(function(){   
        function filter_data()
        {
            // var category = $('#category').val();
            var brand = get_filter('brand');
            var category = get_filter('category');
            var price = get_filter('price');
            var sortingval = get_sort();
           $.ajax({
                url : '{{url('/filter-22-offer-shop')}}',
                type : 'get',
                data : {category:category,brand:brand,price:price,sortingval:sortingval},
                success: function(products) {
                    if(products){
                        $('#defultData').hide();
                        $('#filterData').html(products);
                    }else{
                        $('#defultData').show();
                        $('#filterData').hide();
                    }
                }
            })
        }
        
        function get_filter(class_name)
        {
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }
        
        $('.common_selector').click(function(){
            filter_data();
        });
       
        $('.common_selector').on('change' ,function(){
            get_sort();
            filter_data();
        });

        function get_sort()
        {
            var sortBy = [];
            $.each($("#sortBy option:selected"), function(){            
                sortBy.push($(this).val());
            });
            return sortBy;
        }
    });
</script>
@endsection