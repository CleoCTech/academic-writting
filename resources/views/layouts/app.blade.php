<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- All Plugins Css -- from boostrap to animate css -- -->
        <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" />
        <!-- Custom CSS -->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" ></script>

        @livewireStyles

    </head>
    <body class="blue-skin">
        <div id="main-wrapper">

            @livewire('inc.nav-menu')
            
                <!-- Page Content -->
                <main style="margin-top: 5rem;">
                    {{ $slot }}
                </main>

            @livewire('inc.footer')

            @stack('modals')

        </div>
        @livewireScripts
       


        <script src="{{ asset('js/app.js') }}" ></script>
        <script src="{{ asset('assets/js/jquery.min.js') }}" ></script>
        <script src="{{ asset('assets/js/popper.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/select2.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/counterup.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/materialize.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/custom.js') }}" defer></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js" ></script>
        <script>

            $(document).ready(function(){
                console.log('Ready');
            });
        </script>
        <script type="text/javascript">
          function showAuthPass (element) {
               var x = document.getElementById('auth_pass');
               if (x.type === "password") {
                   element.innerHTML= 'Hide';
                   x.type = "text";
               } else {
                   element.innerHTML= 'Show';
                   x.type = "password";
               }
           }
         function showPass (element) {
               var x = document.getElementById("password");
               if (x.type === "password") {
                   element.innerHTML= 'Hide';
                   x.type = "text";
               } else {
                   element.innerHTML= 'Show';
                   x.type = "password";
               }
           }
        function showConfirmPass(element) {
               var x = document.getElementById("confirm_password");
               if (x.type === "password") {
                   element.innerHTML= 'Hide';
                   x.type = "text";
               } else {
                   element.innerHTML= 'Show';
                   x.type = "password";
               }
           }
        </script>
        @yield('scripts')
    </body>
</html>
