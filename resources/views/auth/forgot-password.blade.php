@extends('layouts.auth', [
    'title' => 'Reset your password',
    'heading' => 'Forgot your password?',
    'subtitle' => 'Enter your email and we’ll send you a reset link.',
])

@section('content')
    <form class="auth-form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-field">
            <label for="email">Email address</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email" required autofocus>
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <button class="primary-button" type="submit">Send reset link <span aria-hidden="true">→</span></button>
    </form>

    <p class="auth-switch"><a class="text-link" href="{{ route('login') }}">← Back to log in</a></p>
@endsection
