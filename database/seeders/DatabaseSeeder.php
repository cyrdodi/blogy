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

    $user = User::factory()->create([
      'name' => 'Dodi Yulian'
    ]);

    Post::factory(5)->create([
      'user_id' => $user->id
    ]);
  }
}
