<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\CommentController;
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

/*Route::get('/home', function () {
    return view('index');
});*/
Route::get('/home' ,[\App\Http\Controllers\LandingController::class ,'index'])->name('landing');
Route::get('/home/search' ,[\App\Http\Controllers\LandingController::class ,'search'])->name('landing.search');
Route::get('/home/posts/{post}' ,[\App\Http\Controllers\PostShowController::class ,'show'])->name('post.show');

//Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class.'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified','auth.admin'])->group(function (){
    Route::resource('/dashboard/users', UserController::class);
    Route::resource('dashboard/categories' ,\App\Http\Controllers\CategoriesController::class)->except(['show','create']);
    Route::get('dashboard/comments' ,[\App\Http\Controllers\CommentController::class ,'index'])->name('comments.index');
    Route::post('dashboard/comments' ,[\App\Http\Controllers\CommentController::class ,'store'])->name('comments.store');
    Route::delete('dashboard/comments/{comment}' ,[CommentController::class ,'destroy'])->name('comments.destroy');
    Route::put('dashboard/comments/{comment}',[CommentController::class ,'update'])->name('comments.update');
});

Route::middleware(['auth','author','verified'])->group(function (){

Route::post('/posts/editor',[\App\Http\Controllers\PostEditorController::class , 'uplod'])->name('posts-editor');
Route::resource('dashboard/posts', \App\Http\Controllers\PostController::class);
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
