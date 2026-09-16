<!DOCTYPE html>
<html lang="ckb" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' · ' : '' }}ڕێکخراوی مەلای گەورە</title>
    <link rel="icon" href="{{ asset('images/malaygawra.png') }}">

    <!-- Fonts & icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="{{ asset('build/assets/css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/css/tailwind.css') }}" rel="stylesheet">
    <script type="module" src="{{ asset('build/assets/app-Bg1aHGgo.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app-HxD4TBxZ.css') }}">

    <!-- Malaygawra design system (must stay last) -->
    <link rel="stylesheet" href="{{ asset('css/mg-ui.css') }}?v=1">
</head>

<body class="mg">
    <div class="mg-shell">
        @include('layouts.navigation')

        <main class="mg-container">
            @include('partials.flash')

            @isset($header)
            <div class="mg-page-header">
                <div>{{ $header }}</div>
            </div>
            @endisset

            {{ $slot }}
        </main>
    </div>

    <script src="{{ asset('build/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('build/assets/js/select2.js') }}"></script>
    <script src="{{ asset('build/assets/js/search.js') }}"></script>
    <script>
        // Confirm before destructive actions: add data-confirm="..." to any link, button or form.
        document.addEventListener('click', function (e) {
            const el = e.target.closest('a[data-confirm], button[data-confirm]');
            if (el && !confirm(el.dataset.confirm)) { e.preventDefault(); e.stopImmediatePropagation(); }
        }, true);
        document.addEventListener('submit', function (e) {
            const form = e.target;
            if (form.matches('form[data-confirm]') && !confirm(form.dataset.confirm)) { e.preventDefault(); return; }
            // Prevent double submits
            const btn = form.querySelector('button[type="submit"]:not([data-no-lock])');
            if (btn && !e.defaultPrevented) { setTimeout(() => btn.setAttribute('disabled', 'disabled'), 0); }
        });
    </script>
    @stack('scripts')
</body>

</html>
