{{--@extends('adminpanel.admin-module.layout.checkout_templating')--}}
{{--@section('content')--}}
{{--<section class="main_checkout">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-7 col-10 d-block m-auto left_section">--}}
{{--                <div class="main_breadcrumb">--}}
{{--                    <nav aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb">--}}
{{--                            <li class="breadcrumb-item"><a href="#">Cart</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">Cheackout</li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--                <!-- main section is start -->--}}
{{--                <main>--}}
{{--                    <form id="testform" class="require-validation" action="{{route('order_create')}}"--}}
{{--                          data-cc-on-file="false"--}}
{{--                          data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="mb-3 main_contact_info">--}}
{{--                            <div class="upper_heading">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6 col-12">--}}
{{--                                        <h2>Contact information</h2>--}}
{{--                                    </div>--}}
{{--                                    @if($login_customer_data === null)--}}
{{--                                        <div class="col-md-6 col-12 text-md-right text-left">--}}
{{--                                            <p>Already have an account? <span><a href="https://{{$cart_check->shopify_store_id}}/account/login">log in</a></span></p>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="main_form_email">--}}
{{--                                <div class="form-group input_form_parent">--}}
{{--                                    <label  for="email">--}}
{{--                                       Email--}}
{{--                                    </label>--}}
{{--                                        <input type="text" name="email" class="form-control input_field" @if($login_customer_data !== null)  value="{{$login_customer_data->email}}" @endif id="email"--}}
{{--                                               aria-describedby="emailHelp" required>--}}
{{--                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">--}}
{{--                                        <input type="checkbox" name="" class="custom-control-input"--}}
{{--                                               id="customControlInline">--}}
{{--                                        <label class="custom-control-label" for="customControlInline">Remember my--}}
{{--                                            preference</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="checkout_main_form mb-3 pt-4">--}}
{{--                                <div class="checkout_main_heaging">--}}
{{--                                    <h2>Shipping address</h2>--}}
{{--                                </div>--}}
{{--                                @if($login_customer_data !== null)--}}
{{--                                    @php--}}
{{--                                        $size = sizeof($login_customer_addresses)-1;--}}
{{--                                    @endphp--}}
{{--                                @endif--}}
{{--                                <div class="form-row mt-4">--}}
{{--                                    <div class="col-md-6 mt-3 col-12 input_form_parent">--}}
{{--                                        <label for="fname" >First name</label>--}}
{{--                                        <input id="fname" name="fname" type="text" class="form-control"@if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->first_name}}" @endif required="">--}}

{{--                                    </div>--}}
{{--                                    <div class="col-md-6 mt-3 col-12 input_form_parent">--}}
{{--                                        <label for="lname" >Last name</label>--}}
{{--                                        <input type="text" name="lname" class="form-control" id="lname"@if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->last_name}}" @endif required="">--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group my-3 input_form_parent">--}}
{{--                                    <label for="address" >Address</label>--}}
{{--                                    <input type="text" name="address" class="form-control" id="address"@if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->address1}}" @endif required="">--}}

{{--                                </div>--}}
{{--                                <div class="form-group my-3 input_form_parent">--}}
{{--                                    <label for="Apartment" >Apartment, suite, etc.--}}
{{--                                        (optional)</label>--}}
{{--                                    <input type="text" name="apartment" class="form-control" id="Apartment" @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->address2}}" @endif >--}}

{{--                                </div>--}}
{{--                                <div class="form-group my-3 input_form_parent">--}}
{{--                                    <label for="country" >Country</label>--}}
{{--                                    <input type="text" name="country" class="form-control" id="country" @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->country}}" @endif required="">--}}

{{--                                </div>--}}
{{--                                <div class="form-row mt-4">--}}
{{--                                    <div class="col-md-6 mt-3 col-12 input_form_parent">--}}
{{--                                        <label for="city" >City</label>--}}
{{--                                        <input id="city" name="city" type="text" class="form-control" @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->city}}" @endif required="">--}}

{{--                                    </div>--}}
{{--                                    <div class="col-md-6 mt-3 col-12 input_form_parent">--}}
{{--                                        <label for="state" >state</label>--}}
{{--                                        <input type="text" name="state" class="form-control" @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->province}}" @endif id="state" required="">--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-row mt-4">--}}
{{--                                    <div class="col-md-6 mt-3 col-12 input_form_parent">--}}
{{--                                        <label for="phone" >Phone</label>--}}
{{--                                        <input id="phone" name="phone" type="text" class="form-control" @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->phone}}" @endif required="">--}}

{{--                                    </div>--}}
{{--                                    <div class="col-md-6 mt-3 col-12 input_form_parent">--}}
{{--                                        <label for="zipcode" >Zip Code</label>--}}
{{--                                        <input id="zip_code" name="zip_code" type="number" @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->zip}}" @endif class="form-control"--}}
{{--                                               required="">--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="custom-control custom-checkbox my-1 mr-sm-2">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="save">--}}
{{--                                    <label class="custom-control-label" for="save">Remember my preference</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="checkout_main_form pt-4">--}}
{{--                                <div class="checkout_main_heaging">--}}
{{--                                    <h2>Billing address</h2>--}}
{{--                                </div>--}}
{{--                                <div class="form-row mt-4">--}}
{{--                                    <div class="col-md-6 mt-3 col-12 input_form_parent">--}}
{{--                                        <label for="fname_billing" >First Name</label>--}}
{{--                                        <input id="fname_billing" name="fname_billing" type="text" class="form-control"--}}
{{--                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->first_name}}" @endif required="">--}}

{{--                                    </div>--}}
{{--                                    <div class="col-md-6 mt-3 col-12 input_form_parent">--}}
{{--                                        <label for="lname_billing" >Last Name</label>--}}
{{--                                        <input type="text" name="lname_billing" class="form-control" id="lname_billing"--}}
{{--                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->last_name}}" @endif required="">--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group my-3 input_form_parent">--}}
{{--                                    <label for="address_billing" >Address</label>--}}
{{--                                    <input type="text" name="address_billing" class="form-control" id="address_billing"--}}
{{--                                           @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->address1}}" @endif required="">--}}

{{--                                </div>--}}
{{--                                <div class="form-group my-3 input_form_parent">--}}
{{--                                    <label for="Apartment_billing" >Apartment, suite, etc.--}}
{{--                                        (optional)</label>--}}
{{--                                    <input type="text" name="apartment_billing" class="form-control"--}}
{{--                                           @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->address2}}" @endif id="Apartment_billing" >--}}

{{--                                </div>--}}
{{--                                <div class="form-group my-3 input_form_parent">--}}
{{--                                    <label for="country_billing" >Country</label>--}}
{{--                                    <input type="text" name="country_billing" class="form-control" id="country_billing"--}}
{{--                                           @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->country}}" @endif  required="">--}}

{{--                                </div>--}}
{{--                                <div class="form-row mt-4">--}}
{{--                                    <div class="col-md-6 mt-3 col-12 input_form_parent">--}}
{{--                                        <label for="city_billing" >City</label>--}}
{{--                                        <input id="city_billing" name="city_billing" type="text" class="form-control"--}}
{{--                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->city}}" @endif required="">--}}

{{--                                    </div>--}}
{{--                                    <div class="col-md-6 mt-3 col-12 input_form_parent">--}}
{{--                                        <label for="state_billing" >State</label>--}}
{{--                                        <input type="text" name="state_billing" class="form-control" id="state_billing"--}}
{{--                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->province}}" @endif required="">--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-row mt-4">--}}
{{--                                    <div class="col-md-6 mt-3 col-12 input_form_parent">--}}
{{--                                        <label for="phone_billing" >Phone</label>--}}
{{--                                        <input id="phone_billing" name="phone_billing" type="text" class="form-control"--}}
{{--                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->phone}}" @endif required="">--}}

{{--                                    </div>--}}
{{--                                    <div class="col-md-6 mt-3 col-12 input_form_parent">--}}
{{--                                        <label for="zipcode_billing" >Zip Code</label>--}}
{{--                                        <input id="zip_code_billing" name="zip_code_billing" type="number"--}}
{{--                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->zip}}" @endif class="form-control" required="">--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="custom-control custom-checkbox my-1 mr-sm-2">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="save_billing">--}}
{{--                                    <label class="custom-control-label" for="save_billing">Remember my--}}
{{--                                        preference</label>--}}
{{--                                </div>--}}
{{--                                <div class="row mt-4 mb-4">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="panel panel-default credit-card-box">--}}
{{--                                            <div class="panel-heading display-table">--}}
{{--                                                <div class="row display-tr">--}}
{{--                                                    <h4 class="panel-title display-td">Payment Details</h4>--}}
{{--                                                    <div class="display-td">--}}
{{--                                                        <img class="img-responsive img-fluid pull-right" width="100%"--}}
{{--                                                             height="100%"--}}
{{--                                                             src="{{asset('assets/dist/img/payment_mehtods.png')}}" >--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="panel-body">--}}
{{--                                                @if (Session::has('success'))--}}
{{--                                                    <div class="alert alert-success text-center">--}}
{{--                                                        <a href="#" class="close" data-dismiss="alert"--}}
{{--                                                           aria-label="close">×</a>--}}
{{--                                                        <p>{{ Session::get('success') }}</p>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                                <div class='form-row row'>--}}
{{--                                                    <div style="border: none;"--}}
{{--                                                         class='col-md-12 form-group required'>--}}
{{--                                                        <label class='control-label'>Payment Mehtod</label>--}}
{{--                                                        <select class="form-control" name="payment_method">--}}
{{--                                                            <option selected value="stripe">Stripe</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class='form-row row'>--}}
{{--                                                    <div class='col-xs-12 col-md-12 form-group required'>--}}
{{--                                                        <label class='control-label'>Card Number</label> <input--}}
{{--                                                            required class='form-control card-number' placeholder="Card Number"--}}
{{--                                                            size='20'--}}
{{--                                                            type='text'>--}}
{{--                                                    </div>--}}
{{--                                                    <div class='col-xs-12 col-md-12 form-group cvc required'>--}}
{{--                                                        <label class='control-label'>CVC</label> <input--}}
{{--                                                            required--}}
{{--                                                            class='form-control card-cvc' placeholder='ex. 311'--}}
{{--                                                            size='4'--}}
{{--                                                            type='text'>--}}
{{--                                                    </div>--}}
{{--                                                    <div class='col-xs-12 col-md-6 form-group expiration required'>--}}
{{--                                                        <label class='control-label'>Expiration Month</label> <input--}}
{{--                                                            required class='form-control card-expiry-month' placeholder='MM'--}}
{{--                                                            size='2'--}}
{{--                                                            type='text'>--}}
{{--                                                    </div>--}}
{{--                                                    <div class='col-xs-12 col-md-6 form-group expiration required'>--}}
{{--                                                        <label class='control-label '>Expiration Year</label> <input--}}
{{--                                                            class='form-control card-expiry-year '--}}
{{--                                                            placeholder='YYYY' size='4'--}}
{{--                                                            required type='text'>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                 <div class="stripe-payment-error"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-4 mb-5">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-6 m-auto">--}}
{{--                                            <a href="https://haseeb-butt.myshopify.com/cart">< Return to cart</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6 text-right">--}}
{{--                                            <button class=" btn btn-lg btn-mycolor py-md-3 py-1" type="submit">--}}
{{--                                                Checkout Order--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <hr/>--}}
{{--                                <p>All rights reserved BunnyToys.pk</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <input type="text" name="total" hidden class="total" value="">--}}
{{--                        <input type="text" name="sipping_price" hidden class="shipping-price" value="{{$shipping}}">--}}
{{--                        <input type="text" name="discount_code" hidden class="discount-code" value="">--}}
{{--                        <input type="text" name="discount_amount" hidden class="discount-amount" value="">--}}
{{--                        <input type="text" name="discount_type" hidden class="discount-type" value="">--}}
{{--                        <input type="text" name="subtotal" hidden class="subtotal" value="">--}}
{{--                        <input hidden type="text" name="token" value="{{$token}}" class="token">--}}
{{--                    </form>--}}
{{--                </main>--}}
{{--            </div>--}}
{{--            <div class="col-md-5 col-10 d-block m-md-0 m-auto my_bg_theme ">--}}
{{--                @foreach($data as $key=>$product)--}}
{{--                    <div class="row pt-4">--}}
{{--                        <div class="col-9">--}}
{{--                            <div class="img_main_parent d-flex">--}}
{{--                                <div class="img_product" style="max-width: 80px">--}}
{{--                                    <img src="{{$product->image}}" class="img-fluid">--}}
{{--                                    <span class="quantity">{{$product->quantity}}</span>--}}
{{--                                </div>--}}
{{--                                <div class="about_product">--}}
{{--                                    <span class="product-title font-weight-bold">{{$product->title}}</span>--}}
{{--                                    <div class="variants">--}}
{{--                                        <ul>--}}
{{--                                            <li>{{$product->sku}}</li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-3 product_price text-right">--}}
{{--                            <span class="font-weight-bold">{{($product->quantity)*($product->price/100).'$'}}</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <hr/>--}}
{{--                @endforeach--}}
{{--                <div class="card mb-2">--}}
{{--                    <div class="card-body">--}}
{{--                        <form method="post" class="coupon-form" action="{{Route('discount_codes')}}">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Have coupon?</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control coupon" name="discount_code"--}}
{{--                                           placeholder="Coupon code">--}}
{{--                                    <span class="input-group-append">--}}
{{--                                 <button type="button" class="btn btn-primary btn-apply coupon coupon-button">Apply</button>--}}
{{--                                 </span>--}}
{{--                                </div>--}}
{{--                                --}}{{--                                <span style="font-size: 20px;" class=" mt-2 badge badge-secondary badge-delete "></span>--}}
{{--                                <br>--}}
{{--                                <div class="place-code">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <hr/>--}}
{{--                <div class="row pb-1">--}}
{{--                    <div class="col-6">--}}
{{--                        <p style="font-size: 20px;" class="">--}}
{{--                            Sub Total--}}
{{--                        </p>--}}
{{--                        <div class="text_detail">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 text-right">--}}
{{--                        @php--}}
{{--                            $subtotal_sum = 0;--}}
{{--                            foreach ($data as $product){--}}
{{--                            $subtotal_sum = $subtotal_sum + ( ($product->quantity) * ($product->price/100));--}}
{{--                            }--}}
{{--                        @endphp--}}
{{--                        <h3 class="subtotals" subtotals="{{$subtotal_sum}}">{{$subtotal_sum}}$</h3>--}}
{{--                    </div>--}}
{{--                    <div class="col-6">--}}
{{--                        <p style="font-size: 20px;" class="">--}}
{{--                            Shipping Price--}}
{{--                        </p>--}}
{{--                        <div class="text_detail">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 text-right">--}}
{{--                        <h3 class="shipping-price" value="{{$shipping}}">{{$shipping}}$</h3>--}}
{{--                    </div>--}}
{{--                    <div class="col-6">--}}
{{--                        <p style="font-size: 20px;;" class="">--}}
{{--                            Discount--}}
{{--                        </p>--}}
{{--                        <div class="text_detail">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 text-right">--}}
{{--                        <h3 class="discount-value"></h3>--}}
{{--                        <span style="color: #808080;font-size: 87%" class="msg"><i></i></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <hr/>--}}
{{--                <div class="row pb-5">--}}
{{--                    <div class="col-6">--}}
{{--                        <p style="font-size: 30px;" class="">--}}
{{--                            Total--}}
{{--                        </p>--}}
{{--                        <div class="text_detail">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 text-right">--}}
{{--                        <h1 class="total" total="{{$subtotal_sum+$shipping}}"></h1>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<!-- Optional JavaScript -->--}}
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function () {--}}
{{--        var subtotal = $(".subtotals").attr('subtotals')--}}
{{--        var shipping_price = $(".shipping-price").attr('value');--}}
{{--        $(".subtotal").val(subtotal)--}}
{{--        var total = parseInt(subtotal) + parseInt(shipping_price);--}}

{{--        $(".total").text(total + '$');--}}
{{--        $(".total").val(total)--}}
{{--        $(".discount-value").text('0.0' + '$');--}}
{{--        $(".coupon-button").click(function (event) {--}}
{{--            event.preventDefault();--}}
{{--            $.ajax({--}}
{{--                method: 'post',--}}
{{--                url: $(".coupon-form").attr('action'),--}}
{{--                data: $(".coupon-form").serialize(),--}}
{{--                success: function (response) {--}}
{{--                    if ((response.value_type) == "percentage") {--}}
{{--                        $(".discount-amount").val(response.value);--}}
{{--                        $(".discount-type").val(response.value_type);--}}
{{--                        $(".discount-code").val(response.code);--}}
{{--                        var subtotal = $(".subtotals").attr('subtotals')--}}
{{--                        $(".subtotal").val(subtotal)--}}
{{--                        var total = $(".total").attr('total');--}}


{{--                        var subtotal = $(".subtotal").val();--}}
{{--                        // console.log(main);--}}
{{--                        // $(".subtotal").val('main')--}}
{{--                        var discont_amount = $(".discount-amount").val();--}}
{{--                        var decemal = (discont_amount / 100).toFixed(2);--}}
{{--                        var mult = subtotal * decemal;--}}
{{--                        var shipping_price = $(".shipping-price").attr('value');--}}
{{--                        var total = subtotal - mult + parseInt(shipping_price);--}}
{{--                        $(".discount-value").text('-' +parseInt(mult) +'$');--}}
{{--                        // $(".discount-amount").val(response.value);--}}
{{--                        $(".msg").text('Discount Applied in Percentage(%)')--}}
{{--                        $(".total").text(total + '$');--}}
{{--                        $(".total").val(total);--}}


{{--                        $(".place-code").html('<button class="btn text-white px-5 " type="button" style=" background-color: #202E71;padding: 2px 2px;font-size: 18px; border-radius: 3px; "><span class="badge-delete"></span><span class="close2">&times;</span></button>\n');--}}
{{--                        $(".badge-delete").text(response.code);--}}

{{--                        $(".close2").click(function () {--}}
{{--                            var total = parseInt(subtotal) + parseInt(shipping_price);--}}
{{--                            $(".total").text(total + '$');--}}
{{--                            $(".discount-value").text('0.0' + '$');--}}
{{--                            $(".discount-amount").val(response.value);--}}
{{--                            $(".total").val(total);--}}
{{--                            $(".msg").empty();--}}
{{--                        });--}}

{{--                        var closebtns = document.getElementsByClassName("close2");--}}
{{--                        var i;--}}

{{--                        for (i = 0; i < closebtns.length; i++) {--}}
{{--                            closebtns[i].addEventListener("click", function() {--}}
{{--                                this.parentElement.style.display = 'none';--}}
{{--                            });--}}
{{--                        }--}}
{{--                    } else if ((response.value_type) == "fixed_amount") {--}}
{{--                        // $("#total").text("Error");--}}
{{--                        $(".discount-amount").val(response.value);--}}
{{--                        $(".discount-type").val(response.value_type);--}}
{{--                        // $(".")--}}
{{--                        $(".discount-code").val(response.code);--}}
{{--                        var subtotal = $(".subtotals").attr('subtotals')--}}
{{--                        $(".subtotal").val(subtotal)--}}
{{--                        var total = $(".total").attr('total');--}}
{{--                        var subtotal = $(".subtotal").val();--}}
{{--                        var discont_amount = $(".discount-amount").val();--}}
{{--                        var shipping_price = $(".shipping-price").attr('value');--}}
{{--                        var total = subtotal - discont_amount + parseInt(shipping_price);--}}
{{--                        $(".total").text(total + '$');--}}
{{--                        $(".total").val(total)--}}
{{--                        $(".discount-value").text('-' +parseInt(response.value) +'$');--}}
{{--                        $(".msg").text('Discount Applied in Fixed Amount($)')--}}
{{--                        $(".place-code").html('<button class="btn text-white px-5 " type="button" style="background-color: #202E71;padding: 2px 2px;font-size: 18px; border-radius: 3px; "><span class="badge-delete"></span><span class="close2">&times;</span></button>\n');--}}
{{--                        $(".badge-delete").text(response.code);--}}
{{--                        $(".close2").click(function () {--}}
{{--                            var total = parseInt(subtotal) + parseInt(shipping_price);--}}
{{--                            $(".total").text(total + '$');--}}
{{--                            $(".discount-value").text('0.0' + '$');--}}
{{--                            $(".discount-amount").val(response.value);--}}
{{--                            $(".total").val(total);--}}
{{--                            $(".msg").empty();--}}
{{--                        });--}}
{{--                        var closebtns = document.getElementsByClassName("close2");--}}
{{--                        var i;--}}

{{--                        for (i = 0; i < closebtns.length; i++) {--}}
{{--                            closebtns[i].addEventListener("click", function() {--}}
{{--                                this.parentElement.style.display = 'none';--}}
{{--                            });--}}
{{--                        }--}}

{{--                    } else {--}}
{{--                        var main = $('#subtotal').attr('value');--}}
{{--                        $("#total").text(main);--}}
{{--                    }--}}
{{--                    console.log(response)--}}

{{--                },--}}
{{--                error: function (error) {--}}
{{--                    console.log(error)--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}



{{--        $('#number_tool').tooltip();--}}
{{--        $('button.cart_details').click(function (event) {--}}
{{--            $('.cart_info').slideToggle()--}}
{{--            $('.fa').toggleClass("fa-angle-up fa-angle-down")--}}
{{--        });--}}

{{--        function myFunction(x) {--}}
{{--            if (x.matches) {--}}
{{--                $('.cart_info').hide();--}}
{{--            } else {--}}
{{--                $('.cart_info').show();--}}
{{--            }--}}
{{--        }--}}

{{--        var pathname = window.location.pathname; // Returns path only (/path/example.html)--}}
{{--        var url = window.location.href;     // Returns full URL (https://example.com/path/example.html)--}}
{{--        var origin = window.location.origin;--}}
{{--        console.log(url)--}}
{{--        console.log(pathname)--}}
{{--        console.log(origin)--}}

{{--        var x = window.matchMedia("(max-width: 772px)")--}}
{{--        myFunction(x)--}}
{{--        x.addListener(myFunction)--}}
{{--    });--}}
{{--</script>--}}
{{--@endsection--}}
