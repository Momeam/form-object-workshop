<?php

namespace Tests\Feature;

use App\Events\PodcastPurchased;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class PurchasesControllerTest extends TestCase
{
    public function test_visiting_purchases_runs_the_use_case_and_returns_done(): void
    {
        Event::fake([PodcastPurchased::class]);

        $response = $this->get('/purchases');

        $response->assertOk()->assertSeeText('Done');
        Event::assertDispatchedOnce(PodcastPurchased::class);
    }
}
