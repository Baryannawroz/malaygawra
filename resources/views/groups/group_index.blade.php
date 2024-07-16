<x-app-layout>
    <div dir="rtl" style="margin: 0 2%">
        <x-add-button :route="route('group.create')" :name="'زیادکردنی دەرسێک'"></x-add-button>
        <form action="{{ route('groups') }}" method="GET" class="mb-5">
            <div class="flex" style="margin: 2% 0">
                <input type="text" name="search"
                    class="form-input flex-grow rounded-l-lg border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white"
                    placeholder="ناوی دەرسەکە" value="{{ request()->input('search') }}">
                <button
                    class="bg-blue-500 text-white rounded-r-lg px-4 py-2 uppercase border-blue-500 border-t border-b border-r">گەڕان</button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 text-center">
                <thead>
                    <tr class="text-center">
                        <th class="py-2 px-4 bg-gray-200 border-b text-sm font-semibold text-gray-600">#</th>
                        <th class="py-2 px-4 bg-gray-200 border-b text-sm font-semibold text-gray-600">ناوی دەرس
                        </th>
                        <th class="py-2 px-4 bg-gray-200 border-b text-sm font-semibold text-gray-600">مامۆستای
                            سەرپەرشتیار
                        </th>
                        <th class="py-2 px-4 bg-gray-200 border-b text-sm font-semibold text-gray-600">کردارەکان</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($groups as $group)
                    <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $group->id }}</td>
                        <td class="py-2 px-4 border-b text-sm text-gray-700"><a href="" {{-- {{ route('group.show',
                                $group) }} --}} class="text-blue-500 hover:underline">{{
                                $group->name }}</a></td>
                        <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $group->teacher_id->name }}</td>
                        <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $group->school->name }}</td>
                        <td class="px-6 py-6 whitespace-nowrap flex items-center">
                            <a href="{{ route('group.edit', $group->id) }}"
                                class="text-blue-500 hover:text-blue-600 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-edit" fill="none"
                                    height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                            </a>
                            <form action="{{ route('group.destroy', $group->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this group?');">
                                @csrf
                                @method('post')
                                <button type="submit" class="text-red-500 hover:text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-trash" fill="none"
                                        height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" width="24">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6L5 6 5 21a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6z" />
                                        <line x1="10" x2="10" y1="11" y2="17" />
                                        <line x1="14" x2="14" y1="11" y2="17" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-4 text-center text-sm text-gray-500">هیچ دەرسێک نییە.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            {{ $groups->appends(['search' => request()->input('search')])->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>