<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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

//Route::get('/home', [PageController::class, 'home'])->name('home');

// Route::get('posts',[PostsController::class,'index'])->name('posts');
// Route::get('create',[PostsController::class,'create'])->name('create');
//  Route::post('show',[PostsController::class,'show'])->name('show');
Route::resource('posts', PostsController::class);
// Route::resource('profile', ProfileController::class);
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile/edit/{user}',  [ProfileController::class, 'edit'])->name('profile.edit');
Route::put("update/{user}", [ProfileController::class, 'update'])->name('profile.update');
Route::get("user/{user}", [UserController::class, 'profile'])->name('user.profile');
// Route::post('store',[PostsController::class,'store'])->name('store');

//////////////////// posts

// Route::get('posts', function () {
//     return view('index.blade.php');
// })->middleware(['auth'])->name('posts');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
