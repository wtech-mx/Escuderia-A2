@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/customtable.css') }}" rel="stylesheet">
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


        @include('admin.layouts.sidebar')

        <div class="col-12 col-xs-12 col-sm-12 col-lg-12 col-xl-10">

            <div class="d-flex justify-content-between mt-5  mb-5">
                    <div class="text-center text-white">
                        <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                        </a>
                    </div>

                    <h5 class="text-center text-white ml-4 mr-4 ">
                        <strong>Vehiculos </strong>
                    </h5>

                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                    </div>
            </div>

            <div class="d-flex justify-content-between mt-5  mb-5">

                @if (auth()->user()->role == 1)
                <div class="div">
                    <a class="btn mb-3 mr-1" href="#carouselExampleControls" role="button" data-slide="prev">
                        <img class="" src="{{ asset('img/icon/white/flecha-izquierda.png') }}" width="25px">
                    </a>

                    <a class="btn mb-3 " href="#carouselExampleControls" role="button" data-slide="next">
                        <img class="" src="{{ asset('img/icon/white/flecha-correcta.png') }}" width="25px">
                    </a>
                </div>

                 @can('Crear Automovil')
                <a class="btn" href="{{ route('create_admin.automovil') }}">
                       Agregar<i class="fas fa-plus-circle icon-effect"></i>
                </a>
                @endcan
                @endif
            </div>

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
                                    <a class="text-white mt-3 p-2" href="/exportar/automovil">
                                        <i class="fa fa-download icon-effect-sm" aria-hidden="true"></i>
                                    </a>

                                    <h5 class="text-center text-white mt-4 p-2">
                                        <strong>Veh&iacute;culos Personales</strong>
                                    </h5>
                                </div>

                            </div>
                        </div>

                        <div class="row">

                                <div class="col-lg-12">
                                    <table id="automoviles" class="table display nowrap text-white mt-5e" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">Cliente</th>
                                                <th data-priority="2">Placas</th>
                                                <th data-priority="3">Modelo</th>
                                                <th data-priority="4">Submarca</th>
                                                <th data-priority="5">Año</th>
                                                <th data-priority="6">tipo </th>
                                                <th data-priority="7">subtipo</th>
                                                <th data-priority="8">numero_serie</th>
                                                <th data-priority="9">kilometraje</th>
                                                <th data-priority="10">tanque</th>
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
                                                    <td>{{ $item->tipo }}</td>
                                                    <td>{{ $item->subtipo }}</td>
                                                    <td>{{ $item->numero_serie }}</td>
                                                    <td>{{ $item->kilometraje }}</td>
                                                    <td>{{ $item->tanque }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                        </div>
                        {{-- {{ $automovil->render() }} --}}
                    </div>
                    {{-- -------------------------------------------------------------------------- --}}
                    {{-- |Vehculos de empresa --}}
                    {{-- |-------------------------------------------------------------------------- --}}
                    <div class="carousel-item ">
                        <div class="row">
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
                        </div>

                        <div class="row">
                                <div class="col-lg-12">
                                    <table id="automoviles_empresas" class="table display nowrap text-white mt-5e" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">Empresa</th>
                                                <th data-priority="2">Placas</th>
                                                <th data-priority="3">Modelo</th>
                                                <th data-priority="4">Submarca</th>
                                                <th data-priority="5">Año</th>
                                                <th data-priority="6">tipo </th>
                                                <th data-priority="7">subtipo</th>
                                                <th data-priority="8">numero_serie</th>
                                                <th data-priority="9">kilometraje</th>
                                                <th data-priority="10">tanque</th>
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
                                                    <td>{{ $item->tipo }}</td>
                                                    <td>{{ $item->subtipo }}</td>
                                                    <td>{{ $item->numero_serie }}</td>
                                                    <td>{{ $item->kilometraje }}</td>
                                                    <td>{{ $item->tanque }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>

                    </div>

                </div>

            </div>
            @else
                <div class="row">

                    <div class="content container-res-max">
                        <div class="col-lg-12">
                            <table id="empresa" class="table display nowrap text-white mt-5e" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Placas</th>
                                        <th data-priority="2">Modelo</th>
                                        <th data-priority="3">Submarca</th>
                                        @if (auth()->user()->empresa == 0)
                                            <th data-priority="4">Año</th>
                                        @else
                                            <th data-priority="4">Sector</th>
                                        @endif
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
                                            @if (auth()->user()->empresa == 0)
                                                <td>{{ $item->año }}</td>
                                            @else
                                                <td>{{ $item->Sectores->sector }}</td>
                                            @endif
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

    </div>

    @endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

     <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>


     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <script>

        $(document).ready(function() {
            $('#automoviles').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'excel',
                    'pdf',
                    'colvis'
                ],
                responsive: true,
                columnDefs: [
                    // {targets: -1, visible: false},
                    { responsivePriority: 1 , },
                    { responsivePriority: 2 , },
                    { responsivePriority: 3 , },
                    { responsivePriority: 4 , },
                    { responsivePriority: 5 , },
                    { responsivePriority: 6 , },
                    { responsivePriority: 7 , },
                    { responsivePriority: 8 , },
                    { responsivePriority: 9 , },
                    { responsivePriority: 10 , },
                ],

                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                }
            });

        });

        $(document).ready(function() {
            $('#automoviles_empresas').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'excel',
                    'pdf',
                    'colvis'
                ],
                responsive: true,
                columnDefs: [
                    // {targets: -1, visible: false},
                    { responsivePriority: 1 , },
                    { responsivePriority: 2 , },
                    { responsivePriority: 3 , },
                    { responsivePriority: 4 , },
                    { responsivePriority: 5 , },
                    { responsivePriority: 6 , },
                    { responsivePriority: 7 , },
                    { responsivePriority: 8 , },
                    { responsivePriority: 9 , },
                    { responsivePriority: 10 , },
                ],

                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                }
            });

        });

        $(document).ready(function() {
            $('#empresa').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'excel',
                    'pdf',
                    'colvis'
                ],
                responsive: true,
                columnDefs: [
                    // {targets: -1, visible: false},
                    { responsivePriority: 1 , },
                    { responsivePriority: 2 , },
                    { responsivePriority: 3 , },
                    { responsivePriority: 4 , },
                ],

                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                }
            });

        });

    </script>

@endsection
