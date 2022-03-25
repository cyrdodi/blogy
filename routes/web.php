<?php

use App\Models\Post;
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
  $posts = Post::all();

  $post = YamlFrontMatter::parseFile(resource_path() . '/posts/first-post.html');
  ddd($post);
  return view('posts', ['posts' => $post]);
});

Route::get('/posts/{post}', function ($slug) {
  $post = Post::find($slug);

  return view('post', ['post' => $post]);
})->where('post', '[A-z_\-]+'); // only allow alphanumeric, underscore and hyphen (constraining the url)
