<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_password_reset_forms(): void
    {
        $user = User::factory()->create();
        $token = Password::createToken($user);

        $this->get(route('password.request'))
            ->assertOk()
            ->assertSeeText('Reset your password')
            ->assertSee('css/app.css');

        $this->get(route('password.reset', [
            'token' => $token,
            'email' => $user->email,
        ]))
            ->assertOk()
            ->assertSeeText('Choose a new password')
            ->assertSee('css/app.css');
    }

    public function test_user_can_request_a_password_reset_link(): void
    {
        Notification::fake();
        $user = User::factory()->create();

        $response = $this->from(route('password.request'))
            ->post(route('password.email'), ['email' => $user->email]);

        $response->assertRedirect(route('password.request'))
            ->assertSessionHas('status', __('passwords.sent'));
        Notification::assertSentTo($user, ResetPassword::class);
    }

    public function test_password_reset_link_updates_the_users_password(): void
    {
        $user = User::factory()->create();
        $token = Password::createToken($user);

        $response = $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'new-secret123',
            'password_confirmation' => 'new-secret123',
        ]);

        $response->assertRedirect(route('login'))
            ->assertSessionHas('status', __('passwords.reset'));
        $this->assertTrue(Hash::check('new-secret123', $user->fresh()->password));
    }

    public function test_invalid_password_reset_token_does_not_change_the_password(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('old-secret123'),
        ]);

        $resetUrl = route('password.reset', [
            'token' => 'invalid-token',
            'email' => $user->email,
        ]);
        $response = $this->from($resetUrl)->post(route('password.update'), [
            'token' => 'invalid-token',
            'email' => $user->email,
            'password' => 'new-secret123',
            'password_confirmation' => 'new-secret123',
        ]);

        $response->assertRedirect($resetUrl)
            ->assertSessionHasErrors(['email']);
        $this->assertTrue(Hash::check('old-secret123', $user->fresh()->password));
    }
}
