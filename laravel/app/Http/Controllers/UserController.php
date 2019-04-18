<?php

namespace App\Http\Controllers;

use App\Events\newNotification;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('users.index',['users'=>User::all()]);
    }
    public function subscriptions()
    {
        $users = User::all();
        $reponce = collect();
        foreach ($users as $user) {
            if(Auth::user()->isSubscribe($user)) {
                $reponce->push($user);
            }
        }
        return view('users.index',['users'=>$reponce]);
    }
    public function subscriptionsUser($id)
    {
        $user = User::find($id);
        $responce = $user->subscriptions;
        return view('users.index',['users'=>$responce]);
    }
    public function subscribe($id)
    {
        $user = User::find($id);
        Auth::user()->subscriptions()->attach($user);
        $notification = new Notification;
        $notification -> user_id = $id;
        $notification->read = 0;
        $notification->from_user = Auth::user()->id;
        $notification ->text =" подписался на вас. Подпишитесь если хотите просматривать сообщения";
        $notification->save();
        broadcast(new newNotification($notification));
        return response()->json("ok");
    }
    public function unsubscribe($id)
    {
        $user = User::find($id);
        Auth::user()->subscriptions()->detach($user);
        $notification = new Notification;
        $notification -> user_id = $id;
        $notification->read = 0;
        $notification->from_user = Auth::user()->id;
        $notification ->text =" отписался на вас.";
        $notification->save();
        broadcast(new newNotification($notification));
        return response()->json("ok");
    }
    public function thisUser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function chat()
    {
        return view('chat.chat');
    }
    public function notifications()
    {
        return view('notifications.index',['notifications'=> Notification::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get()]);
    }
}
