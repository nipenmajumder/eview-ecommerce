@extends('layouts.frontend')
@section('title', 'Product-Details')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>product</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<!-- section start -->
<section>
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-slick">

                        @php
                        $thunmbnailImg = array($data->image);
                        $gal_img=json_decode($data->gallary_image);
                        $img = array_merge($thunmbnailImg, $gal_img);

                        @endphp
                        @foreach($img as $dimage)
                        <div>
                            <img src="{{ asset('uploads/products/'.$dimage) }}" alt=""
                                class="img-fluid blur-up lazyload image_zoom_cls-0">
                        </div>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-nav">
                                @foreach($img as $dimage)
                                <div>
                                    <img src="{{ asset('uploads/products/'.$dimage) }}" alt=""
                                        class="img-fluid blur-up lazyload">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 rtl-text">
                    <div class="product-right">
                        <form id="cartsection">

                            {{-- <div class="product-count">
                                <ul>
                                    <li>
                                        <img src="{{ asset('frontend') }}/assets/images/fire.gif" class="img-fluid"
                                            alt="image">
                                        <span class="p-counter">37</span>
                                        <span class="lang">orders in last 24 hours</span>
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend') }}/assets/images/person.gif"
                                            class="img-fluid user_img" alt="image">
                                        <span class="p-counter">44</span>
                                        <span class="lang">active view this</span>
                                    </li>
                                </ul>
                            </div> --}}
                            <h2>{{ $data->product_name }}</h2>
                            {{-- <div class="rating-section">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <h6>120 ratings</h6>
                            </div>
                            <div class="label-section">
                                <span class="badge badge-grey-color">#1 Best seller</span>
                                <span class="label-text">in {{ $data->Category->name}}</span>
                            </div> --}}
                            <!-- (#11 offer )-->
                            @if($today==$eleven && $data->offer=='11_offer' && $data->have_a_discount=='1')
                            @php
                            $discounted_price = ($data->product_price)-($data->product_price*(11/100));
                            @endphp
                            <h4 class="badge badge-grey-color">11% off</h4>
                            <h3 class="price-detail">৳ {{ $discounted_price }}
                                <del>৳ {{ $data->product_price }}</del>
                            </h3>
                            <input type="hidden" name="price" value="{{$discounted_price}}">
                            <input type="hidden" name="product_main_price" value="{{$data->product_price}}">
                            <!-- (#22_offer)-->
                            @elseif($today==$twenty_two && $data->offer=='22_offer' && $data->have_a_discount=='1')
                            @php
                            $discounted_price = ($data->product_price)-($data->product_price*(22/100));
                            @endphp
                            <h4 class="badge badge-grey-color">22% off</h4>
                            <h3 class="price-detail">৳ {{ $discounted_price }}
                                <del>৳ {{ $data->product_price }}</del>
                            </h3>
                            <input type="hidden" name="price" value="{{$discounted_price}}">
                            <input type="hidden" name="product_main_price" value="{{$data->product_price}}">
                            <!-- (#special_offer) -->
                            @elseif($data->offer=='special_offer' && $data->have_a_discount=='1')
                            <h4 class="badge badge-grey-color">special offer</h4>
                            <!-- (no offer) -->
                            @elseif($data->have_a_discount==null)
                            <h3 class="price-detail">৳ {{ $data->product_price }}</h3>
                            <input type="hidden" name="price" value="{{$data->product_price}}">
                            @else
                            <!-- (#2) endif start -->
                            @endif





                            <!-- <ul class="color-variant">
                            <li class="bg-light0 active"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul> -->

                            <div id="selectSize" class="addeffect-section product-description border-product">
                                @if($data->product_size !=NULL)
                                <h6 class="product-title size-text">select size <span><a href="" data-bs-toggle="modal"
                                            data-bs-target="#sizemodal">size
                                            chart</a></span></h6>
                                <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sheer
                                                    Straight Kurta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body"><img
                                                    src="{{ asset('frontend') }}/assets/images/size-chart.jpg" alt=""
                                                    class="img-fluid blur-up lazyload"></div>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="error-message">please select size</h6>
                                <div class="size-box" style="margin-left: ">
                                    <ul>
                                        @foreach(explode(',',$data->product_size) as $size)
                                        <li><a href="javascript:void(0)">{{ $size }}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                                @endif
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                    class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-prepend"><button type="button"
                                                class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                    class="ti-angle-right"></i></button></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-buttons">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <input type="hidden" name="name" value="{{$data->product_name}}">
                                <input type="hidden" name="product_sku" value="{{$data->product_sku}}">
                                <input type="hidden" name="image" value="{{$data->image}}">
                                <input type="hidden" name="discount_price" value="">
                                <input type="hidden" name="discount_title" value="">
                                <input type="hidden" name="shop_id" value="{{$data->shop_id}}">
                                <input type="hidden" name="product_sku" value="{{$data->product_sku}}">
                                <input type="hidden" name="product_quantity">
                                <input type="hidden" name="user_id" value="{{ Request::ip() }}">
                                <a class="btn btn-solid hover-solid btn-animation cart">
                                    <i class="fa fa-shopping-cart me-1" aria-hidden="true"></i> add to cart</a>
                                <a class="btn btn-solid wishlist"><i class="fa fa-bookmark fz-16 me-2"
                                        aria-hidden="true"></i>wishlist</a>
                            </div>
                        </form>
                        <div class="product-count">
                            <ul>
                                <li>
                                    <img src="{{ asset('frontend')}}/assets/images/icon/truck.png" class="img-fluid"
                                        alt="image">
                                    <!-- <span class="lang">Free shipping for orders above ৳500 USD</span> -->
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="border-product">
                            <h6 class="product-title">Sales Ends In</h6>
                            <div class="timer">
                                <p id="demo"></p>
                            </div>
                        </div> -->
                        <div class="border-product">
                            <h6 class="product-title">More info</h6>
                            <ul class="shipping-info">
                                <li>Qty: {{ $data->product_qty }}</li>
                                <li>Brand: {{ $data->product_brand }}</li>
                                @if($data->product_weight !=NULL) <li>Weight: {{ $data->product_weight }}</li>@endif
                                @if($data->style !=NULL) <li>Style: {{ $data->style }}</li>@endif
                                @if($data->product_materials !=NULL) <li>Materials: {{ $data->product_materials }}
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="border-product">
                            <h6 class="product-title">share it</h6>
                            <div class="product-icon">
                                <ul class="product-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="border-product">
                            <h6 class="product-title">100% secure payment</h6>
                            <img src="{{ asset('frontend') }}/assets/images/payment.png" class="img-fluid mt-1" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->
<!-- product-tab starts -->
<section class="tab-product m-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                            href="#top-home" role="tab" aria-selected="true"><i
                                class="icofont icofont-ui-home"></i>Details</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab"
                            href="#top-profile" role="tab" aria-selected="false"><i
                                class="icofont icofont-man-in-glasses"></i>Specification</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab"
                            href="#top-contact" role="tab" aria-selected="false"><i
                                class="icofont icofont-contacts"></i>Video</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="review-top-tab" data-bs-toggle="tab" href="#top-review"
                            role="tab" aria-selected="false"><i class="icofont icofont-contacts"></i>Write Review</a>
                        <div class="material-border"></div>
                    </li>
                </ul>
                <div class="tab-content nav-material" id="top-tabContent">
                    <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <div class="product-tab-discription">
                            {!! $data->product_details !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                        <p>The Model is wearing a white blouse from our stylist's collection, see the image for a
                            mock-up of what the actual blouse would look like.it has text written on it in a black
                            cursive language which looks great on a white color.</p>
                        <div class="single-product-tables">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Sleeve Length</td>
                                        <td>Sleevless</td>
                                    </tr>
                                    <tr>
                                        <td>Neck</td>
                                        <td>Round Neck</td>
                                    </tr>
                                    <tr>
                                        <td>Occasion</td>
                                        <td>Sports</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Fabric</td>
                                        <td>Polyester</td>
                                    </tr>
                                    <tr>
                                        <td>Fit</td>
                                        <td>Regular Fit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                        <div class="">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/BUWzX78Ye_8"
                                allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                        <form class="theme-form">
                            <div class="form-row row">
                                <div class="col-md-12">
                                    <div class="media">
                                        <label>Rating</label>
                                        <div class="media-body ms-3">
                                            <div class="rating three-star"><i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Your name"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="review">Review Title</label>
                                    <input type="text" class="form-control" id="review"
                                        placeholder="Enter your Review Subjects" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="review">Review Title</label>
                                    <textarea class="form-control" placeholder="Wrire Your Testimonial Here"
                                        id="exampleFormControlTextarea1" rows="6"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-solid" type="submit">Submit YOur
                                        Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-tab ends -->


<!-- product section start -->
<section class="section-b-space ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col-12 product-related">
                <h2>related products</h2>
            </div>
        </div>
        <div class="row search-product">
            @foreach($related_products as $key => $product)
            <div class="col-xl-2 col-md-4 col-6">
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
                            </div>
                        </div>
                        <div class="product-detail">
                            {{-- <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i>
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
                            $discounted_price =
                            ($product->product_price)-($product->product_price*(11/100));
                            @endphp
                            <h6>৳ {{ $discounted_price }}
                                <del>৳ {{ $product->product_price }}</del>
                            </h6>

                            <input type="hidden" name="price" value="{{$discounted_price}}">
                            <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
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
                            <input type="hidden" name="price" value="{{$discounted_price}}">
                            <input type="hidden" name="product_main_price" value="{{$product->product_price}}">
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
                </form>

            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- product section end -->

@endsection