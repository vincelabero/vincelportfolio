@php
    $github = config('portfolio.github');
    $isDashboard = request()->routeIs('dashboard');
@endphp

<header
    x-data="{ open: false, scrolled: false }"
    @scroll.window="scrolled = window.scrollY > 24"
    class="fixed inset-x-0 top-0 z-50 transition duration-300"
    :class="scrolled || open ? 'border-b border-white/10 bg-slate-950/90 backdrop-blur-xl' : 'border-b border-transparent bg-transparent'"
>
    <nav class="container-page flex h-20 items-center justify-between gap-4" aria-label="Main navigation">
        <a href="{{ route('home') }}" class="group flex min-w-0 items-center gap-3">
            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl border border-cyan-300/30 bg-cyan-400/10 font-display text-sm font-semibold text-cyan-300 transition group-hover:bg-cyan-400/20">
                {{ config('portfolio.initials') }}
            </span>

            <span class="hidden min-w-0 leading-tight sm:block lg:hidden xl:block">
                <span class="block truncate text-sm font-semibold text-white">{{ config('portfolio.name') }}</span>
                <span class="block text-[0.65rem] uppercase tracking-[0.2em] text-slate-500">BSIT • 4th Year</span>
            </span>
        </a>

        <div class="hidden items-center gap-1 lg:flex">
            <a href="{{ route('home') }}#about" class="nav-link">About</a>
            <a href="{{ route('home') }}#education" class="nav-link">Education</a>
            <a href="{{ route('home') }}#skills" class="nav-link">Skills</a>
            <a href="{{ route('home') }}#certifications" class="nav-link">Certifications</a>
            <a href="{{ route('home') }}#projects" class="nav-link">Projects</a>
            <a href="{{ route('home') }}#github" class="nav-link">GitHub</a>
            <a
                href="{{ route('dashboard') }}"
                class="nav-link {{ $isDashboard ? 'nav-link-active' : '' }}"
                @if ($isDashboard) aria-current="page" @endif
            >
                Dashboard
            </a>

            <a href="{{ $github['repo_url'] }}" target="_blank" rel="noopener noreferrer" class="btn-primary ml-2 px-4 py-2.5">
                <x-portfolio.icon name="github" class="h-4 w-4" />
                Source code
            </a>
        </div>

        <button
            type="button"
            class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-white/10 bg-white/5 text-white transition hover:bg-white/10 lg:hidden"
            @click="open = !open"
            :aria-expanded="open.toString()"
            aria-controls="mobile-menu"
            aria-label="Toggle navigation menu"
        >
            <x-portfolio.icon name="menu" class="h-5 w-5" x-show="!open" />
            <x-portfolio.icon name="x" class="h-5 w-5" x-show="open" x-cloak />
        </button>
    </nav>

    <div
        id="mobile-menu"
        x-show="open"
        x-cloak
        x-transition:enter="transition duration-200 ease-out"
        x-transition:enter-start="-translate-y-2 opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition duration-150 ease-in"
        x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="-translate-y-2 opacity-0"
        class="border-t border-white/10 bg-slate-950/95 px-5 py-4 backdrop-blur-xl lg:hidden"
    >
        <nav class="flex flex-col gap-1" aria-label="Mobile navigation">
            <a href="{{ route('home') }}#about" class="nav-link" @click="open = false">About</a>
            <a href="{{ route('home') }}#education" class="nav-link" @click="open = false">Education</a>
            <a href="{{ route('home') }}#skills" class="nav-link" @click="open = false">Skills</a>
            <a href="{{ route('home') }}#certifications" class="nav-link" @click="open = false">Certifications</a>
            <a href="{{ route('home') }}#projects" class="nav-link" @click="open = false">Projects</a>
            <a href="{{ route('home') }}#github" class="nav-link" @click="open = false">GitHub</a>
            <a
                href="{{ route('dashboard') }}"
                class="nav-link {{ $isDashboard ? 'nav-link-active' : '' }}"
                @if ($isDashboard) aria-current="page" @endif
                @click="open = false"
            >
                Dashboard
            </a>

            <a href="{{ $github['repo_url'] }}" target="_blank" rel="noopener noreferrer" class="btn-primary mt-2">
                <x-portfolio.icon name="github" class="h-4 w-4" />
                View source code
            </a>
        </nav>
    </div>
</header>
