<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublishPostFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_post_is_saved_and_returns_success(): void
    {
        $response = $this->post('/posts', [
            'body' => 'A new post',
            'unexpected' => 'ignored',
        ]);

        $response->assertOk()->assertSeeText('Success!');
        $this->assertDatabaseHas('posts', ['body' => 'A new post']);
    }

    public function test_empty_body_redirects_with_validation_error_without_saving(): void
    {
        $response = $this->from('/')->post('/posts', ['body' => '']);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['body']);
        $this->assertDatabaseCount('posts', 0);
    }

    public function test_non_string_body_redirects_with_validation_error_without_saving(): void
    {
        $response = $this->from('/')->post('/posts', ['body' => ['invalid']]);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['body']);
        $this->assertDatabaseCount('posts', 0);
    }
}
