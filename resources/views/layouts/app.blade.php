<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DGME_RECURITMENT') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".alert").delay(500).slideUp(500);
        });
    </script>
    @yield('scriptTags')

</body>
</html>
