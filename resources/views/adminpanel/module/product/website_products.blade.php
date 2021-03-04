@extends('adminpanel.layout.default')
@section('content')
    <div class="content-wrapper">
        <!--Section: Block Content-->
        <section>
            <!--Section: Block Content-->
            <div class="container py-5">
                <div>
                    @if(session()->has('success-msg'))
                        <div class="alert alert-success">
                            {{ session()->get('success-msg') }}
                        </div>
                    @endif
                </div>
                <div class="row text-center text-white mb-5"style="background-color: grey; border-radius: 7px;">
                    <div class="col-lg-9 mx-auto" >
                        <h1 class="display-4 " >Product List</h1>
                    </div>
                </div>
                @foreach($product_data as $key=>$product)
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            <!-- List group-->
                            <ul class="list-group shadow">
                                <!-- list group item-->
                                <li class="list-group-item">
                                    <!-- Custom content-->
                                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                        <div class="media-body order-2 order-lg-1">
                                            <h2 class="mt-0 text-center mb-2"><u>{{$product->title}}</u></h2>
                                            <h3>Description:</h3>
                                            <p class="font-italic text-muted mb-0 small">{!! html_entity_decode($product->body_html)!!}</p>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <br>
                                            </div>
                                            {{--
                                            <h6 class=" my-2">Product Type: <span>{{$product->product_type}}</span></h6>
                                            --}}
                                            <h3>Product Type:</h3>
                                            <p class=" my-2">{{$product->product_type}}</p>
                                            <h4>Tags:</h4>
                                            <p class=" my-2">{{$product->tags}}</p>

                                            <form action="{{Route('varient_cart')}} " method="post" >
                                                @csrf
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary variant-button" data-target="#product-modal-{{$key}}" data-toggle="modal"  >View Varient</button>
                                                    <button class="btn btn-success text-white "  type="submit">Add To Cart</button>
                                                </div>

                                                <div id="product-modal-{{$key}}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Varients</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>

                                                            <div class="modal-body">
                                                                <ul class="list-group shadow">

                                                                    @foreach($product->variants_relation as $variants)
{{--@dd($variants)--}}
                                                                        <div class="row">
                                                                            <div class="col-lg-12 mx-auto">
                                                                                <!-- List group-->
                                                                                <ul class="list-group shadow">
                                                                                    <!-- list group item-->
                                                                                    <li class="list-group-item">
                                                                                        <!-- Custom content-->
                                                                                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                                                                            <img src="{{$variants->image}}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                                                                                            <div class="media-body order-2 order-lg-1">
                                                                                                <h2 class="mt-0 text-center mb-2"><u>{{$variants->title}}</u></h2>
                                                                                                <div class="d-flex align-items-center justify-content-between mt-1">
                                                                                                    <br>
                                                                                                </div>
                                                                                                <h6 class=" my-2">Product Type: <span>{{$product->product_type}}</span></h6>
                                                                                                <h3>SKU:</h3>
                                                                                                <p class=" my-2">{{$variants->sku}}</p>
                                                                                                <h4>Price:</h4>
                                                                                                <p class=" my-2">{{$variants->price}}$</p>
                                                                                                <label>Select Varients:</label>
                                                                                                <input type="checkbox" value="{{$variants->shopify_variant_id}}" name="variant_array[]">
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><img src="{{$product->image}}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                                    </div> <!-- End -->
                                </li> <!-- End -->
                            </ul> <!-- End -->
                        </div>
                    </div>
                @endforeach

                <div class="mt-3">
                    {{ $product_data->links() }}
                </div>
            </div>

            <hr>
        </section>
        <!--Section: Block Content-->
    </div>
@endsection
