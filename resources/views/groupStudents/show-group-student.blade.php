<x-app-layout>
    <div class="container mx-auto mt-10" dir="rtl" style="margin: 0 2%">
        <h1 class="text-3xl font-bold mb-5 text-center d-block bg-blue-500 text-white"
            style="margin: 10px;padding: 10px">لیستی ناوی خوێکاران {{ $group->name }}</h1>

        <x-add-button :route="route('groupStudent.create', $group)" :name="'زیادکردنی قوتابی'"></x-add-button>

        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white border border-gray-200 text-center">
                <thead>
                    <tr class="text-center">
                        <th class="py-2 px-4 bg-gray-200 border-b text-sm font-semibold text-gray-600 text-center">#
                        </th>
                        <th class="py-2 px-4 bg-gray-200 border-b text-sm font-semibold text-gray-600 text-center">ناوی
                            خوێندکار
                        </th>
                        <th class="py-2 px-4 bg-gray-200 border-b text-sm font-semibold text-gray-600 text-center">
                            ڕەقەمتەلەفونی باوک
                        </th>
                        <th class="py-2 px-4 bg-gray-200 border-b text-sm font-semibold text-gray-600 text-center">
                            قوتابخانە
                        </th>
                        <th class="py-2 px-4 bg-gray-200 border-b text-sm font-semibold text-gray-600 text-center">
                            کردارەکان
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr>
                        <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $student->id }}</td>
                        <td class="py-2 px-4 border-b text-sm text-gray-700">
                            <a href="{{ route('student.show', $student) }}">{{ $student->name }}</a>
                        </td>
                        <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $student->father_phone }}</td>
                        <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $student->school->name }}</td>
                        <td class="py-2 px-4 border-b text-sm text-gray-700">
                            <form action="{{ route('groupStudent.delete', [$group, $student]) }}" method="POST">
                                @csrf
                               
                                <button type="submit" class="text-red-500 hover:text-red-700">سڕینەوە</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-4 text-center text-sm text-gray-500">هیچ قوتابیەک نییە.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
