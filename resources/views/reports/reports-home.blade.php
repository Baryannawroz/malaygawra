<x-app-layout>

  <x-toggle-form title="Form Title 1" route="/submit-form-1">
    <div class="mb-4">
        <label for="date1" class="block text-sm font-medium text-gray-700">Date:</label>
        <input type="date" id="date1" name="date1" class="mt-1 block w-full border-gray-300 rounded-md">
    </div>
    <div class="mb-4">
        <label for="name1" class="block text-sm font-medium text-gray-700">Name:</label>
        <input type="text" id="name1" name="name1" class="mt-1 block w-full border-gray-300 rounded-md">
    </div>
</x-toggle-form>

</x-app-layout>
