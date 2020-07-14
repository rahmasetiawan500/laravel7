@extends('layouts.app')
@section('title' , 'Posts')
@section('content')
<div class="container">
<div class="d-flex justify-content-between">
    <div>
        @if (isset($category))
        <h4>Category {{ $category->name }}</h4>
        @elseif(isset($tag))
        <h4>Tag {{ $tag->name }}</h4>
        @else
        <h4>All posts</h4>
        @endif
   

    </div>
    <div>
        @if (Auth::check())
        <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary">Login to new create post</a>
        @endif

    </div>
</div>
<hr>
<div class="row">
        @forelse ($posts as $post)
        <div class="col-md-4">
            <div class="card mb-4">

                @if ($post->thumbnail)
                <img style="
                height: 200px;
                object-fit: cover;
                object-position: center;"
                class="card-img-top" src="{{ $post->takeImage }}">
                @endif

                <div class="card-body">
                    <div class="card-title">
                        {{ $post->title }}
                    </div>
                    
                    <div>
                    {{Str::limit( $post->body, 100) }}
                    </div>
                <a href="\posts\{{ $post->slug }}">ReadMore</a>
                </div>
                <div class="card-footer ">
                    <div class="d-flex justify-content-between">
                    Publish on   {{ $post->created_at->format("d F Y") }}
                    @can('update', $post)
                    <a href="/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-success">Edit</a>
                    @endcan
                    
                    
                </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <div class="alert alert-info align-content-center">
               Data Kosong
            </div>
        </div>
        @endforelse
</div>
<div class="d-flex justify-content-center">
    <div class="">
        {{ $posts->links() }}
    </div>
</div>


</div>
@endsection
