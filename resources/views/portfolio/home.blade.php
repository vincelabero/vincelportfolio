@extends('layouts.portfolio')

@section('title', config('portfolio.name').' — BSIT Portfolio')
@section('description', config('portfolio.bio'))

@php
    $portfolio = config('portfolio');
    $skills = $portfolio['skills'];
    $certifications = $portfolio['certifications'];
    $projects = $portfolio['projects'];
    $github = $portfolio['github'];
@endphp

@section('content')
    {{-- Hero / Basic information --}}
    <section id="about" class="relative overflow-hidden pb-20 pt-32 sm:pt-40 lg:pb-28">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="bg-grid mask-fade absolute inset-0 opacity-50"></div>
            <div class="absolute -left-24 top-24 h-72 w-72 rounded-full bg-cyan-400/10 blur-3xl"></div>
            <div class="absolute -right-20 top-56 h-80 w-80 rounded-full bg-emerald-400/10 blur-3xl"></div>
        </div>

        <div class="container-page relative">
            <div class="grid items-center gap-14 lg:grid-cols-[1.08fr_0.92fr] lg:gap-20">
                <div data-reveal>
                    <span class="eyebrow">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        {{ $portfolio['status'] }}
                    </span>

                    <h1 class="mt-6 max-w-3xl font-display text-4xl font-semibold leading-[1.08] tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Hi, I'm <span class="text-gradient">{{ $portfolio['first_name'] }}</span> {{ trim(substr($portfolio['name'], strlen($portfolio['first_name']))) }}.
                    </h1>

                    <p class="mt-5 max-w-2xl font-display text-xl font-medium text-slate-200 sm:text-2xl">
                        {{ $portfolio['headline'] }}
                    </p>

                    <p class="mt-5 max-w-2xl text-base leading-7 text-slate-400">
                        {{ $portfolio['bio'] }}
                    </p>

                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        <a href="#projects" class="btn-primary">
                            View projects
                            <x-portfolio.icon name="arrow-down" class="h-4 w-4" />
                        </a>

                        <a href="{{ $github['repo_url'] }}" target="_blank" rel="noopener noreferrer" class="btn-secondary">
                            <x-portfolio.icon name="github" class="h-4 w-4" />
                            GitHub repository
                        </a>
                    </div>

                    <div class="mt-9 grid gap-3 sm:grid-cols-2">
                        <a href="mailto:{{ $portfolio['email'] }}" class="glass-card group flex items-center gap-3 p-3.5 transition hover:border-cyan-300/30 hover:bg-white/[0.07]">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-cyan-300/20 bg-cyan-400/10 text-cyan-300">
                                <x-portfolio.icon name="mail" class="h-4 w-4" />
                            </span>
                            <span class="min-w-0">
                                <span class="field-label block">Email</span>
                                <span class="block truncate text-sm text-slate-300 transition group-hover:text-white">{{ $portfolio['email'] }}</span>
                            </span>
                        </a>

                        <a href="tel:{{ $portfolio['phone_link'] }}" class="glass-card group flex items-center gap-3 p-3.5 transition hover:border-cyan-300/30 hover:bg-white/[0.07]">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-cyan-300/20 bg-cyan-400/10 text-cyan-300">
                                <x-portfolio.icon name="phone" class="h-4 w-4" />
                            </span>
                            <span class="min-w-0">
                                <span class="field-label block">Contact</span>
                                <span class="block truncate text-sm text-slate-300 transition group-hover:text-white">{{ $portfolio['phone'] }}</span>
                            </span>
                        </a>

                        <div class="glass-card flex items-center gap-3 p-3.5">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-slate-300">
                                <x-portfolio.icon name="map-pin" class="h-4 w-4" />
                            </span>
                            <span class="min-w-0">
                                <span class="field-label block">Location</span>
                                <span class="block truncate text-sm text-slate-300">{{ $portfolio['location'] }}</span>
                            </span>
                        </div>

                        <div class="glass-card flex items-center gap-3 p-3.5">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-slate-300">
                                <x-portfolio.icon name="briefcase" class="h-4 w-4" />
                            </span>
                            <span class="min-w-0">
                                <span class="field-label block">Course</span>
                                <span class="block truncate text-sm text-slate-300">BSIT — 4th Year</span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="relative mx-auto w-full max-w-md lg:mx-0" data-reveal>
                    <div class="absolute -inset-6 rounded-[3rem] bg-gradient-to-tr from-cyan-400/20 via-transparent to-emerald-400/20 blur-2xl" aria-hidden="true"></div>

                    <div class="glass-card relative overflow-hidden p-3">
                        <div class="relative overflow-hidden rounded-[1.75rem] border border-white/10 bg-slate-900">
                            <img
                                src="{{ asset($portfolio['photo']) }}"
                                alt="Portrait of {{ $portfolio['name'] }}"
                                class="aspect-square w-full object-cover"
                                width="800"
                                height="800"
                            >

                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-transparent p-5 pt-20">
                                <p class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-cyan-300">{{ $portfolio['status'] }}</p>
                                <p class="mt-1 font-display text-lg font-semibold text-white">{{ $portfolio['name'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="glass-card absolute -left-4 top-12 hidden items-center gap-2 px-3.5 py-2.5 text-xs font-medium text-slate-200 shadow-card sm:flex lg:-left-8">
                        <x-portfolio.icon name="graduation-cap" class="h-4 w-4 text-cyan-300" />
                        Data Center College
                    </div>

                    <div class="glass-card absolute -right-4 bottom-20 hidden animate-float items-center gap-2 px-3.5 py-2.5 text-xs font-medium text-slate-200 shadow-card sm:flex lg:-right-8">
                        <x-portfolio.icon name="github" class="h-4 w-4 text-cyan-300" />
                        &#64;{{ $github['username'] }}
                    </div>
                </div>
            </div>

            <div class="mt-14 grid gap-3 sm:grid-cols-2 lg:mt-20 lg:grid-cols-4">
                @foreach ($portfolio['stats'] as $stat)
                    <div class="glass-card p-5 transition duration-300 hover:border-white/20 hover:bg-white/[0.07]" data-reveal>
                        <p class="field-label">{{ $stat['label'] }}</p>
                        <p class="mt-2 font-display text-2xl font-semibold text-white">{{ $stat['value'] }}</p>
                        <p class="mt-1 text-xs text-slate-500">{{ $stat['detail'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Educational background --}}
    <section id="education" class="relative py-24">
        <div class="container-page">
            <div class="flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
                <x-portfolio.section-heading
                    eyebrow="Educational background"
                    title="A learning journey<br><span class='text-gradient'>built step by step.</span>"
                    description="From elementary to college, each stage shaped the way I learn, solve problems, and approach technology."
                />

                <div class="glass-card flex items-center gap-3 px-4 py-3 text-sm text-slate-300" data-reveal>
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-400/10 text-emerald-300">
                        <x-portfolio.icon name="book-open" class="h-4 w-4" />
                    </span>
                    Currently enrolled
                </div>
            </div>

            <div class="mt-12 grid gap-5 lg:grid-cols-3">
                @foreach ($portfolio['education'] as $index => $item)
                    <article class="glass-card group relative flex h-full flex-col p-6 transition duration-300 hover:-translate-y-1 hover:border-cyan-300/30 hover:bg-white/[0.07] {{ ['reveal-delay-1', 'reveal-delay-2', 'reveal-delay-3'][$index] ?? '' }}" data-reveal>
                        <div class="flex items-start justify-between gap-4">
                            <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-[0.68rem] font-semibold uppercase tracking-[0.16em] text-slate-400">
                                {{ $item['level'] }}
                            </span>

                            <span class="flex h-11 w-11 items-center justify-center rounded-2xl border border-cyan-300/20 bg-cyan-400/10 text-cyan-300">
                                <x-portfolio.icon name="graduation-cap" class="h-5 w-5" />
                            </span>
                        </div>

                        <h3 class="mt-6 font-display text-xl font-semibold text-white">{{ $item['school'] }}</h3>

                        <p class="mt-2 text-sm font-medium text-cyan-300">{{ $item['year'] }}</p>

                        <p class="mt-4 flex-1 text-sm leading-6 text-slate-400">{{ $item['description'] }}</p>

                        <div class="mt-6 flex items-center gap-2 border-t border-white/10 pt-5 text-xs font-medium {{ $item['status'] === 'In progress' ? 'text-emerald-300' : 'text-slate-500' }}">
                            <x-portfolio.icon name="{{ $item['status'] === 'In progress' ? 'clock' : 'check' }}" class="h-4 w-4" />
                            {{ $item['status'] }}
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Skills & Tools --}}
    <section id="skills" class="relative py-24">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="absolute left-1/3 top-24 h-72 w-72 -translate-x-1/2 rounded-full bg-cyan-400/5 blur-3xl"></div>
        </div>

        <div class="container-page relative">
            <div class="flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
                <x-portfolio.section-heading
                    eyebrow="Skills & Tools"
                    title="The toolkit behind<br><span class='text-gradient'>my builds.</span>"
                    description="The technical foundations and everyday tools I use to turn ideas into working, responsive software."
                />

                <div class="glass-card flex items-center gap-3 px-4 py-3 text-sm text-slate-300" data-reveal>
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-cyan-400/10 text-cyan-300">
                        <x-portfolio.icon name="sparkles" class="h-4 w-4" />
                    </span>
                    Always learning
                </div>
            </div>

            <div class="mt-12 grid gap-5 lg:grid-cols-3">
                @foreach ($skills as $index => $group)
                    <article class="glass-card group flex h-full flex-col p-6 transition duration-300 hover:-translate-y-1 hover:border-cyan-300/30 hover:bg-white/[0.07] {{ ['reveal-delay-1', 'reveal-delay-2', 'reveal-delay-3'][$index] ?? '' }}" data-reveal>
                        <div class="flex items-start justify-between gap-4">
                            <span class="flex h-11 w-11 items-center justify-center rounded-2xl border border-cyan-300/20 bg-cyan-400/10 text-cyan-300">
                                <x-portfolio.icon name="{{ $group['icon'] }}" class="h-5 w-5" />
                            </span>

                            <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-[0.68rem] font-semibold uppercase tracking-[0.16em] text-slate-400">
                                {{ count($group['skills']) }} skills
                            </span>
                        </div>

                        <h3 class="mt-6 font-display text-xl font-semibold text-white">{{ $group['title'] }}</h3>

                        <p class="mt-2 flex-1 text-sm leading-6 text-slate-400">{{ $group['description'] }}</p>

                        <ul class="mt-6 space-y-4 border-t border-white/10 pt-5">
                            @foreach ($group['skills'] as $skill)
                                <li>
                                    <div class="flex items-center justify-between gap-3 text-xs">
                                        <span class="font-medium text-slate-300">{{ $skill['name'] }}</span>
                                        <span class="font-semibold text-cyan-300">{{ $skill['level'] }}%</span>
                                    </div>

                                    <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-white/10" role="presentation">
                                        <div class="h-full rounded-full bg-gradient-to-r from-cyan-400 to-emerald-300" style="width: {{ $skill['level'] }}%"></div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Certifications & Seminars --}}
    <section id="certifications" class="relative py-24">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="absolute right-1/4 top-24 h-72 w-72 rounded-full bg-emerald-400/5 blur-3xl"></div>
        </div>

        <div class="container-page relative">
            <div class="flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
                <x-portfolio.section-heading
                    eyebrow="Certifications & Seminars"
                    title="Learning beyond<br><span class='text-gradient'>the classroom.</span>"
                    description="Certificates and seminars that keep me updated on startups, technology, and responsible digital citizenship."
                />

                <div class="glass-card flex items-center gap-3 px-4 py-3 text-sm text-slate-300" data-reveal>
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-cyan-400/10 text-cyan-300">
                        <x-portfolio.icon name="badge-check" class="h-4 w-4" />
                    </span>
                    {{ count($certifications) }} credentials
                </div>
            </div>

            <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($certifications as $index => $certification)
                    <div class="h-full {{ ['reveal-delay-1', 'reveal-delay-2', 'reveal-delay-3'][$index] ?? '' }}" data-reveal>
                        <x-portfolio.certification-card :certification="$certification" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Projects --}}
    <section id="projects" class="relative py-24">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="absolute left-1/2 top-24 h-72 w-72 -translate-x-1/2 rounded-full bg-cyan-400/5 blur-3xl"></div>
        </div>

        <div class="container-page relative">
            <x-portfolio.section-heading
                eyebrow="Projects"
                title="Selected<br><span class='text-gradient'>projects.</span>"
                description="A closer look at the systems I have built, including the Students Document Request System for DCCP - Bangued."
            />

            <div class="mt-12">
                @if (! empty($projects))
                    <div class="grid gap-6 md:grid-cols-2">
                        @foreach ($projects as $project)
                            <x-portfolio.project-card :project="$project" />
                        @endforeach
                    </div>
                @else
                    <div class="relative overflow-hidden rounded-[2rem] border border-dashed border-white/15 bg-white/[0.025] p-8 sm:p-12" data-reveal>
                        <div class="pointer-events-none absolute -right-10 -top-10 h-40 w-40 rounded-full bg-cyan-400/10 blur-2xl" aria-hidden="true"></div>

                        <div class="relative flex flex-col gap-8 md:flex-row md:items-center md:justify-between">
                            <div class="max-w-2xl">
                                <span class="flex h-14 w-14 items-center justify-center rounded-2xl border border-cyan-300/20 bg-cyan-400/10 text-cyan-300">
                                    <x-portfolio.icon name="folder" class="h-6 w-6" />
                                </span>

                                <h3 class="mt-6 font-display text-2xl font-semibold text-white">No projects published yet.</h3>

                                <p class="mt-3 text-sm leading-6 text-slate-400">
                                    I am preparing the first set of projects for this portfolio. Once they are ready, they will appear here with live links and GitHub repositories.
                                </p>

                                <div class="mt-6 flex flex-wrap gap-3">
                                    <a href="{{ route('dashboard') }}" class="btn-primary">
                                        Open dashboard
                                        <x-portfolio.icon name="arrow-right" class="h-4 w-4" />
                                    </a>

                                    <a href="{{ $github['url'] }}" target="_blank" rel="noopener noreferrer" class="btn-secondary">
                                        <x-portfolio.icon name="github" class="h-4 w-4" />
                                        Follow on GitHub
                                    </a>
                                </div>
                            </div>

                            <div class="grid shrink-0 grid-cols-2 gap-3 text-center">
                                <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                    <p class="font-display text-2xl font-semibold text-white">0</p>
                                    <p class="mt-1 text-[0.65rem] uppercase tracking-[0.16em] text-slate-500">Published</p>
                                </div>

                                <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-4">
                                    <p class="font-display text-2xl font-semibold text-white">1</p>
                                    <p class="mt-1 text-[0.65rem] uppercase tracking-[0.16em] text-slate-500">Repo ready</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- GitHub repositories --}}
    <section id="github" class="relative py-24">
        <div class="container-page">
            <x-portfolio.section-heading
                eyebrow="GitHub"
                title="Code, commits,<br><span class='text-gradient'>and progress.</span>"
                description="Follow my work and browse the source behind this portfolio. Every link opens in a new tab."
            />

            <div class="mt-12 grid gap-5 md:grid-cols-2">
                <a href="{{ $github['url'] }}" target="_blank" rel="noopener noreferrer" class="glass-card group flex flex-col p-7 transition duration-300 hover:-translate-y-1 hover:border-cyan-300/30 hover:bg-white/[0.07]" data-reveal>
                    <div class="flex items-start justify-between gap-4">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl border border-white/10 bg-slate-900/80 text-white">
                            <x-portfolio.icon name="github" class="h-5 w-5" />
                        </span>

                        <span class="flex h-9 w-9 items-center justify-center rounded-full border border-white/10 text-slate-500 transition group-hover:border-cyan-300/30 group-hover:text-cyan-300">
                            <x-portfolio.icon name="external-link" class="h-4 w-4" />
                        </span>
                    </div>

                    <h3 class="mt-6 font-display text-xl font-semibold text-white">GitHub profile</h3>
                    <p class="mt-2 text-sm font-medium text-cyan-300">&#64;{{ $github['username'] }}</p>
                    <p class="mt-4 flex-1 text-sm leading-6 text-slate-400">
                        Explore my repositories, school work, and future projects as they are published.
                    </p>

                    <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-white">
                        Visit profile
                        <x-portfolio.icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
                    </span>
                </a>

                <a href="{{ $github['repo_url'] }}" target="_blank" rel="noopener noreferrer" class="glass-card group flex flex-col p-7 transition duration-300 hover:-translate-y-1 hover:border-cyan-300/30 hover:bg-white/[0.07]" data-reveal>
                    <div class="flex items-start justify-between gap-4">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl border border-cyan-300/20 bg-cyan-400/10 text-cyan-300">
                            <x-portfolio.icon name="code" class="h-5 w-5" />
                        </span>

                        <span class="flex h-9 w-9 items-center justify-center rounded-full border border-white/10 text-slate-500 transition group-hover:border-cyan-300/30 group-hover:text-cyan-300">
                            <x-portfolio.icon name="external-link" class="h-4 w-4" />
                        </span>
                    </div>

                    <h3 class="mt-6 font-display text-xl font-semibold text-white">Portfolio repository</h3>
                    <p class="mt-2 text-sm font-medium text-cyan-300">{{ $github['repo_name'] }}</p>
                    <p class="mt-4 flex-1 text-sm leading-6 text-slate-400">
                        The source code for this portfolio, built with Laravel, Blade, and Tailwind CSS.
                    </p>

                    <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-white">
                        Open repository
                        <x-portfolio.icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
                    </span>
                </a>
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section id="contact" class="relative py-24">
        <div class="container-page">
            <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-gradient-to-br from-cyan-500/10 via-slate-900/80 to-emerald-500/10 p-8 shadow-card sm:p-12" data-reveal>
                <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-cyan-400/10 blur-3xl" aria-hidden="true"></div>
                <div class="pointer-events-none absolute -bottom-20 -left-16 h-64 w-64 rounded-full bg-emerald-400/10 blur-3xl" aria-hidden="true"></div>

                <div class="relative grid gap-10 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <span class="eyebrow">Get in touch</span>
                        <h2 class="mt-5 max-w-2xl font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                            Let's connect and build<br><span class="text-gradient">something useful.</span>
                        </h2>
                        <p class="mt-4 max-w-2xl text-sm leading-6 text-slate-400">
                            For questions, collaboration, or opportunities, reach me through email or phone. I am always open to learning from new experiences.
                        </p>

                        <div class="mt-7 flex flex-col gap-3 text-sm text-slate-300 sm:flex-row sm:items-center sm:gap-6">
                            <a href="mailto:{{ $portfolio['email'] }}" class="inline-flex items-center gap-2 transition hover:text-white">
                                <x-portfolio.icon name="mail" class="h-4 w-4 text-cyan-300" />
                                {{ $portfolio['email'] }}
                            </a>
                            <a href="tel:{{ $portfolio['phone_link'] }}" class="inline-flex items-center gap-2 transition hover:text-white">
                                <x-portfolio.icon name="phone" class="h-4 w-4 text-cyan-300" />
                                {{ $portfolio['phone'] }}
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                        <a href="mailto:{{ $portfolio['email'] }}" class="btn-primary">
                            <x-portfolio.icon name="mail" class="h-4 w-4" />
                            Send an email
                        </a>
                        <a href="{{ $github['url'] }}" target="_blank" rel="noopener noreferrer" class="btn-secondary">
                            <x-portfolio.icon name="github" class="h-4 w-4" />
                            View GitHub
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
