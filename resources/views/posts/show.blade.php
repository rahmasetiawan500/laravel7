@extends('layouts.app')
@section('title' , $post->title )
@section('content')
    <h4> {{ $post->title }} </h4>
    <p>{{ $post->body }}</p>

    <div>
        <form action="/posts/{{ $post->slug }}/delete" method="post">
        @csrf
        @method("delete")

            <button class="btn btn-link text-danger btn-sm p-0" type="submit">
                Delete
            </button>

        </form>
        
    </div>
@endsection