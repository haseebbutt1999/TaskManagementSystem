<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::group(['middleware' => ['auth','prevent-back-history']], function() {

    Route::get('/', 'AdminController@index')->name('/');

// Taskmode Route
    Route::get('/taskmode', 'TaskController@task_mode_index')->name('taskmode');
    Route::post('/taskmode-save', 'TaskController@task_mode_save')->name('taskmode-save');
    Route::post('/taskmode-edit/{id}', 'TaskController@task_mode_edit')->name('taskmode-edit');
    Route::get('/taskmode-delete/{id}', 'TaskController@task_mode_delete')->name('taskmode-delete');

//  Subtaskmode Route
    Route::get('/subtaskmode', 'TaskController@subtask_mode_index')->name('subtaskmode');
    Route::post('/subtaskmode-save', 'TaskController@subtask_mode_save')->name('subtaskmode-save');
    Route::post('/subtaskmode-edit/{id}', 'TaskController@subtask_mode_edit')->name('subtaskmode-edit');
    Route::get('/subtaskmode-delete/{id}', 'TaskController@subtask_mode_delete')->name('subtaskmode-delete');

//    Project
    Route::get('/project', 'ProjectController@project_index')->name('project');
    Route::post('/project-save', 'ProjectController@project_save')->name('project-save');
    Route::get('/project-view/{id}', 'ProjectController@project_view')->name('project-view');
    Route::post('/project-edit/{id}', 'ProjectController@project_edit')->name('project-edit');
    Route::get('/project-delete/{id}', 'ProjectController@project_delete')->name('project-delete');

//    Priority
    Route::get('/priority', 'PriorityController@priority_index')->name('priority');
    Route::post('/priority-save', 'PriorityController@priority_save')->name('priority-save');
    Route::post('/priority-edit/{id}', 'PriorityController@priority_edit')->name('priority-edit');
    Route::get('/priority-delete/{id}', 'PriorityController@priority_delete')->name('priority-delete');

//    Status
    Route::get('/status', 'StatusController@status_index')->name('status');
    Route::post('/status-save', 'StatusController@status_save')->name('status-save');
    Route::post('/status-edit/{id}', 'StatusController@status_edit')->name('status-edit');
    Route::get('/status-delete/{id}', 'StatusController@status_delete')->name('status-delete');

//    task board
    Route::get('taskboard', 'ProjectController@taskboard_index')->name('taskboard');
    Route::get('/project-taskboard/{id}/{id2}', 'ProjectController@project_taskboard_index')->name('project-taskboard');

//    task
    Route::post('task', 'ProjectController@task_save')->name('task-save');
    Route::get('task/{id}', 'ProjectController@task_view')->name('task-view');
    Route::post('task-edit/{id}', 'ProjectController@task_edit')->name('task-edit');
    Route::get('task-delete/{id}', 'ProjectController@task_delete')->name('task-delete');






//    Route::get('/home', 'HomeController@index')->name('home');
});
Route::get('logout', '\App\Http\Controllers\HomeController@logout')->name('logut');

Route::get('blue', function(){
        return  View::make('adminpanel/admin-module/module/blueindex');
    });

