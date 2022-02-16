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
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Your name" value="{{ Auth::user()->name }}">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Email" value="{{ Auth::user()->email }}">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="col-md-6">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" name="phone" class="form-control" id="review"
                                                placeholder="Enter your number" value="{{ Auth::user()->phone }}">
                                            @error('phone')
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

                                    <div class="col-md-6">
                                        <label for="division">division*</label>
                                        <select name="division" id="division" class="form-control border-form-control">
                                            <option value="" disabled selected>Select Division</option>
                                            @foreach($divisions as $division)
                                            <option value="{{$division->id}}" @if(Auth::user()->division ==
                                                $division->id) selected @endif>{{$division->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('division')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>

                                    <div class="col-md-6">
                                        <label for="city">City*</label>
                                        @php
                                        $alldistrict=Devfaysal\BangladeshGeocode\Models\District::where('division_id',Auth::user()->division)->get();
                                        @endphp
                                        <select name="city" id="city" class="form-control border-form-control">
                                            @if($alldistrict->count() >0)
                                            @foreach ($alldistrict as $district)
                                            <option value="{{$district->id}}" @if(Auth::user()->city ==
                                                $district->id) selected @endif>{{$district->name}}</option>
                                            @endforeach
                                            @else
                                            <option value="" disabled selected>Select District</option>
                                            @endif
                                        </select>
                                        @error('city')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label for="main_address">Address</label>
                                        <textarea name="main_address" class="form-control" id="" cols="30" rows="10"
                                            placeholder="Address Details"
                                            required>{{  Auth::user()->main_address }}</textarea>
                                        @error('main_address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label for="google_map">Google Map</label>
                                        <textarea name="google_map" class="form-control" id="" cols="30" rows="10"
                                            placeholder="Google Map">{{ Auth::user()->google_map  }}</textarea>
                                        @error('google_map')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label for="Zip_Code">Zip Code*</label>
                                        <input type="text" class="form-control" name="zip_code" id="Zip_Code"
                                            placeholder="Zip Code" required="" value="{{ Auth::user()->zip_code }}">
                                        @error('zip_code')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
@section('js')
<script type="text/javascript">
    $(document).ready(function() {        
        $('select[name="division"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{  url('/get/district/all/') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#city').empty();
                        $('#city').append(' <option value="">--select--</option>');
                        $.each(data, function(index, districtObj) {
                            $('#city').append('<option value="' + districtObj.id + '">' + districtObj.name + '</option>');
                        });

                    }
                });
            } else {
                //  alert('danger');
            }
        });
    });
</script>
@endsection