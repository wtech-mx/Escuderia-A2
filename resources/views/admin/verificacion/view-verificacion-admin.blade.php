@extends('admin.layouts.app')
@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/customtable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">
@endsection
@section('content')

    <div class="row bg-image">

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
                        <strong>Verificaci&oacute;n</strong>
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
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                    <div class="carousel-inner">

                        {{-- -------------------------------------------------------------------------- --}}
                        {{-- |Vehculos de user --}}
                        {{-- |-------------------------------------------------------------------------- --}}

                        <div class="carousel-item active">
                            <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                <strong>Verificaciones Personales</strong>
                            </h5>

                            <div class="row">
                                    <div class="col-12 mt-4">

                                        <table id="verificacion" class="table display nowrap text-white" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th data-priority="1">Cliente</th>
                                                    <th data-priority="2">Submarca</th>
                                                    <th data-priority="3">Placas</th>
                                                    <th data-priority="4">primer_semestre </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($verificacion_user as $item)
                                                    <tr>
                                                        @can('Editar Veri')
                                                        <th><a style="text-decoration: none;"
                                                            href="{{ route('edit_admin.verificacion', $item->id) }}">
                                                            {{ $item->User->name }}</a>
                                                        </th>
                                                        @endcan
                                                        <td>{{ $item->Automovil->submarca }}</td>
                                                        <td>{{ $item->Automovil->placas }}</td>
                                                        <td>{{ $item->primer_semestre }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                            </div>

                        </div>

                        {{-- -------------------------------------------------------------------------- --}}
                        {{-- |Vehculos de empresa --}}
                        {{-- |-------------------------------------------------------------------------- --}}

                        <div class="carousel-item ">

                            <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                <strong>Verificación Empresas</strong>
                            </h5>

                            <div class="row">
                                    <div class="col-12 mt-4">
                                    <table id="verificacion_empresa" class="table display nowrap text-white" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">Cliente</th>
                                                <th data-priority="2">Submarca</th>
                                                <th data-priority="3">Placas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($verificacion_empresa as $item)
                                                <tr>
                                                    @can('Editar Veri')
                                                    <th><a style="text-decoration: none;"
                                                            href="{{ route('edit_admin.verificacion', $item->id) }}">
                                                            {{ $item->UserEmpresa->name }}</a>
                                                    </th>
                                                    @endcan

                                                    <td>{{ $item->Automovil->submarca }}</td>
                                                    <td>{{ $item->Automovil->placas }}</td>
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
                    <div class="col-12 mt-4">
                        <table id="verificacion" class="table display nowrap text-white" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th data-priority="1">Submarca</th>
                                    <th data-priority="2">Placas</th>
                                    <th data-priority="3">Sector</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($verificacion_empresas as $item)
                                    <tr>
                                        <th><a style="text-decoration: none;"
                                                href="{{ route('edit_admin.verificacion', $item->id) }}">
                                                {{ $item->Automovil->submarca }}</a>
                                        </th>
                                        <td>{{ $item->Automovil->placas }}</td>
                                        <td>{{ $item->Sectores->sector }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        @endif

        </div>
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
            $('#verificacion').DataTable({
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

        $(document).ready(function() {
            $('#verificacion_empresa').DataTable({
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
                ],

                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                }
            });
        });

    </script>

@endsection
@endsection
