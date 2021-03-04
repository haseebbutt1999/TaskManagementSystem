@extends('adminpanel.layout.default') @section('content')
    <div class="content-wrapper">
        @dd()
{{--        <section class="content">--}}
{{--            @if(count($errors)>0)--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach($errors->all() as $error)--}}
{{--                            <li>{{$error}}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <div class="flash-message">--}}
{{--                @foreach (['danger'] as $msg)--}}
{{--                    @if(Session::has('alert-' . $msg))--}}
{{--                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div class="flash-message">--}}
{{--                @foreach (['success'] as $msg)--}}
{{--                    @if(Session::has('alert-' . $msg))--}}
{{--                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            <!-- Main content -->--}}
{{--            <section class="content">--}}
{{--                <div class="container-fluid">--}}
{{--                    <div class="row">--}}
{{--                        <!-- left column -->--}}
{{--                        <div class="col-md-10">--}}
{{--                            <!-- general form elements disabled -->--}}
{{--                            <div class="card card-primary">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h3 class="card-title">Add Order</h3>--}}
{{--                                </div>--}}
{{--                                <!-- /.card-header -->--}}
{{--                                <div class="card-body">--}}
{{--                                    <form role="form" action="{{URL::to('')}}/save-course" method="post" enctype="multipart/form-data">--}}
{{--                                        @csrf--}}
{{--                                        number--}}
{{--                                        token--}}
{{--                                        total_price--}}
{{--                                        subtotal_price--}}
{{--                                        total_tax--}}
{{--                                        currency--}}
{{--                                        financial_status--}}
{{--                                        total_discounts--}}
{{--                                        total_line_items_price--}}
{{--                                        name--}}
{{--                                        total_price_usd--}}
{{--                                        order_status_url--}}
{{--                                        source_name--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Course Name</label>--}}
{{--                                                    <input type="text" name="title" class="form-control" placeholder="Enter Course Name..." required="">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Course Trainer</label>--}}
{{--                                                    <input type="text" name="trainer" class="form-control" placeholder="Enter Trainer Name ..." required="">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <!-- textarea -->--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Course Language</label>--}}
{{--                                                    <input type="text" name="language" class="form-control" placeholder="Enter Course Language ..." required="">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Course Difficulty</label>--}}

{{--                                                    <select class="form-control" name="level" required="">--}}
{{--                                                        <option>Select type...</option>--}}
{{--                                                        <option>Beginner</option>--}}
{{--                                                        <option>intermediate</option>--}}
{{--                                                        <option>Advance</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Course Hour's</label>--}}
{{--                                                    <input type="text" name="hours" class="form-control" placeholder="Enter Course Hours ..." required="">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="exampleInputFile">Thumbnail</label>--}}
{{--                                                    <div class="input-group">--}}
{{--                                                        <div class="custom-file">--}}
{{--                                                            <input type="file" name="thumbnail" id="fileToUpload">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Select Course Category</label>--}}
{{--                                                    <select name="course_categorie" type="text" class="custom-select" required="">--}}
{{--                                                        <option value="">Select Category...</option>--}}
{{--                                                        @foreach($data['categorie'] as $key)--}}
{{--                                                            <option value="{{$key->id}}" >{{$key->name}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="exampleInputFile">Cover image</label>--}}
{{--                                                    <div class="input-group">--}}
{{--                                                        <div class="custom-file">--}}
{{--                                                            <input type="file" name="cover_image" id="fileToUpload">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-12">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Course Description</label>--}}
{{--                                                    <textarea class="form-control" name="description" rows="3" placeholder="Enter Description ..." required=""></textarea>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-12">--}}
{{--                                                <label>What You Learn</label>--}}
{{--                                                <textarea class="form-control ckeditors" name="learning_outcomes" id="summary-ckeditor"--}}
{{--                                                          required=""></textarea>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-2 mt-3">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <button type="submit" name="submit" class="btn btn-success form-control" >Save</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- input states -->--}}
{{--                        </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <!-- /.card-body -->--}}
{{--                </div>--}}
{{--                <!-- /.card -->--}}
{{--                <!-- general form elements disabled -->--}}
{{--    </div>--}}
    <!-- /.row -->
{{--    </div>--}}
    </div>
@stop
