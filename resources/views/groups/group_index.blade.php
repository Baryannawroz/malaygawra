<x-app-layout>
    <x-page-header title="دەرسەکان" subtitle="دەرسێک هەڵبژێرە بۆ بینینی قوتابیان و وەرگرتنی غیابات">
        @if (auth()->user()->isAdmin)
        <a href="{{ route('group.create') }}" class="mg-btn mg-btn-primary"><i class="bi bi-plus-lg"></i> دروستکردنی دەرس</a>
        @endif
    </x-page-header>

    <div class="mg-card">
        <div class="mg-card-header">
            <form action="{{ route('groups') }}" method="GET" class="mg-toolbar" style="flex:1">
                <div class="mg-search">
                    <i class="bi bi-search"></i>
                    <input type="search" name="search" class="mg-input" placeholder="گەڕان بە ناوی دەرس..."
                        value="{{ request('search') }}" aria-label="گەڕان بە ناوی دەرس">
                </div>
                <button type="submit" class="mg-btn mg-btn-secondary" data-no-lock>گەڕان</button>
                @if (request('search'))
                <a href="{{ route('groups') }}" class="mg-btn mg-btn-ghost">پاککردنەوە</a>
                @endif
            </form>
        </div>

        <div class="mg-table-wrap">
            <table class="mg-table">
                <thead>
                    <tr>
                        <th class="num">#</th>
                        <th>ناوی دەرس</th>
                        <th>مامۆستای سەرپەرشتیار</th>
                        <th class="actions"><span class="sr-only">کردارەکان</span></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($groups as $group)
                    <tr>
                        <td class="num">{{ $groups->firstItem() + $loop->index }}</td>
                        <td><a href="{{ route('groupStudent.show', $group->id) }}" class="mg-link">{{ $group->name }}</a></td>
                        <td>{{ $group->teacher->name ?? '—' }}</td>
                        <td class="actions">
                            <div class="actions-inner">
                                <a href="{{ route('absent.create', $group->id) }}" class="mg-btn mg-btn-secondary mg-btn-sm"
                                    title="وەرگرتنی غیابات"><i class="bi bi-check2-square"></i> غیابات</a>
                                @if (auth()->user()->isAdmin)
                                <a href="{{ route('group.edit', $group->id) }}" class="mg-btn mg-btn-ghost mg-btn-icon primary"
                                    title="دەستکاری" aria-label="دەستکاریکردنی {{ $group->name }}"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('group.destroy', $group->id) }}" method="POST"
                                    data-confirm="دڵنیایت لە سڕینەوەی دەرسی «{{ $group->name }}»؟">
                                    @csrf
                                    <button type="submit" class="mg-btn mg-btn-ghost mg-btn-icon danger" title="سڕینەوە"
                                        aria-label="سڕینەوەی {{ $group->name }}"><i class="bi bi-trash"></i></button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="4" icon="bi-journal-bookmark" :title="request('search') ? 'هیچ دەرسێک بەم ناوە نەدۆزرایەوە' : 'هێشتا هیچ دەرسێک دروست نەکراوە'" />
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($groups->hasPages())
        <div class="mg-pagination">
            {{ $groups->appends(['search' => request('search')])->links('pagination::tailwind') }}
        </div>
        @endif
    </div>
</x-app-layout>
