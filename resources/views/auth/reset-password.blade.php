@extends('layouts.auth', [
    'title' => 'Choose a new password',
    'heading' => 'Choose a new password',
    'subtitle' => 'Make sure it’s strong and easy for you to remember.',
])

@section('content')
    <form class="auth-form" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input name="token" type="hidden" value="{{ $token }}">

        <div class="form-field">
            <label for="email">Email address</label>
            <input id="email" name="email" type="email" value="{{ old('email', $email) }}" placeholder="you@example.com" autocomplete="email" required autofocus>
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-field">
            <label for="password">New password</label>
            <input id="password" name="password" type="password" placeholder="At least 6 characters" autocomplete="new-password" required>
            @error('password') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-field">
            <label for="password_confirmation">Confirm new password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Enter it once more" autocomplete="new-password" required>
        </div>

        <button class="primary-button" type="submit">Reset password <span aria-hidden="true">→</span></button>
    </form>
@endsection
