@extends('layouts.app')

@section('bg-color', 'background-image:none')

@section('content')

    <p style="display: none">{{ $userId = Auth::id() }}</p>

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">


    <div class="row bg-img-log" style="z-index:1000;background-color: #27de4e;min-height: 10vh;">

        <div class="col-2 ">
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
                            <div class="card card-body">
                                <a class="text-dark" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <img class="rounded-circle" src="{{ asset('img/icon/black/exit.png') }}" width="15">
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

        <div class="col-8">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Hola: {{ $users->name }}</strong> <br> <br>
                {{-- <strong>Auto Activo: {{$user->Automovil->submarca}}</strong> --}}
            </h5>
        </div>

        <div class="col-2">
            <div class="d-flex justify-content-start">
                <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()"
                    class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="30px">
                </button>
            </div>
        </div>


        <style>
            #calendar {
                margin: 0px auto;
            }

        </style>

        <div class="col-12 p-3 ">
            <div class=" d-flex justify-content-between bg-white p-2 rounded-pill">
                <a href="{{ route('calendar.index_calendar_user') }}"> <span class="badge badge-pill"
                        style="background-color: #2ECC71">Alerta</span> </a>
                <a href="{{ route('index.seguro') }}"> <span class="badge badge-pill"
                        style="background-color: #8E44AD">Seguro</span> </a>
                <a href="{{ route('index.tc') }}"> <span class="badge badge-pill"
                        style="background-color: #F1C40F;color: #faf7f7">Tarjeta C.</span> </a>
                <a href="{{ route('index.verificacion') }}"> <span class="badge badge-pill"
                        style="background-color: #FF0000">Verifica.</span> </a>
                <a href="{{ route('view_user.servicio') }}"> <span class="badge badge-pill"
                        style="background-color: #2980B9">Servicios</span> </a>
            </div>
        </div>

        @include('alerts.calendar')

    </div>

    <div class="row-content" style="position: relative;background-color: #31ba4b;width: 360px;left: -10px"></div>
    <div class="row bg-down-blue" style="z-index:1000;top: -30px">

        <div class="col-12 p-4">
            <h3 class="text-center text-white">
                ¿Que estas buscando?
            </h3>

{{--            <h3 class="text-center text-white" style="color: #fff">--}}
{{--                <strong>Auto seleccionado</strong>--}}
{{--                <strong style="color: rgb(94, 226, 41)">{{ $users->Automovil->placas }}</strong>--}}
{{--            </h3>--}}
        </div>

        {{-- <div class="col-6 text-center">
            <a href="{{ route('calendar.index_calendar_user') }}">
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/campana.png') }}" alt="Icon User"
                            width="50px">
                        <p class="card-text text-dark"><strong>Alertas</strong></p>
                    </div>
                </div>
            </a>
        </div> --}}

        <div class="col-6 text-center">
            <a href="{{ route('edit.profile', $userId) }}">
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/user.png') }}" alt="Icon User"
                            width="50px">
                        <p class="card-text text-dark"><strong>Datos de perfil</strong></p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6 text-center">
            @if (auth()->user()->empresa == 1)
            <a  data-toggle="modal" data-target="#modal-permisos">
            @else
            <a href="{{ route('index.automovil') }}">
            @endif
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/coche (2).png') }}" alt="Icon User"
                            width="50px">
                        <p class="card-text text-dark"><strong>Datos de auto</strong></p>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-6 text-center mt-4">
            @if (auth()->user()->empresa == 1)
            <a href="{{ route('index_admin.gasolina') }}" class="text-dark">
                @else
            <a href="{{ route('index2.gasolina') }}" class="text-dark">
                @endif
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/km.png') }}" alt="Icon User"
                            width="50px">
                            <p class="card-text"><strong>Gasolina</strong></p>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-6 text-center mt-4">
            @if (auth()->user()->empresa == 1)
            <a  data-toggle="modal" data-target="#modal-permisos">
            @else
            <a href="{{ route('index.tc') }}" class="text-dark">
            @endif
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/documento.png') }}" alt="Icon documento"
                            width="50px">
                        <p class="card-text"><strong>T. de Circulaci&oacute;n</strong></p>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-6 text-center mt-4">
            @if (auth()->user()->empresa == 1)
            <a  data-toggle="modal" data-target="#modal-permisos">
            @else
            <a href="{{ route('index.seguro') }}" class="text-dark">
            @endif
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/seguro-de-coche.png') }}"
                            alt="Icon Seguro" width="50px">
                        <p class="card-text"><strong>Seguro</strong></p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6 text-center mt-4">
            @if (auth()->user()->empresa == 1)
            <a href="{{ route('index.exp-inventario') }}" class="text-dark">
            @else
            <a href="{{ route('index_exp') }}" class="text-dark">
            @endif
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/expediente.png') }}"
                            alt="Icon Exp Fisico" width="50px">
                            @if (auth()->user()->empresa == 1)
                        <p class="card-text"><strong>Exp F&iacute;sico</strong></p>
                        @else
                        <p class="card-text"><strong>Inventario</strong></p>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6 text-center mt-4 ">
            @if (auth()->user()->empresa == 1)
            <a  data-toggle="modal" data-target="#modal-permisos">
            @else
             <a href="{{ route('index.cupon') }}" class="text-dark">
            @endif
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/cupon.png') }}" alt="Icon gift"
                            width="50px">
                        <p class="card-text"><strong>Cupon</strong></p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6 text-center mt-4 ">
            @if (auth()->user()->empresa == 1)
            <a  data-toggle="modal" data-target="#modal-permisos">
            @else
            <a href="{{ route('view_user.servicio') }}" class="text-dark">
            @endif
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/car-repair.png') }}" alt="Icon gift"
                            width="50px">
                        <p class="card-text"><strong>Servicios</strong></p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6 text-center mt-4" style="margin-bottom: 8rem!important;">
            <a href="{{ route('index.licencia') }}" class="text-dark">
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/licencia-de-conducir.png') }}"
                            alt="Icon gift" width="50px">
                        <p class="card-text"><strong>Licencia de conducir</strong></p>
                    </div>
                </div>
            </a>
        </div>

        @include('layouts.warning')

    </div>
@endsection
