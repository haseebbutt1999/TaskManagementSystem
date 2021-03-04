<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    public function project()
    {
        return $this->hasOne(Project::class);
    }
}
