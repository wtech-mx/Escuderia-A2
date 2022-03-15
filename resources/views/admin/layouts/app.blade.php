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

    @yield('css')
    <!-- Styles -->
    <link href="{{ asset('css/bg.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login-estilos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tab-bar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/btn-save.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alerts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calendario.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pwa.css') }}" rel="stylesheet">
    <link href="{{ asset('css/effects.css') }}" rel="stylesheet">
    <link href="{{ asset('css/container-responsive.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/preloader.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/adaptabilidad.css') }}" rel="stylesheet">

     @yield('crop-css')

    <link href="{{ asset('fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/all.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('fonts/font-awesome.min.js') }}" rel="stylesheet"> --}}
    <link href="{{ asset('fonts/all.min.js') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">


    <!-- sweetalert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--sweetalert2 script -->

    <!-- personalizados js -->
    <script src="{{ asset('js/push.js') }}"></script>
    <script src="{{ asset('js/offline.js') }}"></script>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
{{--    <script src="{{ asset('js/preloader.js') }}"></script>--}}
    <script src="{{ asset('js/camara-class.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.3/venobox.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script> --}}

    <!-- bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.1/dist/html2canvas.min.js"></script>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


    @laravelPWA

    @yield('scripts')

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        var OneSignal = window.OneSignal || [];
        var initConfig = {
            appId: "fedb6b0a-c9a3-4066-8d6e-48f79ecc30e6",
            safari_web_id: "web.onesignal.auto.3a07767d-f8c5-4ebf-965b-cb322da40f9f",
            notifyButton: {
                enable: true
            },
        };
        OneSignal.push(function() {
            OneSignal.SERVICE_WORKER_PARAM = {
                scope: '/push/onesignal/'
            };
            OneSignal.SERVICE_WORKER_PATH = 'push/onesignal/OneSignalSDKWorker.js'
            OneSignal.SERVICE_WORKER_UPDATER_PATH = 'push/onesignal/OneSignalSDKUpdaterWorker.js'
            OneSignal.init(initConfig);
        });

    </script>

</head>

<body  style="background-image: url('https://checkn-go.com.mx/img/bg-medida.png');">
    <div id="page-loader"><span class="preloader-interior"></span></div>

    <p style="display: none">{{ $userId = Auth::id() }}</p>

    <div class="container-fluid"  style="@yield('bg-color')">
        @yield('content')
        @auth

            <div id="installContainer" class="ocultar">
                <button id="butInstall" class="pwa-btn" type="button">
                    Install
                </button>
            </div>


            @include('admin.layouts.tab-bar')
            @include('admin.layouts.offline')
            @include('admin.layouts.modal-permisos-denegado')
        </div>
    @endauth

    @yield('js')
    @yield('crop-js')

</body>


</html>
