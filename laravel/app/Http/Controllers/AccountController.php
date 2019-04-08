<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function userAccount($id)
    {
        $user = User::find($id);
        $posts = $user->posts;
        $response = collect();
        foreach ($posts as $post)
        {
            $response->push($post);
        }
        foreach ($user->repostPosts as $post)
        {
            $response->push($post);
        }

        return view('account.index',['user'=>$user,'posts'=>$response]);
    }
    public function myAccount()
    {
        return view('account.index',['user'=>Auth::user(),'posts'=>Auth::user()->posts]);
    }
}
