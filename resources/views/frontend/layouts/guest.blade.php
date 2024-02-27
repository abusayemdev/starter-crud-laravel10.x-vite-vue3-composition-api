<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--favicon-->
        <link rel="icon" href="{{asset('asset/frontend/images/favicon-32x32.png')}}" type="image/png" />
        
        <!-- Title -->
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap)}}" rel="stylesheet">

        <!--App Script Styles -->
        @vite(['resources/css/app.css','resources/js/app.js'])

        <!--plugins-->
        <link href="{{asset('asset/frontend/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
        <link href="{{asset('asset/frontend/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
        <link href="{{asset('asset/frontend/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
        <link href="{{asset('asset/frontend/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />

        <!-- loader-->
        <link href="{{asset('asset/frontend/css/pace.min.css')}}" rel="stylesheet" />
        <script src="{{asset('asset/frontend/js/pace.min.js')}}"></script>

        <!-- Bootstrap CSS -->
        <link href="{{asset('asset/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset/frontend/css/bootstrap-extended.css')}}" rel="stylesheet">
        <link href="{{asset('asset/frontend/css/app.css')}}" rel="stylesheet">
        <link href="{{asset('asset/frontend/css/icons.css')}}" rel="stylesheet">

        <!-- Theme Style CSS -->
        <link href="{{asset('asset/frontend/css/dark-theme.css')}}" rel="stylesheet"/>
        <link href="{{asset('asset/frontend/css/semi-dark.css')}}" rel="stylesheet"/>
        <link href="{{asset('asset/frontend/css/header-colors.css')}}" rel="stylesheet"/>

    </head>
    <body class="bg-login">
        
        <div id="app">
            @yield('auth_content')
        </div>

        <!--plugins-->
        <script src="{{asset('asset/frontend/js/jquery.min.js')}}"></script>
        <script src="{{asset('asset/frontend/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('asset/frontend/plugins/simplebar/js/simplebar.min.js')}}"></script>
        <script src="{{asset('asset/frontend/plugins/metismenu/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('asset/frontend/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('asset/frontend/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script src="{{asset('asset/frontend/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script src="{{asset('asset/frontend/plugins/chartjs/js/Chart.min.js')}}"></script>
        <script src="{{asset('asset/frontend/plugins/chartjs/js/Chart.extension.js')}}"></script>
        <script src="{{asset('asset/frontend/js/index.js')}}"></script>
        <script src="{{asset('asset/frontend/js/app.js')}}"></script>

        <!--Password show & hide js -->
        <script>
            $(document).ready(function () {
                $("#show_hide_password a").on('click', function (event) {
                    event.preventDefault();
                    if ($('#show_hide_password input').attr("type") == "text") {
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass("bx-hide");
                        $('#show_hide_password i').removeClass("bx-show");
                    } else if ($('#show_hide_password input').attr("type") == "password") {
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass("bx-hide");
                        $('#show_hide_password i').addClass("bx-show");
                    }
                });
            });
        </script>

    </body>
</html>
