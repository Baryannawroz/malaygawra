<x-app-layout>
    <x-page-header title="ڕاپۆرتی مامۆستایان" subtitle="کۆی ئەنجام: {{ number_format($teachers->total()) }}" :back="route('reports')"
        back-label="ڕاپۆرتەکان">
        <button type="button" class="mg-btn mg-btn-secondary" onclick="window.print()" data-no-lock><i class="bi bi-printer"></i> چاپکردن</button>
    </x-page-header>

    <div class="mg-card">
        <form method="GET" action="{{ route('report.teacher') }}" class="mg-card-header mg-no-print">
            <div class="mg-toolbar" style="flex:1;align-items:flex-end">
                <div class="mg-field"><label class="mg-label" for="f-from">لەدایکبوون لە</label>
                    <input type="date" id="f-from" name="from" value="{{ request('from') }}" class="mg-input"></div>
                <div class="mg-field"><label class="mg-label" for="f-to">تا</label>
                    <input type="date" id="f-to" name="to" value="{{ request('to') }}" class="mg-input"></div>
                <div class="mg-field"><label class="mg-label" for="f-g">ڕەگەز</label>
                    <select id="f-g" name="isMale" class="mg-select">
                        <option value="">هەمووی</option>
                        <option value="1" @selected(request('isMale') === '1')>نێر</option>
                        <option value="0" @selected(request('isMale') === '0')>مێ</option>
                    </select></div>
                <button type="submit" class="mg-btn mg-btn-primary" data-no-lock><i class="bi bi-funnel"></i> فلتەر</button>
                <a href="{{ route('report.teacher') }}" class="mg-btn mg-btn-ghost">پاککردنەوە</a>
            </div>
        </form>

        <div class="mg-table-wrap">
            <table class="mg-table">
                <thead>
                    <tr>
                        <th class="num">#</th>
                        <th>ناو</th>
                        <th>ڕەگەز</th>
                        <th>بەرواری لەدایکبوون</th>
                        <th>ژمارەی مۆبایل</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $teacher)
                    <tr>
                        <td class="num">{{ $teachers->firstItem() + $loop->index }}</td>
                        <td><a href="{{ route('teacher.show', $teacher) }}" class="mg-link">{{ $teacher->name }}</a></td>
                        <td>{{ $teacher->gender ? 'نێر' : 'مێ' }}</td>
                        <td><span class="ltr">{{ $teacher->birth_date }}</span></td>
                        <td><span class="ltr">{{ $teacher->phone }}</span></td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="5" icon="bi-search" title="هیچ مامۆستایەک بەم فلتەرانە نەدۆزرایەوە" />
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($teachers->hasPages())
        <div class="mg-pagination mg-no-print">{{ $teachers->appends(request()->query())->links('pagination::tailwind') }}</div>
        @endif
    </div>
</x-app-layout>
