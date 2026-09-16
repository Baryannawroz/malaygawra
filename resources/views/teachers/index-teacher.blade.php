<x-app-layout>
    <x-page-header title="مامۆستایان" subtitle="کۆی گشتی: {{ number_format($teachers->total()) }} مامۆستا">
        <a href="{{ route('teacher.Schedules') }}" class="mg-btn mg-btn-secondary"><i class="bi bi-calendar-week"></i> خشتەی حەفتانە</a>
        <a href="{{ route('teacherSchedule.create') }}" class="mg-btn mg-btn-secondary"><i class="bi bi-calendar-check"></i> غیاباتی ئەمڕۆ</a>
        <a href="{{ route('teacher.create') }}" class="mg-btn mg-btn-primary"><i class="bi bi-plus-lg"></i> زیادکردنی مامۆستا</a>
    </x-page-header>

    <div class="mg-card">
        <div class="mg-card-header">
            <form action="{{ route('teachers') }}" method="GET" class="mg-toolbar" style="flex:1">
                <div class="mg-search">
                    <i class="bi bi-search"></i>
                    <input type="search" name="search" class="mg-input" placeholder="گەڕان بە ناوی مامۆستا..."
                        value="{{ $search }}" aria-label="گەڕان بە ناوی مامۆستا">
                </div>
                <button type="submit" class="mg-btn mg-btn-secondary" data-no-lock>گەڕان</button>
                @if ($search)
                <a href="{{ route('teachers') }}" class="mg-btn mg-btn-ghost">پاککردنەوە</a>
                @endif
            </form>
        </div>

        <div class="mg-table-wrap">
            <table class="mg-table">
                <thead>
                    <tr>
                        <th class="num">#</th>
                        <th>ناوی مامۆستا</th>
                        <th>ژمارەی مۆبایل</th>
                        <th class="mg-hide-mobile">ڕەگەز</th>
                        <th class="actions"><span class="sr-only">کردارەکان</span></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $teacher)
                    <tr>
                        <td class="num">{{ $teachers->firstItem() + $loop->index }}</td>
                        <td>
                            <a href="{{ route('teacher.show', $teacher) }}" class="mg-cell-person">
                                <x-photo-avatar :path="$teacher->photo_path" :name="$teacher->name" />
                                <span class="mg-link">{{ $teacher->name }}</span>
                            </a>
                        </td>
                        <td><a href="tel:{{ $teacher->phone }}" class="ltr">{{ $teacher->phone }}</a></td>
                        <td class="mg-hide-mobile">{{ $teacher->gender() }}</td>
                        <td class="actions">
                            <div class="actions-inner">
                                <a href="{{ route('teacher.edit', $teacher) }}" class="mg-btn mg-btn-ghost mg-btn-icon primary"
                                    title="دەستکاری" aria-label="دەستکاریکردنی {{ $teacher->name }}"><i class="bi bi-pencil"></i></a>
                                @if (auth()->user()->isAdmin)
                                <form action="{{ route('teacher.destroy', $teacher) }}" method="POST"
                                    data-confirm="دڵنیایت لە سڕینەوەی «{{ $teacher->name }}»؟ ئەم کارە ناگەڕێتەوە.">
                                    @csrf
                                    <button type="submit" class="mg-btn mg-btn-ghost mg-btn-icon danger" title="سڕینەوە"
                                        aria-label="سڕینەوەی {{ $teacher->name }}"><i class="bi bi-trash"></i></button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="5" icon="bi-person-badge" :title="$search ? 'هیچ مامۆستایەک بەم ناوە نەدۆزرایەوە' : 'هێشتا هیچ مامۆستایەک تۆمار نەکراوە'" />
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($teachers->hasPages())
        <div class="mg-pagination">
            {{ $teachers->appends(['search' => $search])->links('pagination::tailwind') }}
        </div>
        @endif
    </div>
</x-app-layout>
