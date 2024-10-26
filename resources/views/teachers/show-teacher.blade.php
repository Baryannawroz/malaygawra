<x-app-layout>
    <div class="container mx-auto py-8 px-4 bg-blue-50">
        <div class="mx-auto bg-white p-8 rounded-lg shadow-lg">
            <div class="flex">
                <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                    @if ($teacher->photo_path)
                    <div class="mb-6">
                        <img src="{{ asset($teacher->photo_path) }}" alt="Student Photo"
                            style="height: 300px; width: 300px; object-fit: cover; border-radius: 50%;"
                            class="w-full h-auto rounded-lg shadow-md border-4 border-blue-100">
                    </div>
                    @else
                    <p class="text-center text-gray-500">وێنەی تۆمار نەکراوە</p>
                    @endif
                </div>
                <div class="col-lg-8 col-12 p-4 center ">
                    <h2 class="text-5xl font-bold mb-6 text-center text-blue-800"> ناوی قوتابی: {{ $teacher->name }}</h2>
                    <div class="mb-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <p class="text-lg text-gray-700"><strong class="text-blue-700">ژمارە تەلەفوونی
                                        باوک:</strong>
                                    {{ $teacher->father_phone }}</p>
                                <p class="text-lg text-gray-700"><strong class="text-blue-700">ژمارەتەلەفونی
                                        دایک:</strong>
                                    {{ $teacher->mother_phone }}</p>

                                <p class="text-lg text-gray-700"><strong class="text-blue-700">کۆلان:</strong> {{
                                    $teacher->street->name }}</p>
                            </div>
                            <div>
                           
                                <p class="text-lg text-gray-700"><strong class="text-blue-700">ڕەگەز:</strong> {{
                                    $teacher->gender() }}</p>
                                <p class="text-lg text-gray-700"><strong class="text-blue-700">باری کەسی:</strong> {{
                                    $teacher->marital() }}</p>
                                <p class="text-lg text-gray-700"><strong class="text-blue-700">بەرواری
                                        لەدایکبوون:</strong> {{
                                    $teacher->birth_date }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
