// <!--=================== add to cart from datalist  =============-->
    // <script>
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
    // </script>
    // <!--========== product details page single product ============= -->
    // <script>
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
    // </script>
    // <!--========== get cart data  ============= -->

    // <script>
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
        flyingcartupload();
    // </script>
    // <!--========== get flying cart data  ============= -->

    // <script>
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
    // </script>
    // <!--========== get single add to cart data  ============= -->

    // <script>
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
    // </script>
    // <!--========== delete cart data data  ============= -->

    // <script>
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
    // </script>
    // <!--========== get  cart data  ============= -->

    // <script>
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
        flyingcartupload();


    // </script>
    // <!--========== get  cart quantity data  ============= -->

    // <script>
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

    // </script>
    // <!--========== main cart page data  ============= -->

    // <script>
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
    // </script>
    // <!--========== main checkout page data  ============= -->

    // <script>
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
    // </script>
    // <!--========== main cart quantity update  ============= -->

    // <script>
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
    // </script>