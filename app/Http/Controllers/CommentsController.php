<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use Auth;


class CommentsController extends Controller {

   public function __construct()
   {
        $this->middleware('auth');
   }

   public function store(CommentRequest $request){
      Comment::create([
         'user_id' => Auth::user()->id,
         'post_id' => $request->post_id,
         'comment' => $request->comment,
      ]);
      session()->flash('success', 'Comment Added Successfully');
      return redirect('posts/show/'.$request->post_slug);
   }

   
}
