<x-app-layout>
    <div class="bg-gray-100 py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Attendance Form</h2>

                @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('absent.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="group_id" value="{{ $group->id }}">

                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" id="date" name="date" required
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <table class="min-w-full divide-y divide-gray-200 mb-6 text-center" >
                        <thead>
                            <tr class="text-center">
                                <th
                                    class="px-6 py-3 bg-gray-50  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ژمارەی قوتابی</th>
                                <th
                                    class="px-6 py-3 bg-gray-50  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ناوی قوتابی</th>
                                <th
                                    class="px-6 py-3 bg-gray-50  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    غیابات</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($students as $student)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $student->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $student->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="hidden" name="students[{{ $loop->index }}][id]"
                                        value="{{ $student->id }}">
                                    <select name="students[{{ $loop->index }}][isAbsent]" id="">
                                        <option value="0" class="bg-green-400">هاتوو</option>
                                        <option value="1" class="bg-red-400">غایب</option>
                                        <option value="2
                                        " class="bg-red-400">ئیجازە</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Submit Attendance
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let today = new Date().toISOString().split('T')[0];
            document.getElementById('date').value = today;
        });
    </script>
</x-app-layout>
