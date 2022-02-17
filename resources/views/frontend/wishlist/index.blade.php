@extends('layouts.frontend')
@section('title', 'Wishlist')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Wishlist</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
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
            <div class="col-sm-12 table-responsive-xs">
                <table class="table cart-table cart_summary">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">Product</th>
                            <th scope="col">Description</th>
                            <th scope="col">Unit price</th>
                            <th scope="col">cart</th>

                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::instance('wishlist')->content() as $row)
                        <tr>
                            @foreach($row->options as $key => $image)
                            @if($key==0)
                            <td><a><img src="{{asset('uploads/products/'.$image)}}" alt=""></a>
                            </td>
                            @endif
                            @endforeach
                            <td><a href="#">{{$row->name}}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <h2 class="td-color">
                                            <p class="text-primary">In stock</p>
                                        </h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <h2 class="td-color">৳{{ $row->price }}</h2>
                            </td>
                            <td>
                                <form id="cartsection">
                                    <input type="hidden" name="id" value="{{$row->id}}">
                                    <input type="hidden" name="name" value="{{$row->name}}">
                                    <input type="hidden" name="product_sku" value="{{$row->options[1]}}">
                                    <input type="hidden" name="image" value="{{$row->options[0]}}">
                                    <input type="hidden" name="discount_price" value="">
                                    <input type="hidden" name="discount_title" value="">
                                    <input type="hidden" name="price" value="{{$row->price}}">
                                    <input type="hidden" name="shop_id" value="{{$row->options[2]}}">
                                    <input type="hidden" name="product_quantity" value="1">
                                    <a class="btn btn-solid hover-solid btn-animation cart">
                                        <i class="fa fa-shopping-cart me-1" aria-hidden="true"></i> add to cart</a>
                                </form>
                            </td>
                            <td><a onclick="deletewishlistdata(this)" id="{{$row->rowId}}" class="icon"><i
                                        class="ti-close"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="table-responsive-md">
                    <table class="table cart-table ">
                        <tfoot>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <h2>৳{{Cart::instance('wishlist')->subtotal()}}</h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-12"><a href="{{ url('/shop') }}" class="btn btn-solid">continue shopping</a></div>

        </div>
    </div>
</section>
<!--section end-->
@endsection