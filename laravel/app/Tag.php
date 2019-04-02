<?php

namespace App;
use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
