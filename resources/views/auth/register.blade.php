@extends('layouts.frontend')
@section('title', 'Register')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>create account</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>create account</h3>
                    <div class="theme-card">
                        <form class="theme-form" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="fname">Name</label>
                                    <input type="text" class="form-control" name="name" id="fname" placeholder="Enter Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                     <br>
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}">
                                    @error('email')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                     <br>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    @error('password')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                     <br>
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="review"
                                        placeholder="Enter your password">
                                    @error('password_confirmation')
                                        <div style="color:red">{{ $message }}</div>
                                     @enderror
                                     <br>
                                </div><button type="submit" class="btn btn-solid w-auto">create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
