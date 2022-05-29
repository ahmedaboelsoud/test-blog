@extends('templates.base')
@section('content')

  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
      <h3><b>Add Post</b></h3>
      <hr>
    @include('partials._errors')  

    <form action="{{ route('posts.store') }}" method="POST" >
      @csrf

      <div class="form-group">
        <label for="exampleInputPassword1">Title : </label>
        <input type="text" name="title" class="form-control" />
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Description : </label>
        <textarea name="description" id="exampleInputPassword1" class="form-control"></textarea>
      </div>
     
      <button type="submit" class="btn btn-primary">Submit</button>
      
    </form>
    <br>
  </div>
  </div>

 
  @stop()