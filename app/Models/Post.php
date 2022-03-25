<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
  public $title;
  public $date;
  public $body;
  public $excerpt;
  public $slug;

  public function __construct($title, $date, $body, $excerpt, $slug)
  {
    $this->title = $title;
    $this->date = $date;
    $this->body = $body;
    $this->excerpt = $excerpt;
    $this->slug = $slug;
  }

  // find all post
  public static function all()
  {
    /* 
      found files inside resource path with folder's name posts
      turn it into collection
      map it, return parse file with yaml front matter to read metadata
      and then map it again and return it as a Post object
    */
    return cache()->rememberForever('posts.all', function () {
      return collect(File::files(resource_path('posts')))
        ->map(function ($files) {
          return YamlFrontMatter::parseFile($files);
        })
        ->map(
          function ($documents) {
            return new Post(
              $documents->title,
              $documents->date,
              $documents->body(),
              $documents->excerpt,
              $documents->slug
            );
          }
        )->sortByDesc('date');
    });
  }

  // find a post by its slug
  public static function find($slug)
  {
    $post = static::all();

    return $post->firstWhere('slug', $slug);
  }
}
