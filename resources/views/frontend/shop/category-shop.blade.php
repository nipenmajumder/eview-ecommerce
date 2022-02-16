@extends('layouts.frontend')
@section('title', 'Shop')
@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ $category->name }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
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
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                    aria-hidden="true"></i> back</span></div>
                        <!--sub category filter start -->
                        @if($category!=null)
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">Sub Category</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    @foreach ($category->subCategory as $sub_category)
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input subcategory common_selector"
                                            name="subcategory" id="{{ $sub_category->id }}"
                                            value="{{$sub_category->id}}" onclick="onClickCategory()">
                                        <label class="form-check-label" for="{{$sub_category->id}}">{{
                                            $sub_category->name }}</label>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <input type="hidden" name="category" id="category" class="category" value="{{$category->id}}">

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
                                        <label class="custom-control-label" for="p-4">৳501 to ৳1000</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{--
                        <!-- color filter start here -->
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">colors</h3>
                            <div class="collection-collapse-block-content">
                                <div class="color-selector">
                                    <ul>
                                        <li class="color-1 active"></li>
                                        <li class="color-2"></li>
                                        <li class="color-3"></li>
                                        <li class="color-4"></li>
                                        <li class="color-5"></li>
                                        <li class="color-6"></li>
                                        <li class="color-7"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- size filter start here -->
                        <div class="collection-collapse-block border-0 open">
                            <h3 class="collapse-block-title">size</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input" id="hundred">
                                        <label class="form-check-label" for="hundred">s</label>
                                    </div>
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input" id="twohundred">
                                        <label class="form-check-label" for="twohundred">m</label>
                                    </div>
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input" id="threehundred">
                                        <label class="form-check-label" for="threehundred">l</label>
                                    </div>
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input" id="fourhundred">
                                        <label class="form-check-label" for="fourhundred">xl</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- price filter start here -->

                        <div class="collection-collapse-block border-0 open">
                            <h3 class="collapse-block-title">price</h3>
                            <div class="collection-collapse-block-content">
                                <div class="price-range-slider">

                                    <p class="range-value">
                                        <input type="text" id="amount" readonly>
                                    </p>
                                    <div id="slider-range" class="range-bar"></div>

                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- silde-bar colleps block end here -->
                    <!-- side-bar single product slider start -->
                    <div class="theme-card">
                        <h5 class="title-border">new product</h5>
                        {{-- <div class="offer-slider slide-1">
                            <div>
                                <div class="media">
                                    <a href=""><img class="img-fluid blur-up lazyload"
                                            src="../assets/images/fashion/pro/1.jpg" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i></div><a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <a href=""><img class="img-fluid blur-up lazyload"
                                            src="../assets/images/fashion/pro/011.jpg" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i></div><a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <a href=""><img class="img-fluid blur-up lazyload"
                                            src="../assets/images/fashion/pro/16.jpg" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i></div><a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="media">
                                    <a href=""><img class="img-fluid blur-up lazyload"
                                            src="../assets/images/fashion/pro/001.jpg" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i></div><a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <a href=""><img class="img-fluid blur-up lazyload"
                                            src="../assets/images/fashion/pro/4.jpg" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i></div><a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <a href=""><img class="img-fluid blur-up lazyload"
                                            src="../assets/images/fashion/pro/19.jpg" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i></div><a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- side-bar single product slider end -->
                    <!-- side-bar banner start here -->
                    <div class="collection-sidebar-banner">
                        <a href="#"><img src="../assets/images/side-banner.png" class="img-fluid blur-up lazyload"
                                alt=""></a>
                    </div>
                    <!-- side-bar banner end here -->
                </div>
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
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
                                                        <h5>Showing {{ $category->name }} Products </h5>
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
                                            @endforeach
                                        </div>
                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="row">
                                                    {{ $products->links() }}
                                                    {{-- <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <nav aria-label="Page navigation">
                                                            <ul class="pagination">
                                                                <li class="page-item"><a class="page-link" href="#"
                                                                        aria-label="Previous"><span
                                                                            aria-hidden="true"><i
                                                                                class="fa fa-chevron-left"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Previous</span></a></li>
                                                                <li class="page-item active"><a class="page-link"
                                                                        href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">2</a>
                                                                </li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">3</a>
                                                                </li>
                                                                <li class="page-item"><a class="page-link" href="#"
                                                                        aria-label="Next"><span aria-hidden="true"><i
                                                                                class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Next</span></a></li>
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
            var category = $('#category').val();
            var brand = get_filter('brand');
            var subcategory = get_filter('subcategory');
            var price = get_filter('price');
            var sortingval = get_sort();
           $.ajax({
                url : '{{url('/filter-category-shop')}}',
                type : 'get',
                data : {category:category,brand:brand,subcategory:subcategory,price:price,sortingval:sortingval},
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