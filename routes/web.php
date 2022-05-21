<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comment', [PostCommentController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
ROute::post('/session', [SessionsController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::post('/subscribe', NewsletterController::class);

Route::get('/admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');

Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::post('/admin/posts/create', [AdminPostController::class, 'store'])->middleware('admin');
