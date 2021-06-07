@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')

    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

    <div class="row bg-image">

        @if (Session::has('auto'))
            <script>
                Swal.fire({
                    title: 'Exito!!',
                    html: 'Se ha agragado el <b>VEHICULO</b>, ' +
                        'Exitosamente',
                    // text: 'Se ha agragado la "MARCA" Exitosamente',
                    imageUrl: '{{ asset('img/icon/color/coche (6).png') }}',
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
                <strong>Veh&iacute;culos</strong>
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

        <div class="col-6 mt-4 d-inline">

            <h5 class="text-white text-tittle-app mr-3 d-inline" style="font: normal normal bold 15px/20px Segoe UI">
                Agregar
            </h5>

            <a class="btn" href="{{ route('create_admin.automovil') }}">
                <i class="fas fa-plus-circle icon-effect"></i>
            </a>
        </div>

        <div class="col-12">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="90000">

                <div class="carousel-inner">

                    {{-- -------------------------------------------------------------------------- --}}
                    {{-- |Vehculos de user --}}
                    {{-- |-------------------------------------------------------------------------- --}}

                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    <a class="text-white mt-3 p-2" href="/exportar">
                                        <i class="fa fa-download icon-effect-sm" aria-hidden="true"></i>
                                    </a>

                                    <h5 class="text-center text-white mt-4 p-2">
                                        <strong>Veh&iacute;culos Personales</strong>
                                    </h5>
                                </div>

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
                                <div class="col-12">

                                    <table id="automoviles" class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Cliente</th>
                                                <th scope="col">Placas</th>
                                                <th scope="col">Submarca</th>
                                                <th scope="col">Año</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($automovil as $item)
                                                <tr>
                                                    <th><a
                                                            href="{{ route('edit_admin.automovil', $item->id) }}">{{ $item->User->name }}</a>
                                                    </th>
                                                    <td>{{ $item->placas }}</td>
                                                    <td>{{ $item->submarca }}</td>
                                                    <td>{{ $item->año }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        {{-- {{ $automovil->render() }} --}}

                    </div>

                    {{-- -------------------------------------------------------------------------- --}}
                    {{-- |Vehculos de empresa --}}
                    {{-- |-------------------------------------------------------------------------- --}}

                    <div class="carousel-item ">

                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <a class="text-white mt-3 p-2" href="/export_empresa">
                                    <i class="fa fa-download icon-effect-sm" aria-hidden="true"></i>
                                </a>

                                <h5 class="text-center text-white mt-4 p-2">
                                    <strong>Veh&iacute;culos Empresas</strong>
                                </h5>
                            </div>

                        </div>

                        <div class="row">

                            <div class="content container-res-inter">
                                <div class="col-12 mt-4">
                                    @foreach ($automovil2 as $item)
                                        <div class="card card-slide-garaje mt-3">
                                            <div class="card-body p-2">
                                                <div class="row ">
                                                    <div class="col-6 mt-3 ">
                                                        <a class="card-text"
                                                            href="{{ route('edit_admin.automovil', $item->id) }}"><strong
                                                                style="font: normal normal bold 20px/27px Segoe UI;">{{ $item->Empresa->nombre }}</strong></a>

                                                        <div class="d-flex justify-content-start">
                                                            <p class="text-center"><strong>Submarca:
                                                                </strong>{{ $item->submarca }}</p>
                                                            <br>
                                                            <p class="text-center"><strong>- Tipo:
                                                                    -</strong>{{ $item->tipo }}</p>
                                                        </div>

                                                        <div class="d-flex justify-content-start">
                                                            <p class="text-center"><strong> Año:
                                                                </strong>{{ $item->año }}</p>
                                                            <br>
                                                            <p class="text-center"><strong> Placas:
                                                                </strong>{{ $item->placas }}</p>
                                                        </div>

                                                        <p class="card-text" style="font-size: 12px"><strong>KM Recorridos:
                                                            </strong> {{ $item->kilometraje }} KM</p>
                                                    </div>

                                                    @if ($item->img == null)
                                                        <div class="col-6">
                                                            <img class="d-inline mb-2"
                                                                src="{{ asset('img/icon/car.png') }}" width="150px">
                                                        </div>
                                                    @else
                                                        <div class="col-6">
                                                            <img class="d-inline mb-2"
                                                                src="{{ asset('img-auto/' . $item->img) }}"
                                                                width="150px">
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
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
            $('#automoviles').DataTable();
        });

    </script>

@endsection

@endsection
