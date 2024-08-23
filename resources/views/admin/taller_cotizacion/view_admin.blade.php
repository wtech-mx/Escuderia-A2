@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

        <div class="bg-down-image-border mb-5" >
            {{----------------------------------------------------------------------------
            |Datos Orden de Servicio
            |----------------------------------------------------------------------------}}
            <div class="row">
                <div class="col-12  mt-5">
                    <h2 class="text-center text-white ml-4 mr-4 ">
                        <strong>Datos Orden de Servicio</strong>
                    </h2>
                </div>

                <div class="col-12 mb-3 mt-3">
                    <label class="text-white">Usuario</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <select class="form-control cliente_cot" id="id_user" name="id_user" disabled>
                                <option value="">{{$cotizacion->User->name}}</option>
                        </select>
                    </div>
                </div>

                <div class="col-6 mb-3">
                    <label class="text-white">Submarca</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/coche (4).png') }}" width="25px" >
                            </span>
                        </div>

                        <select class="form-control cliente_cot" id="id_user" name="id_user" disabled>
                                <option value="">{{$cotizacion->Auto->submarca}}</option>
                        </select>
                    </div>
                </div>

                <div class="col-6 mb-3">
                    <label class="text-white">Placas</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/placa.png') }}" width="25px" >
                            </span>
                        </div>

                        <select class="form-control cliente_cot" id="id_user" name="id_user" disabled>
                                <option value="">{{$cotizacion->Auto->placas}}</option>
                        </select>
                    </div>
                </div>

                <div class="col-4 mb-3 mt-3">
                    <label class="text-white">KM Inicial</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="number" value="{{$cotizacion->km_actual}}" readonly>
                    </div>
                </div>

                <div class="col-4 mb-3 mt-3">
                    <label class="text-white">KM Ingreso</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="number" value="{{$cotizacion->km_taller}}" readonly>
                    </div>
                </div>

                <div class="col-4 mb-3 mt-3">
                    <label class="text-white">KM Entrega</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="number" value="{{$cotizacion->km_entrega}}" readonly>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <label class="text-white">Estatus Actual</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="text" value="{{$cotizacion->estatus}}" readonly>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <h2 class="text-center text-white ml-4 mr-4 ">
                        <strong>Fotos del cliente</strong>
                    </h2>
                </div>

                @foreach ($fotos as $foto)
                    <div class="col-4 mb-3">
                        @if ($foto->estatus == 'Generar la solicitud')
                            @if ($foto == NULL)
                                <div class="col-6">
                                    <img id="blah" src="{{asset('/img/icon/seguros/page-not-found.png') }}" alt="Imagen" style="width: 90px;height: 90px;"/>
                                </div>
                            @else
                                @if (pathinfo($foto->imagen, PATHINFO_EXTENSION) == 'mp4')
                                    <div class="col-12">
                                        <video controls preload="auto" width="300" height="200" data-setup="{}" style="padding: 10px;">
                                            <source src="{{asset('/cotizacion/usuario'.$cotizacion->id_user.'/'.$foto->imagen)}}" type='video/mp4'>
                                        </video>
                                    </div>
                                @else
                                    <div class="col-6">
                                        <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" alt="Imagen" style="width: 150px;height: 150px;"/>
                                        <a class="text-center text-dark btn btn-sm mt-2" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" target="_blank" style="background: #43eb5f; color: #000000!important">Ver Imagen</a>
                                    </div>
                                @endif
                            @endif
                        @endif
                    </div>
                @endforeach

                <div class="col-12 mb-3" >
                    <label class="text-white">Describe el serv./falla</label>
                    <div class="input-group form-group">
                        @foreach ($comentarios as $comentario)
                            @if ($comentario->estatus == 'Generar la solicitud' )
                                <input class="form-control" type="text" value="{{$comentario->comentario}}" readonly>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            {{----------------------------------------------------------------------------
            |Fechas de Estatus
            |----------------------------------------------------------------------------}}
            <div class="row">
                <h2 class="text-center text-white ml-4 mr-4 ">
                    <strong>Fechas de Estatus</strong>
                </h2>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha Solicitado</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="dateTime" value="{{$cotizacion->fecha_creacion}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha Asignacion de taller</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="dateTime" value="{{$cotizacion->fecha_asignacion_taller}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha Ingreso a Taller</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="dateTime" value="{{$cotizacion->fecha_ingreso_taller}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha Cotizacion Recibida</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="dateTime" value="{{$cotizacion->fecha_cotizacion}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha Cotizacion Autorizada</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="dateTime" value="{{$cotizacion->fecha_autorizada}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha de Reparación</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="dateTime" value="{{$cotizacion->fecha_reparado}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha Entregado</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="dateTime" value="{{$cotizacion->fecha_entregado}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha Factura</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="dateTime" value="{{$cotizacion->fecha_factura}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha Pagado</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="dateTime" value="{{$cotizacion->fecha_pagado}}" readonly>
                    </div>
                </div>
            </div>
            {{----------------------------------------------------------------------------
            |Comentarios
            |----------------------------------------------------------------------------}}
            <div class="row">
                <div class="col-12  mt-5">
                    <h2 class="text-center text-white ml-4 mr-4 ">
                        <strong>Comentarios</strong>
                    </h2>
                </div>

                <div class="col-12 mb-3 mt-3" style="background: #fff;">
                    @foreach ($comentarios as $comentario)
                          <h5> <b>{{$comentario->estatus}}</b></h5>
                          <h5> {{$comentario->fecha}} - {{$comentario->comentario}}</h5>
                    @endforeach
                </div>
            </div>

            {{----------------------------------------------------------------------------
            |Taller asignado
            |----------------------------------------------------------------------------}}
            <div class="row">
                <div class="col-12  mt-5">
                    <h2 class="text-center text-white ml-4 mr-4 ">
                        <strong>Taller</strong>
                    </h2>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Taller</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="text" value="{{$taller->nombre_taller}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Encargado</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="text" value="{{$taller->encargado}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Telefono</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="text" value="{{$taller->telefono}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Correo</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="text" value="{{$taller->correo}}" readonly>
                    </div>
                </div>

                <div class="col-12 mb-3 mt-3">
                    <label class="text-white">Dirección</label>
                    <div class="input-group form-group">

                        <textarea name="" id="" cols="70" rows="2">{{$cotizacion->direccion}}</textarea>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <h2 class="text-center text-white ml-4 mr-4 ">
                        <strong>Evidencias del taller</strong>
                    </h2>
                </div>

                @foreach ($fotos as $foto)
                    <div class="col-4 mb-3">
                        @if ($foto->estatus == 'Pendiente de autorización')
                            @if ($foto == NULL)
                                <div class="col-6">
                                    <img id="blah" src="{{asset('/img/icon/seguros/page-not-found.png') }}" alt="Imagen" style="width: 90px;height: 90px;"/>
                                </div>
                            @else
                                @if (pathinfo($foto->imagen, PATHINFO_EXTENSION) == 'mp4')
                                    <div class="col-12">
                                        <video controls preload="auto" width="300" height="200" data-setup="{}" style="padding: 10px;">
                                            <source src="{{asset('/cotizacion/usuario'.$cotizacion->id_user.'/'.$foto->imagen)}}" type='video/mp4'>
                                        </video>
                                    </div>
                                @else
                                    <div class="col-6">
                                        <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" alt="Imagen" style="width: 150px;height: 150px;"/>
                                        <a class="text-center text-dark btn btn-sm mt-2" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" target="_blank" style="background: #43eb5f; color: #000000!important">Ver Imagen</a>
                                    </div>
                                @endif
                            @endif
                        @endif
                    </div>
                @endforeach
            </div>

            {{----------------------------------------------------------------------------
            |Cotizacion aprobada
            |----------------------------------------------------------------------------}}
            <div class="row mb-5">
                <div class="col-12 mb-3">
                    <h2 class="text-center text-white ml-4 mr-4 ">
                        <strong>Cotización Aprobada</strong>
                    </h2>
                </div>

                @if ($cotizacion->fecha_cotizacion != NULL)
                    @if (pathinfo($cotizacion->cotizacion_taller, PATHINFO_EXTENSION) == 'pdf')
                        <div class="col-12">
                            <iframe class="mt-2" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->cotizacion_taller) }}" style="width: 80%; height: 80px;"></iframe>
                            <p class="text-center ">
                                <a class="btn btn-sm text-dark" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->cotizacion_taller) }}" target="_blank" style="background: #836262; color: #ffff!important">Ver archivo</a>
                            </p>
                        </div>
                    @else
                        <div class="col-6">
                            <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->cotizacion_taller) }}" alt="Imagen" style="width: 150px;height: 150px;"/>
                            <a class="text-center text-dark btn btn-sm mt-2" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->cotizacion_taller) }}" target="_blank" style="background: #43eb5f; color: #000000!important">Ver Imagen</a>
                        </div>
                    @endif

                    <div class="col-12 mb-3 mt-3" style="background: #fff;">
                        <h3>Serivicios Autorizados</h3>
                        <ul>
                            @foreach ($cotizacion_serivicios as $cotizacion_serivicio)
                                <li>{{$cotizacion_serivicio->Servicio->familia}} / {{$cotizacion_serivicio->Servicio->servicio}} - <b>${{$cotizacion_serivicio->subtotal}}</b></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-6">
                        <strong class="text-white">Importe total Total</strong>
                        <input class="form-control" type="number" value="{{ $cotizacion->total }}" disabled>
                    </div>
                    <div class="col-6">
                        <strong class="text-white">Total con IVA</strong>
                        <input class="form-control" type="number" value="{{ $cotizacion->total_iva }}" disabled>
                    </div>
                    <div class="col-6">
                        <strong class="text-white">IVA %</strong>
                        <input class="form-control" type="number" value="{{ $cotizacion->iva }}" disabled>
                    </div>
                @endif
            </div>

            {{----------------------------------------------------------------------------
            |Entregado
            |----------------------------------------------------------------------------}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h2 class="text-center text-white ml-4 mr-4 ">
                        <strong>Encuesta</strong>
                    </h2>
                </div>

                @foreach ($fotos as $foto)
                    <div class="col-4 mb-3">
                        @if ($foto->estatus == 'Encuesta')
                            @if ($foto == NULL)
                                <div class="col-6">
                                    <img id="blah" src="{{asset('/img/icon/seguros/page-not-found.png') }}" alt="Imagen" style="width: 90px;height: 90px;"/>
                                </div>
                            @else
                                @if (pathinfo($foto->imagen, PATHINFO_EXTENSION) == 'pdf')
                                    <div class="col-12">
                                        <iframe class="mt-2" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" style="width: 80%; height: 80px;"></iframe>
                                        <p class="text-center ">
                                            <a class="btn btn-sm text-dark" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" target="_blank" style="background: #836262; color: #ffff!important">Ver archivo</a>
                                        </p>
                                    </div>
                                @else
                                    <div class="col-6">
                                        <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" alt="Imagen" style="width: 150px;height: 150px;"/>
                                        <a class="text-center text-dark btn btn-sm mt-2" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" target="_blank" style="background: #43eb5f; color: #000000!important">Ver Imagen</a>
                                    </div>
                                @endif
                            @endif
                        @endif
                    </div>
                @endforeach

                <div class="col-12 mb-3">
                    <h2 class="text-center text-white ml-4 mr-4 ">
                        <strong>INE</strong>
                    </h2>
                </div>

                @foreach ($fotos as $foto)
                    <div class="col-4 mb-3">
                        @if ($foto->estatus == 'INE')
                            @if ($foto == NULL)
                                <div class="col-6">
                                    <img id="blah" src="{{asset('/img/icon/seguros/page-not-found.png') }}" alt="Imagen" style="width: 90px;height: 90px;"/>
                                </div>
                            @else
                                @if (pathinfo($foto->imagen, PATHINFO_EXTENSION) == 'pdf')
                                    <div class="col-12">
                                        <iframe class="mt-2" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" style="width: 80%; height: 80px;"></iframe>
                                        <p class="text-center ">
                                            <a class="btn btn-sm text-dark" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" target="_blank" style="background: #836262; color: #ffff!important">Ver archivo</a>
                                        </p>
                                    </div>
                                @else
                                    <div class="col-6">
                                        <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" alt="Imagen" style="width: 150px;height: 150px;"/>
                                        <a class="text-center text-dark btn btn-sm mt-2" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" target="_blank" style="background: #43eb5f; color: #000000!important">Ver Imagen</a>
                                    </div>
                                @endif
                            @endif
                        @endif
                    </div>
                @endforeach
            </div>

            {{----------------------------------------------------------------------------
            |Factura
            |----------------------------------------------------------------------------}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h2 class="text-center text-white ml-4 mr-4 ">
                        <strong>Factura</strong>
                    </h2>
                </div>

                @foreach ($fotos as $foto)
                    <div class="col-4 mb-3">
                        @if ($foto->estatus == 'Por cargar factura')
                            @if ($foto == NULL)
                                <div class="col-6">
                                    <img id="blah" src="{{asset('/img/icon/seguros/page-not-found.png') }}" alt="Imagen" style="width: 90px;height: 90px;"/>
                                </div>
                            @else
                                @if (pathinfo($foto->imagen, PATHINFO_EXTENSION) == 'pdf')
                                    <div class="col-12">
                                        <iframe class="mt-2" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" style="width: 80%; height: 80px;"></iframe>
                                        <p class="text-center ">
                                            <a class="btn btn-sm text-dark" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" target="_blank" style="background: #836262; color: #ffff!important">Ver archivo</a>
                                        </p>
                                    </div>
                                @else
                                    <div class="col-6">
                                        <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" alt="Imagen" style="width: 150px;height: 150px;"/>
                                        <a class="text-center text-dark btn btn-sm mt-2" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" target="_blank" style="background: #43eb5f; color: #000000!important">Ver Imagen</a>
                                    </div>
                                @endif
                            @endif
                        @endif
                    </div>
                @endforeach
            </div>

            {{----------------------------------------------------------------------------
            |Pagado
            |----------------------------------------------------------------------------}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h2 class="text-center text-white ml-4 mr-4 ">
                        <strong>Pago</strong>
                    </h2>
                </div>

                @foreach ($fotos as $foto)
                    <div class="col-4 mb-3">
                        @if ($foto->estatus == 'Por pagar')
                            @if ($foto == NULL)
                                <div class="col-6">
                                    <img id="blah" src="{{asset('/img/icon/seguros/page-not-found.png') }}" alt="Imagen" style="width: 90px;height: 90px;"/>
                                </div>
                            @else
                                @if (pathinfo($foto->imagen, PATHINFO_EXTENSION) == 'pdf')
                                    <div class="col-12">
                                        <iframe class="mt-2" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" style="width: 80%; height: 80px;"></iframe>
                                        <p class="text-center ">
                                            <a class="btn btn-sm text-dark" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" target="_blank" style="background: #836262; color: #ffff!important">Ver archivo</a>
                                        </p>
                                    </div>
                                @else
                                    <div class="col-6">
                                        <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" alt="Imagen" style="width: 150px;height: 150px;"/>
                                        <a class="text-center text-dark btn btn-sm mt-2" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" target="_blank" style="background: #43eb5f; color: #000000!important">Ver Imagen</a>
                                    </div>
                                @endif
                            @endif
                        @endif
                    </div>
                @endforeach
            </div>


            <div class="row">
                <div class="col-12 mb-5">
                </div>
            </div>
        </div>
@endsection
