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
                <strong>Seguros</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
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
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                    <div class="carousel-inner">

                        {{-- -------------------------------------------------------------------------- --}}
                        {{-- |Vehculos de user --}}
                        {{-- |-------------------------------------------------------------------------- --}}

                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-center">
                                        <a class="text-white mt-3 p-2" href="/exportar/seguro">
                                            <i class="fa fa-download icon-effect-sm" aria-hidden="true"></i>
                                        </a>

                                        <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                            <strong>Seguros Personales</strong>
                                        </h5>
                                    </div>
                                </div>

                                <div class="content container-res-max">
                                    <div class="col-12">

                                        <table id="seguro" class="table text-white">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Cliente</th>
                                                    <th scope="col">Submarca</th>
                                                    <th scope="col">Seguro</th>
                                                    <th scope="col" class="hidden_cont" ><p class="d-none d-md-block"> fecha_expedicion </p></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($seguros as $item)
                                                    <tr>
                                                        @can('Editar Seguro')
                                                        <th><a style="text-decoration: none;"
                                                            href="{{ route('edit_admin.seguro', $item->id) }}">
                                                            {{ $item->User->name }}</a>
                                                        </th>
                                                        @else
                                                        <th>
                                                            {{ $item->User->name }}
                                                        </th>
                                                        @endcan

                                                        <td>{{ $item->Automovil->submarca }}</td>
                                                        <td>{{ $item->seguro }}</td>
                                                        <td class="hidden_cont"><p class="d-none d-md-block"> {{ $item->fecha_expedicion }} </p> </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>

                        </div>

                        {{-- -------------------------------------------------------------------------- --}}
                        {{-- |Vehculos de empresa --}}
                        {{-- |-------------------------------------------------------------------------- --}}

                        <div class="carousel-item ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-center">
                                        <a class="text-white mt-3 p-2" href="/exportar/seguro/empresa">
                                            <i class="fa fa-download icon-effect-sm" aria-hidden="true"></i>
                                        </a>

                                        <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                            <strong>Seguros Empresas</strong>
                                        </h5>
                                    </div>
                                </div>

                                <div class="content container-res-max">
                                    <div class="col-12 mt-4">
                                        <table id="seguro_empresa" class="table text-white">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Cliente</th>
                                                    <th scope="col">Submarca</th>
                                                    <th scope="col">Seguro</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($seguros2 as $item)
                                                    <tr>
                                                        @can('Editar Seguro')
                                                        <th><a style="text-decoration: none;"
                                                                href="{{ route('edit_admin.seguro', $item->id) }}">
                                                                {{ $item->UserEmpresa->name }}</a>
                                                        </th>
                                                        @else
                                                        <th>
                                                            {{ $item->UserEmpresa->name }}
                                                        </th>
                                                        @endcan
                                                        <td>{{ $item->Automovil->submarca }}</td>
                                                        <td>{{ $item->seguro }}</td>
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
        @else
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <a class="text-white mt-4 p-2 " href="/exportar/seguro">
                            <i class="fa fa-download icon-effect-sm" aria-hidden="true"></i>
                        </a>

                        <h5 class="text-center text-white mt-5 ml-4 mr-4 ">
                            <strong>Seguros Empresa</strong>
                        </h5>
                    </div>
                </div>

                <div class="content container-res-max">
                    <div class="col-12">

                        <table id="seguro" class="table text-white">
                            <thead>
                                <tr>
                                    <th scope="col">Submarca</th>
                                    <th scope="col">Seguro</th>
                                    <th scope="col">Sector</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seguros_empresa as $item)
                                    <tr>
                                        <th><a style="text-decoration: none;"
                                                href="{{ route('edit_admin.seguro', $item->id) }}">
                                                {{ $item->Automovil->submarca }}</a>
                                        </th>
                                        <td>{{ $item->seguro }}</td>
                                        <td>{{ $item->Sectores->sector }}</td>
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
            $('#seguro').DataTable();
        });

        $(document).ready(function() {
            $('#seguro_empresa').DataTable();
        });
    </script>

@endsection

@endsection
