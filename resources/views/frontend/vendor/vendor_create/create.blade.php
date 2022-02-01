@extends('layouts.frontend')
@section('title', 'Vendor-Create')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


<style>
    .success-text{
        color:green;
    }
    .danger-text{
        color:red;
    }
    input#flexCheckChecked {
        padding: 10px;
    margin: 20px 2px 10px 0;
}
label.form-check-label {
    margin: 20px 6px;
}

</style>
<style>
 
#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.form-card {
    text-align: left
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform input,
#msform textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #673AB7;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #673AB7;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: #311B92
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #673AB7;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #673AB7;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #f39910
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f13e"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f030"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #f39910
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #f39910
}

.fit-image {
    width: 100%;
    object-fit: cover
}
input#flexCheckChecked {
    padding: 11px 3px;
    width: 5%;
    color: black;
    background-color: #f98008;
    border: 1px solid #f98008;
    margin: 15px 0px;
}
</style>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>become a vendor</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">become a vendor</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
  <!-- start selling section start -->
    <section class="start-selling section-b-space">
        <div class="container">
            <div class="col">
            <form id="msform" action="{{ route('vendor.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <!-- progressbar -->
                    <ul id="progressbar">
                    @if(Session::has('success'))
                        <li class="active" id="account"><strong>Account Information</strong></li>
                        <li class="active" id="personal"><strong>Bank Information</strong></li>
                        <li class="active" id="payment"><strong>Image</strong></li>
                        <li class="active" id="confirm"><strong>Finish</strong></li>
                    @else
                        <li class="active" id="account"><strong>Account InFormation</strong></li>
                        <li id="personal"><strong>Bank Information</strong></li>
                        <li id="payment"><strong>Image</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    @endif
                        
                    </ul>
                    <br> <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 4</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Name <span style="color:red">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" value="{{ Auth::user()->name }}" onchange="removeDisabled()">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Email <span style="color:red">*</span></label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email" value="{{ Auth::user()->email }}" onchange="removeDisabled()">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Phone <span style="color:red">*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control"placeholder="Enter Your phone" value="{{ Auth::user()->phone }}" onchange="removeDisabled()">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Company name <span style="color:red">*</span></label>
                                    <input type="text" name="company_name" id="company_name" class="form-control"placeholder="Enter Company name" value="{{ old('company_name') }}" onchange="removeDisabled()">
                                    <!-- <span class="success-text">The Name is Unique</span> -->
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Company Address <span style="color:red">*</span></label>
                                    <input type="text" name="company_address" id="company_address" class="form-control"placeholder="Enter Company Address" value="{{ old('company_address') }}" onchange="removeDisabled()">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Company Google Map</label>
                                    <input type="text" name="company_google_map" class="form-control"placeholder="Enter Company Google Map" value="{{ old('company_google_map') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Country <span style="color:red">*</span></label>
                                    <select name="country" class="form-control"  id="country" onchange="removeDisabled()">
                                    <option  disabled selected>--select--</option>
                                    @foreach($allCountry as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">City <span style="color:red">*</span></label>
                                    <input type="text" name="city" id="city" class="form-control"placeholder="Enter City Name" value="{{ old('city') }}" onchange="removeDisabled()">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Zip Code </label>
                                    <input type="text" name="zip_code" class="form-control"placeholder="Enter Your Zip Code" value="{{ old('zip_code') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Sale Area</label>
                                    <input type="text" name="sale_area" class="form-control"placeholder="Enter Sale Area" value="{{old('sale_area')}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Delevery Possible Area</label>
                                    <input type="text" name="delevery_possible_area" class="form-control"placeholder="Enter Delevery Possible Area" value="{{old('dlevery_possible_area')}}">
                                </div>
                            </div>
                        </div> 
                        <input type="button" disabled  name="next" class="next action-button btn btn-sm btn-solid" id="next_one" value="Next" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Payment Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 4</h2>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Bank Account Name <span style="color:red">*</span></label>
                                    <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Account Name" value="{{ old('bank_name') }}" onchange="removeDisabletwo()">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Bank Account Number <span style="color:red">*</span></label>
                                    <input type="text" name="bank_account_number" id="bank_account_number" class="form-control" placeholder="Enter Bank Account Number" value="{{ old('bank_account_number') }}"onchange="removeDisabletwo()">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Name Of Bank <span style="color:red">*</span></label>
                                    <input type="text" name="name_of_bank" id="name_of_bank" class="form-control"placeholder="Enter Name Of Bank" value="{{ old('name_of_bank')  }}" onchange="removeDisabletwo()">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Address Your Bank <span style="color:red">*</span></label>
                                    <input type="text" name="bank_address" id="bank_address" class="form-control"placeholder="Enter Address Your Bank" value="{{ old('bank_address') }}" onchange="removeDisabletwo()">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Routing Number <span style="color:red">*</span></label>
                                    <input type="text" name="routing_number" id="routing_number" class="form-control"placeholder="Enter Routing Number" value="{{ old('routing_number') }}"  onchange="removeDisabletwo()">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">iBAN</label>
                                    <input type="text" name="i_ban" class="form-control"placeholder="Enter iBAN" value="{{ old('i_ban') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Swift Code</label>
                                    <input type="text" name="swift_code" class="form-control"placeholder="Enter Swift Code" value="{{ old('swift_code') }}">
                                </div>
                            </div>
                        </div> 
                        <input type="button" name="next" class="next action-button btn btn-sm btn-solid" disabled   id="next_two" value="Next" /> 
                        <input type="button" name="previous" class="previous action-button-previous btn btn-sm btn-solid" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    
                                    <h2 class="fs-title">Image:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 4</h2>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-6">
                                    <label class="fieldlabels">Upload Image:</label> 
                                    <input type="file" name="pic" accept="image/*">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                <input class="form-check-input custom-check" type="checkbox" value="" id="flexCheckChecked" checked >
                                    <label class="form-check-label" for="flexCheckChecked">
                                        I Agree With Terms And Conditions
                                    </label>
                                </div>
                            </div>
                        </div> 
                        <button type="submit" id="final_submit" class="action-button btn btn-sm btn-solid">Submit </button>
                        <input type="button" name="previous" class="previous action-button-previous btn btn-sm btn-solid" value="Previous" />
                    </fieldset>
                    @if(Session::has('success'))
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    @endif
                    @if(Session::has('error'))
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>Faild !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">SomeThing Is Wrong</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    @endif
                </form>
            </div>
        </div>
    </section>
    
    <!-- start selling section end -->




<script>
function removeDisabled(){
    var name=$("#name").val();
    var email=$("#email").val();
    var phone=$("#phone").val();
    var company_name=$("#company_name").val();
    var company_address=$("#company_address").val();
    var country=$("#country").val();
    var city=$("#city").val();
    if(name != "" && email != "" && phone != "" && company_name != "" && country != "" && company_address != "" && city != ""){
         $('#next_one').attr('disabled',false);
    }else{
        $('#next_one').attr('disabled',true);
    }
   
}

function removeDisabletwo(){
  
    var bank_name=$("#bank_name").val();
    var bank_account_number=$("#bank_account_number").val();
    var name_of_bank=$("#name_of_bank").val();
    var bank_address=$("#bank_address").val();
    var routing_number=$("#routing_number").val();

    if(bank_name != "" && bank_account_number != "" && name_of_bank != "" && bank_address != "" && routing_number != "" ){
         $('#next_two').attr('disabled',false);
    }else{
        $('#next_two').attr('disabled',true);
    }
}
// final submit 
// function finalsubmit(){
//     alert("ok");
//     if($('#flexCheckChecked').attr('checked',true)){
//         $('#final_submit').attr('disabled',false);
//     }else{
//         $('#final_submit').attr('disabled',true);
//     }
    
// }
</script>
<script>
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#final_submit').attr('disabled',false);
            }
            else if($(this).prop("checked") == false){
                $('#final_submit').attr('disabled',true);
            }
        });
    });
</script>
<script>
    $(document).ready(function(){

var current_fs, next_fs, previous_fs; 
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});
</script>


 
@endsection