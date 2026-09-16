<x-app-layout>
    <x-page-header title="ڕاپۆرتی غیاباتی مامۆستایان" :back="route('reports')" back-label="ڕاپۆرتەکان">
        <button type="button" class="mg-btn mg-btn-secondary" onclick="window.print()" data-no-lock><i class="bi bi-printer"></i> چاپکردن</button>
    </x-page-header>

    <form method="GET" action="{{ route('report.teacherAbsence') }}" class="mg-card mg-no-print" style="margin-bottom:16px">
        <div class="mg-card-body mg-toolbar" style="align-items:flex-end">
            <div class="mg-field"><label class="mg-label" for="f-from">لە بەرواری</label>
                <input type="date" id="f-from" name="from" value="{{ $from }}" class="mg-input"></div>
            <div class="mg-field"><label class="mg-label" for="f-to">تا بەرواری</label>
                <input type="date" id="f-to" name="to" value="{{ $to }}" class="mg-input"></div>
            <button type="submit" class="mg-btn mg-btn-primary" data-no-lock><i class="bi bi-funnel"></i> فلتەر</button>
            <span class="mg-muted" style="font-size:13px">@include('reports._filters-summary')</span>
        </div>
    </form>

    <livewire:teacher-absents-table :from="$from" :to="$to" />
</x-app-layout>
