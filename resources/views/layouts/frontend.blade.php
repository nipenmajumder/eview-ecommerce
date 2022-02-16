{{-- {{ dd($companyInformation) }} --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{{ asset('uploads/logo/'.$companyInformation->favicon) }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('uploads/logo/'.$companyInformation->favicon) }}" type="image/x-icon">
    <title>{{ $companyInformation->company_name }} | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/izitost.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/price-range.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/bootstrap.css">
    <link rel="stylesheet" href="{{asset('backend')}}/assets/datatabels/dataTables.min.css">
    <link href="{{asset('backend')}}/assets/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom_style.css') }}">
    <!-- custom flying cart -->
    
    <style>
        .product-cart-list {
            background: #fff none repeat scroll 0 0;
            border-radius: 5px;
            box-shadow: 0 2px 8px 0 rgb(0 0 0 / 6%);
            margin-bottom: 16px;
            overflow: hidden;
            padding: 12px;
            position: relative;
            margin-top: 10px;
        }

        .size span {
            font-size: 11px
        }

        .color span {
            font-size: 11px
        }

        .product-deta {
            margin-right: 70px
        }

        .gift-card:focus {
            box-shadow: none
        }

        .pay-button {
            color: #fff
        }

        .pay-button:hover {
            color: #fff
        }

        .pay-button:focus {
            color: #fff;
            box-shadow: none
        }

        .text-grey {
            color: #a39f9f
        }

        .qty i {
            font-size: 11px
        }
    </style>
</head>

<body class="theme-color-5">
    {{-- @include('layouts.frontend.loader_skeleton') --}}
    @include('frontend.include.header')
    @yield('content')
    @include('frontend.include.footer')
    {{-- @include('layouts.frontend.modal') --}}

    <!--=================== product quick view modal ===================-->
    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="quick-view-img" id="product_image">

                            </div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <h2 id="product_name"></h2>
                                <h3 id="product_price"></h3>

                                <div class="border-product">
                                    <h6 class="product-title">Product Info</h6>
                                    <p id="brand"></p>
                                    <p id="product_weight"></p>
                                    <p id="style"></p>
                                    <p id="product_materials"></p>
                                </div>
                                <div class="product-description border-product">
                                    <div class="size-box">

                                    </div>
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                        class="ti-angle-left"></i></button> </span>
                                            <input type="text" name="quantity" class="form-control input-number"
                                                value="1"> <span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                        class="ti-angle-right"></i></button></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons" id="product_button">
                                    <a href="#" class="btn btn-solid">add to cart</a>
                                    <a href="#" class="btn btn-solid">view detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=================== order track modal ===================-->

    <div class="modal fade" id="order_track" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Track your Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/track-order') }}" method="get">
                    <div class="modal-body ">
                        <h5 class="modal-title" id="exampleModalLabel"> Track your Order</h5>
                        <div class="col-md-12 mt-1">
                            <input type="text" id="order_id" name="order_id" class="form-control order_id"
                                name="order_id" placeholder="Enter your Order Id" required>
                        </div>
                        <div class="col-md-12 mt-2">
                            <button type="submit" class="btn btn-primary btn-sm " id="orderTrackBtn">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--=================== flying Shopping Cart ===================-->
    <div class="theme-settings">
        <ul>
            <li class="demo-li">
                <a href="javascript:void(0)" onclick="openSetting()">
                    <div class="setting-sidebar" id="setting-icon">
                        <i class="ti-shopping-cart"></i>
                    </div>
                </a>

            </li>
        </ul>
    </div>

    <div class="scroll-setting-box">
        <div id="setting_box" class="setting-box" style="max-width: 280px;">
            <div class="cart-sidebar">
                <div class="container">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-8" onclick="closeSetting()">
                            <div class="p-2 mt-1" style="display: flex">
                                <i class="ti-close pe-2" aria-hidden="true" class="overlay"
                                    onclick="closeSetting()"></i>
                                <h4>Shopping cart</h4>
                            </div>
                        </div>
                        <div class="flying_cart">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div id="fb-root"></div>




    <script src="{{asset('frontend')}}/assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/jquery-3.3.1.min.js"></script>
    <script>
        $('#order_track').on('shown.bs.modal', function () {
        $('#order_track').trigger('focus')
        })
    </script>
    <!--=================== product quick view  =============-->
    <script>
        $(document).ready(function(){
        $(".productdetails").click(function(){
            
            $('#loaderIcon').show();
        var product_id=$(this).data("id");
            $("#product_name").empty();
            $("#product_price").empty();
            $("#product_details").empty();
            $("#product_id").empty();
            $("#product_image").empty();
            $("#product_button").empty();
            $('#brand').empty();
            $('#product_materials').empty();

            if (product_id) {
                $.ajax({
                    url: "{{  url('/get/product/details/') }}/" + product_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $("#product_name").text(data.product_name);
                        $("#product_price").text('৳'+data.product_price);
                        $("#product_id").text(data.id);
                        $("#product_image").append('<img src="{{ asset("uploads/products/") }}/'+data.image+'" alt="" class="img-fluid blur-up lazyload">');
                        $("#product_button").append('<a href="#" class="btn btn-solid">add to cart</a><a href="{{ url("products/") }}/'+data.slug+'/'+data.id+'"" class="btn btn-solid">view detail</a>')
                        
                        $("#product_name").text(data.product_name);
                        $("#product_price").text('৳'+data.product_price);

                        if(data.product_brand==null){
                            $('#brand').text("");
                        }else{
                            $('#brand').text('Brand: '+data.product_brand);
                        }

                        if(data.product_materials){
                            $('#product_materials').text("");
                        }else{
                            $('#product_materials').text('Product Materials: '+data.product_materials);
                        }


                    },complete: function(){

                            $('#loaderIcon').hide();

                        }
       
                });
            }

        });
    });
    </script>
    <script src="{{asset('frontend')}}/assets/js/bootstrap.bundle.min.js"></script>

    <!--=================== normal modal close/open  =============-->
    <script>
        $ (document).ready (function () {
	    $ (".modal a").not (".dropdown-toggle").on ("click", function () {
		$ (".modal").modal ("hide");
	    });
        });
    </script>
    <!--=================== flying modal close/open  =============-->
    <script>
        function openSetting() {
        document.getElementById("setting_box").classList.add('open-setting');
        document.getElementById("setting-icon").classList.add('open-icon');
        }
        function closeSetting() {
        document.getElementById("setting_box").classList.remove('open-setting');
        document.getElementById("setting-icon").classList.remove('open-icon');
        }
    </script>
    <!--===================  add to cart from datalist  =============-->
    <script>
        function addtocart(el){
            var id = el.id;
            var str = $( "#cartsection-"+id+"" ).serialize();
            $.ajax({
                url : '{{url('/addtocart')}}',
                type : 'get',
                data : $( "#cartsection-"+id+"" ).serialize(),
                success: function(data) {
                    if(data.success){
                    cartupload();
                    cartquantity();
                    flyingcartupload();
                   
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: ''+ data.success +'',
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    }else{
                    cartupload();
                    cartquantity();
                    flyingcartupload();

                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Add to cart failed',
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    }       
                }
            })
        }
    </script>
    <!--===================  add to wishlist from datalist  =============-->
    <script>
        function addtowishlist(el){
            var id = el.id;
            var str = $( "#cartsection-"+id+"" ).serialize();
            $.ajax({
                url : '{{url('/add-to-wishlist')}}',
                type : 'get',
                data : $( "#cartsection-"+id+"" ).serialize(),
                success: function(data) {
                    if(data.success){
                   
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: ''+ data.success +'',
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    }else{
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Add to cart failed',
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    }       
                }
            })
        }
    </script>
    <!--========== get cart data  ============= -->

    <script>
        function cartupload(){
            $.ajax({
                url : '{{url('/getcart')}}',
                type : 'get',
                success: function(data) {
                    $("#cart_section").html(data);
                }
            })
        }
        cartupload();
        // flyingcartupload();
    </script>
    <!--========== get flying cart data  ============= -->

    <script>
        function flyingcartupload(){
            $.ajax({
                url : '{{url('/getflyingcart')}}',
                type : 'get',
                success: function(data) {
                    $(".flying_cart").html(data);
                }
            })
        }
        cartupload();

        flyingcartupload();
    </script>
    <!--========== add single product to wishlist cart data  ============= -->

    <script>
        $(document).ready(function(){
          $(".cart").click(function(){
              var str = $( "#cartsection" ).serialize();
             console.log(str);
              $.ajax({
                  url : '{{url('/addtocart')}}',
                  type : 'get',
                  data : $( "#cartsection" ).serialize(),
                  success: function(data) {
                     if(data.success){
                      cartupload();
                      cartquantity();
                      flyingcartupload();
                      Swal.fire({
                          toast: true,
                          icon: 'success',
                          title: ''+ data.success +'',
                          position: 'top',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                      })
                     }else{
                      cartupload();
                      flyingcartupload();
                      cartquantity();
                      Swal.fire({
                          toast: true,
                          icon: 'error',
                          title: 'Add to cart failed',
                          position: 'top',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                      })
                     }
                 
                           
                  }
              })
              // 
          });
    
    });
    </script>
    <!--========== add single product to wishlist  ============= -->

    <script>
        $(document).ready(function(){
          $(".wishlist").click(function(){
              var str = $( "#cartsection" ).serialize();
             console.log(str);
              $.ajax({
                  url : '{{url('/add-to-wishlist')}}',
                  type : 'get',
                  data : $( "#cartsection" ).serialize(),
                  success: function(data) {
                     if(data.success){
                      Swal.fire({
                          toast: true,
                          icon: 'success',
                          title: ''+ data.success +'',
                          position: 'top',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                      })
                     }else{
                      Swal.fire({
                          toast: true,
                          icon: 'error',
                          title: 'Add to cart failed',
                          position: 'top',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                      })
                     }
                 
                           
                  }
              })
              // 
          });
    
    });
    </script>
    <!--========== delete cart data data  ============= -->

    <script>
        function deletedata(el){
        var rowId=el.id;
        $.ajax({
                url: "{{  url('/deletecart/item/') }}/" + rowId,
                type : 'get',
                success: function(data) {
                    mainuploadspro();
                    cartquantity();
                    cartupload();
                    flyingcartupload();
                    mainCheckoutCart();
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: ''+ data.success +'',
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    
                
                }
            });
        mainuploadspro();
    }
    </script>
    <!--========== delete cart data data  ============= -->

    <script>
        function deletewishlistdata(el){
            var rowId=el.id;
            $.ajax({
                    url: "{{  url('/delete-wishlist/item/') }}/" + rowId,
                    type : 'get',
                    success: function(data) {
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: ''+ data.success +'',
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                        location.reload();
                    }
                });
        }
    </script>
    <!--========== get  cart data  ============= -->

    <script>
        function cartData(){
            $.ajax({
                url : '{{url('/getcartData')}}',
                type : 'get',
                 dataType:'json',
                success: function(data) {
                    $("#cart_quantity").html(data);
                }
            })
        }
        // cartquantity();
        flyingcartupload();


    </script>
    <!--========== get  cart quantity data  ============= -->

    <script>
        function cartquantity(){
            $.ajax({
                url : '{{url('/getcartQuantity')}}',
                type : 'get',
                 dataType:'json',
                success: function(data) {
                    $("#cart_quantity").html(data);
                }
            })
        }
        cartquantity();
        flyingcartupload();

    </script>
    <!--========== main cart page data  ============= -->

    <script>
        function mainuploadspro(){
            $.ajax({
                url : '{{url('/main/getcart/page')}}',
                type : 'get',
                success: function(data) {
                    // console.log(data);
                        $("#maincart_page").html(data);
                }
            });
        }
        mainuploadspro();
    </script>
    <!--========== main checkout page data  ============= -->

    <script>
        function mainCheckoutCart(){
            $.ajax({
                url : '{{url('/main/checkout/page')}}',
                type : 'get',
                success: function(data) {
                        $("#checout_cart").html(data);
                }
            });
        }
        mainCheckoutCart();
    </script>
    <!--========== main cart quantity update  ============= -->

    <script>
        function cartqtyupdate(el){
            var rowId=el.id;
            var qty=el.value;
            $.ajax({
                    url: "{{  url('/increase/item/') }}/" + rowId,
                    type : 'get',
                    data :   { 'qty' : qty},
                    success: function(data) {
                        mainuploadspro();
                        cartquantity();
                        cartupload();
                        flyingcartupload();
                        mainCheckoutCart();
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: ''+ data.success +'',
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                        
                    
                    }
                });
            mainuploadspro();
        }
    </script>
    <script src="{{asset('frontend')}}/assets/js/menu.js"></script>
    <script src="{{asset('frontend')}}/assets/js/lazysizes.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/slick.js"></script>
    <script src="{{asset('frontend')}}/assets/js/feather.min.js "></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.vide.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/bootstrap-notify.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/script.js"></script>
    <script src="{{asset('backend')}}/assets/js/spartan-multi-image-picker.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.js"></script>
    <script>
        $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
    </script>
    @yield('js')
    <!--========== image selector  ============= -->
    <script>
        $(document).ready(function() {

			$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
			$("#thumbnail_img").spartanMultiImagePicker({
				fieldName: 'thumbnail_img',
				maxCount: 1,
				rowHeight: '200px',
				groupClassName: 'col-lg-3 col-md-4 col-sm-4 col-xs-6',
				maxFileSize: '',
				dropFileLabel: "Drop Here",
				onExtensionErr: function(index, file) {
					console.log(index, file, 'extension err');
					alert('Please only input png or jpg type file')
				},
				onSizeErr: function(index, file) {
					console.log(index, file, 'file size too big');
					alert('File size too big');
				}
			});

			$("#photos").spartanMultiImagePicker({
				fieldName: 'photos[]',
				maxCount: 10,
				rowHeight: '200px',
				groupClassName: 'col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-6',
				maxFileSize: '',
				dropFileLabel: "Drop Here",
				onExtensionErr: function(index, file) {
					console.log(index, file, 'extension err');
					alert('Please only input png or jpg type file')
				},
				onSizeErr: function(index, file) {
					console.log(index, file, 'file size too big');
					alert('File size too big');
				}
			});
			$("#product_img").spartanMultiImagePicker({
				fieldName: 'product_img',
				maxCount: 1,
				rowHeight: '250px',
				groupClassName: 'col-xl-12 col-md-12 col-sm-12 col-xs-12',
				maxFileSize: '',
				dropFileLabel: "Drag & Drop",
				onExtensionErr: function(index, file) {
					console.log(index, file, 'extension err');
					alert('Please only input png or jpg type file')
				},
				onSizeErr: function(index, file) {
					console.log(index, file, 'file size too big');
					alert('File size too big');
				}
			});

		});
    </script>
    {{-- <script src="{{asset('backend')}}/assets/plugins/ckeditor/ckeditor.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/ckeditor/ckeditor-active.js"></script> --}}
    {{-- <script src="{{ asset('frontend/assets') }}/js/theme-setting.js"></script> --}}

    {{-- <script src="{{ asset('frontend/assets') }}/js/color-setting.js"></script> --}}
    <script src="{{asset('backend')}}/assets/datatabels/dataTables.min.js"></script>
    <script src="{{asset('backend')}}/assets/datatabels/dataTables-active.js"></script>
    <script src="{{asset('frontend')}}/assets/js/izitost.js"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
    <!--==========  summernote  ============= -->

    <script>
        $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,  
        });
    });
    </script>
    <!--==========  delete using swal  ============= -->

    <script>
        $(document).on("click", "#delete", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
                title: "Are you Want to delete?",
                text: "Once Delete, This will be Permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Safe Data!");
                }
            });
    });
    </script>

    <script>
        @if(Session::has('messege'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'success':

            iziToast.success({
                message: '{{ Session::get('messege') }}',
                'position': 'topCenter'
            });
            brack;
        case 'info':
            iziToast.info({
                message: '{{ Session::get('messege') }}',
                'position': 'topRight'
            });
            brack;
        case 'warning':
            iziToast.warning({
                message: '{{ Session::get('messege') }}',
                'position': 'topRight'
            });
            break;
        case 'error':
            iziToast.error({
                message: '{{ Session::get('messege') }}',
                'position': 'topRight'
            });
            break;
    }
    @endif
    </script>
    <script>
        $(window).on('load', function () {
        setTimeout(function () {
            $('#exampleModal').modal('show');
        }, 2500);
        });
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }
        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {     $('.select2-multi').select2();  }); 
    </script>
</body>

</html>