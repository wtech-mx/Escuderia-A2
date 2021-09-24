@extends('admin.layouts.app')

@section('content')

    <style>
        .bg-blue {
            background-color: #68fe87
        }

    </style>

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

    <div class="row bg-down-image-border" style="min-height: 10vh;"">

        @if (Session::has('store'))
            <script>
                Swal.fire({
                    title: 'Exito!!',
                    html: 'Se ha agragado la <b>Nota</b>, ' +
                        'Exitosamente',
                    // text: 'Se ha agragado la "MARCA" Exitosamente',
                    imageUrl: '{{ asset('img/icon/color/post-it.png') }}',
                    background: '#fff',
                    imageWidth: 150,
                    imageHeight: 150,
                    imageAlt: 'Nota IMG',
                })
            </script>
        @endif
        <p style="display: none">{{ $userId = Auth::id() }}</p>
        <div class="col-2 mt-4">
            <div class="d-flex justify-content-start">
                <a class="btn" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
                    aria-controls="multiCollapseExample1">
                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        @if ($users->img == null)
                            <i class="fas fa-user" style="color: #000000;width: 40px"></i>
                        @else
                            <img class="rounded-circle" src="{{ asset('img-perfil/' . $users->img) }}" width="40px">
                        @endif
                    </div>
                </a>

                <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <div class="card card-body ">
                                <a class="text-dark " href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                       document.getElementById('logout-form').submit();">
                                    <img class="rounded-circle" src="{{ asset('img/icon/white/exit.png') }}" width="15">
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-8 mt-5">
            <h5 class="text-center text-white ml-4 mr-4">
                <strong>Hola : {{ $users->name }}</strong> <br> <br>
            </h5>
        </div>

        <div class="col-2 mt-5">
            <div class="d-flex justify-content-start">
                <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()"
                    class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="30px">
                </button>
            </div>
        </div>

        <div class="col-12 p-3 ">
            <div class=" d-flex justify-content-between bg-white p-2 rounded-pill">
                <a href="{{ route('index.alert') }}"> <span class="badge badge-pill"
                        style="background-color: #2ECC71">Alerta</span> </a>
                <a href="{{ route('index_admin.seguros') }}"> <span class="badge badge-pill"
                        style="background-color: #8E44AD">Seguro</span> </a>
                <a href="{{ route('indextc_admin.tarjeta-circulacion') }}"> <span class="badge badge-pill"
                        style="background-color: #F1C40F;color: #000000">Tarjeta C.</span> </a>
                <a href="{{ route('index_admin.verificacion') }}"> <span class="badge badge-pill"
                        style="background-color: #FF0000">Verifica.</span> </a>
                <a href="#"> <span class="badge badge-pill" style="background-color: #2980B9">Servicios</span> </a>
            </div>
        </div>


            @include('admin.alerts.calendar')

    </div>

    <div class="row-content" style="position: relative;background-color: #31ba4b;width: 360px;left: -10px"></div>
    <div class="row bg-down-blue"
        style="z-index:1000;top: -30px;background-image: linear-gradient(to bottom, #00d62e, #2ce048, #43eb5f, #56f574, #68ff88);border-radius: 30px 30px 0 0;">

            <div class="col-12 p-4">
                <h6 class="text-center text-white">
                    <strong style="font: normal normal bold 25px/33px Segoe UI;"> ¿Qué haremos hoy?</strong>
                </h6>
            </div>

            <div class="col-6 text-center">
                @can('ver_usuario')
                        <a href="{{ route('index_admin.user') }}">
                @else
                <a  data-toggle="modal" data-target="#modal-permisos">
                @endcan
                    <div class="card" style="border-radius: 15px">
                        <div class="card-body">
                            <i class="fas fa-users icon-effect-dashboard"></i>
                            <p class="card-text text-white"><strong>Usuarios</strong></p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 text-center">
                @can('Ver Automovil')
                <a href="{{ route('index_admin.automovil') }}">
                @else
                <a  data-toggle="modal" data-target="#modal-permisos">
                @endcan
                    <div class="card" style="border-radius: 15px">
                        <div class="card-body">
                            <i class="fas fa-car icon-effect-dashboard"></i>
                            <p class="card-text text-white"><strong>Veh&iacute;culos</strong></p>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-6 text-center position-relative mt-4" >
                <div class="card" style="border-radius: 15px">
                    {{-- @can('Ver Servicios') --}}
                    <a href="{{ route('create.pronostico') }}">
                    {{-- @else
                    <a  data-toggle="modal" data-target="#modal-permisos">
                    @endcan --}}
                        <div class="contenedor-inter-card position-absolute">
                            <p clas="text-vertical-l"
                                style="writing-mode: vertical-lr;color: #000;top:30px;margin-top: 2.3rem;margin-left: 5px!important;">
                                Pronostico</p>
                        </div>
                    </a>
                    {{-- @can('Ver Servicios') --}}
                    <a data-toggle="modal" data-target="#Servicios" class="text-white">
                    {{-- @else
                    <a  data-toggle="modal" data-target="#modal-permisos">
                    @endcan --}}
                        <div class="card-body">
                            <i class="fas fa-cogs icon-effect-dashboard"></i>
                            <p class="card-text text-white"><strong>Servicios</strong></p>
                        </div>
                    </a>
                </div>
                </a>
            </div>

            <div class="col-6 text-center mt-4">
                @can('Ver Tarjeta C.')
                <a href="{{ route('indextc_admin.tarjeta-circulacion') }}" class="text-white">
                @else
                <a  data-toggle="modal" data-target="#modal-permisos">
                @endcan
                    <div class="card" style="border-radius: 15px">
                        <div class="card-body">
                            <i class="fas fa-money-check icon-effect-dashboard"></i>
                            <p class="card-text"><strong>T. Circulaci&oacute;n</strong></p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 text-center mt-4">
                @can('Ver Expedientes')
                <a href="{{ route('index_admin.view-exp-fisico-admin') }}" class="text-white">
                @else
                <a  data-toggle="modal" data-target="#modal-permisos">
                @endcan
                    <div class="card" style="border-radius: 15px">
                        <div class="card-body">
                            <i class="fas fa-folder-open icon-effect-dashboard"></i>
                            <p class="card-text"><strong>Exp F&iacute;sico</strong></p>
                        </div>
                    </div>
                </a>
            </div>

        <div class="col-6 text-center mt-4">
            @can('Ver Seguro')
            <a href="{{ route('index_admin.seguros') }}" class="text-white">
            @else
            <a  data-toggle="modal" data-target="#modal-permisos">
            @endcan
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <i class="fas fa-shield-alt icon-effect-dashboard"></i>
                        <p class="card-text text-white"><strong>Seguros</strong></p>
                    </div>
                </div>
            </a>
        </div>

        @if ($users->empresa == 0)
                <div class="col-6 text-center mt-4">
                    @can('Ver Emp')
                    <a href="{{ route('index_admin.empresa') }}" class="text-white">
                    @else
                    <a  data-toggle="modal" data-target="#modal-permisos">
                    @endcan
                        <div class="card" style="border-radius: 15px">
                            <div class="card-body">
                                <i class="fas fa-building icon-effect-dashboard"></i>
                                <p class="card-text text-white"><strong>Empresas</strong></p>
                            </div>
                        </div>
                    </a>
                </div>
        @endif


        <div class="col-6 text-center mt-4">
            @can('Ver Veri')
            <a href="{{ route('index_admin.verificacion') }}" class="text-white">
            @else
                <a  data-toggle="modal" data-target="#modal-permisos">
            @endcan
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <i class="fas fa-calendar-check icon-effect-dashboard"></i>
                        <p class="card-text text-white"><strong>Verificaci&oacute;n</strong></p>
                    </div>
                </div>
            </a>
        </div>


        @if ($users->empresa == 0)
                <div class="col-6 text-center mt-4">
                    @can('Ver Licencia de Conducir')
                    <a href="{{ route('index_admin.licencia') }}" class="text-white">
                    @else
                    <a  data-toggle="modal" data-target="#modal-permisos">
                    @endcan
                        <div class="card" style="border-radius: 15px">
                            <div class="card-body">
                                <i class="far fa-id-badge icon-effect-dashboard"></i>
                                <p class=" card-text text-white"><strong>Licencia Conducir</strong></p>
                            </div>
                        </div>
                    </a>
                </div>
        @endif

        <div class="col-6 text-center mt-4">
            <div class="card" style="border-radius: 15px">
                @can('Ver Notas')
                <a href="{{ route('index.notas') }}">
                @else
                <a  data-toggle="modal" data-target="#modal-permisos">
                @endcan
                    <div class="contenedor-inter-card position-absolute">
                        <p clas="text-vertical-l"
                            style="writing-mode: vertical-lr;color: #000;top:30px;margin-top: 2.3rem;margin-left: 5px!important;">
                            Historial</p>
                    </div>
                </a>
                @can('Crear Notas')
                <a data-toggle="modal" data-target="#modalNotas" class="text-white">
                @else
                <a  data-toggle="modal" data-target="#modal-permisos">
                @endcan
                    <div class="card-body">
                        <i class="fas fa-sticky-note icon-effect-dashboard"></i>
                        <p class="card-text text-white"><strong>Notas</strong></p>
                    </div>
                </a>
            </div>
            </a>
        </div>

        @if ($users->empresa == 0)
            <div class="col-6 text-center mt-4">
                @can('Ver Cupones')
                <a href="{{ route('index_admin.cupon') }}" class="text-white">
                @else
                <a  data-toggle="modal" data-target="#modal-permisos">
                @endcan
                    <div class="card" style="border-radius: 15px">
                        <div class="card-body">
                            <i class="fas fa-qrcode icon-effect-dashboard"></i>
                            <p class=" card-text text-white"><strong>Cupones</strong></p>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if ($users->empresa == 1)
        <div class="col-6 text-center mt-4">
            <a href="{{ route('index_admin.gasolina') }}">
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <i class="fas fa-tachometer-alt icon-effect-dashboard"></i>
                        <p class="card-text text-white"><strong>Gasolina</strong></p>
                    </div>
                </div>
            </a>
        </div>
        @endif

            <div class="col-6 text-center  mt-4">
                @can('Crear Roles y Permisos')
                <a href="{{ route('index_role.role') }}" class="text-white">
                @else
                <a  data-toggle="modal" data-target="#modal-permisos">
                @endcan
                    <div class="card" style="border-radius: 15px">
                        <div class="card-body">
                            <i class="fas fa-users-cog icon-effect-dashboard"></i>
                            <p class="card-text text-white"><strong>Roles y Permisos</strong></p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 text-center mt-4" style="margin-bottom: 8rem !important;">
                @can('Ver Cupones')
                <a href="{{ route('index.cotizacion') }}" class="text-white">
                @else
                <a  data-toggle="modal" data-target="#modal-permisos">
                @endcan
                    <div class="card" style="border-radius: 15px">
                        <div class="card-body">
                            <i class="fas fa-file-invoice-dollar icon-effect-dashboard"></i>
                            <p class=" card-text text-white"><strong>Cotizacion</strong></p>
                        </div>
                    </div>
                </a>
            </div>

        @include('admin.notas.create')
        @include('admin.modal-services')
    </div>


@endsection

