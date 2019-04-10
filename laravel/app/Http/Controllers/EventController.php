<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Sofa\Eloquence\Eloquence;

class EventController extends Controller
{
    public function removeLike($post_id)
    {
        Auth::user()->likes()->where('likeable_id',$post_id)->delete();
        return response()->json("ok");
    }
    public function getLike($post_id)
    {
        $post = Post::find($post_id);
        if(Auth::user()->hasLikedPost($post))
        {
            return route('post.removelike');
        }
        $like = $post->likes()->create([]);
        $like->user_id = Auth::user()->id;
        Auth::user()->likes()->save($like);
        return response()->json("ok");
    }
    public function repost($post_id){
        $post = Post::find($post_id);
        Auth::user()->repostPosts()->attach($post);
        return response()->json("ok");
    }
    public function unrepost($post_id){
        $post = Post::find($post_id);
        Auth::user()->repostPosts()->detach($post);
        return redirect()->back();
    }
    public function child($id)
    {
        return response()->json(Category::where('parent_id',$id)->get());
    }
    public function parent()
    {
        return response()->json(Category::where('parent_id',null)->get());
    }
    public function tags()
    {
        return response()->json(Tag::all());
    }
}
