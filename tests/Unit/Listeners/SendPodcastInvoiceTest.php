<?php

namespace Tests\Unit\Listeners;

use App\Events\PodcastPurchased;
use App\Listeners\SendPodcastInvoice;
use PHPUnit\Framework\TestCase;

class SendPodcastInvoiceTest extends TestCase
{
    public function test_listener_outputs_the_podcast_invoice_message(): void
    {
        $this->expectOutputString("string(32) \"send an email with their invoice\"\n");

        (new SendPodcastInvoice)->handle(new PodcastPurchased);
    }
}
