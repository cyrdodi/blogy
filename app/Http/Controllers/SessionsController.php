<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
  public function create()
  {
    return view('sessions.create');
  }

  public function store()
  {
    $attributes = request()->validate([
      'email' => 'required|exists:users,email',
      'password' => 'required'
    ]);

    if (auth()->attempt($attributes)) {
      // prevent session fixation
      session()->regenerate();
      redirect('/')->with('success', 'Welcome back');
    }

    throw ValidationException::withMessages([
      'email' => 'Your provided credentials could not be verified'
    ]);

    // return back()->withInput()->withErrors(['email' => 'Your provided credentials could not be verified']);
  }

  public function destroy()
  {
    auth()->logout();

    return redirect('/')->with('success', 'You have been successfully logged out!');
  }
}