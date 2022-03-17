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

        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{ asset('dash-assets/plugins/leaflet/leaflet.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Page Vendor Stylesheets-->
        <link rel="stylesheet" href="{{ asset('modern-dash/dist/css/app.css') }}" />
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireStyles
    </head>

    <body class="main bg-primary" style="background-color: rgb(0, 163, 255);">
        @livewire('dashboard.components.overlay.invoice-notification', ['user_id' => '', 'user_type' => ''])
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            @livewire('dashboard.inc.side-menu')
            <!-- END: Side Menu -->
            <div class="content">
                {{ $slot }}
            </div>

        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        {{-- <div  class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
            <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
            <div class="dark-mode-switcher__toggle border"></div>
        </div> --}}
        <!-- END: Dark Mode Switcher-->

        @stack('modals')
        <!--begin::Javascript-->

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
        </script>
        <x-livewire-alert::scripts />

        <script src="{{ asset('js/app.js') }}"></script>
        <!--begin::Global Javascript Bundle(used by all pages)-->

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ asset('modern-dash/dist/js/app.js') }}"></script>
        {{-- <script src="{{ asset('modern-dash/dist/js/ckeditor-inline.js') }}"></script> --}}
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script> --}}
        <!--end::Page Custom Javascript-->
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                // console.log('dom load22');
                //do work
                Echo.channel(`message-sent`)
                .listen('.message-sent-event', (e) => {
                    window.livewire.emit('messageAdded');
                });

                Echo.channel(`invoice-sent`)
                .listen('.invoice-sent-event', (e) => {
                    window.livewire.emit('invoice-sent');
                    // console.log(e.message);
                });
                Echo.channel(`invoice-rejected`)
                .listen('.invoice-rejected-event', (e) => {
                    window.livewire.emit('invoice-rejected');
                    // console.log(e.message);
                });
                Echo.channel(`invoice-accepted`)
                .listen('.invoice-accepted-event', (e) => {
                    window.livewire.emit('invoice-accepted');
                });
                Echo.channel(`order-submitted`)
                .listen('.order-submitted-event', (e) => {
                    window.livewire.emit('order-submitted', +e.order_no);
                    console.log(e.order_no);
                });
                // Echo.channel(`notificationbar-refreshed`)
                // .listen('.notificationbar-refreshed-event', (e) => {
                //     window.livewire.emit('notificationbar-refreshed');
                // });
                Echo.channel(`OrderCreated`)
                .listen('.order-created-event', (e) => {
                    window.livewire.emit('OrderCreated');
                    // console.log(e.message);
                });

            });

        </script>

        @stack('scripts')
    </body>

</html>
