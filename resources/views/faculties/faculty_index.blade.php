<x-app-layout>

   <x-add-button>
</x-add-button>
    <div class="flex flex-col-reverse justify-center items-center h-screen ">
        <div class="overflow-x-auto">
            <table class="table-auto min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            #</th>
                        <th
                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Faculty Name</th>
                        <th
                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                    $count = 1;
                    @endphp
                    @foreach($faculties as $faculty)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $count++ }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $faculty->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('faculty.edit', $faculty->id) }}"
                                class="text-indigo-600 hover:text-indigo-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
