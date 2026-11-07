@extends('layouts.portfolio')

@section('title', 'Dashboard — '.config('portfolio.name'))
@section('description', 'A static dashboard overview of the portfolio content.')

@php
    $portfolio = config('portfolio');
    $skills = $portfolio['skills'];
    $skillsCount = array_sum(array_map(fn ($group) => count($group['skills']), $skills));
    $certifications = $portfolio['certifications'];
    $projects = $portfolio['projects'];
    $github = $portfolio['github'];
    $readiness = $portfolio['readiness'];
    $readinessScore = (int) round(array_sum(array_column($readiness, 'value')) / max(count($readiness), 1));
@endphp

@section('content')
    <section class="relative pb-20 pt-32 sm:pt-40">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="bg-grid mask-fade absolute inset-0 opacity-40"></div>
            <div class="absolute -right-24 top-24 h-72 w-72 rounded-full bg-cyan-400/10 blur-3xl"></div>
        </div>

        <div class="container-page relative">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between" data-reveal>
                <div class="max-w-2xl">
                    <span class="eyebrow">Portfolio dashboard</span>

                    <h1 class="mt-5 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                        A static snapshot of<br><span class="text-gradient">my portfolio.</span>
                    </h1>

                    <p class="mt-4 max-w-2xl text-sm leading-6 text-slate-400">
                        Every value on this page is read from
                        <code class="rounded-md border border-white/10 bg-white/5 px-1.5 py-0.5 text-xs text-cyan-300">config/portfolio.php</code>.
                        No database, migrations, or models are involved.
                    </p>
                </div>

                <a href="{{ route('home') }}" class="btn-secondary shrink-0">
                    Back to portfolio
                    <x-portfolio.icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>

            <div class="mt-10 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($portfolio['stats'] as $stat)
                    <div class="glass-card p-5" data-reveal>
                        <p class="field-label">{{ $stat['label'] }}</p>
                        <p class="mt-2 font-display text-2xl font-semibold text-white">{{ $stat['value'] }}</p>
                        <p class="mt-1 text-xs text-slate-500">{{ $stat['detail'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 glass-card p-6 sm:p-8" data-reveal>
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <h2 class="font-display text-xl font-semibold text-white">Skills &amp; Tools</h2>
                        <p class="mt-1 text-sm text-slate-400">Technical foundations and everyday tools.</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="rounded-full border border-cyan-300/20 bg-cyan-400/10 px-3 py-1 text-xs font-semibold text-cyan-300">
                            {{ $skillsCount }} skills
                        </span>

                        <a href="{{ route('home') }}#skills" class="text-xs font-semibold text-slate-400 transition hover:text-white">
                            View section
                        </a>
                    </div>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-3">
                    @foreach ($skills as $group)
                        <div class="rounded-2xl border border-white/10 bg-slate-950/50 p-5">
                            <div class="flex items-center gap-3">
                                <span class="flex h-10 w-10 items-center justify-center rounded-xl border border-cyan-300/20 bg-cyan-400/10 text-cyan-300">
                                    <x-portfolio.icon name="{{ $group['icon'] }}" class="h-4 w-4" />
                                </span>

                                <h3 class="font-display text-sm font-semibold text-white">{{ $group['title'] }}</h3>
                            </div>

                            <p class="mt-3 text-xs leading-5 text-slate-500">{{ $group['description'] }}</p>

                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach ($group['skills'] as $skill)
                                    <span class="rounded-full border border-white/10 bg-white/5 px-2.5 py-1 text-[0.68rem] font-medium text-slate-300">
                                        {{ $skill['name'] }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-6 glass-card p-6 sm:p-8" data-reveal>
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <h2 class="font-display text-xl font-semibold text-white">Certifications &amp; Seminars</h2>
                        <p class="mt-1 text-sm text-slate-400">Recent certificates and online learning.</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="rounded-full border border-cyan-300/20 bg-cyan-400/10 px-3 py-1 text-xs font-semibold text-cyan-300">
                            {{ count($certifications) }} credentials
                        </span>

                        <a href="{{ route('home') }}#certifications" class="text-xs font-semibold text-slate-400 transition hover:text-white">
                            View section
                        </a>
                    </div>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-3">
                    @foreach ($certifications as $certification)
                        <a
                            href="{{ asset($certification['image']) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group overflow-hidden rounded-2xl border border-white/10 bg-slate-950/50 transition hover:border-cyan-300/30 hover:bg-slate-950/80"
                        >
                            <div class="border-b border-white/10 bg-white p-2">
                                <img
                                    src="{{ asset($certification['image']) }}"
                                    alt="Certificate: {{ $certification['title'] }}"
                                    class="h-28 w-full object-contain"
                                    loading="lazy"
                                    decoding="async"
                                >
                            </div>

                            <div class="p-4">
                                <div class="flex flex-wrap items-center gap-2">
                                    <span class="rounded-full border border-cyan-300/20 bg-cyan-400/10 px-2 py-0.5 text-[0.6rem] font-semibold uppercase tracking-[0.14em] text-cyan-300">
                                        {{ $certification['type'] }}
                                    </span>

                                    <span class="text-[0.65rem] text-slate-500">{{ $certification['date'] }}</span>
                                </div>

                                <p class="mt-2 line-clamp-2 text-sm font-semibold leading-5 text-white">
                                    {{ $certification['title'] }}
                                </p>

                                <p class="mt-1 text-[0.68rem] leading-4 text-slate-500">
                                    {{ $certification['issuer'] }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="mt-6 grid gap-6 lg:grid-cols-[1.35fr_0.65fr]">
                <div class="glass-card p-6 sm:p-8" data-reveal>
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <h2 class="font-display text-xl font-semibold text-white">Projects</h2>
                            <p class="mt-1 text-sm text-slate-400">Published work and repositories.</p>
                        </div>

                        <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-slate-400">
                            {{ count($projects) }} total
                        </span>
                    </div>

                    @if (! empty($projects))
                        <div class="mt-6 grid gap-4">
                            @foreach ($projects as $project)
                                <div class="rounded-2xl border border-white/10 bg-slate-950/50 p-4">
                                    <div class="flex flex-wrap items-start justify-between gap-3">
                                        <div>
                                            <p class="font-semibold text-white">{{ $project['title'] ?? 'Untitled project' }}</p>
                                            <p class="mt-1 text-sm text-slate-400">{{ $project['description'] ?? '' }}</p>
                                        </div>

                                        <div class="flex flex-wrap items-center gap-3">
                                            @if (! empty($project['slug']))
                                                <a href="{{ route('project.show', $project['slug']) }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-cyan-300 hover:text-cyan-200">
                                                    View project
                                                    <x-portfolio.icon name="arrow-right" class="h-3.5 w-3.5" />
                                                </a>
                                            @endif

                                            @if (! empty($project['repo']))
                                                <a href="{{ $project['repo'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-semibold text-cyan-300 hover:text-cyan-200">
                                                    Source
                                                    <x-portfolio.icon name="external-link" class="h-3.5 w-3.5" />
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="mt-6 rounded-2xl border border-dashed border-white/15 bg-slate-950/40 p-6 sm:p-8">
                            <span class="flex h-12 w-12 items-center justify-center rounded-2xl border border-cyan-300/20 bg-cyan-400/10 text-cyan-300">
                                <x-portfolio.icon name="folder" class="h-5 w-5" />
                            </span>

                            <h3 class="mt-5 font-display text-lg font-semibold text-white">The project list is empty for now.</h3>
                            <p class="mt-2 max-w-xl text-sm leading-6 text-slate-400">
                                New projects will appear here after they are added to the portfolio configuration. The public projects section is already designed and waiting for content.
                            </p>

                            <div class="mt-5 flex flex-wrap gap-3">
                                <a href="{{ route('home') }}#projects" class="btn-primary px-4 py-2.5">
                                    View projects section
                                    <x-portfolio.icon name="arrow-right" class="h-4 w-4" />
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="mt-6 rounded-2xl border border-white/10 bg-slate-950/50 p-4">
                        <p class="field-label">Next step</p>
                        <p class="mt-2 text-sm leading-6 text-slate-400">
                            Update the project details, tags, and screenshots in
                            <code class="rounded-md border border-white/10 bg-white/5 px-1.5 py-0.5 text-xs text-cyan-300">config/portfolio.php</code>
                            and
                            <code class="rounded-md border border-white/10 bg-white/5 px-1.5 py-0.5 text-xs text-cyan-300">public/images/projects</code>.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col gap-6">
                    <div class="glass-card p-6" data-reveal>
                        <div class="flex items-center gap-4">
                            <img
                                src="{{ asset($portfolio['photo']) }}"
                                alt="Portrait of {{ $portfolio['name'] }}"
                                class="h-14 w-14 rounded-2xl border border-white/10 object-cover"
                                width="800"
                                height="800"
                            >

                            <div class="min-w-0">
                                <p class="truncate font-display text-base font-semibold text-white">{{ $portfolio['name'] }}</p>
                                <p class="mt-1 text-xs text-slate-400">BSIT — 4th Year</p>
                            </div>
                        </div>

                        <div class="mt-5 space-y-3 border-t border-white/10 pt-5 text-sm">
                            <div class="flex items-center gap-2 text-slate-400">
                                <x-portfolio.icon name="mail" class="h-4 w-4 text-cyan-300" />
                                <span class="truncate">{{ $portfolio['email'] }}</span>
                            </div>

                            <div class="flex items-center gap-2 text-slate-400">
                                <x-portfolio.icon name="map-pin" class="h-4 w-4 text-cyan-300" />
                                <span>{{ $portfolio['location'] }}</span>
                            </div>

                            <div class="flex items-center gap-2 text-slate-400">
                                <x-portfolio.icon name="graduation-cap" class="h-4 w-4 text-cyan-300" />
                                <span>Data Center College of Bangued</span>
                            </div>
                        </div>
                    </div>

                    <div class="glass-card p-6" data-reveal>
                        <h2 class="font-display text-lg font-semibold text-white">Quick links</h2>

                        <div class="mt-4 flex flex-col gap-2">
                            <a href="{{ route('home') }}" class="flex items-center justify-between rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm font-medium text-slate-300 transition hover:border-cyan-300/30 hover:text-white">
                                <span class="flex items-center gap-2">
                                    <x-portfolio.icon name="user" class="h-4 w-4 text-cyan-300" />
                                    Public portfolio
                                </span>
                                <x-portfolio.icon name="arrow-right" class="h-4 w-4" />
                            </a>

                            <a href="{{ $github['url'] }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm font-medium text-slate-300 transition hover:border-cyan-300/30 hover:text-white">
                                <span class="flex items-center gap-2">
                                    <x-portfolio.icon name="github" class="h-4 w-4 text-cyan-300" />
                                    GitHub profile
                                </span>
                                <x-portfolio.icon name="external-link" class="h-4 w-4" />
                            </a>

                            <a href="{{ $github['repo_url'] }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm font-medium text-slate-300 transition hover:border-cyan-300/30 hover:text-white">
                                <span class="flex items-center gap-2">
                                    <x-portfolio.icon name="code" class="h-4 w-4 text-cyan-300" />
                                    Portfolio repo
                                </span>
                                <x-portfolio.icon name="external-link" class="h-4 w-4" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 grid gap-6 lg:grid-cols-2">
                <div class="glass-card p-6 sm:p-8" data-reveal>
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="font-display text-xl font-semibold text-white">Education overview</h2>
                        <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-slate-400">
                            {{ count($portfolio['education']) }} records
                        </span>
                    </div>

                    <ol class="mt-6 space-y-5">
                        @foreach ($portfolio['education'] as $item)
                            <li class="flex gap-4">
                                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl border border-cyan-300/20 bg-cyan-400/10 text-cyan-300">
                                    <x-portfolio.icon name="{{ $item['status'] === 'In progress' ? 'clock' : 'check' }}" class="h-4 w-4" />
                                </span>

                                <div class="min-w-0 border-b border-white/5 pb-4 last:border-0 last:pb-0">
                                    <p class="text-sm font-semibold text-white">{{ $item['level'] }} — {{ $item['school'] }}</p>
                                    <p class="mt-1 text-xs text-slate-500">{{ $item['year'] }} • {{ $item['status'] }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>

                <div class="glass-card p-6 sm:p-8" data-reveal>
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <h2 class="font-display text-xl font-semibold text-white">Portfolio readiness</h2>
                        <span class="rounded-full border border-cyan-300/20 bg-cyan-400/10 px-3 py-1 text-xs font-semibold text-cyan-300">
                            {{ $readinessScore }}% complete
                        </span>
                    </div>

                    <div class="mt-6 space-y-5">
                        @foreach ($readiness as $item)
                            <div>
                                <div class="flex items-center justify-between gap-4 text-xs">
                                    <span class="font-medium text-slate-300">{{ $item['label'] }}</span>
                                    <span class="text-slate-500">{{ $item['value'] }}%</span>
                                </div>

                                <div class="mt-2 h-2 overflow-hidden rounded-full bg-white/10">
                                    <div class="h-full rounded-full bg-gradient-to-r from-cyan-400 to-emerald-400" style="width: {{ $item['value'] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <p class="mt-6 text-xs leading-5 text-slate-500">
                        The score is calculated from the readiness values in the portfolio configuration. Projects will complete the remaining percentage.
                    </p>
                </div>
            </div>

            <div class="mt-6 glass-card p-6 sm:p-8" data-reveal>
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <h2 class="font-display text-xl font-semibold text-white">How this page works</h2>
                        <p class="mt-1 text-sm text-slate-400">A quick reminder of the technical constraints behind the project.</p>
                    </div>

                    <span class="rounded-full border border-emerald-300/20 bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-300">
                        Static by design
                    </span>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-3">
                    <div class="rounded-2xl border border-white/10 bg-slate-950/50 p-4">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-cyan-300">
                            <x-portfolio.icon name="book-open" class="h-4 w-4" />
                        </span>
                        <h3 class="mt-4 text-sm font-semibold text-white">Static content</h3>
                        <p class="mt-1 text-xs leading-5 text-slate-400">Every section reads from one configuration file.</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-slate-950/50 p-4">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-cyan-300">
                            <x-portfolio.icon name="code" class="h-4 w-4" />
                        </span>
                        <h3 class="mt-4 text-sm font-semibold text-white">Blade templates</h3>
                        <p class="mt-1 text-xs leading-5 text-slate-400">Reusable layouts and components keep the markup tidy.</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-slate-950/50 p-4">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-cyan-300">
                            <x-portfolio.icon name="check" class="h-4 w-4" />
                        </span>
                        <h3 class="mt-4 text-sm font-semibold text-white">No database</h3>
                        <p class="mt-1 text-xs leading-5 text-slate-400">Sessions and cache use flat files — no migrations or models.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
