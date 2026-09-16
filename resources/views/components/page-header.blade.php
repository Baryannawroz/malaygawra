@props(['title', 'subtitle' => null, 'back' => null, 'backLabel' => 'گەڕانەوە'])

<div class="mg-page-header">
    <div>
        @if ($back)
        <div class="mg-breadcrumb">
            <a href="{{ $back }}"><i class="bi bi-arrow-right"></i> {{ $backLabel }}</a>
        </div>
        @endif
        <h1 class="mg-page-title">{{ $title }}</h1>
        @if ($subtitle)
        <p class="mg-page-sub">{{ $subtitle }}</p>
        @endif
    </div>
    @if (trim($slot) !== '')
    <div class="mg-page-actions">{{ $slot }}</div>
    @endif
</div>
