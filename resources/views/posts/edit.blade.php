@extends('templates.base')
@section('content')

  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
      <h3><b>Edit Post</b></h3>
      <hr>
    @include('partials._errors')  

    <form action="{{ route('posts.update', $post->id ) }}" method="POST" >
      @csrf

      <div class="form-group">
        <label for="exampleInputPassword1">Title : </label>
        <input type="text" name="title" value="{{ $post->title }}" class="form-control" />
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Description : </label>
        <textarea name="description" id="exampleInputPassword1" class="form-control">{{ $post->description }}</textarea>
      </div>
     
      <button type="submit" class="btn btn-primary">Submit</button>
      
    </form>
    <br>
  </div>
  </div>

 
  @stop()