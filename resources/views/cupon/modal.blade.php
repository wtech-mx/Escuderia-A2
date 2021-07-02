<!-- Modal -->
<div class="modal fade" id="example{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cupon : <strong>{{ $item->Cupon->titulo }}</strong> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">

                <div class="body-cupon">

                    <div class="contenedor-cupon">

                        <div class="row">

                            <div class="d-flex justify-content-center align-items-center container">
                                <div class="d-flex card text-center" style="background: {{ $item->Cupon->color }}">

                                    <div class="content-cupon p-3 bg-white" style="border-radius: 20px">
                                        <img class="" src="{{ asset('qr/' . $item->Cupon->qr) }}"
                                            alt="{{ asset('img/qr/' . $item->Cupon->qr) }}" width="85">
                                    </div>

                                    <h1 class="mt-3">
                                        <strong> {{ $item->Cupon->precio }} </strong>
                                    </h1>

                                    <h2 class="mt-3">
                                        <strong> {{ $item->Cupon->titulo }} </strong>
                                    </h2>

                                    <div class="mt-4">
                                        @php
                                            $fecha_actual = date('Y-m-d');
                                            $s = strtotime($item->Cupon->fecha_caducidad) - strtotime($fecha_actual);
                                            $d = intval($s / 86400);
                                        @endphp
                                        <h3>{{ $d }} Dias Restantes</h3>
                                    </div>

                                    <div class="mt-4">
                                        <small> Terminos y/o condiciones : <br> <strong> {{ $item->Cupon->aplicacion }}
                                            </strong></small>
                                    </div>

                                    <div class="mt-4">
                                        @if ($item->Cupon->estado == 0)
                                            <button type="button" class="btn btn-outline-success text-white"
                                                style="background: rgb(33, 243, 14)">
                                                Vigente
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-outline-danger text-white"
                                                style="background: rgb(248, 0, 0)">
                                                Caducó
                                            </button>
                                        @endif
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
