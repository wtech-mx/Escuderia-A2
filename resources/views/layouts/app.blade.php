<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

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
<p style="display: none">{{$userId =  Auth::id()}}</p>
    <div id="app" class="w-100 h-100">

        <div class="container-login100" >

            <div class="wrap-login100" style="@yield('bg-color')">

                <div class="container-fluid">

                    @yield('content')
                    @include('layouts.tab-bar')

                </div>
            </div>

        </div>

    </div>
</body>
                <div id="seccionRecargar">
                        @include('layouts.alert')
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

{{--        <div id="principalPanel">--}}
{{--            @section('contentPanel')--}}
{{--            @show--}}
{{--        </div>--}}

{{--        <script >--}}
{{--$(document).ready(function(){--}}

{{--// var tiempo = 5000;--}}
{{--//--}}
{{--// var interval = setInterval(function() {--}}
{{--//   $('#addImage').trigger('click');--}}
{{--//--}}
{{--// }, tiempo);--}}
{{--//--}}
{{--// $('#addImage').click(function() {--}}
{{--//   console.log('clic en addImage');--}}
{{--// });--}}

{{--    /* --ADD IMAGE--*/--}}
{{--     $('#addImage').click(function(event){--}}
{{--        $(this).ajaxPost('{{ route('post.store') }}','GET','{{ route('images.index') }}');--}}
{{--    })--}}

{{--    /* --ELEMENTALS FUNCTIONS*/--}}
{{--    $.fn.ajaxPost = function(url,method,sectionToRender) {--}}

{{--        $.ajax(--}}
{{--                {--}}
{{--                    type: method,--}}
{{--                    url: url,--}}
{{--                    dataType: 'json',--}}
{{--                        success: function (data) {--}}
{{--                            ajaxRenderSection(sectionToRender)--}}
{{--                        },--}}
{{--                        error:function(){--}}
{{--                            alert("hay un error");--}}
{{--                        }--}}
{{--                }--}}
{{--            );--}}
{{--    }--}}

{{--    function ajaxRenderSection(url) {--}}
{{--        $.ajax({--}}
{{--            type: 'GET',--}}
{{--            url: url,--}}
{{--            dataType: 'json',--}}
{{--            success: function (data) {--}}
{{--                $('#principalPanel').empty().append($(data));--}}
{{--                //se toma la data en formato json,--}}
{{--                // luego se borra el Div padre de el Sections y se pinta el json (data) como html--}}
{{--            },--}}
{{--            error:function(){alert("hay un error");}--}}
{{--        });--}}
{{--    }--}}

{{--});--}}
{{--    </script>--}}

</html>

