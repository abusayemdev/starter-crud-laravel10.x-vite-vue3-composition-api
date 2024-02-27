<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Larave') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- App CSS & JS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <link href="{{asset('asset/backend/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset/backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('asset/backend/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('asset/backend/css/style.css')}}" rel="stylesheet">

    </head>
    <body class="gray-bg">

        <div id="app">
        @yield('admin_auth_content')
        </div>
        
        <!-- Scripts -->
        <script src="{{asset('asset/backend/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('asset/backend/js/popper.min.js')}}"></script>
        <script src="{{asset('asset/backend/js/bootstrap.js')}}"></script>

    </body>
</html>
