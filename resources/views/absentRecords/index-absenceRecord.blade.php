<!-- resources/views/absence/index.blade.php -->
<x-app-layout>
    <div class="bg-gray-100 py-8" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6 text-center">دەرسی :{{ $group->name }} <span class="bg-blue-400" style="color: rgb(100, 166, 246)">
                        بەرواری :{{ $absence->date }}</span>
                </h2>



                <table class="min-w-full divide-y divide-gray-200 mb-6">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Student ID
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Student Name
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Attendance Status
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($absences as $absence)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ $absence->student->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ $absence->student->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @if($absence->isAbsent == 0)
                                هاتوو
                                @elseif($absence->isAbsent == 1)
                                غایب
                                @else
                                ئیجازە
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $absence->date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
