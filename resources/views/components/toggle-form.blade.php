{{-- Kept for backward compatibility (reports page now uses its own cards). --}}
<details class="mg-card mg-report-card">
    <summary class="mg-card-header" style="cursor:pointer">
        <span class="mg-card-title">{{ $title }}</span>
        <i class="bi bi-chevron-down"></i>
    </summary>
    <form action="{{ $route }}" method="POST" class="mg-card-body mg-stack">
        @csrf
        {{ $slot }}
        <button type="submit" class="mg-btn mg-btn-primary">پیشاندانی ڕاپۆرت</button>
    </form>
</details>
