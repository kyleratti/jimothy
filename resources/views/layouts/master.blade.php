<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token">

        <title>@yield('title') - {{ config('app.name') }}</title>

        <link rel="stylesheet" type="text/css" href="{{ url('css/foundation.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    </head>
    <body>
        <header class="header">
            <div class="logo"></div>
            <h1 class="headline">{{ config('app.name') }} <small>made possible by bananalord</small></h1>

            @include('layouts.navigation')
        </header>

        <div class="main">
            @yield('main')
        </div>

        <footer class="footer">
            Served by {{ config('app.codename') }}. Good boy.
        </footer>
    </body>
</html>
