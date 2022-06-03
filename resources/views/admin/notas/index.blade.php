@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/customtable.css') }}" rel="stylesheet">
@endsection

@section('content')

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <div class="row bg-down-image-border">

        @include('admin.layouts.sidebar')

        <div class="col-12 col-xs-12 col-sm-12 col-lg-12 col-xl-10">

         <div class="d-flex justify-content-between mt-5  mb-5">
                    <div class="text-center text-white">
                        <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                        </a>
                    </div>

                    <h5 class="text-center text-white ml-4 mr-4 ">
                        <strong>Notas</strong>
                    </h5>

                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                    </div>
         </div>


                <div class="col-12">

                    @can('Crear Notas')
                    <div class="d-flex flex-row-reverse">
                        <div class="mt-5 mb-2">
                            <a class="btn " data-toggle="modal" data-target="#modalNotas">
                                <i class="fa fa-plus-circle icon-effect-sm" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    @endcan

                    <div class="table-responsive">
                            <table id="notas" class="table display nowrap text-white" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th data-priority="2">Usuario</th>
                                        <th data-priority="3">Nota</th>
                                        <th data-priority="1">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notas as $item)
                                        @php
                                            $recorte = substr($item->nota, 0, 15);
                                        @endphp
                                        <tr>
                                            <td>{{ $item->User->name }}</td>
                                            <td>{{ $recorte }}...</td>
                                            <td>
                                                @can('Editar Notas')
                                                <a type="button" class="btn text-white" data-toggle="modal"
                                                    data-target="#modalNotasUpdate{{ $item->id }}"
                                                    style="background: transparent !important;">
                                                    <i class="fas fa-edit icon-users-edit" style="font-size: 15px;"></i>
                                                </a>
                                                @endcan
                                                @can('Eliminar Notas')
                                                    <a type="button" class="btn text-white" data-toggle="modal"
                                                    data-target="#modal-{{ $item->id }}">
                                                    <i class="fas fa-trash icon-users-edit" style="font-size: 15px;"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                            @include('admin.notas.update')
                                            @include('admin.notas.destroy')
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        @include('admin.notas.modal')
                    </div>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#notas').DataTable({
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
