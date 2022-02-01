@extends('layouts.frontend')
@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Forget Password</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('login') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('login') }}">login</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Forget Password Email Verify</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="pwd-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <h4>Check Your Email.Input Your Verification Code and Reset Password</h4>
                    <form class="theme-form" action="{{ url('forget-password/verify/store') }}" method="POST">
                        @csrf
                        <div class="form-row row">
                            <div class="col-lg-12">
                                <div class="theme-card">
                                    <form class="theme-form" action="" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="code" class="form-control" id="code" placeholder="Verification Code" value="{{ old('code')}}">
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            @error('code')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="password" name="password" class="form-control" id="email" placeholder="Password">
                                            @error('password')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="review" name="password_confirmation" placeholder="Confirm Password">
                                            @error('password_confirmation')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                              
                                        <button type="submit" class="btn btn-solid">submit</button>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
