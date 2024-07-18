<x-app-layout>
    <div class="flex items-center justify-center h-screen">
        <div class="bg-blue-600 p-6 rounded-lg shadow-md w-3/4 h-3/4 flex justify-center items-center">

            <form action="{!! route('groupStudent.store') !!}" method="POST"
                class="mt-8 space-y-6 w-3/4 flex-col justify-center items-center">
                @csrf
                <h1 class="text-5xl font-bold mb-4 text-center text-white">زیادکردنی قوتابی بۆ دەرسی</h1>
                <h6 class="text-center text-xl w-full text-white">{{ $group->name }}</h6>

                <div class="container mx-auto p-4" >
                    <input type="number" value="{{ $group->id }}" name="group_id" hidden>
                    @if(isset($students) && $students->count())
                    <div class="mb-4">
                        <label for="student_id" class="block text-white mb-2">Select Student</label>
                        <select name="student_id" id="student_id" class="border p-2 w-full">
                            @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <p class="text-white">No students found.</p>
                    @endif
                </div>

                <input type="hidden" name="group_id" value="{{ $group->id }}">

                <div class="flex justify-center">
                    <button type="submit"
                        class="text-white border border-white hover:bg-white hover:text-blue-600 font-bold py-2 px-8 rounded-lg focus:outline-none focus:shadow-outline">
                        Add Student to Group
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
