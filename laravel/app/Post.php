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

    public function isLesson()
    {
        $lessonn = Category::where('slug','lessons')->first();
        $lessons = Category::where('parent_id',$lessonn->id)->get();
        if(!empty($lessons)) {
            $lessons->push($lessonn);
        }
        foreach($lessons as $lesson) {
            if ($this->category_id == $lesson->id)
            {
                return true;
            }
        }
        return false;
    }
    public function isNews()
    {
        $neww = Category::where('slug','news')->first();
        $news = Category::where('parent_id',$neww->id)->get();
        if(!empty($newss)) {
            $news->push($neww);
        }
        foreach($news as $new) {
            if ($this->category_id == $new->id)
            {
                return true;
            }
        }
        return false;
    }
    public function isHelp()
    {
        $helpp = Category::where('slug','help')->first();
        $helps = Category::where('parent_id',$helpp->id)->get();
        if(!empty($helps)) {
            $helps->push($helpp);
        }
        foreach($helps as $help) {
            if ($this->category_id == $help->id)
            {
                return true;
            }
        }
        return false;
    }

}
