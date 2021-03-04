<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtaskmode extends Model
{
    public function taskmode()
    {
        return $this->belongsTo(Taskmode::class);
    }
}
