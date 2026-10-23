<label class="flex items-center gap-2">
    <input type="radio" {{ $attributes->merge(['class' => 'text-blue-600 focus:ring-blue-500',]) }}>
    <span>{{ $slot }}</span>
</label>
