<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  //

  public function create()
  {
    return view('register.create');
  }

  public function store()
  {
    $attributes = request()->validate([
      'name' => 'required',
      'username' => 'required',
      'email' => ['required', 'email'],
      'password' => ['required', 'min:3'],
    ]);

    $user = User::create($attributes);

    auth()->login($user);

    return redirect('/')->with('success', 'Your account has been created!');
  }
}
