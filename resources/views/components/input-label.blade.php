@props(['value'])

<label {{ $attributes->merge(['class' => 'mg-label']) }}>
    {{ $value ?? $slot }}
</label>
