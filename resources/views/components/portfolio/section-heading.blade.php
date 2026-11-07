@props(['eyebrow', 'title', 'description' => null])

<div {{ $attributes->merge(['class' => 'max-w-3xl']) }} data-reveal>
    <span class="eyebrow">{{ $eyebrow }}</span>

    <h2 class="mt-5 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
        {!! $title !!}
    </h2>

    @if ($description)
        <p class="mt-4 text-base leading-7 text-slate-400">{{ $description }}</p>
    @endif
</div>
