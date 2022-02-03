@extends('layouts.frontend')
@section('title', 'Payment Method')
@section('content')
<style>
    .hide {
        display: none;
    }
</style>
<section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <a href="{{url('/')}}"><strong><span class="mdi mdi-home"></span> Home</strong></a> <span class="mdi mdi-chevron-right"></span> <a href="#">Checkout</a>
          </div>
       </div>
    </div>
</section>

<section class="cart-page section-padding">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
            <div class="card-body">
                <div class="text-center">
                   <div class="col-lg-10 col-md-10 mx-auto order-done">
                      <i class="mdi mdi-check-circle-outline text-secondary"></i>
                      <h4 class="text-success">Congrats! Your Order has been Placed..</h4>
                   </div>
                </div>
             </div>
             <div class="card card-body cart-table">
                <div class="table-responsive">
                   <table class="table cart_summary">
                      <thead>
                         <tr>
                            <th class="cart_product">Product</th>
                            <th>Description</th>
                            <th>Unit price</th>
                            <th></th>
                            <th>Qty</th>
                            <th>Total</th>
                            
                         </tr>
                      </thead>
                      <tbody>
                        @foreach ($product as  $obj)    
                        <tr>
                            @php $product_image = App\Models\Product::where('id',$obj->id)->select(['image'])->first();@endphp 

                            <td class="cart_product"><a href="#"><img class="img-fluid" src="{{asset('uploads/product/'.$product_image->image)}}" alt=""></a></td>
                            <td class="cart_description">
                               <h5 class="product-name"><a href="#">{{Str::limit($obj->product_name,20)}} </a></h5>                           
                            </td>                  
                            <td class="price"><span>৳ {{$obj->price}}</span></td>
                            <td></td>
                            <td class="qty">
                              <span>{{$obj->qty}}</span>
                            </td>
                            <td class="price"><span>৳ {{$obj->subtotal}}</span></td>
                         </tr>
                         @endforeach
                      </tbody>
                      <tfoot>
                         <tr>
                            <td class="text-right" colspan="5"><strong>Total</strong></td>
                            <td class="text-danger" colspan="2"><strong>৳ {{$data->total_amount}} </strong></td>
                         </tr>
                      </tfoot>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="checkout-page section-padding">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="checkout-step">
                <div class="accordion" id="accordionExample">
                   <div class="card">
                      <div class="card-header" >
                         <h5 class="mb-0">
                            <button class="btn btn-link" type="button" >
                            Make Payment
                            </button>
                         </h5>
                      </div>
                      <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                         <div class="card-body">
                            <form class="col-lg-8 col-md-8 mx-auto" method="post" action={{route('pay')}}>
                                @csrf
                                <input type="text" hidden name="order_id" value="{{$data->order_id}}">
                                <div class="custom-control custom-radio" >
                                    <input type="radio" id="customRadio2" name="status" class="custom-control-input" checked  value="1" onclick="showOnlineDelivery();">
                                    <label class="custom-control-label" for="customRadio2">Would you like to pay by Cash on Delivery?</label>
                                 </div>
                                <div class="custom-control custom-radio">
                                   <input type="radio" id="customRadio1" name="status" class="custom-control-input" value="2" onclick="showOnlinePayment();"> 
                                   <label class="custom-control-label" for="customRadio1">Would you like to pay by Online?</label>
                                </div>
                        
                               <div id="cashOnDelivery"  class="collapse show hide" aria-labelledby="headingOne" data-parent="#accordionExample">
                                
                                    <div class="card-body">
                                        <div class="form-row align-items-center">
                                            <div class="form-group col-auto">
                                            <label class="control-label">Pay Method <span class="required">*</span></label>
                                            <select name="payment_method" class="">
                                                <option disabled >Select</option>
                                                <option value="1"  >BKASH</option>
                                                <option value="2"  >NOGOD</option>
                                                <option value="3" >Rocket</option>
                                            </select>
                                            @error('payment_method')
                                                <div class="validation">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                    <p>Please Send Money:01783039918</p>
                                        <div class="form-row align-items-center">
                                            <div class="col-auto">
                                                <label class="sr-only">TRX Id</label>
                                                <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><span class="mdi mdi-cellphone-iphone"></span></div>
                                                </div>
                                                <input type="text" name="trx_number" class="form-control" placeholder="Enter trx Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                               <br/>
                               <button  type="submit"  class="btn btn-secondary mb-2 btn-lg">Submit</button>
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <script>
    function showOnlinePayment(){
        document.getElementById('cashOnDelivery').style.display = 'block';
        //document.getElementById('showPaymentOnline').style.display = 'none';
    }
    function showOnlineDelivery(){
        document.getElementById('cashOnDelivery').style.display = 'none';
    }
 </script> 
@endsection