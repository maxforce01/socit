<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends \TCG\Voyager\Models\Post
{
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function likes()
    {
        return $this->morphMany('App\Likeable','likeable');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment','post_id');
    }
    public function last_comments()
    {
        $arr = $this->hasMany('App\Comment','post_id')->orderBy('created_at','desc')->limit(3);
        return $arr->orderBy('created_at','ASC');
    }
    public function repostUsers()
    {
        return $this->belongsToMany('App\User','repost')->withTimestamps();
    }
}
