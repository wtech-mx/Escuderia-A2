@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')

    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

    <div class="row bg-down-blue container-res" style="border-radius: 0 0 0 0; ">

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
                <strong>Expediente F&iacute;sico</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="col-6 mt-4">
            <a class="btn mb-3 mr-1" href="#carouselExampleControls" role="button" data-slide="prev">
                <img class="" src="{{ asset('img/icon/white/flecha-izquierda.png') }}" width="25px">
            </a>

            <a class="btn mb-3 " href="#carouselExampleControls" role="button" data-slide="next">
                <img class="" src="{{ asset('img/icon/white/flecha-correcta.png') }}" width="25px">
            </a>
        </div>

        <div class="col-12">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="90000">
                <div class="carousel-inner">

                    {{-- -------------------------------------------------------------------------- --}}
                    {{-- |Vehculos de user --}}
                    {{-- |-------------------------------------------------------------------------- --}}

                    <div class="carousel-item active">
                        <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                            <strong>Expediente de personas</strong>
                        </h5>

                        <div class="row">
                            <div class="content container-res-max">
                                <div class="col-12">

                                    <table id="expedientes" class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Cliente</th>
                                                <th scope="col">Placas</th>
                                                <th scope="col">Modelo</th>
                                                <th scope="col">Más</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($automovil as $item)
                                                <tr>
                                                    <th>{{ $item->User->name }}</th>
                                                    <td>{{ $item->placas }}</td>
                                                    <td>{{ $item->Marca->nombre }}</td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#example{{ $item->id }}">
                                                            <img class="icon-effect"  src="{{ asset('img/icon/white/add.png') }}" width="15px"></a>
                                                    </td>
                                                    @include('admin.exp-fisico.modal')
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- ----------------------------------------------------------------------------}}
                    {{-- |Vehculos de empresa--}}
                    {{-- |----------------------------------------------------------------------------}}

                    <div class="carousel-item ">
                        <div class="row">
                            <div class="col-12">

                                <div class="d-flex justify-content-center">
                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Expediente Empresas</strong>
                                    </h5>

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
            $('#expedientes').DataTable();
        });

    </script>

@endsection

@endsection
