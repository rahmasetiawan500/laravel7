<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;


class PostsController extends Controller
{
    public function index ()
    {
        
        $posts = Post::paginate(5);
        return view('posts.index' , [

            'posts'=>$posts,

            ]);
    }

    public function create ()
    {
        
        return view('posts.create');
    }

    public function store (Request $request)
    {
        // $post = new Post;
        // $post->title = $request->title;
        // $post->slug = \Str::slug($request->title);
        // $post->body = $request->body;
        // $post->save();
        

        // Post::create([
        //     'title' => $request->title,
        //     'slug' => \Str::slug($request->title),
        //     'body' => $request->body,
        // ]); 
        
        // validate the field
        $attr = request()->validate([
            'title' => 'required|min:3',
            'body' => 'required',
        ]);

        // Assign title to the slug
        $attr['slug'] = \Str::slug(request('title'));

        //  Create New Post
        Post::create($attr);
        return redirect()->to('posts');
    }

    public function show (Post $post)
    {
        
        return view('posts.show' , compact('post'));
    }
}
