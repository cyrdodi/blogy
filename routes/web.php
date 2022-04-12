<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
  $posts = Post::latest('published_at')->with('category', 'author');

  if (request('search')) {
    $posts = $posts
      ->where('title', 'like', '%' . request('search') . '%')
      ->orWhere('body', 'like', '%' . request('search') . '%');
  }

  return view('posts', [
    'posts' => $posts->get(),
    'categories' => Category::all(),
  ]);
})->name('home');

Route::get('/posts/{post:slug}', function (Post $post) {
  return view('post', ['post' => $post]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
  return view('posts', [
    'posts' => $category->post,
    'currentCategory' => $category,
    'categories' => Category::all()
  ]);
})->name('category');

Route::get('/author/{author:username}', function (User $author) {
  return view('posts', ['posts' => $author->posts, 'categories' => Category::all()]);
});
