<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function send(Request $request)
    {
        $comment = new Comment;
        $comment->title = $request->title;
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        Comment::destroy($id);

        return redirect()->back();
    }
}
