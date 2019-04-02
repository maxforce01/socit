<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use TCG\Voyager\Traits\Translatable;

class Category extends \TCG\Voyager\Models\Category
{
    public function posts()
    {
        return $this->hasMany('App\Post')
            ->published()
            ->orderBy('created_at', 'DESC');
    }
}
