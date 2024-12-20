<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ custom_asset('build/assets/css/select2.css') }}" rel="stylesheet">
    <link href="{{ custom_asset('build/assets/css/tailwind.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script type="module" src="{{ custom_asset('build/assets/app-Bg1aHGgo.js') }}"></script>
    <link rel="stylesheet" href="{{ custom_asset('build/assets/app-HxD4TBxZ.css') }}">
    <link rel="modulepreload" href="{{ custom_asset('build/assets/app-Bg1aHGgo.js') }}">
    <link rel="preload" as="style" href="{{ custom_asset('build/assets/app-HxD4TBxZ.css') }}">
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

    </div>
    <script src="{{ custom_asset('build/assets/js/jquery.js') }}"></script>
    <script src="{{ custom_asset('build/assets/js/select2.js') }}"></script>
    <script src="{{ custom_asset('build/assets/js/search.js') }}"></script>
</body>

</html>