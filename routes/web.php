<?php

use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth'])->group(function() {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    // POSTS
    Route::get('posts', [PostController::class, 'index'])
        ->name('posts.index');

    Route::get('posts/{id}', [PostController::class, 'show'])
        ->name('posts.show');

    // COMMENTS
    Route::get('comments', [CommentController::class, 'index'])
        ->name('comments.index');

    // USERS
    Route::get('users', [UserController::class, 'index'])
        ->name('users.index');
});
