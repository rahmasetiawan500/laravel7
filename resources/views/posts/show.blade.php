@extends('layouts.app')
@section('title' , $post->title )
@section('content')
    <h4> {{ $post->title }} </h4>
<div class="text-secondary">
  <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a>
  &middot; {{ $post->created_at->format('d F Y') }}
  &middot;
  @foreach ($post->tags as $tag)
      <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
  @endforeach
</div>
<hr>
    <p>{{ $post->body }}</p>

    <div>
      <div class="text-secondary mb-4">
       <P>Author: {{ $post->user->name }} </P> 
      </div>
      @can('delete', $post)
        {{-- @if (auth()->user()->is($post->user)) --}}
         <!-- Button trigger modal -->
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
    Delete
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
        <div> {{ $post->title }} </div>
       <small> <div class="text-secondary"> Publish on {{ $post->created_at->format("d M Y") }}</div></small>

        </div>
        <div class="modal-footer">
            <form action="/posts/{{ $post->slug }}/delete" method="post">
                @csrf
                @method("delete")
        
                    <button class="btn btn-danger" type="submit">
                        YA
                    </button>
        
                </form>
        <button type="button" class="btn btn-success" data-dismiss="modal">TIDAK</button>
        </div>
      </div>
    </div>
  </div>
{{-- @endif --}}
      @endcan





    </div>
@endsection