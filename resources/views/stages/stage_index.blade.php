<x-app-layout>
    <x-page-header title="قۆناغەکان" subtitle="کۆی گشتی: {{ $stages->count() }}">
        <a href="{{ route('stage.create') }}" class="mg-btn mg-btn-primary"><i class="bi bi-plus-lg"></i> زیادکردنی قۆناغ</a>
    </x-page-header>

    <div class="mg-card">
        <div class="mg-table-wrap">
            <table class="mg-table">
                <thead>
                    <tr>
                        <th class="num">#</th>
                        <th>ناوی قۆناغ</th>
                        <th>ئاستی وانە</th>
                        <th class="actions"><span class="sr-only">کردارەکان</span></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stages as $stage)
                    <tr>
                        <td class="num">{{ $loop->iteration }}</td>
                        <td>{{ $stage->name }}</td>
                        <td><span class="mg-badge mg-badge-primary">{{ $stage->lesson->name ?? '—' }}</span></td>
                        <td class="actions">
                            <a href="{{ route('stage.edit', $stage->id) }}" class="mg-btn mg-btn-ghost mg-btn-icon primary"
                                title="دەستکاری" aria-label="دەستکاریکردنی {{ $stage->name }}"><i class="bi bi-pencil"></i></a>
                        </td>
                    </tr>
                    @empty
                    <x-mg-empty colspan="4" icon="bi-diagram-3" title="هێشتا هیچ قۆناغێک تۆمار نەکراوە" />
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
