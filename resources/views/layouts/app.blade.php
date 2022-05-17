@php

# Iniciando la variable de control que permitirá mostrar o no el modal
$exibirModal = false;
# Verificando si existe o no la cookie
if (!isset($_COOKIE['mostrarModal'])) {
    # Caso no exista la cookie entra aquí
    # Creamos la cookie con la duración que queramos

    //$expirar = 3600; // muestra cada 1 hora
    //$expirar = 10800; // muestra cada 3 horas
    //$expirar = 21600; //muestra cada 6 horas
    //$expirar = 43200; //muestra cada 12 horas
    //$expirar = 86400;  // muestra cada 24 horas
    $expirar = 1209600; // muestra cada 15 dias

    setcookie('mostrarModal', 'SI', time() + $expirar); // mostrará cada 12 horas.
    # Ahora nuestra variable de control pasará a tener el valor TRUE (Verdadero)
    $exibirModal = true;
}
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/ico" href="{{ asset('images/icons/icon-72x72.png') }}" sizes="any">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="{{ asset('css/btn-lateral.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bg.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login-estilos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tab-bar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/btn-save.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alerts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calendario.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pwa.css') }}" rel="stylesheet">
    <link href="{{ asset('css/preloader.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adaptabilidad.css') }}" rel="stylesheet">

    <link href="{{ asset('fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/all.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('fonts/font-awesome.min.js') }}" rel="stylesheet"> --}}
    <link href="{{ asset('fonts/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">


    @yield('css')
    <!-- sweetalert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--sweetalert2 script -->

    <!-- personalizados js -->
    <script src="{{ asset('js/push.js') }}"></script>
    <script src="{{ asset('js/offline.js') }}"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="{{ asset('js/preloader.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/camara-class.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script> --}}

    <!-- bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    @laravelPWA

    @yield('scripts')

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

    {{-- <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "fedb6b0a-c9a3-4066-8d6e-48f79ecc30e6",
                safari_web_id: "web.onesignal.auto.3a07767d-f8c5-4ebf-965b-cb322da40f9f",
                notifyButton: {
                    enable: true
                },
            });
        });
    </script> --}}

</head>

<body style="background-image: url('../img/bg-medida.png');">
    <div id="page-loader"><span class="preloader-interior"></span></div>

    @include('layouts.warning')

    <p style="display: none">{{ $userId = Auth::id() }}</p>

    <div class="container-fluid" style="@yield('bg-color')">
        @yield('content')
        @auth

            @include('layouts.social-bar')

            <div id="installContainer" class="ocultar">
                <button id="butInstall" class="pwa-btn" type="button">
                    Install
                </button>
            </div>


            @include('layouts.tab-bar')
            @include('layouts.offline')
            @include('modal-ios')
            @include('admin.layouts.modal-permisos-denegado')

        @endauth
    </div>

</body>

@if ($exibirModal === true)
    <script src="{{ asset('js/ios.js') }}"></script>
@endif


{{-- Local appId: "8848d363-4255-4532-929e-67f29c6867b9", --}}

</html>
