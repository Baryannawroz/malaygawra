<x-app-layout>
    <x-page-header title="زیادکردنی قوتابخانە" :back="route('schools')" back-label="قوتابخانەکان" />

    <form action="{{ route('school.store') }}" method="POST" class="mg-card" style="max-width:560px">
        @csrf
        <div class="mg-card-body">
            <div class="mg-field">
                <label for="name" class="mg-label">ناو <span class="req">*</span></label>
                <input type="text" id="name" name="name" class="mg-input{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    value="{{ old('name') }}" placeholder="بۆ نموونە: قوتابخانەی ئاشتی" required autofocus autocomplete="off">
                @error('name')<p class="mg-error">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="mg-card-footer mg-form-actions">
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> پاشەکەوتکردن</button>
            <a href="{{ route('schools') }}" class="mg-btn mg-btn-secondary">گەڕانەوە بۆ لیست</a>
        </div>
    </form>
</x-app-layout>
