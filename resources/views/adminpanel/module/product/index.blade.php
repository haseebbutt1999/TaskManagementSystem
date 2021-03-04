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
              <li class="breadcrumb-item"><a href="{{URL::to('')}}/products">View</a></li>
              <li class="breadcrumb-item active">All Product's</li>
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
                @if(session()->has('success-msg'))
                    <div class="alert alert-success">
                        {{ session()->get('success-msg') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Products's Details</h3>
{{--                        <button>Create Products</button>--}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Product Id</th>
                                    <th class="text-center">Body HTML</th>
                                    <th>Product Type</th>
                                    <th>Status</th>
                                    <th>Vendor</th>
                                    <th>Handle</th>
                                    <th class="text-center">Tags</th>
                                    <th>Image</th>
                                    <!-- <th>features</th> -->
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($product_data as $product)
                                    <tr>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->product_id}}</td>
                                        <td>{!! html_entity_decode($product->body_html) !!}</td>

                                        <td>{{$product->product_type}}</td>
                                        <td>Active</td>
                                        <td>{{$product->vendor}}</td>
                                        <td>{{$product->handle}}</td>
                                        <td>{{$product->tags}}</td>
                                        <td><img class="img-fluid" src="{{$product->image}}" height="30px" width="45px" /></td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-warning"  href="{{URL::to('')}}/varients/{{$product->product_id}}" >
                                                   Variants</a>
                                                <a class="btn btn-primary"  href="{{URL::to('')}}/product-edit/{{$product->id}}" >
                                                    Edit</a>
                                                <a class="btn btn-danger"  href="{{URL::to('')}}/product-delete/{{$product->id}}" >
                                                    Delete</a>

                                            </div>
                                        </td>
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
