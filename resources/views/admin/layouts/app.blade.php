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
    <link href="{{ asset('fonts/all.min.js') }}" rel="stylesheet">

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

                        <div id="installContainer" class="ocultar">
                          <button id="butInstall" class="pwa-btn" type="button">
                            Install
                          </button>
                        </div>


                        @include('admin.layouts.tab-bar')
                        @include('admin.layouts.offline')
                </div>
                @endauth


</body>

{{--            <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>--}}
{{--            <script>--}}

{{--                var firebaseConfig = {--}}
{{--                    apiKey: "AIzaSyCx0ssO35wLU3d6e6C4QPrpqANdjj2L2Pc",--}}
{{--                    authDomain: "checkngo-e379f.firebaseapp.com",--}}
{{--                    projectId: "checkngo-e379f",--}}
{{--                    storageBucket: "checkngo-e379f.appspot.com",--}}
{{--                    messagingSenderId: "925533275751",--}}
{{--                    appId: "1:925533275751:web:1a077ea798718e9d0c36c2",--}}
{{--                    measurementId: "G-ZPD0T689L3"--}}
{{--                };--}}
{{--                // measurementId: G-R1KQTR3JBN--}}
{{--                  // Initialize Firebase--}}
{{--                firebase.initializeApp(firebaseConfig);--}}
{{--                const messaging = firebase.messaging();--}}

{{--                function initFirebaseMessagingRegistration() {--}}
{{--                        messaging--}}
{{--                        .requestPermission()--}}
{{--                        .then(function () {--}}
{{--                            return messaging.getToken()--}}
{{--                        })--}}
{{--                        .then(function(token) {--}}
{{--                            console.log(token);--}}

{{--                            $.ajaxSetup({--}}
{{--                                headers: {--}}
{{--                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                                }--}}
{{--                            });--}}

{{--                            $.ajax({--}}
{{--                                url: '{{ route("save-token") }}',--}}
{{--                                type: 'POST',--}}
{{--                                data: {--}}
{{--                                    token: token--}}
{{--                                },--}}
{{--                                dataType: 'JSON',--}}
{{--                                success: function (response) {--}}
{{--                                    alert('Token saved successfully.');--}}
{{--                                },--}}
{{--                                error: function (err) {--}}
{{--                                    console.log('User Chat Token Error'+ err);--}}
{{--                                },--}}
{{--                            });--}}

{{--                        }).catch(function (err) {--}}
{{--                            toastr.error('User Chat Token Error'+ err, null, {timeOut: 3000, positionClass: "toast-bottom-right"});--}}
{{--                        });--}}
{{--                 }--}}

{{--                 messaging.onMessage(function(payload) {--}}
{{--                    const noteTitle = payload.notification.title;--}}
{{--                    const noteOptions = {--}}
{{--                        body: payload.notification.body,--}}
{{--                        icon: payload.notification.icon,--}}
{{--                    };--}}
{{--                    new Notification(noteTitle, noteOptions);--}}
{{--                });--}}

{{--            </script>--}}

</html>
