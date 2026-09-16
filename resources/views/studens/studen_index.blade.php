<x-app-layout>
    <x-page-header title="قوتابیان" subtitle="کۆی گشتی: {{ number_format($students->total()) }} قوتابی">
        <a href="{{ route('student.create') }}" class="mg-btn mg-btn-primary"><i class="bi bi-plus-lg"></i> زیادکردنی قوتابی</a>
    </x-page-header>

    <div class="mg-card">
        <div class="mg-card-header">
            <form action="{{ route('students') }}" method="GET" class="mg-toolbar" style="flex:1">
                <div class="mg-search">
                    <i class="bi bi-search"></i>
                    <input type="search" name="search" class="mg-input" placeholder="گەڕان بە ناوی قوتابی..."
                        value="{{ $search }}" aria-label="گەڕان بە ناوی قوتابی">
                </div>
                <button type="submit" class="mg-btn mg-btn-secondary" data-no-lock>گەڕان</button>
                @if ($search)
                <a href="{{ route('students') }}" class="mg-btn mg-btn-ghost">پاککردنەوە</a>
                @endif
            </form>
        </div>

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
                        <td class="num">{{ $students->firstItem() + $loop->index }}</td>
                        <td>
                            <a href="{{ route('student.show', $student) }}" class="mg-cell-person">
                                <x-photo-avatar :path="$student->photo_path" :name="$student->name" />
                                <span class="mg-link">{{ $student->name }}</span>
                            </a>
                        </td>
                        <td><a href="tel:{{ $student->father_phone }}" class="ltr">{{ $student->father_phone }}</a></td>
                        <td class="mg-hide-mobile">{{ $student->school->name ?? '—' }}</td>
                        <td class="actions">
                            <div class="actions-inner">
                                <a href="{{ route('student.edit', $student) }}" class="mg-btn mg-btn-ghost mg-btn-icon primary"
                                    title="دەستکاری" aria-label="دەستکاریکردنی {{ $student->name }}"><i class="bi bi-pencil"></i></a>
                                @if (auth()->user()->isAdmin)
                                <a href="{{ route('student.destroy', $student) }}" class="mg-btn mg-btn-ghost mg-btn-icon danger"
                                    title="سڕینەوە" aria-label="سڕینەوەی {{ $student->name }}"
                                    data-confirm="دڵنیایت لە سڕینەوەی «{{ $student->name }}»؟ ئەم کارە ناگەڕێتەوە."><i class="bi bi-trash"></i></a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="5" icon="bi-people" :title="$search ? 'هیچ قوتابییەک بەم ناوە نەدۆزرایەوە' : 'هێشتا هیچ قوتابییەک تۆمار نەکراوە'">
                        @unless ($search)
                        <a href="{{ route('student.create') }}" class="mg-link">یەکەم قوتابی زیاد بکە</a>
                        @endunless
                    </x-mg-empty>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($students->hasPages())
        <div class="mg-pagination">
            {{ $students->appends(['search' => $search])->links('pagination::tailwind') }}
        </div>
        @endif
    </div>
</x-app-layout>
