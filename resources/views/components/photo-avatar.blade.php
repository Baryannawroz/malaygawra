@props(['path' => null, 'name' => '', 'size' => null])

@php
    $src = \App\Support\Photo::url($path);
@endphp

<div {{ $attributes->merge(['class' => 'mg-avatar'.($size === 'xl' ? ' mg-avatar-xl' : '')]) }}>
    @if ($src)
    <img src="{{ $src }}" alt="{{ $name }}">
    @endif
    <span>{{ mb_substr((string) $name, 0, 1) }}</span>
</div>
