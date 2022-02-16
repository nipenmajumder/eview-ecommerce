@extends('layouts.frontend')
@section('title', 'Order Track')
@section('content')
@if($data!=null)
<section class="section-b-space light-layout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="success-text">

                    @php
                    if ($data->order_status == 0) {
                    $text = 'order pending';
                    } elseif ($data->order_status == 1) {
                    $text = 'order in process';
                    } elseif ($data->order_status == 3) {
                    $text = 'order delivered';
                    } elseif ($data->order_status == 4) {
                    $text = 'order returned';
                    } else {
                    }
                    @endphp
                    <p>{{ $text }}</p>
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
                    @php
                    $product = json_decode($data->products);
                    @endphp
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

                            <li>subtotal <span>৳{{ $data->cart_total }}</span></li>
                            <li>shipping <span>৳{{ $data->delivery_charge }}</span></li>
                        </ul>
                    </div>
                    <div class="final-total">
                        <h3>total <span>৳{{ $data->total_amount }}</span></h3>
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
                                <li>Bangladesh</li>
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
@else

<section class="section-b-space light-layout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="success-text">
                    <h3 class="text-danger mb-5">Opps! Order id not found</h3>
                    <a href="{{ url('/') }}" class="btn btn-solid" id="mc-submit">Back To Home</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif




@endsection