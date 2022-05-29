<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Auth;


class PostsController extends Controller {

   // public function __construct()
   // {
   //      $this->middleware('auth');
   // }

   public function index(){
      $posts = Post::withCount('comments')->paginate(2);
      return view('posts.index',compact('posts'));
   }


   public function show($slug )
   {
      $post = Post::whereSlug($slug)->with('comments')->first();
      return view('posts.show',compact('post'));
   }


   public function create(){
      return view('posts.create');
   }

   public function store(PostRequest $request){
      Post::create([
         'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
         'title' => $request->title,
         'user_id' => Auth::user()->id,
         'description' => $request->title,
      ]);
      session()->flash('success','Post added Successfully');
      return redirect()->route('posts.index');
   }


   public function edit(Post $post){
      return view('posts.edit',compact('post'));
   }

   


   public function update(PostRequest $request, Post $post){
      $post->update([
         'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
         'title' => $request->title,
         'description' => $request->title,
      ]);
      session()->flash('success','Post updated Successfully');
      return redirect()->route('posts.index');
     
   }

   public function destroy(Group $group){
      $group->delete();
      session()->flash('success', __('site.deleted_successfully'));
      return redirect()->route('groups.index');
   }


   public function delete_all(){
      foreach (json_decode(request()->record_ids) as $recordId) {

         $group = Group::FindOrFail($recordId);
         $this->delete($group);

     }//end of for each

     session()->flash('success', __('site.deleted_successfully'));
     return redirect()->route('groups.index');
   }

   private function delete(Group $group)
    {
        $group->delete();

    }// end of delete

   
}
