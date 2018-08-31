<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DGME_RECURITMENT') }}</title>

    <link rel="stylesheet" href="{{asset('css/intlTelInput.css')}}">
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">
     <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> --}}
    {{-- <link href="navbar-fixed-top.css" rel="stylesheet"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

</head>

<body style="background-color:white;">
    <div id="app">
      @include('inc.navbar')
        <div class="container-fluid">
            @include('inc.msgs')

            @yield('content')

        </div>
    </div>

<!-- Scripts -->
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".alert").delay(500).slideUp(500);
        });
    </script>
    @yield('scriptTags')

</body>
</html>
