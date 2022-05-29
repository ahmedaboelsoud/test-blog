@extends('templates.base')
@section('content')

  @if($post)
  <div class="w3-card-4 w3-margin w3-white">
  
    <div class="w3-container">
      <h3><b>{{ $post->title }}</b></h3>
      <h5><span class="w3-opacity">{{ $post->created_at->diffForHumans() }}</span></h5>
    </div>

    <div class="w3-container">
      <p>{{ $post->description }}.</p>
    </div>
  </div>
  @endif

  {{-- End POST --}}

        


  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
      <h3><b>Add Comment</b></h3>
      <hr>
      
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <form action="{{ route('comment.store') }}" method="POST" >
      @csrf
      <div class="form-group">
        <label for="exampleInputPassword1">Comment : </label>
        <input hidden name="post_id" value="{{ $post->id }}"/>
        <input hidden name="post_slug" value="{{ $post->slug }}"/>
        <textarea name="comment" id="exampleInputPassword1" class="form-control"></textarea>
      </div>
     
      <button type="submit" class="btn btn-primary">Submit</button>
      
    </form>
    <br>
  </div>
  </div>

  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
      <h3><b>Comments</b></h3>
       @if($post->comments)
        @foreach($post->comments as $comment)
        <h5>{{ $comment->user->name}} </h5>
        <h6>{{ $comment->created_at->diffForHumans() }} </h6>
        <p>{{ $comment->comment}} </p>
        <hr>
        @endforeach
       @endif
      <hr>
    </div>
  </div>  

  @stop()