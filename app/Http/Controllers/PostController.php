<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;
use App\Models\Category;
use App\Models\Contact;

use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
public function indexpage(){
    $totalposts = Post::count();
    $categories = Category::count();
    $message=Contact::count();

    return view('Admin.pages.index',compact('totalposts','categories','message'));


}

    public function index()
    {
        $posts = Post::with('category')->get();
        return view('Admin.pages.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Admin.pages.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('Admin.pages.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->update(['image' => $imagePath]);
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        // Delete associated image
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function search(Request $request)
{
    $query = $request->input('query');

    $posts = Post::with('category')
        ->where('title', 'LIKE', "%$query%")
        ->orWhere('content', 'LIKE', "%$query%")
        ->get();

        $sideposts = Post::with('category')
        ->inRandomOrder()
        ->limit(5)
        ->get();
    $categories = Category::all();

    return view('blog.pages.spost', compact('categories', 'posts','sideposts'));
}

}
