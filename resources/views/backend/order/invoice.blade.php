@extends('layouts.backend')
@section('title', 'Invoice')
@section('content')

<script src="{{asset('backend')}}/assets/plugins/print/divjs.js"></script>
<script src="{{asset('backend')}}/assets/plugins/print/print.active.js"></script> 
<script src="{{asset('backend')}}/assets/plugins/js/jquery.PrintArea.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<style>
body {
background-color: rgb(190, 190, 190)
}

.padding {
padding: 2rem !important
}

.card {
margin-bottom: 30px;
border: none;
-webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
-moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
}

.card-header {
background-color: #fff;
border-bottom: 1px solid #e6e6f2
}

h3 {
font-size: 20px
}

h5 {
font-size: 15px;
line-height: 26px;
color: #3d405c;
margin: 0px 0px 15px 0px;
font-family: 'Circular Std Medium'
}

.text-dark {
color: #3d405c !important
}
</style>
<section  id="section" class="pt-3 pb-3 page-info section-padding border-bottom bg-white print_element">
<div class="container">
   <div class="row">
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <h2 class="pt-2 d-inline-block">{{ $companyInformation->company_name }}</h2>
                <div class="float-right">
                    <h3 class="mb-0">Invoice #</h3>
                    Date: 
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h5 class="mb-3">Billing Address:</h5>
                        <h3 class="text-dark mb-1"></h3>
                        <div></div>
                        
                        <div></div>
                        <div>Email:</div>
                        <div>Phone:</div>
                    </div>
                   
                    <div class="col-sm-6 ">
                        <h5 class="mb-3">Shipping Address:</h5>
                        <h3 class="text-dark mb-1"></h3>
                        <div></div>
                        <div></div>
                        <div>Email: </div>
                        <div>Phone: </div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th>Sku</th>
                                <th class="right">Price</th>
                                <th class="center">Qty</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                       
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                {{-- <tr>
                                    <td class="left">
                                        <strong class="text-dark">Subtotal</strong>
                                    </td>
                                    <td class="right">৳</td>
                                </tr> --}}
                                {{-- <tr>
                                    <td class="left">
                                        <strong class="text-dark"></strong>
                                    </td>
                                    <td class="right">৳5,761,00</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">VAT (10%)</strong>
                                    </td>
                                    <td class="right">৳2,304,00</td>
                                </tr> --}}
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Total</strong> </td>
                                    <td class="right">
                                        <strong class="text-dark">৳</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="card-footer bg-white">
                <p class="mb-0">{{ $companyInformation->company_name }}, {{ $companyInformation->email }}, {{ $companyInformation->telephone }}, {{ $companyInformation->mobile }}</p>
                <button class="btn btn-info print" id="print" >Print</button>
            </div>
        </div>
    </div>
   </div>
</div>
</section>
<script>
    $('.print').click(function(){
      $('.print_element').printElement({
      });
    })
  </script>
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>

@endsection