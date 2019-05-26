<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends \TCG\Voyager\Models\Post
{
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function likes()
    {

        return $this->morphMany('App\Likeable', 'likeable');
    }

    public function setUserNameAttribute($value)
    {
        $this->attributes['user_name'] = strtolower($value);
    }

    public function setUserAvatarAttribute($value)
    {
        $this->attributes['user_avatar'] = strtolower($value);
    }

    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('Y-m-d'));
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }

    public function last_comments()
    {

        return $this->hasMany('App\Comment', 'post_id')->orderBy('created_at', 'desc')->limit(3);
    }

    public function repostUsers()
    {
        return $this->belongsToMany('App\User', 'repost')->withTimestamps();
    }

    public function isLesson()
    {
        $lessonn = Category::where('slug', 'lessons')->first();
        $lessons = Category::where('parent_id', $lessonn->id)->get();
        $lessons->push($lessonn);
        foreach ($lessons as $lesson) {
            if ($this->category_id == $lesson->id) {
                return true;
            }
        }
        return false;
    }

    public function isNews()
    {
        $neww = Category::where('slug', 'news')->first();
        $news = Category::where('parent_id', $neww->id)->get();
        $news->push($neww);
        foreach ($news as $new) {
            if ($this->category_id == $new->id) {
                return true;
            }
        }
        return false;
    }

    public function isHelp()
    {
        $helpp = Category::where('slug', 'help')->first();
        $helps = Category::where('parent_id', $helpp->id)->get();
        $helps->push($helpp);
        foreach ($helps as $help) {
            if ($this->category_id == $help->id) {
                return true;
            }
        }
        return false;
    }

}
