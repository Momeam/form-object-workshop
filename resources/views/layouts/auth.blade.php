<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="color-scheme" content="light">
        <title>{{ $title }} · Form Object Workshop</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="auth-page">
        <main class="auth-shell">
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-mark" aria-hidden="true">F</span>
                <span><span class="brand-muted">Workshop</span></span>
            </a>

            <section class="auth-card" aria-labelledby="page-title">
                <div class="auth-card-heading">
                    <p class="eyebrow">YOUR ACCOUNT</p>
                    <h1 id="page-title">{{ $heading }}</h1>
                    <p class="subtitle">{{ $subtitle }}</p>
                </div>

                @if (session('status'))
                    <div class="notice notice-success" role="status">{{ session('status') }}</div>
                @endif

                @yield('content')
            </section>

            <p class="auth-footer">A small workshop for thoughtful Laravel code.</p>
        </main>
    </body>
</html>
