<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PostCommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/subscribe', function () {
  // ddd('test');
  request()->validate([
    'email' => 'required|email'
  ]);

  $client = new \MailchimpMarketing\ApiClient();

  $client->setConfig([
    'apiKey' => config('services.mailchimp.key'),
    'server' => 'us14'
  ]);

  try {
    $response = $client->lists->addListMember('0c8c183495', [
      'email_address' => request('email'),
      'status' => 'subscribed'
    ]);
  } catch (\Exception $e) {
    throw ValidationException::withMessages([
      'email' => 'This email could not be added to our newsletter list.'
    ]);
  }

  return redirect('/')
    ->with('success', "You've subscribed to our newsletter");
});


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::post('/posts/{post:slug}/comment', [PostCommentController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
ROute::post('/session', [SessionsController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
