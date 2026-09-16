@php
    $parwarda = \App\Models\Lesson::find($student->stage_id_parwarda);
    $quran = \App\Models\Lesson::find($student->stage_id_quran);
@endphp
<x-app-layout>
    <x-page-header title="پرۆفایلی قوتابی" :back="route('students')" back-label="لیستی قوتابیان">
        <a href="{{ route('student.edit', $student) }}" class="mg-btn mg-btn-primary"><i class="bi bi-pencil"></i> دەستکاری</a>
        <button type="button" class="mg-btn mg-btn-secondary" onclick="window.print()" data-no-lock><i class="bi bi-printer"></i> چاپکردن</button>
    </x-page-header>

    <div class="mg-card">
        <div class="mg-card-body">
            <div class="mg-profile-head">
                <x-photo-avatar :path="$student->photo_path" :name="$student->name" size="xl" />
                <div>
                    <h2 style="font-size:22px">{{ $student->name }}</h2>
                    <div class="mg-summary" style="margin-top:8px">
                        <span class="mg-badge mg-badge-primary">{{ $student->gender() }}</span>
                        <span class="mg-badge">{{ $student->school?->name ?? '—' }}</span>
                        <span class="mg-badge">{{ $student->school_stage }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mg-card">
        <div class="mg-card-header"><h3 class="mg-card-title">پەیوەندی</h3></div>
        <div class="mg-card-body">
            <dl class="mg-dl">
                <div><dt>مۆبایلی قوتابی</dt><dd><a class="ltr mg-link" href="tel:{{ $student->phone }}">{{ $student->phone ?: '—' }}</a></dd></div>
                <div><dt>مۆبایلی باوک</dt><dd><a class="ltr mg-link" href="tel:{{ $student->father_phone }}">{{ $student->father_phone ?: '—' }}</a></dd></div>
                <div><dt>مۆبایلی دایک</dt><dd><a class="ltr mg-link" href="tel:{{ $student->mother_phone }}">{{ $student->mother_phone ?: '—' }}</a></dd></div>
                <div><dt>گەڕەک</dt><dd>{{ $student->street?->name ?? '—' }}</dd></div>
            </dl>
        </div>
    </div>

    <div class="mg-card">
        <div class="mg-card-header"><h3 class="mg-card-title">زانیاری</h3></div>
        <div class="mg-card-body">
            <dl class="mg-dl">
                <div><dt>بەرواری لەدایکبوون</dt><dd class="ltr">{{ $student->birth_date }}</dd></div>
                <div><dt>باری خێزانی</dt><dd>{{ $student->marital() }}</dd></div>
                <div><dt>باری دارایی</dt><dd>{{ $student->financialStatus() }}</dd></div>
                <div><dt>قوتابخانە</dt><dd>{{ $student->school?->name ?? '—' }}</dd></div>
                <div><dt>ئاستی پەروەردەیی</dt><dd>{{ $parwarda?->name ?? '—' }}</dd></div>
                <div><dt>ئاستی قیرائەت</dt><dd>{{ $quran?->name ?? '—' }}</dd></div>
            </dl>
        </div>
    </div>
</x-app-layout>
