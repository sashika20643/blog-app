<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;
use App\Models\Category;

class BlogController extends Controller
{
      public function index()
    {
        $posts = Post::with('category')->orderBy('created_at', 'desc')->paginate(7);
        $categories=Category::all();
        $sideposts = Post::with('category')
    ->inRandomOrder()
    ->limit(5)
    ->get();

        return view('blog.pages.index', compact('categories','posts','sideposts'));
    }
    public function showPost($id)
    {
        $post = Post::findOrFail($id);
        $categories=Category::all();
        $sideposts = Post::with('category')
        ->inRandomOrder()
        ->limit(5)
        ->get();
        return view('blog.pages.post', compact('post','categories','sideposts'));
    }

    public function about(){
        $categories=Category::all();
        $sideposts = Post::with('category') ->inRandomOrder()
        ->limit(5)
        ->get();

        return view('blog.pages.about',compact('categories','sideposts'));
    }

    public function contact(){
        $categories=Category::all();
        $sideposts = Post::with('category') ->inRandomOrder()
        ->limit(5)
        ->get();

        return view('blog.pages.contact',compact('categories','sideposts'));
    }

    public function showcat($id)
    {
        $posts = Post::with('category')->where('category_id',$id)->orderBy('created_at', 'desc')->paginate(7);
        $categories=Category::all();
        $sideposts = Post::with('category')
    ->inRandomOrder()
    ->limit(5)
    ->get();

        return view('blog.pages.cat', compact('categories','posts','sideposts'));
    }
}
