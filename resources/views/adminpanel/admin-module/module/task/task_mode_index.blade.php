@extends('adminpanel.admin-module.layout.default')
@section('content')


{{--     Main Container --}}


    <div class="page-wrapper" style="min-height: 307px;">
        <div class="content container-fluid">
{{--            <!-- Page Header -->--}}
{{--            <div class="page-header">--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <h3 class="page-title">Data Tables</h3>--}}
{{--                        <ul class="breadcrumb">--}}
{{--                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>--}}
{{--                            <li class="breadcrumb-item active">Data Tables</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /Page Header -->--}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-0">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Task Mode</h4>
{{--                            <a type="button"  class=" btn btn-primary text-white" data-toggle="modal" data-target="#AddTaskModeModal">--}}
{{--                                Add Task Mode--}}
{{--                            </a>--}}
{{--                            <a href="#" class="btn add-btn sidebar_open" data-toggle="modal" data-target="#AddTaskModeModal"><i--}}
{{--                                    class="fa fa-plus"></i>Create Task Mode</a> --}}
                            <div id="main">
                                <a href="#" class="btn add-btn sidebar_open openbtn" onclick="openCreateTaskSideNav()"><i
                                    class="fa fa-plus"></i>Create Task Mode</a>
                            </div>

                        </div>
                        <div class="card-body">
                            @if(session()->has('message.level'))
                                <div class="alert alert-{{ session('message.level') }}">
                                    {!! session('message.content') !!}
                                </div>
                            @endif

                            <div class="custom-responsive">
                                <div class="custom-table2">
                                    <div class="custom-row">
                                        <div class="custom-cell">
                                            Title
                                        </div>
                                        <div class="custom-cell">
                                            Description
                                        </div>
                                        <div class="custom-cell2">
                                            Action
                                        </div>
                                    </div>
                                    @foreach($taskmode_data as $key => $taskmode)
                                        <div class="custom-row">
                                            <div class="custom-cell">
                                                <a style="color: blue;cursor: pointer;" data-toggle="collapse" data-target="#demo{{$key}}"> {{$taskmode->title}}</a>
                                            </div>
                                            <div class="custom-cell">
                                                @if($taskmode->description != null){{$taskmode->description}}@endif
                                            </div>
                                            <div class="custom-cell2">
                                                <div class="btn-group">

                                                    <div id="editSubTaskMain">
                                                        <a href="#" class="btn btn-sm btn-primary js-tooltip-enabled open-edit-btn"  data-id="{{$taskmode->id}}" data-title="{{ $taskmode->title }}"
                                                           data-description="{{ $taskmode->description }}" ><i class="text-white fa fa-pencil"></i></a>
                                                    </div>

                                                    <a href="{{route('taskmode-delete', $taskmode->id)}}"  class="btn btn-sm btn-danger js-tooltip-enabled"   data-original-title="Delete">
                                                        <i class=" fa fa-fw fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="demo{{$key}}" class="collapse custom-accordian">
                                                <div class="custom-table">

                                                    @foreach($taskmode->subtaskmodes as $key2 => $subtaskmode)
                                                        <div class="custom-row2 ">
                                                            <div class="custom-cell">

                                                                {{$subtaskmode->title}}

                                                            </div>
                                                            <div class="custom-cell">
    {{--                                                            @foreach($taskmode->subtaskmodes as $subtaskmode)--}}
                                                                    {{$subtaskmode->description}}
    {{--                                                            @endforeach--}}
                                                            </div>
                                                            <div class="custom-cell2">
    {{--                                                            @foreach($taskmode->subtaskmodes as $key2 => $subtaskmode)--}}

                                                                <div class="btn-group">


{{--                                                                    <a  href="{{route('taskmode-edit', $subtaskmode->id)}}" class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="modal" data-target="#SubtaskmodeEditModal{{$key+$key2}}"   data-original-title="Edit">--}}
{{--                                                                        <i class="text-white  fa fa-pencil"></i>--}}
{{--                                                                    </a>--}}

                                                                    <div id="editSubTaskMain">
                                                                        <a href="#" class="btn btn-sm btn-primary js-tooltip-enabled open-subtask-edit-btn" data-parent_task_id="{{$subtaskmode->taskmode->id}}" data-id="{{$subtaskmode->id}}" data-title="{{ $subtaskmode->title }}"
                                                                           data-description="{{ $subtaskmode->description }}" ><i class="text-white fa fa-pencil"></i></a>
                                                                    </div>

                                                                    {{--                                                        subTaskmode Edit Modal--}}
                                                                    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="SubtaskmodeEditModal{{$key+$key2}}" role="dialog" tabindex="-1">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Rule</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                {{--                                                                --}}
                                                                                <form  class="" action="{{route('subtaskmode-edit', $subtaskmode->id)}}" method="post"  >
                                                                                    @csrf
                                                                                     <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <label class="text-left" style="margin-right: 28pc;" for="#">Title</label>
                                                                                            <input  value="{{$subtaskmode->title}}" name="title" type="text"  class="form-control title">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="text-left" style="float: left;" for="#">Task Mode</label>
                                                                                            <select class="form-control " name="taskmode_id" >
                                                                                                <option value="" selected>Select Task Mode</option>
                                                                                                @foreach($taskmode_data as $taskmode)
                                                                                                    <option  value="{{$taskmode->id}}"
                                                                                                             @if(isset($subtaskmode->taskmode->title) && $taskmode->title ===  $subtaskmode->taskmode->title ) selected @endif >
                                                                                                        {{$taskmode->title}}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="text-left" style="margin-right: 28pc;" for="#">Name</label>
                                                                                            <textarea   name="description" type="text"  class="form-control description">{{$subtaskmode->description}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="submit"  class=" btn btn-primary ">Save</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{--                                                        Taskmode Edit Modal End--}}

                                                                    {{--                                                    --}}
                                                                    <a href="{{route('subtaskmode-delete', $subtaskmode->id)}}"  class="btn btn-sm btn-danger js-tooltip-enabled"   data-original-title="Delete">
                                                                        <i class="fa fa-fw fa-times"></i>
                                                                    </a>
                                                                </div>
    {{--                                                            @endforeach--}}
                                                            </div>
                                                    </div>

                                                    @endforeach
                                                    <div class="pl-5 pr-5 mb-3 text-right">
{{--                                                        <a type="button"  class=" btn btn-primary mt-2 btn-sm text-white" data-toggle="modal" data-target="#AddSubTaskModeModal{{$key}}">--}}
{{--                                                            Add Sub-Task--}}
{{--                                                        </a>--}}
                                                        <div id="add-sub-task-main">
                                                            <a type="button"  class="btn btn-primary mt-2 btn-sm text-white add-sub-task" data-parent_taskmode_id="{{$taskmode->id}}" ><i
                                                                class="fa fa-plus"></i> Sub-Task Mode</a>
                                                        </div>
                                                    </div>

{{--                                                   sub-task mode Modal--}}
                                                    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="AddSubTaskModeModal{{$key}}" role="dialog" tabindex="-1">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Add Sub-Task Mode</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form  class="subtaskmode" action="{{Route('subtaskmode-save')}}" method="post" >
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="#" style="float: left;">Title</label>
                                                                            <input  name="title" type="text" required class="form-control title">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="text-left" style="float: left;" for="#">Task Mode</label>
                                                                            <select class="form-control " name="taskmode_id" >
                                                                                <option value="" selected>Select Task Mode</option>
                                                                                @foreach($taskmode_data as $taskmode)
                                                                                    <option  value="{{$taskmode->id}}"
                                                                                             @if(isset($subtaskmode->taskmode->title) && $taskmode->title ===  $subtaskmode->taskmode->title ) selected @endif >
                                                                                        {{$taskmode->title}}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="#" style="float: left;">Description</label>
                                                                            <textarea class="form-control description" name="description" cols="10" required rows="7"> </textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" id="SaveCustomerData" class="btn btn-primary ">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
{{--                                                  sub-task mode  end model --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
{{--            add task --}}
            <div id="mySidebar" class="rightsidebar">

                <div class="card ">
                    <div class="card-header">
                        <div class="ml-3">
                            Add Task Mode
                        </div>
                        <div class="text-right float-right">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                        </div>
                    </div>
                    <div class="card-body" style="height: 100vh;">
                        <form  class="taskmode" action="{{Route('taskmode-save')}}" method="post" >
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="#" style="float: left;">Title</label>
                                    <input  name="title" type="text" required class="form-control title">
                                </div>
                                <div class="form-group">
                                    <label for="#" style="float: left;">Description</label>
                                    <textarea class="form-control description" name="description" cols="10" required rows="7"> </textarea>
                                </div>
                            </div>
                            <div class="ml-3">
                                <button type="submit" id="SaveCustomerData" class="btn btn-primary ">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
{{--            edit task--}}
            <div id="editTaskSidebar" class="rightsidebar">

                <div class="card ">
                    <div class="card-header">
                        <div class="ml-3">
                            Edit Task Mode
                        </div>
                        <div class="text-right float-right">
                            <a href="javascript:void(0)" class="closebtn edit-close-btn" onclick="closeNav()">×</a>
                        </div>
                    </div>
                    <div class="card-body" style="height: 100vh;">
                        <form  class="taskmode task-edit-id" action="" method="post"  >
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="#" style="float: left;">Title</label>
                                    <input  value="" name="title" type="text"  class="form-control task-edit-title">
                                </div>
                                <div class="form-group">
                                    <label for="#" style="float: left;">Description</label>
                                    <textarea   name="description" type="text"  class="form-control task-edit-description"></textarea>
                                </div>
                            </div>
                            <div class="ml-3">
                                <button type="submit" id="SaveCustomerData" class="btn btn-primary ">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
{{--    add sub task--}}
            <div  class="rightsidebar createSubTaskBar">

                <div class="card ">
                    <div class="card-header">
                        <div class="ml-3">
                            Add Sub-Task Mode
                        </div>
                        <div class="text-right float-right">
                            <a href="javascript:void(0)" class="closebtn close-sub-task subtask-create-close-btn" >×</a>
                        </div>
                    </div>
                    <div class="card-body" style="height: 100vh;">
                        <form  class="taskmode subtask-create-id" action="" method="post" >
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="#" style="float: left;">Title</label>
                                    <input  name="title" type="text" required class="form-control title">
                                </div>
                                <div class="form-group">
                                    <label class="text-left" style="float: left;" for="#">Task Mode</label>
                                    <select class="form-control taskmode_id_select" name="taskmode_id" >
                                        <option value="" selected>Select Task Mode</option>
                                        @foreach($taskmode_data as $taskmode)
                                            <option  value="{{$taskmode->id}}">
                                                     {{$taskmode->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="#" style="float: left;">Description</label>
                                    <textarea class="form-control description" name="description" cols="10" required rows="7"> </textarea>
                                </div>
                            </div>
                            <div class="ml-3">
                                <button type="submit" id="SaveCustomerData" class="btn btn-primary ">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
{{--edit subtask--}}
            <div id="editSubTaskSidebar" class="rightsidebar">

                <div class="card ">
                    <div class="card-header">
                        <div class="ml-3">
                            Edit Sub-Task Mode
                        </div>
                        <div class="text-right float-right">
                            <a href="javascript:void(0)" class="closebtn subtask-edit-close-btn" >×</a>
                        </div>
                    </div>
                    <div class="card-body" style="height: 100vh;">
                        <form  class="taskmode task-edit-id" action="" method="post"  >
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="#" style="float: left;">Title</label>
                                    <input  value="" name="title" type="text"  class="form-control subtask-edit-title">
                                </div>
                                <div class="form-group">
                                    <label class="text-left" style="float: left;" for="#">Task Mode</label>
                                    <select class="form-control parent-taskmode" name="taskmode_id" >
                                        <option value="" selected>Select Task Mode</option>
                                        @foreach($taskmode_data as $taskmode)
                                            <option class="option" selected=""  value="{{$taskmode->id}}">
                                                     {{$taskmode->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="#" style="float: left;">Description</label>
                                    <textarea   name="description" type="text"  class="form-control subtask-edit-description"></textarea>
                                </div>
                            </div>
                            <div class="ml-3">
                                <button type="submit" id="SaveCustomerData" class="btn btn-primary ">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

{{--    test--}}

        {{--jquery cdn--}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function() {

                $('.open-edit-btn').on('click', function () {
                    // console.log(234);
                    let title = $(this).data('title');
                    let description = $(this).data('description');
                    let id = $(this).data('id');
                    console.log(title + description);
                    $("#editTaskSidebar").css({"width":"30%"}) ;
                    $('.task-edit-title').val(title);
                    $('.task-edit-description').val(description);
                    $('.task-edit-id').attr('action', ' /taskmode-edit/ '+id);

                });

                $('.open-subtask-edit-btn').on('click', function () {
                    // console.log(234);
                    let title = $(this).data('title');
                    let description = $(this).data('description');
                    let parent_task_id = $(this).data('parent_task_id');
                    let id = $(this).data('id');
                    console.log(title + description);
                    $("#editSubTaskSidebar").css({"width":"30%"}) ;
                    $('.subtask-edit-title').val(title);
                    $('.subtask-edit-description').val(description);
                    console.log(parent_task_id);
                    var check = $('.parent-taskmode ').val(parent_task_id);
                    console.log(check)

                    $('.task-edit-id').attr('action', ' /subtaskmode-edit/ '+id);

                });


                $('.add-sub-task').on('click', function () {

                    // let parent_taskmode_id = $(this).data('parent_taskmode_id');
                    // console.log(parent_taskmode_id)

                    $(".createSubTaskBar").css({"width":"30%"}) ;
                    // var check = $('.taskmode_id_select ').val(parent_taskmode_id);
                    $('.subtask-create-id').attr('action', '/subtaskmode-save')

                });


                $('.subtask-create-close-btn').on('click', function (){

                    $('.createSubTaskBar').css({'width':'0'});
                    $('#add-sub-task-main').css({'margin-right':'0'});
                    $('#custom-body').css({'overflow':'initial'});
                });

                $('.edit-close-btn').on('click', function (){

                    $('#editTaskSidebar').css({'width':'0'});
                    $('#editTaskMain').css({'margin-right':'0'});
                    $('#custom-body').css({'overflow':'initial'});
                });

                $('.subtask-edit-close-btn').on('click', function (){

                    $('#editSubTaskSidebar').css({'width':'0'});
                    $('#editSubTaskMain').css({'margin-right':'0'});
                    $('#custom-body').css({'overflow':'initial'});
                });

            });
            function openCreateTaskSideNav(title) {
                console.log(title);
                document.getElementById("mySidebar").style.width = "30%";
                document.getElementById("custom-body").style.overflow = "hidden";
            }

            function closeNav() {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginRight= "0";
                document.getElementById("custom-body").style.overflow = "initial";
            }




        </script>
@endsection
