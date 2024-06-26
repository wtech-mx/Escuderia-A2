<div class="modal fade" id="taller-ingreso-{{ $item->id }}" tabindex="-1" aria-labelledby="servicio" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="color: #000000">
                <form method="POST" action="{{route('ingreso.cotizacion_taller', $item->id)}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                            @if ($item->estatus == 'Pendiente de ingreso a taller')
                                <div class="row">
                                    <div class="col-12  mt-5">
                                        <h2 class="text-center ml-4 mr-4 ">
                                            <strong>Fecha y hora ingreso</strong> <br>
                                            <img class="" src="{{ asset('img/icon/black/calendario (3).png') }}" width="60px" >
                                        </h2>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Comentario Solicitante</strong></p>
                                        <div class="input-group form-group">
                                            <textarea  class="form-control" cols="90" rows="3" disabled>
                                                @foreach ($comentarios as $comentario)
                                                    @if ($comentario->id_cotizacion == $item->id && $comentario->estatus == 'Generar la solicitud' )
                                                        {{$comentario->comentario}}
                                                    @endif
                                                @endforeach
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Comentario Admin</strong></p>
                                        <div class="input-group form-group">
                                            <textarea  class="form-control" name="comentario" id="comentario" cols="90" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-5 mb-5">
                                        <strong>Fecha Ingreso</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="date" name="fecha_ingreso" id="fecha_ingreso">
                                        </div>
                                    </div>

                                    <div class="col-6 mt-5 mb-5">
                                        <strong>Hora ingreso</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="time" name="hora_ingreso" id="hora_ingreso">
                                        </div>
                                    </div>

                                    <div class="col-6 mt-5 mb-5">
                                        <strong>KM Actual</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/velocimetro (2).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="text" name="km_taller" id="km_taller">
                                        </div>
                                    </div>
                                </div>
                            @elseif ($item->estatus == 'En espera de cotización')
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <h2 class="text-center ml-4 mr-4 ">
                                            <strong>Fecha y hora cotización</strong> <br>
                                            <img class="" src="{{ asset('img/icon/black/calendario (3).png') }}" width="60px" >
                                        </h2>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Comentario Solicitante</strong></p>
                                        <div class="input-group form-group">
                                            <textarea  class="form-control" cols="90" rows="3" disabled>
                                                @foreach ($comentarios as $comentario)
                                                    @if ($comentario->id_cotizacion == $item->id && $comentario->estatus == 'Generar la solicitud' )
                                                        {{$comentario->comentario}}
                                                    @endif
                                                @endforeach
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Comentario Admin</strong></p>
                                        <div class="input-group form-group">
                                            <textarea  class="form-control" name="comentario_cot" id="comentario_cot" cols="90" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-5 mb-5">
                                        <strong>Fecha Ingreso</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="date" name="fecha_cot" id="fecha_cot">
                                        </div>
                                    </div>

                                    <div class="col-6 mt-5 mb-5">
                                        <strong>Hora ingreso</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="time" name="hora_cot" id="hora_cot">
                                        </div>
                                    </div>
                                </div>
                            @elseif ($item->estatus == 'En reparacion')
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <h2 class="text-center ml-4 mr-4 ">
                                            <strong>Fecha y hora termino de reparación</strong> <br>
                                            <img class="" src="{{ asset('img/icon/black/calendario (3).png') }}" width="60px" >
                                        </h2>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Comentario Solicitante</strong></p>
                                        <div class="input-group form-group">
                                            <textarea  class="form-control" cols="90" rows="3" disabled>
                                                @foreach ($comentarios as $comentario)
                                                    @if ($comentario->id_cotizacion == $item->id && $comentario->estatus == 'Generar la solicitud' )
                                                        {{$comentario->comentario}}
                                                    @endif
                                                @endforeach
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Comentario Admin</strong></p>
                                        <div class="input-group form-group">
                                            <textarea  class="form-control" name="comentario_rep" id="comentario_rep" cols="90" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-5 mb-5">
                                        <strong>Fecha reparación</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="date" name="fecha_rep" id="fecha_rep">
                                        </div>
                                    </div>

                                    <div class="col-6 mt-5 mb-5">
                                        <strong>Hora reparación</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="time" name="hora_rep" id="hora_rep">
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

                                            <input class="form-control" type="file" name="galeria_rep[]" id="galeria_rep[]" multiple>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($item->estatus == 'Por entregar usuario')
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <h2 class="text-center ml-4 mr-4 ">
                                            <strong>Fecha y hora entrega</strong> <br>
                                            <img class="" src="{{ asset('img/icon/black/calendario (3).png') }}" width="60px" >
                                        </h2>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Comentario Solicitante</strong></p>
                                        <div class="input-group form-group">
                                            <textarea  class="form-control" cols="90" rows="3" disabled>
                                                @foreach ($comentarios as $comentario)
                                                    @if ($comentario->id_cotizacion == $item->id && $comentario->estatus == 'Generar la solicitud' )
                                                        {{$comentario->comentario}}
                                                    @endif
                                                @endforeach
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Comentario Admin</strong></p>
                                        <div class="input-group form-group">
                                            <textarea  class="form-control" name="comentario_entrega" id="comentario_entrega" cols="90" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-5 mb-5">
                                        <strong>Fecha entrega</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="date" name="fecha_entrega" id="fecha_entrega">
                                        </div>
                                    </div>

                                    <div class="col-6 mt-5 mb-5">
                                        <strong>Hora entrega</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="time" name="hora_entrega" id="hora_entrega">
                                        </div>
                                    </div>

                                    <div class="col-6 mb-5">
                                        <strong>KM Actual</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/velocimetro (2).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="text" name="km_entrega" id="km_entrega">
                                        </div>
                                    </div>

                                    <div class="col-6 mb-5">
                                        <strong>Fotos</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="file" name="galeria_entrega[]" id="galeria_entrega[]" multiple>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($item->estatus == 'Por cargar factura')
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <h2 class="text-center ml-4 mr-4 ">
                                            <strong>Fecha y hora factura</strong> <br>
                                            <img class="" src="{{ asset('img/icon/black/calendario (3).png') }}" width="60px" >
                                        </h2>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Comentario Solicitante</strong></p>
                                        <div class="input-group form-group">
                                            <textarea  class="form-control" cols="90" rows="3" disabled>
                                                @foreach ($comentarios as $comentario)
                                                    @if ($comentario->id_cotizacion == $item->id && $comentario->estatus == 'Generar la solicitud' )
                                                        {{$comentario->comentario}}
                                                    @endif
                                                @endforeach
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Comentario Admin</strong></p>
                                        <div class="input-group form-group">
                                            <textarea  class="form-control" name="comentario_factura" id="comentario_factura" cols="90" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-6 mb-5">
                                        <strong>Cargar factura</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="file" name="factura[]" id="factura">
                                        </div>
                                    </div>
                                </div>
                            @elseif ($item->estatus == 'Por pagar')
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <h2 class="text-center ml-4 mr-4 ">
                                            <strong>Fecha y hora pagado</strong> <br>
                                            <img class="" src="{{ asset('img/icon/black/calendario (3).png') }}" width="60px" >
                                        </h2>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Comentario Solicitante</strong></p>
                                        <div class="input-group form-group">
                                            <textarea  class="form-control" cols="90" rows="3" disabled>
                                                @foreach ($comentarios as $comentario)
                                                    @if ($comentario->id_cotizacion == $item->id && $comentario->estatus == 'Generar la solicitud' )
                                                        {{$comentario->comentario}}
                                                    @endif
                                                @endforeach
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Comentario Admin</strong></p>
                                        <div class="input-group form-group">
                                            <textarea  class="form-control" name="comentario_por_pagar" id="comentario_por_pagar" cols="90" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-6 mb-5">
                                        <strong>Comprobante pago</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="file" name="por_pagar[]" id="por_pagar">
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <p class="text-center">
                                <button class="btn btn-sm btn-save text-white">
                                    <img class="d-inline" src="{{ asset('img/icon/white/save-file-option (1).png') }}" alt="Icon documento" width="30px">
                                    Actualizar
                                </button>
                            </p>
                </form>
            </div>
        </div>
    </div>
</div>

