<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('backend/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('backend/img/favicon.png') }}">
    <!-- CSRF Token -->
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('backend/css/material-dashboard.css') }}" rel="stylesheet" />
    @stack('css')
</head>
<body>
    <div id="app">
        <div class="wrapper ">
            @if(Request::is('admin*'))
                @include('layouts.partial.sidebar')
            @endif
            <div class="main-panel">
                <!-- Navbar -->
            @if(Request::is('admin*'))
                @include('layouts.partial.topbar')
            @endif
                @yield('content')
            @if(Request::is('admin*'))
                @include('layouts.partial.footer')
            @endif
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

    @stack('js')
</body>
</html>
