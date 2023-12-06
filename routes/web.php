<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'home']);

Route::post('/register', [AuthController::class, 'register']);
Route::get('/register', [AuthController::class, 'indexr']);
Route::get('/login', [AuthController::class, 'index'])->name('Authentication')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/post', [PostController::class, 'index']);
Route::post('/post', [PostController::class, 'store']);
Route::get('/edit-post/{post:id}', [PostController::class, 'showEdit']);

Route::get('/post/{post:id}', [PostController::class, 'show']);
Route::get('/posts/{user:username}', [PostController::class, 'showByUser']);
Route::get('/post_store', [PostController::class, 'index_store']);

Route::patch('/post/{post:id}', [PostController::class, 'update']);
Route::delete('/post/{post:id}', [PostController::class, 'destroy']);
Route::post('/comment', [CommentController::class, 'store'])->name('Comment');
