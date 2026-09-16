<!DOCTYPE html>
<html lang="ckb" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ڕێکخراوی مەلای گەورە</title>
    <link rel="icon" href="{{ asset('images/malaygawra.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script type="module" src="{{ asset('build/assets/app-Bg1aHGgo.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app-HxD4TBxZ.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mg-ui.css') }}?v=2">
</head>

<body class="mg">
    <div class="mg-auth">
        <div class="mg-auth-card">
            <a href="/" class="mg-auth-logo">
                <img src="{{ asset('images/malaygawra.png') }}" alt="ڕێکخراوی مەلای گەورە بۆ زانست و ڕۆشنبیری"
                    style="width:140px;height:140px">
            </a>
            <div class="mg-card">
                <div class="mg-card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
