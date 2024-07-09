<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Add Student</h2>

            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text" class="form-input mt-1 block w-full" id="name" name="name" required>
                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="father_phone" class="block text-gray-700 font-medium mb-2">Father's Phone</label>
                        <input type="text" class="form-input mt-1 block w-full" id="father_phone" name="father_phone"
                            required>
                        @error('father_phone')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                        <label for="mother_phone" class="block text-gray-700 font-medium mb-2">Mother's Phone</label>
                        <input type="text" class="form-input mt-1 block w-full" id="mother_phone" name="mother_phone"
                            required>
                        @error('mother_phone')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="school_id" class="block text-gray-700 font-medium mb-2">School</label>
                        <select class="form-select mt-1 block w-full" id="school_id" name="school_id" required>
                            <option value="" disabled selected>Select a school</option>
                            @foreach ($schools as $school)
                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                        @error('school_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                        <label for="birth_date" class="block text-gray-700 font-medium mb-2">Birth Date</label>
                        <input type="date" class="form-input mt-1 block w-full" id="birth_date" name="birth_date"
                            required>
                        @error('birth_date')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="street_id" class="block text-gray-700 font-medium mb-2">Street</label>
                        <select class="form-select mt-1 block w-full" id="street_id" name="street_id" required>
                            <option value="" disabled selected>Select a street</option>
                            @foreach ($streets as $street)
                            <option value="{{ $street->id }}">{{ $street->name }}</option>
                            @endforeach
                        </select>
                        @error('street_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                        <label for="school_stage" class="block text-gray-700 font-medium mb-2">School Stage</label>
                        <input type="text" class="form-input mt-1 block w-full" id="school_stage" name="school_stage"
                            required>
                        @error('school_stage')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="stage_id_parwarda" class="block text-gray-700 font-medium mb-2">Parwarda Stage
                            ID</label>
                        <select class="form-select mt-1 block w-full" id="stage_id_parwarda" name="stage_id_parwarda"
                            required>
                            <option value="" disabled selected>ئاستی پەروەردەی</option>
                            @foreach ($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                            @endforeach
                        </select>
                        @error('stage_id_parwarda')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                        <label for="stage_id_quran" class="block text-gray-700 font-medium mb-2">ئاستی قیرائەت</label>
                        <select class="form-select mt-1 block w-full" id="stage_id_quran" name="stage_id_quran"
                            required>
                            <option value="" disabled selected>ئاستی هەڵبژێرە</option>
                            @foreach ($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                            @endforeach
                        </select>
                        @error('stage_id_quran')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="photo_path" class="block text-gray-700 font-medium mb-2">Photo Path</label>
                        <input type="file" class="form-input mt-1 block w-full" id="photo_path" name="photo_path"
                            required>
                        @error('photo_path')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                        <label for="gender" class="block text-gray-700 font-medium mb-2">Gender</label>
                        <select class="form-select mt-1 block w-full" id="gender" name="gender" required>
                            <option value="" disabled selected>Select a gender</option>
                            <option value="0">مێ</option>
                            <option value="1">نێر</option>
                        </select>
                        @error('gender')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="marital_status" class="block text-gray-700 font-medium mb-2">Marital Status</label>
                        <input type="text" class="form-input mt-1 block w-full" id="marital_status"
                            name="marital_status" required>
                        @error('marital_status')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                Submit
            </button>
        </div>
        </form>
    </div>
    </div>
</x-app-layout>
