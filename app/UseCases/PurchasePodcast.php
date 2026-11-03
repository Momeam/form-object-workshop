<?php

namespace App\UseCases;

use App\Events\PodcastPurchased;

class PurchasePodcast extends UseCase
{
    public function handle(): void
    {
        $this->preparePurchase();

        PodcastPurchased::dispatch();
    }

    private function preparePurchase(): void
    {
        var_dump('preparing the purchase');
    }
}
