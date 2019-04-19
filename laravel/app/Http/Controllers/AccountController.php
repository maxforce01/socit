<?php

namespace App\Http\Controllers;

use App\Job;
use App\Photo;
use App\Post;
use App\User;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function deletePhoto($id)
    {
        Photo::destroy($id);
        return redirect()->back();
    }
    public function deleteVideo($id)
    {
        Video::destroy($id);
        return redirect()->back();
    }
    public function allVideos()
    {
        $videos = Video::all()->sortByDesc('created_at');
        return view('videos.videos',['videos'=>$videos]);
    }
    public function allPhotos()
    {
        $images = Photo::all()->sortByDesc('created_at');
        return view('images.index',['images'=>$images]);
    }
    public function photo_store(Request $request)
    {
        $photo = new Photo;
        if ($request->file('photo') == null) {
            $photo->photo = "";
        }else{
            $photo->photo = $request->file('photo')->store('gallery/photo','public');
        }
        $photo->user_id = Auth::user()->id;
        $photo->save();
        return redirect()->back();
    }

    public function video_store(Request $request)
    {

        $video = new Video;
        if ($request->file('video') == null) {
            $video->video = "";
        }else{
            $video->video = $request->file('video')->store('gallery/video','public');
        }
        $video->user_id = Auth::user()->id;
        $video->save();
        return redirect()->back();
    }
    public function photos($id)
    {
        $user = User::find($id);
        return view('account.photos.index',['user'=>$user,'photos'=>$user->photos]);
    }
    public function videos($id)
    {
        $user = User::find($id);
        return view('account.videos.index',['user'=>$user,'videos'=>$user->videos]);
    }
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
        $posts = Auth::user()->posts;
        $response = collect();
        foreach ($posts as $post)
        {
            $response->push($post);
        }
        foreach (Auth::user()->repostPosts as $post)
        {
            $response->push($post);
        }
        return view('account.index',['user'=>Auth::user(),'posts'=>$response]);
    }
    public function about($id)
    {
        $user = User::find($id);
        return view('account.about.index',['user'=>$user]);
    }
    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('account.about.edit',['user'=>$user]);
    }
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->profession = $request->profession;
        $user->name = $request->name;
        $user->Birth = $request->Birth;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->status = $request->status;
        $user->about = $request->about;
        if ($request->file('avatar') != null) {
            $user->avatar = $request->file('avatar')->store('avatars','public');
        }
         $user->interests()->detach();
        $user->languages()->detach();
        foreach ($request->interests as $interest)
        {
            $user->interests()->attach($interest);
        }

        foreach ($request->lang as $lang)
        {
            $user->languages()->attach($lang);
        }
        $user->save();
        return view('account.about.index',['user'=>$user]);
    }
    public function editWork($id)
    {
        $work = Job::find($id);
        return view('account.about.work.index',['work'=>$work,'user'=>Auth::user()]);
    }
    public function createWork()
    {
        return view('account.about.work.index',['user'=>Auth::user()]);
    }
    public function updateWork(Request $request)
    {
        if($request->id != null)
        $job = Job::find($request->id);
        else {
            $job = new Job;
            $job->user_id = Auth::user()->id;
        }
        $job->company = $request->company;
        $job->position = $request->position;
        $job->start = $request->start;
        $job->end = $request->end;
        $job->save();
        return view('account.about.index',['user'=>Auth::user()]);
    }
}
