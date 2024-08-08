<div class="bg-white shadow-md rounded-lg mb-4">
    <div class="p-4 cursor-pointer" onclick="toggleFormContent(this)">
        <h2 class="text-lg font-semibold text-gray-800">{{ $title }}</h2>
    </div>
    <div class="form-content p-4 hidden">
        <form action="{{ $route }}" method="POST">
            @csrf
            {{ $slot }}
            <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Submit</button>
        </form>
    </div>
</div>

<script>
    function toggleFormContent(element) {
        const formContent = element.nextElementSibling;
        formContent.classList.toggle('hidden');
    }
</script>
