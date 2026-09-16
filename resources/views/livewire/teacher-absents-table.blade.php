@php
    $arrow = fn ($col) => $sortBy === $col ? ($sortDirection === 'asc' ? '▲' : '▼') : '';
@endphp
<div class="mg-card">
    <div class="mg-table-wrap">
        <table class="mg-table">
            <thead>
                <tr>
                    <th class="sortable" wire:click="sortByTeacher()">ناوی مامۆستا {{ $arrow('teacher_id') }}</th>
                    <th class="sortable" wire:click="sortByPresentCount()">هاتوو {{ $arrow('present_count') }}</th>
                    <th class="sortable" wire:click="sortByAbsentCount()">غایب {{ $arrow('absent_count') }}</th>
                    <th class="sortable" wire:click="sortByPermissionCount()">ئیجازە {{ $arrow('permission_count') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($absents as $absent)
                <tr>
                    <td>{{ $absent->teacher->name ?? '—' }}</td>
                    <td><span class="mg-badge mg-badge-success">{{ $absent->present_count }}</span></td>
                    <td><span class="mg-badge mg-badge-danger">{{ $absent->absent_count }}</span></td>
                    <td><span class="mg-badge mg-badge-warning">{{ $absent->permission_count }}</span></td>
                </tr>
                @empty
                <x-mg-empty colspan="4" icon="bi-calendar-x" title="لەم ماوەیەدا هیچ غیاباتێک تۆمار نەکراوە" />
                @endforelse
            </tbody>
        </table>
    </div>
    @if ($absents->hasPages())
    <div class="mg-pagination">{{ $absents->links() }}</div>
    @endif
</div>
