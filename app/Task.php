<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function users()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
            User::class,
            'task_users',
            'task_id',
            'user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function taskmodes()
    {
        return $this->belongsTo(Taskmode::class);
    }
}
