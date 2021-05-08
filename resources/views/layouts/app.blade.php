<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- All Plugins Css -- from boostrap to animate css -- -->
        <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" />
        <!-- Custom CSS -->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="blue-skin">
        <div id="main-wrapper">

            @livewire('inc.nav-menu')
            @livewire('inc.hero-banner')
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>

            @livewire('inc.footer')

            @stack('modals')

        </div>
        @livewireScripts
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/materialize.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
    </body>
</html>
