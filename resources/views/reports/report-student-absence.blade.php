<x-app-layout>

    <div dir="rtl">
        <div class="container mx-auto p-4">
            <table class="min-w-full bg-white border border-gray-300 text-center">
                <thead>
                    <tr>
                        <th class="border-b p-2 cursor-pointer" wire:click="sortByTeacher()">
                            ناوی قوتابی
                        </th>
                        <th class="border-b p-2 cursor-pointer" wire:click="sortByPresentCount()">
                            ئامادە بوو
                        </th>
                        <th class="border-b p-2 cursor-pointer" wire:click="sortByAbsentCount()">
                            غیاب
                        </th>
                        <th class="border-b p-2 cursor-pointer" wire:click="sortByPermissionCount()">
                            ئیجازە
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absents as $absent)
                    <tr>
                        <td class="border-b p-2">{{ $absent->student->name }}</td>
                        <td class="border-b p-2">{{ $absent->present_count }}</td>
                        <td class="border-b p-2">{{ $absent->absent_count }}</td>
                        <td class="border-b p-2">{{ $absent->permission_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            {{-- <div class="mt-4">
                {{ $absents->links() }}
            </div> --}}
        </div>
    </div>

</x-app-layout>
