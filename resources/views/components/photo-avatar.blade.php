@props(['path' => null, 'name' => '', 'size' => null])

<div {{ $attributes->merge(['class' => 'mg-avatar' . ($size === 'xl' ? ' mg-avatar-xl' : '')]) }}>
    @if ($path)
    <img src="{{ asset('storage/' . ltrim(str_replace(['storage/', 'public/'], '', $path), '/')) }}" alt="{{ $name }}"
        loading="lazy" onerror="this.remove()">
    @endif
    <span>{{ mb_substr($name, 0, 1) }}</span>
</div>
