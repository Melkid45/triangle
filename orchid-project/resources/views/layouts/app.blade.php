<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="{{ asset('favicon.png')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
    $currentSeo = $seoData ?? $seo ?? null;
    @endphp
    <meta name="description" content="{{ $currentSeo->meta_description ?? 'description default' }}">
    <meta name="keywords" content="{{ $currentSeo->meta_keywords ?? 'keywords default' }}">
    <meta name="author" content="TriangleVision - Digital content Agency!">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="@yield('title', 'TriangleVision - Digital content Agency!')">
    <meta property="og:description" content="{{ $currentSeo->og_description ?? $currentSeo->meta_description ?? 'Og description' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://example.com/">
    <meta property="og:image" content="{{ $currentSeo->og_image_url ?? asset('/images/default-preview.jpg') }}">
    <meta property="og:site_name" content="TriangleVision - Digital content Agency!">
    <meta property="og:locale" content="ru_RU">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'TriangleVision - Digital content Agency!')">
    <meta name="twitter:description" content="{{ $currentSeo->og_description ?? $currentSeo->meta_description ?? 'Og description' }}">
    <meta name="twitter:image" content="{{ $currentSeo->og_image_url ?? asset('/images/default-preview.jpg') }}">
    <meta name="twitter:site" content="@yourusername">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css','resources/css/bootstrap.min.css','resources/css/swiper-bundle.css','resources/css/nice-select.css','resources/css/magnific-popup.css','resources/css/font-awesome-pro.css','resources/css/spacing.css','resources/css/main.css'])
    @endif
    <title>@yield('title', 'TriangleVision - Digital content Agency!')</title>
</head>

<body class="tp-magic-cursor">
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <div id="magic-cursor" class="cursor-black-bg">
        <div id="ball"></div>
    </div>
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg
                width="12"
                height="7"
                viewBox="0 0 12 7"
                fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11 6L6 1L1 6"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <div class="tp-offcanvas-2-area p-relative">
        <div class="offcanvas-bg"></div>
        <div class="tp-offcanvas-2-wrapper offcanvas-menu">
            <div class="tp-offcanvas-2-left">
                <div
                    class="tp-header-logo d-flex justify-content-between align-items-center mb-50">
                    <span class="hamburger-close-btn">
                        <svg
                            width="37"
                            height="38"
                            viewBox="0 0 37 38"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.19141 9.80762L27.5762 28.1924"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M9.19141 28.1924L27.5762 9.80761"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <div class="tp-offcanvas-menu counter-row">
                    <nav></nav>
                </div>
                <span class="hamburger-close-btn hamburger-mobile-close-btn d-md-none">CLOSE</span>
            </div>
        </div>
    </div>
    @include('partials.header')
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                @yield('content')
            </main>
            @include('partials.footer')
        </div>
    </div>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite([
    'resources/js/app.js',
    'resources/js/vendor/jquery.js',
    'resources/js/bootstrap.min.js',
    'resources/js/split-type.js',
    'resources/js/magnific-popup.js',
    'resources/js/nice-select.js',
    'resources/js/purecounter.js',
    'resources/js/ajax-form.js',
    'resources/js/slider-init.js',
    'resources/js/main.js',
    'resources/js/tp-cursor.js'
    ])
    @endif
</body>

</html>