@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/customtable.css') }}" rel="stylesheet">
@endsection

@section('content')

    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

    <div class="row bg-down-blue container-res" style="border-radius: 0 0 0 0; ">

        @include('admin.layouts.sidebar')

        <div class="col-12 col-xs-12 col-sm-12 col-lg-12 col-xl-10">

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

        <div class="col-12 col-xs-12 col-sm-12 col-lg-12">

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
                                <div class="col-12">
                                     <table id="expedientes" class="table display nowrap text-white mt-5e" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th data-priority="2">Cliente</th>
                                                <th data-priority="3">Placas</th>
                                                <th data-priority="4">Modelo y Submarca</th>
                                                <th data-priority="5">Año</th>
                                                <th data-priority="6">tanque</th>
                                                <th data-priority="1">Más</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($automovil as $item)
                                                <tr>
                                                    <th>{{ $item->User->name }} / <br> {{ $item->User->telefono }}</th>
                                                    <td>{{ $item->placas }}</td>
                                                    <td>{{ $item->Marca->nombre }} / <br> {{ $item->submarca }}</td>
                                                    <td>{{ $item->año }}</td>
                                                    <td>{{ $item->tanque }}</td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#example{{ $item->id }}">
                                                            <img class="icon-effect"  src="{{ asset('img/icon/white/add.png') }}" width="15px">
                                                        </a>
                                                    </td>
                                                    @include('admin.exp-fisico.modal')
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
                                                <table id="expedientes_empresa" class="table display nowrap text-white mt-5e" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th data-priority="2">Empresa</th>
                                                            <th data-priority="3">Placas</th>
                                                            <th data-priority="5">Modelo y Submarca</th>
                                                            <th data-priority="6">Año</th>
                                                            <th data-priority="7">tanque</th>
                                                            <th data-priority="1">Más</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($automovil2 as $item)
                                                            <tr>
                                                                <th>{{ $item->UserEmpresa->name }}</th>
                                                                <td>{{ $item->placas }}</td>
                                                                <td>{{ $item->Marca->nombre }} / {{ $item->submarca }}<br> </td>
                                                                <td>{{ $item->año }}</td>
                                                                <td>{{ $item->tanque }}</td>
                                                                @include('admin.exp-fisico.model_empresa')
                                                                <td>
                                                                    <a data-toggle="modal" data-target="#example{{ $item->id }}">
                                                                        <img class="icon-effect"  src="{{ asset('img/icon/white/add.png') }}" width="15px"></a>
                                                                </td>
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
            <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                <strong>Expedientes</strong>
            </h5>

            <div class="row">
                    <div class="col-12">
                        <table id="expedientes_empresa" class="table display nowrap text-white mt-5e" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th data-priority="4">Placas</th>
                                    <th data-priority="3">Modelo</th>
                                    <th data-priority="2">Sector</th>
                                    <th data-priority="1">Más</th>
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
        @endif

    </div>


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
            $('#expedientes').DataTable({
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
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                }
            });
        });

        $(document).ready(function() {
            $('#expedientes2').DataTable({
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
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                }
            });
        });

        $(document).ready(function() {
            $('#expedientes_empresa').DataTable({
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
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                }
            });
        });

    </script>

@endsection

@endsection
