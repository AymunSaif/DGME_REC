<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/theme/img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="{{asset('img/theme/img/favicon.html')}}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Recruitment Dashboard</title>
            <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/theme/font-awesome.min.css')}}" />
        <!-- CSS Files -->
        <link href="{{asset('css/AdminLTE.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/sortcss/addons/datatables.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/theme/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/theme/light-bootstrap-dashboard790f.css?v=2.0.1')}}" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="{{asset('css/theme/demo.css')}}" rel="stylesheet" />
        <!-- Google Tag Manager -->
        {{-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NKDMSK6');</script> --}}
        <!-- End Google Tag Manager -->
        </head>

        <body class="sidebar-mini">
            <!-- Google Tag Manager (noscript) -->
            {{-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> --}}
          <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper">
        @include('inc.sidebar')
        <div class="main-panel">
            @include('inc.uppernav')
            @include('inc.msgs')
            @yield('content')
            @include('inc.fixedplugin')
        </div>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function(){
        $(".alert").delay(500).slideUp(2000);
    });
</script>
@yield('scriptTags')
<!--  Google Maps Plugin    -->
{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script> --}}
<script src="{{asset('js/theme/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/theme/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/theme/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: https://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('js/theme/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Chartist Plugin  -->
<script src="{{asset('js/theme/js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('js/theme/js/plugins/bootstrap-notify.js')}}"></script>
<!--  Share Plugin -->
<script src="{{asset('js/theme/js/plugins/jquery.sharrre.js')}}"></script>
<!--  jVector Map  -->
<script src="{{asset('js/theme/js/plugins/jquery-jvectormap.js')}}" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('js/theme/js/plugins/moment.min.js')}}"></script>
<!--  DatetimePicker   -->
<script src="{{asset('js/theme/js/plugins/bootstrap-datetimepicker.js')}}"></script>
<!--  Sweet Alert  -->
<script src="{{asset('js/theme/js/plugins/sweetalert2.min.js')}}" type="text/javascript"></script>
<!--  Tags Input  -->
<script src="{{asset('js/theme/js/plugins/bootstrap-tagsinput.js')}}" type="text/javascript"></script>
<!--  Sliders  -->
<script src="{{asset('js/theme/js/plugins/nouislider.js')}}" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="{{asset('js/theme/js/plugins/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="{{asset('js/theme/js/plugins/jquery.validate.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('js/theme/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--  Bootstrap Table Plugin -->
<script src="{{asset('js/theme/js/plugins/bootstrap-table.js')}}"></script>
<!--  DataTable Plugin -->
<script src="{{asset('js/theme/js/plugins/jquery.dataTables.min.js')}}"></script>
<!--  Full Calendar   -->
<script src="{{asset('js/theme/js/plugins/fullcalendar.min.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/theme/js/light-bootstrap-dashboard790f.js?v=2.0.1')}}" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('js/theme/js/demo.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script src="{{asset('js/adminlte.min.js')}}"></script>
@yield('scripttags')
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        // demo.showNotification();

        // demo.initVectorMap();

    });
</script>

</html>
