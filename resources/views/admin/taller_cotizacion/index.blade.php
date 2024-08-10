@extends('admin.layouts.app')

@section('css')
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
<style>
    .select2-container{
        width: 200px !important;
    }
</style>
@section('content')
@php
use Carbon\Carbon;
@endphp
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <div class="row bg-down-image-border">


        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8  mt-4">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Cotizaciones Taller</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="col-12">
            @include('admin.taller_cotizacion.create')
        </div>
        <div class="col-sm-12">
            <form action="" method="GET" >
                <div class="card-body" style="padding-left: 1.5rem; padding-top: 1rem;">
                    <h5>Filtro</h5>
                        <div class="row">
                            <div class="col-3">
                                <label for="user_id">Filtra Estatus:</label>
                                <select class="form-select cliente" name="id_client" id="id_client">
                                    <option value="En espera de cotizacion">Espera de Cotizacion</option>
                                    <option value="Autorizada Cotizacion">Autorizada Cotizacion</option>
                                    <option value="En reparacion">En Reparacion</option>
                                    <option value="Por entregar usuario">Por Entregar Usuario</option>
                                    <option value="Por cargar factura">Por Cargar Factura</option>
                                    <option value="Por pagar">Por pagar</option>
                                    <option value="Pagado">Pagado</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <br>
                                <button class="btn btn-sm mb-0 mt-sm-0 mt-1" type="submit" style="background-color: #2ECC71 ; color: #ffffff;">Buscar <img class="" src="{{ asset('img/icon/white/search.png') }}" width="20px" ></button>
                            </div>
                        </div>
                </div>
            </form>
        </div>

        <div class="row  bg-down-image-border">
            <div class="col-12">
                <table id="cotizacion" class="table text-white">
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
                                <td>{{ $item->User->name }}</td>
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
                                            case 'En reparación':
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
                                    <a style="color: #3490dc" href="{{ route('view_admin.cotizacion_taller', $item->id) }}"><img class="" src="{{ asset('img/icon/white/cotizacion.png') }}" width="20px" > Ver</a>
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
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js')}}"></script>

<script>
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

                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                }
            });

        });
</script>

<script type="text/javascript">

    $(document).ready(function() {
        $('.cliente_cot').select2();
        $('.js-example-basic').select2();
    });

</script>

<script>
$(document).ready(function() {
    let servicioIndices = {};

    function updatePrice(selectElement) {
        const selectedOption = $(selectElement).find('option:selected');
        const precio = selectedOption.data('precio');
        $(selectElement).closest('.servicio-item').find('.precio-input').val(precio);
        calculateTotals(selectElement);
    }

    function calculateTotals(element) {
        const registroId = $(element).closest('.container').find('.addServicioBtn').data('registro-id');
        let total = 0;

        $(`#serviciosContainer_${registroId} .precio-input`).each(function() {
            const value = parseFloat($(this).val());
            if (!isNaN(value)) {
                total += value;
            }
        });

        const totalIva = total * 1.16;
        $(`#totalInput_${registroId}`).val(total.toFixed(2));
        $(`#totalIvaInput_${registroId}`).val(totalIva.toFixed(2));
    }

    $(document).on('change', '.servicio-select', function() {
        updatePrice(this);
    });

    $(document).on('input', '.precio-input', function() {
        calculateTotals(this);
    });

    function createNewServicioItem(index, registroId) {
        return `
            <div class="servicio-item" id="servicioItem_${index}_${registroId}">
                <div class="row">
                    <div class="col-6">
                        <p><strong>Servicios</strong></p>
                        <div class="input-group form-group">
                            <select class="form-control servicio-select" name="servicios_cot[]" id="servicioSelect_${index}_${registroId}">
                                <option value="">Seleccione servicio</option>
                                @foreach($servicios as $item)
                                    <option value="{{ $item->id }}" data-precio="{{ $item->precio }}">{{ $item->servicio }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <strong>Precio servicio</strong>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text input-services">
                                    <img src="{{ asset('img/icon/white/presupuesto (1).png') }}" width="25px">
                                </span>
                            </div>
                            <input class="form-control precio-input" type="number" name="precio_cot[]" id="precioInput_${index}_${registroId}">
                        </div>
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
        servicioIndices[registroId]++;
    });
});

</script>
@endsection
