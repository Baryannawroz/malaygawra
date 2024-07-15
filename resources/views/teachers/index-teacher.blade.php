<x-app-layout>
    <div class="container mx-auto mt-10" dir="rtl" style="margin: 0 2%">
        <h1 class="text-3xl font-bold mb-5">لیستی مامۆستاکان</h1>

        <x-add-teacher-button>
        </x-add-teacher-button>

        <form action="{{ route('teachers') }}" method="GET" class="mb-5">
            <div class="flex" style="margin:  2% 0">
                <input type="text" name="search"
                    class="form-input flex-grow rounded-l-lg border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white"
                    placeholder="ناوی مامۆستا" value="{{ request()->input('search') }}">
                <button
                    class="bg-blue-500 text-white rounded-r-lg px-4 py-2 uppercase border-blue-500 border-t border-b border-r">گەڕان</button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 text-center    ">
                <thead>
                    <tr class="text-center">
                        <th class="py-2 px-4 bg-gray-200 border-b  text-sm font-semibold text-gray-600 text-center ">#
                        </th>
                        <th class="py-2 px-4 bg-gray-200 border-b  text-sm font-semibold text-gray-600 text-center">ناوی
                            مامۆستا
                        </th>
                        <th class="py-2 px-4 bg-gray-200 border-b  text-sm font-semibold text-gray-600 text-center">
                            ڕەقەم تەلەفون
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teachers as $teacher)
                    <tr>
                        <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $teacher->id }}</td>
                        <td class="py-2 px-4 border-b text-sm text-gray-700"><a
                                href="{{ route('teacher.show',$teacher) }}">{{ $teacher->name }}</a></td>
                        <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $teacher->phone }}</td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="py-4 text-center text-sm text-gray-500">هیچ مامۆستایەک بەردەست نییە</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            {{ $teachers->appends(['search' => $search])->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
