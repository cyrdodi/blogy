<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
  public function __invoke()
  {
    request()->validate([
      'email' => 'required|email'
    ]);


    try {
      $newsletter = new Newsletter;

      $newsletter->subscribe(request('email'));
    } catch (\Exception $e) {
      // throw ValidationException::withMessages([
      //   'email' => 'This email could not be added to our newsletter list.'
      // ]);
      ddd($e);
    }

    return redirect('/')
      ->with('success', "You've subscribed to our newsletter");
  }
}
