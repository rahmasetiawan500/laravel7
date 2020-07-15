@extends('layouts.app')
@section('title' , 'Posts')
@section('content')
<div class="container">
{{-- judul --}}
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
         
    
        </div>
    </div>
    <hr>
    
{{-- data table --}}
    <div class="row">
        <div class="col-md-7">
            @forelse ($posts as $post)
            <div class="card mb-4">
                @if ($post->thumbnail)
                <a href="{{ route('posts.show', $post->slug) }}">
                    <img style="
                    height: 400px;
                    object-fit: cover;
                    object-position: center;" class="card-img-top" src="{{ $post->takeImage }}">
                </a>
                @endif
                <div class="card-body">
                    <div>
                        <small>
                            <a href="{{ route('categories.show', $post->category->slug) }}" class="text-secondary">{{ $post->category->name }} - </a>
                        </small>
                        @foreach ($post->tags as $tag)
                        <small>
                            <a href="{{ route('tags.show', $tag->slug) }}" class="text-secondary">{{ $tag->name }}</a>
                        </small>
                        @endforeach
                    </div>
                    <h5>
                    <a class="card-title text-dark" href="{{ route('posts.show', $post->slug) }}">
                        {{ $post->title }}
                    </a>
                    </h5>
                    <div class="text-secondary my-3">
                        {{Str::limit( $post->body, 130) }}
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class=" media align-items-center">
                            <img 
                            width="30"
                            class="rounded-circle mr-3"
                            src="{{ $post->user->gravatar() }}" >
                            <div class="media-body ">
                            <div>
                                {{ $post->user->name }}
                            </div>
                            </div>
                            </div>
                        <div class="text-secondary">
                            <small>
                                Publish on {{ $post->created_at->format("d F Y") }}
                            </small>
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
    </div>
            {{ $posts->links() }}

@endsection
