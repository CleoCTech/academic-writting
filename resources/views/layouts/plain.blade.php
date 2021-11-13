<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->

    <head>
        <meta charset="utf-8" />
        <title>Writer Craft | Essay Writing</title>
        <meta name="description" content="#1 Essay writing site" />
        <meta name="keywords" content="Essay, writing, blog, academic writing" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="img/favicon.ico" />

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{ asset('dash-assets/plugins/leaflet/leaflet.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Page Vendor Stylesheets-->
        <link href="{{ asset('s-assets/style.css') }}" rel="stylesheet" type="text/css" />

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <!--end::Global Stylesheets Bundle-->
        <script src="https://kit.fontawesome.com/e1b0575b51.js" crossorigin="anonymous"></script>

        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireStyles
    </head>

    <body class="bg-white flex flex-col">

            {{ $slot }}
        @stack('modals')
        <!--begin::Javascript-->

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
        </script>
        <x-livewire-alert::scripts />

        <script src="{{ asset('js/app.js') }}"></script>
        <!--begin::Global Javascript Bundle(used by all pages)-->

        <script src="{{ asset('assets/js/jquery.min.js') }}" ></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!--end::Page Custom Javascript-->

        @stack('scripts')
    </body>

</html>
