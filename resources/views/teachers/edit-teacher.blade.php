<x-app-layout>
    <div class="container mx-auto px-4 py-8" dir="rtl">
        <div class="max-w-3xl bg-white p-8 mx-4 rounded shadow" style="padding: 10px">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">گۆڕانکاری لە زانیارییەکانی مامۆستا</h2>

            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
             
                <!-- Use PATCH method for updating -->

                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                        <label for="name" class="block text-gray-700 font-medium mb-2">ناوی مامۆستا</label>
                        <input type="text" class="form-input mt-1 block w-full" id="name" name="name"
                            value="{{ old('name', $teacher->name) }}" required>
                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="phone" class="block text-gray-700 font-medium mb-2">ژمارە تەلەفونی</label>
                        <input type="text" class="form-input mt-1 block w-full" id="phone" name="phone"
                            value="{{ old('phone', $teacher->phone) }}" required>
                        @error('phone')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                        <label for="birth_date" class="block text-gray-700 font-medium mb-2">بەرواری لەدایکبوون</label>
                        <input type="date" class="form-input mt-1 block w-full" id="birth_date" name="birth_date"
                            value="{{ old('birth_date', $teacher->birth_date) }}" required>
                        @error('birth_date')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="street_id" class="block text-gray-700 font-medium mb-2">گەڕەک</label>
                        <select class="form-select mt-1 block w-full" id="street_id" name="street_id" required>
                            <option value="" disabled>گەڕەک</option>
                            @foreach ($streets as $street)
                            <option value="{{ $street->id }}" {{ $teacher->street_id == $street->id ? 'selected' : ''
                                }}>
                                {{ $street->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('street_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/2 px-3">
                        <label for="photo_path" class="block text-gray-700 font-medium mb-2">وێنەی مامۆستا</label>
                        <input type="file" class="form-input mt-1 block w-full" id="photo_path" name="photo_path">
                        @error('photo_path')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                        <label for="gender" class="block text-gray-700 font-medium mb-2">ڕەگەز</label>
                        <select class="form-select mt-1 block w-full" id="gender" name="gender" required>
                            <option value="" disabled>ڕەگەز</option>
                            <option value="0" {{ $teacher->gender == 0 ? 'selected' : '' }}>مێ</option>
                            <option value="1" {{ $teacher->gender == 1 ? 'selected' : '' }}>نێر</option>
                        </select>
                        @error('gender')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="marital_status" class="block text-gray-700 font-medium mb-2">باری خێزانی</label>
                        <select class="form-select mt-1 block w-full" id="marital_status" name="marital_status"
                            required>
                            <option value="" disabled>باری خێزانی</option>
                            <option value="0" {{ $teacher->marital_status == 0 ? 'selected' : '' }}>سەڵت</option>
                            <option value="1" {{ $teacher->marital_status == 1 ? 'selected' : '' }}>خێزاندار</option>
                        </select>
                        @error('marital_status')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                        گۆڕین
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
