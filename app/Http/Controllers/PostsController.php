<?php

namespace App\Http\Controllers;

use App\{Tag, Post, Category};
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;


class PostsController extends Controller
{
    
    public function index ()
    {
        
        $posts = Post::latest()->paginate(6);
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
            $request->validate([
                'thumbnail' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);


            $attr = $request->all();
            $slug =  \Str::slug(request('title'));
            $attr['slug'] = $slug;

            $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store("images/post") : null;

            $attr['category_id'] = request('category');
            $attr['thumbnail'] = $thumbnail;
            //  Create New Post
            $post = auth()->user()->posts()->create($attr);
            
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
            $request->validate([
                'thumbnail' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);

        
            $this->authorize('update', $post);

            if (request()->file('thumbnail')) {
                # code...
                \Storage::delete($post->thumbnail);
                $thumbnail = request()->file('thumbnail')->store("images/post");

            } else{
                $thumbnail = $post->thumbnail;
            }

            
        
        
            
            // validate request
            $attr = $request->all();
            $attr['category_id'] = request('category');
            $attr['thumbnail'] = $thumbnail;

            $post->update($attr); 
            $post->tags()->sync(request('tags'));  
            session()->flash('success', 'The Post Was Updated');
            return redirect()->to('posts');
    }



    public function destroy(Post $post)
    {   
        \Storage::delete($post->thumbnail);
        $this->authorize('delete', $post);
        session()->flash("success" , "The Post not Destroyed ");
        return redirect('posts');
        
 
        



    }


}
