<?php

namespace App\Providers;

use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;
use MailchimpMarketing\ApiClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    app()->bind(Newsletter::class, function () {
      $client = (new  ApiClient)->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us14'
      ]);

      return new MailchimpNewsletter($client);
    });
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    // unguard all input in model
    Model::unguard();
  }
}
