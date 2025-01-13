<x-app-layout>
    <div class="text-center border border-gray-800 bg-gradient-to-r from-green-400 to-blue-500 rounded p-4 mx-2 mb-4">
        <h2 class="text-black text-xl font-semibold">خشتەی حەفتانە</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 bg-white">
            <thead class="bg-gray-100">
                <tr>
                    @php
                    $days = ['یەک شەمە','دوو شەمە', 'سێ شەمە', 'چوار شەمە', 'پێنج شەمە', 'هەینی', 'شەمە', 'یەک شەمە'];
                    @endphp
                    @foreach ($days as $day)
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $day }}
                    </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    @foreach ($days as $index => $day)
                    @php
                    $daySchedules = $schedules->filter(function ($schedule) use ($index) {
                    return $schedule->day_of_week == $index;
                    });
                    @endphp
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <div class="mb-2">
                                <div class="flex items-center">
                                    <select name="teacher_id" id="teacher_{{ $index }}"
                                        class="teacherSearch form-select block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                        required>
                                    </select>
                                    </div>
                                    <div class="flex items-center">
                                    <button
                                        class="ml-2 px-3 py-2 mt-3 bg-blue-500 text-white text-xs font-medium rounded shadow-sm hover:bg-blue-600 focus:outline-none"
                                        onclick="saveSchedule({{ $index }})">
                                        <span class="p-4">
                                            ناردن
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div id="teachers-list_{{ $index }}" class="space-y-2">
                                @php $i = 1; @endphp
                                @foreach ($daySchedules as $schedule)
                                <div class="flex justify-between items-center py-1"
                                    id="schedule-record-{{ $schedule->id }}">
                                    <span>{{ $i++ . "- " }}{{ $schedule->teacher->name }}</span>
                                    <button onclick="deleteSchedule({{ $schedule->id }})"
                                        class="text-red-500 hover:text-red-700">
                                        سڕینەوە
                                    </button>
                                </div>
                                <hr>
                                @endforeach
                            </div>
                        </div>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>


    <script>
        function saveSchedule(day_of_week) {
                let teacher_id = $("#teacher_" + day_of_week).val();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/api/schedules/administrator/add",
                    data: {
                        day_of_week: day_of_week,
                        teacher_id: teacher_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data.data);
                        $("#teachers-list_" + day_of_week).prepend(`
                            <div class="flex justify-between items-center py-1" id="schedule-record-${data.id}">
                                <span>${data.name}</span>
                                <button onclick="deleteSchedule(${data.id})" class="text-red-500 hover:text-red-700">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </div>
                            <hr>
                        `);
                    },
                    error: function() {
                        console.log('error');
                    },
                });
            }

            function deleteSchedule(id) {
                $.ajax({
                    type: "DELETE",
                    url: "/api/schedules/administrator/destroy/" + id,
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        $("#schedule-record-" + id).remove();
                    },
                });
            }
    </script>

</x-app-layout>
