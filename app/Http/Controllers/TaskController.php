<?php

namespace App\Http\Controllers;

use App\Rule;
use App\Subtaskmode;
use App\Taskmode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
//    Task mode functions
    public function task_mode_index(){
        $taskmode_data = Taskmode::orderBy('created_at', 'desc')->get();
        return view('adminpanel/admin-module/module/task/task_mode_index', compact('taskmode_data'));
    }

    public function task_mode_save(Request $request){

        $taskmode = Taskmode::where('id', $request->id)->first();

        if($taskmode == null){
            $taskmode = new Taskmode();
        }
        $taskmode->title = $request->title;
        $taskmode->description = $request->description;

        if($taskmode->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Successfully Addedd !');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Not Addedd !');
        }

        return redirect()->back();
    }

    public function task_mode_delete($id){

        $taskmode = Taskmode::find($id);

        if(isset($taskmode)){

            if($taskmode->delete()){
                session()->flash('message.level', 'success');
                session()->flash('message.content', 'Successfully Deleted !');
            }else{
                session()->flash('message.level', 'danger');
                session()->flash('message.content', 'Not Deleted !');
            }

        }

        return redirect()->back();
    }

    public function task_mode_edit(Request $request){

        $taskmode = Taskmode::where('id', $request->id)->first();

        if($taskmode == null){
            $taskmode = new Taskmode();
        }
        $taskmode->title = $request->title;
        $taskmode->description = $request->description;

        if($taskmode->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Successfully Updated !');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Not Updated !');
        }

        return redirect()->back();

    }

//    Sub task mode functions

    public function subtask_mode_index(){

        $taskmode_data = Taskmode::all();
        $subtaskmode_data = Subtaskmode::all();
        return view('adminpanel/admin-module/module/task/subtask_mode_index', compact('subtaskmode_data', 'taskmode_data'));
    }

    public function subtask_mode_save(Request $request){
        $subtaskmode = Subtaskmode::where('id', $request->id)->first();

        if($subtaskmode == null){
            $subtaskmode = new Subtaskmode();
        }
        $subtaskmode->title = $request->title;
        $subtaskmode->taskmode_id = $request->taskmode_id;
        $subtaskmode->description = $request->description;

        if($subtaskmode->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Successfully Addedd !');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Not Addedd !');
        }

        return redirect()->back();
    }

    public function subtask_mode_delete($id){

        $subtaskmode = Subtaskmode::find($id);

        if(isset($subtaskmode)){
            if($subtaskmode->delete()){
                session()->flash('message.level', 'success');
                session()->flash('message.content', 'Successfully Deleted !');
            }else{
                session()->flash('message.level', 'danger');
                session()->flash('message.content', 'Not Deleted !');
            }
        }

        return redirect()->back();
    }

    public function subtask_mode_edit(Request $request){

        $subtaskmode = Subtaskmode::where('id', $request->id)->first();

        if($subtaskmode == null){
            $subtaskmode = new Subtaskmode();
        }
        $subtaskmode->title = $request->title;
        $subtaskmode->taskmode_id = $request->taskmode_id;
        $subtaskmode->description = $request->description;

        if($subtaskmode->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Successfully Updated !');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Not Updated !');
        }

        return redirect()->back();

    }



}
