@extends('layouts.frontend')
@section('title', 'Profile')
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
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                                <h3>PERSONAL DETAIL</h3>
                                <form class="theme-form" action="{{ url('/profile') }}" method="post">
                                    @csrf
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name" value="{{ Auth::user()->name }}">
                                        </div>
                                        <br>
                                        <div class="col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ Auth::user()->email }}">
                                        </div>
                                        <br>
                                        <div class="col-md-6">
                                            <label for="review">Phone Number</label>
                                            <input type="text" name="phone" class="form-control" id="review" placeholder="Enter your number" value="{{ Auth::user()->phone }}">
                                        </div>
                                        <br>
                                       
                                    </div>
                                
                            </div>
                        </div>
                        <!-- Section ends -->
                        <!-- address section start -->
                        <div class="row">
                            <div class="col-sm-12">
                                <br>
                                <h3>ADDRESS</h3>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <label for="name">Address</label>
                                           <textarea name="main_address" class="form-control" id="" cols="30" rows="10" placeholder="Address Details" required>{{  Auth::user()->main_address }}</textarea>
                                        </div>
                                         <br>
                                         <div class="col-md-6">
                                            <label for="name">Google Map</label>
                                           <textarea name="google_map" class="form-control" id="" cols="30" rows="10" placeholder="Google Map">{{ Auth::user()->google_map  }}</textarea>
                                        </div>
                                         <br>
                                         <div class="col-md-6">
                                            <label for="Country">Country *</label>
                                            <select id="country" name="country" class="form-control">
                                                <option disabled>--Select--</option>
                                                @foreach($allcountry as $country)
                                                <option value="{{$country->id}}" @if(Auth::user()->country==$country->id) selected @endif>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            <!-- <input type="text" name="country" class="form-control" id="Country" placeholder="Enter Country" required=""  value="{{ Auth::user()->country  }}"> -->
                                        </div>
                                        <br>
                                        <div class="col-md-6">
                                            <label for="City">City*</label>
                                            <input type="text" class="form-control" name="city" id="City" placeholder="Enter City" required="" value="{{ Auth::user()->city }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Zip_Code">Zip Code*</label>
                                            <input type="text" class="form-control" name="zip_code" id="Zip_Code" placeholder="Zip Code" required="" value="{{ Auth::user()->zip_code }}">
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <button class="btn btn-sm btn-solid" type="submit">Save setting</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Section ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection
