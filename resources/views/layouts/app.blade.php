@php

  # Iniciando la variable de control que permitirá mostrar o no el modal
  $exibirModal = false;
  # Verificando si existe o no la cookie
  if(!isset($_COOKIE["mostrarModal"]))
  {
    # Caso no exista la cookie entra aquí
    # Creamos la cookie con la duración que queramos

    //$expirar = 3600; // muestra cada 1 hora
    //$expirar = 10800; // muestra cada 3 horas
    //$expirar = 21600; //muestra cada 6 horas
    //$expirar = 43200; //muestra cada 12 horas
    //$expirar = 86400;  // muestra cada 24 horas
    $expirar = 1209600;  // muestra cada 15 dias

    setcookie('mostrarModal', 'SI', (time() + $expirar)); // mostrará cada 12 horas.
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

    <link href="{{ asset('fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/all.min.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('fonts/font-awesome.min.js') }}" rel="stylesheet">--}}
    <link href="{{ asset('fonts/all.min.css') }}" rel="stylesheet">

    <!-- sweetalert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--sweetalert2 script -->

     <!-- personalizados js -->
    <script src="{{ asset('js/push.js') }}"></script>
    <script src="{{ asset('js/offline.js') }}"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
{{--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>--}}

    <!-- bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>

{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    @laravelPWA

    @yield('scripts')

</head>

<body>

<p style="display: none">{{$userId =  Auth::id()}}</p>

                <div class="container-fluid" style="@yield('bg-color')">
                    @yield('content')
                    @auth

                          <div class="social-bar">
                            <a href="https://wa.link/qz1lla"  class="icon icon-whatsapp" target="_blank">
                                <i class="bi bi-whatsapp" style="top: 0px;position: absolute;font-size: 10px"></i>
                            </a>
                            <a href="#"  class="icon icon-telegram" target="_blank">
                                  <i class="bi bi-telegram" style="top: 20px;position: absolute;font-size: 10px"></i>
                            </a>

                            <a href="tel:+55 1006 5421"  class="icon icon-telephone" target="_blank">
                                 <i class="bi bi-telephone-fill" style="top: 39px;position: absolute;font-size: 9px"></i>
                            </a>
                          </div>

                        <div id="installContainer" class="ocultar">
                            <button id="butInstall" class="pwa-btn" type="button">
                                Install
                            </button>
                        </div>

                        @include('layouts.tab-bar')
                        @include('layouts.offline')
                        @include('modal-ios')

                    @endauth
                </div>

</body>

@if($exibirModal === true)
<script src="{{ asset('js/ios.js') }}"></script>
@endif
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script>
          window.OneSignal = window.OneSignal || [];
          OneSignal.push(function() {
            OneSignal.init({
              appId: "fedb6b0a-c9a3-4066-8d6e-48f79ecc30e6",
            });
          });
        </script>

    {{--@include('layouts.indexdb')--}}

</html>

