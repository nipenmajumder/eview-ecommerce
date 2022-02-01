@extends('layouts.frontend')
@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Email Verify</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('login') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('login') }}">login</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Email Verify</li>
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
                    <h2>CHeck Your Email.Input Your Verification COde</h2>
                    <form class="theme-form" action="{{ route('email.verify') }}" method="POST">
                        @csrf
                        <div class="form-row row">
                            <div class="col-md-12">
                                <input type="text" name="code" class="form-control" id="email" placeholder="Enter Your Code" required="">
                                <input type="hidden" name="id" value="{{ $id }}">
                            </div>
                            <button type="submit" class="btn btn-solid w-auto">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->


@endsection
