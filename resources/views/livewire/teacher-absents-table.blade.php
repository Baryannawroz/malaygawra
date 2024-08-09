<div dir="rtl">
    <div class="container mx-auto p-4">
        <table class="min-w-full bg-white border border-gray-300 text-center">
            <thead>
                <tr>
                <th class="border-b p-2 cursor-pointer" wire:click="sortByTeacher()">
                    ناوی مامۆستا
                    @if ($sortBy === 'teacher_id')
                    <span>{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                    @endif
                </th>
                    <th class="border-b p-2 cursor-pointer" wire:click="sortByPresentCount()">
                        ئامادە بوو
                        @if ($sortBy === 'present_count')
                        <span>{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                        @endif
                    </th>
                    <th class="border-b p-2 cursor-pointer" wire:click="sortByAbsentCount()">
                        غیاب
                        @if ($sortBy === 'absent_count')
                        <span>{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                        @endif
                    </th>
                    <th class="border-b p-2 cursor-pointer" wire:click="sortByPermissionCount()">
                        ئیجازە
                        @if ($sortBy === 'permission_count')
                        <span>{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                        @endif
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absents as $absent)
                <tr>
                    <td class="border-b p-2">{{ $absent->teacher->name }}</td>
                    <td class="border-b p-2">{{ $absent->present_count }}</td>
                    <td class="border-b p-2">{{ $absent->absent_count }}</td>
                    <td class="border-b p-2">{{ $absent->permission_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $absents->links() }}
        </div>
    </div>
</div>
