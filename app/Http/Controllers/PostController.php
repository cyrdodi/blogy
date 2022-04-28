<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


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

  public function create()
  {
    $categories = Category::get();

    return view('post.create', ['categories' => $categories]);
  }

  public function store()
  {
    $attributes = request()->validate([
      'title' => 'required',
      'slug' => ['required', Rule::unique('categories', 'slug')],
      'excerpt' => 'required',
      'body' => 'required',
      'category_id' => ['required', Rule::exists('categories', 'id')]
    ]);

    $attributes['user_id'] = auth()->user()->id;

    Post::create($attributes);

    return redirect('/')->with('success', 'Your post has been published');
  }
}
