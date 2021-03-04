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
                                    <h3 class="card-title">Varient Update</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" action="{{URL::to('')}}/varient-update" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$varient_data->id}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title" class="form-control" value="{{$varient_data->title}}" placeholder="Enter title..." required="required">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="number" name="price" class="form-control" value="{{$varient_data->price}}" placeholder="Enter Price ..." required="required">
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Sku</label>
                                                    <input type="text" name="sku" class="form-control" value="{{$varient_data->sku}}" placeholder="Enter Sku ..." required="required">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Barcode</label>
                                                    <input type="number" name="barcode" class="form-control" value="{{$varient_data->barcode}}" placeholder="Enter Barcode ..." required="required">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Taxable</label>
                                                    <input type="number" name="taxable" class="form-control" value="{{$varient_data->taxable}}" placeholder="Enter taxable ..." required="required">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Weight</label>
                                                    <input type="number" name="weight" class="form-control" value="{{$varient_data->weight}}" placeholder="Enter weight ..." required="required">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Weight Unit</label>
                                                    <input type="text" name="weight_unit" class="form-control" value="{{$varient_data->weight_unit}}" placeholder="Enter Weight-Unit ..." required="required">
                                                </div>
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
