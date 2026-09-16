@php $st = $stage ?? null; @endphp
<div class="mg-form-grid">
    <div class="mg-field">
        <label for="name" class="mg-label">ناوی قۆناغ <span class="req">*</span></label>
        <input type="text" id="name" name="name" class="mg-input{{ $errors->has('name') ? ' is-invalid' : '' }}"
            value="{{ old('name', $st?->name) }}" required autofocus autocomplete="off">
        @error('name')<p class="mg-error">{{ $message }}</p>@enderror
    </div>
    <div class="mg-field">
        <label for="lesson_id" class="mg-label">ئاستی وانە <span class="req">*</span></label>
        <select id="lesson_id" name="lesson_id" class="mg-select{{ $errors->has('lesson_id') ? ' is-invalid' : '' }}" required>
            <option value="" disabled @selected(! old('lesson_id', $st?->lesson_id))>هەڵبژێرە</option>
            @foreach ($lessons as $lesson)
            <option value="{{ $lesson->id }}" @selected((string) old('lesson_id', $st?->lesson_id) === (string) $lesson->id)>{{ $lesson->name }}</option>
            @endforeach
        </select>
        @error('lesson_id')<p class="mg-error">{{ $message }}</p>@enderror
    </div>
</div>
