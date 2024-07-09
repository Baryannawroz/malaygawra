<x-app-layout>
    <div class="flex items-center justify-center h-screen ">
        <div class="bg-blue-600 p-6 rounded-lg shadow-md w-3/4 h-3/4 flex justify-center items-cente">

            <form action="{!! route('stage.store') !!}" method="POST"
                class="mt-8 space-y-6 w-3/4 flex-col justify-center items-center">
                @csrf
                <div class="">

                    <h1 class="text-4xl font-bold mb-4 text-center text-white">Create New stage</h1>
                    <h6 class="text-center text-xl w-full text-white">Please Fill information below</h6>
                </div>

                <div class="mb-4 flex items-center justify-center">
                    <input type="text" name="name" id="name" placeholder="please enter name"
                        class="border border-gray-300 rounded-lg py-4 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

               

                <div class="mb-4 flex items-center justify-center">
                    <select name="lesson_id" id="lesson_id"
                        class="border border-gray-300 rounded-lg py-4 px-3 w-full focus:outline-none focus:border-blue-500">

                        @foreach($lessons as $lesson)
                        <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                        @endforeach
                    </select>
                    @error('lesson_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-center">

                    <button type="submit"
                        class="text-white border border-white  hover:bg-white hover:text-blue-600 font-bold py-2 px-8 rounded-lg focus:outline-none focus:shadow-outline">Create
                        stage</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
