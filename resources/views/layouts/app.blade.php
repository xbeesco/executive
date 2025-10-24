<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(isset($seo))
        <title>{{ $seo['meta_title'] ?? config('app.name') }}</title>
        <meta name="description" content="{{ $seo['meta_description'] ?? '' }}">
        <meta name="keywords" content="{{ $seo['meta_keywords'] ?? '' }}">
        @if(isset($seo['og_image']))
            <meta property="og:image" content="{{ $seo['og_image'] }}">
        @endif
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @yield('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</body>
</html>
