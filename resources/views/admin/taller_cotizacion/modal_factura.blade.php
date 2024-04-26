<div class="modal fade" id="factura-{{ $item->id }}" tabindex="-1" aria-labelledby="servicio" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="color: #000000">
                <form method="POST" action="{{route('store_taller.cotizacion_taller', $item->id)}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">

                        <div class="row">
                            <div class="col-12 mt-3">
                                <h2 class="text-center ml-4 mr-4">
                                    <strong>Por cargar factura</strong>
                                </h2>
                            </div>

                            <div class="col-12 mb-2">
                                <strong>Documento</strong>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input class="form-control" type="file" name="nombre_taller" id="nombre_taller">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <strong>Evidencia</strong>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input class="form-control" type="file" name="encargado" id="encargado">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <strong>Importe s/iva</strong>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input class="form-control" type="number" name="telefono" id="telefono" value="600">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <strong>Importe c/iva</strong>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input class="form-control" type="number" name="telefono" id="telefono" value="660">
                                </div>
                            </div>
                        </div>

                        <p class="text-center">
                            <button class="btn btn-sm btn-save text-white">
                                <img class="d-inline" src="{{ asset('img/icon/white/save-file-option (1).png') }}" alt="Icon documento" width="30px">
                                Guardar
                            </button>
                        </p>
                </form>
            </div>
        </div>
    </div>
</div>

