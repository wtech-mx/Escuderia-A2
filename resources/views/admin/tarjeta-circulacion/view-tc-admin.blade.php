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

        @include('admin.layouts.sidebar')
        <div class="col-12 col-xs-12 col-sm-12 col-lg-12 col-xl-10">

        <div class="d-flex justify-content-between mt-5  mb-5">
                    <div class="text-center text-white">
                        <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                        </a>
                    </div>

                    <h5 class="text-center text-white ml-4 mr-4 ">
                        <strong>Tarjetas Circulaci&oacute;n </strong>
                    </h5>

                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                    </div>
        </div>

            @if (auth()->user()->empresa == 0)
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
                                <div class="row">
                                    <div class="col-12 ">
                                        <table id="tc" class="table display nowrap text-white mt-5e" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th data-priority="1">Cliente</th>
                                                    <th data-priority="2">Nombre</th>
                                                    <th data-priority="3">Modelo</th>
                                                    <th data-priority="4">tipo_placa </th>
                                                    <th data-priority="5">lugar_expedicion </th>
                                                    <th data-priority="6">fecha_emision </th>
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
                                                        @else
                                                        <th>{{ $item->User->name }}</th>
                                                        @endcan
                                                        <td>{{ $item->nombre }}</td>
                                                        <td>{{ $item->Automovil->Marca->nombre }}</td>
                                                        <td> {{ $item->tipo_placa }}  </td>
                                                        <td> {{ $item->lugar_expedicion }}  </td>
                                                        <td> {{ $item->fecha_emision }}  </td>
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
                                <div class="col-12 ">
                                    <table id="tc_empresa" class="table display nowrap text-white mt-5e" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">Cliente</th>
                                                <th data-priority="2">Empresa</th>
                                                <th data-priority="3">Modelo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tarjeta_circulacion2 as $item)
                                                <tr>
                                                    @can('Editar Tarjeta C.')
                                                    <th>
                                                        <a style="text-decoration: none;" href="{{ route('edit_admin.tarjeta-circulacion', $item->id) }}">
                                                            {{ $item->UserEmpresa->name }}
                                                        </a>
                                                    </th>
                                                   @endcan
                                                    <th>{{ $item->UserEmpresa->name }}</th>

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
     @else
        <div class="row">
                <div class="col-lg-12">
                    <table id="tc_empresa" class="table display nowrap text-white mt-5e" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th data-priority="1">Cliente</th>
                                <th data-priority="2">Nombre</th>
                                <th data-priority="3">Sector</th>
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
                                    <td>{{ $item->Sectores->sector }}</td>

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
            $('#tc').DataTable({
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
            $('#tc_empresa').DataTable({
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

    </script>

@endsection


@endsection
