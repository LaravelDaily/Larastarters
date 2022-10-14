@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-xs uppercase py-3 font-bold block text-pink-500 hover:text-pink-600'
            : 'text-xs uppercase py-3 font-bold block text-slate-700 hover:text-slate-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $icon ?? '' }}
    {{ $slot }}
</a>
