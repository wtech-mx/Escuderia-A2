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

        <div class="row  bg-down-image-border">
            <div class="col-12">
                <table id="cotizacion" class="table text-white">
                    <thead>
                        <tr>
                            <th scope="col">Cliente</th>
                            <th scope="col">Automovil</th>
                            <th scope="col">Estatus</th>
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
                                <td><button class="btn {{ obtenerClaseBoton($item->estatus) }}" data-toggle="modal" data-target="#estatus-{{ $item->id }}">{{ $item->estatus }}</button></td>
                                 <td>
                                    <a style="color: #3490dc" data-toggle="modal" data-target="#taller-{{ $item->id }}">Taller</a> <br>
                                    <a style="color: #3490dc" href="{{ route('view.cotizacion_taller', $item->id) }}">View</a> <br>
                                    <a style="color: #3490dc" data-toggle="modal" data-target="#servicio-{{ $item->id }}">Edit</a>
                                </td>
                            </tr>
                            @include('admin.taller_cotizacion.modal_estatus')
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
        $('.js-example-basic-multiple').select2();

        // Función para calcular la suma de los precios
        function calcularTotalPrecio() {
            var total = 0;
            $('.js-example-basic-multiple option:selected').each(function() {
                total += parseFloat($(this).data('precio'));
            });
            return total;
        }

        // Función para calcular el IVA
        function calcularIva(totalPrecio) {
            var iva = totalPrecio * 0.16; // Suponiendo un 16% de IVA
            var sumiva = totalPrecio + iva;
            return sumiva;
        }

        // Actualizar los valores de los inputs al cargar la página y cada vez que cambia la selección
        $('.js-example-basic-multiple').change(function() {
            var totalPrecio = calcularTotalPrecio();
            var sumiva = calcularIva(totalPrecio);
            $('#importe_sin').val(totalPrecio.toFixed(2));
            $('#importe_con').val(sumiva.toFixed(2));
        });
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
