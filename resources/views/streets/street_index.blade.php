<x-app-layout>
    <div class="flex justify-center mt-2">
        <x-add-street-button></x-add-street-button>
    </div>

    <!-- Search Bar -->
    <div class="flex justify-center mt-4">
        <div class="w-full max-w-lg">
            <div class="flex items-center border-b border-b-2 border-blue-500 py-2">
                <input id="search-input"
                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                    type="text" placeholder="Search for streets" aria-label="Search">
            </div>
        </div>
    </div>

    <div class="r mt-8">
        <div class="overflow-x-auto">
            <table id="streets-table" class="table-auto min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">
                    <tr>
                        <th class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-wider">#</th>
                        <th class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-wider">street
                            Name</th>
                        <th class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach($streets as $street)
                    <tr class="{{ $count % 2 == 0 ? 'bg-blue-200' : '' }}">
                        <td class="px-6 py-6 whitespace-nowrap">{{ $count++ }}</td>
                        <td class="px-6 py-6 whitespace-nowrap">{{ $street->name }}</td>
                        <td class="px-6 py-6 whitespace-nowrap flex items-center">
                            <a href="{{ route('street.edit', $street->id) }}"
                                class="text-blue-500 hover:text-blue-600 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-edit" fill="none"
                                    height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                            </a>
                            <form action="{{ route('street.destroy', $street->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this street?');">
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript to handle search and hide rows -->
    <script>
        document.getElementById('search-input').addEventListener('input', function() {
            let searchText = this.value.toLowerCase();
            let rows = document.querySelectorAll('#streets-table tbody tr');

            rows.forEach(row => {
                let streetName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                if (streetName.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
