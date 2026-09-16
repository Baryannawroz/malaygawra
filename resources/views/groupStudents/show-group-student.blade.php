<x-app-layout>
    <x-page-header :title="$group->name" subtitle="{{ $students->count() }} قوتابی لەم دەرسەدایە" :back="route('groups')"
        back-label="لیستی دەرسەکان">
        <a href="{{ route('absents', $group) }}" class="mg-btn mg-btn-secondary"><i class="bi bi-clock-history"></i> مێژووی غیابات</a>
        <a href="{{ route('groupStudent.create', $group) }}" class="mg-btn mg-btn-secondary"><i class="bi bi-person-plus"></i> زیادکردنی قوتابی</a>
        <a href="{{ route('absent.create', $group) }}" class="mg-btn mg-btn-primary"><i class="bi bi-check2-square"></i> وەرگرتنی غیابات</a>
    </x-page-header>

    <div class="mg-card">
        <div class="mg-table-wrap">
            <table class="mg-table">
                <thead>
                    <tr>
                        <th class="num">#</th>
                        <th>ناوی قوتابی</th>
                        <th>مۆبایلی باوک</th>
                        <th class="mg-hide-mobile">قوتابخانە</th>
                        <th class="actions"><span class="sr-only">کردارەکان</span></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                    <tr>
                        <td class="num">{{ $loop->iteration }}</td>
                        <td>
                            <a href="{{ route('student.show', $student) }}" class="mg-cell-person">
                                <x-photo-avatar :path="$student->photo_path" :name="$student->name" />
                                <span class="mg-link">{{ $student->name }}</span>
                            </a>
                        </td>
                        <td><a href="tel:{{ $student->father_phone }}" class="ltr">{{ $student->father_phone }}</a></td>
                        <td class="mg-hide-mobile">{{ $student->school->name ?? '—' }}</td>
                        <td class="actions">
                            <form action="{{ route('groupStudent.delete', [$group, $student]) }}" method="POST"
                                data-confirm="«{{ $student->name }}» لەم دەرسە لابدرێت؟ (قوتابییەکە خۆی ناسڕدرێتەوە)">
                                @csrf
                                <button type="submit" class="mg-btn mg-btn-ghost mg-btn-sm" style="color:var(--mg-danger)">
                                    <i class="bi bi-person-dash"></i> لابردن
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="5" icon="bi-people" title="هێشتا هیچ قوتابییەک بۆ ئەم دەرسە زیاد نەکراوە">
                        <a href="{{ route('groupStudent.create', $group) }}" class="mg-link">زیادکردنی قوتابی</a>
                    </x-mg-empty>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
