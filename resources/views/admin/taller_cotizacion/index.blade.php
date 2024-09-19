@extends('admin.layouts.app')

@php
use Carbon\Carbon;
@endphp

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/customtable.css') }}" rel="stylesheet">
@endsection


<style>
    .select2-container{
        width: 200px !important;
    }
    .select2-container .select2-dropdown .select2-results__option {
        color: #333; /* Cambia #333 por el color que desees */
        background-color: #fff; /* Asegúrate de que el fondo sea blanco */
    }

    /* Ajusta el color de las opciones al estar seleccionadas */
    .select2-container .select2-dropdown .select2-results__option--highlighted {
        background-color: #3490dc; /* Color de fondo al seleccionar */
        color: #fff; /* Color del texto al seleccionar */
    }

    /* Ajusta el color del texto en el campo de búsqueda de Select2 */
    .select2-container .select2-search--dropdown .select2-search__field {
        color: #333; /* Cambia #333 por el color que desees */
    }

    /* Ajusta el color del texto en el campo seleccionado (dentro del input) */
    .select2-container .select2-selection--single .select2-selection__rendered {
        color: #333; /* Cambia #333 por el color que desees */
    }

    /* Si estás utilizando un tema oscuro, puedes ajustar los colores así: */
    body.modal-open .select2-container--default .select2-results__option {
        color: #fff; /* Blanco para texto */
        background-color: #333; /* Fondo oscuro */
    }
</style>

@section('content')


    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <div class="row bg-down-image-border">

        @include('admin.layouts.sidebar')

        <div class="col-12 col-xs-12 col-sm-12 col-lg-12 col-xl-10">

            <div class="row">

                <div class="col-12 col-xs-12 col-sm-12 col-lg-12 col-xl-10">

                    <div class="d-flex justify-content-between mt-5  mb-5">
                            <div class="text-center text-white">
                                <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                                    <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                                </a>
                            </div>

                            <h5 class="text-center text-white ml-4 mr-4 ">
                                <strong>Cotizaciones Taller </strong>
                            </h5>

                            <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                            </div>
                    </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table id="cotizacion" class="table display nowrap text-white mt-5e" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Automovil</th>
                                        <th scope="col">Estatus</th>
                                        <th scope="col">KM</th>
                                        <th scope="col">Dias</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cotizacion as $item)
                                        <tr>
                                            <td>

                                                @php
                                                $nombreDelCurso = $item->User->name;
                                                $nombreDelCurso = str_replace('Curso de ', '', $nombreDelCurso);
                                                $nombreDelCurso = str_replace('Curso ', '', $nombreDelCurso);

                                                $palabras = explode(' ', $nombreDelCurso);

                                                // Inicializa la cadena formateada
                                                $nombre_formateado = '';
                                                $contador_palabras = 0;

                                                foreach ($palabras as $palabra) {
                                                    // Agrega la palabra actual a la cadena formateada
                                                    $nombre_formateado .= $palabra . ' ';

                                                    // Incrementa el contador de palabras
                                                    $contador_palabras++;

                                                    // Agrega un salto de línea después de cada tercera palabra
                                                    if ($contador_palabras % 3 == 0) {
                                                        $nombre_formateado .= "<br>";
                                                    }
                                                }
                                            @endphp

                                            {!! $nombre_formateado !!}

                                            </td>

                                            <td>

                                                @if(!isset($item->Auto->Marca->nombre))

                                                <p>Sin Submarca</p>

                                                @elseif(empty($item->Auto->Marca->nombre))

                                                    <p>Sin nombre</p>

                                                @else

                                                    {{ $item->Auto->Marca->nombre }}

                                                @endif

                                                {{ $item->placas}}
                                            </td>
                                            <td>
                                                <button class="btn text-white" data-toggle="modal" data-target="#estatus-{{ $item->id }}">{{ $item->estatus }}</button><br><br>
                                                @switch($item->estatus)
                                                    @case('Pendiente de asignar taller')
                                                        Fecha: {{ $item->fecha_creacion }}
                                                        @break
                                                    @case('Pendiente de ingreso a taller')
                                                        Fecha: {{ $item->fecha_asignacion_taller }}
                                                        @break
                                                    @case('En espera de cotizacion')
                                                    Fecha: {{ $item->fecha_ingreso_taller }}
                                                        @break
                                                    @case('Pendiente de Autorización')
                                                    Fecha: {{ $item->fecha_cotizacion }}
                                                        @break
                                                    @case('Cotización autorizada en reparación unidad')
                                                    Fecha: {{ $item->fecha_autorizada }}
                                                        @break
                                                    @case('Reparada pendiente de entrega unidad')
                                                    Fecha: {{ $item->fecha_reparado }}
                                                        @break
                                                    @case('Entregada por cargar factura')
                                                    Fecha: {{ $item->fecha_entregado }}
                                                        @break
                                                    @case('Facturada por pagar')
                                                    Fecha: {{ $item->fecha_factura }}
                                                        @break
                                                    @case('Pagada')
                                                    Fecha: {{ $item->fecha_pagado }}
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>
                                                @if($item->km_taller == NULL && $item->km_entrega == NULL)
                                                    KM Actual: <br>
                                                    {{ $item->km_actual}}
                                                @elseif($item->km_entrega == NULL)
                                                    KM Taller: <br>
                                                    {{ $item->km_taller}}
                                                @else
                                                    KM Entrega: <br>
                                                    {{ $item->km_entrega}}
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $hoy = Carbon::now();
                                                    $dias_transcurridos = null;

                                                    switch ($item->estatus) {
                                                        case 'Pendiente de asignar taller':
                                                            $fecha = $item->fecha_creacion ? Carbon::parse($item->fecha_creacion) : null;
                                                            break;
                                                        case 'Pendiente de ingreso a taller':
                                                            $fecha = $item->fecha_asignacion_taller ? Carbon::parse($item->fecha_asignacion_taller) : null;
                                                            break;
                                                        case 'En espera de cotizacion':
                                                            $fecha = $item->fecha_ingreso_taller ? Carbon::parse($item->fecha_ingreso_taller) : null;
                                                            break;
                                                        case 'Pendiente de autorización':
                                                            $fecha = $item->fecha_cotizacion ? Carbon::parse($item->fecha_cotizacion) : null;
                                                            break;
                                                        case 'En reparacion':
                                                            $fecha = $item->fecha_autorizada ? Carbon::parse($item->fecha_autorizada) : null;
                                                            break;
                                                        case 'Por entregar usuario':
                                                            $fecha = $item->fecha_reparado ? Carbon::parse($item->fecha_reparado) : null;
                                                            break;
                                                        case 'Por cargar factura':
                                                            $fecha = $item->fecha_entregado ? Carbon::parse($item->fecha_entregado) : null;
                                                            break;
                                                        case 'Por pagar':
                                                            $fecha = $item->fecha_factura ? Carbon::parse($item->fecha_factura) : null;
                                                            break;
                                                        default:
                                                            $fecha = null;
                                                    }

                                                    if ($fecha) {
                                                        $dias_transcurridos = $fecha->diffInDays($hoy);
                                                    }
                                                @endphp

                                                @if(!is_null($dias_transcurridos))
                                                    <p>{{ $dias_transcurridos }} días</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->estatus == 'Pendiente de asignar taller')
                                                    <a style="color: #3490dc" data-toggle="modal" data-target="#taller-{{ $item->id }}">  <img class="" src="{{ asset('img/icon/white/configuraciones.png') }}" width="20px" > Taller</a> <br><br>
                                                @endif
                                                @if ($item->estatus == 'Pendiente de ingreso a taller')
                                                    <a style="color: #3490dc" data-toggle="modal" data-target="#taller-ingreso-{{ $item->id }}">  <img class="" src="{{ asset('img/icon/white/taller.png') }}" width="20px" >Ing Taller</a> <br><br>
                                                @endif
                                                @if ($item->estatus == 'En espera de cotizacion')
                                                    <a style="color: #3490dc" data-toggle="modal" data-target="#taller-ingreso-{{ $item->id }}">  <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="20px" >Fecha Cot</a> <br><br>
                                                @endif
                                                @if ($item->estatus == 'Pendiente de autorización')
                                                    <a style="color: #3490dc" data-toggle="modal" data-target="#taller-edit-{{ $item->id }}">  <img class="" src="{{ asset('img/icon/white/taller.png') }}" width="20px" > Taller</a> <br><br>
                                                @endif
                                                @if ($item->estatus == 'En reparacion')
                                                    <a style="color: #3490dc" data-toggle="modal" data-target="#taller-ingreso-{{ $item->id }}">  <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="20px" >Fin reparacion</a> <br><br>
                                                @endif
                                                @if ($item->estatus == 'Por entregar usuario')
                                                    @php
                                                        $color = $item->OredenEncuesta->pregunta_1 == NULL ? '#dc5634' : '#34dca4';
                                                    @endphp
                                                    <a style="color: #3490dc" data-toggle="modal" data-target="#taller-ingreso-{{ $item->id }}">  <img class="" src="{{ asset('img/icon/white/car-service (1).png') }}" width="20px" >Entregar</a> <br><br>
                                                @endif
                                                @if ($item->estatus == 'Por cargar factura')
                                                    <a style="color: #3490dc" data-toggle="modal" data-target="#taller-ingreso-{{ $item->id }}">  <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="20px" >Factura</a> <br><br>
                                                @endif
                                                @if ($item->estatus == 'Por pagar')
                                                    <a style="color: #3490dc" data-toggle="modal" data-target="#taller-ingreso-{{ $item->id }}">  <img class="" src="{{ asset('img/icon/white/metodo-de-pago (1).png') }}" width="20px" >Pagar</a> <br><br>
                                                @endif
                                                <a style="color: #3490dc" href="{{ route('view_admin.cotizacion_taller', $item->id) }}"><img class="" src="{{ asset('img/icon/white/cotizacion.png') }}" width="20px" > Ver</a> <br><br>

                                                <a style="color: #3490dc" href="{{ route('orden.imprimir', $item->id) }}"> <img class="" src="{{ asset('img/icon/white/metodo-de-pago (1).png') }}" width="20px" >PDF</a>
                                            </td>
                                        </tr>

                                        @include('admin.taller_cotizacion.modal_estatus')
                                        @include('admin.taller_cotizacion.modal_ingreso_taller')
                                        @include('admin.taller_cotizacion.modal_taller_edit')
                                        @include('admin.taller_cotizacion.modal_taller')
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>


    </div>
    @include('admin.taller_cotizacion.create')

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

<script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js')}}"></script>

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
        $('#cotizacion').DataTable({
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

<script>
    $(document).ready(function() {
        $('.cliente_cot').select2();
        $('.js-example-basic').select2();

        $('[id^="taller-edit-"]').on('shown.bs.modal', function () {
            $(this).find('.servicio-select').select2({
                width: '100%',
                dropdownParent: $(this).find('.modal-content')
            });
        });

        let servicioIndices = {};

        function createNewServicioItem(index, registroId) {
            return `
                <div class="servicio-item" id="servicioItem_${index}_${registroId}">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <p><strong>Servicios</strong></p>
                            <div class="input-group form-group">
                                <select class="form-control servicio-select" name="servicios_cot[]" id="servicioSelect_${index}_${registroId}">
                                    <option value="">Seleccione servicio</option>
                                    @foreach($servicios as $item)
                                        <option value="{{ $item->id }}" data-precio="{{ $item->precio }}">{{$item->familia}} {{ $item->servicio }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 col-md-3 col-lg-3 mb-2">
                            <strong>Precio servicio</strong>
                             <input class="form-control precio-input" type="number" name="precio_cot[]" id="precioInput_${index}_${registroId}">
                        </div>
                        <div class="col-6 col-sm-3 col-md-3 col-lg-3 mb-2">
                            <strong>Marca</strong>
                             <input class="form-control precio-input" type="text" name="marca_cot[]" id="marcaInput_${index}_${registroId}">
                        </div>
                    </div>
                </div>`;
        }

        $(document).on('click', '.addServicioBtn', function() {
            const registroId = $(this).data('registro-id');
            if (!servicioIndices[registroId]) {
                servicioIndices[registroId] = 1;
            }
            const newServicioItem = createNewServicioItem(servicioIndices[registroId], registroId);
            $(`#serviciosContainer_${registroId}`).append(newServicioItem);

            // Inicializar Select2 para el nuevo elemento
            $(`#servicioSelect_${servicioIndices[registroId]}_${registroId}`).select2({
                width: '100%',
                dropdownParent: $(`#taller-edit-${registroId}`).find('.modal-content')
            });

            servicioIndices[registroId]++;
        });

        $('[id^="taller-edit-"]').on('shown.bs.modal', function () {
            const modalId = $(this).attr('id');
            const id = modalId.split('-')[2]; // Obtiene el id del registro del modal

            $(this).find('.suma-input').on('input', function() {
                // Obtener los valores de los inputs del modal específico
                const refaccion = parseFloat($(`#refaccionCot_${id}`).val()) || 0;
                const manoObra = parseFloat($(`#moCot_${id}`).val()) || 0;

                // Calcular la suma
                const total = refaccion + manoObra;

                // Mostrar el resultado en el input de "Importe total" del modal específico
                $(`#totalInput_${id}`).val(total.toFixed(2));
            });
        });
    });

</script>

@endsection
