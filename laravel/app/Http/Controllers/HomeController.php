<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
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
        $posts = collect();
        foreach (Auth::user()->subscriptions as $user)
        {
            foreach ($user->posts as $post)
                $posts->push($post);
        }
        return view('home',['posts'=>$posts->sortByDesc('created_at'),'news'=>$news_childs,'lessons'=>$lessons_childs,'helps'=>$help_childs]);
    }
}
