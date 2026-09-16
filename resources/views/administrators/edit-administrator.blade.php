<x-app-layout>
    <x-page-header title="دەستکاریکردنی مامۆستا" :subtitle="$teacher->name" :back="route('teacher.show', $teacher)"
        back-label="پرۆفایلی مامۆستا" />

    <form action="{{ route('teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data"
        class="mg-card">
        @csrf
        <div class="mg-card-body">
            @include('teachers._form', ['teacher' => $teacher])
        </div>
        <div class="mg-card-footer mg-form-actions">
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> پاشەکەوتکردنی گۆڕانکاری</button>
            <a href="{{ route('teachers') }}" class="mg-btn mg-btn-secondary">هەڵوەشاندنەوە</a>
        </div>
    </form>
</x-app-layout>
