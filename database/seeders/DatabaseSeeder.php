<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::truncate();
    Category::truncate();
    Post::truncate();

    $user = User::factory()->create();

    $personal = Category::create([
      'name' => 'Personal',
      'slug' => 'personal'
    ]);

    $work = Category::create([
      'name' => 'Work',
      'slug' => 'work'
    ]);

    $hobbies = Category::create([
      'name' => 'Hobbies',
      'slug' => 'hobbies'
    ]);

    Post::create([
      'user_id' => $user->id,
      'category_id' => $personal->id,
      'title' => 'My personal post',
      'slug' => 'my-personal-post',
      'excerpt' => 'Excerpt of personal post',
      'body' => 'Body of personal Post'
    ]);

    Post::create([
      'user_id' => $user->id,
      'category_id' => $work->id,
      'title' => 'My work post',
      'slug' => 'my-work-post',
      'excerpt' => 'Excerpt of work post',
      'body' => 'Body of work Post'
    ]);

    Post::create([
      'user_id' => $user->id,
      'category_id' => $hobbies->id,
      'title' => 'My hobbies post',
      'slug' => 'my-hobbies-post',
      'excerpt' => 'Excerpt of hobbies post',
      'body' => 'Body of hobbies Post'
    ]);
  }
}
