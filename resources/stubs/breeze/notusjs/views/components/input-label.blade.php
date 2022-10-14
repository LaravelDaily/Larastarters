@props(['value'])

<label {{ $attributes->merge(['class' => 'block uppercase text-slate-600 text-xs font-bold mb-2']) }}>
    {{ $value ?? $slot }}
</label>
