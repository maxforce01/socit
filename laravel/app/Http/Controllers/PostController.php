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
        $lesson = Category::where('slug','lessons')->first();
        $lessons_childs = Category::where('parent_id',$lesson->id)->get();
        if(!empty($lessons_childs)) {
            $lessons_childs->push($lesson);
        }
        $help = Category::where('slug','help')->first();
        $help_childs = Category::where('parent_id',$help->id)->get();
        if(!empty($help_childs)) {
            $help_childs->push($help);
        }

        $news = Category::where('slug','news')->first();
        $news_childs = Category::where('parent_id',$news->id)->get();
        if(!empty($news_childs)) {
            $news_childs->push($news);
        }
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
        return view('posts.index',['posts'=>$posts->sortByDesc('created_at'),'news'=>$news_childs,'lessons'=>$lessons_childs,'helps'=>$help_childs]);
    }

    public function home_index()
    {

        $lesson = Category::where('slug','lessons')->first();
        $lessons_childs = Category::where('parent_id',$lesson->id)->get();
        if(!empty($lessons_childs)) {
            $lessons_childs->push($lesson);
        }
        $help = Category::where('slug','help')->first();
        $help_childs = Category::where('parent_id',$help->id)->get();
        if(!empty($help_childs)) {
            $help_childs->push($help);
        }

        $news = Category::where('slug','news')->first();
        $news_childs = Category::where('parent_id',$news->id)->get();
        if(!empty($news_childs)) {
            $news_childs->push($news);
        }
        $posts = Post::all();
        return view('posts.index',['posts'=>$posts->sortByDesc('created_at'),'news'=>$news_childs,'lessons'=>$lessons_childs,'helps'=>$help_childs]);
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
        $lesson = Category::where('slug','lessons')->first();
        $lessons_childs = Category::where('parent_id',$lesson->id)->get();
        if(!empty($lessons_childs)) {
            $lessons_childs->push($lesson);
        }
        $help = Category::where('slug','help')->first();
        $help_childs = Category::where('parent_id',$help->id)->get();
        if(!empty($help_childs)) {
            $help_childs->push($help);
        }

        $news = Category::where('slug','news')->first();
        $news_childs = Category::where('parent_id',$news->id)->get();
        if(!empty($news_childs)) {
            $news_childs->push($news);
        }
        $tag = Tag::find($tag_id);
        return view('posts.index',['posts'=>$tag->posts->sortByDesc('created_at'),'news'=>$news_childs,'lessons'=>$lessons_childs,'helps'=>$help_childs]);
    }

}
