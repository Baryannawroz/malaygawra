<x-app-layout>
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">مامۆستا</h2>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('report.teacher') }}" class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">
        <input type="date" name="from" value="{{ request('from') }}" placeholder="لە" class="input">
        <input type="date" name="to" value="{{ request('to') }}" placeholder="بۆ" class="input">

        <select name="isMale" class="input">
            <option value="">ڕەگەز</option>
            <option value="1" {{ request('isMale')=='1' ? 'selected' : '' }}>نێر</option>
            <option value="0" {{ request('isMale')=='0' ? 'selected' : '' }}>مێ</option>
        </select>



        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded">
            فلتەر
        </button>
    </form>

    <!-- Students Table -->
   <div class="overflow-x-auto">
    <table class="w-full border-collapse bg-white shadow-md rounded-lg table-fixed">
        <thead class="bg-blue-500 text-white">
            <tr>
                <th class="p-3 w-12">#</th>
                <th class="p-3 w-1/4">ناو</th>
                <th class="p-3 w-1/6">ڕەگەز</th>
                <th class="p-3 w-1/4">بەرواری لەدایکبوون</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $index => $teacher)
            <tr class="border-b hover:bg-gray-100 text-center">
                <td class="p-3 w-12 ">{{ $loop->iteration }}</td>
                <td class="p-3 w-1/4 truncate">{{ $teacher->name }}</td>
                <td class="p-3 w-1/6">{{ $teacher->gender ? 'نێر' : 'مێ' }}</td>
                <td class="p-3 w-1/4">{{ $teacher->birth_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <!-- Pagination -->
    <div class="mt-6">
        {{ $teachers->appends(request()->query())->links() }}
    </div>
</div>

<!-- Tailwind Custom Styles -->
<style>
    .input {
        @apply border p-2 rounded-md w-full focus: outline-none focus:ring-2 focus:ring-blue-500;
    }
</style>
</x-app-layout>
