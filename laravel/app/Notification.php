<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{
    public function user()
    {
      return  $this->belongsTo('App\User','from_user');
    }
    public function toUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
