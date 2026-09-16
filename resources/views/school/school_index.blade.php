<x-app-layout>
    <x-page-header title="قوتابخانەکان" subtitle="کۆی گشتی: {{ $schools->count() }}">
        @if (auth()->user()->isAdmin)
        <a href="{{ route('school.create') }}" class="mg-btn mg-btn-primary"><i class="bi bi-plus-lg"></i> زیادکردنی قوتابخانە</a>
        @endif
    </x-page-header>

    <div class="mg-card" x-data="{ q: '' }">
        <div class="mg-card-header">
            <div class="mg-search">
                <i class="bi bi-search"></i>
                <input type="search" x-model="q" class="mg-input" placeholder="گەڕان..." aria-label="گەڕان لە قوتابخانەکان">
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
                    @forelse ($schools as $school)
                    <tr x-show="q === '' || {{ Js::from(mb_strtolower($school->name)) }}.includes(q.toLowerCase())">
                        <td class="num">{{ $loop->iteration }}</td>
                        <td>{{ $school->name }}</td>
                        <td class="actions">
                            @if (auth()->user()->isAdmin)
                            <div class="actions-inner">
                                <a href="{{ route('school.edit', $school->id) }}" class="mg-btn mg-btn-ghost mg-btn-icon primary"
                                    title="دەستکاری" aria-label="دەستکاریکردنی {{ $school->name }}"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('school.destroy', $school->id) }}" method="POST"
                                    data-confirm="دڵنیایت لە سڕینەوەی «{{ $school->name }}»؟">
                                    @csrf
                                    <button type="submit" class="mg-btn mg-btn-ghost mg-btn-icon danger" title="سڕینەوە"
                                        aria-label="سڕینەوەی {{ $school->name }}"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="3" icon="bi-building" title="هێشتا هیچ قوتابخانەیەک تۆمار نەکراوە" />
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
