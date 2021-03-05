<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bg.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login-estilos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tab-bar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/btn-save.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alerts.css') }}" rel="stylesheet">

    <link href="{{ asset('fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/font-awesome.min.js') }}" rel="stylesheet">
    <link href="{{ asset('fonts/all.min.js') }}" rel="stylesheet">


     <!-- personalizados js -->
    <script src="{{ asset('js/push.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--User script -->
    <script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous">
    </script>


</head>

<body>
    <div id="app" class="w-100 h-100">

        <div class="container-login100" >

            <div class="wrap-login100" style="@yield('bg-color')">

                <div class="container-fluid">
                        @yield('content')
                       @include('admin.layouts.tab-bar')
                </div>
            </div>

        </div>

    </div>

</body>
            <div id="seccionRecargar">
                    @include('admin.layouts.alert')
	        </div>


                <script type="text/javascript">
                    $(document).ready(function(){
                        setInterval(
                                function(){
                                    console.log('entro');
                                    $('#seccionRecargar').load('{{ route('alerts.alert') }}');
                                },60000
                            );
                    });
                </script>
</html>
