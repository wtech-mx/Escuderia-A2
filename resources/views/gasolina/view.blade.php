@extends('layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('content')

    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gauge.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.3/venobox.min.css" />

    <div class="row bg-image">

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8  mt-4">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Gasolina</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="d-flex flex-row-reverse">
            <div class="p-2">

                <div class="content">
                    <a class="btn btn-circel" href="{{ route('create2.gasolina') }}">
                        <i class="fas fa-plus-circle icon-effect"></i>
                    </a>

                        <a class="btn btn-circel" href="{{ route('create2.gasolina') }}">
                            <h5 class="text-white text-tittle-app  mt-2 " style="font: normal normal bold 15px/20px Segoe UI">
                                Agregar
                            </h5>
                        </a>

                </div>
            </div>
        </div>


            <div class="col-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                    <div class="carousel-inner">

                        {{-- -------------------------------------------------------------------------- --}}
                        {{-- |Vehculos de user --}}
                        {{-- |-------------------------------------------------------------------------- --}}

                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-center">

                                        <h5 class="text-center text-white mt-4 p-2">
                                            <strong>Registros Personales</strong>
                                        </h5>

                                        <a class="text-white p-2" href="/exportar">
                                            <i class="fa fa-download icon-effect" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="content container-res-max">
                                    <div class="col-12">

                                        <table id="seguro" class="table text-white">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Usuario</th>
                                                    <th scope="col">Submarca / placas</th>
                                                    <th scope="col">Estatus</th>
                                                    <th scope="col">Accion</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gasolina as $item)
                                                    <tr>
                                                        <th>{{ $item->User->name }}</th>

                                                        <td>{{ $item->Automovil->submarca }} /<br> {{ $item->Automovil->placas }}</td>
                                                        <td>{{ $item->estatus }}</td>

                                                        <td>
                                                            <a type="button" class="btn text-white" data-toggle="modal" data-target="#modal-{{ $item->id }}">
                                                                <i class="far fa-eye icon-users-edit" style="font-size: 15px;"></i>
                                                            </a>
                                                        </td>
@include('admin.gasolina.modal-view')
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

    </div>

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#seguro').DataTable();
        });

        $(document).ready(function() {
            $('#seguro_empresa').DataTable();
        });

        function updateGauge(id, min, max) {
                        const newGaugeDisplayValue = document.getElementById("gaugeValue-" + id).value;
                        const newGaugeValue = Math.floor(((newGaugeDisplayValue - min) / (max - min)) * 100);
                        document.getElementById(id).style.setProperty('--gauge-display-value', newGaugeDisplayValue);
                        document.getElementById(id).style.setProperty('--gauge-value', newGaugeValue);
                    }

        $(document).ready(function(){
                $('.venobox').venobox();
                });
    </script>

@endsection

@endsection
