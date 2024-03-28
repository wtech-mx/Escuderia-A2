<div class="modal fade" id="estatus-{{ $item->id }}" tabindex="-1" aria-labelledby="servicio" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="{{route('update_estatus.cotizacion_taller', $item->id)}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                            <div class="col-12  mt-5">
                                <h2 class="text-center ml-4 mr-4 ">
                                    <strong>Cambiar estatus</strong>
                                </h2>
                            </div>

                            <div class="col-6 mt-5 mb-5">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <select class="form-control" id="estatus" name="estatus" required>
                                            <option value="{{$item->estatus}}">{{$item->estatus}}</option>
                                            <option value="Espera de Cotizacion">Espera de Cotizacion</option>
                                            <option value="Autorizada Cotizacion">Autorizada Cotizacion</option>
                                            <option value="En reparacion">En Reparacion</option>
                                            <option value="Por entregar usuario">Por Entregar Usuario</option>
                                            <option value="Por cargar factura">Por Cargar Factura</option>
                                            <option value="Por pagar">Por pagar</option>
                                            <option value="Pagado">Pagado</option>
                                    </select>
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

