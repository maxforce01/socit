<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function send(Request $request)
    {
        $comment = new Comment;
        $comment->title = $request->title;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->user_name = Auth::user()->name;
        $comment->user_avatar =Auth::user()->avatar;
        $comment->save();
        return response()->json($comment);
    }

    public function delete($id)
    {
        Comment::destroy($id);

        return response()->json("ok");;
    }
}
