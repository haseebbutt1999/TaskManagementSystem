@extends('adminpanel.admin-module.layout.default')
@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <div class="block">
                <div class="block-content text-center">
                    <div class="block-header">
                        <h3 class="block-title">Sub-Task Mode</h3>
                        <div class="block-options">
                            <a type="button"  class=" btn btn-primary text-white" data-toggle="modal" data-target="#AddTaskModeModal">
                                Add Sub-Task Mode
                            </a>
                        {{--                              Modal--}}
                            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="AddTaskModeModal" role="dialog" tabindex="-1">
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
                                                    <input placeholder="Title" name="title" type="text" required class="form-control title">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-left" style="float: left;" for="#">Task Mode</label>
                                                    <select class="form-control " name="taskmode_id" >
                                                        <option value="" selected>Select Task Mode</option>
                                                        @foreach($taskmode_data as $taskmode)
                                                            <option  value="{{$taskmode->id}}">
{{--                                                                    @if($product ===  $rule->tag ) selected @endif >--}}
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
                        {{--                              Modal End--}}
                        </div>
                    </div>
                    <div class="block-content">
                        @if(session()->has('message.level'))
                            <div class="alert alert-{{ session('message.level') }}">
                                {!! session('message.content') !!}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter">
                                <thead>
                                <tr>
                                    <th style="width: 20%;">Title</th>
                                    <th style="width: 20%;">Task Mode</th>
                                    <th style="width: 30%">Description</th>
                                    <th class="text-center" style="width: 20%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($subtaskmode_data as $key => $subtaskmode)
                                        <tr>
                                            @if($taskmode->title != null)
                                            <td class="font-size-sm">
                                                {{$subtaskmode->title}}
                                            </td>
                                            @endif
                                            <td>
                                                @if(isset($subtaskmode->taskmode->title) && $subtaskmode->taskmode->title != null){{$subtaskmode->taskmode->title}}@endif
                                            </td>
                                            <td>
                                                @if($taskmode->description != null){{$subtaskmode->description}}@endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">

{{--                                                    --}}
                                                    <a  href="{{route('taskmode-edit', $taskmode->id)}}" class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="modal" data-target="#SubtaskmodeEditModal{{$key}}"   data-original-title="Edit">
                                                        <i class="text-white fa fa-fw fa-pencil-alt"></i>
                                                    </a>

                            {{--                                                        Taskmode Edit Modal--}}
                                                    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="SubtaskmodeEditModal{{$key}}" role="dialog" tabindex="-1">
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
                                                                    {{--                                                                        <input name="package_id" hidden value="{{$package->id}}">--}}
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
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

@endsection
