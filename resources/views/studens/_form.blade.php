@php
    /** @var \App\Models\Students|null $student */
    $s = $student ?? null;
    $val = fn ($field) => old($field, $s?->{$field});
    $inv = fn ($field) => $errors->has($field) ? ' is-invalid' : '';
@endphp

<div class="mg-form-grid">
    <div class="mg-form-section">زانیاریی کەسی</div>

    <div class="mg-field">
        <label for="name" class="mg-label">ناوی قوتابی <span class="req">*</span></label>
        <input type="text" id="name" name="name" class="mg-input{{ $inv('name') }}" value="{{ $val('name') }}"
            required autofocus autocomplete="off">
        @error('name')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-field">
        <label for="birth_date" class="mg-label">بەرواری لەدایکبوون <span class="req">*</span></label>
        <input type="date" id="birth_date" name="birth_date" class="mg-input{{ $inv('birth_date') }}"
            value="{{ $val('birth_date') }}" required>
        @error('birth_date')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-field">
        <label for="gender" class="mg-label">ڕەگەز <span class="req">*</span></label>
        <select id="gender" name="gender" class="mg-select{{ $inv('gender') }}" required>
            <option value="" disabled @selected($val('gender') === null)>هەڵبژێرە</option>
            <option value="1" @selected((string) $val('gender') === '1')>نێر</option>
            <option value="0" @selected((string) $val('gender') === '0')>مێ</option>
        </select>
        @error('gender')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-field">
        <label for="marital_status" class="mg-label">باری خێزانی <span class="req">*</span></label>
        <select id="marital_status" name="marital_status" class="mg-select{{ $inv('marital_status') }}" required>
            <option value="" disabled @selected($val('marital_status') === null)>هەڵبژێرە</option>
            <option value="0" @selected((string) $val('marital_status') === '0')>سەڵت</option>
            <option value="1" @selected((string) $val('marital_status') === '1')>خێزاندار</option>
        </select>
        @error('marital_status')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-field">
        <label for="financial_status" class="mg-label">باری دارایی <span class="req">*</span></label>
        <select id="financial_status" name="financial_status" class="mg-select{{ $inv('financial_status') }}" required>
            <option value="" disabled @selected($val('financial_status') === null)>هەڵبژێرە</option>
            <option value="1" @selected((string) $val('financial_status') === '1')>خراپ</option>
            <option value="3" @selected((string) $val('financial_status') === '3')>مامناوەند</option>
            <option value="5" @selected((string) $val('financial_status') === '5')>باش</option>
        </select>
        @error('financial_status')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-field">
        <label for="street_id" class="mg-label">گەڕەک <span class="req">*</span></label>
        <select id="street_id" name="street_id" class="mg-select{{ $inv('street_id') }}" required>
            <option value="" disabled @selected(! $val('street_id'))>هەڵبژێرە</option>
            @foreach ($streets as $street)
            <option value="{{ $street->id }}" @selected((string) $val('street_id') === (string) $street->id)>{{ $street->name }}</option>
            @endforeach
        </select>
        @error('street_id')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-form-section">پەیوەندی</div>

    <div class="mg-field">
        <label for="phone" class="mg-label">ژمارەی مۆبایلی قوتابی <span class="req">*</span></label>
        <input type="tel" id="phone" name="phone" class="mg-input{{ $inv('phone') }}" value="{{ $val('phone') }}"
            inputmode="tel" placeholder="07XX XXX XXXX" maxlength="15" required>
        @error('phone')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-field">
        <label for="father_phone" class="mg-label">ژمارەی مۆبایلی باوک <span class="req">*</span></label>
        <input type="tel" id="father_phone" name="father_phone" class="mg-input{{ $inv('father_phone') }}"
            value="{{ $val('father_phone') }}" inputmode="tel" placeholder="07XX XXX XXXX" maxlength="15" required>
        @error('father_phone')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-field">
        <label for="mother_phone" class="mg-label">ژمارەی مۆبایلی دایک <span class="req">*</span></label>
        <input type="tel" id="mother_phone" name="mother_phone" class="mg-input{{ $inv('mother_phone') }}"
            value="{{ $val('mother_phone') }}" inputmode="tel" placeholder="07XX XXX XXXX" maxlength="15" required>
        @error('mother_phone')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-form-section">خوێندن</div>

    <div class="mg-field">
        <label for="school_id" class="mg-label">قوتابخانە <span class="req">*</span></label>
        <select id="school_id" name="school_id" class="mg-select{{ $inv('school_id') }}" required>
            <option value="" disabled @selected(! $val('school_id'))>هەڵبژێرە</option>
            @foreach ($schools as $school)
            <option value="{{ $school->id }}" @selected((string) $val('school_id') === (string) $school->id)>{{ $school->name }}</option>
            @endforeach
        </select>
        @error('school_id')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-field">
        <label for="school_stage" class="mg-label">قۆناغی خوێندن <span class="req">*</span></label>
        <input type="text" id="school_stage" name="school_stage" class="mg-input{{ $inv('school_stage') }}"
            value="{{ $val('school_stage') }}" placeholder="بۆ نموونە: پۆلی پێنجەم" required>
        @error('school_stage')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-field">
        <label for="stage_id_parwarda" class="mg-label">ئاستی پەروەردەیی <span class="req">*</span></label>
        <select id="stage_id_parwarda" name="stage_id_parwarda" class="mg-select{{ $inv('stage_id_parwarda') }}" required>
            <option value="" disabled @selected(! $val('stage_id_parwarda'))>هەڵبژێرە</option>
            @foreach ($lessons as $lesson)
            <option value="{{ $lesson->id }}" @selected((string) $val('stage_id_parwarda') === (string) $lesson->id)>{{ $lesson->name }}</option>
            @endforeach
        </select>
        @error('stage_id_parwarda')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-field">
        <label for="stage_id_quran" class="mg-label">ئاستی قیرائەت <span class="req">*</span></label>
        <select id="stage_id_quran" name="stage_id_quran" class="mg-select{{ $inv('stage_id_quran') }}" required>
            <option value="" disabled @selected(! $val('stage_id_quran'))>هەڵبژێرە</option>
            @foreach ($lessons as $lesson)
            <option value="{{ $lesson->id }}" @selected((string) $val('stage_id_quran') === (string) $lesson->id)>{{ $lesson->name }}</option>
            @endforeach
        </select>
        @error('stage_id_quran')<p class="mg-error">{{ $message }}</p>@enderror
    </div>

    <div class="mg-form-section">وێنە</div>

    <div class="mg-field mg-col-span-2" x-data="{ preview: null }">
        <label for="photo_path" class="mg-label">وێنەی قوتابی @if (! $s)<span class="req">*</span>@endif</label>
        <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap">
            <div class="mg-avatar mg-avatar-xl" style="width:88px;height:88px;font-size:28px">
                <template x-if="preview"><img :src="preview" alt=""></template>
                @if ($s?->photo_path)
                <img x-show="!preview" src="{{ url('storage/' . ltrim(preg_replace('#^(storage/|public/)+#', '', str_replace('\\', '/', $s->photo_path)), '/')) }}" alt="" onerror="this.remove()">
                @endif
                <i class="bi bi-camera" style="color:var(--mg-text-faint)"></i>
            </div>
            <div class="mg-field" style="flex:1;min-width:220px">
                <input type="file" id="photo_path" name="photo_path" accept="image/*"
                    class="mg-input{{ $inv('photo_path') }}" @if (! $s) required @endif
                    @change="const f = $event.target.files[0]; preview = f ? URL.createObjectURL(f) : null">
                <p class="mg-help">JPG یان PNG. @if ($s) ئەگەر وێنەی نوێ هەڵنەبژێریت، وێنەی ئێستا دەمێنێتەوە. @endif</p>
                @error('photo_path')<p class="mg-error">{{ $message }}</p>@enderror
            </div>
        </div>
    </div>
</div>
