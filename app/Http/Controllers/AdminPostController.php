<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
  public function index()
  {
    return view('admin.posts.index', ['posts' => Post::paginate(10)]);
  }

  public function create()
  {
    $categories = Category::get();

    return view('admin.posts.create', ['categories' => $categories]);
  }

  public function store()
  {
    // store the image and get the path file
    $attributes = request()->validate([
      'title' => 'required',
      'slug' => ['required', Rule::unique('categories', 'slug')],
      'thumbnail' => 'required|image',
      'excerpt' => 'required',
      'body' => 'required',
      'category_id' => ['required', Rule::exists('categories', 'id')]
    ]);

    $path = request()->file('thumbnail')->store('thumbnail');

    $attributes['user_id'] = auth()->user()->id;
    $attributes['thumbnail'] = $path;

    Post::create($attributes);

    return redirect('/')->with('success', 'Your post has been published');
  }

  public function edit(Post $post)
  {
    return view('admin.posts.edit', ['post' => $post, 'categories' => Category::get()]);
  }

  public function update(Post $post)
  {
    // store the image and get the path file
    $attributes = request()->validate([
      'title' => 'required',
      'slug' => ['required', Rule::unique('categories', 'slug')->ignore($post->id)],
      'thumbnail' => 'image',
      'excerpt' => 'required',
      'body' => 'required',
      'category_id' => ['required', Rule::exists('categories', 'id')]
    ]);

    if (isset($attributes['thumbnail'])) {
      $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
    }

    $post->update($attributes);

    return redirect()->back()->with('success', 'You\'ve successfully updated the post');
  }

  public function destroy(Post $post)
  {
    $post->delete();
    return redirect()->back()->with('success', 'Post deleted');
  }
}
