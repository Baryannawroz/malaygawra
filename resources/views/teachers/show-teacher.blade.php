<x-app-layout>
    <x-page-header title="پرۆفایلی مامۆستا" :back="route('teachers')" back-label="لیستی مامۆستایان">
        <a href="{{ route('teacher.edit', $teacher) }}" class="mg-btn mg-btn-primary"><i class="bi bi-pencil"></i> دەستکاری</a>
    </x-page-header>

    <div class="mg-card">
        <div class="mg-card-body">
            <div class="mg-profile-head">
                <x-photo-avatar :path="$teacher->photo_path" :name="$teacher->name" size="xl" />
                <div>
                    <h2 style="font-size:22px">{{ $teacher->name }}</h2>
                    <div class="mg-summary" style="margin-top:8px">
                        <span class="mg-badge mg-badge-primary">{{ $teacher->gender() }}</span>
                        <span class="mg-badge">{{ $teacher->marital() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mg-card">
        <div class="mg-card-header"><h3 class="mg-card-title">زانیاری</h3></div>
        <div class="mg-card-body">
            <dl class="mg-dl">
                <div><dt>ژمارەی مۆبایل</dt><dd><a class="ltr mg-link" href="tel:{{ $teacher->phone }}">{{ $teacher->phone ?: '—' }}</a></dd></div>
                <div><dt>گەڕەک</dt><dd>{{ $teacher->street->name ?? '—' }}</dd></div>
                <div><dt>بەرواری لەدایکبوون</dt><dd class="ltr">{{ $teacher->birth_date }}</dd></div>
                <div><dt>باری خێزانی</dt><dd>{{ $teacher->marital() }}</dd></div>
            </dl>
        </div>
    </div>
</x-app-layout>
