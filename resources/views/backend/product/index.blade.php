@extends('layouts.backend')
@section('title', 'Product Edit')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets') }}/css/asif.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="{{asset('backend')}}/assets/css/image-uploader.min.css">

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
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Product Edit</h1>
                <!--end::Title-->
            </div>

        </div>
        <!--end::Container-->
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Layout Builder Notice-->
            <div class="card mb-10">
                <div class="card-body d-flex align-items-center p-5 p-lg-8">
                    <!--begin::Icon-->
                    <div class="d-flex h-50px w-50px h-lg-80px w-lg-80px flex-shrink-0 flex-center position-relative align-self-start align-self-lg-center mt-3 mt-lg-0">
                        <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-polygon.svg-->
                        <span class="svg-icon svg-icon-primary position-absolute opacity-15">
                            <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" viewBox="0 0 70 70" fill="none" class="h-50px w-50px h-lg-80px w-lg-80px">
                                <path d="M28 4.04145C32.3316 1.54059 37.6684 1.54059 42 4.04145L58.3109 13.4585C62.6425 15.9594 65.3109 20.5812 65.3109 25.5829V44.4171C65.3109 49.4188 62.6425 54.0406 58.3109 56.5415L42 65.9585C37.6684 68.4594 32.3316 68.4594 28 65.9585L11.6891 56.5415C7.3575 54.0406 4.68911 49.4188 4.68911 44.4171V25.5829C4.68911 20.5812 7.3575 15.9594 11.6891 13.4585L28 4.04145Z" fill="#000000"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--begin::Svg Icon | path: icons/duotone/Tools/Tools.svg-->
                        <span class="svg-icon svg-icon-2x svg-icon-lg-3x svg-icon-primary position-absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z" fill="#000000"></path>
                                    <path d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Icon-->
                    <!--begin::Description-->
                    <div class="ms-6">
                        <p class="list-unstyled text-gray-600 fw-bold fs-6 p-0 m-0">Product Edit</p>
                    </div>
                    <!--end::Description-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form class="form" method="POST" id="kt_layout_builder_form" action="{{ route('admin.product.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" data-select2-id="select2-data-90-elj6">
                                <div class="tab-content pt-3" data-select2-id="select2-data-89-mk7z">
                                    <div class="tab-pane active" id="kt_builder_main" data-select2-id="select2-data-kt_builder_main">
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Product Title:</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" name="product_name" placeholder="Enter Product Title" value="{{ $edit->product_name }}" required/>
                                                    <input type="hidden" class="shop_id_update_val" name="shop_id_update_val" value="{{ $edit->shop_id }}"/>
                                                    <input type="hidden" name="id" value="{{ $edit->id }}"/>
                                                </div>
                                                @error('product_name')
                                                        <div class="validation">{{ $message }}</div>
                                               @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Product Sku:</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" name="product_sku" placeholder="Enter Product Sku" value="{{ $edit->product_sku }}" required/>
                                                  
                                                </div>
                                                @error('product_sku')
                                                        <div class="validation">{{ $message }}</div>
                                               @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Product Qty:</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" name="product_qty"  placeholder="Enter Product Stock Qty" value="{{ $edit->product_qty }}" required/>
                                                </div>
                                                @error('product_qty')
                                                        <div class="validation">{{ $message }}</div>
                                               @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Shop:</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <select name="product_shop" class="form-control form-control-solid product_shop" style="padding-top:1px;padding-bottom:1px">
                                                    <option disabled>--select--</option>
                                                   @foreach($allshop as $shop)
                                                   <option value="{{ $shop->id }}" @if($edit->shop_id== $shop->id) selected  @endif>{{  $shop->shop_name  }}</option>
                                                   @endforeach
                                               </select>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Product Category:</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <select name="category" id="category" class="form-control form-control-solid" style="padding-top:1px;padding-bottom:1px">
                                                    <option disabled>--select--</option>
                                                        @foreach($allCategory as $category)
                                                        <option value="{{ $category->id }}" @if($edit->category_id==$category->id) selected @endif>{{  $category->name  }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">SubCategory:</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <select name="subcategory" id="subcategory" class="form-control form-control-solid" style="padding-top:1px;padding-bottom:1px">
                                                    @php
                                                        $subcategory=App\Models\SubCategory::get(); 
                                                    @endphp
                                                   <option disabled>--select--</option>
                                                   @foreach($subcategory as $sub)
                                                   <option value="{{  $sub->id }}" @if($sub->id == $edit->subcategory_id) selected  @endif>{{ $sub->name }}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">ReSubCategory:</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <select name="resubcategory" id="resubcategory" class="form-control form-control-solid" style="padding-top:1px;padding-bottom:1px">
                                                    <option selected disabled>--select--</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Brand (Optional):</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" name="product_brand" placeholder="Enter Brand" value="{{ $edit->product_brand }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Price:</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" name="price" placeholder="Enter Price" required value="{{ $edit->product_price }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Details:</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <textarea id="summernote" class="form-control form-control-solid" name="product_details">{!! $edit->product_details !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end Product_Size_Optional">Product Size(Optional):</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input data-role="tagsinput" class="form-control form-control-solid tags" type="text" name="product_size" placeholder="Enter Product Size" value="{{ $edit->product_size }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end Weight_optional" id="Weight_optional">Weight(Optional):</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input  class="form-control form-control-solid" type="text" name="product_weight" placeholder="Enter Weight" value="{{ $edit->product_weight }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end Style_Optional">Style(Optional):</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" n name="product_style" placeholder="Enter Style" value="{{ $edit->product_style }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end Style_Optional">Materials(Optional):</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" ame="product_materials" placeholder="Enter Materials" value="{{ $edit->product_materials }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end Style_Optional">Product Condition:</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <select name="product_condition" class="form-control form-control-solid" style="padding-top:1px;padding-bottom:1px">
                                                    <option value="New" @if($edit->product_condition=='New') selected @endif>New</option>
                                                    <option value="Used"  @if($edit->product_condition=='Used') selected @endif>Used</option>
                                                    <option value="Used"  @if($edit->product_condition=='Used') selected @endif>Used(Good)</option>
                                                    <option value="Used Like New" @if($edit->product_condition=='Used Like New') selected @endif>Used(Like New)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end Style_Optional">Product Tags:</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input type="text" data-role="tagsinput" class="form-control form-control-solid" name="tag" placeholder="Enter Tags" value="{{ $edit->product_tags }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end Style_Optional">Have A Discount:</label>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-check-input have_a_discount" name="have_a_discount" type="checkbox" value="1" @if($edit->have_a_discount !=NULL) checked @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10 discount_price" @if($edit->have_a_discount==1) @else style="display:none" @endif>
                                            <label class="col-lg-3 col-form-label text-lg-end Style_Optional">Offer:</label>
                                            
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <div class="mb-0">
                                                        <label class="d-flex flex-stack mb-0 cursor-pointer">
                                                            <!--begin:Label-->
                                                            <span class="d-flex align-items-center me-2">
                                                                <!--begin::Icon-->
                                                                <span class="symbol symbol-50px me-6">
                                                                    <span class="symbol-label">
                                                                        <!--begin::Svg Icon | path: icons/duotone/Interface/Line-03-Down.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.25" d="M1 5C1 3.89543 1.89543 3 3 3H21C22.1046 3 23 3.89543 23 5V19C23 20.1046 22.1046 21 21 21H3C1.89543 21 1 20.1046 1 19V5Z" fill="#12131A"></path>
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8682 17.5035C21.1422 17.9831 20.9756 18.5939 20.4961 18.8679C20.0166 19.1419 19.4058 18.9753 19.1317 18.4958L15.8834 12.8113C15.6612 12.4223 15.2073 12.2286 14.7727 12.3373L9.71238 13.6024C8.40847 13.9283 7.04688 13.3473 6.38005 12.1803L3.13174 6.49582C2.85773 6.0163 3.02433 5.40545 3.50385 5.13144C3.98337 4.85743 4.59422 5.02403 4.86823 5.50354L8.11653 11.1881C8.33881 11.5771 8.79268 11.7707 9.22731 11.6621L14.2876 10.397C15.5915 10.071 16.9531 10.6521 17.6199 11.819L20.8682 17.5035Z" fill="#12131A"></path>
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </span>
                                                                <!--end::Icon-->
                                                                <!--begin::Description-->
                                                                <span class="d-flex flex-column">
                                                                    <span class="fw-bolder text-gray-800 text-hover-primary fs-5">None</span>
                                                                </span>
                                                                <!--end:Description-->
                                                            </span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <span class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input Special" type="radio" name="offer" @if($edit->offer == 'none' ) checked @endif value="none"  >
                                                            <div class="fv-plugins-message-container invalid-feedback"></div></span>
                                                            <!--end:Input-->
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin:Option-->
                                                        <label class="d-flex flex-stack mb-0 cursor-pointer">
                                                            <!--begin:Label-->
                                                            <span class="d-flex align-items-center me-2">
                                                                <!--begin::Icon-->
                                                                <span class="symbol symbol-50px me-6">
                                                                    <span class="symbol-label">
                                                                        <!--begin::Svg Icon | path: icons/duotone/Interface/Line-03-Down.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.25" d="M1 5C1 3.89543 1.89543 3 3 3H21C22.1046 3 23 3.89543 23 5V19C23 20.1046 22.1046 21 21 21H3C1.89543 21 1 20.1046 1 19V5Z" fill="#12131A"></path>
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8682 17.5035C21.1422 17.9831 20.9756 18.5939 20.4961 18.8679C20.0166 19.1419 19.4058 18.9753 19.1317 18.4958L15.8834 12.8113C15.6612 12.4223 15.2073 12.2286 14.7727 12.3373L9.71238 13.6024C8.40847 13.9283 7.04688 13.3473 6.38005 12.1803L3.13174 6.49582C2.85773 6.0163 3.02433 5.40545 3.50385 5.13144C3.98337 4.85743 4.59422 5.02403 4.86823 5.50354L8.11653 11.1881C8.33881 11.5771 8.79268 11.7707 9.22731 11.6621L14.2876 10.397C15.5915 10.071 16.9531 10.6521 17.6199 11.819L20.8682 17.5035Z" fill="#12131A"></path>
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </span>
                                                                <!--end::Icon-->
                                                                <!--begin::Description-->
                                                                <span class="d-flex flex-column">
                                                                    <span class="fw-bolder text-gray-800 text-hover-primary fs-5">11 Offer</span>
                                                                </span>
                                                                <!--end:Description-->
                                                            </span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <span class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input Special" type="radio" name="offer" value="11_offer" @if($edit->offer == '11_offer' ) checked @endif >
                                                            <div class="fv-plugins-message-container invalid-feedback"></div></span>
                                                            <!--end:Input-->
                                                        </label>
                                                        <!--end::Option-->
                                                        <label class="d-flex flex-stack mb-0 cursor-pointer">
                                                            <!--begin:Label-->
                                                            <span class="d-flex align-items-center me-2">
                                                                <!--begin::Icon-->
                                                                <span class="symbol symbol-50px me-6">
                                                                    <span class="symbol-label">
                                                                        <!--begin::Svg Icon | path: icons/duotone/Interface/Line-03-Down.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.25" d="M1 5C1 3.89543 1.89543 3 3 3H21C22.1046 3 23 3.89543 23 5V19C23 20.1046 22.1046 21 21 21H3C1.89543 21 1 20.1046 1 19V5Z" fill="#12131A"></path>
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8682 17.5035C21.1422 17.9831 20.9756 18.5939 20.4961 18.8679C20.0166 19.1419 19.4058 18.9753 19.1317 18.4958L15.8834 12.8113C15.6612 12.4223 15.2073 12.2286 14.7727 12.3373L9.71238 13.6024C8.40847 13.9283 7.04688 13.3473 6.38005 12.1803L3.13174 6.49582C2.85773 6.0163 3.02433 5.40545 3.50385 5.13144C3.98337 4.85743 4.59422 5.02403 4.86823 5.50354L8.11653 11.1881C8.33881 11.5771 8.79268 11.7707 9.22731 11.6621L14.2876 10.397C15.5915 10.071 16.9531 10.6521 17.6199 11.819L20.8682 17.5035Z" fill="#12131A"></path>
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </span>
                                                                <!--end::Icon-->
                                                                <!--begin::Description-->
                                                                <span class="d-flex flex-column">
                                                                    <span class="fw-bolder text-gray-800 text-hover-primary fs-5">22 Offer</span>
                                                                </span>
                                                                <!--end:Description-->
                                                            </span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <span class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input Special" type="radio" name="offer" value="22_offer" @if($edit->offer == '22_offer' ) checked @endif>
                                                            <div class="fv-plugins-message-container invalid-feedback"></div></span>
                                                            <!--end:Input-->
                                                        </label>
                                                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                            <!--begin:Label-->
                                                            <span class="d-flex align-items-center me-2">
                                                                <!--begin::Icon-->
                                                                <span class="symbol symbol-50px me-6">
                                                                    <span class="symbol-label">
                                                                        <!--begin::Svg Icon | path: icons/duotone/Interface/Doughnut.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M11 4.25769C11 3.07501 9.9663 2.13515 8.84397 2.50814C4.86766 3.82961 2 7.57987 2 11.9999C2 13.6101 2.38057 15.1314 3.05667 16.4788C3.58731 17.5363 4.98303 17.6028 5.81966 16.7662L5.91302 16.6728C6.60358 15.9823 6.65613 14.9011 6.3341 13.9791C6.11766 13.3594 6 12.6934 6 11.9999C6 9.62064 7.38488 7.56483 9.39252 6.59458C10.2721 6.16952 11 5.36732 11 4.39046V4.25769ZM16.4787 20.9434C17.5362 20.4127 17.6027 19.017 16.7661 18.1804L16.6727 18.087C15.9822 17.3964 14.901 17.3439 13.979 17.6659C13.3594 17.8823 12.6934 17.9999 12 17.9999C11.3066 17.9999 10.6406 17.8823 10.021 17.6659C9.09899 17.3439 8.01784 17.3964 7.3273 18.087L7.23392 18.1804C6.39728 19.017 6.4638 20.4127 7.52133 20.9434C8.86866 21.6194 10.3899 21.9999 12 21.9999C13.6101 21.9999 15.1313 21.6194 16.4787 20.9434Z" fill="#12131A"></path>
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13 4.39046C13 5.36732 13.7279 6.16952 14.6075 6.59458C16.6151 7.56483 18 9.62064 18 11.9999C18 12.6934 17.8823 13.3594 17.6659 13.9791C17.3439 14.9011 17.3964 15.9823 18.087 16.6728L18.1803 16.7662C19.017 17.6028 20.4127 17.5363 20.9433 16.4788C21.6194 15.1314 22 13.6101 22 11.9999C22 7.57987 19.1323 3.82961 15.156 2.50814C14.0337 2.13515 13 3.07501 13 4.25769V4.39046Z" fill="#12131A"></path>
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </span>
                                                                <!--end::Icon-->
                                                                <!--begin::Description-->
                                                                <span class="d-flex flex-column">
                                                                    <span class="fw-bolder text-gray-800 text-hover-primary fs-5">Special Offer</span>
                                                                    
                                                                </span>
                                                                <!--end:Description-->
                                                            </span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <span class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input Special" type="radio" name="offer" value="special_offer" @if($edit->offer == 'special_offer' ) checked @endif>
                                                            </span>
                                                            <!--end:Input-->
                                                        </label>
                                                         <div class="row special_sec"   id="special_sec" @if($edit->offer == "special_offer") @else style="display:none;" @endif>
                                                            <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-solid" name="discount_price" placeholder="Enter Discount Price" value="{{$edit->discount_price}}" />
                                                            </div>
                                                            <div class="col-md-4">
                                                                <select name="discount_price_type" class="form-control form-control-solid" style="padding-top:1px;padding-bottom:1px">
                                                                    <option value="percent" >%</option>
                                                                    <option value="taka">TK</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mt-5 text-center">
                                                                <span class="d-flex flex-column">
                                                                    <span class="fw-bolder text-gray-800 text-hover-primary fs-5">Date</span>
                                                                </span>
                                                                <span class="form-check form-check-custom form-check-solid">
                                                                    <input class="form-check-input special_section" type="radio" data-id="1" name="discount_condition" value="date" style="margin: 10px 90px;">
                                                                </span>
                                                            </div>
                                                            <div class="col-md-6 mt-5 text-center">
                                                                <span class="d-flex flex-column">
                                                                    <span class="fw-bolder text-gray-800 text-hover-primary fs-5">Stock</span>
                                                                </span>
                                                                <span class="form-check form-check-custom form-check-solid">
                                                                    <input class="form-check-input s_section" type="radio" data-id="2" name="discount_condition" value="Stock" style="margin: 10px 90px;">
                                                                </span>
                                                            </div>
                                                            <div class="col-md-12 row main_date_section" id="main_date_section" style="display:none">
                                                                <div class="col-md-6 mt-5">
                                                                    <input type="date" name="from_date" class="form-control  form-control-solid" placeholder="Enter From Date">
                                                                </div>
                                                                <div class="col-md-6 mt-5">
                                                                    <input type="date" name="to_date" class="form-control  form-control-solid" placeholder="Enter To Date">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 row main_stock_section" id="main_stock_section" style="display:none">
                                                                <div class="col-md-6 mt-5 text-center" >
                                                                    <span class="d-flex flex-column">
                                                                        <span class="fw-bolder text-gray-800 text-hover-primary fs-5">All Stock</span>
                                                                    </span>
                                                                    <span class="form-check form-check-custom form-check-solid">
                                                                        <input class="form-check-input all_stock" type="radio" name="offer_stock_type" value="all_stock" style="margin: 10px 90px;">
                                                                    </span>
                                                                </div>
                                                                <div class="col-md-6 mt-5 text-center">
                                                                    <span class="d-flex flex-column">
                                                                        <span class="fw-bolder text-gray-800 text-hover-primary fs-5">Limit Qty</span>
                                                                    </span>
                                                                    <span class="form-check form-check-custom form-check-solid">
                                                                        <input class="form-check-input limit_qty" type="radio" name="offer_stock_type" value="limit_qty" style="margin: 10px 90px;">
                                                                    </span>
                                                                </div>
                                                                <div class="col-md-6"></div>
                                                                <div class="col-md-6 mt-5 all_stock_qty" id="all_stock_qty" style="display:none">
                                                                    <div class="fv-row mb-10">
                                                                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                                            <span class="required">Qty</span>
                                                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
                                                                        </label>
                                                                        <input type="text" class="form-control  form-control-solid" name="offer_qty" placeholder="Enter Qty" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Banner Image:</label>
                                            <div class="col-lg-12 col-xl-6">

                                                <div id="editimage"  class="col-xl-12 col-md-12 col-sm-12 col-xs-12 spartan_item_wrapper" data-spartanindexrow="0" style="margin-bottom : 20px; ">
                                                    <div style="position: relative;">
                                                        <div class="spartan_item_loader" data-spartanindexloader="0" style="position: absolute; width: 100%; height: 450px; background: rgba(255,255,255, 0.7); z-index: 22; text-align: center; align-items: center; margin: auto; justify-content: center; flex-direction: column; display : none; font-size : 1.7em; color: #CECECE"><i class="fas fa-sync fa-spin"></i></div>
                                                        <label class="file_upload" style="width: 100%; height: 450px; border: 2px dashed #ddd; border-radius: 3px; cursor: pointer; text-align: center; overflow: hidden; padding: 5px; margin-top: 5px; margin-bottom : 5px; position : relative; display: flex; align-items: center; margin: auto; justify-content: center; flex-direction: column;">
                                                            <a href="javascript:void(0)" data-spartanindexremove="0" style="right: 3px; top: 3px; background: rgb(237, 60, 32); border-radius: 3px; width: 30px; height: 30px; line-height: 30px; text-align: center; text-decoration: none; color: rgb(255, 255, 255); position: absolute !important;" class="spartan_remove_row">
                                                                <i class="fas fa-times" onclick="editimageremove(this)"></i> 
                                                            </a>
                                                            <img style="width: 100%; margin: 0px auto; vertical-align: middle; display: ;" data-spartanindexi="0" src="{{asset('uploads/products/'.$edit->image)}}">    
                                                            <input class="form-control spartan_image_input" accept="image/*" data-spartanindexinput="0" style="display : none" name="thumbnail_img" type="file">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="thumbnail_img" style="display: none;"></div>
                                               

                                                <!-- image end -->

                                                <!--begin::Hint-->
                                                <br>
                                                <div class="form-text">Allowed file types: png, jpg, jpeg. size(1920px * 540px)</div>
                                                <!--end::Hint-->
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Gallary Image:</label>
                                            <div class="col-lg-12 col-xl-6">

                                                <div class="input-images">
                                                    <div class="image-uploader has-files">
                                                        <input type="file" id="images" name="images[]" multiple="multiple">
                                                        <div class="uploaded">
                                                        @if(is_array(json_decode($edit->gallary_image)))
                                                            @foreach (json_decode($edit->gallary_image) as $key => $photo)
                                                            <div class="uploaded-image" data-index="{{++$key}}">
                                                                <img src="{{asset('uploads/products/'.$photo) }}">
                                                                <input type="hidden" name="previous_photos[]" value="{{ $photo }}">
                                                                <button type="button" class="delete-image" onclick="delete_row_photos(this)"><i  class="material-icons">clear</i></button>
                                                            </div>
                                                            @endforeach
                                                        @endif
                                                        
                                                        </div>
                                                      
                                                    </div>
                                                </div>

                                                <!-- image end -->

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer py-6">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-9">
                                        <button type="submit" id="kt_layout_builder_preview" class="btn btn-primary me-2">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!-- <button type="button" id="kt_layout_builder_reset" class="btn btn-active-light btn-color-muted">
                                            <span class="indicator-label">Reset</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button> -->
                                    </div>
                                </div>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!-- start  -->
<script>
    function delete_row_photos(em) {
  
    $(em).closest('.uploaded-image').remove();
    

}

</script>
<script type="text/javascript" src="{{asset('backend')}}/assets/js/image-uploader.min.js"></script>
<script>
    $('.input-images').imageUploader();
</script>

<script>
    function editimageremove(em) {
      
        $("#editimage").hide();
        $("#thumbnail_img").show();
    }
</script>
<script>
    $(document).ready(function(){
    $(".editshop").click(function(){
      
         var id=$(this).data("id");
         if (id) {
             $.ajax({
                 url: "{{  url('/vendor/get/shop/edit/') }}/" + id,
                 type: "GET",
                 success: function(data) {

                     $("#update_value").html(data);

                 }

             });
         }
    });
 });
</script>
<!-- update end -->
<script>
 $(document).ready(function(){
     $(".product_shop").change(function(){
         var shop_id=$(this).val();

         if (shop_id) {
             $.ajax({
                 url: "{{  url('/get/shop/type/') }}/" + shop_id,
                 type: "GET",
                 dataType: "json",
                 success: function(data) {

                   if(data.id==2){
                     $("#Weight_optional").hide();
                   }else if(data.id==4){
                         $("#gender_optional").hide();
                         $("#Weight_optional").show();
                         $("#age_group_optional").hide();
                         $("#Product_Size_Optional").hide();
                         $("#Style_Optional").hide();
                     }
                 }
             });
         }
     });

 });

</script>
<script>
 $(document).ready(function(){
     $(".all_stock").click(function(){
         $("#all_stock_qty").hide();
     });

     $(".limit_qty").click(function(){
         $("#all_stock_qty").show();
     });
 });
</script>
<script>
 $(document).ready(function(){
     $(".special_section").click(function(){
       
         $("#main_date_section").show();
         $("#main_stock_section").hide();
     });

     $(".s_section").click(function(){
         $("#main_date_section").hide();
         $("#main_stock_section").show();
     });
 });
</script>
<script>
 $(document).ready(function(){
     $(".have_a_discount").click(function(){
        // alert("ok");
         if($(this).is(":checked")) {
             $(".discount_price").show();
            
         }else{
             $(".discount_price").hide();
            
         }
     });
 });
</script>
<script>
 $(document).ready(function(){
     $(".Special").click(function(){
         
         var val=$(this).val();
         if(val=='special_offer') {
          
             $("#special_sec").show();
         }else{
             $("#special_sec").hide();
         }
     });
 });
</script>
<script>
 $(document).ready(function(){
     $(".continue").click(function(){
         $("#display").attr("class", "current");
         $("#basic").removeClass("current");
         $("#continue").removeClass("continue");
         $(".continue").hide();
         $(".continuetwo").show();
         $(".continuetwoback").show();
     });
 });
</script>
<script>
 $(document).ready(function(){
     $(".continuetwo").click(function(){
         $(".continuetwo").hide();
         $("#display").removeClass("current");
         $("#img").attr("class", "current");
         $(".continuethree").show();
         $(".continuethreeback").show();
         $(".continuetwoback").hide();
     });
 });
</script>
<script>
 $(document).ready(function(){
     $(".continuethreeback").click(function(){
         $("#img").removeClass("current");
         $("#display").attr("class", "current");
         $(".continuethree").hide();
         $(".continuetwo").show();
         $(".continuethreeback").hide();
         $(".continuetwoback").show();
     });
 });
</script>
<script>
 $(document).ready(function(){
     $(".continuetwoback").click(function(){
         $("#display").removeClass("current");
         $("#basic").attr("class", "current");
         $("#img").removeClass("current");
         $(".continuetwoback").hide();
         $(".continue").show();
         $(".continuetwo").hide();
         $(".continuethree").hide();
         
     });
 });
</script>
<script>
 document.querySelector("#kt_create_account_form > div.current > div > div.mb-10.fv-row.fv-plugins-icon-container.fv-plugins-bootstrap5-row-valid")
</script>

<script type="text/javascript">
 $(document).ready(function() {
     $('select[name="category"]').on('change', function() {
         var cate_id = $(this).val();
         // alert(cate_id);

         if (cate_id) {
             $.ajax({
                 url: "{{  url('/get/subcategory/all/') }}/" + cate_id,
                 type: "GET",
                 dataType: "json",
                 success: function(data) {

                     $('#subcategory').empty();
                     $('#subcategory').append(' <option value="">--select--</option>');
                     $.each(data, function(index, districtObj) {
                         $('#subcategory').append('<option value="' + districtObj.id + '">' + districtObj.name + '</option>');
                     });

                 }
             });
         } else {
             //  alert('danger');
         }

     });
     //  resubcategory
    //  resubcategory
     $('select[name="subcategory"]').on('change', function() {
         var subcate_id = $(this).val();

         if (subcate_id) {
             $.ajax({
                 url: "{{  url('/get/resubcategory/all/') }}/" + subcate_id,
                 type: "GET",
                 dataType: "json",
                 success: function(data) {

                     $('#resubcategory').empty();
                     $('#resubcategory').append(' <option value="">--select--</option>');
                     $.each(data, function(index, districtObj) {
                         $('#resubcategory').append('<option value="' + districtObj.id + '">' + districtObj.name + '</option>');
                     });


                 }
             });
         } else {
             //  alert('danger');
         }
         // re re subcategory get
      
     });
     $('select[name="resubcategory"]').on('change', function() {
         var resubcate_id = $(this).val();

         if (resubcate_id) {
             $.ajax({
                 url: "{{  url('/get/reresubcategory/all/') }}/" + resubcate_id,
                 type: "GET",
                 dataType: "json",
                 success: function(data) {

                     $('#childresubcategory').empty();
                     $('#childresubcategory').append(' <option value="">--select--</option>');
                     $.each(data, function(index, districtObj) {
                         $('#childresubcategory').append('<option value="' + districtObj.id + '">' + districtObj.name + '</option>');
                     });
                 }
             });
         } else {
             //  alert('danger');
         }

          });


      $('select[name="childresubcategory"]').on('change', function() {
         
         var resubcate_id = $(this).val();
         if (resubcate_id) {
             $.ajax({
                 url: "{{  url('/get/rereresubcategory/all/') }}/" + resubcate_id,
                 type: "GET",
                 dataType: "json",
                 success: function(data) {

                     $('#grandchildresubcategory').empty();
                     $('#grandchildresubcategory').append('<option value="">--select--</option>');
                     $.each(data, function(index, districtObj) {
                         $('#grandchildresubcategory').append('<option value="' + districtObj.id + '">' + districtObj.name + '</option>');
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