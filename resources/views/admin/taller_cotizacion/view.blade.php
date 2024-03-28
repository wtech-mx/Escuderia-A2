@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

        <div class="row  bg-down-image-border" >
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

            <div class="col-6 mb-3">
                <div class="input-group form-group">
                    <div class="input-group-prepend " >
                        <span class="input-group-text input-services" >
                            <img class="" src="{{ asset('img/icon/white/placa.png') }}" width="25px" >
                        </span>
                    </div>

                    <textarea name="" id="" cols="40" rows="2">{{$cotizacion->Auto->placas}}</textarea>
                </div>
            </div>

            @foreach ($cotizacion_serivicios as $index => $item)
                <div class="col-12  mb-2">
                    <h3 class="text-center text-white ml-4 mr-4 ">
                        <strong>Servicio #{{ $index + 1 }}</strong>
                    </h3>
                </div>
                <div class="col-6">
                    <p class="text-white"><strong>Servicio</strong></p>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/llantas (3).png') }}" width="25px" >
                            </span>
                        </div>

                        <select class="form-control cliente_cot" id="id_user" name="id_user" disabled>
                                <option value="">{{$item->Servicio->servicio}}</option>
                        </select>
                    </div>
                </div>

                <div class="col-6 mb-2">
                    <p class="text-white"><strong>Subtotal</strong></p>
                    <div class="input-group form-group">
                        <div class="input-group-prepend " >
                            <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}" width="25px" >
                            </span>
                        </div>

                        <select class="form-control cliente_cot" id="id_user" name="id_user" disabled>
                                <option value="">${{$item->Servicio->precio}}.00</option>
                        </select>
                    </div>
                </div>
            @endforeach

            <div class="col-6 mb-3"></div>
            <div class="col-6 mb-3">
                <p class="text-white"><strong>Total</strong></p>
                <div class="input-group form-group">
                    <div class="input-group-prepend " >
                        <span class="input-group-text input-services" >
                            <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}" width="25px" >
                        </span>
                    </div>

                    <select class="form-control cliente_cot" id="id_user" name="id_user" disabled>
                            <option value="">${{$cotizacion->importe_con}}.00</option>
                    </select>
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
@endsection
