@php
    $github = config('portfolio.github');
@endphp

<footer class="border-t border-white/10 py-10">
    <div class="container-page flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-center gap-3">
            <span class="flex h-10 w-10 items-center justify-center rounded-2xl border border-cyan-300/30 bg-cyan-400/10 font-display text-sm font-semibold text-cyan-300">
                {{ config('portfolio.initials') }}
            </span>

            <div>
                <p class="text-sm font-semibold text-white">{{ config('portfolio.name') }}</p>
                <p class="text-xs text-slate-500">Built with Laravel &amp; Blade. No database required.</p>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ $github['url'] }}" target="_blank" rel="noopener noreferrer" class="rounded-full border border-white/10 bg-white/5 p-2.5 text-slate-400 transition hover:border-cyan-300/30 hover:text-white" aria-label="GitHub profile">
                <x-portfolio.icon name="github" class="h-4 w-4" />
            </a>

            <a href="mailto:{{ config('portfolio.email') }}" class="rounded-full border border-white/10 bg-white/5 p-2.5 text-slate-400 transition hover:border-cyan-300/30 hover:text-white" aria-label="Send an email">
                <x-portfolio.icon name="mail" class="h-4 w-4" />
            </a>

            <a href="{{ route('dashboard') }}" class="rounded-full border border-white/10 bg-white/5 p-2.5 text-slate-400 transition hover:border-cyan-300/30 hover:text-white" aria-label="Open portfolio dashboard">
                <x-portfolio.icon name="layout-dashboard" class="h-4 w-4" />
            </a>
        </div>
    </div>

    <div class="container-page mt-8 flex flex-col gap-2 border-t border-white/5 pt-6 text-xs text-slate-600 sm:flex-row sm:items-center sm:justify-between">
        <p>&copy; {{ date('Y') }} {{ config('portfolio.name') }}. All rights reserved.</p>
        <p>IPA BSIT 4 — Midterm Activity Portfolio</p>
    </div>
</footer>
