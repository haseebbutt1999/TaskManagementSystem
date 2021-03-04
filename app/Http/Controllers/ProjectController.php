<?php

namespace App\Http\Controllers;

use App\Priority;
use App\Project;
use App\ProjectsUser;
use App\ProjectTaskmode;
use App\Status;
use App\Task;
use App\Taskmode;
use App\TaskUser;
use APP\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class ProjectController extends Controller
{
    //    Project functions
    public function project_index(){
        $project_data = Project::all();
        $priority_data = Priority::all();
        $status_data = Status::all();
        $user_data = User::role('tasker')->get();
        $project_leader_data = User::role('assigner')->get();


        return view('adminpanel/admin-module/module/project/project_index', compact('status_data','priority_data', 'project_data', 'user_data','project_leader_data'));
    }



    public function project_view($id){

        $project_data = Project::where('id', $id)->first();
        $tasker_data = User::role('tasker')->get();
        $priority_data = Priority::all();
        $taskmode_data = Taskmode::all();
        $status_data = Status::all();
        $user_data = User::role('tasker')->get();
        $project_leader_data = User::role('assigner')->get();
        return view('adminpanel/admin-module/module/project/project_view', compact('taskmode_data', 'user_data', 'project_leader_data', 'status_data','priority_data','project_data', 'tasker_data'));
    }

    public function project_save(Request $request){

        $project = Project::where('id', $request->id)->first();

        if($project == null){
            $project = new Project();
        }

        $project->title = $request->title;
        $project->priority_id = $request->priority_id;
        $project->status_id = $request->status_id;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->project_leader = $request->project_leader;
        $project->description = $request->description;

        if ($request->file('referral_file'))
        {
            $destination = 'uploads/';
            $file = $request->file('referral_file');
            $image_name = time() . $file->getClientOriginalName();
            $file->move($destination, $image_name);
            $project->referral_file = $image_name;
        }

        if($project->save()){
            foreach($request->user_id as $user_id) {
                ProjectsUser::create([
                    'user_id' => $user_id,
                    'project_id' =>$project->id
                ]);
            }
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Successfully Addedd !');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Not Addedd !');
        }

        return redirect()->back();
    }

    public function project_edit(Request $request, $id){

        $project = Project::where('id', $id)->first();

        if($project == null){
            $project = new Project();
        }

        $project->title = $request->title;
        $project->priority_id = $request->priority_id;
        $project->status_id = $request->status_id;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->project_leader = $request->project_leader;
        $project->description = $request->description;

        if ($request->file('referral_file'))
        {
            $destination = 'uploads/';
            $file = $request->file('referral_file');
            $image_name = time() . $file->getClientOriginalName();
            $file->move($destination, $image_name);
            $project->referral_file = $image_name;
        }

        if($project->save()){
            if($request->user_id) {
                foreach ($request->user_id as $user_id) {
                    $project_user_save = ProjectsUser::where('user_id', $user_id)->where('project_id', $project->id)->first();
                    if ($project_user_save == null) {
                        $project_user_save = new ProjectsUser();
                    }
                    $project_user_save->user_id = $user_id;
                    $project_user_save->project_id = $project->id;
                    $project_user_save->save();
                }
            }
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Successfully Addedd !');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Not Addedd !');
        }

        return redirect()->back();
    }


    public function project_delete($id){

        $project = Project::find($id);

        if(isset($project)){
            if($project->delete()){
                session()->flash('message.level', 'success');
                session()->flash('message.content', 'Successfully Deleted !');
            }else{
                session()->flash('message.level', 'danger');
                session()->flash('message.content', 'Not Deleted !');
            }
        }

        return redirect()->back();
    }

//    taskboard function

    public function taskboard_index(){
        $status_data = Status::all();
        $project_data = Project::all();
        $task_data = Task::all();
        return view('adminpanel/admin-module/module/taskboard/taskboard_index', compact('task_data', 'project_data', 'status_data'));
    }

    public function project_taskboard_index($id, $project_id){
        $status_data = Status::all();
//        dd($status_data);
        $project_data = Project::where('id', $project_id)->get();
//        dd($project_data);
        $task_data = Task::where('taskmode_id', $id)->where('project_id', $project_id)->get();
//        dd($task_data);
        $project_leader_data = User::role('assigner')->get();
        $user_data = User::role('tasker')->get();

        return view('adminpanel/admin-module/module/taskboard/project_taskboard_index', compact('user_data','project_leader_data','task_data', 'project_data', 'status_data'));
    }



    public function task_save(Request $request){
//    dd($request->all());
        $task = Task::where('id', $request->id)->first();

        if($task == null){
            $task = new Task();
        }

        $task->title = $request->title;
        $task->project_id = $request->project_id;
        $task->taskmode_id = $request->taskmode_id;
        $task->status_id = $request->status_id;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->project_leader = $request->project_leader;
        $task->description = $request->description;

        if ($request->file('referral_file'))
        {
            $destination = 'uploads/';
            $file = $request->file('referral_file');
            $image_name = time() . $file->getClientOriginalName();
            $file->move($destination, $image_name);
            $task->referral_file = $image_name;
        }

        if($task->save()){
            foreach($request->user_id as $user_id) {
                TaskUser::create([
                    'user_id' => $user_id,
                    'task_id' =>$task->id
                ]);
            }
            $project_taskmode_check = ProjectTaskmode::where('project_id', $request->project_id)->where('taskmode_id',$request->taskmode_id)->first();
            if($project_taskmode_check == null) {
                ProjectTaskmode::create([
                    'project_id' => $request->project_id,
                    'taskmode_id' => $request->taskmode_id
                ]);
            }
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Successfully Addedd !');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Not Addedd !');
        }

        return redirect()->back();

    }

    public function task_edit(Request $request, $id){
//    dd($request->all());

        $task = Task::where('id', $id)->first();

        if($task == null){
            $task = new Task();
        }

        $task->title = $request->title;
        $task->project_id = $request->project_id;
        $task->taskmode_id = $request->taskmode_id;
        $task->status_id = $request->status_id;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->project_leader = $request->project_leader;
        $task->description = $request->description;

        if ($request->file('referral_file'))
        {
            $destination = 'uploads/';
            $file = $request->file('referral_file');
            $image_name = time() . $file->getClientOriginalName();
            $file->move($destination, $image_name);
            $task->referral_file = $image_name;
        }
//        dd($request->user_id);
        if($task->save()) {
            if ($request->user_id != null){
                foreach ($request->user_id as $user_id) {
                    $task_user_check = TaskUser::where('user_id', $user_id)->where('task_id', $task->id)->first();
                    if ($task_user_check == null) {
                        $task_user_check = new TaskUser();
                    }
                    $task_user_check->user_id = $user_id;
                    $task_user_check->task_id = $task->id;
                    $task_user_check->save();

                }
            }else{
                return redirect()->back()->with('error', 'Select User !');
            }
            $project_taskmode_check = ProjectTaskmode::where('project_id', $request->project_id)->where('taskmode_id',$request->taskmode_id)->first();
                if ($project_taskmode_check == null) {
                    $project_taskmode_check = new ProjectTaskmode();
                }
                $project_taskmode_check->project_id = $request->project_id;
                $project_taskmode_check->taskmode_id =$request->taskmode_id;
                $project_taskmode_check->save();

            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Successfully Addedd !');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Not Addedd !');
        }

        return redirect()->back();

    }

    public function task_delete($id){
//         task user and project task mode
        $task_data_delete = Task::where('id', $id)->first();
        $project_taskmode_delete = ProjectTaskmode::where('project_id',$task_data_delete->project_id )->where('taskmode_id', $task_data_delete->taskmode_id)->get();
        foreach ($project_taskmode_delete as $project_taskmode){
            $project_taskmode->delete();
        }
        $task_user_delete = TaskUser::where('task_id',$task_data_delete->id )->whereIn('user_id', $task_data_delete->users)->get();
        foreach ($task_user_delete as $task_user){
            $task_user->delete();
        }

        $task_data_delete->delete();
        return redirect()->back();
        //        dd($project_taskmode_delete);

    }



    public function task_view($id){
        $task_data = Task::where('id', $id)->first();

        return view('adminpanel/admin-module/module/taskboard/task_view', compact('task_data'));

    }
}
