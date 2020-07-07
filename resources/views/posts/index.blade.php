@extends('layouts.app')
@section('title' , 'Posts')
@section('content')
<div class="container">
<div class="d-flex justify-content-between">
    <div>
        <h4>All posts</h4>
    </div>
    <div>
        <a href="posts/create" class="btn btn-primary">New Post</a>
    </div>
</div>
<hr>
<div class="row">
        @forelse ($posts as $post)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <div>
                    {{Str::limit( $post->body, 100) }}
                    </div>
                <a href="\posts\{{ $post->slug }}">ReadMore</a>
                </div>
                <div class="card-footer">
                    <div class="">
                     Publish on   {{ $post->created_at->format("d F Y") }}
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
