<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('CheckOut/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/order_detail.css')}}">
    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
        .forcus_input
        {
            background-color: #FFC100 !important;
        }
    </style>
    <title>Checkout-Order</title>
</head>
<body>

{{--@extends('adminpanel.admin-module.layout.checkout_templating')--}}
{{--@section('content')--}}
<header class="site_header">
    <div class="wrapper container">
        <a href="">
            <img src="{{asset("CheckOut/images/logo.png")}}" class="img-fluid">
        </a>
    </div>
</header>
<section class="main_checkout">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-10 d-block m-auto left_section">
                <div class="main_breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="https://haseeb-butt.myshopify.com/cart">Cart</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cheackout</li>
                        </ol>
                    </nav>
                </div>
                <!-- main section is start -->
                <main>
                    <form id="testform" class="require-validation" action="{{route('order_create')}}"
                          data-cc-on-file="false"
                          data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" method="post">
                        @csrf
                        <div class="mb-3 main_contact_info">
                            <div class="upper_heading">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h2>Contact information</h2>
                                    </div>
                                    @if($login_customer_data === null)
                                        <div class="col-md-6 col-12 text-md-right text-left">
                                            <p>Already have an account? <span><a
                                                        href="https://{{$cart_check->shopify_store_id}}/account/login">log in</a></span>
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="main_form_email">
                                <div class="form-group input_form_parent">
                                    <input type="text" name="email" class="form-control input_field"
                                           @if($login_customer_data !== null)  value="{{$login_customer_data->email}}"
                                           @endif id="email"
                                           aria-describedby="emailHelp" required>
                                    <label class="floating-label" for="email">
                                        Enter email or phone number
                                    </label>
                                    {{--                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">--}}
                                    {{--                                        <input type="checkbox" name="" class="custom-control-input"--}}
                                    {{--                                               id="customControlInline">--}}
                                    {{--                                        <label class="custom-control-label" for="customControlInline">Remember my--}}
                                    {{--                                            preference</label>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="checkout_main_form mb-3 pt-4">
                                <div class="checkout_main_heaging">
                                    <h2>Shipping address</h2>
                                </div>
                                @if($login_customer_data !== null)
                                    @php
                                        $size = sizeof($login_customer_addresses)-1;
                                    @endphp
                                @endif
                                <div class="form-row mt-4">
                                    <div class="col-md-6 mt-3 col-12 input_form_parent">
                                        <input id="fname" name="fname" type="text" class="form-control"
                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->first_name}}"
                                               @endif required="">
                                        <label for="fname" class="floating-label">First name(optional)</label>
                                    </div>
                                    <div class="col-md-6 mt-3 col-12 input_form_parent">
                                        <input type="text" name="lname" class="form-control" id="lname"
                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->last_name}}"
                                               @endif required="">
                                        <label for="lname" class="floating-label">Last name</label>
                                    </div>
                                </div>
                                <div class="form-group my-3 input_form_parent">
                                    <input type="text" name="address" class="form-control" id="address"
                                           @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->address1}}"
                                           @endif required="">
                                    <label for="address" class="floating-label">Address</label>
                                </div>
                                <div class="form-group my-3 input_form_parent">
                                    <input type="text" name="apartment" class="form-control" id="Apartment"
                                           @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->address2}}"
                                        @endif >
                                    <label for="Apartment" class="floating-label">Apartment, suite, etc.
                                        (optional)</label>
                                </div>
                                <div class="form-group my-3 input_form_parent">
                                    <input type="text" name="country" class="form-control" id="country"
                                           @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->country}}"
                                           @endif required="">
                                    <label for="country" class="floating-label">Country</label>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-md-6 mt-3 col-12 input_form_parent">
                                        <input id="city" name="city" type="text" class="form-control"
                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->city}}"
                                               @endif required="">
                                        <label for="city" class="floating-label">City</label>
                                    </div>
                                    <div class="col-md-6 mt-3 col-12 input_form_parent">
                                        <input type="text" name="state" class="form-control"
                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->province}}"
                                               @endif id="state" required="">
                                        <label for="state" class="floating-label">state</label>
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-md-6 mt-3 col-12 input_form_parent">
                                        <input id="phone" name="phone" type="text" class="form-control"
                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->phone}}"
                                               @endif required="">
                                        <label for="phone" class="floating-label">Phone</label>
                                    </div>
                                    <div class="col-md-6 mt-3 col-12 input_form_parent">
                                        <input id="zip_code" name="zip_code" type="number"
                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->zip}}"
                                               @endif class="form-control"
                                               required="">
                                        <label for="zipcode" class="floating-label">Zip Code</label>
                                    </div>
                                </div>
                                {{--                                <div class="custom-control custom-checkbox my-1 mr-sm-2">--}}
                                {{--                                    <input type="checkbox" class="custom-control-input" id="save">--}}
                                {{--                                    <label class="custom-control-label" for="save">Remember my preference</label>--}}
                                {{--                                </div>--}}
                            </div>
                            <div class="checkout_main_form pt-4">
                                <div class="checkout_main_heaging">
                                    <h2>Billing address</h2>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-md-6 mt-3 col-12 input_form_parent">
                                        <input id="fname_billing" name="fname_billing" type="text" class="form-control"
                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->first_name}}"
                                               @endif required="">
                                        <label for="fname_billing" class="floating-label">First name(optional)</label>
                                    </div>
                                    <div class="col-md-6 mt-3 col-12 input_form_parent">
                                        <input type="text" name="lname_billing" class="form-control" id="lname_billing"
                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->last_name}}"
                                               @endif required="">
                                        <label for="lname_billing" class="floating-label">Last name</label>
                                    </div>
                                </div>
                                <div class="form-group my-3 input_form_parent">
                                    <input type="text" name="address_billing" class="form-control" id="address_billing"
                                           @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->address1}}"
                                           @endif required="">
                                    <label for="address_billing" class="floating-label">Address</label>
                                </div>
                                <div class="form-group my-3 input_form_parent">
                                    <input type="text" name="apartment_billing" class="form-control"
                                           id="Apartment_billing"
                                           @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->address2}}"
                                        @endif >
                                    <label for="Apartment_billing" class="floating-label">Apartment, suite, etc.
                                        (optional)</label>
                                </div>
                                <div class="form-group my-3 input_form_parent">
                                    <input type="text" name="country_billing" class="form-control" id="country_billing"
                                           @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->country}}"
                                           @endif  required="">
                                    <label for="country_billing" class="floating-label">Country</label>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-md-6 mt-3 col-12 input_form_parent">
                                        <input id="city_billing" name="city_billing" type="text" class="form-control"
                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->city}}"
                                               @endif required="">
                                        <label for="city_billing" class="floating-label">City</label>
                                    </div>
                                    <div class="col-md-6 mt-3 col-12 input_form_parent">
                                        <input type="text" name="state_billing" class="form-control" id="state_billing"
                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->province}}"
                                               @endif required="">
                                        <label for="state_billing" class="floating-label">state</label>
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-md-6 mt-3 col-12 input_form_parent">
                                        <input id="phone_billing" name="phone_billing" type="text" class="form-control"
                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->phone}}"
                                               @endif required="">
                                        <label for="phone_billing" class="floating-label">Phone</label>
                                    </div>
                                    <div class="col-md-6 mt-3 col-12 input_form_parent">
                                        <input id="zip_code_billing" name="zip_code_billing" type="number"
                                               @if($login_customer_data !== null) value="{{$login_customer_addresses[$size]->zip}}"
                                               @endif class="form-control" required="">
                                        <label for="zipcode_billing" class="floating-label">Zip Code</label>
                                    </div>
                                </div>
                                {{--                                <div class="custom-control custom-checkbox my-1 mr-sm-2">--}}
                                {{--                                    <input type="checkbox" class="custom-control-input" id="save_billing">--}}
                                {{--                                    <label class="custom-control-label" for="save_billing">Remember my--}}
                                {{--                                        preference</label>--}}
                                {{--                                </div>--}}
                                <div class="row mt-4 mb-4">
                                    <div class="col-md-12">


                                        <div class="panel panel-default credit-card-box">
                                            <div class="panel-heading display-table pb-2">
                                                <div class="row display-tr">
                                                    <h4 class="panel-title display-td">Payment Details</h4>
                                                    <div class="display-td payment-method-image-right">
                                                        <img class="img-responsive img-fluid pull-right" width="100%"
                                                             height="100%"
                                                             src="{{asset('assets/dist/img/payment_mehtods.png')}}">
                                                    </div>
                                                </div>
                                            </div>

{{--                                                <select onchange="paymentMethod()" class="browser-default payment-method custom-select" name="payment_method" >--}}
{{--                                                    <option selected>Select Paymet Method</option>--}}
{{--                                                    <option value="stripe">Stripe</option>--}}
{{--                                                    <option value="paypal">PayPal</option>--}}

{{--                                                </select>--}}
                                            <div class="row mt-4 mb-4">
                                                <div class="col-md-12">
                                                    <div >
{{--                                                        @if (Session::has('success'))--}}
{{--                                                            <div class="alert alert-success text-center">--}}
{{--                                                                <a href="#" class="close" data-dismiss="alert"--}}
{{--                                                                   aria-label="close">×</a>--}}
{{--                                                                <p>{{ Session::get('success') }}</p>--}}
{{--                                                            </div>--}}
{{--                                                        @endif--}}
                                                    </div>
                                                    <div class="" >
                                                        <div class="card ">
                                                            <div class="card-header bg-white" id="headingTwo">
                                                                <h5 class="mb-0">
                                                                    <div class="btn bg- collapsed" >
                                                                        <input oninput="stripePaymentMethod()" type="radio"   name="amount"  >
                                                                        <label class="pl-3"><h4>Stripe</h4></label>
                                                                    </div>
                                                                </h5>
                                                                <div class="stripe-payment-none stripe-payment-show" style="display: none;">
                                                                    <div class="panel-body d">
                                                                        <div class='form-row row'>
                                                                            <div style="border: none;"
                                                                                 class='col-md-12 form-group required'>
                                                                                <input  required hidden value="" name="payment_method"
                                                                                        class='form-control payment-method'
                                                                                        size='20'
                                                                                        type='text'>
                                                                            </div>
                                                                        </div>
                                                                        <div class='form-row row'>
                                                                            <div style="border: none;"
                                                                                 class='col-md-12 form-group card required input_form_parent'>
                                                                                <input  id="card_number"
                                                                                       class='form-control card-number'
                                                                                       size='20'
                                                                                       type='text'>
                                                                                <label class="control-label floating-label" for="card_number">Card
                                                                                    Number</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class='form-row row'>
                                                                            <div
                                                                                class='col-xs-12 col-md-12 form-group cvc required input_form_parent'>
                                                                                <input

                                                                                    class='form-control card-cvc'
                                                                                    size='4'
                                                                                    type='text' id="cvc">
                                                                                <label class="control-label floating-label"
                                                                                       for="cvc">CVC</label>
                                                                            </div>
                                                                            <div
                                                                                class='col-xs-12 col-md-6 form-group expiration required input_form_parent'>
                                                                                <input
                                                                                     id="exp_month"
                                                                                    class='form-control card-expiry-month'
                                                                                    size='2'
                                                                                    type='text'>
                                                                                <label class="control-label floating-label" for="exp_month">Expiration
                                                                                    Month</label>
                                                                            </div>
                                                                            <div
                                                                                class='col-xs-12 col-md-6 form-group expiration required input_form_parent'>
                                                                                <input class='form-control card-expiry-year ' id="exp_year"
                                                                                       size='4'
                                                                                        type='text'>
                                                                                <label class="control-label floating-label" for="exp_year">Expiration
                                                                                    Year</label>

                                                                            </div>
                                                                        </div>
                                                                        <div class="stripe-payment-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div >
                                                    <div class="control-form border p-3">
                                                        <div class=" btn collapsed">
                                                            <input  required hidden value="" name="payment_method"
                                                                    class='form-control payment-method'
                                                                    size='20'
                                                                    type='text'>
                                                            <input class="w3-input paypal-payment-method w3-border total" oninput="paypalPaymentMethod()"  name="amount" type="radio">
                                                            <label class="pl-3"><h4>Paypal</h4></label>
                                                        </div>
                                                    </div>
                                                    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
                                                    <script type="text/javascript">
                                                        function stripePaymentMethod(){
                                                            $(".stripe-payment-show").css("display", "inline")
                                                            $(".payment-method").val("stripe");

                                                        $(function () {
                                                            var $form = $(".require-validation");

                                                            $('form.require-validation').bind('submit', function (e) {
                                                                var $form = $(".require-validation"),
                                                                    inputSelector = ['input[type=email]', 'input[type=password]',
                                                                        'input[type=text]', 'input[type=file]',
                                                                        'textarea'].join(', '),
                                                                    $inputs = $form.find('.required').find(inputSelector),
                                                                    $errorMessage = $form.find('div.error'),
                                                                    valid = true;
                                                                $errorMessage.addClass('hide');

                                                                $('.has-error').removeClass('has-error');
                                                                $inputs.each(function (i, el) {
                                                                    var $input = $(el);
                                                                    if ($input.val() === '') {
                                                                        $input.parent().addClass('has-error');
                                                                        $errorMessage.removeClass('hide');
                                                                        e.preventDefault();
                                                                    }
                                                                });

                                                                if (!$form.data('cc-on-file')) {
                                                                    e.preventDefault();
                                                                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                                                                    Stripe.createToken({
                                                                        number: $('.card-number').val(),
                                                                        cvc: $('.card-cvc').val(),
                                                                        exp_month: $('.card-expiry-month').val(),
                                                                        exp_year: $('.card-expiry-year').val()
                                                                    }, stripeResponseHandler);
                                                                }

                                                            });

                                                            function stripeResponseHandler(status, response) {
                                                                if (response.error) {
                                                                    $('.stripe-payment-error').html('<div class=\'form-row row error\'>\n' +
                                                                        '                                                        <div class=\'col-md-12 error form-group hide\'>\n' +
                                                                        '                                                            <div class=\'alert-danger hide alert\'>\n' +
                                                                        '                                                            </div>\n' +
                                                                        '                                                        </div>\n' +
                                                                        '                                                    </div>');
                                                                    $('.error')
                                                                        .removeClass('hide')
                                                                        .find('.alert')
                                                                        .text(response.error.message);
                                                                } else {
                                                                    /* token contains id, last4, and card type */
                                                                    var token = response['id'];

                                                                    $form.find('input[type=text]').empty();
                                                                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                                                                    $form.get(0).submit();
                                                                }
                                                            }

                                                        });

                                                        }
                                                        function paypalPaymentMethod(){
                                                            $(".stripe-payment-none").css("display", "none");
                                                            $(".payment-method").val("paypal");

                                                        }
                                                        $(document).ready(function (){

                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="payment-method-display">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                    </div>
                                </div>
                                <div class="mt-4 mb-5">
                                    <div class="row">
                                        <div class="col-6 m-auto">
                                            <a href="https://haseeb-butt.myshopify.com/cart"> < Return to cart </a>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button class=" btn btn-lg btn-mycolor py-md-3 py-1" type="submit">
                                                Checkout Order
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <p>All rights reserved BunnyToys.pk</p>
                            </div>
                        </div>
                        <input type="text" name="total" hidden class="total" value="">
                        <input type="text" name="shipping_price" hidden class="shipping-price" value="{{$shipping}}">
                        <input type="text" name="discount_code" hidden class="discount-code" value="">
                        <input type="text" name="discount_amount" hidden class="discount-amount" value="">
                        <input type="text" name="discount_type" hidden class="discount-type" value="">
                        <input type="text" name="subtotal" hidden class="subtotal" value="">
                        <input hidden type="text" name="token" value="{{$token}}" class="token">
                    </form>
                    <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="/payment/add-funds/paypal">
                        {{ csrf_field() }}
                        <input class="w3-input form-control w3-border total"  value="" hidden name="amount" type="text">
                        <button class="w3-btn btn btn-primary w3-blue">Pay with PayPal</button></p>
                    </form>
                </main>
            </div>
            <div class="col-md-5 col-10 d-block m-md-0 m-auto my_bg_theme ">
                <button class="w-100 btn d-md-none d-block cart_details">
                    <div class="row">
                        <div class="col-6 text-left p-0 m-0">
                            <span style="color: #ffbd00; font-weight:bold">Show Order Summery <i
                                    class="fa fa-angle-down"></i></span>
                        </div>

                    </div>
                </button>
                <div class="cart_info">
                    @foreach($data as $key=>$product)
                        <div class="row pt-4">
                            <div class="col-9">
                                <div class="img_main_parent d-flex">
                                    <div class="img_product" style="max-width: 80px">
                                        <img src="{{$product->image}}" class="img-fluid image_position">
                                        <span class="quantity">{{$product->quantity}}</span>
                                    </div>
                                    <div class="about_product">
                                        <span class="product-title font-weight-bold">{{$product->title}}</span>
                                        <div class="variants">
                                            <ul>
                                                <li>{{$product->sku}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 product_price text-right">
                                <span class="font-weight-bold">{{($product->quantity)*($product->price/100).'$'}}</span>
                            </div>
                        </div>
                        <hr/>
                    @endforeach
                    <div class=" mb-2">
                        <div class="">
                            <form method="post" class="coupon-form" action="{{Route('discount_codes')}}">
                                @csrf
                                <div class="form-group">

                                    <div style="display: flex;" class="input_form_parent">
                                        <input type="text" id="discount" oninput="myActive()" class="form-control coupon "  style="width: 75%;" name="discount_code">
                                        <label class="floating-label control-label" for="discount">Discount Code?</label>
                                        <span class="input-group-append" style="margin-left: 14px;">
                                     <button type="button"
                                             class="btn  btn-apply coupon coupon-button btn4 ">Apply</button>
                                     </span>
                                    </div>
                                    <br>
                                    <div class="place-code">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <hr/>
                    <div class="row pb-1">
                        <div class="col-6">
                            <p style="font-size: 20px;" class="">
                                Sub Total
                            </p>
                            <div class="text_detail">
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            @php
                                $subtotal_sum = 0;
                                foreach ($data as $product){
                                $subtotal_sum = $subtotal_sum + ( ($product->quantity) * ($product->price/100));
                                }
                            @endphp
                            <h3 class="subtotals" subtotals="{{$subtotal_sum}}">${{$subtotal_sum}}</h3>
                        </div>
                        <div class="col-6">
                            <p style="font-size: 20px;" class="">
                                Shipping Price
                            </p>
                            <div class="text_detail">
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <h3 class="shipping-price" value="{{$shipping}}">${{$shipping}}</h3>
                        </div>
                        <div class="col-6">
                            <p style="font-size: 20px;;" class="">
                                Discount
                            </p>
                            <div class="text_detail">
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <h3 class="discount-value"></h3>
                            <span style="color: #808080;font-size: 87%" class="msg"><i></i></span>
                        </div>
                    </div>
                    <hr/>
                    <div class="row pb-5">
                        <div class="col-6">
                            <p style="font-size: 30px;" class="">
                                Total
                            </p>
                            <div class="text_detail">
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <h1 class="total" total="{{$subtotal_sum+$shipping}}"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script type="text/javascript">
    function myActive(){
        var active_input = document.getElementById("discount").value;
        if(active_input.length > 0){
            $(".btn4").addClass('forcus_input');

        }else{
            $(".btn4").removeClass('forcus_input');
        }
    }
    $(document).ready(function () {

        var subtotal = $(".subtotals").attr('subtotals')
        var shipping_price = $(".shipping-price").attr('value');
        $(".subtotal").val(subtotal)
        var total = parseInt(subtotal) + parseInt(shipping_price);

        $(".total").text('$' + total);
        $(".total").val(total)
        $(".discount-value").text('$' + '0.0');
        $(".coupon-button").click(function (event) {
            event.preventDefault();
            $(this).html('<i class="fa fa-spinner fa-spin" style="    font-size: 180%; padding: 0px 6px;"></i>');
            var element=this;
            $.ajax({
                method: 'post',
                url: $(".coupon-form").attr('action'),
                data: $(".coupon-form").serialize(),
                success: function (response) {
                    $(element).html("<span>Apply</span>")
                    if ((response.value_type) == "percentage") {
                        $(".discount-amount").val(response.value);
                        $(".discount-type").val(response.value_type);
                        $(".discount-code").val(response.code);
                        var subtotal = $(".subtotals").attr('subtotals')
                        $(".subtotal").val(subtotal)
                        var total = $(".total").attr('total');


                        var subtotal = $(".subtotal").val();
                        // console.log(main);
                        // $(".subtotal").val('main')
                        var discont_amount = $(".discount-amount").val();
                        var decemal = (discont_amount / 100).toFixed(2);
                        var mult = subtotal * decemal;
                        var shipping_price = $(".shipping-price").attr('value');
                        var total = subtotal - mult + parseInt(shipping_price);
                        $(".discount-value").text('-' + '$' + parseInt(mult));
                        // $(".discount-amount").val(response.value);
                        $(".msg").text('Discount Applied in Percentage(%)')
                        $(".total").text('$' + total);
                        $(".total").val(total);


                        $(".place-code").html('<button class="btn   pl-4 pr-5 " type="button" style=" padding: 10px 0px;background: #ffbd00 !important; "><svg id="tags-filled" style="/* color: #717171; */font-size: 0px;    margin-right: 5px;height: 22px;width: 22px;/* color: lightgreen; */"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M17.78 3.09C17.45 2.443 16.778 2 16 2h-5.165c-.535 0-1.046.214-1.422.593l-6.82 6.89c0 .002 0 .003-.002.003-.245.253-.413.554-.5.874L.738 8.055c-.56-.953-.24-2.178.712-2.737L9.823.425C10.284.155 10.834.08 11.35.22l4.99 1.337c.755.203 1.293.814 1.44 1.533z" fill-opacity=".55"></path><path d="M10.835 2H16c1.105 0 2 .895 2 2v5.172c0 .53-.21 1.04-.586 1.414l-6.818 6.818c-.777.778-2.036.782-2.82.01l-5.166-5.1c-.786-.775-.794-2.04-.02-2.828.002 0 .003 0 .003-.002l6.82-6.89C9.79 2.214 10.3 2 10.835 2zM13.5 8c.828 0 1.5-.672 1.5-1.5S14.328 5 13.5 5 12 5.672 12 6.5 12.672 8 13.5 8z"></path></svg></svg><span class="badge-delete"></span><span class="close2">&times;</span></button>\n');
                        $(".badge-delete").text(response.code);

                        $(".close2").click(function () {
                            var total = parseInt(subtotal) + parseInt(shipping_price);
                            $(".total").text('$' + total);
                            $(".discount-value").text('$' + '0.0');
                            $(".discount-amount").val(response.value);
                            $(".total").val(total);
                            $(".msg").empty();
                        });

                        var closebtns = document.getElementsByClassName("close2");
                        var i;

                        for (i = 0; i < closebtns.length; i++) {
                            closebtns[i].addEventListener("click", function () {
                                this.parentElement.style.display = 'none';
                            });
                        }
                    } else if ((response.value_type) == "fixed_amount") {
                        // $("#total").text("Error");
                        $(".discount-amount").val(response.value);
                        $(".discount-type").val(response.value_type);
                        // $(".")
                        $(".discount-code").val(response.code);
                        var subtotal = $(".subtotals").attr('subtotals')
                        $(".subtotal").val(subtotal)
                        var total = $(".total").attr('total');
                        var subtotal = $(".subtotal").val();
                        var discont_amount = $(".discount-amount").val();
                        var shipping_price = $(".shipping-price").attr('value');
                        var total = subtotal - discont_amount + parseInt(shipping_price);
                        $(".total").text('$' + total);
                        $(".total").val(total)
                        $(".discount-value").text('-' + '$' + parseInt(response.value));
                        $(".msg").text('Discount Applied in Fixed Amount($)')
                        $(".place-code").html('<button class="btn  pl-4 pr-5" type="button" style="    padding: 10px 0px;background: #ffbd00 !important; "><svg id="tags-filled" style="/* color: #717171; */font-size: 0px;   margin-right: 5px;height: 22px;width: 22px;/* color: lightgreen; */"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M17.78 3.09C17.45 2.443 16.778 2 16 2h-5.165c-.535 0-1.046.214-1.422.593l-6.82 6.89c0 .002 0 .003-.002.003-.245.253-.413.554-.5.874L.738 8.055c-.56-.953-.24-2.178.712-2.737L9.823.425C10.284.155 10.834.08 11.35.22l4.99 1.337c.755.203 1.293.814 1.44 1.533z" fill-opacity=".55"></path><path d="M10.835 2H16c1.105 0 2 .895 2 2v5.172c0 .53-.21 1.04-.586 1.414l-6.818 6.818c-.777.778-2.036.782-2.82.01l-5.166-5.1c-.786-.775-.794-2.04-.02-2.828.002 0 .003 0 .003-.002l6.82-6.89C9.79 2.214 10.3 2 10.835 2zM13.5 8c.828 0 1.5-.672 1.5-1.5S14.328 5 13.5 5 12 5.672 12 6.5 12.672 8 13.5 8z"></path></svg></svg><span class="badge-delete"></span><span class="close2">&times;</span></button>\n');
                        $(".badge-delete").text(response.code);
                        $(".close2").click(function () {
                            var total = parseInt(subtotal) + parseInt(shipping_price);
                            $(".total").text('$' + total);
                            $(".discount-value").text('$' + '0.0');
                            $(".discount-amount").val(response.value);
                            $(".total").val(total);
                            $(".msg").empty();
                        });
                        var closebtns = document.getElementsByClassName("close2");
                        var i;

                        for (i = 0; i < closebtns.length; i++) {
                            closebtns[i].addEventListener("click", function () {
                                this.parentElement.style.display = 'none';
                            });
                        }

                    } else {
                        var main = $('#subtotal').attr('value');
                        $("#total").text(main);
                    }
                    console.log(response)

                },
                error: function (error) {
                    console.log(error)
                    $(element).html("<span>Failed</span>")
                }
            });
        });


        $('#number_tool').tooltip();
        $('button.cart_details').click(function (event) {
            $('.cart_info').slideToggle()
            $('.fa').toggleClass("fa-angle-up fa-angle-down")
        });

        function myFunction(x) {
            if (x.matches) {
                $('.cart_info').hide();
            } else {
                $('.cart_info').show();
            }
        }

        var pathname = window.location.pathname; // Returns path only (/path/example.html)
        var url = window.location.href;     // Returns full URL (https://example.com/path/example.html)
        var origin = window.location.origin;
        console.log(url)
        console.log(pathname)
        console.log(origin)

        var x = window.matchMedia("(max-width: 772px)")
        myFunction(x)
        x.addListener(myFunction)
    });
</script>
</body>
{{--Stripe script--}}


{{--@endsection--}}
