<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#020617">

        <script>
            document.documentElement.classList.add('js');

            // Safety net: if the Vite bundle fails to load or run, reveal
            // everything so the portfolio content is never left invisible.
            window.setTimeout(function () {
                if (!window.portfolioRevealReady) {
                    document.querySelectorAll('[data-reveal]').forEach(function (element) {
                        element.classList.add('is-visible');
                    });
                }
            }, 3000);
        </script>

        <title>@yield('title', config('portfolio.name').' — Portfolio')</title>
        <meta name="description" content="@yield('description', config('portfolio.headline'))">
        <meta name="author" content="{{ config('portfolio.name') }}">

        <meta property="og:type" content="website">
        <meta property="og:title" content="@yield('title', config('portfolio.name').' — Portfolio')">
        <meta property="og:description" content="@yield('description', config('portfolio.bio'))">
        <meta property="og:image" content="{{ asset(config('portfolio.photo')) }}">

        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|sora:500,600,700" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('head')
    </head>

    <body class="min-h-screen overflow-x-hidden">
        <a
            href="#main-content"
            class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100] focus:rounded-full focus:bg-cyan-400 focus:px-5 focus:py-3 focus:text-sm focus:font-semibold focus:text-slate-950"
        >
            Skip to content
        </a>

        <x-portfolio.nav />

        <main id="main-content">
            @yield('content')
        </main>

        <x-portfolio.footer />

        @stack('scripts')
    </body>
</html>
