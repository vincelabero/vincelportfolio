@props(['project'])

@php
    $url = ! empty($project['slug']) ? route('project.show', $project['slug']) : null;
@endphp

<article class="glass-card group flex h-full flex-col overflow-hidden transition duration-300 hover:-translate-y-1 hover:border-cyan-300/30 hover:bg-white/[0.07]">
    @if (! empty($project['cover']))
        <a href="{{ $url ?? route('home').'#projects' }}" class="block overflow-hidden border-b border-white/10 bg-slate-950/60" aria-label="Open {{ $project['title'] ?? 'project' }}">
            <img
                src="{{ asset($project['cover']) }}"
                alt="{{ $project['title'] ?? 'Project preview' }}"
                class="aspect-video w-full object-cover transition duration-500 group-hover:scale-[1.03]"
                loading="lazy"
            >
        </a>
    @endif

    <div class="flex flex-1 flex-col p-6">
        <div class="flex items-start justify-between gap-4">
            <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-[0.68rem] font-semibold uppercase tracking-[0.16em] text-slate-400">
                {{ $project['year'] ?? 'Project' }}
            </span>

            <span class="flex h-11 w-11 items-center justify-center rounded-2xl border border-cyan-300/20 bg-cyan-400/10 text-cyan-300">
                <x-portfolio.icon name="folder" class="h-5 w-5" />
            </span>
        </div>

        <h3 class="mt-6 font-display text-xl font-semibold text-white">
            @if ($url)
                <a href="{{ $url }}" class="transition hover:text-cyan-200">{{ $project['title'] ?? 'Untitled project' }}</a>
            @else
                {{ $project['title'] ?? 'Untitled project' }}
            @endif
        </h3>

        <p class="mt-3 flex-1 text-sm leading-6 text-slate-400">
            {{ $project['description'] ?? 'Project description coming soon.' }}
        </p>

        @if (! empty($project['tags']))
            <div class="mt-5 flex flex-wrap gap-2">
                @foreach ($project['tags'] as $tag)
                    <span class="rounded-full border border-white/10 bg-slate-900/70 px-2.5 py-1 text-[0.68rem] font-medium text-slate-400">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>
        @endif

        <div class="mt-6 flex flex-wrap items-center gap-3 border-t border-white/10 pt-5">
            @if ($url)
                <a href="{{ $url }}" class="inline-flex items-center gap-2 text-sm font-semibold text-cyan-300 transition hover:text-cyan-200">
                    <x-portfolio.icon name="external-link" class="h-4 w-4" />
                    View screenshots
                </a>
            @endif

            @if (! empty($project['repo']))
                <a href="{{ $project['repo'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-sm font-semibold text-cyan-300 transition hover:text-cyan-200">
                    <x-portfolio.icon name="github" class="h-4 w-4" />
                    Source code
                </a>
            @endif

            @if (! empty($project['demo']))
                <a href="{{ $project['demo'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-300 transition hover:text-white">
                    <x-portfolio.icon name="external-link" class="h-4 w-4" />
                    Live demo
                </a>
            @endif
        </div>
    </div>
</article>
