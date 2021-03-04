@extends('adminpanel.admin-module.layout.default')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{$project_data->title}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('/')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Project</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <div class="d-flex align-items-center">
                            <div id="main">
                                <div id="create-task-main" class="">
                                    <a href="#" class="btn btn-sm add-btn sidebar_open openbtn create-task-btn"  ><i
                                            class="fa fa-plus"></i>Task</a>
                                </div>
                            </div>
                            <div id="edit-project-main" class="">
                                <a style="    margin-bottom: 5px;" class="btn btn-sm add-btn dropdown-item edit-project-btn" href="#" data-id="{{$project_data->id}}" data-title="{{$project_data->title}}"
                                   data-priority="{{$project_data->priority_id}}" data-status="{{$project_data->status_id}}"
                                   data-leader="{{$project_data->project_leader}}"   data-description="{{ $project_data->description }}"
                                   data-start_date="{{$project_data->start_date}}" data-end_date="{{$project_data->end_date}}" ><i class="fa fa-plus"></i> Edit Project</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="project-title">
                                <h5 class="card-title">{{$project_data->title}}</h5>
                                <small class="block text-ellipsis m-b-15"><span class="text-xs">{{$project_data->tasks->count()}}</span> <span class="text-muted">tasks </span><span class="text-xs">5</span> <span class="text-muted">tasks completed</span></small>
                            </div>
                            <p>{!!  $project_data->description !!}</p>
                           </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-20">Uploaded image files</h5>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                                    <div class="uploaded-box">
                                        <div class="uploaded-img">
                                            <img src="{{asset('uploads/'.$project_data->referral_file)}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="uploaded-img-name">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xl-3">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Task List</h5>
                        </div>
                        <ul class="list-group list-group-flush">

                            @foreach($project_data->taskmodes as $task)

                            <?php
                                $count = "";
                                foreach ($task->tasks as $t){
                                    $count = \App\Task::where('project_id',$t->project_id)->count();
                                }
//                                dd($count);
                            ?>
                                <li class="list-group-item">
                                    <div class="">
{{--                                        @dd($task->id)--}}
                                        <a href="{{url("/project-taskboard/{$task->id}/{$project_data->id}")}}" style="color:black;">
                                            <span>{{$task->title}}</span>
                                            <span class="float-right"><span class="badge badge-primary">{{$task->tasks->where('project_id', $project_data->id)->count()}}</span></span>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title m-b-15">Project Details</h6>
                            <table class="table table-striped table-border">
                                <tbody>
                                <tr>
                                    <td>Created:</td>
{{--                                    {{date('d-M-Y ', strtotime($project_data->start_date))}}--}}
                                    <?php
//                                    $date=date_create($project_data->start_date);
//                                    $start_data = date_format($date,"d-M-Y");
                                    ?>
                                    <td class="text-right">{{$project_data->start_date}}</td>
                                </tr>
                                <tr>
                                    <td>Deadline:</td>
                                    <td class="text-right">{{$project_data->end_date}}</td>
                                </tr>
                                <tr>
                                    <td>Priority:</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a class="" ><i class="fa fa-dot-circle-o " style="color: {{$project_data->priority->color}};"></i> {{$project_data->priority->title}} </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <?php

                                    $project_leader = \App\User::where('id', $project_data->project_leader)->first();
                                    ?>

                                    <td>Created by:</td>
                                    <td class="text-right"><a href="profile.html">{{$project_leader->name}}</a></td>
                                </tr>
                                <tr>
                                    <td>Status:</td>
                                    <td class="text-right">{{$project_data->status->title}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                            <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
                            </div>
                        </div>
                    </div>


                    <div class="card project-user">
                        <div class="card-body">
                            <h6 class="card-title m-b-20">
                                Assigned Tasker
                            </h6>
                            <ul class="list-box">
                                @foreach($tasker_data as $tasker)
                                    <li>
                                        <a href="profile.html">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar"><img alt="" src="assets\img\profiles\avatar-02.jpg"></span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author">{{$tasker->name}}</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
{{-- edit project--}}
        <div id="edit-project-rightsidebar" class="rightsidebar">

            <div class="card " >
                <div class="card-header">
                    <div class="ml-3">
                        Edit Project
                    </div>
                    <div class="text-right float-right">
                        <a href="javascript:void(0)" class="closebtn edit-project-close-btn" >×</a>
                    </div>
                </div>
                <div class="card-body" >
                    <form class="edit-project-form" action="" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Project Name</label>
                                        <input  class="form-control edit-project-title" name="title" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Priority</label>
                                        <select class="form-control edit-project-priority-id" name="priority_id">
                                            @foreach($priority_data as $priority)
                                                <option value="{{$priority->id}}">{{$priority->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker edit-project-start-date" name="start_date" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker edit-project-end-date" name="end_date" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control edit-project-status-id" name="status_id">
                                            @foreach($status_data as $status)
                                                <option value="{{$status->id}}">{{$status->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Add Project Leader</label>
                                        <select class=" form-control edit-project-leader" name="project_leader" >
                                            @foreach($project_leader_data as $project_leader)
                                                <option value="{{$project_leader->id}}">{{$project_leader->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Team Leader</label>
                                        <div class="project-members">
                                            <a href="#" data-toggle="tooltip" title="Jeffery Lalor" class="avatar">
                                                <img src="assets\img\profiles\avatar-16.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Add Team</label>
                                        <div>
                                            <select class=" form-control edit-project-team" name="user_id[]" multiple="multiple">
                                                @foreach($user_data as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Team Members</label>
                                        <div class="project-members">
                                            <a href="#" data-toggle="tooltip" title="John Doe" class="avatar">
                                                <img src="assets\img\profiles\avatar-16.jpg" alt="">
                                            </a>
                                            <a href="#" data-toggle="tooltip" title="Richard Miles" class="avatar">
                                                <img src="assets\img\profiles\avatar-09.jpg" alt="">
                                            </a>
                                            <a href="#" data-toggle="tooltip" title="John Smith" class="avatar">
                                                <img src="assets\img\profiles\avatar-10.jpg" alt="">
                                            </a>
                                            <a href="#" data-toggle="tooltip" title="Mike Litorus" class="avatar">
                                                <img src="assets\img\profiles\avatar-05.jpg" alt="">
                                            </a>
                                            <span class="all-team">+2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>

                                <textarea class="form-control ckeditors edit-project-description"  name="description"
                                          required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Files</label>
                                <input class="form-control " name="referral_file" type="file">

                            </div>
                        </div>
                        <div class="ml-3">
                            <button type="submit"  class="btn btn-primary ">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--    create task--}}
        <div id="create-task-rightsidebar" class="rightsidebar">

            <div class="card " >
                <div class="card-header">
                    <div class="ml-3">
                        Create Task
                    </div>
                    <div class="text-right float-right">
                        <a href="javascript:void(0)" class="closebtn create-task-close-btn" >×</a>
                    </div>
                </div>
                <div class="card-body" >
                    <form action="{{Route('task-save')}}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Task Name</label>
                                        <input class="form-control" name="title" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Project</label>
                                        <input class="form-control" name="" value="{{$project_data->title}}" readonly type="text">
                                        <input class="form-control" name="project_id" value="{{$project_data->id}}" hidden  type="number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Taskmode</label>
                                        <select class="form-control" name="taskmode_id">
                                            @foreach($taskmode_data as $taskmode)
                                                <option value="{{$taskmode->id}}">{{$taskmode->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status_id">
                                            @foreach($status_data as $status)
                                                <option value="{{$status->id}}">{{$status->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" name="start_date" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" name="end_date" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Add Project Leader</label>
                                        {{--                                        @dd($user)--}}
                                        <select class=" form-control" name="project_leader" >
                                            @foreach($project_leader_data as $project_leader)
                                                <option value="{{$project_leader->id}}">{{$project_leader->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Team Leader</label>
                                        <div class="project-members">
                                            <a href="#" data-toggle="tooltip" title="Jeffery Lalor" class="avatar">
                                                <img src="assets\img\profiles\avatar-16.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Add Team</label>
                                        <div>
                                            <select class=" form-control" name="user_id[]" multiple="multiple">
                                                @foreach($user_data as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Team Members</label>
                                        <div class="project-members">
                                            <a href="#" data-toggle="tooltip" title="John Doe" class="avatar">
                                                <img src="assets\img\profiles\avatar-16.jpg" alt="">
                                            </a>
                                            <a href="#" data-toggle="tooltip" title="Richard Miles" class="avatar">
                                                <img src="assets\img\profiles\avatar-09.jpg" alt="">
                                            </a>
                                            <a href="#" data-toggle="tooltip" title="John Smith" class="avatar">
                                                <img src="assets\img\profiles\avatar-10.jpg" alt="">
                                            </a>
                                            <a href="#" data-toggle="tooltip" title="Mike Litorus" class="avatar">
                                                <img src="assets\img\profiles\avatar-05.jpg" alt="">
                                            </a>
                                            <span class="all-team">+2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>

                                <textarea class="form-control ckeditors " name="description"
                                          required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Files</label>
                                <input class="form-control" name="referral_file" type="file"  >
                            </div>
                        </div>
                        <div class="ml-3">
                            <button type="submit"  class="btn btn-primary ">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--        edit task--}}>

    </div>
    <!-- /Page Wrapper -->



    {{--jquery cdn--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- ckeditor js--}}
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('body').find('.ckeditors').each(function() {
                CKEDITOR.replace($(this).attr('id'));
            });

            $('.create-task-btn').on('click', function(){
                $("#create-task-rightsidebar").css({"width":"50%", "height":"100%", "padding-bottom":"20px", "z-index":"1"}) ;
                $('#custom-body').css({'overflow':'hidden'});
            });

            $('.create-task-close-btn').on('click', function (){

                $('#create-task-rightsidebar').css({'width':'0'});
                $('#create-task-main').css({'margin-right':'0'});
                $('#custom-body').css({'overflow':'initial'});
            });

            $('.edit-project-btn').on('click', function(){
                $("#edit-project-rightsidebar").css({"width":"50%", "height":"100%", "padding-bottom":"20px", "z-index":"1"}) ;
                $('#custom-body').css({'overflow':'hidden'});
                var id = $(this).data('id');
                var title = $(this).data('title');
                var description = $(this).data('description');

                // var description = description_data.html();
                console.log(description);
                var priority = $(this).data('priority');
                var status = $(this).data('status');
                var leader = $(this).data('leader');
                var start_date = $(this).data('start_date');
                var end_date = $(this).data('end_date');
                var referral_file = $(this).data('referral_file');

                $('.edit-project-start-date').val(start_date)
                $('.edit-project-end-date').val(end_date)
                $('.edit-project-title').val(title)
                $('.edit-project-description').val(description)
                $('.edit-project-priority-id').val(priority)
                $('.edit-project-status-id').val(status)
                $('.edit-project-leader').val(leader)

                $('.edit-project-form').attr('action', '/project-edit/'+ id)
            });

            $('.edit-project-close-btn').on('click', function (){

                $('#edit-project-rightsidebar').css({'width':'0'});
                $('#edit-project-main').css({'margin-right':'0'});
                $('#custom-body').css({'overflow':'initial'});
            });

        });

    </script>
@endsection
