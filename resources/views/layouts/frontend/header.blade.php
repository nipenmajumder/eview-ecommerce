<header class="header-style-5 style-light">
    <div class="mobile-fix-option"></div>
    <div class="top-header top-header-dark2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li>Welcome to {{
                                $companyInformation->company_name }}</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: {{
                                $companyInformation->mobile }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-end">
                    <ul class="header-dropdown">
                        <li class="mobile-wishlist"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </li>
                        <li class="onhover-dropdown mobile-account"> <i class="fa fa-user" aria-hidden="true"></i>
                            My Account
                            <ul class="onhover-show-div">
                                @if(Auth::user())
                                @php
                                $companycheck=App\Models\VendorCompany::where('user_id',Auth::user()->id)->first();
                                @endphp
                                @if($companycheck)
                                <li><a href="{{ url('/vendor/dashboard') }}">Dashboard</a></li>
                                @else
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                @endif
                                @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">register</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
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
                                    class="img-fluid blur-up lazyload" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <form class="form_search" role="form">
                            <input id="query search-autocomplete" type="search"
                                placeholder="Search any Device or Gadgets..." class="nav-search nav-search-field"
                                aria-expanded="true">
                            <button type="submit" name="nav-submit-button" class="btn-search">
                                <i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="menu-right pull-right">
                        <div>
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div mobile-search d-xl-none d-inline-block">
                                        <div><img src="{{asset('frontend')}}/assets/images/icon/search.png"
                                                onclick="openSearch()" class="img-fluid blur-up lazyload" alt=""> <i
                                                class="ti-search" onclick="openSearch()"></i></div>
                                        <div id="search-overlay" class="search-overlay">
                                            <div> <span class="closebtn" onclick="closeSearch()"
                                                    title="Close Overlay">×</span>
                                                <div class="overlay-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
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
                                        <div><img src="{{asset('frontend')}}/assets/images/icon/setting.png"
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
                                    <li class="onhover-div mobile-cart" id="cart_section">

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-part bottom-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div class="category-menu d-none d-xl-block h-100">
                        <div id="toggle-sidebar" class="toggle-sidebar">
                            <i class="fa fa-bars sidebar-bar"></i>
                            <h5 class="mb-0">shop by category</h5>
                        </div>
                    </div>
                    <div class="sidenav fixed-sidebar marketplace-sidebar svg-icon-menu">
                        <nav>
                            <div>
                                <div class="sidebar-back text-start d-xl-none d-block"><i class="fa fa-angle-left pe-2"
                                        aria-hidden="true"></i> Back</div>
                            </div>

                            <ul id="sub-menu" class="sm pixelstrap sm-vertical">
                                {{-- <li> <a href="#">snacks</a>
                                    <ul>
                                        <li> <a href="#">more..</a>
                                            <ul>
                                                <li> <a href="#">accessories</a>
                                                    <ul>
                                                        <li> <a href="#">more...</a>
                                                            <ul>
                                                                <li><a href="#">accessory gift sets</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </li> --}}
                                <!-- first foreach -->
                                @foreach ($maincate as $category)
                                <li> <a href="{{ url('/category-wish-shop?category='.$category->id) }}">{{
                                        $category->name
                                        }}</a>
                                    <ul>
                                        <!-- 2nd foreach -->

                                        @foreach ($category->subCategory ?? [] as $sub_category)
                                        <li><a
                                                href="{{ url('/category-wish-shop?child_category='.$sub_category->id) }}">{{
                                                $sub_category->name }}</a>
                                            <ul>
                                                <!-- 3rd foreach -->

                                                @foreach ($sub_category->reSubCategory ?? [] as
                                                $sub_child_category)
                                                <li><a
                                                        href="{{ url('/category-wish-shop?sub_child_category='.$sub_child_category->id) }}">{{
                                                        $sub_child_category->name }}</a>
                                                    <ul>
                                                        <!-- 4th foreach -->
                                                        @foreach ($sub_child_category->reReSubCategory ?? [] as
                                                        $re_re_sub_category)
                                                        <li>
                                                        </li>
                                                        <li> <a
                                                                href="{{ url('/category-wish-shop?re_re_sub_category='.$re_re_sub_category->id) }}">{{
                                                                $re_re_sub_category->name }}</a>
                                                            <ul>
                                                                <!-- 5th foreach -->
                                                                @foreach ($re_re_sub_category->reReReSubCategory ??[] as
                                                                $re_re_re_sub_category)
                                                                <li><a
                                                                        href="{{ url('/category-wish-shop?re_re_re_sub_category='.$re_re_re_sub_category->id) }}">{{
                                                                        $re_re_re_sub_category->name }}</a>
                                                                </li>
                                                                @endforeach

                                                            </ul>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="main-nav-center">
                        <nav id="main-nav" class="text-start">
                            <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                            <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                <li>
                                    <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                            aria-hidden="true"></i></div>
                                </li>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/shop') }}">Shop</a></li>

                                <li> <a href="#">snacks</a>
                                    <ul>
                                        <li> <a href="#">more..</a>
                                            <ul>
                                                <li> <a href="#">accessories</a>
                                                    <ul>
                                                        <li> <a href="#">more...</a>
                                                            <ul>
                                                                <li><a href="#">accessory gift sets</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>