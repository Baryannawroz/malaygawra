<x-app-layout>
    <x-page-header title="زیادکردنی مامۆستا" subtitle="خانە نیشانەکراوەکان (*) پێویستن" :back="route('teachers')"
        back-label="لیستی مامۆستایان" />

    <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data" class="mg-card">
        @csrf
        <div class="mg-card-body">
            @include('teachers._form', ['teacher' => null])
        </div>
        <div class="mg-card-footer mg-form-actions">
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> پاشەکەوتکردن</button>
            <a href="{{ route('teachers') }}" class="mg-btn mg-btn-secondary">هەڵوەشاندنەوە</a>
        </div>
    </form>
</x-app-layout>
