@extends('adminpanel.layout.default') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-22">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
{{--              <li class="breadcrumb-item"><a href="{{URL::to('')}}/varients">View</a></li>--}}
              <li class="breadcrumb-item active">Varients's</li>
            </ol>
          </div><!-- /.col -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                @if(session()->has('delete-msg'))
                    <div class="alert alert-danger">
                        {{ session()->get('delete-msg') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Products's Varients Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive table-hover">
                            <thead>
                                <tr>
{{--                                    <th>Product Title</th>--}}
                                    <th>Product Id</th>
                                    <th class="text-center">Title</th>
                                    <th>Price</th>
                                    <th>Sku</th>
                                    <th>Barcode</th>
                                    <th>Taxable</th>
                                    <th class="text-center">Weight</th>
                                    <th>Weight Unit</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    <!-- <th>features</th> -->
{{--                                    <th class="text-center">Actions</th>--}}
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($varient_data as $varient)
                                    <tr>
{{--                                        <td>{{ \App\Http\Helpers\get_product_title($varient->product_id) }}</td>--}}
                                        <td>{{$varient->product_id}}</td>
                                        <td>{{$varient->title}}</td>
                                        <td>{{$varient->price}}</td>
                                        <td>{{$varient->sku}}</td>
                                        <td>{{$varient->barcode}}</td>
                                        <td>{{$varient->taxable}}</td>
                                        <td>{{$varient->weight}}</td>
                                        <td>{{$varient->weight_unit}}</td>
                                        <td><img class="img-fluid" src="{{$varient->image}}" height="30px" width="45px" /></td>
                                        <td>
                                            <div class="btn-group">

                                                <a class="btn btn-outline-primary"  href="{{URL::to('')}}/varient-edit/{{$varient->id}}" >
                                                    Edit</a>
                                                <a class="btn btn-outline-danger"  href="{{URL::to('')}}/varient-delete/{{$varient->id}}" >
                                                    Delete</a>
                                            </div>
                                        </td>
                                        {{--
 <td>--}}
{{--                                            <div class="btn-group">--}}
{{--                                                <a class="btn btn-info"  href="{{URL::to('')}}/varients/{{$varient->id}}" >--}}
{{--                                                    Variants--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@stop
