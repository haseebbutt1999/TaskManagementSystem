@extends('adminpanel.layout.default')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="flash-message">
                @if(session()->has('error-msg'))
                    <div class="alert alert-danger">
                        {{ session()->get('error-msg') }}
                    </div>
                @endif
                    @if(session()->has('success-msg'))
                        <div class="alert alert-success">
                            {{ session()->get('success-msg') }}
                        </div>
                    @endif
            </div>
            <div class="flash-message">
                @foreach (['success'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                    @endif
                @endforeach
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-10">
                            <!-- general form elements disabled -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Product Update</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" action="{{URL::to('')}}/product-update" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$product_data->id}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title" class="form-control" value="{{$product_data->title}}" placeholder="Enter Product Name..." required="required">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Product-Type</label>
                                                    <input type="text" name="product_type" class="form-control" value="{{$product_data->product_type}}" placeholder="Enter product type ..." required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Handle</label>
                                                    <input type="text" name="handle" class="form-control" value="{{$product_data->handle}}" placeholder="Enter handle ..." required="required">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="level" value="{{$product_data->status}}" required="required">
                                                        <option>Select type...</option>
                                                        <option>active</option>
                                                        <option>non active</option>
                                                        <option>null</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Vendor</label>
                                                    <input type="text" name="vendor" class="form-control" value="{{$product_data->vendor}}" placeholder="Enter tags ..." required="required">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Tags</label>
                                                    <input type="text" name="tags" class="form-control" value="{{$product_data->tags}}" placeholder="Enter tags ..." required="required">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Body Html</label>
                                                    <textarea class="form-control" name="body_html" rows="10" value="" placeholder="Enter Body Html ..." required="required">{!! html_entity_decode($product_data->body_html) !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 mt-2">
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-success form-control" >Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- input states -->
                        </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- general form elements disabled -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
    <script>
        // CKEDITOR.replace('question_body_text');
        $(document).ready(function() {
            // replace all textareas with ckeditors
            $('body').find('.ckeditors').each(function() {
                CKEDITOR.replace($(this).attr('id'));
            });
        });
    </script>
    <!-- /.content-wrapper -->
@stop
