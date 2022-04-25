<?php

namespace App\Services;


class Newsletter
{
  public function subscribe(string $email, $list = null)
  {
    // null coalescing operator, if $list is null then use the second operand
    $list ??= config('services.mailchimp.lists.subscribers');

    return $this->client()->lists->addListMember($list, [
      'email_address' => $email,
      'status' => 'subscribed'
    ]);
  }

  public function client()
  {
    $client = new \MailchimpMarketing\ApiClient();

    $client->setConfig([
      'apiKey' => config('services.mailchimp.key'),
      'server' => 'us14'
    ]);

    return $client;
  }
}
