<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  use HasFactory;

  protected $with = ['author', 'category'];

  protected $guarded = [];

  public function scopeFilter($query, array $filters)
  {
    $query->when(isset($filters['search']), function ($query) use ($filters) {
      $query
        ->where('title', 'like', '%' . $filters['search'] . '%')
        ->orWhere('body', 'like', '%' . $filters['search'] . '%');
    });


    $query->when(isset($filters['category']), function ($query) use ($filters) {
      $query
        ->whereHas('category', function ($query) use ($filters) {
          $query->where('slug', $filters['category']);
        });
    });

    $query->when(isset($filters['author']), function ($query) use ($filters) {
      $query
        ->whereHas('author', function ($query) use ($filters) {
          $query->where('username', $filters['author']);
        });
    });
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
