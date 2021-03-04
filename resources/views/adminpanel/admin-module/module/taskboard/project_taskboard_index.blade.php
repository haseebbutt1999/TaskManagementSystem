@extends('adminpanel.admin-module.layout.default')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Hospital Admin</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Task Board</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row board-view-header">
                <div class="col-4">
                    <div class="pro-teams">
                        <div class="pro-team-lead">
                            <h4>Lead</h4>
                            <div class="avatar-group">
                                <div class="avatar">
                                    <img class="avatar-img rounded-circle border border-white" alt="User Image" src="assets\img\profiles\avatar-11.jpg">
                                </div>
                                <div class="avatar">
                                    <img class="avatar-img rounded-circle border border-white" alt="User Image" src="assets\img\profiles\avatar-01.jpg">
                                </div>
                                <div class="avatar">
                                    <img class="avatar-img rounded-circle border border-white" alt="User Image" src="assets\img\profiles\avatar-16.jpg">
                                </div>
                                <div class="avatar">
                                    <a href="" class="avatar-title rounded-circle border border-white" data-toggle="modal" data-target="#assign_leader"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="pro-team-members">
                            <h4>Team</h4>
                            <div class="avatar-group">
                                <div class="avatar">
                                    <img class="avatar-img rounded-circle border border-white" alt="User Image" src="assets\img\profiles\avatar-02.jpg">
                                </div>
                                <div class="avatar">
                                    <img class="avatar-img rounded-circle border border-white" alt="User Image" src="assets\img\profiles\avatar-09.jpg">
                                </div>
                                <div class="avatar">
                                    <img class="avatar-img rounded-circle border border-white" alt="User Image" src="assets\img\profiles\avatar-12.jpg">
                                </div>
                                <div class="avatar">
                                    <a href="" class="avatar-title rounded-circle border border-white" data-toggle="modal" data-target="#assign_user"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 text-right">
                    <a href="#" class="btn btn-white float-right ml-2" data-toggle="modal" data-target="#add_task_board"><i class="fa fa-plus"></i> Create List</a>
                    <a href="project-view.html" class="btn btn-white float-right" title="View Board"><i class="fa fa-link"></i></a>
                </div>

                <div class="col-12">
                    <div class="pro-progress">
                        <div class="pro-progress-bar">
                            <h4>Progress</h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 20%"></div>
                            </div>
                            <span>20%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kanban-board card mb-0">
                <div class="card-body">
                    <div class="kanban-cont">
{{--                        @dd($status_data)--}}
                        @foreach($status_data as $status)
                            <div class="kanban-list " >
                                <div class="kanban-header"style="background-color:{{$status->color}};">
                                    <span class="status-title">{{$status->title}}</span>
                                    <div class="dropdown kanban-action">
                                        <a href="" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" >Edit</a>
                                            <a class="dropdown-item" href="">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
//                                    $task_data = \App\Task::where('status_id', $id)->get();
//                                    dd($task_data);
                                ?>
                                @foreach($task_data as $task)
{{--                                    @dd($task_data)--}}
                                    @if($task->status_id == $status->id)

                                    <div class="kanban-wrap" style="background-color: #f4efef">
                                        @foreach($project_data as $project)
{{--                                            @dd($project_data)--}}
                                            <div class="card panel">
                                                <div class="kanban-box">
                                                    <div class="task-board-header">
                                                        <span><a style="color: black;" href="{{route('project-view', $project->id)}}" >{{$project->title}}</a></span>
{{--                                                        href="{{route('task-view', $task->id)}}"--}}
{{--                                                        @dd($task->taskmode_id)--}}
                                                        <span class="status-title"><a style="color: black;cursor: pointer;"class=" task-view-btn"
                                                                                      data-id="{{$task->id}}" data-title="{{$task->title}}"
                                                                                      data-taskmode_id="{{$task->taskmode_id}}"data-project_id="{{$task->project_id}}"data-project_title="{{$task->project->title}}" data-status="{{$task->status_id}}"
                                                                                      data-leader="{{$task->project_leader}}"   data-description="{{ $task->description }}"
                                                                                      data-start_date="{{$task->start_date}}" data-end_date="{{$task->end_date}}"  >{{$task->title}}</a></span>
                                                        <div class="dropdown kanban-task-action">
                                                            <a href="" data-toggle="dropdown">
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                <a class="dropdown-item" href="{{route('task-delete', $task->id)}}">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="task-board-body">
                                                        <div class="kanban-info">
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <span>70%</span>
                                                        </div>
                                                        <div class="kanban-footer">
                                                                    <span class="task-info-cont">
                                                                        <span class="task-date"><i class="fa fa-clock-o"></i> Sep 26</span>
                                                                        <span class="task-priority badge bg-inverse-danger">High</span>
                                                                    </span>
                                                            <span class="task-users">
                                                                        <img src="assets\img\profiles\avatar-12.jpg" class="task-avatar" width="24" height="24">
                                                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @endif
                                @endforeach

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->

    </div>
    {{-- edit project--}}
    <div id="task-view-rightsidebar" class="rightsidebar">

        <div class="card " >
            <div class="card-header">
                <div class="ml-3">
                    Edit Task
                </div>
                <div class="text-right float-right">
                    <a href="javascript:void(0)" class="closebtn task-view-close-btn" >×</a>
                </div>
            </div>
            <div class="card-body" >
                <form class="task-view-form" action="" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input  class="form-control task-view-title" name="title" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Project</label>
                                    <input class="form-control project_title" readonly>

                                    <input hidden class="project_id" name="project_id" type="number" value="">
                                    <input hidden class="taskmode_id" name="taskmode_id" type="number" value="">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker task-view-start-date" name="start_date" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker task-view-end-date" name="end_date" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control task-view-status-id" name="status_id">
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
                                    <select class=" form-control task-view-leader" name="project_leader" >
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
                                        <select class=" form-control task-view-team" name="user_id[]" multiple="multiple">
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

                            <textarea class="form-control ckeditors task-view-description"  name="description"
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

    {{--jquery cdn--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- ckeditor js--}}
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('body').find('.ckeditors').each(function() {
                CKEDITOR.replace($(this).attr('id'));
            });

            $('.task-view-btn').on('click', function(){
                $("#task-view-rightsidebar").css({"width":"50%", "height":"100%", "padding-bottom":"20px", "z-index":"1"}) ;
                $('#custom-body').css({'overflow':'hidden'});
                var id = $(this).data('id');
                var title = $(this).data('title');
                var description = $(this).data('description');

                // var description = description_data.html();
                console.log(description);
                var project_title = $(this).data('project_title');
                var status = $(this).data('status');
                var project_id = $(this).data('project_id');
                var taskmode_id = $(this).data('taskmode_id');
                var leader = $(this).data('leader');
                var start_date = $(this).data('start_date');
                var end_date = $(this).data('end_date');
                var referral_file = $(this).data('referral_file');

                $('.task-view-start-date').val(start_date)
                $('.task-view-end-date').val(end_date)
                $('.task-view-title').val(title)
                $('.project_id').val(project_id)
                $('.taskmode_id').val(taskmode_id)
                $('.task-view-description').val(description)
                $('.project_title').val(project_title)
                $('.task-view-status-id').val(status)
                $('.task-view-leader').val(leader)
console.log(id);
                $('.task-view-form').attr('action', '/task-edit/'+ id)
            });

            $('.task-view-close-btn').on('click', function (){

                $('#task-view-rightsidebar').css({'width':'0'});
                $('#task-view-main').css({'margin-right':'0'});
                $('#custom-body').css({'overflow':'initial'});
            });

        });

    </script>
    <!-- /Page Wrapper -->
@endsection
