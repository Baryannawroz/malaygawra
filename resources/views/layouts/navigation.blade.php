@php
    $isAdmin = (bool) (auth()->user()->isAdmin ?? false);
    $on = fn (array $patterns) => request()->routeIs(...$patterns);
    $teacherRoutes = ['teachers', 'teacher.edit', 'teacher.show', 'teacher.create', 'teacherSchedule.create', 'teacher.Schedules'];
    $adminRoutes = ['administrators', 'administrator.*', 'schools', 'school.*', 'streets', 'street.*', 'lessons', 'lesson.*', 'stages', 'stage.*', 'register'];
@endphp

<nav class="mg-navbar" x-data="{ open: false }" @keydown.escape.window="open = false" aria-label="لیستی سەرەکی">
    <div class="mg-navbar-inner">
        <a href="{{ route('dashboard') }}" class="mg-navbar-brand">
            <img src="{{ asset('images/malaygawra.png') }}" alt="لۆگۆی ڕێکخراوی مەلای گەورە">
            <span class="mg-brand-title">ڕێکخراوی مەلای گەورە</span>
        </a>

        {{-- Desktop links --}}
        <div class="mg-navbar-links">
            <a href="{{ route('dashboard') }}" class="mg-top-link {{ $on(['dashboard']) ? 'is-active' : '' }}">
                <i class="bi bi-grid-1x2"></i> داشبۆرد
            </a>
            <a href="{{ route('students') }}" class="mg-top-link {{ $on(['students', 'student.*']) ? 'is-active' : '' }}">
                <i class="bi bi-people"></i> قوتابیان
            </a>
            <a href="{{ route('groups') }}" class="mg-top-link {{ $on(['groups', 'group.*', 'groupStudent.*', 'absent.*', 'absents', 'absence.records']) ? 'is-active' : '' }}">
                <i class="bi bi-journal-bookmark"></i> دەرسەکان
            </a>

            <div class="mg-dd" x-data="{ dd: false }" @click.outside="dd = false">
                <button type="button" class="mg-top-link {{ $on($teacherRoutes) ? 'is-active' : '' }}" @click="dd = !dd"
                    :aria-expanded="dd" data-no-lock>
                    <i class="bi bi-person-badge"></i> مامۆستایان <i class="bi bi-chevron-down mg-caret" :class="{ 'rot': dd }"></i>
                </button>
                <div class="mg-dd-menu" x-show="dd" x-cloak x-transition.opacity.duration.150ms>
                    <a href="{{ route('teachers') }}" class="{{ $on(['teachers', 'teacher.edit', 'teacher.show', 'teacher.create']) ? 'is-active' : '' }}"><i class="bi bi-person-lines-fill"></i> لیستی مامۆستایان</a>
                    <a href="{{ route('teacherSchedule.create') }}" class="{{ $on(['teacherSchedule.create']) ? 'is-active' : '' }}"><i class="bi bi-calendar-check"></i> غیاباتی مامۆستایان</a>
                    <a href="{{ route('teacher.Schedules') }}" class="{{ $on(['teacher.Schedules']) ? 'is-active' : '' }}"><i class="bi bi-calendar-week"></i> خشتەی حەفتانە</a>
                </div>
            </div>

            <a href="{{ route('reports') }}" class="mg-top-link {{ $on(['reports', 'report.*']) ? 'is-active' : '' }}">
                <i class="bi bi-bar-chart-line"></i> ڕاپۆرتەکان
            </a>

            @if ($isAdmin)
            <div class="mg-dd" x-data="{ dd: false }" @click.outside="dd = false">
                <button type="button" class="mg-top-link {{ $on($adminRoutes) ? 'is-active' : '' }}" @click="dd = !dd"
                    :aria-expanded="dd" data-no-lock>
                    <i class="bi bi-gear"></i> کارگێڕی <i class="bi bi-chevron-down mg-caret" :class="{ 'rot': dd }"></i>
                </button>
                <div class="mg-dd-menu" x-show="dd" x-cloak x-transition.opacity.duration.150ms>
                    <a href="{{ route('administrators') }}" class="{{ $on(['administrators', 'administrator.*']) ? 'is-active' : '' }}"><i class="bi bi-briefcase"></i> کارگێڕان</a>
                    <a href="{{ route('schools') }}" class="{{ $on(['schools', 'school.*']) ? 'is-active' : '' }}"><i class="bi bi-building"></i> قوتابخانەکان</a>
                    <a href="{{ route('streets') }}" class="{{ $on(['streets', 'street.*']) ? 'is-active' : '' }}"><i class="bi bi-geo-alt"></i> گەڕەکەکان</a>
                    <a href="{{ route('lessons') }}" class="{{ $on(['lessons', 'lesson.*']) ? 'is-active' : '' }}"><i class="bi bi-layers"></i> ئاستی وانەکان</a>
                    <a href="{{ route('stages') }}" class="{{ $on(['stages', 'stage.*']) ? 'is-active' : '' }}"><i class="bi bi-diagram-3"></i> قۆناغەکان</a>
                    <div class="mg-dd-sep"></div>
                    <a href="{{ route('register') }}"><i class="bi bi-person-plus"></i> بەکارهێنەری نوێ</a>
                </div>
            </div>
            @endif
        </div>

        {{-- User menu --}}
        <div class="mg-dd mg-navbar-user" x-data="{ dd: false }" @click.outside="dd = false">
            <button type="button" class="mg-top-link" @click="dd = !dd" :aria-expanded="dd" data-no-lock>
                <span class="mg-avatar" style="width:30px;height:30px;font-size:13px">{{ mb_substr(Auth::user()->name, 0, 1) }}</span>
                <span class="mg-hide-sm">{{ Auth::user()->name }}</span>
                <i class="bi bi-chevron-down mg-caret" :class="{ 'rot': dd }"></i>
            </button>
            <div class="mg-dd-menu mg-dd-end" x-show="dd" x-cloak x-transition.opacity.duration.150ms>
                <div class="mg-dd-head">
                    <div class="mg-user-name">{{ Auth::user()->name }}</div>
                    <div class="mg-user-mail">{{ Auth::user()->email }}</div>
                </div>
                <a href="{{ route('profile.edit') }}"><i class="bi bi-person-circle"></i> پرۆفایل</a>
                <div class="mg-dd-sep"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mg-dd-danger" data-no-lock><i class="bi bi-box-arrow-left"></i> چوونەدەرەوە</button>
                </form>
            </div>
        </div>

        {{-- Mobile toggle --}}
        <button type="button" class="mg-btn mg-btn-ghost mg-btn-icon mg-navbar-toggle" @click="open = !open"
            :aria-expanded="open" aria-label="کردنەوەی لیست" data-no-lock>
            <i class="bi" :class="open ? 'bi-x-lg' : 'bi-list'" style="font-size:22px"></i>
        </button>
    </div>

    {{-- Mobile panel --}}
    <div class="mg-navbar-mobile" x-show="open" x-cloak x-transition.opacity.duration.150ms>
        <a href="{{ route('dashboard') }}" class="{{ $on(['dashboard']) ? 'is-active' : '' }}"><i class="bi bi-grid-1x2"></i> داشبۆرد</a>
        <a href="{{ route('students') }}" class="{{ $on(['students', 'student.*']) ? 'is-active' : '' }}"><i class="bi bi-people"></i> قوتابیان</a>
        <a href="{{ route('groups') }}" class="{{ $on(['groups', 'group.*', 'groupStudent.*', 'absent.*', 'absents', 'absence.records']) ? 'is-active' : '' }}"><i class="bi bi-journal-bookmark"></i> دەرسەکان</a>
        <div class="mg-nav-section">مامۆستایان</div>
        <a href="{{ route('teachers') }}" class="{{ $on(['teachers', 'teacher.edit', 'teacher.show', 'teacher.create']) ? 'is-active' : '' }}"><i class="bi bi-person-lines-fill"></i> لیستی مامۆستایان</a>
        <a href="{{ route('teacherSchedule.create') }}" class="{{ $on(['teacherSchedule.create']) ? 'is-active' : '' }}"><i class="bi bi-calendar-check"></i> غیاباتی مامۆستایان</a>
        <a href="{{ route('teacher.Schedules') }}" class="{{ $on(['teacher.Schedules']) ? 'is-active' : '' }}"><i class="bi bi-calendar-week"></i> خشتەی حەفتانە</a>
        <a href="{{ route('reports') }}" class="{{ $on(['reports', 'report.*']) ? 'is-active' : '' }}"><i class="bi bi-bar-chart-line"></i> ڕاپۆرتەکان</a>
        @if ($isAdmin)
        <div class="mg-nav-section">کارگێڕی</div>
        <a href="{{ route('administrators') }}"><i class="bi bi-briefcase"></i> کارگێڕان</a>
        <a href="{{ route('schools') }}"><i class="bi bi-building"></i> قوتابخانەکان</a>
        <a href="{{ route('streets') }}"><i class="bi bi-geo-alt"></i> گەڕەکەکان</a>
        <a href="{{ route('lessons') }}"><i class="bi bi-layers"></i> ئاستی وانەکان</a>
        <a href="{{ route('stages') }}"><i class="bi bi-diagram-3"></i> قۆناغەکان</a>
        <a href="{{ route('register') }}"><i class="bi bi-person-plus"></i> بەکارهێنەری نوێ</a>
        @endif
    </div>
</nav>
