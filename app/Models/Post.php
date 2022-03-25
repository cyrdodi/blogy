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
      fascade is class that can be used for a lot of functionality
      File is a fascade for the file system,
      File::files() is a method that returns an array of all files in a directory
     */
    $files = File::files(resource_path() . '/posts');
    // ddd($posts);
    // array_map is a function that takes a callback function and applies it to each element of an array
    return array_map(function ($post) {
      $documents = YamlFrontMatter::parseFile($post);
      return new Post(
        $documents->title,
        $documents->date,
        $documents->body(),
        $documents->excerpt,
        $documents->slug
      );
    }, $files);
  }

  // find a post by its slug
  public static function find($slug)
  {
    // resource_path() = laravel helper for finding the resources folder
    // app_path() = laravel helper for finding the app folder
    // base_path() = laravel helper for finding the root folder
    $path = resource_path() . "/posts/{$slug}.html";

    if (!file_exists($path)) {
      // if the file doesn't exist, throw an exception
      // model not found
      throw new ModelNotFoundException();
    }

    // if the file exists, return the contents of the file and cached it for 2 hour
    return cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path)); //arrow function for php ^8.0
  }
}
