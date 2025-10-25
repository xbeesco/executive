<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $seo['meta_title'] ?? $page->title ?? config('app.name') }}</title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{ $seo['meta_description'] ?? '' }}">
    <meta name="keywords" content="{{ $seo['meta_keywords'] ?? '' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ $settings['general']['site_favicon'] ?? '/images/favicon.png' }}">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $seo['meta_title'] ?? $page->title ?? config('app.name') }}">
    <meta property="og:description" content="{{ $seo['meta_description'] ?? '' }}">
    <meta property="og:image" content="{{ $seo['og_image'] ?? '' }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pbminfotech-base-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shortcode.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    @stack('styles')
</head>
<body>
    <!-- Page Wrapper -->
    <div class="page-wrapper" id="page">

        <!-- Header -->
        @include('components.headers.header-' . ($pageSettings['header_style'] ?? 3))

        <!-- Page Content -->
        <div class="page-content">
            @yield('content')
        </div>
        <!-- Page Content End -->

        <!-- Footer -->
        @include('components.footers.footer-' . ($pageSettings['footer_style'] ?? 2))

    </div>
    <!-- Page Wrapper End -->

    <!-- Search Box -->
    <div class="pbmit-search-overlay">
        <div class="pbmit-icon-close">
            <svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="28.163" height="28.163" viewBox="0 0 26.163 26.163">
                <rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
                <rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
            </svg>
        </div>
        <div class="pbmit-search-outer">
            <form class="pbmit-site-searchform" action="{{ route('search') }}" method="GET">
                <input type="search" class="form-control field searchform-s" name="s" placeholder="Search …">
                <button type="submit"></button>
            </form>
        </div>
    </div>

    <!-- Scroll To Top -->
    <div class="pbmit-progress-wrap">
        <svg class="pbmit-progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        </svg>
    </div>

    <!-- JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/numinate.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/circle-progress.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/gsap.js') }}"></script>
    <script src="{{ asset('js/ScrollTrigger.js') }}"></script>
    <script src="{{ asset('js/SplitText.js') }}"></script>
    <script src="{{ asset('js/magnetic.js') }}"></script>
    <script src="{{ asset('js/morphext.min.js') }}"></script>
    <script src="{{ asset('js/gsap-animation.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    @stack('scripts')
</body>
</html>
