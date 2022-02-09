@extends('layouts.frontend')
@section('title', 'Dashboard')
@section('content')


<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Dashboard</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Orders</li>
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
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.customerDashboard.include.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="page-title">
                            <h2>My Orders</h2>
                        </div>
                        <div class="welcome-msg">
                            <p>Hello, {{ Auth::user()->name }} !</p>
                            <p>Here you can view your all orders list</p>
                        </div>
                        <div class="box-account box-info">
                            <div class="box-head">
                                <h2>Product Orders List</h2>
                            </div>
                            <div class="row">

                                <div class="col-sm-12 table-responsive-xs">
                                    <table class="table table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Date Purchased</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $key => $order)
                                            <tr>
                                                <td scope="row">{{ $key+1 }}</td>
                                                <td>{{ $order->order_id }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->total_amount + 70 }}</td>
                                                <td>
                                                    {{-- <span class="badge badge-danger">Canceled</span> --}}
                                                    @if($order->delevery_status==0)
                                                    <span class="badge badge-light-success">Pending</span>
                                                    @elseif($order->delevery_status==1)
                                                    <span class="badge badge-light-success">Processing</span>
                                                    @elseif($order->delevery_status==2)
                                                    <span class="badge badge-light-success">Rejected</span>
                                                    @elseif($order->delevery_status==3)
                                                    <span class="badge badge-success">Delivered</span>
                                                    @endif
                                                </td>
                                                <td><a title="view products"
                                                        href="{{url('/dashboard/order/view/'.$order->id)}}"
                                                        class="btn btn-primary btn-sm"><i class="ti-eye"></i></a></td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <p class="text-center text-warning">no order!</p>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection