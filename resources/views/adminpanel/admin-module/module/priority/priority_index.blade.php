@extends('adminpanel.admin-module.layout.default')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Cards -->
            <section class="comp-section comp-cards" id="comp_cards">

                <div class="row justify-content-center">

                    <div class=" col-12 col-md-6 col-lg-6  d-flex">
                        <div class=" card flex-fill">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title mb-0">Priorities</h5>
                                    <div id="create-priority-main" class="">
                                        <a href="#" class="btn add-btn sidebar_open openbtn create-priority-btn" style="    margin-bottom: 2px;" ><i
                                                class="fa fa-plus"></i>Priority</a>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($priority_data as $priority)
                                    <li class="list-group-item">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <a class="btn btn-info btn-sm mr-2 "  style="border:none;background-color:{{$priority->color}} ;width: 40px;height: 15px;"></a>
                                            <div>{{$priority->title}}</div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="dropdown dropdown-action profile-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">

                                                <div id="edit-priority-main" class="">
{{--                                                    <a href="#" class="btn add-btn sidebar_open openbtn create-project-btn" style="    margin-bottom: 5px;" >Create Project</a>--}}
                                                    <a class="dropdown-item edit-priority-btn" href="#" data-id="{{$priority->id}}" data-title="{{$priority->title}}" data-color="{{$priority->color}}" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                </div>
                                                <a class="dropdown-item" href="{{Route('priority-delete', $priority->id)}}" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


            </section>
            <!-- /Cards -->
        </div>
    </div>
{{--    create-priority --}}
    <div id="create-priority-rightsidebar" class="rightsidebar">

        <div class="card " >
            <div class="card-header">
                <div class="ml-3">
                    Create Priority
                </div>
                <div class="text-right float-right">
                    <a href="javascript:void(0)" class="closebtn create-priority-close-btn" >×</a>
                </div>
            </div>
            <div class="card-body" >
                <form action="{{Route('priority-save')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Color</label>
                                    <select class="form-control" name="color">
                                        <option value="yellow">Yellow</option>
                                        <option value="lightgrey">Light Grey</option>
                                        <option value="lightgreen">Light Green</option>
                                        <option value="red">Red</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-3">
                        <button type="submit" id="SaveCustomerData" class="btn btn-primary ">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    edit-priority--}}

    <div id="edit-priority-rightsidebar" class="rightsidebar">

        <div class="card " >
            <div class="card-header">
                <div class="ml-3">
                    Edit Priority
                </div>
                <div class="text-right float-right">
                    <a href="javascript:void(0)" class="closebtn edit-priority-close-btn" >×</a>
                </div>
            </div>
            <div class="card-body" >
                <form class="edit-priority-form" action="" method="post" >
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control edit-priority-title" name="title" value="" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Color</label>
                                    <select class="form-control edit-priority-color" name="color">
                                        <option value="yellow">Yellow</option>
                                        <option value="lightgrey">Light Grey</option>
                                        <option value="lightgreen">Light Green</option>
                                        <option value="red">Red</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-3">
                        <button type="submit" class="btn btn-primary ">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{--jquery cdn--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- ckeditor js--}}
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('body').find('.ckeditors').each(function() {
                CKEDITOR.replace($(this).attr('id'));
            });

            $('.create-priority-btn').on('click', function(){
                $("#create-priority-rightsidebar").css({"width":"30%", "height":"100%", "padding-bottom":"20px", "z-index":"1"}) ;
                $('#custom-body').css({'overflow':'hidden'});
            });

            $('.create-priority-close-btn').on('click', function (){

                $('#create-priority-rightsidebar').css({'width':'0'});
                $('#create-priority-main').css({'margin-right':'0'});
                $('#custom-body').css({'overflow':'initial'});
            });

            $('.edit-priority-btn').on('click', function(){

                let id = $(this).data('id');
                let title = $(this).data('title');
                let color = $(this).data('color');

                $("#edit-priority-rightsidebar").css({"width":"30%", "height":"100%", "padding-bottom":"20px", "z-index":"1"}) ;
                $('.edit-priority-title').val(title);
                $('.edit-priority-color').val(color);
                $('.edit-priority-form').attr('action', ' /priority-edit/ '+id);

                $('#custom-body').css({'overflow':'hidden'});
            });

            $('.edit-priority-close-btn').on('click', function (){

                $('#edit-priority-rightsidebar').css({'width':'0'});
                $('#edit-priority-main').css({'margin-right':'0'});
                $('#custom-body').css({'overflow':'initial'});
            });

        });

    </script>
@endsection
