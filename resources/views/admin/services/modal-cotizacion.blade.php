@php
$fechaEntera = strtotime($item->updated_at);
$anio = date('Y', $fechaEntera);
$mes = date('m', $fechaEntera);
$dia = date('d', $fechaEntera);
@endphp

<!-- Modal -->
<div class="modal fade" id="cotizacion{{ $item->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align:center">Detalles Del Servicio /
                    <strong>{{ $item->User->name }}</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="margin-bottom: 30%;">

                <div class="d-flex">
                    <div class="p-2">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-total-tab" data-toggle="pill"
                                    href="#pills-total-{{ $item->TotalRemision->id  }}" role="tab"
                                    aria-controls="pills-total" aria-selected="false">
                                    Total
                                </a>
                            </li>

                            @foreach ($taller as $prov)
                                @if ($item->id == $prov->id_cotizacion)

                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-servicio-tab" data-toggle="pill"
                                            href="#pills-servicio{{ $prov->id }}" role="tab"
                                            aria-controls="pills-servicio" aria-selected="true">
                                            Prov.
                                        </a>
                                    </li>
                                @endif
                            @endforeach

                            @foreach ($cotizacion_remision as $remision)
                                @if ($item->id == $remision->id_cotizacion)
                                @php
                                    $total = count($cotizacion_remision);
                                @endphp
                                    <li class="nav-item">
                                        <a class="nav-link " id="pills-proveedor-tab" data-toggle="pill"
                                            href="#pills-proveedor-{{ $remision->id }}" role="tab"
                                            aria-controls="pills-proveedor" aria-selected="false">
                                            Serv.
                                        </a>
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade show active" id="pills-total-{{ $item->TotalRemision->id }}" role="tabpanel"
                        aria-labelledby="pills-total-tab">
                        <div class="row">
                            <div class="col-6">

                                <label for="">
                                    <p><strong>Total de Cotizacion</strong></p>
                                </label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">
                                            <img class=""
                                                src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}"
                                                width="25px">
                                        </span>
                                    </div>
                                    <input type="number" class="form-control"
                                        placeholder="{{ $item->TotalRemision->total_cotizacion }}"
                                        style="border-radius: 0  10px 10px 0;" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">
                                    <p><strong>Fecha Cotizacion</strong></p>
                                </label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">
                                            <img class=""
                                                src="{{ asset('img/icon/white/calendario (5).png') }}"
                                                width="25px">
                                        </span>
                                    </div>
                                    <input type="text" class="form-control"
                                        placeholder="{{ $item->TotalRemision->fecha_cotizacion }}"
                                        style="border-radius: 0  10px 10px 0;" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">
                                    <p><strong>Total Remision</strong></p>
                                </label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">
                                            <img class=""
                                                src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}"
                                                width="25px">
                                        </span>
                                    </div>
                                    <input type="number" class="form-control"
                                        placeholder="{{ $item->TotalRemision->total_remision }}"
                                        style="border-radius: 0  10px 10px 0;" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">
                                    <p><strong>Fecha Cotizacion</strong></p>
                                </label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">
                                            <img class=""
                                                src="{{ asset('img/icon/white/calendario (5).png') }}"
                                                width="25px">
                                        </span>
                                    </div>
                                    <input type="text" class="form-control"
                                        placeholder="{{ $item->TotalRemision->fecha_remision }}"
                                        style="border-radius: 0  10px 10px 0;" disabled>
                                </div>
                            </div>

                        </div>
                    </div>

                    @foreach ($taller as $prov)
                        @if ($item->id == $prov->id_cotizacion)
                            <div class="tab-pane fade" id="pills-servicio{{ $prov->id }}" role="tabpanel"
                                aria-labelledby="pills-servicio-tab">
                                <label for="">
                                    <p><strong>Vendedor</strong></p>
                                </label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">
                                            <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}"
                                                width="25px">
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="{{ $prov->vendedor }}"
                                        style="border-radius: 0  10px 10px 0;" disabled>
                                </div>

                                <label for="">
                                    <p><strong>Refaccion</strong></p>
                                </label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">
                                            <img class="" src="{{ asset('img/icon/white/amortiguador (1).png') }}"
                                                width="25px">
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="{{ $prov->refaccion }}"
                                        style="border-radius: 0  10px 10px 0;" disabled>
                                </div>

                                <label for="">
                                    <p><strong>Cantidad</strong></p>
                                </label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">
                                            <img class="" src="{{ asset('img/icon/white/numeros.png') }}"
                                                width="25px">
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="{{ $prov->cantidad }}"
                                        style="border-radius: 0  10px 10px 0;" disabled>
                                </div>

                                <label for="">
                                    <p><strong>Importe unitario</strong></p>
                                </label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">
                                            <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}"
                                                width="25px">
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="{{ $prov->importe_unitario }}"
                                        style="border-radius: 0  10px 10px 0;" disabled>
                                </div>

                                <label for="">
                                    <p><strong>Importe total</strong></p>
                                </label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">
                                            <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}"
                                                width="25px">
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="{{ $prov->importe_total }}"
                                        style="border-radius: 0  10px 10px 0;" disabled>
                                </div>

                                <label for="">
                                    <p><strong>Mano Obra</strong></p>
                                </label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">
                                            <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}"
                                                width="25px">
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="{{ $prov->mano_obra }}"
                                        style="border-radius: 0  10px 10px 0;" disabled>
                                </div>


                            </div>
                        @endif
                    @endforeach

                    @foreach ($cotizacion_remision as $remision)
                        @if ($item->id == $remision->id_cotizacion)
                            <div class="tab-pane fade " id="pills-proveedor-{{ $remision->id }}" role="tabpanel"
                                aria-labelledby="pills-proveedor-tab">
                                <div class="row">
                                    <div class="col-12">

                                        <label for="">
                                            <p><strong>Reparación</strong></p>
                                        </label>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend ">
                                                <span class="input-group-text">
                                                    <img class=""
                                                        src="{{ asset('img/icon/white/amortiguador (1).png') }}"
                                                        width="25px">
                                                </span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="{{ $remision->reparacion }}"
                                                style="border-radius: 0  10px 10px 0;" disabled>
                                        </div>

                                        <label for="">
                                            <p><strong>Mano</strong></p>
                                        </label>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend ">
                                                <span class="input-group-text">
                                                    <img class=""
                                                        src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}"
                                                        width="25px">
                                                </span>
                                            </div>
                                            <input type="number" class="form-control"
                                                placeholder="{{ $remision->mano }}"
                                                style="border-radius: 0  10px 10px 0;" disabled>
                                        </div>

                                        <label for="">
                                            <p><strong>Importe</strong></p>
                                        </label>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend ">
                                                <span class="input-group-text">
                                                    <img class=""
                                                        src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}"
                                                        width="25px">
                                                </span>
                                            </div>
                                            <input type="number" class="form-control"
                                                placeholder="{{ $remision->importe }}"
                                                style="border-radius: 0  10px 10px 0;" disabled>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>

                <div class="row">
                    <div class="col-12 mt-3 " style="text-align: right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
