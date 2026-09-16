<x-app-layout>
    <x-page-header title="دەستکاریکردنی ئاستی وانە" :subtitle="$lesson->name" :back="route('lessons')" back-label="ئاستی وانەکان" />

    <form action="{{ route('lesson.update', $lesson->id) }}" method="POST" class="mg-card" style="max-width:560px">
        @csrf
        <div class="mg-card-body">
            <div class="mg-field">
                <label for="name" class="mg-label">ناو <span class="req">*</span></label>
                <input type="text" id="name" name="name" class="mg-input{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    value="{{ old('name', $lesson->name) }}" required autofocus autocomplete="off">
                @error('name')<p class="mg-error">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="mg-card-footer mg-form-actions">
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> پاشەکەوتکردنی گۆڕانکاری</button>
            <a href="{{ route('lessons') }}" class="mg-btn mg-btn-secondary">هەڵوەشاندنەوە</a>
        </div>
    </form>
</x-app-layout>
