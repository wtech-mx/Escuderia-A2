<div class="modal fade" id="taller-edit-{{ $item->id }}" tabindex="-1" aria-labelledby="servicio" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="color: #000000">
                <form method="POST" action="{{route('edit_cot_taller.cotizacion_taller', $item->id)}}" enctype="multipart/form-data" role="form">
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

                                    <input class="form-control" type="file" name="cotizaion_cot" id="cotizaion_cot">
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

                                    <input class="form-control" type="file" name="galeria_cot[]" id="galeria_cot[]" multiple>
                                </div>
                            </div>

                                <div class="container">
                                    <div id="serviciosContainer_{{ $item->id }}">
                                        <div class="servicio-item" id="servicioItem_0_{{ $item->id }}">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p><strong>Servicio</strong></p>
                                                    <div class="input-group form-group">
                                                        <select class="form-control servicio-select" name="servicios_cot[]" id="servicioSelect_0_{{ $item->id }}">
                                                            <option value="">Seleccione servicio</option>
                                                            @foreach($servicios as $servicio)
                                                                <option value="{{ $servicio->id }}" data-precio="{{ $servicio->precio }}">{{ $servicio->servicio }}</option>
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
                                                        <input class="form-control precio-input" type="number" name="precio_cot[]" id="precioInput_0_{{ $item->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-info addServicioBtn" data-registro-id="{{ $item->id }}">Agregar Servicio</button>
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

