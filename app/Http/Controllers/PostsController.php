<?php

namespace App\Http\Controllers;

use App\{Tag, Post, Category};
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;


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
        
        return view('posts.create', [
            'post' => new Post(),
            'categories'=> Category::get(),
            'tags'=> Tag::get()
            ]);
    }





    public function store (PostRequest $request)
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


        // validate request
        $attr = $request->all();

        // Assign title to the slug
        $attr['slug'] = \Str::slug(request('title'));
        $attr['category_id'] = request('category');
        //  Create New Post
        $post = Post::create($attr);
        
        $post->tags()->attach(request('tags'));

        

        session()->flash('success', 'The Post Was Created');

        return redirect()->to('posts');
    }



    public function show(Post $post)
    {
        
        return view('posts.show' , compact('post'));
    }





    public function edit(Post $post)
    {
        
        return view('posts.edit' ,[
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }



    public function update(PostRequest $request , Post $post)
    {       
            // validate request
            $attr = $request->all();
            $attr['category_id'] = request('category');
            $post->update($attr); 
            $post->tags()->sync(request('tags'));  
            session()->flash('success', 'The Post Was Updated');
            return redirect()->to('posts');
    }



    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        

        session()->flash("success" , "The Post Was Destroyed");

        return redirect('posts');
    }


}
