<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;


class MailchimpNewsletter implements Newsletter
{
  protected ApiClient $apiClient;

  public function __construct(ApiClient $apiClient)
  {
    $this->apiClient = $apiClient;
  }

  public function subscribe(string $email, $list = null)
  {
    // null coalescing operator, if $list is null then use the second operand
    $list ??= config('services.mailchimp.lists.subscribers');

    return $this->apiClient->lists->addListMember($list, [
      'email_address' => $email,
      'status' => 'subscribed'
    ]);
  }
}
