<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taskmode extends Model
{
    public function subtaskmodes()
    {
        return $this->hasMany(Subtaskmode::class);
    }


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_taskmodes',
            'taskmode_id',
            'project_id');
    }
}
