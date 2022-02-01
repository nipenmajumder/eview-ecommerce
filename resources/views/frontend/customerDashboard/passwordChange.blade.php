@extends('layouts.frontend')
@section('title', 'Password Change')
@section('content')
<style>
    label {
    margin-bottom: 0.5rem;
    margin-top: 10px;
}
.form-control {
    border-radius: 0;
    margin-bottom: 10px;
}
</style>
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
                        <li class="breadcrumb-item active" aria-current="page">Password Change</li>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>PASSWORD CHANGE</h3>
                                <form class="theme-form" method="post" action="{{ url('/password-change') }}">
                                    @csrf
                                    <div class="form-row row">
                                        <div class="col-md-12">
                                            <label for="name">Current Password</label>
                                            <input type="password" name="current_password" class="form-control" id="name" placeholder="Enter your Current Password" required="Enter your Current Password">
                                                @error('current_password')
                                                    <div style="color:red">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <label for="email">New Password</label>
                                            <input type="password" name="password" class="form-control" id="last-name" placeholder="Enter your New Password" required="Enter your Password">
                                                @error('password')
                                                    <div style="color:red">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <label for="review">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="review" placeholder="Enter your Confirm Password"
                                                required="">
                                                @error('password_confirmation')
                                                    <div style="color:red">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <br>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-sm btn-solid">Update</button>
                                        </div>
                                    </div>
                                </form>
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
