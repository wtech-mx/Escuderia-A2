@extends('layouts.app')

@section('bg-color', 'background-color: #0a0302')

@section('content')

    <link href="{{ asset('css/servicios.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <div class="row  bg-image">
        <div class="col-2  mt-5">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8  mt-5">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Historial de Servicios</strong>
            </h5>
        </div>

        <div class="col-2  mt-5">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="col-12 mt-2 p-3">
            <table class="table text-white ">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Auto</th>
                        <th scope="col">Ver</th>
                    </tr>
                </thead>

                @foreach ($mecanica_user as $item)
                    @php
                        $fechaEntera = strtotime($item->Mecanica->fecha_servicio);
                        $anio = date('Y', $fechaEntera);
                        $mes = date('m', $fechaEntera);
                        $dia = date('d', $fechaEntera);

                        switch ($item) {
                            case $item->Mecanica->servicio == '1':
                                $servicio = 'Llanta';
                                break;
                            //Banda
                            case $item->Mecanica->servicio == '2':
                                $servicio = 'Banda';
                                break;
                            //Frenos
                            case $item->Mecanica->servicio == '3':
                                $servicio = 'Freno';
                                break;
                            //Aceite
                            case $item->Mecanica->servicio == '4':
                                $servicio = 'Aceite';
                                break;
                            //Afinacion
                            case $item->Mecanica->servicio == '5':
                                $servicio = 'Afinación';
                                break;
                            //Amorting
                            case $item->Mecanica->servicio == '6':
                                $servicio = 'Amortiguadores';
                                break;
                            //Bateria
                            case $item->Mecanica->servicio == '7':
                                $servicio = 'Bateria';
                                break;
                            case $item->Mecanica->servicio == '8':
                                $servicio = 'Otro';
                                break;
                        }
                    @endphp
                    <tbody>
                        <tr>
                            <td>{{ $dia }}/{{ $mes }}/{{ $anio }}</td>
                            <td>{{ $servicio }}</td>
                            <td>{{ $item->Automovil->placas }}</td>
                            <td>
                                <a data-toggle="modal" data-target="#example{{ $item->Mecanica->id }}"><img class=""
                                        src="{{ asset('img/icon/white/add.png') }}" width="15px"></a>
                            </td>
                        </tr>
                    </tbody>
                    @include('services.modal')
                @endforeach

            </table>
        </div>
    </div>


@endsection
