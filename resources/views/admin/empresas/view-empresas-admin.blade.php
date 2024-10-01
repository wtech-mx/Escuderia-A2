@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/customtable.css') }}" rel="stylesheet">
@endsection

@section('content')


    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

    <div class="row bg-down-blue" style="border-radius: 0 0 0 0;">

        @include('admin.layouts.sidebar')

        <div class="col-12 col-xs-12 col-sm-12 col-lg-12 col-xl-10">

        <div class="d-flex justify-content-between mt-5  mb-5">
                    <div class="text-center text-white">
                        <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                        </a>
                    </div>

                    <h5 class="text-center text-white ml-4 mr-4 ">
                        <strong>Empresas </strong>
                    </h5>

                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                    </div>
            </div>

        <div class="col-12 mt-4 d-inline">
            <div class="d-flex flex-row-reverse">

                <a class="mt-1 ml-5 text-white " href="/exportar/empresas">
                    <i class="fa fa-download icon-effect" aria-hidden="true"></i>
                </a>
            @can('Crear Emp')
            <div class="content">
                <a class="btn btn-circel" href="{{ route('create_admin.empresa') }}">
                    <h5 class="text-white text-tittle-app mt-2 " style="font: normal normal bold 15px/20px Segoe UI">
                        Agregar
                    </h5>
                </a>

                <a class="btn btn-circel" href="{{ route('create_admin.empresa') }}">
                    <img class="" src="{{ asset('img/icon/white/plus.png') }}" width="30px">
                </a>
            </div>
            @endcan

            </div>
        </div>

        <div class="row ml-2 mr-2">

            @if (Session::has('success'))
                <script>
                    Swal.fire(
                        'Exito!',
                        'Se ha guardado exitosamente.',
                        'success'
                    )

                </script>
            @endif

                <div class="col-12 ">
                    <a href="{{ route('descargar.db') }}" class="btn btn-xs mb-3" style="background: #00F936;">Descargar Base de Datos</a>
                    <table id="empresa" class="table display nowrap text-white" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th data-priority="1">Nombre</th>
                                <th data-priority="2">Correo</th>
                                <th data-priority="3">Telefono</th>
                                <th data-priority="4">direccion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresa as $item)
                                <tr>
                                    @can('Editar Emp')
                                    <td><a style="text-decoration: none;"
                                        href="{{ route('edit_admin.empresa', $item->id) }}">{{ $item->name }}</a>
                                    </td>
                                    @else
                                    <td>{{ $item->name }}
                                    </td>
                                    @endcan

                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->telefono }}</td>
                                    <td>{{ $item->direccion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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

@endsection
