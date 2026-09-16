<x-app-layout>
    <x-page-header title="گەڕەکەکان" subtitle="کۆی گشتی: {{ $streets->count() }}">
        @if (auth()->user()->isAdmin)
        <a href="{{ route('street.create') }}" class="mg-btn mg-btn-primary"><i class="bi bi-plus-lg"></i> زیادکردنی گەڕەک</a>
        @endif
    </x-page-header>

    <div class="mg-card" x-data="{ q: '' }">
        <div class="mg-card-header">
            <div class="mg-search">
                <i class="bi bi-search"></i>
                <input type="search" x-model="q" class="mg-input" placeholder="گەڕان..." aria-label="گەڕان لە گەڕەکەکان">
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
                    @forelse ($streets as $street)
                    <tr x-show="q === '' || {{ Js::from(mb_strtolower($street->name)) }}.includes(q.toLowerCase())">
                        <td class="num">{{ $loop->iteration }}</td>
                        <td>{{ $street->name }}</td>
                        <td class="actions">
                            @if (auth()->user()->isAdmin)
                            <div class="actions-inner">
                                <a href="{{ route('street.edit', $street->id) }}" class="mg-btn mg-btn-ghost mg-btn-icon primary"
                                    title="دەستکاری" aria-label="دەستکاریکردنی {{ $street->name }}"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('street.destroy', $street->id) }}" method="POST"
                                    data-confirm="دڵنیایت لە سڕینەوەی «{{ $street->name }}»؟">
                                    @csrf
                                    <button type="submit" class="mg-btn mg-btn-ghost mg-btn-icon danger" title="سڕینەوە"
                                        aria-label="سڕینەوەی {{ $street->name }}"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="3" icon="bi-geo-alt" title="هێشتا هیچ گەڕەکێک تۆمار نەکراوە" />
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
