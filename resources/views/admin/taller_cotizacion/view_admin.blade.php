@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

        <div class="bg-down-image-border" >
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

                        <input class="form-control" type="date" value="{{$cotizacion->fecha_creacion}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha Asignación de Taller</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="date" value="{{$cotizacion->fecha_asignacion_taller}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha Autorización de Cotización</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="date" value="{{$cotizacion->fecha_atorizacion}}" readonly>
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

                        <input class="form-control" type="date" value="{{$cotizacion->fecha_reparacion}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha de Entrega</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="date" value="{{$cotizacion->fecha_entregar}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha de Factura</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="date" value="{{$cotizacion->fecha_factura}}" readonly>
                    </div>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha Por Pagar</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="date" value="{{$cotizacion->fecha_por_pagar}}" readonly>
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

                        <input class="form-control" type="date" value="{{$cotizacion->fecha_pagado}}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12  mt-5">
                    <h2 class="text-center text-white ml-4 mr-4 ">
                        <strong>Taller asignado</strong>
                    </h2>
                </div>

                <div class="col-6 mb-3 mt-3">
                    <label class="text-white">Fecha Asignado</label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <input class="form-control" type="date" value="{{$taller->fecha}}" readonly>
                    </div>
                </div>
                <div class="col-6"></div>

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
            </div>

            <div class="row">
                <div class="col-12  mt-5">
                    <h2 class="text-center text-white ml-4 mr-4 ">
                        <strong>Orden de Servicio</strong>
                    </h2>
                </div>

                <div class="col-12 mb-3 mt-3">
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

                <div class="col-12 mb-3">
                    <div class="input-group form-group">

                        <textarea name="" id="" cols="70" rows="2">{{$cotizacion->comentarios}}</textarea>
                    </div>
                </div>

                    @if ($cotizacion->foto1 == NULL)
                        <div class="col-6">
                            <img id="blah" src="{{asset('/img/icon/seguros/page-not-found.png') }}" alt="Imagen" style="width: 90px;height: 90px;"/>
                        </div>
                    @else
                        @if (pathinfo($cotizacion->foto1, PATHINFO_EXTENSION) == 'mp4')
                            <div class="col-12">
                                <video controls preload="auto" width="300" height="200" data-setup="{}" style="padding: 10px;">
                                    <source src="{{asset('/cotizacion/usuario'.$cotizacion->id_user.'/'.$cotizacion->foto1)}}" type='video/mp4'>
                                </video>
                            </div>
                        @else
                            <div class="col-6">
                                <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->foto1) }}" alt="Imagen" style="width: 150px;height: 150px;"/>
                                <a class="text-center text-dark btn btn-sm mt-2" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->foto1) }}" target="_blank" style="background: #43eb5f; color: #000000!important">Ver Imagen</a>
                            </div>
                        @endif
                    @endif

                    @if ($cotizacion->foto2 == NULL)
                        <div class="col-6">
                            <img id="blah" src="{{asset('/img/icon/seguros/page-not-found.png') }}" alt="Imagen" style="width: 90px;height: 90px;"/>
                        </div>
                    @else
                        @if (pathinfo($cotizacion->foto2, PATHINFO_EXTENSION) == 'mp4')
                            <div class="col-12">
                                <video controls preload="auto" width="300" height="200" data-setup="{}" style="padding: 10px;">
                                    <source src="{{asset('/cotizacion/usuario'.$cotizacion->id_user.'/'.$cotizacion->foto2)}}" type='video/mp4'>
                                </video>
                            </div>
                        @else
                            <div class="col-6">
                                <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->foto2) }}" alt="Imagen" style="width: 150px;height: 150px;"/>
                                <a class="text-center text-dark btn btn-sm mt-2" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->foto2) }}" target="_blank" style="background: #43eb5f; color: #000000!important">Ver Imagen</a>
                            </div>
                        @endif
                    @endif

                    @if ($cotizacion->foto3 == NULL)
                        <div class="col-6">
                            <img id="blah" src="{{asset('/img/icon/seguros/page-not-found.png') }}" alt="Imagen" style="width: 90px;height: 90px;"/>
                        </div>
                    @else
                        @if (pathinfo($cotizacion->foto3, PATHINFO_EXTENSION) == 'mp4')
                            <div class="col-12">
                                <video controls preload="auto" width="300" height="200" data-setup="{}" style="padding: 10px;">
                                    <source src="{{asset('/cotizacion/usuario'.$cotizacion->id_user.'/'.$cotizacion->foto3)}}" type='video/mp4'>
                                </video>
                            </div>
                        @else
                            <div class="col-6">
                                <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->foto3) }}" alt="Imagen" style="width: 150px;height: 150px;"/>
                                <a class="text-center text-dark btn btn-sm mt-2" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->foto3) }}" target="_blank" style="background: #43eb5f; color: #000000!important">Ver Imagen</a>
                            </div>
                        @endif
                    @endif


                    @if ($cotizacion->foto4 == NULL)
                        <div class="col-6">
                            <img id="blah" src="{{asset('/img/icon/seguros/page-not-found.png') }}" alt="Imagen" style="width: 90px;height: 90px;"/>
                        </div>
                    @else
                        @if (pathinfo($cotizacion->foto4, PATHINFO_EXTENSION) == 'mp4')
                            <div class="col-12">
                                <video controls preload="auto" width="300" height="200" data-setup="{}" style="padding: 10px;">
                                    <source src="{{asset('/cotizacion/usuario'.$cotizacion->id_user.'/'.$cotizacion->foto4)}}" type='video/mp4'>
                                </video>
                            </div>
                        @else
                            <div class="col-6">
                                <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->foto4) }}" alt="Imagen" style="width: 150px;height: 150px;"/>
                                <a class="text-center text-dark btn btn-sm mt-2" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->foto4) }}" target="_blank" style="background: #43eb5f; color: #000000!important">Ver Imagen</a>
                            </div>
                        @endif
                    @endif
            </div>
        </div>
@endsection
