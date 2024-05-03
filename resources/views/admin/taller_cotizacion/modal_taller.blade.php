<div class="modal fade" id="taller-{{ $item->id }}" tabindex="-1" aria-labelledby="servicio" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="color: #000000">
                <form method="POST" action="{{route('store_taller.cotizacion_taller', $item->id)}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input class="form-control" type="text" value="{{$item->User->name}}" disabled>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/coche (7).png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input class="form-control" type="text" value="{{ $item->Auto->Marca->nombre}} / {{ $item->placas}}" disabled>
                                </div>
                            </div>

                            <div class="col-6 mt-2" >
                                <p><strong>Comentario Solicitante</strong></p>
                                <div class="input-group form-group">
                                    <textarea name="comentarios" id="comentarios" cols="90" rows="3" disabled>{{$item->comentarios}}</textarea>
                                </div>
                            </div>

                            <div class="col-6 mt-2" >
                                <p><strong>Comentario Admin</strong></p>
                                <div class="input-group form-group">
                                    <textarea name="comentarios" id="comentarios" cols="90" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-3">
                                <h2 class="text-center ml-4 mr-4 ">
                                    <strong>Asignar taller</strong>
                                </h2>
                            </div>

                            <div class="col-12 mb-2">
                                <strong>Nombre taller</strong>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input class="form-control" type="text" name="nombre_taller" id="nombre_taller">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <strong>Encargado</strong>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input class="form-control" type="text" name="encargado" id="encargado">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <strong>Telefono</strong>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input class="form-control" type="number" name="telefono" id="telefono">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <strong>Correo</strong>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input class="form-control" type="email" name="correo" id="correo">
                                </div>
                            </div>

                            <div class="col-12 mb-5">
                                <strong>Dirección</strong>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input class="form-control" type="text" name="direccion" id="direccion">
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

