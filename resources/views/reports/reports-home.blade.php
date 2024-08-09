<x-app-layout>
    <div class="grid grid-cols-4 gap-4 m-4">
        <x-toggle-form title="ڕاپۆرتی غیاباتی مامۆستا" route="{{ route('report.teacherAbsence') }}">

            <div class="mb-4">
                <label for="date1" class="block text-sm font-medium text-gray-700">لە بەرواری</label>
                <input type="date" id="date1" name="from" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="date1" class="block text-sm font-medium text-gray-700">بۆ بەرواری</label>
                <input type="date" id="date1" name="too" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
        </x-toggle-form>
        <x-toggle-form title="ڕاپۆرتی غیاباتی مامۆستا" route="/submit">
            <div class="mb-4">
                <label for="name1" class="block text-sm font-medium text-gray-300">Name:</label>
                <input type="text" id="name1" name="name1" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="date1" class="block text-sm font-medium text-gray-700">Date:</label>
                <input type="date" id="date1" name="date1" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
        </x-toggle-form>

    </div>

    <script>
        function toggleFormContent(element) {
            const formContent = element.nextElementSibling;
            const icon = element.querySelector('svg');

            formContent.classList.toggle('hidden');
            formContent.classList.toggle('max-h-0');
            formContent.classList.toggle('max-h-screen'); // Adjust max height if needed

            icon.classList.toggle('rotate-180');
        }
    </script>
</x-app-layout>
