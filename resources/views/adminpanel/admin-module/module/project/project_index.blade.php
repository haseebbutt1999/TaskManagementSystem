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
                        <h3 class="page-title">Projects</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <div id="create-project-main" class="">
                            <a href="#" class="btn add-btn sidebar_open openbtn create-project-btn" style="    margin-bottom: 5px;" ><i
                                    class="fa fa-plus"></i>Project</a>
                        </div>
                        <div class="view-icons">
                            <a href="projects.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                            <a href="project-list.html" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Project Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Employee Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating">
                            <option>Select Roll</option>
                            <option>Web Developer</option>
                            <option>Web Designer</option>
                            <option>Android Developer</option>
                            <option>Ios Developer</option>
                        </select>
                        <label class="focus-label">Role</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="btn btn-success btn-block"> Search </a>
                </div>
            </div>
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                            <tr>
                                <th>Project</th>
                                <th>Leader</th>
                                <th>Team</th>
                                <th>Deadline</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project_data as $project)
                                <tr>
                                    <td>
                                        <a href="{{route('project-view', $project->id)}}">{{$project->title}}</a>
                                    </td>
                                    <td>
{{--                                    @dd($project->project_leader)--}}
                                        <?php
                                            $leader_name = \App\User::where('id', $project->project_leader)->first();
                                        ?>

                                        <a >{{$leader_name->name}}</a>

                                    </td>
                                    <td>

{{--                                        @dd($project->users)--}}
                                        <div class="dropdown action-label">
                                            <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o "></i> Team </a>

                                            <div class="dropdown-menu">
{{--                                                @dd($project->users)--}}
                                                @if(isset($project->users) && $project->users != null)
                                                    @foreach($project->users as $user)
                                                        <a class="dropdown-item" href="#"> {{$user->name}}</a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{$project->end_date}} </td>
                                    <td>
                                        <div class="dropdown action-label">
{{--                                            <div class="dropdown-menu">--}}
{{--                                            @if($project->priority == 'high')--}}
{{--                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> High</a>--}}
{{--                                            @elseif($project->priority == 'medium')--}}
{{--                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-warning"></i> Medium</a>--}}
{{--                                            @elseif($project->priority == 'low')--}}
{{--                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Low</a>--}}
{{--                                            @endif--}}
{{--                                            </div>--}}
{{--                                            @dd($project->priority->color)--}}
                                            <a class="dropdown-item" href="#" ><i class="fa fa-dot-circle-o " style="color:{{$project->priority->color}};"></i> {{$project->priority->title}}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown action-label">
{{--                                            @if($project->status == 'active')--}}
{{--                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>--}}
{{--                                            @elseif($project->priority == 'inactive')--}}
{{--                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>--}}
{{--                                            @endif--}}

                                            <a class="dropdown-item" href="#" ><i class="fa fa-dot-circle-o " style="color:{{$project->priority->color}};"></i> {{$project->status->title}}</a>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">

                                                <div id="edit-project-main" class="">
                                                    {{--                                                    <a href="#" class="btn add-btn sidebar_open openbtn create-project-btn" style="    margin-bottom: 5px;" >Create Project</a>--}}
{{--@dd($project->project_leader)--}}

                                                    <a class="dropdown-item edit-project-btn" href="#" data-id="{{$project->id}}" data-title="{{$project->title}}"
                                                    data-priority="{{$project->priority_id}}" data-status="{{$project->status_id}}" data-leader="{{$project->project_leader}}"   data-description="{{ $project->description }}" data-start_date="{{$project->start_date}}" data-end_date="{{$project->end_date}}" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                </div>
                                                <a class="dropdown-item" href="{{Route('project-delete', $project->id)}}" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
{{--    create project--}}
        <div id="create-project-rightsidebar" class="rightsidebar">

            <div class="card " >
                <div class="card-header">
                    <div class="ml-3">
                        Create Project
                    </div>
                    <div class="text-right float-right">
                        <a href="javascript:void(0)" class="closebtn create-project-close-btn" >×</a>
                    </div>
                </div>
                <div class="card-body" >
                    <form action="{{Route('project-save')}}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Project Name</label>
                                        <input class="form-control" name="title" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Priority</label>
                                        <select class="form-control" name="priority_id">
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
{{--        edit project--}}
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

            $('.create-project-btn').on('click', function(){
                $("#create-project-rightsidebar").css({"width":"50%", "height":"100%", "padding-bottom":"20px", "z-index":"1"}) ;
                $('#custom-body').css({'overflow':'hidden'});
            });

            $('.create-project-close-btn').on('click', function (){

                $('#create-project-rightsidebar').css({'width':'0'});
                $('#create-project-main').css({'margin-right':'0'});
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
