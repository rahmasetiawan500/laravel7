@extends('layouts.app')
@section('title' , $post->title )
@section('content')

    @if ($post->thumbnail)
        <img style="
        height: 400px;
        object-fit: cover;
        object-position: center;" class="card-img-top rounded" src="{{ $post->takeImage }}">
    @endif


    
    <h2 class="my-3"> {{ $post->title }} </h2>

    <div class="text-secondary">
      <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a>
      &middot; {{ $post->created_at->format('d F Y') }}
      &middot;
      @foreach ($post->tags as $tag)
          <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
      @endforeach
      <div class=" media my-3">
        <img 
        width="50"
        class="rounded-circle mr-3"
        src="{{ $post->user->gravatar() }}" >
        <div class="media-body">
          <div>
            {{ $post->user->name }}
          </div>
          <div>
          {{  '@'.$post->user->username }}
          </div>
        </div>
        </div>
    </div>

    <div class="mt-2">
      <p>{!! nl2br($post->body)  !!}</p>
    </div>


    <div>

      @can('update', $post)
      <a href="/posts/{{ $post->slug }}/edit" class="btn btn-success mr-2">Edit</a>
      @endcan
      
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