<div class="modal fade" id="taller-edit-{{ $item->id }}" tabindex="-1" aria-labelledby="servicio" aria-hidden="true">
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
                                    <textarea cols="90" rows="3" disabled>
                                        @foreach ($comentarios as $comentario)
                                            @if ($comentario->id_cotizacion == $item->id && $comentario->estatus == 'Pendiente de asignar taller')
                                                {{$comentario->comentario}}
                                            @endif
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-6 mt-2" >
                                <p><strong>Comentario Admin</strong></p>
                                <div class="input-group form-group">
                                    <textarea name="comentario" id="comentario" cols="90" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-3">
                                <h2 class="text-center ml-4 mr-4 ">
                                    <strong>Agregar cotización taller</strong>
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

                                    <input class="form-control" type="text" name="nombre_taller" id="nombre_taller" value="{{$item->TallerOrden->nombre_taller}}" disabled>
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

                                    <input class="form-control" type="text" name="encargado" id="encargado" value="{{$item->TallerOrden->encargado}}" disabled>
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

                                    <input class="form-control" type="number" name="telefono" id="telefono" value="{{$item->TallerOrden->telefono}}" disabled>
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

                                    <input class="form-control" type="email" name="correo" id="correo" value="{{$item->TallerOrden->correo}}" disabled>
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

                                    <input class="form-control" type="text" name="direccion" id="direccion" value="{{$item->TallerOrden->direccion}}" disabled>
                                </div>
                            </div>

                            <div class="col-12 mb-5">
                                <strong>Cotizacion</strong>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input class="form-control" type="file" name="direccion" id="direccion">
                                </div>
                            </div>

                            <div class="col-12 mb-5">
                                <strong>Fotos</strong>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input class="form-control" type="file" name="direccion" id="direccion" multiple>
                                </div>
                            </div>

                            @if ($item->estatus == 'Pendiente de autorización')
                                <div class="col-6">
                                    <p><strong>Servicios</strong></p>
                                    <div class="input-group form-group">
                                        <select class="form-control js-example-basic-multiple" id="servicios_cot[]" name="servicios_cot[]" multiple="multiple">
                                                <option value="">Seleccione servicio</option>
                                                @foreach($servicios as $item)
                                                <option value="{{$item->id}}" data-precio="{{$item->precio}}">{{ $item->servicio}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6 mt-2" >
                                    <label for="">
                                        <p><strong>Importe <b>sin</b> IVA</strong></p>
                                    </label>

                                    <input class="form-control" type="text" name="importe_sin" id="importe_sin" value="0">
                                </div>

                                <div class="col-6 mt-2" >
                                    <label for="">
                                        <p><strong>Importe <b>con</b> IVA</strong></p>
                                    </label>

                                    <input class="form-control" type="text" name="importe_sin" id="importe_sin" value="0">
                                </div>
                            @endif
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

