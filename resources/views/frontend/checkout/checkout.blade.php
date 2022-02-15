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
                                    @error('shipping_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Phone</div>
                                    <input type="text" name="shipping_phone" value="{{ $user->phone}}">
                                    @error('shipping_phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Email Address</div>
                                    <input type="text" name="shipping_email" value="{{ $user->email }}"
                                        placeholder="your email">
                                    @error('shipping_email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Country</div>
                                    <input type="text" name="country_name"
                                        value="{{ $country!=null ? $country->name : ''}}" placeholder="">
                                    @error('country_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">City</div>
                                    <input type="text" name="city_name" value="{{ $user->city??''}}" placeholder="">
                                    @error('city_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Zip Code</div>
                                    <input type="text" name="shipping_zip" value="{{ $user->zip_code??''}}"
                                        placeholder="">
                                    @error('shipping_zip')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Address</div>
                                    <textarea name="shipping_address" class="form-control" cols="30"
                                        rows="4">{{ $user->main_address??''}}</textarea>
                                    @error('shipping_address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    {{-- <div class="field-label">Address</div> --}}
                                    <input type="radio" name="payment_status" id="payment_status_1">
                                    <label for="payment_status_1">Cash On Delivery</label><br>
                                    <span class="text-info text-sm-end">Please fill a
                                        check to continue shopping</span></label>
                                    @error('payment_status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details" id="checout_cart">

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