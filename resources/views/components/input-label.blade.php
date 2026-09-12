@props(['value'])

<label {{ $attributes->merge(['class' => 'text-black font-semibold']) }}>
    {{ $value ?? $slot }}
</label>
