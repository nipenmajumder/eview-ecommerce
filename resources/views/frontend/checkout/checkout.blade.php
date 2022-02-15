{{-- {{ dd(Cart::content()) }} --}}
@extends('layouts.frontend')
@section('title', 'Checkout')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Check-out</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Check-out</li>
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
        <div class="checkout-page">
            <div class="checkout-form">
                <form method="post" action="{{ route('checkout.save') }}">@csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Delivery Address</h3>
                            </div>
                            <div class="row check-out">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Name</div>
                                    <input type="text" name="shipping_name" placeholder="your name "
                                        value="{{ $user->name }}">
                                    @error('shipping_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Phone</div>
                                    <input type="text" name="shipping_phone" value="{{ $user->phone}}">
                                    @error('shipping_phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Email Address</div>
                                    <input type="text" name="shipping_email" value="{{ $user->email }}"
                                        placeholder="your email">
                                    @error('shipping_email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="division">division*</label>
                                    <select name="shipping_division" id="division"
                                        class="form-control border-form-control">
                                        <option value="" disabled selected>Select Division</option>
                                        @foreach($divisions as $division)
                                        <option value="{{$division->id}}" @if(Auth::user()->division ==
                                            $division->id) selected @endif>{{$division->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('shipping_division')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="city">City*</label>
                                    @php
                                    $alldistrict=Devfaysal\BangladeshGeocode\Models\District::where('division_id',Auth::user()->division)->get();
                                    @endphp
                                    <select name="shipping_city" id="city" class="form-control border-form-control">
                                        @if($alldistrict->count() >0)
                                        @foreach ($alldistrict as $district)
                                        <option value="{{$district->id}}" @if(Auth::user()->city ==
                                            $district->id) selected @endif>{{$district->name}}</option>
                                        @endforeach
                                        @else
                                        <option value="" disabled selected>Select District</option>
                                        @endif
                                    </select>
                                    @error('shipping_city')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Zip Code</div>
                                    <input type="text" name="shipping_zip" value="{{ $user->zip_code??''}}"
                                        placeholder="">
                                    @error('shipping_zip')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Address</div>
                                    <textarea name="shipping_address" class="form-control" cols="30"
                                        rows="4">{{ $user->main_address??''}}</textarea>
                                    @error('shipping_address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    {{-- <div class="field-label">Address</div> --}}
                                    <input type="radio" name="payment_status" id="payment_status_1">
                                    <label for="payment_status_1">Cash On Delivery</label><br>
                                    <span class="text-info text-sm-end">Please fill a
                                        check to continue shopping</span></label>
                                    @error('payment_status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details" id="checout_cart">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {        
        $('select[name="shipping_division"]').on('change', function() {
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
<script>
    $(document).ready(function() {        
        $('select[name="shipping_city"]').on('change', function() {
            var city_id = $(this).val();
            alert(city_id);
            $('#shopping_amount').text(city_id);
            // if (division_id) {
            //     $.ajax({
            //         url: "{{  url('/get/district/all/') }}/" + division_id,
            //         type: "GET",
            //         dataType: "json",
            //         success: function(data) {
            //             $('#city').empty();
            //             $('#city').append(' <option value="">--select--</option>');
            //             $.each(data, function(index, districtObj) {
            //                 $('#city').append('<option value="' + districtObj.id + '">' + districtObj.name + '</option>');
            //             });

            //         }
            //     });
            // } else {
            //     //  alert('danger');
            // }
        });
    });
</script>
@endsection