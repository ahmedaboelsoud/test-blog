@extends('templates.base')
@section('content')
@include('partials._session')  
 <div class=" w3-margin w3-white">
   <a href="{{ route('posts.create')}}" class="w3-button w3-padding-large w3-white w3-border"  >Create Post</a>
 </div> 
  @if($posts)
  @foreach($posts as $post)
  <div class="w3-card-4 w3-margin w3-white">
  
    <div class="w3-container">
      <h3><b>{{ $post->title }}</b></h3>
      <h5><span class="w3-opacity">{{ $post->created_at->diffForHumans() }}</span></h5>
    </div>

    <div class="w3-container">
      <p>{{ $post->description }}.</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p>
            <a href="{{ route('posts.show',$post->slug) }}" class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></a>
            <a href="{{ route('posts.edit',$post->id) }}" class="w3-button w3-padding-large w3-white w3-border"><b>Edit</b></a>
          </p>
          
        </div>
       
         
        
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-badge">{{$post->comments_count}}</span></span></p>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  @endif
  
  <div class="w3-container">
    <div class="d-flex justify-content-center">
      {!! $posts->links() !!} 
    </div>
  </div>

  @stop()