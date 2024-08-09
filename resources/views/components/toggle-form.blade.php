<div class="bg-gray-200 p-6 rounded-lg shadow-md">
    <div class="cursor-pointer border-b border-gray-300 pb-2 mb-4" onclick="toggleFormContent(this)">
        <h2 class="text-lg font-semibold text-gray-800 transition-transform duration-300 ease-in-out">
            {{ $title }}
        </h2>
        <svg class="w-5 h-5 inline-block text-gray-500 transition-transform duration-300 ease-in-out transform rotate-0"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="toggleIcon">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </div>
    <div class="form-content p-4 hidden transition-all duration-300 ease-in-out overflow-hidden max-h-0">
        <form action="{{ $route }}" method="POST">
            @csrf
            {{ $slot }}
            <button type="submit"
                class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 transition">
                تۆمارکردن
            </button>
        </form>
    </div>
</div>


