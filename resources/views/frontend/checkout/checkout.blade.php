{{-- {{ dd(Cart::content()) }} --}}
@extends('layouts.frontend')
@section('title', 'Checkout')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Check-out</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Check-out</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="checkout-page">
            <div class="checkout-form">
                <form method="post" action="{{ route('checkout.save') }}">@csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Delivery Address</h3>
                            </div>
                            <div class="row check-out">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Name</div>
                                    <input type="text" name="shipping_name" placeholder="your name "
                                        value="{{ $user->name }}">
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Phone</div>
                                    <input type="text" name="shipping_phone" value="{{ $user->phone}}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Email Address</div>
                                    <input type="text" name="shipping_email" value="{{ $user->email }}"
                                        placeholder="your email">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Country</div>
                                    <input type="text" name="country_name"
                                        value="{{ $country!=null ? $country->name : ''}}" placeholder="">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">City</div>
                                    <input type="text" name="city_name" value="{{ $user->city??''}}" placeholder="">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Zip Code</div>
                                    <input type="text" name="shipping_zip" value="{{ $user->zip_code??''}}"
                                        placeholder="">
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Address</div>
                                    <textarea name="shipping_address" class="form-control" cols="30"
                                        rows="4">{{ $user->main_address??''}}</textarea>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                        {{-- {{ dd(Cart::content()) }} --}}
                                    </div>
                                    <ul class="qty">
                                        @foreach (Cart::content() as $cartItem)

                                        <li>{{ $cartItem->name }} × {{ $cartItem->qty }} <span>৳{{ $cartItem->subtotal
                                                }}</span></li>
                                        @endforeach
                                    </ul>
                                    <ul class="sub-total">
                                        <li>Subtotal <span class="count">৳{{ Cart::subtotal() }}</span></li>
                                        <li>Shipping
                                            <div class="shipping">
                                                <div class="shopping-option">
                                                    <input type="checkbox" name="free-shipping" id="free-shipping">
                                                    <label for="free-shipping">Free Shipping</label>
                                                </div>
                                                <div class="shopping-option">
                                                    <input type="checkbox" name="local-pickup" id="local-pickup">
                                                    <label for="local-pickup">Local Pickup</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="total">
                                        <li>Total <span class="count">৳{{ Cart::total() }}</span></li>
                                    </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-1"
                                                            checked="checked">
                                                        <label for="payment-1">Check Payments<span
                                                                class="small-text">Please send a check to Store
                                                                Name, Store Street, Store Town, Store State /
                                                                County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-2">
                                                        <label for="payment-2">Cash On Delivery<span
                                                                class="small-text">Please send a check to Store
                                                                Name, Store Street, Store Town, Store State /
                                                                County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option paypal">
                                                        <input type="radio" name="payment-group" id="payment-3">
                                                        <label for="payment-3">PayPal<span class="image"><img
                                                                    src="../assets/images/paypal.png"
                                                                    alt=""></span></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @php
                                    $deliveryCharge = 70;
                                    @endphp
                                    <input type="hidden" name="products[]" value="{{Cart::content()}}">
                                    <input type="hidden" id="delivery_charge" name="delivery_charge"
                                        value="{{ $deliveryCharge }}">
                                    <input type="hidden" id="total_amount" name="total_amount"
                                        value="@php echo  str_replace(',', '', Cart::subtotal()) + $deliveryCharge;@endphp">
                                    <input type="hidden" name="total_item" id="total_item" value="{{Cart::count();}}">
                                    <input type="hidden" name="total_qty" id="total_qty" value="{{Cart::count();}}">
                                    <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
                                    <div class="text-end">
                                        <button type="submit" class="btn-solid btn">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection