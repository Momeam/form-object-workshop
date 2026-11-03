@extends('layouts.auth', [
    'title' => 'Log in',
    'heading' => 'Welcome back',
    'subtitle' => 'Log in to continue to your account.',
])

@section('content')
    <form class="auth-form" method="POST" action="{{ route('login.store') }}">
        @csrf

        <div class="form-field">
            <label for="email">Email address</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email" required autofocus>
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-field">
            <div class="field-heading">
                <label for="password">Password</label>
                <a class="text-link" href="{{ route('password.request') }}">Forgot password?</a>
            </div>
            <input id="password" name="password" type="password" placeholder="Enter your password" autocomplete="current-password" required>
            @error('password') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <label class="checkbox-field" for="remember">
            <input id="remember" name="remember" type="checkbox" value="1">
            <span>Remember me</span>
        </label>

        <button class="primary-button" type="submit">Log in <span aria-hidden="true">→</span></button>
    </form>

    <p class="auth-switch">New here? <a class="text-link" href="{{ route('register') }}">Create an account</a></p>
@endsection
