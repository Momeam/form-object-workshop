<?php

namespace App\Listeners;

use App\Events\PodcastPurchased;

class SendPodcastInvoice
{
    public function handle(PodcastPurchased $event): void
    {
        var_dump('send an email with their invoice');
    }
}
