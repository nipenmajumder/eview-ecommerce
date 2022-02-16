@extends('layouts.frontend')
@section('title', 'Vendor-Create')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets') }}/css/asif.css">


<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="{{asset('backend')}}/assets/css/image-uploader.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>
    .fw-bold {
    font-weight: 400!important;
    font-size: 14px !important;
}

.bootstrap-tagsinput {
        background-color: #f5f8fa;
        border-color: #f5f8fa;
        box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
        display: inline-block;
        padding: 4px 6px;
        color: #b9b9b9;
        vertical-align: middle;
        border-radius: 4px;
        max-width: 100%;
        line-height: 25px;
        cursor: text;
        width: 100%;
        background: aliceblue;
    }
    
</style>
<style>
   div.dataTables_wrapper div.dataTables_length select {

        height: 33px;
    }

    div.dataTables_wrapper div.dataTables_filter input {

        height: 25px;
    }
</style>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>vendor dashboard</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">vendor dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--  dashboard section start -->
    <section class="dashboard-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.vendor.dashboard.include.sidebar')
                </div>
                <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>COMPANY DETAIL</h3>
                                <form class="theme-form" action="{{ url('/profile') }}" method="post">
                                    @csrf
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Your name" value="{{ $vendorcompany->name }}">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name">Phone</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Your name" value="{{ $vendorcompany->phone }}">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name">Company Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Your name" value="{{ $vendorcompany->company_name }}">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Email" value="{{ $vendorcompany->email }}">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
                                    <br>
                                    <div class="col-md-6">
                                        <label for="main_address">Company Address</label>
                                        <textarea name="company_address" class="form-control" id="" cols="30" rows="10"
                                            placeholder="Address Details"
                                            required>{{  $vendorcompany->company_address }}</textarea>
                                        @error('company_address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label for="google_map">Company Google Map</label>
                                        <textarea name="google_map" class="form-control" id="" cols="30" rows="10"
                                            placeholder="Google Map">{{ $vendorcompany->company_google_map  }}</textarea>
                                        @error('google_map')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label for="Zip_Code">Zip Code*</label>
                                        <input type="text" class="form-control" name="zip_code" id="Zip_Code"
                                            placeholder="Zip Code" required="" value="{{ $vendorcompany->zip_code }}">
                                        @error('zip_code')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-12 mt-5">
                                        <button class="btn btn-sm btn-solid" type="submit">Update</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <br>
                                <h3>Bank Information</h3>
                                <div class="form-row row">
                                    <br>
                                    <div class="col-md-6">
                                        <label for="main_address">Bank Name</label>
                                        <textarea name="bank_name" class="form-control" id="" cols="30" rows="10"
                                            placeholder="Address Details"
                                            required>{{  $vendorcompany->bank_name }}</textarea>
                                        @error('company_address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label for="google_map">Company Google Map</label>
                                        <textarea name="google_map" class="form-control" id="" cols="30" rows="10"
                                            placeholder="Google Map">{{ $vendorcompany->company_google_map  }}</textarea>
                                        @error('google_map')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label for="Zip_Code">Zip Code*</label>
                                        <input type="text" class="form-control" name="zip_code" id="Zip_Code"
                                            placeholder="Zip Code" required="" value="{{ $vendorcompany->zip_code }}">
                                        @error('zip_code')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-12 mt-5">
                                        <button class="btn btn-sm btn-solid" type="submit">Update</button>
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
<!-- create product -->
<script type="text/javascript" src="{{asset('backend')}}/assets/js/image-uploader.min.js"></script>

<script>
$('.input-images').imageUploader();
</script>

@endsection
