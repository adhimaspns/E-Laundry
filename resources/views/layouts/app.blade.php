<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- My Css -->
        @stack('css-prepend')
        @include('includes.styles')
        @include('sweetalert::alert')

        <title>@yield('title-page')</title>

    </head>

    <body>
        <!-- Navbar -->
        @include('includes.navbar')


        <!-- Main Content -->
        <section class="main-content">
            @yield('main-content')
        </section>


        <!-- My Scripts -->
        @stack('js-prepend')
        @include('includes.scripts')
        <script src="{{ URL::asset('addon/js/myJs.js') }}"></script>

    </body>
</html>