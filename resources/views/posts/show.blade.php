@extends('layouts.app')
@section('title' , $post->title )
@section('content')
    <h4> {{ $post->title }} </h4>
    <p>{{ $post->body }}</p>

    <div>

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


        
    </div>
@endsection