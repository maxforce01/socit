<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\NewMessage;
use App\Notification;
use App\Notifications\newNotification;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Sofa\Eloquence\Eloquence;

class EventController extends Controller
{
    public function removeLike($post_id)
    {
        Auth::user()->likes()->where('likeable_id',$post_id)->delete();
        $post = Post::find($post_id);
        $notification = new Notification;
        $notification -> user_id = $post->authorId->id;
        $notification->status = 0;
        $notification->from_user = Auth::user()->id;
        $notification ->text =" разонравилась ваша запись ".$post->title;
        $notification->save();
        $user  = User::find($post->authorId->id);
        broadcast(new NewMessage($notification));
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
        $post = Post::find($post_id);
        $notification = new Notification;
        $notification -> user_id = $post->authorId->id;
        $notification->status = 0;
        $notification->from_user = Auth::user()->id;
        $notification ->text =" понравилась ваша запись ".$post->title;
        $notification->save();
        $user  = User::find($notification->user_id);
        broadcast(new NewMessage($notification));
        return response()->json("ok");
    }
    public function repost($post_id){
        $post = Post::find($post_id);
        Auth::user()->repostPosts()->attach($post);
        $post = Post::find($post_id);
        $notification = new Notification;
        $notification -> user_id = $post->authorId->id;
        $notification->status = 0;
        $notification->from_user = Auth::user()->id;
        $notification ->text =" поделился вашей записью у себя на странице ".$post->title;
        $notification->save();
        $user  = User::find($notification->user_id);
        broadcast(new NewMessage($notification));
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

    public function refreshNotif($id)
    {
        $notifications = Notification::where('user_id',$id)->get();
        foreach ($notifications as $notification)
        {
            $notification->status = 1;
            $notification->save();
        }
        return response()->json("ok");
    }
}
