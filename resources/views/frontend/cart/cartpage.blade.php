@extends('layouts.frontend')
@section('title', 'Cart')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>cart</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="cart-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 table-responsive-xs" id="maincart_page">

            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-6"><a href="{{ url('/shop') }}" class="btn btn-solid">continue shopping</a></div>
            <div class="col-6"><a href="{{ url('/products/checkout') }}" class="btn btn-solid">check out</a></div>
        </div>
    </div>
</section>
<!--section end-->
@endsection