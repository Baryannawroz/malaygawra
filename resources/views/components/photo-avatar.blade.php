@props(['path' => null, 'name' => '', 'size' => null])

@php
    $file = $path ? basename(str_replace('\\', '/', $path)) : null;
@endphp

<div {{ $attributes->merge(['class' => 'mg-avatar'.($size === 'xl' ? ' mg-avatar-xl' : '')]) }}>
    @if ($file)
    <img src="{{ url('media/photo') }}?f={{ rawurlencode($file) }}" alt="">
    @endif
    <span>{{ mb_substr((string) $name, 0, 1) }}</span>
</div>
