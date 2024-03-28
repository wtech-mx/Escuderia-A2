<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <h5 class="modal-title" id="exampleModalLongTitle">Crear Cotizacion</h5>
        <form method="POST" action="{{route('store.cotizacion_taller')}}" enctype="multipart/form-data" role="form">
            @csrf
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

                    <input class="form-control" type="file" name="foto1">
                </div>

                <div class="col-6 mt-2" >
                    <label for="">
                        <p><strong>Foto o video 2</strong></p>
                    </label>

                    <input class="form-control" type="file" name="foto2">
                </div>

                <div class="col-6 mt-2" >
                    <label for="">
                        <p><strong>Foto o video 3</strong></p>
                    </label>

                    <input class="form-control" type="file" name="foto3">
                </div>

                <div class="col-6 mt-2" >
                    <label for="">
                        <p><strong>Foto o video 4</strong></p>
                    </label>

                    <input class="form-control" type="file" name="foto4">
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
                                <option value="{{$item->id}}" data-precio="{{$item->precio}}">{{ $item->servicio}} / ${{ $item->precio}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-6 mt-2" >
                    <label for="">
                        <p><strong>Importe <b>sin</b> IVA</strong></p>
                    </label>

                    <input class="form-control" type="text" name="importe_sin" id="importe_sin" value="0" readonly>
                </div>

                <div class="col-6 mt-2" >
                    <label for="">
                        <p><strong>Importe <b>con</b> IVA</strong></p>
                    </label>

                    <input class="form-control" type="text" name="importe_con" id="importe_con" value="0" readonly>
                </div>

                <p class="text-center mt-5">
                    <button class="btn btn-save text-white">
                        <img class="d-inline" src="{{ asset('img/icon/white/save-file-option (1).png') }}" alt="Icon documento" width="30px">
                        Guardar
                    </button>
                </p>
            </div>
        </form>
    </div>
</div>

