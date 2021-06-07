@extends('admin.layouts.app')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.8/css/responsive.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')

    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

    <div class="row bg-down-blue container-res" style="border-radius: 0 0 0 0; ">


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
                <strong>Expediente F&iacute;sico</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="col-6 mt-4">
            <a class="btn mb-3 mr-1" href="#carouselExampleControls" role="button" data-slide="prev">
                <img class="" src="{{ asset('img/icon/white/flecha-izquierda.png') }}" width="25px">
            </a>

            <a class="btn mb-3 " href="#carouselExampleControls" role="button" data-slide="next">
                <img class="" src="{{ asset('img/icon/white/flecha-correcta.png') }}" width="25px">
            </a>
        </div>

        <div class="col-12">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="90000">
                <div class="carousel-inner">
                    {{-- -------------------------------------------------------------------------- --}}
                    {{-- |Vehculos de user --}}
                    {{-- |-------------------------------------------------------------------------- --}}

                    <div class="carousel-item active">
                        <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                            <strong>Expediente de personas</strong>
                        </h5>

                        <div class="row">

                            <div class="content container-res-max">
                                <div class="col-lg-12">

                                    <table id="expedientes" class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Cliente</th>
                                                <th scope="col">Placas</th>
                                                <th scope="col">Modelo</th>
                                                <th scope="col">Submarca</th>
                                                <th scope="col">Factura</th>
                                                <th scope="col">Tenencia</th>
                                                <th scope="col">Carta Responsiva</th>
                                                <th scope="col">Seguro</th>
                                                <th scope="col">tarjeta de c.</th>
                                                <th scope="col">Reemplacamiento</th>
                                                <th scope="col">Verificaci&oacute;n</th>
                                                <th scope="col">PLacas</th>
                                                <th scope="col">INE</th>
                                                <th scope="col">Domicilio</th>
                                                <th scope="col">RFC</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($automovil as $item)
                                                <tr>
                                                    <th>{{ $item->User->name }}</th>
                                                    <td>{{ $item->placas }}</td>
                                                    <td>{{ $item->Marca->nombre }}</td>
                                                    <td>{{ $item->submarca }}</td>
                                                    <td>
                                                        <a style="text-decoration: none;"
                                                            href="{{ route('create_admin.view-factura-admin', $item->id) }}">
                                                            Facturas
                                                            @if ($item->User->id == $item->id_user)
                                                                {{ $item->ExpFactura->count() }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a style="text-decoration: none;"
                                                            href="{{ route('create_admin.view-tenencia-admin', $item->id) }}">
                                                            Tenencias
                                                            @if ($item->User->id == $item->id_user)
                                                                {{ $item->ExpTenencias->count() }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a style="text-decoration: none;"
                                                            href="{{ route('create_admin.view-cr-admin', $item->id) }}">
                                                            Carta Responsiva
                                                            @if ($item->User->id == $item->id_user)
                                                                {{ $item->ExpCarta->count() }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a style="text-decoration: none;"
                                                            href="{{ route('create_admin.view-poliza-admin', $item->id) }}">
                                                            Póliza de Seguro
                                                            @if ($item->User->id == $item->id_user)
                                                                {{ $item->ExpPoliza->count() }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a style="text-decoration: none;"
                                                            href="{{ route('create_admin.view-tc-admin', $item->id) }}">
                                                            tarjeta de circulaci&oacute;n
                                                            @if ($item->User->id == $item->id_user)
                                                                {{ $item->ExpTc->count() }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a style="text-decoration: none;"
                                                            href="{{ route('create_admin.view-reemplacamiento-admin', $item->id) }}">
                                                            Reemplacamiento
                                                            @if ($item->User->id == $item->id_user)
                                                                {{ $item->ExpReemplacamiento->count() }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a style="text-decoration: none;"
                                                            href="{{ route('create_admin.view-certificado-admin', $item->id) }}">
                                                            Verificaci&oacute;n
                                                            @if ($item->User->id == $item->id_user)
                                                                {{ $item->ExpCertificado->count() }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a style="text-decoration: none;"
                                                            href="{{ route('create_admin.view-bp-admin', $item->id) }}">
                                                            Baja de placas
                                                            @if ($item->User->id == $item->id_user)
                                                                {{ $item->ExpPlacas->count() }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a style="text-decoration: none;"
                                                            href="{{ route('create_admin.view-ine-admin', $item->id) }}">
                                                            INE
                                                            @if ($item->User->id == $item->id_user)
                                                                {{ $item->ExpIne->count() }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a style="text-decoration: none;"
                                                            href="{{ route('create_admin.view-cd-admin', $item->id) }}">
                                                            Comprobante de domicilio
                                                            @if ($item->User->id == $item->id_user)
                                                                {{ $item->ExpDomicilio->count() }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a style="text-decoration: none;"
                                                            href="{{ route('create_admin.view-rfc-admin', $item->id) }}">
                                                            RFC
                                                            @if ($item->User->id == $item->id_user)
                                                                {{ $item->ExpRfc->count() }}
                                                            @endif
                                                        </a>
                                                    </td>
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
    </div>

    </div>

    </div>

    </div>

    </div>

    </div>

@section('js')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js|https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/responsive.bootstrap4.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('#expedientes').DataTable({
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'Detalles de ' + data[0] + ' ' + data[1];
                            }
                        }),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                            tableClass: 'table'
                        })
                    }
                }
            });
        });

    </script>

@endsection

@endsection
