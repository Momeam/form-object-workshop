@extends('layouts.auth', [
    'title' => 'Create an account',
    'heading' => 'Create your account',
    'subtitle' => 'A few details and you’re ready to go.',
])

@section('content')
    <form class="auth-form" method="POST" action="{{ route('register.store') }}">
        @csrf

        <div class="form-field">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Your name" autocomplete="name" required autofocus>
            @error('name') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-field">
            <label for="email">Email address</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email" required>
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-field">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="At least 6 characters" autocomplete="new-password" required>
            @error('password') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-field">
            <label for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Enter it once more" autocomplete="new-password" required>
        </div>

        <button class="primary-button" type="submit">Create account <span aria-hidden="true">→</span></button>
    </form>

    <p class="auth-switch">Already have an account? <a class="text-link" href="{{ route('login') }}">Log in</a></p>
@endsection
