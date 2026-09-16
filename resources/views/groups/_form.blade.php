@php $g = $group ?? null; @endphp
<div class="mg-form-grid">
    <div class="mg-field">
        <label for="name" class="mg-label">ناوی دەرس <span class="req">*</span></label>
        <input type="text" id="name" name="name" class="mg-input{{ $errors->has('name') ? ' is-invalid' : '' }}"
            value="{{ old('name', $g?->name) }}" placeholder="بۆ نموونە: قیرائەتی ئاستی یەک" required autofocus>
        @error('name')<p class="mg-error">{{ $message }}</p>@enderror
    </div>
    <div class="mg-field">
        <label for="teacher_id" class="mg-label">مامۆستای سەرپەرشتیار <span class="req">*</span></label>
        <select id="teacher_id" name="teacher_id" class="mg-select{{ $errors->has('teacher_id') ? ' is-invalid' : '' }}" required>
            <option value="" disabled @selected(! old('teacher_id', $g?->teacher_id))>هەڵبژێرە</option>
            @foreach ($teachers as $teacher)
            <option value="{{ $teacher->id }}" @selected((string) old('teacher_id', $g?->teacher_id) === (string) $teacher->id)>{{ $teacher->name }}</option>
            @endforeach
        </select>
        @error('teacher_id')<p class="mg-error">{{ $message }}</p>@enderror
    </div>
</div>
