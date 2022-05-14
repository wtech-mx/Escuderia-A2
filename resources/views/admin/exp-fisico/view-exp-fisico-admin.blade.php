@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')

    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

    <div class="row bg-down-blue container-res" style="border-radius: 0 0 0 0; ">

        @include('admin.layouts.sidebar')

        <div class="col-10">

         <div class="d-flex justify-content-between mt-5  mb-5">
                    <div class="text-center text-white">
                        <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                        </a>
                    </div>

                    <h5 class="text-center text-white ml-4 mr-4 ">
                        <strong>Expediente F&iacute;sico </strong>
                    </h5>

                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                    </div>
            </div>

        @if (auth()->user()->empresa == 0)

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
                                                <th scope="col"><p class="d-none d-md-block">Telefono</p></th>
                                                <th scope="col">Placas</th>
                                                <th scope="col">Modelo</th>
                                                <th scope="col" class="hidden_cont"><p class="d-none d-md-block">Submarca</p></th>
                                                <th scope="col" class="hidden_cont"><p class="d-none d-md-block">Año</p></th>
                                                <th scope="col" class="hidden_cont" ><p class="d-none d-md-block">tanque</p></th>
                                                <th scope="col" class="hidden_cont">Más</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($automovil as $item)
                                                <tr>
                                                    <th>{{ $item->User->name }}</th>
                                                    <td><p class="d-none d-md-block">{{ $item->User->telefono }}</p></td>
                                                    <td>{{ $item->placas }}</td>
                                                    <td>{{ $item->Marca->nombre }}</td>
                                                    <td class="hidden_cont"><p class="d-none d-md-block">{{ $item->submarca }}</p></td>
                                                    <td class="hidden_cont"><p class="d-none d-md-block">{{ $item->año }}</p></td>
                                                    <td class="hidden_cont"><p class="d-none d-md-block">{{ $item->tanque }}</p></td>
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
                        <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                            <strong>Expediente Empresas</strong>
                        </h5>
                        <div class="row">
                            <div class="col-12">

                                    <div class="row">
                                        <div class="content container-res-max">
                                            <div class="col-12">

                                                <table id="expedientes_empresa" class="table text-white">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Empresa</th>
                                                            <th scope="col">Placas</th>
                                                            <th scope="col">Modelo</th>
                                                            <th scope="col"><p class="d-none d-md-block">Submarca</p></th>
                                                            <th scope="col"><p class="d-none d-md-block">Año</p></th>
                                                            <th scope="col" ><p class="d-none d-md-block">tanque</p></th>
                                                            <th scope="col">Más</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($automovil2 as $item)
                                                            <tr>
                                                                <th>{{ $item->UserEmpresa->name }}</th>
                                                                <td>{{ $item->placas }}</td>
                                                                <td>{{ $item->Marca->nombre }}</td>
                                                                <td><p class="d-none d-md-block">{{ $item->submarca }}</p></td>
                                                                <td><p class="d-none d-md-block">{{ $item->año }}</p></td>
                                                                <td><p class="d-none d-md-block">{{ $item->tanque }}</p></td>
                                                                <td>
                                                                    <a data-toggle="modal" data-target="#example{{ $item->id }}">
                                                                        <img class="icon-effect"  src="{{ asset('img/icon/white/add.png') }}" width="15px"></a>
                                                                </td>
                                                                @include('admin.exp-fisico.model_empresa')
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


        </div>
        @else
            <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                <strong>Expedientes</strong>
            </h5>

            <div class="row">
                <div class="content container-res-max">
                    <div class="col-12">

                        <table id="expedientes" class="table text-white">
                            <thead>
                                <tr>
                                    <th scope="col">Placas</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Sector</th>
                                    <th scope="col">Más</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($automovil_empresa as $item)
                                    <tr>
                                        <td>{{ $item->placas }}</td>
                                        <td>{{ $item->Marca->nombre }}</td>
                                        <td>{{ $item->Sectores->sector }}</td>
                                        <td>
                                            <a data-toggle="modal" data-target="#example{{ $item->id }}">
                                                <img class="icon-effect"  src="{{ asset('img/icon/white/add.png') }}" width="15px"></a>
                                        </td>
                                        @include('admin.exp-fisico.model_empresa')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        @endif

    </div>


@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#expedientes').DataTable();
        });

        $(document).ready(function() {
            $('#expedientes_empresa').DataTable();
        });

    </script>

@endsection

@endsection
