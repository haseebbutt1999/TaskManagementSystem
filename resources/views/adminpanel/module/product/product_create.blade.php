@extends('adminpanel.layout.default')
@section('content')
    <div class="content-wrapper p-3">

        <section class="content ">
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
                @foreach (['danger'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                    @endif
                @endforeach
            </div>
            <div class="flash-message">
                @foreach (['success'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                    @endif
                @endforeach
            </div>
            <!-- Main content -->
            <section class="content ">
                <div class="container-fluid">
                    <div class="row ">
                        <!-- left column -->
                        <div class="col-md-10">
                            <!-- general form elements disabled -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Create Product</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" action="{{Route('product-store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Product Title</label>
                                                    <input type="text" name="title" class="form-control" placeholder="Enter Product Name..." required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Vendor</label>
                                                    <input type="text" name="vendor" class="form-control" placeholder="Vendor ..." required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Body HTML</label>
                                                    <textarea class="form-control ckeditors" name="learning_outcomes" id="summary-ckeditor"
                                                              required=""></textarea>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Handle</label>
                                                    <input type="text" name="handle" class="form-control" placeholder="handle ..." required="">
                                                </div>
                                            </div>
                                        <div class="row">

                                             <div class="col-md-3">
                                                 <div class="form-group ">
                                                     <label>Option1</label>
                                                     <input class="form-control" type="text" name="option1" >
                                                 </div>
                                             </div>

                                            <div class="col-sm-9">
                                                <!-- textarea -->

                                                <div class="form-group col-md-9">
                                                    <label>Option1 Values</label>
                                                    <input class="form-control" type="text" name="option1_values[]" >
                                                </div>
                                            </div>
                                            <script>
                                                tagger(document.querySelector('[name="option1_values"]'), {
                                                    allow_duplicates: false
                                                });

                                            </script>
                                        </div>
                                            <div class="col-sm-12">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Option2</label>
                                                    <input class="form-control" type="text" name="option2" >
                                                </div>
                                            </div>
                                            <script>
                                                tagger(document.querySelector('[name="option2"]'), {
                                                    allow_duplicates: false
                                                });

                                            </script>
                                            <div class="col-sm-12">

                                                <div class="form-group">
                                                    <label>Option3</label>
                                                    <input class="form-control" type="text" name="option3" >
                                                </div>
                                            </div>
                                            <script>
                                                tagger(document.querySelector('[name="option3"]'), {
                                                    allow_duplicates: false
                                                });

                                            </script>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Course Difficulty</label>
                                                <!--  <?php
                                                // find laravel dropdown
                                                // pass it array of difficulty levels from constants file ConstantHelper::listDifficultyLevels
                                                // import/use constantHelper file
                                                ?> -->
                                                    <select class="form-control" name="level" required="">
                                                        <option>Select type...</option>
                                                        <option>Beginner</option>
                                                        <option>intermediate</option>
                                                        <option>Advance</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Product Image</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="image" id="fileToUpload">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Course Hour's</label>
                                                    <input type="text" name="hours" class="form-control" placeholder="Enter Course Hours ..." required="">
                                                </div>
                                            </div>

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
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Cover image</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="cover_image" id="fileToUpload">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Course Description</label>
                                                    <textarea class="form-control" name="description" rows="3" placeholder="Enter Description ..." required=""></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label>What You Learn</label>
                                                <textarea class="form-control ckeditors" name="learning_outcomes" id="summary-ckeditor"
                                                          required=""></textarea>
                                            </div>
                                            <div class="col-sm-2 mt-5">
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-success form-control" >Save</button>
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
    </div>

    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
    <script>
        // CKEDITOR.replace('question_body_text');
        $(document).ready(function() {
            // replace all textareas with ckeditors
            $('body').find('.ckeditors').each(function() {
                CKEDITOR.replace($(this).attr('id'));
            });
        });
    </script>
@endsection
