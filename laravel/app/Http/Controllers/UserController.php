<?php

namespace App\Http\Controllers;

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
        return response()->json("ok");
    }
    public function unsubscribe($id)
    {
        $user = User::find($id);
        Auth::user()->subscriptions()->detach($user);
        return response()->json("ok");
    }
    public function thisUser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
}
