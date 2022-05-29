<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController; 
use App\Http\Controllers\CommentsController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();


Route::get('/', [PostsController::class, 'index'])->name('posts.index');
Route::get('posts/show/{slug}', [PostsController::class, 'show'])->name('posts.show');


Route::group(['middleware' => ['auth']], function(){
    Route::get('posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('posts/store', [PostsController::class, 'store'])->name('posts.store');

    Route::get('posts/edit/{post}', [PostsController::class, 'edit'])->name('posts.edit');
    Route::post('posts/update/{post}', [PostsController::class, 'update'])->name('posts.update');


    Route::post('/add_comment', [CommentsController::class, 'store'])->name('comment.store');
});

// Route::get('/test', function () {
//     return view('home');
// });


//Route::resource('posts', PostsController::class);
