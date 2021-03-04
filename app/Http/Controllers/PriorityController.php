<?php

namespace App\Http\Controllers;

use App\Priority;
use App\Project;
use App\ProjectsUser;
use App\User;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function priority_index(){
//        $project_data = Project::all();
//        $user_data = User::role('tasker')->get();
//        $project_leader_data = User::role('assigner')->get();
        $priority_data = Priority::all();
        return view('adminpanel/admin-module/module/priority/priority_index', compact('priority_data'));

    }

    public function priority_save(Request $request){

        $priority = Priority::where('id', $request->id)->first();

        if($priority == null){
            $priority = new Priority();
        }

        $priority->title = $request->title;
        $priority->color = $request->color;

        if($priority->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Successfully Addedd !');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Not Addedd !');
        }

        return redirect()->back();
    }

    public function priority_edit(Request $request, $id){


        $priority = Priority::where('id', $id)->first();

        if($priority == null){
            $priority = new Priority();
        }

        $priority->title = $request->title;
        $priority->color = $request->color;

        if($priority->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Successfully Addedd !');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Not Addedd !');
        }

        return redirect()->back();
    }

    public function priority_delete($id){

        $priority = Priority::find($id);

        if(isset($priority)){
            if($priority->delete()){
                session()->flash('message.level', 'success');
                session()->flash('message.content', 'Successfully Deleted !');
            }else{
                session()->flash('message.level', 'danger');
                session()->flash('message.content', 'Not Deleted !');
            }
        }

        return redirect()->back();
    }


}
