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
                            <strong>Licencia de Conducir </strong>
                        </h5>

                        <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                            <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                        </div>
            </div>

                <div class="col-12">
                    <table id="licencia" class="table display nowrap text-white" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th data-priority="1">Cliente</th>
                                <th data-priority="1">Tipo</th>
                                <th data-priority="3">Expedicion</th>
                                <th data-priority="4">antiguedad </th>
                                <th data-priority="5">vigencia </th>
                                <th data-priority="6">nacionalidad </th>
                                <th data-priority="7">rfc </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($licencia as $item)
                                <tr>
                                    @can('Editar Licencia de Conducir')
                                        <th><a style="text-decoration: none;"
                                            href="{{ route('edit_admin.licencia', $item->id) }}">
                                            {{ $item->User->name }}</a>
                                        </th>
                                    @else
                                        <th>{{ $item->User->name }}</th>
                                    @endcan
                                        <td>{{ $item->tipo }}</td>
                                        <td>{{ $item->expedicion }}</td>
                                        <td>{{ $item->antiguedad }}  </td>
                                        <td>{{ $item->vigencia }}  </td>
                                        <td>{{ $item->nacionalidad }}  </td>
                                        <td>{{ $item->rfc }}  </td>
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
            $('#licencia').DataTable({
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
