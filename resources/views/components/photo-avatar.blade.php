@props(['path' => null, 'name' => '', 'size' => null])

@php
    $photo = $path ? ltrim(str_replace('\\', '/', $path), '/');
    $photo = preg_replace('#^(storage/|public/)+#', '', $photo);
@endphp

<div {{ $attributes->merge(['class' => 'mg-avatar' . ($size === 'xl' ? ' mg-avatar-xl' : '')]) }}>
    @if ($photo)
    <img src="{{ url('storage/' . $photo) }}" alt="{{ $name }}"
        loading="lazy" onerror="this.remove()">
    @endif
    <span>{{ mb_substr((string) $name, 0, 1) }}</span>
</div>
