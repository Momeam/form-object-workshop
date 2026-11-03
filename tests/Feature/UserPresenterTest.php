<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserPresenterTest extends TestCase
{
    public function test_welcome_page_renders_the_presented_user_message(): void
    {
        $this->travelTo('2026-11-03 12:00:00');

        $response = $this->get('/');

        $response->assertOk()
            ->assertSeeText('Add posts')
            ->assertSeeText('Welcome, Taylor Otwell. You signed up 2 days ago.')
            ->assertSee('css/app.css');
    }
}
