@props(['certification'])

<article class="glass-card group flex h-full flex-col overflow-hidden transition duration-300 hover:-translate-y-1 hover:border-cyan-300/30 hover:bg-white/[0.07]">
    <a
        href="{{ asset($certification['image']) }}"
        target="_blank"
        rel="noopener noreferrer"
        class="relative block overflow-hidden border-b border-white/10 bg-white p-3"
        aria-label="Open certificate: {{ $certification['title'] }}"
    >
        <img
            src="{{ asset($certification['image']) }}"
            alt="Certificate of participation: {{ $certification['title'] }}"
            class="h-56 w-full object-contain transition duration-500 group-hover:scale-[1.02]"
            loading="lazy"
            decoding="async"
        >

        <span class="absolute right-3 top-3 inline-flex items-center gap-1 rounded-full bg-slate-950/80 px-2.5 py-1 text-[0.62rem] font-semibold uppercase tracking-[0.14em] text-white backdrop-blur">
            <x-portfolio.icon name="external-link" class="h-3 w-3" />
            View
        </span>
    </a>

    <div class="flex flex-1 flex-col p-5">
        <div class="flex flex-wrap items-center gap-2">
            <span class="rounded-full border border-cyan-300/20 bg-cyan-400/10 px-2.5 py-1 text-[0.62rem] font-semibold uppercase tracking-[0.14em] text-cyan-300">
                {{ $certification['type'] }}
            </span>

            <span class="inline-flex items-center gap-1.5 text-[0.7rem] font-medium text-slate-500">
                <x-portfolio.icon name="calendar" class="h-3.5 w-3.5" />
                {{ $certification['date'] }}
            </span>
        </div>

        <h3 class="mt-4 font-display text-lg font-semibold leading-snug text-white">
            {{ $certification['title'] }}
        </h3>

        <p class="mt-2 text-xs font-medium leading-5 text-slate-500">
            {{ $certification['issuer'] }}
        </p>

        <p class="mt-3 flex-1 text-sm leading-6 text-slate-400">
            {{ $certification['description'] }}
        </p>

        <div class="mt-5 border-t border-white/10 pt-4 text-[0.68rem] font-medium uppercase tracking-[0.14em] text-slate-500">
            {{ $certification['format'] }}
        </div>
    </div>
</article>
