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

        <a class="btn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Agregar<i class="fas fa-plus-circle icon-effect"></i>
        </a>
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
                                <select class="form-control cliente" name="id_client" id="id_client">
                                    <option value="Espera de Cotizacion">Espera de Cotizacion</option>
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
                                <button class="btn btn-sm mb-0 mt-sm-0 mt-1" type="submit" style="background-color: #F82018; color: #ffffff;">Buscar</button>
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
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cotizacion as $item)
                            @php
                                function obtenerClaseBoton($estatus) {
                                    switch ($estatus) {
                                        case 'Cotizacion':
                                            return 'btn-primary';
                                        case 'En reparacion':
                                            return 'btn-warning';
                                        case 'Por entregar usuario':
                                            return 'btn-info';
                                        case 'Por cargar factura':
                                            return 'btn-secondary';
                                        case 'Por pagar':
                                            return 'btn-danger';
                                        case 'Pagado':
                                            return 'btn-success';
                                        case 'Autorizada Cotizacion': // Añadimos este caso
                                            return 'btn-success';
                                        default:
                                            return 'btn-secondary';
                                    }
                                }
                            @endphp
                            <tr>
                                <td>{{ $item->User->name }}</td>
                                <td>
                                    {{ $item->Auto->Marca->nombre}} <br>
                                    {{ $item->placas}}
                                </td>
                                <td>
                                    <button class="btn {{ obtenerClaseBoton($item->estatus) }}" data-toggle="modal" data-target="#estatus-{{ $item->id }}">{{ $item->estatus }}</button><br>
                                    @switch($item->estatus)
                                        @case('Ingreso a taller')
                                            Fecha: {{ $item->fecha_asignacion_taller }}
                                            @break
                                        @case('Espera de Cotizacion')
                                        Fecha: {{ $item->fecha_asignacion_taller }}
                                            @break
                                        @case('Pendiente de autorización')
                                        Fecha: {{ $item->fecha_asignacion_taller }}
                                            @break
                                        @case('Autorizada Cotizacion')
                                        Fecha: {{ $item->fecha_asignacion_taller }}
                                            @break
                                        @case('En reparacion')
                                        Fecha: {{ $item->fecha_reparacion }}
                                            @break
                                        @case('Por entregar usuario')
                                        Fecha: {{ $item->fecha_entregar }}
                                            @break
                                        @case('Por cargar factura')
                                        Fecha: {{ $item->fecha_factura }}
                                            @break
                                        @case('Por pagar')
                                        Fecha: {{ $item->fecha_por_pagar }}
                                            @break
                                        @case('Pagado')
                                        Fecha: {{ $item->fecha_pagado }}
                                            @break
                                    @endswitch
                                </td>
                                <td>
                                    @if($item->km_taller == NULL && $item->km_entrega == NULL)
                                        KM Actual: <br>
                                        {{ $item->km_inicial}}
                                    @elseif($item->km_entrega == NULL)
                                        KM Taller: <br>
                                        {{ $item->km_taller}}
                                    @else
                                        KM Entrega: <br>
                                        {{ $item->km_entrega}}
                                    @endif
                                </td>
                                <td>
                                    @if ($item->estatus == 'Pendiente de ingreso a taller')
                                        <a style="color: #3490dc" data-toggle="modal" data-target="#taller-{{ $item->id }}">Taller</a> <br>
                                        @include('admin.taller_cotizacion.modal_taller')
                                    @endif
                                    @if ($item->estatus == 'Espera de cotizacion')
                                        <a style="color: #3490dc" data-toggle="modal" data-target="#taller-cotizacion-{{ $item->id }}">Taller</a> <br>
                                        @include('admin.taller_cotizacion.modal_taller_edit')
                                    @endif
                                    @if ($item->estatus != 'Asignar Taller')
                                        <a style="color: #3490dc" href="{{ route('view.cotizacion_taller', $item->id) }}">Enviar</a> <br>
                                    @endif
                                    @if ($item->estatus == 'Por entregar usuario')
                                        <a style="color: #3490dc" data-toggle="modal" data-target="#x-entregar-{{ $item->id }}">Documentos</a> <br>
                                        @include('admin.taller_cotizacion.modal_x_entregar')
                                    @endif
                                    @if ($item->estatus == 'Por cargar factura')
                                        <a style="color: #3490dc" data-toggle="modal" data-target="#factura-{{ $item->id }}">Cargar Factura</a> <br>
                                        @include('admin.taller_cotizacion.modal_factura')
                                    @endif
                                    @if ($item->estatus == 'Pagado')
                                        <a style="color: #3490dc" data-toggle="modal" data-target="#pagado-{{ $item->id }}">Evidencia Pagado</a> <br>
                                        @include('admin.taller_cotizacion.modal_pagado')
                                    @endif
                                    <a style="color: #3490dc" href="{{ route('view_admin.cotizacion_taller', $item->id) }}">Ver</a>
                                </td>
                            </tr>

                            @include('admin.taller_cotizacion.modal_estatus')

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
        $('.js-example-basic-multiple').select2();
    });

</script>

<script>
    $(document).ready(function () {
        $('#id_user').on('change', function () {
            let id = $(this).val();
            //id_empresa no esta en la tabla de automovil
            $('#current_auto_cot').empty();
            $('#current_auto_cot').append(`<option value="" disabled selected>Procesando..</option>`);
            $.ajax({
                type: 'GET',
                url: 'auto/' + id,
                success: function (response) {
                    var response = JSON.parse(response);
                    console.log(response);
                    //trae los automoviles relacionados con el id_empresa
                    $('#current_auto_cot').empty();
                    $('#current_auto_cot').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                    response.forEach(element => {
                        $('#current_auto_cot').append(`<option value="${element['id']}">${element['submarca']} - ${element['placas']}</option>`);
                    });
                }
            });
        });
    });
</script>
@endsection
