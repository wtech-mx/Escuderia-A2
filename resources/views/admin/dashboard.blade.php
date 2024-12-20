@extends('admin.layouts.app')

@section('content')

    <style>
        .bg-blue {
            background-color: #68fe87
        }

    </style>

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

    <div class="row bg-down-image-border" style="min-height: 10vh;">

        @include('admin.sweat_alerts')

        <p style="display: none">{{ $userId = Auth::id() }}</p>

        @if (auth()->user()->empresa == 0 || auth()->user()->act_key == 1)


            <div class="col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-3 ">

                <div class="d-flex justify-content-between mt-3 mb-3">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                @if ($users->img == null)
                                    <i class="fas fa-user" style="color: #000000;width: 40px"></i>
                                @else
                                    <img class="rounded-circle" src="{{ asset('img-perfil/' . $users->img) }}" width="40px">
                                @endif
                            </div>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>
                        </div>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                        <h5 class="text-center text-white ml-4 mr-4">
                            <strong>Hola : {{ $users->name }}</strong> <br> <br>
                        </h5>

                        <a type="button" data-toggle="modal" data-target="#exampleModalCenter"
                            class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                            <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="30px">
                        </a>
                </div>
                {{-- @include('admin.modal-notificacion') --}}
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

                @include('admin.alerts.calendar')

            </div>

        <div class="col-xs-12 col-sm-12 col-lg-6 col-xl-6 bg-down-blue bg_verdeb" style="">

                <div class="row" style="padding: 20px;">

                    <div class="col-12 p-4">
                        <h6 class="text-center text-white">
                            <strong style="font: normal normal bold 25px/33px Segoe UI;"> ¿Qué haremos hoy?</strong>
                        </h6>
                    </div>

                    <div class="col-6 col-xs-6 col-sm-6 col-lg-3 text-center mt-4">
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

                    <div class="col-6 col-xs-6 col-sm-6 col-lg-3 text-center mt-4" >
                        <div class="card" style="border-radius: 15px">
                            {{-- @can('Ver Servicios') --}}
                            <a data-toggle="modal" data-target="#Servicios" class="text-white">

                            {{-- @else
                            <a  data-toggle="modal" data-target="#modal-permisos">
                            @endcan --}}
                                <div class="contenedor-inter-card position-absolute">
                                    <p clas="text-vertical-l"
                                        style="writing-mode: vertical-lr;color: #000;top:30px;margin-top: 2.3rem;margin-left: 5px!important;">
                                        Servicios</p>
                                </div>
                            </a>
                            {{-- @can('Ver Servicios') --}}
                            <a href="{{ route('create.pronostico') }}">
                                {{-- @else
                            <a  data-toggle="modal" data-target="#modal-permisos">
                            @endcan --}}
                                <div class="card-body">
                                    <i class="fas fa-calendar icon-effect-dashboard"></i>
                                    <p class="card-text text-white"><strong>Pronostico</strong></p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-6 col-xs-6 col-sm-6 col-lg-3 text-center mt-4">
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

                    <div class="col-6 col-xs-6 col-sm-6 col-lg-3 text-center mt-4">
                        @can('Ver Expedientes')
                        <a href="{{ route('index_admin.view-exp-fisico-admin') }}" class="text-white">
                        @else
                        <a  data-toggle="modal" data-target="#modal-permisos">
                        @endcan
                            <div class="card" style="border-radius: 15px">
                                <div class="card-body">
                                    <i class="fas fa-folder-open icon-effect-dashboard"></i>
                                    <p class="card-text text-white"><strong>Exp F&iacute;sico</strong></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    @can('Ver Tarjeta C.')
                    <div class="col-6 col-xs-6 col-sm-6 col-lg-3 text-center mt-4" >
                        <div class="card" style="border-radius: 15px">
                            <a href="{{ route('create.pronostico_tc') }}">
                                <div class="contenedor-inter-card position-absolute">
                                    <p clas="text-vertical-l"
                                        style="writing-mode: vertical-lr;color: #000;top:30px;margin-top: 2.3rem;margin-left: 5px!important;">
                                        Pronostico</p>
                                </div>
                            </a>
                            <a href="{{ route('indextc_admin.tarjeta-circulacion') }}" class="text-white">
                                <div class="card-body">
                                    <i class="fas fa-money-check icon-effect-dashboard"></i>
                                    <p class="card-text text-white"><strong>Tarjeta de Circulacion</strong></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endcan

                    <div class="col-6 col-xs-6 col-sm-6 col-lg-3 text-center mt-4">
                        <a href="{{ route('index_admin.gasolina') }}">
                            <div class="card" style="border-radius: 15px">
                                <div class="card-body">
                                    <i class="fas fa-tachometer-alt icon-effect-dashboard"></i>
                                    <p class="card-text text-white"><strong>Gasolina</strong></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 col-xs-6 col-sm-6 col-lg-3 text-center mt-4">
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
                    <div class="col-6 col-xs-6 col-sm-6 col-lg-3 text-center mt-4">
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

                    <div class="col-6 col-xs-6 col-sm-6 col-lg-3 text-center mt-4">
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

                    @if (auth()->user()->empresa == 0)
                        <div class="col-6 col-xs-6 col-sm-6 col-lg-3 text-center  mt-4">
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
                    @endif

                    @if ($users->empresa == 0)
                        <div class="col-6 col-xs-6 col-sm-6 col-lg-3 text-center mt-4">
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

                    @if ($users->empresa == 0)
                        <div class="col-6 col-xs-6 col-sm-6 col-lg-3 text-center mt-4">
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

                    <div class="col-6 col-xs-6 col-sm-6 col-lg-4 text-center mt-4">
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
                    </div>

                    <div class="col-6 col-xs-6 col-sm-6 col-lg-4 text-center mt-4">
                        <div class="card" style="border-radius: 15px">
                            @can('Ver Notas')
                            <a href="{{ route('index.notas') }}">
                            @else
                            <a  data-toggle="modal" data-target="#modal-permisos">
                            @endcan
                                <div class="contenedor-inter-card position-absolute">
                                    <p clas="text-vertical-l"
                                        style="writing-mode: vertical-lr;color: #000;top:30px;margin-top: 2.3rem;margin-left: 5px!important;">
                                        Historial
                                    </p>
                                </div>
                            </a>

                            @can('Crear Notas')
                            <a data-toggle="modal" data-target="#modalSolicitud" class="text-white">
                            @else

                            <a  data-toggle="modal" data-target="#modal-permisos">
                            @endcan
                                <div class="card-body">
                                    <i class="fas fa-sticky-note icon-effect-dashboard"></i>
                                    <p class="card-text text-white"><strong>Solicitud de Servicio</strong></p>
                                </div>
                            </a>
                        </div>
                    </div>

                    @if ($users->empresa == 0)
                        <div class="col-6 col-xs-6 col-sm-6 col-lg-4 text-center mt-4">
                            @can('Ver Cupones')
                            <a href="{{ route('index.cotizacion') }}" class="text-white">
                            @else
                            <a  data-toggle="modal" data-target="#modal-permisos">
                            @endcan
                                <div class="card" style="border-radius: 15px">
                                    <div class="card-body">
                                        <i class="fas fa-file-invoice-dollar icon-effect-dashboard"></i>
                                        <p class=" card-text text-white"><strong>Orden de servicio</strong></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    @if ($users->empresa == 0)
                        <div class="col-6 col-xs-6 col-sm-6 col-lg-4 text-center mt-4">
                            <div class="card" style="border-radius: 15px">
                                <a  href="{{ route('index.servicios_taller') }}">
                                    <div class="contenedor-inter-card position-absolute">
                                        <p clas="text-vertical-l"
                                            style="writing-mode: vertical-lr;color: #000;top:30px;margin-top: 2.3rem;margin-left: 5px!important;">
                                            Ver Serv.</p>
                                    </div>
                                </a>
                                <a href="{{ route('index.cotizacion_taller') }}" class="text-white">
                                    <div class="card-body">
                                        <i class="fas fa-file icon-effect-dashboard"></i>
                                        <p class="card-text text-white"><strong>Solicitudes Mantenimiento</strong></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif

                    @if ($users->empresa == 0)
                        <div class="col-6 text-center mt-4" style="margin-bottom: 8rem">
                            <a href="{{ route('index.key') }}" class="text-white">

                                <div class="card" style="border-radius: 15px">
                                    <div class="card-body">
                                        <i class="fas fa-key icon-effect-dashboard"></i>
                                        <p class=" card-text text-white"><strong>Licencia Empresas</strong></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    @include('admin.notas.create')
                    @include('admin.modal-services')
                    @include('admin.solicitud_servicio.modal_solicitud')

                </div>
        @else

            <div class="col-12 p-4">
            <h6 class="text-center text-white">
                <strong style="font: normal normal bold 25px/33px Segoe UI;">Ups... No tienes acceso, comunicate con nosotros para mas infotmación.</strong>
            </h6>
        </div>

        </div>

        </div>

    @endif


@endsection

