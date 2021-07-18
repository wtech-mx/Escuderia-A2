@extends('admin.layouts.app')
@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('content')

    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

    <div class="row bg-image">

        @if (Session::has('success'))
            <script>
                Swal.fire({
                    title: 'Exito!!',
                    html: 'Se ha actualizado tu  <b>Tarjeta de Circulaci&oacute;n</b>, ' +
                        'Exitosamente',
                    // text: 'Se ha agragado la "TC" Exitosamente',
                    imageUrl: '{{ asset('img/icon/color/dosier.png') }}',
                    background: '#fff',
                    imageWidth: 150,
                    imageHeight: 150,
                    imageAlt: 'USUARIO IMG',
                })

            </script>
        @endif

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
                <strong>Tarjetas Circulaci&oacute;n</strong>
            </h5>
        </div>

        <div class="col-2  mt-4 mb-5">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>
    @if (auth()->user()->admin == 0)
        <div class="col-6 mt-5">
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

                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    <a class="text-white mt-3 p-2" href="/exportar/tc">
                                        <i class="fa fa-download icon-effect-sm" aria-hidden="true"></i>
                                    </a>

                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Tarjeta Circulacion</strong>
                                    </h5>
                                </div>
                            </div>

                            @if (Session::has('success'))
                                <script>
                                    Swal.fire(
                                        'Exito!',
                                        'Se ha guardado exitosamente.',
                                        'success'
                                    )

                                </script>
                            @endif



                            <div class="content container-res-max">
                                <div class="col-12 ">

                                    <table id="tc" class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Cliente</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Modelo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tarjeta_circulacion as $item)
                                                <tr>
                                                    @can('Editar Tarjeta C.')
                                                    <th><a style="text-decoration: none;"
                                                        href="{{ route('edit_admin.tarjeta-circulacion', $item->id) }}">
                                                        {{ $item->User->name }}</a>
                                                    </th>
                                                    @endcan
                                                    <th>
                                                        {{ $item->User->name }}
                                                    </th>
                                                    <td>{{ $item->nombre }}</td>
                                                    <td>{{ $item->Automovil->Marca->nombre }}</td>
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

                    <div class="carousel-item">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <a class="text-white mt-3 p-2" href="/exportar/tc/empresa">
                                    <i class="fa fa-download icon-effect-sm" aria-hidden="true"></i>
                                </a>

                                <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                    <strong>Tarjeta Circulacion Empresa</strong>
                                </h5>
                            </div>
                        </div>

                        @if (Session::has('success'))
                            <script>
                                Swal.fire(
                                    'Exito!',
                                    'Se ha guardado exitosamente.',
                                    'success'
                                )

                            </script>
                        @endif


                        <div class="row">
                            <div class="content container-res-max">
                                <div class="col-12 ">
                                    <table id="tc_empresa" class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Cliente</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Modelo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tarjeta_circulacion2 as $item)
                                                <tr>
                                                    @can('Editar Tarjeta C.')
                                                    <th><a style="text-decoration: none;"
                                                            href="{{ route('edit_admin.tarjeta-circulacion', $item->id) }}">
                                                            {{ $item->UserEmpresa->name }}</a>
                                                    </th>
                                                    @else
                                                    <th>
                                                        {{ $item->UserEmpresa->name }}
                                                    </th>
                                                    @endcan
                                                    <td>{{ $item->nombre }}</td>
                                                    <td>{{ $item->Automovil->Marca->nombre }}</td>
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

            <div class="content container-res-max">
                <div class="col-lg-12">
                    <table id="tc_empresa" class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">Cliente</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Modelo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarjeta_circulacion_empresa as $item)
                                <tr>
                                    <th><a style="text-decoration: none;"
                                            href="{{ route('edit_admin.tarjeta-circulacion', $item->id) }}">
                                            {{ $item->UserEmpresa->name }}</a>
                                    </th>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->Automovil->Marca->nombre }}</td>
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
            $('#tc').DataTable();
        });

        $(document).ready(function() {
            $('#tc_empresa').DataTable();
        });

    </script>

@endsection


@endsection
