<x-app-layout>
    <x-page-header title="دەستکاریکردنی قوتابی" :subtitle="$student->name" :back="route('student.show', $student)"
        back-label="پرۆفایلی قوتابی" />

    <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data"
        class="mg-card">
        @csrf
        <div class="mg-card-body">
            @include('studens._form', ['student' => $student])
        </div>
        <div class="mg-card-footer mg-form-actions">
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> پاشەکەوتکردنی گۆڕانکاری</button>
            <a href="{{ route('students') }}" class="mg-btn mg-btn-secondary">هەڵوەشاندنەوە</a>
        </div>
    </form>
</x-app-layout>
