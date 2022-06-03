@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/customtable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gauge.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.3/venobox.min.css" />
@endsection

@section('content')

    <div class="row bg-image">

         @include('admin.layouts.sidebar')

        <div class="col-12 col-xs-12 col-sm-12 col-lg-12 col-xl-10">

        <div class="d-flex justify-content-between mt-5  mb-5">
                    <div class="text-center text-white">
                        <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                        </a>
                    </div>

                    <h5 class="text-center text-white ml-4 mr-4 ">
                        <strong>Gasolina</strong>
                    </h5>

                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                    </div>
        </div>

        <div class="d-flex flex-row-reverse">
            <div class="p-2">

                <div class="content">
                    @if (auth()->user()->chofer == 1)
                    <a class="btn btn-circel" href="{{ route('create.gasolina') }}">
                        <i class="fas fa-plus-circle icon-effect"></i>
                    </a>

                        <a class="btn btn-circel" href="{{ route('create.gasolina') }}">
                            <h5 class="text-white text-tittle-app  mt-2 " style="font: normal normal bold 15px/20px Segoe UI">
                                Agregar
                            </h5>
                        </a>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                    <div class="carousel-inner">

                        {{-- -------------------------------------------------------------------------- --}}
                        {{-- |Vehculos de user --}}
                        {{-- |-------------------------------------------------------------------------- --}}

                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-center">

                                        <h5 class="text-center text-white mt-4 p-2">
                                            <strong>Registros Personales</strong>
                                        </h5>

                                        <a class="text-white p-2" href="/exportar/gasolina">
                                            <i class="fa fa-download icon-effect" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>


                                    <div class="col-12">
                                        <table id="seguro" class="table display nowrap text-white" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th data-priority="2">Usuario</th>
                                                    <th data-priority="3">Submarca / placas</th>
                                                    <th data-priority="4">Estatus</th>
                                                    <th data-priority="1">Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gasolina as $item)
                                                    <tr>
                                                        @if (auth()->user()->chofer == NULL)
                                                        <th><a style="text-decoration: none;"
                                                            href="{{ route('edit_admin.gasolina', $item->id) }}">
                                                            {{ $item->User->name }}</a>
                                                        </th>
                                                        @else
                                                        <th>{{ $item->User->name }}</th>
                                                        @endif

                                                        <td>{{ $item->Automovil->submarca }} /<br> {{ $item->Automovil->placas }}</td>
                                                        <td>{{ $item->estatus }}</td>

                                                        <td>
                                                            <a type="button" class="btn text-white" data-toggle="modal" data-target="#modal-{{ $item->id }}">
                                                                <i class="far fa-eye icon-users-edit" style="font-size: 15px;"></i>
                                                            </a>
                                                        </td>
                                                        @include('admin.gasolina.modal-view')
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
            $('#seguro').DataTable({
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

        $(document).ready(function() {
            $('#seguro_empresa').DataTable({
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

        function updateGauge(id, min, max) {
                        const newGaugeDisplayValue = document.getElementById("gaugeValue-" + id).value;
                        const newGaugeValue = Math.floor(((newGaugeDisplayValue - min) / (max - min)) * 100);
                        document.getElementById(id).style.setProperty('--gauge-display-value', newGaugeDisplayValue);
                        document.getElementById(id).style.setProperty('--gauge-value', newGaugeValue);
                    }

        $(document).ready(function(){
                $('.venobox').venobox();
                });
    </script>

@endsection

@endsection
