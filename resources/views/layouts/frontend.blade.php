<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{{asset('frontend')}}/assets/images/favicon/5.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('frontend')}}/assets/images/favicon/5.png" type="image/x-icon">
    <title>{{ $companyInformation->company_name }} | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/bootstrap.css">
    <link href="{{asset('backend')}}/assets/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom_style.css') }}">
    <script>
        $ (document).ready (function () {
	$ (".modal a").not (".dropdown-toggle").on ("click", function () {
		$ (".modal").modal ("hide");
	});
});
    </script>
</head>

<body class="theme-color-5">
    {{-- @include('layouts.frontend.loader_skeleton') --}}
    @include('layouts.frontend.header')
    @yield('content')
    @include('layouts.frontend.footer')
    {{-- @include('layouts.frontend.modal') --}}

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
        <div id="setting_box" class="setting-box" style="max-width: 380px">
            <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
            <div class="setting_box_body">
                <div onclick="closeSetting()">
                    <div class="text-start" style="max-height: 0px ; margin-left: 20px; margin-top:10px">
                        <h5><i class="ti-close pe-2" aria-hidden="true"></i>My Cart</h5>

                    </div>
                </div>
                <div class="setting-body" style="width: 300px">

                    <div class="setting-contant">
                        <table class="table table-borderless mb-0">
                            <thead>
                                <tr>
                                    {{-- <th scope="col"></th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Date Purchased</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">View</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="cart-list-product">




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="fb-root"></div>




    <script src="{{asset('frontend')}}/assets/js/jquery-3.3.1.min.js"></script>

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
    </script>
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
        cartquantity();
    </script>
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
    </script>
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
    <script>
        function mainCheckoutCart(){
            $.ajax({
                url : '{{url('/main/checkout/page')}}',
                type : 'get',
                success: function(data) {
                    // console.log(data);
                        $("#checout_cart").html(data);
                }
            });
        }
        mainCheckoutCart();
    </script>
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
    <script src="{{asset('frontend')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/feather.min.js "></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.vide.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/bootstrap-notify.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/theme-setting.js"></script>
    <script src="{{asset('frontend')}}/assets/js/script.js"></script>
    <script src="{{asset('backend')}}/assets/js/spartan-multi-image-picker.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.js"></script>
    <script>
        $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
    </script>
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
    <script src="{{asset('backend')}}/assets/plugins/ckeditor/ckeditor.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/ckeditor/ckeditor-active.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/theme-setting.js"></script>

    <script src="{{ asset('frontend/assets') }}/js/color-setting.js"></script>

    <script src="{{asset('frontend')}}/assets/js/izitost.js"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,  
        });
    });
    </script>
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