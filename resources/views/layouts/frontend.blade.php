<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{{ asset('frontend/assets') }}/images/favicon/22.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('frontend/assets') }}/images/favicon/22.png" type="image/x-icon">
    <title>Multikart - Multi-purpopse E-commerce Html Template</title>
    <!--Google font-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets') }}/css/vendors/fontawesome.css">
    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets') }}/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets') }}/css/vendors/slick-theme.css">
    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets') }}/css/vendors/animate.css">
    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets') }}/css/vendors/themify-icons.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets') }}/css/vendors/bootstrap.css">
    <!-- Theme css -->
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/izitost.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets') }}/css/asif.css">
    <link href="{{asset('backend')}}/assets/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets') }}/css/style.css">

</head>

<body class="theme-color-27">



    <!-- loader start -->
    {{--
    <div class="loader_skeleton">
        <header class="header-style-5 color-style">
            <div class="top-header top-header-theme">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-contact">
                                <ul>
                                    <li>Welcome to Our </li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: 123 - 456 - 7890</li>
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
                                    <a href="index.html"><img src="{{ asset('frontend/assets') }}/images/icon/logo/f11.png"
                                            class="img-fluid blur-up lazyload" alt=""></a>
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
                                                    src="{{ asset('frontend/assets') }}/images/icon/white-icon/heart.png" alt=""> </a></li>
                                        <li class="onhover-dropdown mobile-account">
                                            <a href="login.html">
                                                <img src="{{ asset('frontend/assets') }}/images/icon/white-icon/user.png" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <div class="icon-nav d-none d-sm-block">
                                        <ul>
                                            <li class="onhover-div d-xl-none d-inline-block mobile-search">
                                                <div><img src="{{ asset('frontend/assets') }}/images/icon/search.png"  class="img-fluid blur-up lazyload" alt=""> <i class="ti-search"></i></div></li>
                                            <li class="onhover-div mobile-setting">
                                                <div><img src="{{ asset('frontend/assets') }}/images/icon/setting.png"
                                                        class="img-fluid blur-up lazyload" alt=""> <i
                                                        class="ti-settings"></i></div> </li>
                                            <li class="onhover-div mobile-cart">
                                                <div><img src="{{ asset('frontend/assets') }}/images/icon/cart.png"
                                                        class="img-fluid blur-up lazyload" alt=""> <i
                                                        class="ti-shopping-cart"></i></div>
                                                <span class="cart_qty_cls">2</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-part">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="category-menu d-none d-xl-block h-100">
                                <div class="toggle-sidebar">
                                    <i class="fa fa-bars sidebar-bar"></i>
                                    <h5 class="mb-0">shop by category</h5>
                                </div>
                            </div> </div>
                        <div class="col-xxl-6 col-xl-9">
                            <div class="main-nav-center">
                                <nav class="text-start">
                                    <!-- Sample menu definition -->
                                    <ul class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                    aria-hidden="true"></i></div>
                                        </li>
                                        <li><a href="index.html">Home</a></li>
                                        <li class="mega"><a href="#">feature</a></li>
                                        <li><a href="#">shop</a></li>
                                        <li><a href="#">product</a> </li>
                                        <li><a href="#">pages</a></li>
                                        <li> <a href="#">blog</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="pt-0 height-65">
            <div class="home-slider">
                <div class="home"></div>
            </div>
        </section>
        <section class="pt-0 ratio3_2">
            <div class="container-fluid p-0">
                <div class="row m-0">
                    <div class="col-lg-3 col-sm-6 p-0">
                        <a href="#">
                            <div class="collection-banner p-left">
                                <div class="ldr-bg ldr-bg-dark">
                                    <div class="contain-banner banner-3">
                                        <div>
                                            <h4></h4>
                                            <h2></h2>
                                            <h6></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 p-0">
                        <a href="#">
                            <div class="collection-banner p-left">
                                <div class="ldr-bg ldr-bg-darker">
                                    <div class="contain-banner banner-3">
                                        <div>
                                            <h4></h4>
                                            <h2></h2>
                                            <h6></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 p-0">
                        <a href="#">
                            <div class="collection-banner p-left">
                                <div class="ldr-bg ldr-bg-dark">
                                    <div class="contain-banner banner-3">
                                        <div>
                                            <h4></h4>
                                            <h2></h2>
                                            <h6></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 p-0">
                        <a href="#">
                            <div class="collection-banner p-left">
                                <div class="ldr-bg ldr-bg-darker">
                                    <div class="contain-banner banner-3">
                                        <div>
                                            <h4></h4>
                                            <h2></h2>
                                            <h6></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="product-para">
                            <p class="first"></p>
                            <p class="second"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bag-product pt-0 section-b-space ratio_square">
            <div class="container">
                <div class="row row-cols-xxl-6 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 gy-sm-4 gy-3">
                    <div class="product-box product-sm">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                        </div>
                    </div>
                    <div class="product-box product-sm">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                        </div>
                    </div>
                    <div class="product-box product-sm">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                        </div>
                    </div>
                    <div class="product-box product-sm">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                        </div>
                    </div>
                    <div class="product-box product-sm">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                        </div>
                    </div>
                    <div class="product-box product-sm">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                        </div>
                    </div>
                    <div class="product-box product-sm">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                        </div>
                    </div>
                    <div class="product-box product-sm">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                        </div>
                    </div>
                    <div class="product-box product-sm">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                        </div>
                    </div>
                    <div class="product-box product-sm">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                        </div>
                    </div>
                    <div class="product-box product-sm">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                        </div>
                    </div>
                    <div class="product-box product-sm">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
--}}
    <!-- loader end -->
    <!-- header start -->
    @include('frontend.include.header')
<div id="loader"></div>
    <!-- header end -->
<div id="loaderIcon" style="display:none" class="spinner-border text-primary" role="status">
    <span class="sr-only">Loading...</span>
</div>
<style>
div#loaderIcon {
    position: fixed;
    width: 1%;
    height: 18%;
    top: 2%;
    left: 50%;
    z-index: 999;
}
</style>
    @yield('content')
    
    
    @include('frontend.include.footer')

    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="quick-view-img" id="product_image">
                             
                            </div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <h2 id="product_name"></h2>
                                <h3 id="product_price"></h3>
                                <!-- <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul> -->
                                <div class="border-product">
                                    <h6 class="product-title">Product Info</h6>
                                    <p id="brand"></p>
                                    <p id="product_weight"></p>
                                    <p id="style"></p>
                                    <p id="product_materials"></p>
                                </div>
                                <div class="product-description border-product">
                                    <div class="size-box">
                                        <!-- <ul>
                                            <li class="active"><a href="javascript:void(0)">s</a></li>
                                            <li><a href="javascript:void(0)">m</a></li>
                                            <li><a href="javascript:void(0)">l</a></li>
                                            <li><a href="javascript:void(0)">xl</a></li>
                                        </ul> -->
                                    </div>
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                        class="ti-angle-left"></i></button> </span>
                                            <input type="text" name="quantity" class="form-control input-number"
                                                value="1"> <span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                        class="ti-angle-right"></i></button></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons" id="product_button">
                                     <a href="#" class="btn btn-solid">add to cart</a> 
                                     <a href="#" class="btn btn-solid">view detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="theme-settings">
        <ul>
            <li class="demo-li">
                <a href="javascript:void(0)" onclick="openSetting()">
                    <div class="setting-sidebar" id="setting-icon">
                        <h5>50+ <br>demo</h5>
                    </div>
                </a>
            </li>
            <li>
                <div class="dark-btn">Dark</div>
            </li>
            <li>
                <div class="rtl-btn">RTL</div>
            </li>
            <li class="input-picker">
                <input id="ColorPicker1" type="color" value="#f39910" name="Background">
            </li>
            <li class="input-picker">
                <input id="ColorPicker2" type="color" value="#394868" name="Background">
            </li>
        </ul>
    </div>
    <div class="scroll-setting-box">
        <div id="setting_box" class="setting-box">
            <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
            <div class="setting_box_body">
                <div onclick="closeSetting()">
                    <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back
                    </div>
                </div>
                <div class="setting-body">
                    <div class="setting-title">
                        <div>
                            <img src="{{ asset('frontend/assets') }}/images/icon/logo.png" class="img-fluid" alt="">
                            <h3>50+ <span>demos</span> <br> suit for any type of online store.</h3>
                        </div>
                    </div>
                    <div class="setting-contant">
                        <div class="row demo-section">
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="gradient.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/gradient.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="gradient.html" class="demo-text">
                                        <h4>gradient<h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="index.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/fashion.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="index.html" class="demo-text">
                                        <h4>fashion</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-2.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/fashion-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-2.html" class="demo-text">
                                        <h4>fashion 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-3.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/fashion-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-3.html" class="demo-text">
                                        <h4>fashion 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-4.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/fashion-4.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-4.html" class="demo-text">
                                        <h4>fashion 4</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-5.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/fashion-5.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-5.html" class="demo-text">
                                        <h4>fashion 5</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-6.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/fashion-6.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-6.html" class="demo-text">
                                        <h4>fashion 6</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-7.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/fashion-7.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-7.html" class="demo-text">
                                        <h4>fashion 7</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="furniture.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/furniture.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="furniture.html" class="demo-text">
                                        <h4>furniture</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="furniture-2.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/furniture-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="furniture-2.html" class="demo-text">
                                        <h4>furniture 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="furniture-3.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/furniture-dark.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="furniture-3.html" class="demo-text">
                                        <h4>furniture dark</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="electronic-1.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/electronics.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="electronic-1.html" class="demo-text">
                                        <h4>electronics</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="electronic-2.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/electronics-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="electronic-2.html" class="demo-text">
                                        <h4>electronics 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="electronic-3.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/electronics-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="electronic-3.html" class="demo-text">
                                        <h4>electronics 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/marketplace.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo.html" class="demo-text">
                                        <h4>marketplace</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo-2.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/marketplace-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo-2.html" class="demo-text">
                                        <h4>marketplace 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo-3.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/marketplace-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo-3.html" class="demo-text">
                                        <h4>marketplace 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo-4.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/marketplace-4.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo-4.html" class="demo-text">
                                        <h4>marketplace 4</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/vegetables.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables.html" class="demo-text">
                                        <h4>vegetables</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-2.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/vegetables-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-2.html" class="demo-text">
                                        <h4>vegetables 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-3.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/vegetables-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-3.html" class="demo-text">
                                        <h4>vegetables 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="jewellery.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/jewellery.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="jewellery.html" class="demo-text">
                                        <h4>jewellery</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="jewellery-2.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/jewellery-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="jewellery-2.html" class="demo-text">
                                        <h4>jewellery 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="jewellery-3.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/jewellery-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="jewellery-3.html" class="demo-text">
                                        <h4>jewellery 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="bags.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/bag.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="bags.html" class="demo-text">
                                        <h4>bag</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="watch.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/watch.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="watch.html" class="demo-text">
                                        <h4>watch</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="medical.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/medical.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="medical.html" class="demo-text">
                                        <h4>medical</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="perfume.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/perfume.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="perfume.html" class="demo-text">
                                        <h4>perfume</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="yoga.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/yoga.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="yoga.html" class="demo-text">
                                        <h4>yoga</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="christmas.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/christmas.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="christmas.html" class="demo-text">
                                        <h4>christmas</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="bicycle.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/bicycle.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="bicycle.html" class="demo-text">
                                        <h4>bicycle</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marijuana.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/marijuana.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marijuana.html" class="demo-text">
                                        <h4>marijuana</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="gym-product.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/gym.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="gym-product.html" class="demo-text">
                                        <h4>gym</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="tools.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/tools.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="tools.html" class="demo-text">
                                        <h4>tools</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="shoes.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/shoes.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="shoes.html" class="demo-text">
                                        <h4>shoes</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="books.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/books.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="books.html" class="demo-text">
                                        <h4>books</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="kids.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/kids.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="kids.html" class="demo-text">
                                        <h4>kids</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="game.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/game.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="game.html" class="demo-text">
                                        <h4>game</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="beauty.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/beauty.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="beauty.html" class="demo-text">
                                        <h4>beauty</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="left_sidebar-demo.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/left-sidebar.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="left_sidebar-demo.html" class="demo-text">
                                        <h4>left sidebar</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="video-slider.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/video-slider.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="video-slider.html" class="demo-text">
                                        <h4>video slider</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="metro.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/metro.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="metro.html" class="demo-text">
                                        <h4>metro</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="goggles.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/goggles.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="goggles.html" class="demo-text">
                                        <h4>goggles</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="flower.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/flower.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="flower.html" class="demo-text">
                                        <h4>flower</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="light.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/light.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="light.html" class="demo-text">
                                        <h4>light</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="nursery.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/nursery.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="nursery.html" class="demo-text">
                                        <h4>nursery</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="pets.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/pets.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="pets.html" class="demo-text">
                                        <h4>pets</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="video.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/video.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="video.html" class="demo-text">
                                        <h4>video</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="lookbook-demo.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/lookbook.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="lookbook-demo.html" class="demo-text">
                                        <h4>lookbook</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="full-page.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/full-page.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="full-page.html" class="demo-text">
                                        <h4>full page</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="instagram-shop.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/instagram.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="instagram-shop.html" class="demo-text">
                                        <h4>instagram</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="parallax.html" class="layout-container">
                                        <img src="{{ asset('frontend/assets') }}/images/landing-page/demo/parallax.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="parallax.html" class="demo-text">
                                        <h4>parallax</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>

    <script src="{{ asset('frontend/assets') }}/js/jquery-3.3.1.min.js"></script>
    <!-- slick js-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script> -->

<script>
    $(document).ready(function(){
        $(".productdetails").click(function(){
            
            $('#loaderIcon').show();
        var product_id=$(this).data("id");
            $("#product_name").empty();
            $("#product_price").empty();
            $("#product_details").empty();
            $("#product_id").empty();
            $("#product_image").empty();
            $("#product_button").empty();
            $('#brand').empty();
            $('#product_materials').empty();

            if (product_id) {
                $.ajax({
                    url: "{{  url('/get/product/details/') }}/" + product_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $("#product_name").text(data.product_name);
                        $("#product_price").text('৳'+data.product_price);
                        $("#product_id").text(data.id);
                        $("#product_image").append('<img src="{{ asset("uploads/products/") }}/'+data.image+'" alt="" class="img-fluid blur-up lazyload">');
                        $("#product_button").append('<a href="#" class="btn btn-solid">add to cart</a><a href="{{ url("products/") }}/'+data.slug+'/'+data.id+'"" class="btn btn-solid">view detail</a>')
                        
                        $("#product_name").text(data.product_name);
                        $("#product_price").text('৳'+data.product_price);

                        if(data.product_brand==null){
                            $('#brand').text("");
                        }else{
                            $('#brand').text('Brand: '+data.product_brand);
                        }

                        if(data.product_materials){
                            $('#product_materials').text("");
                        }else{
                            $('#product_materials').text('Product Materials: '+data.product_materials);
                        }


                    },complete: function(){

                            $('#loaderIcon').hide();

                        }
       
                });
            }

        });
    });
</script>
    <script src="{{ asset('frontend/assets') }}/js/slick.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/slick-animation.min.js"></script>
    <!-- menu js-->
    <script src="{{ asset('frontend/assets') }}/js/menu.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/sticky-menu.js"></script>
    <!-- ajax search js -->
    <script src="{{ asset('frontend/assets') }}/js/typeahead.bundle.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/typeahead.jquery.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/ajax-custom.js"></script>
    <!-- lazyload js-->
    <script src="{{ asset('frontend/assets') }}/js/lazysizes.min.js"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('frontend/assets') }}/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Notification js-->
    <script src="{{ asset('frontend/assets') }}/js/bootstrap-notify.min.js"></script>

    <script src="{{asset('backend')}}/assets/js/spartan-multi-image-picker.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.js"></script>
    <script>
        $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
    </script>
    <script>
		$(document).ready(function() {

			$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
			$("#thumbnail_img").spartanMultiImagePicker({
				fieldName: 'thumbnail_img',
				maxCount: 1,
				rowHeight: '200px',
				groupClassName: 'col-lg-3 col-md-4 col-sm-4 col-xs-6',
				maxFileSize: '',
				dropFileLabel: "Drop Here",
				onExtensionErr: function(index, file) {
					console.log(index, file, 'extension err');
					alert('Please only input png or jpg type file')
				},
				onSizeErr: function(index, file) {
					console.log(index, file, 'file size too big');
					alert('File size too big');
				}
			});

			$("#photos").spartanMultiImagePicker({
				fieldName: 'photos[]',
				maxCount: 10,
				rowHeight: '200px',
				groupClassName: 'col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-6',
				maxFileSize: '',
				dropFileLabel: "Drop Here",
				onExtensionErr: function(index, file) {
					console.log(index, file, 'extension err');
					alert('Please only input png or jpg type file')
				},
				onSizeErr: function(index, file) {
					console.log(index, file, 'file size too big');
					alert('File size too big');
				}
			});
			$("#product_img").spartanMultiImagePicker({
				fieldName: 'product_img',
				maxCount: 1,
				rowHeight: '250px',
				groupClassName: 'col-xl-12 col-md-12 col-sm-12 col-xs-12',
				maxFileSize: '',
				dropFileLabel: "Drag & Drop",
				onExtensionErr: function(index, file) {
					console.log(index, file, 'extension err');
					alert('Please only input png or jpg type file')
				},
				onSizeErr: function(index, file) {
					console.log(index, file, 'file size too big');
					alert('File size too big');
				}
			});

		});
</script>
<script src="{{asset('backend')}}/assets/plugins/ckeditor/ckeditor.js"></script>
<script src="{{asset('backend')}}/assets/plugins/ckeditor/ckeditor-active.js"></script> 
<script src="{{ asset('frontend/assets') }}/js/theme-setting.js"></script>
<script src="{{ asset('frontend/assets') }}/js/script.js"></script>
<script src="{{ asset('frontend/assets') }}/js/color-setting.js"></script>
<script src="{{ asset('frontend/assets') }}/js/custom-slick-animated.js"></script>
<script src="{{asset('frontend')}}/assets/js/izitost.js"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,  
        });
    });
</script>
<script>
    $(document).on("click", "#delete", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
                title: "Are you Want to delete?",
                text: "Once Delete, This will be Permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Safe Data!");
                }
            });
    });
</script>
<script>
    @if(Session::has('messege'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'success':

            iziToast.success({
                message: '{{ Session::get('messege') }}',
                'position': 'topCenter'
            });
            brack;
        case 'info':
            iziToast.info({
                message: '{{ Session::get('messege') }}',
                'position': 'topRight'
            });
            brack;
        case 'warning':
            iziToast.warning({
                message: '{{ Session::get('messege') }}',
                'position': 'topRight'
            });
            break;
        case 'error':
            iziToast.error({
                message: '{{ Session::get('messege') }}',
                'position': 'topRight'
            });
            break;
    }
    @endif
</script>
<script>
    $(window).on('load', function () {
        setTimeout(function () {
            $('#exampleModal').modal('show');
        }, 2500);
    });
    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }

</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
<script> $(document).ready(function() {     $('.select2-multi').select2();  }); </script>

</body>
</html>