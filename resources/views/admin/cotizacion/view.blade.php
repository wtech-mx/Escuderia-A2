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

    @include('admin.layouts.sidebar')

    <div class="col-12 col-xs-12 col-sm-12 col-lg-12 col-xl-10">

        <div class="d-flex justify-content-between mt-5  mb-5">
            <div class="text-center text-white">
                <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                    <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                </a>
            </div>

            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Orden de Servicio</strong>
            </h5>

            <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
            </div>
        </div>

        <div class="d-flex flex-row-reverse ">
            <a class="btn p-2 " href="{{ route('create.cotizacion') }}">
                <i class="fas fa-plus-circle icon-effect"></i>
            </a>
            <h5 class="text-white p-2">
                Agregar
            </h5>
        </div>

        <div class="col-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                <div class="carousel-inner">

                    {{-- -------------------------------------------------------------------------- --}}
                    {{-- |Vehculos de user --}}
                    {{-- |-------------------------------------------------------------------------- --}}

                    <div class="carousel-item active">
                        <div class="row">

                            <div class="content container-res-max">
                                <div class="col-12">
                                    <table id="orden_servicio" class="table   text-white" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th  data-priority="2">Cliente</th>
                                                <th  data-priority="3">Auto</th>
                                                <th  data-priority="5">Placas</th>
                                                <th  data-priority="4">Fecha</th>
                                                <th  data-priority="7">km</th>
                                                <th  data-priority="6">Estatus</th>
                                                <th  data-priority="1">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cotizacion_servicio as $item)
                                            <tr>

                                                <th>
                                                    {{$item->Cotizacion->User->name}}
                                                </th>

                                                <th>
                                                    {{-- {{$item->Cotizacion->Automovil->submarca}} --}}

                                                    @if(!isset($item->Cotizacion->Automovil->submarca))
                                                        <p>Sin Submarca</p>

                                                    @elseif(empty($item->Cotizacion->Automovil->submarca))
                                                        <p>Sin Submarca</p>
                                                    @else
                                                        {{ $item->Cotizacion->Automovil->submarca }}
                                                    @endif

                                                </th>

                                                <th>
                                                    {{-- {{$item->Cotizacion->Automovil->placas}} --}}

                                                    @if(!isset($item->Cotizacion->Automovil->placas))
                                                        <p>Sin placas</p>

                                                    @elseif(empty($item->Cotizacion->Automovil->placas))
                                                        <p>Sin placas</p>
                                                    @else
                                                        {{ $item->Cotizacion->Automovil->placas }}
                                                    @endif

                                                </th>
                                                <td>{{ $item->Cotizacion->fecha }}</td>

                                                <td>
                                                    <p class="d-none d-md-block"> {{ $item->km }} </p>
                                                </td>

                                                <td>
                                                    @if($item->CotizacionDiagnostico->observaciones == NULL)
                                                    Di. <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckCheckedDisabled" disabled> <br>
                                                    @else
                                                    Di. <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckCheckedDisabled" checked disabled> <br>
                                                    @endif

                                                    @if($item->Cotizacion->TotalRemision->total_cotizacion == NULL)
                                                    Co. <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckCheckedDisabled" disabled><br> <br>
                                                    @else
                                                    Co. <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckCheckedDisabled" checked disabled><br>
                                                    @endif

                                                    @if($item->Cotizacion->TotalRemision->total_remision == NULL)
                                                    Re. <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckCheckedDisabled" disabled> <br>
                                                    @else
                                                    Re. <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckCheckedDisabled" checked disabled> <br>
                                                    @endif

                                                </td>

                                                <td>
                                                    <div class="dropdown">
                                                      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" style="background: transparent">
                                                        <i class="fa fa-ellipsis-v text-white" aria-hidden="true"></i>
                                                      </button>
                                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                        <a class="dropdown-item text-dark" href="{{ route('edit.cotizacion', $item->id_cotizacion) }}">
                                                            <i class="fa fa-list-alt icon-users-edit text-dark"
                                                            style="margin-right: 10px; font-size: 13px;"></i>Orden
                                                        </a>
                                                    <a class="dropdown-item text-dark" href="{{ route('edit.diagnostico', $item->id) }}">
                                                        <i class="fas fa-oil-can icon-users-edit text-dark"
                                                            style="margin-right: 10px; font-size: 13px;"></i>Diagnostico
                                                    </a>
                                                    <a class="dropdown-item text-dark" href="{{ route('edit.taller', $item->id_taller) }}">
                                                        <i class="fas fa-tasks icon-users-edit text-dark"
                                                            style="margin-right: 10px; font-size: 13px;"></i>Cotizacion
                                                    </a>
                                                    <a class="dropdown-item text-dark" href="{{ route('edit.remision', $item->id_cotizacion) }}">
                                                        <i class="fa fa-file-excel icon-users-edit text-dark"
                                                            style="margin-right: 10px; font-size: 13px;"></i> Remision
                                                    </a>
                                                    <a class="dropdown-item text-dark" data-toggle="modal" data-target="#pdfModal{{$item->id}}">
                                                        <i class="fa fa-file-pdf icon-users-edit text-dark"
                                                            style="margin-right: 10px; font-size: 12.5px;"></i> Compartir PDF
                                                    </a>

                                                      </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            @include('admin.cotizacion.pdfs_coti_remi')
                                            @endforeach
                                        </tbody>

                                    </table>
                                    {{-- @foreach ($cotizacion_servicio as $item)
                                    <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <a type="button" class="btn" target="_blank"
                                                        href="https://wa.me/52{{$item->Cotizacion->User->telefono}}?text=Hola%2C+{{$item->Cotizacion->User->name}}%3A%0D%0ATe+mandamos+los+videos+de+tu+auto.%0D%0ADa+click+en+el+siguente+enlace%0D%0A%0D%0A{{route('videos.cotizacion', $item->id_cotizacion)}}"
                                                        style="background: #00BB2D; color: #ffff">
                                                        Hoja de servicio
                                                    </a>

                                                    <a type="button" class="btn btn-secondary" target="_blank"
                                                        href="https://wa.me/52{{$item->Cotizacion->User->telefono}}?text=Hola%2C+{{$item->Cotizacion->User->name}}%3A%0D%0ATe+mandamos+tu+Hoja+de+diagnostico+de+tu+auto.%0D%0ADa+click+en+el+siguente+enlace%0D%0A%0D%0A{{ route('edit.diagnostico', $item->id) }}">
                                                        Hoja de Diagnostico
                                                    </a>

                                                    <a type="button" class="btn btn-primary"
                                                        href="https://wa.me/52{{$item->Cotizacion->User->telefono}}?text=Hola%2C+{{$item->Cotizacion->User->name}}%3A%0D%0ATe+mandamos+tu+Cotizacion+de+tu+auto.%0D%0ADa+click+en+el+siguente+enlace%0D%0A%0D%0A{{ route('index_user.cotizacion', $item->id_taller) }}">
                                                        Cotización
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach --}}
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
            $('#orden_servicio').DataTable({
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
                stateSave: true,
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
            $('#orden_servicio_empresa').DataTable();
        });
    </script>

    @endsection

    @endsection
