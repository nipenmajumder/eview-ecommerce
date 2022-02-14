@extends('layouts.frontend')
@section('title', 'Payment Method')
@section('content')
<section class="section-b-space light-layout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="success-text">
                    <div class="checkmark">
                        <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                            </path>
                        </svg>
                        <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                            </path>
                        </svg>
                        <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                            </path>
                        </svg>
                        <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                            </path>
                        </svg>
                        <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                            </path>
                        </svg>
                        <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                            </path>
                        </svg>
                        <svg class="checkmark__check" height="36" viewBox="0 0 48 36" width="48"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M47.248 3.9L43.906.667a2.428 2.428 0 0 0-3.344 0l-23.63 23.09-9.554-9.338a2.432 2.432 0 0 0-3.345 0L.692 17.654a2.236 2.236 0 0 0 .002 3.233l14.567 14.175c.926.894 2.42.894 3.342.01L47.248 7.128c.922-.89.922-2.34 0-3.23">
                            </path>
                        </svg>
                        <svg class="checkmark__background" height="115" viewBox="0 0 120 115" width="120"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M107.332 72.938c-1.798 5.557 4.564 15.334 1.21 19.96-3.387 4.674-14.646 1.605-19.298 5.003-4.61 3.368-5.163 15.074-10.695 16.878-5.344 1.743-12.628-7.35-18.545-7.35-5.922 0-13.206 9.088-18.543 7.345-5.538-1.804-6.09-13.515-10.696-16.877-4.657-3.398-15.91-.334-19.297-5.002-3.356-4.627 3.006-14.404 1.208-19.962C10.93 67.576 0 63.442 0 57.5c0-5.943 10.93-10.076 12.668-15.438 1.798-5.557-4.564-15.334-1.21-19.96 3.387-4.674 14.646-1.605 19.298-5.003C35.366 13.73 35.92 2.025 41.45.22c5.344-1.743 12.628 7.35 18.545 7.35 5.922 0 13.206-9.088 18.543-7.345 5.538 1.804 6.09 13.515 10.696 16.877 4.657 3.398 15.91.334 19.297 5.002 3.356 4.627-3.006 14.404-1.208 19.962C109.07 47.424 120 51.562 120 57.5c0 5.943-10.93 10.076-12.668 15.438z">
                            </path>
                        </svg>
                    </div>
                    <h2>thank you</h2>
                    <p>Payment is successfully processsed and your order is on the way</p>
                    <p class="font-weight-bold">Order ID:{{ $data->order_id }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-order">
                    @foreach ($product as $obj)
                    @php $product_image =
                    App\Models\Product::where('id',$obj->id)->select(['image'])->first();@endphp
                    <div class="row product-order-detail">
                        <div class="col-3"><img src="{{asset('uploads/products/'.$product_image->image)}}"
                                style="max-height: 80px; max-width: 100px;" alt="" class="img-fluid blur-up lazyloaded">
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>product name</h4>
                                <h5>{{Str::limit($obj->product_name,20)}} </h5>
                            </div>
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>quantity</h4>
                                <h5>{{$obj->qty}}</h5>
                            </div>
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>price</h4>
                                <h5>৳{{$obj->price}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="total-sec">
                        <ul>
                            @php
                            $deliveryCharge = 70;
                            @endphp
                            <li>subtotal <span>৳{{ $data->total_amount }}</span></li>
                            <li>shipping <span>৳{{ $deliveryCharge }}</span></li>
                            {{-- <li>tax(GST) <span>$ </span></li> --}}
                        </ul>
                    </div>
                    <div class="final-total">
                        <h3>total <span>৳@php echo str_replace(',', '', $data->total_amount) +
                                $deliveryCharge;@endphp</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="order-success-sec">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>summery</h4>
                            <ul class="order-detail">
                                <li>order ID: {{ $data->order_id }}</li>
                                <li>Order Date: {{ $data->created_at->format('d/m/Y') }}</li>
                                <li>Order Total: ৳{{ $data->total_amount }}</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h4>shipping address</h4>
                            <ul class="order-detail">
                                <li>{{ $data->country_name }}</li>
                                <li>{{ $data->city_name }}</li>
                                <li>{{ $data->shipping_address }}</li>
                                <li>Contact No. {{ $data->shipping_phone }}</li>
                            </ul>
                        </div>
                        {{-- <div class="col-sm-12 payment-mode">
                            <h4>payment method</h4>
                            <p>Pay on Delivery (Cash/Card). Cash on delivery (COD) available. Card/Net banking
                                acceptance subject to device availability.</p>
                        </div>
                        <div class="col-md-12">
                            <div class="delivery-sec">
                                <h3>expected date of delivery: <span>october 22, 2018</span></h3>
                                <a href="order-tracking.html">track order</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection