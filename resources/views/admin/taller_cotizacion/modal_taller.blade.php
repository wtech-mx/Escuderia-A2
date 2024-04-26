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

                                <select class="form-control cliente_cot" id="id_user" name="id_user" required>
                                        <option value="">Seleccione usuario</option>
                                        @foreach($cliente as $item)
                                        <option value="{{$item->id}}">{{ $item->name}} / {{ $item->telefono}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text input-services" >
                                        <img class="" src="{{ asset('img/icon/white/coche (7).png') }}" width="25px" >
                                    </span>
                                </div>

                                <select class="form-control" id="current_auto_cot" name="current_auto_cot" required>
                                <option value="">Seleccione auto</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6 mt-2" >
                            <label for="">
                                <p><strong>Foto o video 1</strong></p>
                            </label>

                            <input class="form-control" type="file" name="foto1" multiple>
                        </div>

                        <div class="col-6 mt-2" >
                            <p><strong>Comentarios</strong></p>
                            <div class="input-group form-group">
                                <textarea name="comentarios" id="comentarios" cols="90" rows="3"></textarea>
                            </div>
                        </div>

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

                            <input class="form-control" type="text" name="importe_con" id="importe_con" value="0">
                        </div>

                        <p class="text-center mt-5">
                            <button class="btn btn-save text-white">
                                <img class="d-inline" src="{{ asset('img/icon/white/save-file-option (1).png') }}" alt="Icon documento" width="30px">
                                Guardar
                            </button>
                        </p>
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

