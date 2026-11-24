<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('post.index', ['posts => $posts']);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $requests)
    {
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'published_at' => now(),
        ]);
        return redirect('/posts');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title, 
            'content' => $request->content,
        ]);
        return redirect('/posts');
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        return redirect('/posts');
    }
}
