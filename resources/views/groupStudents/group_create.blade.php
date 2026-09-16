<x-app-layout>
    <x-page-header title="زیادکردنی قوتابی بۆ دەرس" :subtitle="$group->name" :back="route('groupStudent.show', $group->id)"
        back-label="گەڕانەوە بۆ دەرس" />

    <form action="{{ route('groupStudent.store') }}" method="POST" class="mg-card" style="max-width:640px">
        @csrf
        <input type="hidden" name="group_id" value="{{ $group->id }}">
        <div class="mg-card-body">
            @if (isset($students) && $students->count())
            <div class="mg-field">
                <label for="student_id" class="mg-label">قوتابی <span class="req">*</span></label>
                <select name="student_id" id="student_id" class="studentSearch" required></select>
                <p class="mg-help">ناوی قوتابی بنووسە بۆ گەڕان.</p>
                @error('student_id')<p class="mg-error">{{ $message }}</p>@enderror
            </div>
            @else
            <x-mg-empty icon="bi-people" title="هیچ قوتابییەک تۆمار نەکراوە">
                <a href="{{ route('student.create') }}" class="mg-link">سەرەتا قوتابی زیاد بکە</a>
            </x-mg-empty>
            @endif
        </div>
        @if (isset($students) && $students->count())
        <div class="mg-card-footer mg-form-actions">
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> زیادکردن</button>
            <a href="{{ route('groupStudent.show', $group->id) }}" class="mg-btn mg-btn-secondary">هەڵوەشاندنەوە</a>
        </div>
        @endif
    </form>
</x-app-layout>
