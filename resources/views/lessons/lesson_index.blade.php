<x-app-layout>
    <x-page-header title="ئاستی وانەکان" subtitle="کۆی گشتی: {{ $lessons->count() }}">
        @if (auth()->user()->isAdmin)
        <a href="{{ route('lesson.create') }}" class="mg-btn mg-btn-primary"><i class="bi bi-plus-lg"></i> زیادکردنی ئاستی وانە</a>
        @endif
    </x-page-header>

    <div class="mg-card" x-data="{ q: '' }">
        <div class="mg-card-header">
            <div class="mg-search">
                <i class="bi bi-search"></i>
                <input type="search" x-model="q" class="mg-input" placeholder="گەڕان..." aria-label="گەڕان لە ئاستی وانەکان">
            </div>
        </div>
        <div class="mg-table-wrap">
            <table class="mg-table">
                <thead>
                    <tr>
                        <th class="num">#</th>
                        <th>ناو</th>
                        <th class="actions"><span class="sr-only">کردارەکان</span></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lessons as $lesson)
                    <tr x-show="q === '' || {{ Js::from(mb_strtolower($lesson->name)) }}.includes(q.toLowerCase())">
                        <td class="num">{{ $loop->iteration }}</td>
                        <td>{{ $lesson->name }}</td>
                        <td class="actions">
                            @if (auth()->user()->isAdmin)
                            <div class="actions-inner">
                                <a href="{{ route('lesson.edit', $lesson->id) }}" class="mg-btn mg-btn-ghost mg-btn-icon primary"
                                    title="دەستکاری" aria-label="دەستکاریکردنی {{ $lesson->name }}"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('lesson.destroy', $lesson->id) }}" method="POST"
                                    data-confirm="دڵنیایت لە سڕینەوەی «{{ $lesson->name }}»؟">
                                    @csrf
                                    <button type="submit" class="mg-btn mg-btn-ghost mg-btn-icon danger" title="سڕینەوە"
                                        aria-label="سڕینەوەی {{ $lesson->name }}"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="3" icon="bi-layers" title="هێشتا هیچ ئاستێک تۆمار نەکراوە" />
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
