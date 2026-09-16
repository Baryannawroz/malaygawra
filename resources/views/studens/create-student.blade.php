<x-app-layout>
    <x-page-header title="زیادکردنی قوتابی" subtitle="خانە نیشانەکراوەکان (*) پێویستن" :back="route('students')"
        back-label="لیستی قوتابیان" />

    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data" class="mg-card">
        @csrf
        <div class="mg-card-body">
            @include('studens._form', ['student' => null])
        </div>
        <div class="mg-card-footer mg-form-actions">
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> پاشەکەوتکردن</button>
            <a href="{{ route('students') }}" class="mg-btn mg-btn-secondary">هەڵوەشاندنەوە</a>
        </div>
    </form>
</x-app-layout>
