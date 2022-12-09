<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

// Admin
Route::get('admin/home', function () {
    return view('admin.home');
})->middleware('admin');

// User
Route::middleware('user')->group(function() {
    Route::get('/home', [MovieController::class, 'index']);
    Route::get('/search', [MovieController::class, 'index']);
    
    Route::prefix('/movie')->group(function() {
        Route::get('/{movie_id}', [MovieController::class, 'movieDetail']);
        Route::post('/{movie_id}/comment', [CommentController::class, 'store'])->name('comment.store');
        Route::patch('/comment/{comment_id}', [CommentController::class, 'update'])->name('comment.update');
        Route::delete('/comment/{comment_id}', [CommentController::class, 'destroy'])->name('comment.destroy');
    });
});
