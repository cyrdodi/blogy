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
    // merge array
    $attributes = array_merge(
      $this->validationRules(),
      [
        'user_id' => auth()->user()->id,
        'thumbnail' => request()->file('thumbnail')->store('thumbnail'),
      ]
    );

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
    $attributes = $this->validationRules($post);

    // if $attributes null then false; alternative for isset() in php 8
    if ($attributes['thumbnail'] ?? false) {
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

  // default param is null
  protected function validationRules(?Post $post = null): array // this fn return array
  {
    $post ??= new Post();

    return  request()->validate([
      'title' => 'required',
      'slug' => ['required', Rule::unique('categories', 'slug')->ignore($post->id)],
      'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
      'excerpt' => 'required',
      'body' => 'required',
      'category_id' => ['required', Rule::exists('categories', 'id')]
    ]);
  }
}
