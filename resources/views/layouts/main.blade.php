<!DOCTYPE html >
<html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>DASHBOARD | TirtaKencana</title>
            @include('layouts._asset_header')
            <meta name="theme-color" content="#712cf9">
            <meta name="csrf-token" content="{{ csrf_token() }}">
        </head>
        <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">

            @include('layouts.header')

            @yield('content')

            @include('layouts.footer')

            {{-- Load library JavaScript --}}
            @include('layouts._asset_footer')

            {{-- Load script dari masing-masing halaman --}}
            @stack('scripts')

        </body>
</html>
            {{-- @include('layouts._asset_footer') --}}

        {{-- //@include('sweetalert::alert') --}}


