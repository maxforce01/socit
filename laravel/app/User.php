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
        foreach (Auth::user()->subscriptions as $one)
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
        foreach (Auth::user()->repostPosts as $post)
        {
            if($this_post->id == $post->id)
                return true;
        }
        return false;
    }

}
