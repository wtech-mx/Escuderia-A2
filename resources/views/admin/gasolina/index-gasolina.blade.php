@extends('admin.layouts.app')
@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('content')

    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

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
                    @if (auth()->user()->chofer == 1)
                    <a class="btn btn-circel" href="{{ route('create.gasolina') }}">
                        <i class="fas fa-plus-circle icon-effect"></i>
                    </a>

                        <a class="btn btn-circel" href="{{ route('create.gasolina') }}">
                            <h5 class="text-white text-tittle-app  mt-2 " style="font: normal normal bold 15px/20px Segoe UI">
                                Agregar
                            </h5>
                        </a>
                    @endif

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

                                        <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                            <strong>Registros Personales</strong>
                                        </h5>
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

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gasolina as $item)
                                                    <tr>
                                                        @if (auth()->user()->chofer == NULL)
                                                        <th><a style="text-decoration: none;"
                                                            href="{{ route('edit_admin.gasolina', $item->id) }}">
                                                            {{ $item->User->name }}</a>
                                                        </th>
                                                        @else
                                                        <th>{{ $item->User->name }}</th>
                                                        @endif

                                                        <td>{{ $item->Automovil->submarca }} /<br> {{ $item->Automovil->placas }}</td>
                                                        <td>{{ $item->estatus }}</td>
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
    </script>

@endsection

@endsection
