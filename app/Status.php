<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function project()
    {
        return $this->hasOne(Project::class);
    }
}
