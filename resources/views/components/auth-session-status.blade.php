@props(['status'])

@if ($status)
<div {{ $attributes->merge(['class' => 'mg-alert mg-alert-success']) }}>
    {{ $status }}
</div>
@endif
