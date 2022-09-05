<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetweetController;

/*

Web Routes

*/
////////////////// posts
Route::resource('posts', PostsController::class)->middleware('auth');



//////////////////////////////// profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile/edit/{user}',  [ProfileController::class, 'edit'])->name('profile.edit');
Route::put("update/{user}", [ProfileController::class, 'update'])->name('profile.update');
Route::get("user/{user}", [UserController::class, 'profile'])->name('user.profile');



/////////////////////// user
Route::get('follow/{user}', [UserController::class, 'follow'])->name('user.follow');
Route::get('followers/{user}', [UserController::class, 'follower'])->name('user.followers');
Route::get("userFollow/{user}", [FollowController::class, 'userFollow'])->name('user.makeFollow');
//////////////////// likes
Route::get('post/like/{post}', [LikesController::class, 'like'])->name('post.like');
//////////////////////////////// retweet
Route::get('post/retweet/{post}', [RetweetController::class, 'retweet'])->name('post.retweet');


///////////////////////// comments

Route::post('comment/', [CommentController::class, 'store'])->name('post.comment');

////////////////////////////////////////////////////
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
