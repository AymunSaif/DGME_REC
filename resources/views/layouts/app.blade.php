<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DGME_RECURITMENT') }}</title>


     <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="navbar-fixed-top.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body style="background-color:white;">
    <div id="app">
         @include('inc.navbar')
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

<!-- Scripts -->
<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scriptTags')

</body>
</html>
