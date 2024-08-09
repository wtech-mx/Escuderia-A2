<div class="modal fade" id="taller-ingreso-{{ $item->id }}" tabindex="-1" aria-labelledby="servicio" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="color: #000000">
                <form method="POST" action="{{route('ingreso.cotizacion_taller', $item->id)}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">

                    @php

                        if(!isset($item->Auto->Marca->nombre)){

                            $nombreMarca = 'Sin nombre';

                        }else if(empty($item->Auto->Marca->nombre)){

                            $nombreMarca = 'Sin nombre';

                        }else{

                            $nombreMarca = $item->Auto->Marca->nombre;

                        }

                        if(!isset($item->Auto->id)){

                            $nombreAutoId = 'Sin nombre';

                        }else if(empty($item->Auto->id)){

                            $nombreAutoId = 'Sin nombre';

                        }else{

                            $nombreAutoId = $item->Auto->id;

                        }

                    @endphp

                    <input class="form-control" type="hidden" value="{{ $nombreAutoId}}" name="auto_id">
                    <input class="form-control" type="hidden" value="{{$item->User->id}}" name="userbussines" >

                            @if ($item->estatus == 'Pendiente de ingreso a taller')
                                <input type="hidden" name="estatus_coti" value="En espera de cotizacion">
                                <div class="row">
                                    <div class="col-12  mt-5">
                                        <h2 class="text-center ml-4 mr-4 ">
                                            <strong>Fecha y hora ingreso</strong> <br>
                                            <img class="" src="{{ asset('img/icon/black/calendario (3).png') }}" width="60px" >
                                        </h2>
                                    </div>

                                    <div class="col-6">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input class="form-control" type="text" value="{{$item->User->name}}"disabled>

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

                                    <div class="col-6">

                                    </div>

                                    <div class="col-6">
                                        @foreach ($comentarios as $comentario)
                                            @if ($comentario->id_cotizacion == $item->id && $comentario->estatus != 'Generar la solicitud' )
                                            <input class="form-control" type="text" name="comentario" id="comentario" value="{{$comentario->comentario}}" disabled>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Describe el serv./falla</strong></p>
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
                                            <input class="form-control" type="text" name="comentario" id="comentario">
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
                            @elseif ($item->estatus == 'En espera de cotizacion')
                                <input type="hidden" name="estatus_coti" value="En espera de cotizacion">
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <h2 class="text-center ml-4 mr-4 ">
                                            <strong>Fecha y hora cotización</strong> <br>
                                            <img class="" src="{{ asset('img/icon/black/calendario (3).png') }}" width="60px" >
                                        </h2>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Describe el serv./falla</strong></p>
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
                                            <input class="form-control" type="text" name="comentario_cot" id="comentario_cot">
                                        </div>
                                    </div>

                                    <div class="col-6 mt-5 mb-5">
                                        <strong>Fecha Cotización</strong>
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
                                        <strong>Hora Cotización</strong>
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
                                <input type="hidden" name="estatus_coti" value="En reparacion">
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <h2 class="text-center ml-4 mr-4 ">
                                            <strong>Fecha y hora termino de reparación</strong> <br>
                                            <img class="" src="{{ asset('img/icon/black/calendario (3).png') }}" width="60px" >
                                        </h2>
                                    </div>

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

                                    <div class="col-6">

                                    </div>

                                    <div class="col-6">
                                        @foreach ($comentarios as $comentario)
                                            @if ($comentario->id_cotizacion == $item->id && $comentario->estatus != 'Generar la solicitud' )
                                            <input class="form-control" type="text" name="comentario" id="comentario" value="{{$comentario->comentario}}" disabled>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Describe el serv./falla</strong></p>
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
                                            <input class="form-control" type="text" name="comentario_rep" id="comentario_rep">
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
                                </div>
                            @elseif ($item->estatus == 'Por entregar usuario')
                                <input type="hidden" name="estatus_coti" value="Por entregar usuario">
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <h2 class="text-center ml-4 mr-4 ">
                                            <strong>Fecha y hora entrega</strong> <br>
                                            <img class="" src="{{ asset('img/icon/black/calendario (3).png') }}" width="60px" >
                                        </h2>
                                    </div>

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

                                    <div class="col-6">

                                    </div>

                                    <div class="col-6">
                                        @foreach ($comentarios as $comentario)
                                            @if ($comentario->id_cotizacion == $item->id && $comentario->estatus != 'Generar la solicitud' )
                                            <input class="form-control" type="text" name="comentario" id="comentario" value="{{$comentario->comentario}}" disabled>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Describe el serv./falla</strong></p>
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
                                            <input class="form-control" type="text" name="comentario_entrega" id="comentario_entrega">
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
                                        <strong>Encuesta</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                </span>
                                            </div>
                                            <input class="form-control" type="file" name="galeria_entrega[]" id="galeria_entrega[]" multiple>
                                        </div>
                                    </div>

                                    <div class="col-6 mb-5">
                                        <strong>INE</strong>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                    <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                </span>
                                            </div>
                                            <input class="form-control" type="file" name="galeria_entrega_ine[]" id="galeria_entrega_ine[]" multiple>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($item->estatus == 'Por cargar factura')
                                <input type="hidden" name="estatus_coti" value="Por cargar factura">
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <h2 class="text-center ml-4 mr-4 ">
                                            <strong>Fecha y hora factura</strong> <br>
                                            <img class="" src="{{ asset('img/icon/black/calendario (3).png') }}" width="60px" >
                                        </h2>
                                    </div>

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

                                    <div class="col-6">

                                    </div>

                                    <div class="col-6">
                                        @foreach ($comentarios as $comentario)
                                            @if ($comentario->id_cotizacion == $item->id && $comentario->estatus != 'Generar la solicitud' )
                                            <input class="form-control" type="text" name="comentario" id="comentario" value="{{$comentario->comentario}}" disabled>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Describe el serv./falla</strong></p>
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
                                            <input class="form-control" type="text" name="comentario_factura" id="comentario_factura">
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
                                <input type="hidden" name="estatus_coti" value="Por pagar">
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <h2 class="text-center ml-4 mr-4 ">
                                            <strong>Fecha y hora pagado</strong> <br>
                                            <img class="" src="{{ asset('img/icon/black/calendario (3).png') }}" width="60px" >
                                        </h2>
                                    </div>

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

                                    <div class="col-6">

                                    </div>

                                    <div class="col-6">
                                        @foreach ($comentarios as $comentario)
                                            @if ($comentario->id_cotizacion == $item->id && $comentario->estatus != 'Generar la solicitud' )
                                            <input class="form-control" type="text" name="comentario" id="comentario" value="{{$comentario->comentario}}" disabled>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mt-2" >
                                        <p><strong>Describe el serv./falla</strong></p>
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
                                            <input class="form-control" type="text" name="comentario_por_pagar" id="comentario_por_pagar">
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

                                            <input class="form-control" type="date" name="fecha_por_pagar" id="fecha_por_pagar">
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

                                            <input class="form-control" type="time" name="hora_por_pagar" id="hora_por_pagar">
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

