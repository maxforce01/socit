<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
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

}
