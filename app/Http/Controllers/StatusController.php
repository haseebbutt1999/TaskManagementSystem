<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function status_index(){
//        $project_data = Project::all();
//        $user_data = User::role('tasker')->get();
//        $project_leader_data = User::role('assigner')->get();
        $status_data = Status::all();
        return view('adminpanel/admin-module/module/status/status_index', compact('status_data'));

    }

    public function status_save(Request $request){

        $status = Status::where('id', $request->id)->first();

        if($status == null){
            $status = new Status();
        }

        $status->title = $request->title;
        $status->color = $request->color;

        if($status->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Successfully Addedd !');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Not Addedd !');
        }

        return redirect()->back();
    }

    public function status_edit(Request $request, $id){


        $status = Status::where('id', $id)->first();

        if($status == null){
            $status = new Status();
        }

        $status->title = $request->title;
        $status->color = $request->color;

        if($status->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Successfully Addedd !');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Not Addedd !');
        }

        return redirect()->back();
    }

    public function status_delete($id){

        $status = Status::find($id);

        if(isset($status)){
            if($status->delete()){
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
