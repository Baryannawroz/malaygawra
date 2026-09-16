<x-app-layout>
    <x-page-header title="ڕاپۆرتی غیاباتی قوتابیان" :back="route('reports')" back-label="ڕاپۆرتەکان">
        <button type="button" class="mg-btn mg-btn-secondary" onclick="window.print()" data-no-lock><i class="bi bi-printer"></i> چاپکردن</button>
    </x-page-header>

    <div class="mg-card">
        <form method="GET" action="{{ route('report.studentAbsence') }}" class="mg-card-header mg-no-print">
            <div class="mg-toolbar" style="flex:1;align-items:flex-end">
                <div class="mg-field"><label class="mg-label" for="f-from">لە بەرواری</label>
                    <input type="date" id="f-from" name="from" value="{{ $from }}" class="mg-input"></div>
                <div class="mg-field"><label class="mg-label" for="f-to">تا بەرواری</label>
                    <input type="date" id="f-to" name="to" value="{{ $to }}" class="mg-input"></div>
                <button type="submit" class="mg-btn mg-btn-primary" data-no-lock><i class="bi bi-funnel"></i> فلتەر</button>
            </div>
            <span class="mg-muted" style="font-size:13px">@include('reports._filters-summary')</span>
        </form>

        <div class="mg-table-wrap">
            <table class="mg-table">
                <thead>
                    <tr>
                        <th class="num">#</th>
                        <th>ناوی قوتابی</th>
                        <th>هاتوو</th>
                        <th>غایب</th>
                        <th>ئیجازە</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absents->sortByDesc('absent_count') as $absent)
                    <tr>
                        <td class="num">{{ $loop->iteration }}</td>
                        <td>{{ $absent->student->name ?? '—' }}</td>
                        <td><span class="mg-badge mg-badge-success">{{ $absent->present_count }}</span></td>
                        <td><span class="mg-badge mg-badge-danger">{{ $absent->absent_count }}</span></td>
                        <td><span class="mg-badge mg-badge-warning">{{ $absent->permission_count }}</span></td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="5" icon="bi-calendar-x" title="لەم ماوەیەدا هیچ غیاباتێک تۆمار نەکراوە" />
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
