@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/customtable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">
@endsection

@section('content')

@php
    if(auth()->user()->empresa == 0){
        $usuarios = $user;
    }else{
        $usuarios = $users_sector;
    }
@endphp

    <div class="row bg-image">

         @include('admin.user.sector')

        @if (Session::has('success'))
            <script>
                Swal.fire(
                    'Exito!',
                    'Se ha guardado exitosamiente.',
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
                        <strong>Usuarios </strong>
                    </h5>

                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                    </div>
                </div>

                <div class="d-flex justify-content-between ">

                    <a class="mt-1 ml-5 text-white " href="/exportar/usuarios">
                        <i class="fa fa-download icon-effect" aria-hidden="true"></i>
                    </a>
                    {{-- @can('create_admin') --}}
                    <div class="content">
                        <a class="btn btn-circel" href="{{ route('create_admin.user') }}">
                            <i class="fas fa-plus-circle icon-effect"></i>
                        </a>
                        <a class="btn btn-circel" href="{{ route('create_admin.user') }}">
                            <h5 class="text-white text-tittle-app  mt-2 " style="font: normal normal bold 15px/20px Segoe UI">
                                Agregar
                            </h5>
                        </a>
                    </div>
                    {{-- @endcan --}}

                    @if (auth()->user()->empresa == 1 && auth()->user()->id_sector == NULL)
                        <div class="content">
                            <a type="button" class="btn" data-toggle="modal" data-target="#exampleModal"
                                style="background: transparent !important;" src>
                                <img class="" src="{{ asset('img/icon/white/sector.png') }}" width="25px">
                            </a>

                            <a type="button" class="btn" data-toggle="modal" data-target="#exampleModal"
                            style="background: transparent !important;">
                                <h5 class="text-white text-tittle-app  mt-2 " style="font: normal normal bold 15px/20px Segoe UI">
                                    Sector
                                </h5>
                            </a>
                        </div>
                    @endif
                </div>

                    <table id="usuarios" class="table display nowrap text-white mt-5e" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th data-priority="1">Nombre</th>
                                <th data-priority="2">Correo</th>
                                @if (auth()->user()->empresa == 0)
                                    <th data-priority="3">Telefono</th>
                                @else
                                    <th data-priority="4">Sector</th>
                                    <th data-priority="5">Chofer</th>
                                @endif
                                <th data-priority="6"> fecha_nacimiento </th>
                                <th data-priority="7"> direccion </th>
                                <th data-priority="8"> referencia </th>
                                <th data-priority="9"> genero </th>
                                <th data-priority="10"> direccion </th>

                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($usuarios as $item)
                            @php
                                $fechaEntera = strtotime($item->updated_at);
                                $anio = date('Y', $fechaEntera);
                                $mes = date('m', $fechaEntera);
                                $dia = date('d', $fechaEntera);
                            @endphp
                                <tr>
                                    @can('Editar Usuario')
                                        <td><a style="text-decoration: none;"
                                            href="{{ route('edit_admin.user', $item->id) }}">{{ $item->name }}</a>
                                        </td>
                                        @else
                                        <td>{{ $item->name }}</td>
                                    @endcan

                                    <td>{{ $item->email }}</td>
                                    @if (auth()->user()->empresa == 0)
                                        <td>{{ $item->telefono }}</td>
                                    @else
                                        <td>{{ $item->Sectores->sector }}</td>

                                        @if ($item->chofer == NULL)
                                        <td>No</td>
                                        @else
                                        <td>Si</td>
                                        @endif
                                    @endif

                                        <td> {{ $item->fecha_nacimiento }}</td>
                                        <td> {{ $item->direccion }}</td>
                                        <td> {{ $item->referencia }}</td>
                                        <td> {{ $item->genero }}</td>
                                        <td> {{ $item->direccion }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

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
            $('#usuarios').DataTable({
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
