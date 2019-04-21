<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Post;
use App\Tag;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index($slug)
    {
        $categoty = Category::where('slug',$slug)->first();
        $childs = Category::where('parent_id',$categoty->id)->get();
        $posts = collect();
        if(!empty($childs)) {
            $childs->push($categoty);
            foreach ($childs as $child)
            {
                foreach ($child->posts as $item) {
                    $posts->push($item);
                }
            }
        }
        else{
            $posts = $categoty->posts;
        }
        return view('posts.index',['posts'=>$posts->sortByDesc('created_at')]);
    }

    public function home_index()
    {
        $posts = Post::all();
        return view('posts.index',['posts'=>$posts->sortByDesc('created_at')]);
    }
    public function post($slug)
    {
        return view('posts.post',['post'=>Post::where('slug',$slug)->first()]);
    }

    public function delete($id)
    {
        Post::destroy($id);
        return redirect()->back();
    }

    public function tag($tag_id)
    {
        $tag = Tag::find($tag_id);
        return view('posts.index',['posts'=>$tag->posts->sortByDesc('created_at')]);
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->author_id = Auth::user()->id;
        $post->status = 'published';
        $post->setSlugAttribute();
        if ($request->file('image') == null) {
            $post->image = "";
        }else{
            $post->image = $request->file('image')->store('uploads','public');
            $photo = new Photo;
            $photo->photo = $post->image;
            $photo->user_id = Auth::user()->id;
            $photo->save();
        }
        if ($request->file('video') == null) {
            $post->video = "";
        }else{
            $post->video = $request->file('video')->store('uploads', 'public');
            $video = new Video;
            $video->video = $post->video;
            $video->user_id = Auth::user()->id;
            $video->save();
        }
        $post->save();
        foreach ($request->tags as $tag)
        {
            $post->tags()->attach($tag);
        }
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $response = collect();
        if($request->has('news')) {
            $new = Category::where('slug','news')->first();
            $categories = Category::where('parent_id',$new->id)->get();
            $categories->push($new);
            foreach ($categories as $category)
                foreach (Post::where('title', 'like', '%' . $request->find . '%')->where('category_id',$category->id)->get() as $post)
            $response->push($post);
        }
        if($request->has('help')){
            $help = Category::where('slug','help')->first();
            $categories = Category::where('parent_id',$help->id)->get();
            $categories->push($help);
            foreach ($categories as $category)
                foreach (Post::where('title', 'like', '%' . $request->find . '%')->where('category_id',$category->id)->get() as $post)
                    $response->push($post);}
        if($request->has('lessons')){
            $lessons = Category::where('slug','lessons')->first();
            $categories = Category::where('parent_id',$lessons->id)->get();
            $categories->push($lessons);
            foreach ($categories as $category)
                foreach (Post::where('title', 'like', '%' . $request->find . '%')->where('category_id',$category->id)->get() as $post)
                    $response->push($post);}
        return view('posts.index',['posts'=>$response->sortByDesc('created_at')]);
    }
}
