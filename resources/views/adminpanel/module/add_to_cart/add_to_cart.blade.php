@extends('adminpanel.layout.default')
@section('content')
    <div class="content-wrapper">
        <!--Section: Block Content-->
        <section class="p-5">
            <!--Grid row-->
            <div class="row">

                <form action="{{Route('checkout_page')}}" method="post">
                @csrf
                {{--                    @dd($variant_cart_data)--}}
                @foreach($variant_data as $variant)
                    <!--Grid column-->
                        <div class="col-lg-10">
                            <!-- Card -->
                            <div class="mb-3">
                                <div class="pt-4 wish-list">
                                    <div class="row mb-4">
                                        <div class="col-md-5 col-lg-3 col-xl-3">
                                            <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                                <img class="img-fluid w-100"
                                                     src="{{$variant->image}}" alt="Sample">
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-9 col-xl-9">
                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <h5>{{$variant->title}}</h5>
                                                        <p>{{$variant->shopify_variant_id}}</p>
                                                        <p class="mb-3 text-muted text-uppercase small">{{$variant->sku}}</p>
                                                        <p class="mb-2 text-muted text-uppercase small">Color:{{$variant->option1}}</p>
                                                        <p class="mb-3 text-muted text-uppercase small">Size:{{$variant->option2}}</p>
                                                        <p class="mb-3 text-muted text-uppercase small">Barcode:{{$variant->barcode}}</p>
                                                    </div>
                                                    <div>
                                                        <div class="def-number-input number-input safari_only mb-0 w-100">
                                                            <label>Quantity</label>
                                                            <input class="quantity" min="1" name="quantity[{{$variant->shopify_variant_id}}]" value="1" type="number">
{{--                                                           <input name="price[]" value="{{price}}">--}}
                                                            <input class="quantity" min="1" hidden name="variant_array[]" value="{{$variant->shopify_variant_id}}" type="number">
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
                                                    <p class="mb-0"><span><strong id="summary">Price:{{$variant->price}}$</strong></span></p class="mb-0">
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

            <!--Grid column-->
            </div>
            <!-- Grid row -->
        </section>
        <!--Section: Block Content-->
    </div>

@endsection
