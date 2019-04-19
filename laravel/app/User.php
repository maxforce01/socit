<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use Illuminate\Support\Facades\Auth;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['Birth'];
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        return $this->hasMany('App\Post','author_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Likeable','user_id');
    }
    public function hasLikedPost(Post $post)
    {
        return (bool) $post->likes
                    ->where('likeable_id',$post->id)
                    ->where('likeable_type','App\Post')
                    ->where('user_id',$this->id)
                    ->count();
    }
    public function comments()
    {
        return $this->hasMany('App\Comment','user_id');
    }
    public function subscriptions()
    {
        return $this->belongsToMany('App\User', 'user_user', 'user_id','subscriber_id')->withTimestamps();
    }
    public function subscribers()
    {
        return $this->belongsToMany('App\User', 'user_user', 'subscriber_id','user_id')->withTimestamps();
    }

    public function isSubscribe(User $user)
    {
        foreach ($this->subscriptions as $one)
        {
            if($one->id == $user->id)
                return true;
        }
        return false;
    }

    public function repostPosts()
    {
        return $this->belongsToMany('App\Post','repost')->withTimestamps();
    }
    public function isRepost(Post $this_post)
    {
        foreach ($this->repostPosts as $post)
        {
            if($this_post->id == $post->id)
                return true;
        }
        return false;
    }

    public function photos()
    {
        return $this->hasMany('App\Photo','user_id');
    }
    public function videos()
    {
        return $this->hasMany('App\Video','user_id');
    }
    public function  notifications()
    {
        return $this->hasMany('App\Notification');
    }
    public function jobs()
    {
        return $this->hasMany('App\Job','user_id');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Language','user_language');
    }
    public function interests()
    {
        return $this->belongsToMany('App\Tag','tags_users');
    }
    public function isTag(Tag $tag)
    {
        foreach ($this->interests as $interest)
        {
            if($interest->id == $tag->id)
                return true;
        }
        return false;
    }
    public function isLanguage(Language $language)
    {
        foreach ($this->languages as $lang)
        {
            if($lang->id == $language->id)
                return true;
        }
        return false;
    }

}
