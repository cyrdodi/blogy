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
    // store the image and get the path file
    $path = request()->file('thumbnail')->store('thumbnail');

    $attributes = request()->validate([
      'title' => 'required',
      'slug' => ['required', Rule::unique('categories', 'slug')],
      'thumbnail' => 'required|image',
      'excerpt' => 'required',
      'body' => 'required',
      'category_id' => ['required', Rule::exists('categories', 'id')]
    ]);

    $attributes['user_id'] = auth()->user()->id;
    $attributes['thumbnail'] = $path;

    Post::create($attributes);

    return redirect('/')->with('success', 'Your post has been published');
  }
}
