<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- App CSS & JS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Gritter -->
        <link href="{{asset('asset/backend/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">

        <!--Dashboard-->
        <link href="{{asset('asset/backend/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset/backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('asset/backend/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('asset/backend/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset/backend/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
        <link href="{{asset('asset/backend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
        <link href="{{asset('asset/backend/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
        <link href="{{asset('asset/backend/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset/backend/css/style.css')}}" rel="stylesheet">

    </head>
    <body>
        
        <div id="app">
        @yield('admin_dashboard_content')
        </div>

        <!-- Mainly scripts -->
        <script src="{{asset('asset/backend/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('asset/backend/js/popper.min.js')}}"></script>
        <script src="{{asset('asset/backend/js/bootstrap.js')}}"></script>
        <script src="{{asset('asset/backend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('asset/backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('asset/backend/js/plugins/chosen/chosen.jquery.js')}}"></script>

        <!-- Flot -->
        <script src="{{asset('asset/backend/js/plugins/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('asset/backend/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('asset/backend/js/plugins/flot/jquery.flot.spline.js')}}"></script>
        <script src="{{asset('asset/backend/js/plugins/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('asset/backend/js/plugins/flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('asset/backend/js/plugins/flot/jquery.flot.symbol.js')}}"></script>
        <script src="{{asset('asset/backend/js/plugins/flot/curvedLines.js')}}"></script>

        <!-- Data table -->
        <script src="{{asset('asset/backend/js/plugins/dataTables/datatables.min.js')}}"></script>
        <script src="{{asset('asset/backend/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Peity -->
        <script src="{{asset('asset/backend/js/plugins/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('asset/backend/js/demo/peity-demo.js')}}"></script>

        <!-- Custom and plugin javascript -->
        <script src="{{asset('asset/backend/js/inspinia.js')}}"></script>
        <script src="{{asset('asset/backend/js/plugins/pace/pace.min.js')}}"></script>

        <!-- jQuery UI -->
        <script src="{{asset('asset/backend/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

        <!-- GITTER -->
        <script src="{{asset('asset/backend/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

        <!-- Jvectormap -->
        <script src="{{asset('asset/backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script src="{{asset('asset/backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

        <!-- Sparkline -->
        <script src="{{asset('asset/backend/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- Sparkline demo data  -->
        <script src="{{asset('asset/backend/js/demo/sparkline-demo.js')}}"></script>

        <!-- ChartJS-->
        <script src="{{asset('asset/backend/js/plugins/chartJs/Chart.min.js')}}"></script>
        
        <!-- iCheck -->
        <script src="{{asset('asset/backend/js/plugins/iCheck/icheck.min.js')}}"></script>
         
        <!-- sweetalert -->
        <script src="{{asset('asset/backend/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
        
        <!-- toastr -->
        <script src="{{asset('asset/backend/js/plugins/toastr/toastr.min.js')}}"></script>

        <!-- custom -->
        <script src="{{asset('asset/backend/js/custom.js')}}"></script>

    </body>
</html>
