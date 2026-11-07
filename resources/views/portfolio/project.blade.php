@extends('layouts.portfolio')

@section('title', $project['title'].' — '.config('portfolio.name'))
@section('description', $project['description'] ?? config('portfolio.bio'))

@section('content')
    <section class="relative overflow-hidden pb-24 pt-32 sm:pt-40">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="absolute left-1/2 top-24 h-72 w-72 -translate-x-1/2 rounded-full bg-cyan-400/5 blur-3xl"></div>
        </div>

        <div class="container-page relative">
            <a href="{{ route('home') }}#projects" class="inline-flex items-center gap-2 text-sm font-medium text-slate-400 transition hover:text-white">
                <x-portfolio.icon name="arrow-right" class="h-4 w-4 rotate-180" />
                Back to projects
            </a>

            <div class="mt-8 max-w-4xl" data-reveal>
                <span class="eyebrow">{{ $project['year'] ?? 'Project' }}</span>

                <h1 class="mt-6 font-display text-4xl font-semibold leading-tight text-white sm:text-5xl">
                    {{ $project['title'] }}
                </h1>

                <p class="mt-5 max-w-3xl text-base leading-7 text-slate-400 sm:text-lg">
                    {{ $project['description'] ?? 'Project description coming soon.' }}
                </p>

                @if (! empty($project['tags']))
                    <div class="mt-6 flex flex-wrap gap-2">
                        @foreach ($project['tags'] as $tag)
                            <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-[0.72rem] font-medium text-slate-300">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                @endif

                @if (! empty($project['demo']) || ! empty($project['repo']))
                    <div class="mt-8 flex flex-wrap gap-3">
                        @if (! empty($project['demo']))
                            <a href="{{ $project['demo'] }}" target="_blank" rel="noopener noreferrer" class="btn-primary">
                                <x-portfolio.icon name="external-link" class="h-4 w-4" />
                                View live demo
                            </a>
                        @endif

                        @if (! empty($project['repo']))
                            <a href="{{ $project['repo'] }}" target="_blank" rel="noopener noreferrer" class="btn-secondary">
                                <x-portfolio.icon name="github" class="h-4 w-4" />
                                Source code
                            </a>
                        @endif
                    </div>
                @endif
            </div>

            @if (! empty($project['images']))
                <div class="mt-14" x-data="{ open: false, current: null }" @keydown.escape.window="open = false">
                    <h2 class="font-display text-xl font-semibold text-white">Screenshots</h2>
                    <p class="mt-1 text-sm text-slate-400">Click any screenshot to view it full size.</p>

                    <div class="mt-6 grid gap-5 md:grid-cols-2">
                        @foreach ($project['images'] as $image)
                            <figure class="overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-card" data-reveal>
                                <button
                                    type="button"
                                    class="group block w-full cursor-zoom-in overflow-hidden bg-slate-950/60"
                                    @click="open = true; current = '{{ asset($image['src']) }}'"
                                >
                                    <img
                                        src="{{ asset($image['src']) }}"
                                        alt="{{ $image['caption'] ?? $project['title'] }}"
                                        class="aspect-video w-full object-cover transition duration-500 group-hover:scale-[1.02] group-hover:opacity-90"
                                        loading="lazy"
                                    >
                                </button>

                                @if (! empty($image['caption']))
                                    <figcaption class="border-t border-white/10 px-4 py-3 text-sm text-slate-400">
                                        {{ $image['caption'] }}
                                    </figcaption>
                                @endif
                            </figure>
                        @endforeach
                    </div>

                    <div
                        x-show="open"
                        x-cloak
                        x-transition.opacity
                        class="fixed inset-0 z-[90]"
                        role="dialog"
                        aria-modal="true"
                        aria-label="Screenshot preview"
                    >
                        <div class="absolute inset-0 bg-slate-950/90 backdrop-blur-sm" @click="open = false"></div>

                        <div class="relative flex min-h-full items-center justify-center p-4 sm:p-8">
                            <img
                                :src="current"
                                alt="{{ $project['title'] }} screenshot"
                                class="max-h-[85vh] w-auto max-w-full rounded-2xl border border-white/10 shadow-card"
                            >

                            <button
                                type="button"
                                class="absolute right-4 top-4 inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/15 bg-white/10 text-white transition hover:bg-white/20 sm:right-8 sm:top-8"
                                @click="open = false"
                                aria-label="Close screenshot preview"
                            >
                                <x-portfolio.icon name="x" class="h-5 w-5" />
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
