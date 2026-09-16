<x-app-layout>
    <x-page-header title="ڕاپۆرتی قوتابیان" subtitle="کۆی ئەنجام: {{ number_format($students->total()) }}" :back="route('reports')"
        back-label="ڕاپۆرتەکان">
        <button type="button" class="mg-btn mg-btn-secondary" onclick="window.print()" data-no-lock><i class="bi bi-printer"></i> چاپکردن</button>
    </x-page-header>

    <div class="mg-card">
        <form method="GET" action="{{ route('report.student') }}" class="mg-card-header mg-no-print" style="align-items:flex-end">
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
                <div class="mg-field"><label class="mg-label" for="f-s">قوتابخانە</label>
                    <select id="f-s" name="school_id" class="mg-select">
                        <option value="">هەمووی</option>
                        @foreach ($schools as $school)
                        <option value="{{ $school->id }}" @selected((string) request('school_id') === (string) $school->id)>{{ $school->name }}</option>
                        @endforeach
                    </select></div>
                <button type="submit" class="mg-btn mg-btn-primary" data-no-lock><i class="bi bi-funnel"></i> فلتەر</button>
                <a href="{{ route('report.student') }}" class="mg-btn mg-btn-ghost">پاککردنەوە</a>
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
                        <th>قوتابخانە</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                    <tr>
                        <td class="num">{{ $students->firstItem() + $loop->index }}</td>
                        <td><a href="{{ route('student.show', $student) }}" class="mg-link">{{ $student->name }}</a></td>
                        <td>{{ $student->gender ? 'نێر' : 'مێ' }}</td>
                        <td><span class="ltr">{{ $student->birth_date }}</span></td>
                        <td>{{ $student->school->name ?? '—' }}</td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="5" icon="bi-search" title="هیچ قوتابییەک بەم فلتەرانە نەدۆزرایەوە" />
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($students->hasPages())
        <div class="mg-pagination mg-no-print">{{ $students->appends(request()->query())->links('pagination::tailwind') }}</div>
        @endif
    </div>
</x-app-layout>
