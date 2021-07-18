@extends('admin.layouts.app')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.8/css/responsive.bootstrap5.min.css" rel="stylesheet">
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

        @if (auth()->user()->role == 1)
        <div class="col-6 mt-4">
            <a class="btn mb-3 mr-1" href="#carouselExampleControls" role="button" data-slide="prev">
                <img class="" src="{{ asset('img/icon/white/flecha-izquierda.png') }}" width="25px">
            </a>

            <a class="btn mb-3 " href="#carouselExampleControls" role="button" data-slide="next">
                <img class="" src="{{ asset('img/icon/white/flecha-correcta.png') }}" width="25px">
            </a>
        </div>
        @endif

        <div class="col-6 mt-4 ">

            @can('Crear Automovil')
            <h5 class="text-white text-tittle-app mr-3 d-inline" style="font: normal normal bold 15px/20px Segoe UI">
                Agregar
            </h5>
            @endcan

            <a class="btn" href="{{ route('create_admin.automovil') }}">
                <i class="fas fa-plus-circle icon-effect"></i>
            </a>
        </div>

        <div class="col-12">

            @if (auth()->user()->empresa == 0)
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
                                <div class="col-lg-12">

                                    <table id="automoviles" class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Cliente</th>
                                                <th scope="col">Placas</th>
                                                <th scope="col">Modelo</th>
                                                <th scope="col">Submarca</th>
                                                <th scope="col">Año</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($automovil as $item)
                                                <tr>
                                                    @can('Edit Automovil')
                                                    <th><a style="text-decoration: none;"
                                                            href="{{ route('edit_admin.automovil', $item->id) }}">{{ $item->User->name }}</a>
                                                    </th>
                                                    @else
                                                    <th>{{ $item->User->name }} </th>
                                                    @endcan
                                                    <td>{{ $item->placas }}</td>
                                                    <td>{{ $item->Marca->nombre }}</td>
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

                            <div class="content container-res-max">
                                <div class="col-lg-12">

                                    <table id="automoviles_empresas" class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Empresa</th>
                                                <th scope="col">Placas</th>
                                                <th scope="col">Modelo</th>
                                                <th scope="col">Submarca</th>
                                                <th scope="col">Año</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($automovil2 as $item)
                                                <tr>
                                                    @can('Edit Automovil')
                                                    <th><a style="text-decoration: none;"
                                                            href="{{ route('edit_admin.automovil', $item->id) }}">{{ $item->UserEmpresa->name }}</a>
                                                    </th>
                                                    @else
                                                    <th>{{ $item->UserEmpresa->name }} </th>
                                                    @endcan
                                                    <td>{{ $item->placas }}</td>
                                                    <td>{{ $item->Marca->nombre }}</td>
                                                    <td>{{ $item->submarca }}</td>
                                                    <td>{{ $item->año }}</td>
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
            @else
                <div class="row">

                    <div class="content container-res-max">
                        <div class="col-lg-12">

                            <table id="empresa" class="table text-white">
                                <thead>
                                    <tr>
                                        <th scope="col">Placas</th>
                                        <th scope="col">Modelo</th>
                                        <th scope="col">Submarca</th>
                                        <th scope="col">Año</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($automovil_empresa as $item)
                                        <tr>
                                            <td><a style="text-decoration: none;"
                                                href="{{ route('edit_admin.automovil', $item->id) }}">{{ $item->placas }}</a>
                                            </td>
                                            <td>{{ $item->Marca->nombre }}</td>
                                            <td>{{ $item->submarca }}</td>
                                            <td>{{ $item->año }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            @endif


        </div>

    </div>

@section('js')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js|https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/responsive.bootstrap4.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('#automoviles').DataTable({
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'Detalles de ' + data[0] + ' ' + data[1];
                            }
                        }),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                            tableClass: 'table'
                        })
                    }
                }
            });
        });

        $(document).ready(function() {
            $('#automoviles_empresas').DataTable({
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'Detalles de ' + data[0] + ' ' + data[1];
                            }
                        }),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                            tableClass: 'table'
                        })
                    }
                }
            });
        });

        $(document).ready(function() {
            $('#empresa').DataTable();
        });

    </script>

@endsection

@endsection
