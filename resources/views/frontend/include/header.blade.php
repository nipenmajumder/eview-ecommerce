<header class="header-style-5 color-style">
    <div class="mobile-fix-option"></div>
    <div class="top-header top-header-theme">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li>Welcome to Our store {{ $companyInformation->company_name }}</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: {{ $companyInformation->mobile }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-contact text-end">
                        <ul>
                            <li><i class="fa fa-truck" aria-hidden="true"></i>Track Order</li>
                            <li class="pe-0"><i class="fa fa-gift" aria-hidden="true"></i>Gift Cards</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <div class="menu-left">
                        <div class="navbar d-block d-xl-none">
                            <a href="javascript:void(0)">
                                <div class="bar-style" id="toggle-sidebar-res"><i class="fa fa-bars sidebar-bar"
                                        aria-hidden="true"></i>
                                </div>
                            </a>
                        </div>
                        <div class="brand-logo">
                            <a href="{{ url('/') }}"><img src="{{asset('uploads/logo/'.$companyInformation->logo)}}"
                                    class="blur-up lazyload" height="70px" weight="70px" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <form class="form_search ajax-search the-basics" role="form">
                            <input type="search" placeholder="Search any Device or Gadgets..."
                                class="nav-search nav-search-field typeahead" aria-expanded="true">
                            <button type="submit" name="nav-submit-button" class="btn-search">
                                <i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="menu-right pull-right">
                        <nav class="text-start">
                            <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                        </nav>
                        <div class="top-header d-block">
                            <ul class="header-dropdown">
                                <li class="mobile-wishlist"><a href="#"><img
                                            src="{{ asset('frontend/assets') }}/images/icon/white-icon/heart.png"
                                            alt=""> </a></li>
                                <li class="onhover-dropdown mobile-account">
                                    @if(Auth::user())
                                    @php
                                    $companycheck=App\Models\VendorCompany::where('user_id',Auth::user()->id)->first();
                                    @endphp
                                    @if($companycheck)
                                    <a href="{{ url('/vendor/dashboard') }}">
                                        <img src="{{ asset('frontend/assets') }}/images/icon/white-icon/user.png"
                                            alt="">
                                    </a>
                                    @else
                                    <a href="{{ url('/dashboard') }}">
                                        <img src="{{ asset('frontend/assets') }}/images/icon/white-icon/user.png"
                                            alt="">
                                    </a>
                                    @endif
                                    @else
                                    <a href="{{ url('/login') }}">
                                        <img src="{{ asset('frontend/assets') }}/images/icon/white-icon/user.png"
                                            alt="">
                                    </a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div d-xl-none d-inline-block mobile-search">
                                        <div><img src="{{ asset('frontend/assets') }}/images/icon/search.png"
                                                onclick="openSearch()" class="img-fluid blur-up lazyload" alt=""> <i
                                                class="ti-search" onclick="openSearch()"></i></div>
                                        <div id="search-overlay" class="search-overlay">
                                            <div> <span class="closebtn" onclick="closeSearch()"
                                                    title="Close Overlay">×</span>
                                                <div class="overlay-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <form class="ajax-search">
                                                                    <div class="form-group the-basics">
                                                                        <input type="text"
                                                                            class="form-control typeahead"
                                                                            id="exampleInputPassword1"
                                                                            placeholder="Search a Product">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary"><i
                                                                            class="fa fa-search"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="onhover-div mobile-setting">
                                        <div><img src="{{ asset('frontend/assets') }}/images/icon/setting.png"
                                                class="img-fluid blur-up lazyload" alt=""> <i class="ti-settings"></i>
                                        </div>
                                        <div class="show-div setting">
                                            <h6>language</h6>
                                            <ul>
                                                <li><a href="#">english</a></li>
                                                <li><a href="#">french</a></li>
                                            </ul>
                                            <h6>currency</h6>
                                            <ul class="list-inline">
                                                <li><a href="#">euro</a></li>
                                                <li><a href="#">rupees</a></li>
                                                <li><a href="#">pound</a></li>
                                                <li><a href="#">doller</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="onhover-div mobile-cart">
                                        <div><img src="{{ asset('frontend/assets') }}/images/icon/cart.png"
                                                class="img-fluid blur-up lazyload" alt=""> <i
                                                class="ti-shopping-cart"></i></div>
                                        <span class="cart_qty_cls">2</span>
                                        <ul class="show-div shopping-cart">
                                            <li>
                                                <div class="media">
                                                    <a href="#"><img alt="" class="me-3"
                                                            src="{{ asset('frontend/assets') }}/images/fashion/product/1.jpg"></a>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <h4>item name</h4>
                                                        </a>
                                                        <h4><span>1 x $ 299.00</span></h4>
                                                    </div>
                                                </div>
                                                <div class="close-circle"><a href="#"><i class="fa fa-times"
                                                            aria-hidden="true"></i></a></div>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    <a href="#"><img alt="" class="me-3"
                                                            src="{{ asset('frontend/assets') }}/images/fashion/product/2.jpg"></a>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <h4>item name</h4>
                                                        </a>
                                                        <h4><span>1 x $ 299.00</span></h4>
                                                    </div>
                                                </div>
                                                <div class="close-circle"><a href="#"><i class="fa fa-times"
                                                            aria-hidden="true"></i></a></div>
                                            </li>
                                            <li>
                                                <div class="total">
                                                    <h5>subtotal : <span>$299.00</span></h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="buttons"><a href="cart.html" class="view-cart">view
                                                        cart</a> <a href="#" class="checkout">checkout</a></div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ dd($maincate) }} --}}
    <div class="bottom-part">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div class="category-menu d-none d-xl-block h-100">
                        <div id="toggle-sidebar" class="toggle-sidebar">
                            <i class="fa fa-bars sidebar-bar"></i>
                            <h5 class="mb-0">shop by category</h5>
                        </div>
                    </div>
                    <div class="sidenav fixed-sidebar marketplace-sidebar" style="display: none;">
                        <nav class="">
                            <div>
                                <div class="sidebar-back text-start d-xl-none d-block"><i class="fa fa-angle-left pe-2"
                                        aria-hidden="true"></i> Back</div>
                            </div>
                            <ul id="sub-menu" class="sm pixelstrap sm-vertical hover-unset"
                                data-smartmenus-id="16437846525555837">
                                @foreach ($maincate as $category)
                                <li> <a href="{{ url('/category-wish-shop?category='.$category->id) }}"
                                        class="has-submenu" id="sm-16437846525555837-1" aria-haspopup="true"
                                        aria-controls="sm-16437846525555837-2" aria-expanded="false">{{ $category->name
                                        }}<span class="sub-arrow"></span></a>
                                    <ul class="mega-menu clothing-menu sm-nowrap" id="sm-16437846525555837-2"
                                        role="group" aria-hidden="true" aria-labelledby="sm-16437846525555837-1"
                                        aria-expanded="false"
                                        style="width: auto; display: none; top: auto; left: 0px; margin-left: 253px; margin-top: -41px; min-width: 10em; max-width: 20em;">
                                        @foreach ($category->subCategory ?? [] as $sub_category)
                                        <li>
                                            <div class="row m-0">
                                                <div class="col-xl-4">
                                                    <div class="link-section">
                                                        <a
                                                            href="{{ url('/category-wish-shop?child_category='.$sub_category->id) }}">
                                                            <h5>{{ $sub_category->name }}</h5>
                                                        </a>
                                                        <ul>
                                                            @foreach ($sub_category->reSubCategory ?? [] as
                                                            $sub_child_category)
                                                            <li><a
                                                                    href="{{ url('/category-wish-shop?sub_child_category='.$sub_child_category->id) }}">{{
                                                                    $sub_child_category->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-9 position-unset">
                    <div class="main-nav-center">
                        <nav class="text-start">
                            <!-- Sample menu definition -->
                            <ul id="main-menu" class="sm pixelstrap sm-horizontal hover-unset"
                                data-smartmenus-id="1643784652549975">
                                <li>
                                    <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                            aria-hidden="true"></i></div>
                                </li>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/shop') }}">Shop</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-3 d-none d-xxl-inline-block">
                    <div class="header-options">
                        <div class="vertical-slider no-arrow slick-initialized slick-slider slick-vertical"><button
                                class="slick-prev slick-arrow" aria-label="Previous" type="button"
                                style="display: inline-block;">Previous</button>
                            <div class="slick-list draggable" style="height: 0px;">
                                <div class="slick-track"
                                    style="opacity: 1; height: 0px; transform: translate3d(0px, 0px, 0px);">
                                    <div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true"
                                        tabindex="-1" style="width: 0px;">
                                        <div>
                                            <div style="width: 100%; display: inline-block;">
                                                <span><i class="ti-gift" aria-hidden="true"></i>Gift Card for all the
                                                    season</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slick-slide" data-slick-index="0" aria-hidden="true" style="width: 0px;"
                                        tabindex="-1">
                                        <div>
                                            <div style="width: 100%; display: inline-block;">
                                                <span><i class="ti-truck" aria-hidden="true"></i>Free Shipping on Orders
                                                    $100+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 0px;"
                                        tabindex="-1">
                                        <div>
                                            <div style="width: 100%; display: inline-block;">
                                                <span><i class="ti-announcement" aria-hidden="true"></i>Buy One Get Two
                                                    Free</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slick-slide slick-current slick-active" data-slick-index="2"
                                        aria-hidden="false" style="width: 0px;">
                                        <div>
                                            <div style="width: 100%; display: inline-block;">
                                                <span><i class="ti-gift" aria-hidden="true"></i>Gift Card for all the
                                                    season</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slick-slide slick-cloned" data-slick-index="3" aria-hidden="true"
                                        tabindex="-1" style="width: 0px;">
                                        <div>
                                            <div style="width: 100%; display: inline-block;">
                                                <span><i class="ti-truck" aria-hidden="true"></i>Free Shipping on Orders
                                                    $100+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slick-slide slick-cloned" data-slick-index="4" aria-hidden="true"
                                        tabindex="-1" style="width: 0px;">
                                        <div>
                                            <div style="width: 100%; display: inline-block;">
                                                <span><i class="ti-announcement" aria-hidden="true"></i>Buy One Get Two
                                                    Free</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true"
                                        tabindex="-1" style="width: 0px;">
                                        <div>
                                            <div style="width: 100%; display: inline-block;">
                                                <span><i class="ti-gift" aria-hidden="true"></i>Gift Card for all the
                                                    season</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><button class="slick-next slick-arrow" aria-label="Next" type="button"
                                style="display: inline-block;">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>