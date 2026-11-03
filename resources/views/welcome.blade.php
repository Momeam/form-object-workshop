<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="color-scheme" content="light">
        <title>Form Object Workshop</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="site-page">
        <div class="site-shell">
            <header class="site-header">
                <a class="brand" href="{{ route('home') }}">
                    <span class="brand-mark" aria-hidden="true">F</span>
                    <span> <span class="brand-muted">Workshop</span></span>
                </a>

                <nav class="site-nav" aria-label="Account">
                    @auth
                        <span class="account-label">Signed in as {{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="nav-button" type="submit">Log out</button>
                        </form>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        <a class="nav-button" href="{{ route('register') }}">Create account</a>
                    @endauth
                </nav>
            </header>

            <main class="home-main">
                <section class="welcome-panel" aria-labelledby="welcome-title">
                    <div class="welcome-copy">
                        <p class="eyebrow">FORM OBJECT WORKSHOP</p>
                        <h1 id="welcome-title">{{ $user->present()->welcomeMessage }}</h1>
                        <p class="subtitle">A little space to explore thoughtful forms and clean Laravel code.</p>
                    </div>
                    <aside class="welcome-note">
                        <span class="note-icon" aria-hidden="true">✦</span>
                        <p class="note-label">Today’s practice</p>
                        <p class="note-copy">Keep things simple, clear, and a pleasure to use.</p>
                    </aside>
                </section>

                <section class="post-card" aria-labelledby="post-title">
                    <div class="section-heading">
                        <p class="eyebrow">QUICK EXERCISE</p>
                        <h2 id="post-title">Write a post</h2>
                        <p class="subtitle">Try submitting a message with the form below.</p>
                    </div>

                    <form class="post-form" method="POST" action="/posts">
                        @csrf
                        <div class="form-field">
                            <label for="body">Your post</label>
                            <textarea id="body" name="body" rows="5" placeholder="What are you working on?"></textarea>
                        </div>
                        <button class="primary-button" type="submit">Add posts <span aria-hidden="true">→</span></button>
                    </form>
                </section>
            </main>

            <footer class="site-footer">A small workshop for thoughtful Laravel code.</footer>
        </div>
    </body>
</html>
