<x-app-layout>
    <x-page-header title="مێژووی غیابات" :subtitle="'دەرسی ' . $group->name" :back="route('groupStudent.show', $group->id)"
        back-label="گەڕانەوە بۆ دەرس">
        <a href="{{ route('absent.create', $group->id) }}" class="mg-btn mg-btn-primary"><i class="bi bi-plus-lg"></i> غیاباتی نوێ</a>
    </x-page-header>

    <div class="mg-card">
        <div class="mg-table-wrap">
            <table class="mg-table">
                <thead>
                    <tr>
                        <th class="num">#</th>
                        <th>بەروار</th>
                        <th class="actions"><span class="sr-only">کردارەکان</span></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absences as $absence)
                    <tr>
                        <td class="num">{{ $loop->iteration }}</td>
                        <td><a href="{{ route('absence.records', ['id' => $absence->id]) }}" class="mg-link ltr">{{ $absence->date }}</a></td>
                        <td class="actions">
                            <a href="{{ route('absence.records', ['id' => $absence->id]) }}" class="mg-btn mg-btn-ghost mg-btn-sm">
                                بینین <i class="bi bi-chevron-left"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="3" icon="bi-calendar-x" title="هێشتا هیچ غیاباتێک بۆ ئەم دەرسە تۆمار نەکراوە" />
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
