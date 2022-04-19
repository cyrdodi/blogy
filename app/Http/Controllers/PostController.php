<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    return view('post.index', [
      'posts' => Post::filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString(),
    ]);
  }

  public function show(Post $post)
  {
    return view('post.show', ['post' => $post]);
  }
}
