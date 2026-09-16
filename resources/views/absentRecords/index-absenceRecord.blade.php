@php
    $present = $absences->where('isAbsent', 0)->count();
    $absent = $absences->where('isAbsent', 1)->count();
    $leave = $absences->where('isAbsent', 2)->count();
@endphp
<x-app-layout>
    <x-page-header :title="'غیاباتی ' . $group->name" :back="route('absents', $group->id)" back-label="مێژووی غیابات">
        <button type="button" class="mg-btn mg-btn-secondary" onclick="window.print()" data-no-lock><i class="bi bi-printer"></i> چاپکردن</button>
    </x-page-header>

    <div class="mg-card">
        <div class="mg-card-header">
            <div>
                <span class="mg-muted">بەروار:</span> <strong class="ltr">{{ $absence->date }}</strong>
            </div>
            <div class="mg-summary">
                <span class="mg-badge mg-badge-success">هاتوو: {{ $present }}</span>
                <span class="mg-badge mg-badge-danger">غایب: {{ $absent }}</span>
                <span class="mg-badge mg-badge-warning">ئیجازە: {{ $leave }}</span>
            </div>
        </div>
        <div class="mg-table-wrap">
            <table class="mg-table">
                <thead>
                    <tr>
                        <th class="num">#</th>
                        <th>ناوی قوتابی</th>
                        <th>دۆخ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absences as $record)
                    <tr>
                        <td class="num">{{ $loop->iteration }}</td>
                        <td>
                            @if ($record->student)
                            <a href="{{ route('student.show', $record->student) }}" class="mg-link">{{ $record->student->name }}</a>
                            @else
                            <span class="mg-muted">قوتابیی سڕاوە</span>
                            @endif
                        </td>
                        <td>
                            @if ($record->isAbsent == 0)
                            <span class="mg-badge mg-badge-success"><i class="bi bi-check"></i> هاتوو</span>
                            @elseif ($record->isAbsent == 1)
                            <span class="mg-badge mg-badge-danger"><i class="bi bi-x"></i> غایب</span>
                            @else
                            <span class="mg-badge mg-badge-warning"><i class="bi bi-dash"></i> ئیجازە</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="3" title="هیچ تۆمارێک نییە" />
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
