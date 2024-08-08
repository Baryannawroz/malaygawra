<div style="text-align: center;">
    <div>
        @foreach (['یەکشەمە', 'دووشەمە', 'سێشەمە', 'چوارشەمە', 'پێنج شەمە', 'جومعە', 'شەمە'] as $index => $day)
        <button wire:click="addDay('{{ $index }}')" style="background-color: {{ [
                    'یەکشەمە' => '#FFCCCC',
                    'دووشەمە' => '#FFDD99',
                    'چوارشەمە' => '#FFFF99',
                    'سێشەمە' => '#CCFFCC',
                    'پێنج شەمە' => '#99CCFF',
                    'جومعە' => '#CCCCFF',
                    'شەمە' => '#FFCCE5'
                ][$day] }};
                color: #333;
                border: none;
                padding: 10px 15px;
                margin: 5px;
                border-radius: 8px;
                cursor: pointer;
                transition: background-color 0.3s;">
            {{ $day }}
        </button>
        @endforeach
    </div>

    @if ($teachers !== null)
    <form action="{{ route('teacherAbsent.store') }}" method="POST" class="mt-6">
        @csrf

        <!-- Date Picker -->
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">بەروار</label>
            <input type="date" id="date" name="date" required
                class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
        </div>

        <!-- Attendance Table -->
        <table class="min-w-full divide-y divide-gray-200 mb-6 text-center">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">ژمارەی مامۆستا</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">ناوی مامۆستا</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">غیابات</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($teachers as $teacher)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $teacher->teacher->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $teacher->teacher->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="hidden" name="students[{{ $loop->index }}][id]"
                            value="{{ $teacher->teacher->id }}">
                        <select name="students[{{ $loop->index }}][isAbsent]"
                            class="bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="0" class="bg-green-400">هاتوو</option>
                            <option value="1" class="bg-red-400">غایب</option>
                            <option value="2" class="bg-yellow-400">ئیجازە</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Submit Button -->
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors duration-300">
            Submit Attendance
        </button>
    </form>
    @endif
</div>
