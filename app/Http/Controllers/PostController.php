<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        return inertia('Posts/Index',compact('posts'));
    }

    public function create(){

        return inertia('Posts/Create');
    }

    public function store(Request $request)
    {

        // sleep(2);
        $request->validate([
              'title' => ['required', 'max:100'],
              'description' => ['required', 'max:1000'],
        ]);

            Post::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);

        return to_route('posts')->with('success', 'Post created successfully');
    }

    public function edit($id)
    {

        $post = Post::find($id);
        return inertia('Posts/Edit', compact('post'));
    }

    public function update(Request $request)
    {

        $request->validate([
              'title' => ['required', 'max:100'],
              'description' => ['required', 'max:1000'],
        ]);

            Post::where('id', $request->postId)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

        return to_route('posts')->with('success', 'Post updated successfully');
    }

    public function delete($id)
    {

        Post::find($id)->delete();
        return to_route('posts')->with('success', 'Post deleted successfully');
    }
}
