@extends('layouts.frontend')
@section('title', 'Vendor-Create')
@section('content')
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
                    <div class="faq-content tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="products">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body table-responsive-md">
                                            <div class="top-sec">
                                                <h3>All Shop</h3>
                                                <a href="#" class="btn btn-sm btn-solid" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Add Shop</a>
                                            </div>
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Shop name</th>
                                                        <th scope="col">Shop Category</th>
                                                        <th scope="col">Address</th>
                                                        <th scope="col">Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($allShop as  $key => $shop)
                                                    <tr>
                                                        <th scope="row">{{ ++$key }}</th>
                                                        <td>{{ $shop->shop_name }}</td>
                                                        <td>{{ $shop->ShopCategory->name }}</td>
                                                        <td>{{ $shop->address }}</td>
                                                        <td>
                                                            <i class="fa fa-pencil-square-o me-1 editshop" data-id="{{ $shop->id }}" aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#kt_modal_new_address_update" ></i>
                                                            <a id="delete" href="{{ url('vendor/shop/delete/'.$shop->id) }}"><i class="fa fa-trash-o ms-1" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
        </div>
    </section>
    <!--  dashboard section end -->
    <div class="modal fade" id="kt_modal_new_address" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="{{ url('vendor/shop') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header" id="kt_modal_new_address_header">
                        <h4>Add New Shop</h4>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                        <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                        <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">Shop Name: <span style="color:red">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Shop Name" required>
                            </div>
                            <div class="col-md-12">
                                <label for="name">Shop Category: <span style="color:red">*</span></label>
                                <select name="shop_category" class="form-control">
                                    @foreach($allShopcategory as $shop)
                                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12" style="margin-top:10px">
                                <label for="name">Shop Address: <span style="color:red">*</span></label>
                                <input type="text" name="shop_address" id="" class="form-control" placeholder="Enter Shop Address" required>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="submit" class="btn btn-white me-3">Submit</button>
                    </div>
                </form>
           
            </div>
        </div>
    </div>
    <!-- edit shop -->
    <div class="modal fade" id="kt_modal_new_address_update" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="{{ url('vendor/shop/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header" id="kt_modal_new_address_header">
                        <h4>Update Shop</h4>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                        <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                        <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">Shop Name: <span style="color:red">*</span></label>
                                <input type="text" name="name" id="shop_name" class="form-control" placeholder="Enter Shop Name" required>
                                <input type="hidden" name="id" id="id">
                            </div>
                            <div class="col-md-12">
                                <label for="name">Shop Category: <span style="color:red">*</span></label>
                                <select name="shop_category" id="shop_category" class="form-control">
                                    @foreach($allShopcategory as $shop)
                                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12" style="margin-top:10px">
                                <label for="name">Shop Address: <span style="color:red">*</span></label>
                                <input type="text" name="shop_address" id="shop_address" class="form-control" placeholder="Enter Shop Address" required>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="submit" class="btn btn-white me-3">Update</button>
                    </div>
                </form>
           
            </div>
        </div>
    </div>
<script>
    // teacher edit start
$('.editshop').on('click', function(){
    var id = $(this).data('id');
    
    $("#shop_name").val("");
    $("#shop_address").val("");
    $("#id").val("");
if(id) {
    $.ajax({
        url: "{{ url('vendor/shop/edit/') }}"+'/'+id,
        type:"GET",
        dataType:"json",
        success:function(data) {
            console.log(data);
            $("#shop_name").val(data.shop_name);
            $("#id").val(data.id);
            $("#shop_address").val(data.address);
            $('#shop_category option[value="'+data.shopcategory_id+'"]').prop('selected', true);

        }
    });
} else {
    // alert('danger');
}

});
</script>
@endsection