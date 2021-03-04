@extends('adminpanel.layout.default')
@section('content')
    <div class="content-wrapper">
        <!--Section: Block Content-->
        <section class="p-5">
            <!--Grid row-->
            <div class="row">
                <form action="{{Route('checkout_page')}}" method="post">
                @csrf
{{--                    @dd($varient_cart_data)--}}
                    @foreach($varient_cart_data as $varient)
                <!--Grid column-->
                    <div class="col-lg-10">
                    <!-- Card -->
                    <div class="mb-3">
                        <div class="pt-4 wish-list">
                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <img class="img-fluid w-100"
                                             src="{{$varient->image}}" alt="Sample">
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5>{{$varient->title}}</h5>
                                                <p>{{$varient->varient_id}}</p>
                                                <p class="mb-3 text-muted text-uppercase small">{{$varient->sku}}</p>
                                                <p class="mb-2 text-muted text-uppercase small">Color:{{$varient->option1}}</p>
                                                <p class="mb-3 text-muted text-uppercase small">Size:{{$varient->option2}}</p>
                                                <p class="mb-3 text-muted text-uppercase small">Barcode:{{$varient->barcode}}</p>
                                            </div>
                                            <div>
                                                <div class="def-number-input number-input safari_only mb-0 w-100">
                                                    <label>Quantity</label>
                                                    <input class="quantity" min="1" name="quantity[{{$varient->varient_id}}]" value="1" type="number">
                                                    <input class="quantity" min="1" hidden name="variant_id[]" value="{{$varient->shopify_variant_id}}" type="number">
 <input hidden="" name="price[]" value="{{$variant->variant}}">
                                                </div>
                                                <small id="passwordHelpBlock" class="form-text text-muted text-center">
                                                    (Note, 1 piece)
                                                </small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                                                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                                <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i
                                                        class="fas fa-heart mr-1"></i> Move to wish list </a>
                                            </div>
                                            <p class="mb-0"><span><strong id="summary">Price:{{$varient->price}}$</strong></span></p class="mb-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                        </div>
                    </div>
                    <!-- Card -->
                </div>
                @endforeach
                    <button type="submit" class="btn btn-primary btn-block">Create Order</button>
                </form>
{{--                <div class="col-lg-4">--}}
{{--                    <!-- Card -->--}}
{{--                    <div class="mb-3">--}}
{{--                        <div class="pt-4">--}}
{{--                            <h5 class="mb-3">The total amount of</h5>--}}
{{--                            <ul class="list-group list-group-flush">--}}
{{--                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">--}}
{{--                                    Temporary amount--}}
{{--                                    <span>$25.98</span>--}}
{{--                                </li>--}}
{{--                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">--}}
{{--                                    Shipping--}}
{{--                                    <span>Gratis</span>--}}
{{--                                </li>--}}
{{--                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">--}}
{{--                                    <div>--}}
{{--                                        <strong>The total amount of</strong>--}}
{{--                                        <strong>--}}
{{--                                            <p class="mb-0">(including VAT)</p>--}}
{{--                                        </strong>--}}
{{--                                    </div>--}}
{{--                                    <span><strong>$53.98</strong></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <button type="button" class="btn btn-primary btn-block">go to checkout</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Card -->--}}
{{--                    <!-- Card -->--}}
{{--                    <div class="mb-3">--}}
{{--                        <div class="pt-4">--}}
{{--                            <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample"--}}
{{--                               aria-expanded="false" aria-controls="collapseExample">--}}
{{--                                Add a discount code (optional)--}}
{{--                                <span><i class="fas fa-chevron-down pt-1"></i></span>--}}
{{--                            </a>--}}
{{--                            <div class="collapse" id="collapseExample">--}}
{{--                                <div class="mt-3">--}}
{{--                                    <div class="md-form md-outline mb-0">--}}
{{--                                        <input type="text" id="discount-code" class="form-control font-weight-light"--}}
{{--                                               placeholder="Enter discount code">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Card -->--}}
{{--                </div>--}}
                <!--Grid column-->
            </div>
            <!-- Grid row -->
        </section>
        <!--Section: Block Content-->
    </div>

@endsection
