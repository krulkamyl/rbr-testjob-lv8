<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['logging-api', 'guest'])->group(function () {
    Route::resource('posts', PostController::class)->only('index', 'store', 'show', 'update', 'destroy');
    Route::resource('comments', CommentController::class)->only('index', 'store', 'show', 'update', 'destroy');
});
