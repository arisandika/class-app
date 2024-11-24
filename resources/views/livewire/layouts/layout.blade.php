<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Created by Ari Sandika">
    <meta name="keywords" content="Kelas 05TPLK001">
    <meta name="description" content="https://www.linkedin.com/in/ari-sandika/">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | 05TPLK001</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('front/assets/images/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/css/alertify.min.css') }}" rel="stylesheet" type="text/css">

    @stack('style')

    @livewireStyles

</head>

<body>
    <div id="grid-container"></div>

    <div id="layout-wrapper">
        @include('livewire.layouts.inc.front.navbar')
        <main>
            @yield('content')
            <div class="space-6"></div>
        </main>
    </div>
    @include('livewire.layouts.inc.front.footer')

    <!-- App js -->
    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/js/alertify.min.js') }}"></script>
    @stack('scripts')

    @livewireScripts
</body>

</html>