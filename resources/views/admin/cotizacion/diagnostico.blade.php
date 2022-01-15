@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

@section('css')
    <link href="{{ asset('css/btn-lateral.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
        <canvas id="canvas" style="width: 0px;height: 0px;">
        </canvas>

        <form class="card-details" method="POST" action="{{route('update.diagnostico', $cotizacion->id)}}" enctype="multipart/form-data" role="form">
            @csrf

                @if(Session::has('success'))
                            <script>
                                Swal.fire({
                                  title: 'Exito!!',
                                  html:
                                    'Se ha actualizado tu  <b>Tarjeta de Circulaci&oacute;n</b>, ' +
                                    'Exitosamente',
                                  // text: 'Se ha agragado la "MARCA" Exitosamente',
                                  imageUrl: '{{ asset('img/icon/color/dosier.png') }}',
                                  background: '#fff',
                                  imageWidth: 150,
                                  imageHeight: 150,
                                  imageAlt: 'USUARIO IMG',
                                })
                            </script>
                @endif
            <div class="row bg-down-image-border"   style=" min-height: 10vh">
                        <div class="col-2 mt-5"  >
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white">

                                        @if (Auth::check() == true)
                                            @if (auth()->user()->role != 0)
                                                <a href="{{ route('index.cotizacion') }}" style="background-color: transparent;clip-path: none">
                                                    <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                                </a>
                                            @else
                                                <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                                                    <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                                </a>
                                            @endif
                                        @endif

                                    </div>
                            </div>
                        </div>

                        <div class="col-8 mt-5">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong>Hoja de diagnostico</strong>

                                    </h5>
                        </div>

                        <div class="col-2 mt-5">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        <div class="col-6  mt-4">
                            <p class="text-center  ml-4 mr-4 " style="color:#00ff37;font-weight: bold;">
                                Fecha:
                            </p>
                            <div class="text-center text-white ml-4 mr-4 ">
                                <input type="date" class="form-control" id="fecha" name="fecha" value="{{$cotizacion->Cotizacion->fecha}}">
                            </div>
                        </div>

                        <div class="col-6  mt-4">
                            <p class="text-center  ml-4 mr-4 " style="color:#00ff37;font-weight: bold;">
                                Telefono:
                            </p>
                            <h5 class="text-center text-white ml-4 mr-4 ">
                                <strong>{{$cotizacion->Cotizacion->User->telefono}}</strong>
                            </h5>
                        </div>

                        <div class="col-6  mt-4">
                            <p class="text-center  ml-4 mr-4 " style="color:#00ff37;font-weight: bold;">
                                Nombre:
                            </p>
                            <h5 class="text-center text-white ml-4 mr-4 ">
                                <strong>{{$cotizacion->Cotizacion->User->name}}</strong>
                            </h5>
                        </div>

                        <div class="col-6  mt-4">
                            <p class="text-center  ml-4 mr-4 " style="color:#00ff37;font-weight: bold;">
                                Submarca:
                            </p>
                            <h5 class="text-center text-white ml-4 mr-4 ">
                                <strong>{{$cotizacion->Cotizacion->Automovil->submarca}}</strong>
                            </h5>
                        </div>

                        <div class="col-6  mt-4">
                            <p class="text-center  ml-4 mr-4 " style="color:#00ff37;font-weight: bold;">
                                Placas:
                            </p>
                            <h5 class="text-center text-white ml-4 mr-4 ">
                                <strong>{{$cotizacion->Cotizacion->Automovil->placas}}</strong>
                            </h5>
                        </div>

                        <div class="col-6  mt-4">
                            <p class="text-center  ml-4 mr-4 " style="color:#00ff37;font-weight: bold;">
                                Kilometraje:
                            </p>
                            <h5 class="text-center text-white ml-4 mr-4 ">
                                <strong>{{$cotizacion->Cotizacion->km}}</strong>
                            </h5>
                        </div>
            </div>

                    <div class="row  bg-down-image-border">

                        <div class="col-12  mt-5">
                            <h3 class="text-center  ml-4 mr-4 " style="color:#00ff37;font-weight: bold;">
                                Diagnostico
                            </h3>


                                <div  id="canvasDiv">

                                    <table id="seguro" class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Revisión de:</th>
                                                <th scope="col">Bueno</th>
                                                <th scope="col">Regular</th>
                                                <th scope="col">Malo</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>
                                                    Carroceria
                                                </th>
                                                <td><div class="bueno">
                                                    @if ( $cotizacion->carroceria == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="carroceria" id="carroceria" checked>
                                                        @else
                                                        <input class="form-check-input" value="1" type="radio" name="carroceria" id="carroceria">
                                                    @endif
                                                    </div>
                                                </td>
                                                <td><div class="regular">
                                                        @if ($cotizacion->carroceria == 2)
                                                        <input class="form-check-input" value="2" type="radio" name="carroceria" id="carroceria" checked>
                                                        @else
                                                        <input class="form-check-input" value="2" type="radio" name="carroceria" id="carroceria">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td><div class="malo">
                                                        @if ($cotizacion->carroceria == 3)
                                                        <input class="form-check-input" value="3" type="radio" name="carroceria" id="carroceria" checked>
                                                        @else
                                                        <input class="form-check-input" value="3" type="radio" name="carroceria" id="carroceria">
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="color: #00ff37">
                                                <th>
                                                Suspención
                                                </th>
                                            </tr>

                                                <tr>
                                                    <th>
                                                        Delantera
                                                    </th>
                                                    <td>
                                                        <div class="bueno">
                                                        @if($cotizacion->suspencion_d == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="suspencion_d" id="suspencion_d" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="suspencion_d" id="suspencion_d">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->suspencion_d == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="suspencion_d" id="suspencion_d" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="suspencion_d" id="suspencion_d">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->suspencion_d == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="suspencion_d" id="suspencion_d" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="suspencion_d" id="suspencion_d">
                                                        @endif
                                                        </div></td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        Trasera
                                                    </th>
                                                    <td><div class="bueno">
                                                        @if($cotizacion->suspencion_t == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="suspencion_t" id="suspencion_t" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="suspencion_t" id="suspencion_t">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->suspencion_t == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="suspencion_t" id="suspencion_t" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="suspencion_t" id="suspencion_t">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->suspencion_t == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="suspencion_t" id="suspencion_t" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="suspencion_t" id="suspencion_t">
                                                        @endif
                                                        </div></td>
                                                </tr>

                                                <tr style="color: #00ff37">
                                                    <th>
                                                        Frenos
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        Delanteros
                                                    </th>
                                                    <td><div class="bueno">
                                                        @if($cotizacion->frenos_d == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="frenos_d" id="frenos_d" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="frenos_d" id="frenos_d">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->frenos_d == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="frenos_d" id="frenos_d" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="frenos_d" id="frenos_d">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->frenos_d == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="frenos_d" id="frenos_d" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="frenos_d" id="frenos_d">
                                                        @endif
                                                        </div></td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        Traseros
                                                    </th>
                                                    <td><div class="bueno">
                                                        @if($cotizacion->frenos_t == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="frenos_t" id="frenos_t" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="frenos_t" id="frenos_t">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->frenos_t == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="frenos_t" id="frenos_t" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="frenos_t" id="frenos_t">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->frenos_t == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="frenos_t" id="frenos_t" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="frenos_t" id="frenos_t">
                                                        @endif
                                                        </div></td>
                                                </tr>

                                                <tr style="color: #00ff37">
                                                    <th>
                                                        Llantas
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        Delanteras
                                                    </th>
                                                    <td><div class="bueno">
                                                        @if($cotizacion->llantas_d == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="llantas_d" id="llantas_d" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="llantas_d" id="llantas_d">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->llantas_d == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="llantas_d" id="llantas_d" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="llantas_d" id="llantas_d">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->llantas_d == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="llantas_d" id="llantas_d" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="llantas_d" id="llantas_d">
                                                        @endif
                                                        </div></td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        Traseras
                                                    </th>
                                                    <td><div class="bueno">
                                                        @if($cotizacion->llantas_t == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="llantas_t" id="llantas_t" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="llantas_t" id="llantas_t">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->llantas_t == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="llantas_t" id="llantas_t" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="llantas_t" id="llantas_t">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->llantas_t == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="llantas_t" id="llantas_t" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="llantas_t" id="llantas_t">
                                                        @endif
                                                        </div></td>
                                                </tr>

                                                <tr style="color: #00ff37">
                                                    <th>
                                                        Luces Y Bateria
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        Delanteras
                                                    </th>
                                                    <td><div class="bueno">
                                                        @if($cotizacion->luces_d == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="luces_d" id="luces_d" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="luces_d" id="luces_d">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->luces_d == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="luces_d" id="luces_d" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="luces_d" id="luces_d">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->luces_d == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="luces_d" id="luces_d" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="luces_d" id="luces_d">
                                                        @endif
                                                        </div></td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        Traseras
                                                    </th>
                                                    <td><div class="bueno">
                                                        @if($cotizacion->luces_t == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="luces_t" id="luces_t" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="luces_t" id="luces_t">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->luces_t == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="luces_t" id="luces_t" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="luces_t" id="luces_t">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->luces_t == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="luces_t" id="luces_t" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="luces_t" id="luces_t">
                                                        @endif
                                                        </div></td>
                                                </tr>

                                                <tr style="color: #00ff37">
                                                    <th>
                                                        Motor
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        Mangueras
                                                    </th>
                                                    <td><div class="bueno">
                                                        @if($cotizacion->mangueras == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="mangueras" id="mangueras" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="mangueras" id="mangueras">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->mangueras == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="mangueras" id="mangueras" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="mangueras" id="mangueras">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->mangueras == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="mangueras" id="mangueras" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="mangueras" id="mangueras">
                                                        @endif
                                                        </div></td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        Aceite
                                                    </th>
                                                    <td><div class="bueno">
                                                        @if($cotizacion->aceite == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="aceite" id="aceite" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="aceite" id="aceite">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->aceite == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="aceite" id="aceite" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="aceite" id="aceite">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->aceite == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="aceite" id="aceite" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="aceite" id="aceite">
                                                        @endif
                                                        </div></td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        Bujias
                                                    </th>
                                                    <td><div class="bueno">
                                                        @if($cotizacion->afinacion_b == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="afinacion_b" id="afinacion_b" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="afinacion_b" id="afinacion_b">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->afinacion_b == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="afinacion_b" id="afinacion_b" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="afinacion_b" id="afinacion_b">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->afinacion_b == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="afinacion_b" id="afinacion_b" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="afinacion_b" id="afinacion_b">
                                                        @endif
                                                        </div></td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        Filtro aire
                                                    </th>
                                                    <td><div class="bueno">
                                                        @if($cotizacion->afinacion_f == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="afinacion_f" id="afinacion_f" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="afinacion_f" id="afinacion_f">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->afinacion_f == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="afinacion_f" id="afinacion_f" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="afinacion_f" id="afinacion_f">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->afinacion_f == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="afinacion_f" id="afinacion_f" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="afinacion_f" id="afinacion_f">
                                                        @endif
                                                        </div></td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Otros
                                                    </th>
                                                    <td><div class="bueno">
                                                        @if($cotizacion->otros == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="otros" id="otros" checked>
                                                            @else
                                                            <input class="form-check-input" value="1" type="radio" name="otros" id="otros">
                                                        @endif
                                                        </div>
                                                    </td>
                                                    <td><div class="regular">
                                                        @if($cotizacion->otros == 2)
                                                            <input class="form-check-input" value="2" type="radio" name="otros" id="otros" checked>
                                                            @else
                                                            <input class="form-check-input" value="2" type="radio" name="otros" id="otros">
                                                        @endif
                                                        </div></td>
                                                    <td><div class="malo">
                                                        @if($cotizacion->otros == 3)
                                                            <input class="form-check-input" value="3" type="radio" name="otros" id="otros" checked>
                                                            @else
                                                            <input class="form-check-input" value="3" type="radio" name="otros" id="otros">
                                                        @endif
                                                        </div></td>
                                                </tr>
                                        </tbody>
                                    </table>

                                    <h3 class="text-center  ml-4 mr-4 " style="color:#00ff37;font-weight: bold;">
                                        Niveles
                                    </h3>

                                    <table id="seguro" class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Niveles</th>
                                                <th scope="col">Normal</th>
                                                <th scope="col">Cambiar</th>
                                                <th scope="col">Rellenar</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($cotizacion_diagnostico as $cotizacion2)

                                            @endforeach
                                            <tr>
                                                <th>
                                                    liquido frenos
                                                </th>
                                                <td><div class="bueno">
                                                    @if ( $cotizacion2->liquido_f == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="liquido_f" id="liquido_f" checked>
                                                        @else
                                                        <input class="form-check-input" value="1" type="radio" name="liquido_f" id="liquido_f">
                                                    @endif
                                                    </div>
                                                </td>
                                                <td><div class="regular">
                                                        @if ($cotizacion2->liquido_f == 2)
                                                        <input class="form-check-input" value="2" type="radio" name="liquido_f" id="liquido_f" checked>
                                                        @else
                                                        <input class="form-check-input" value="2" type="radio" name="liquido_f" id="liquido_f">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td><div class="malo">
                                                        @if ($cotizacion2->liquido_f == 3)
                                                        <input class="form-check-input" value="3" type="radio" name="liquido_f" id="liquido_f" checked>
                                                        @else
                                                        <input class="form-check-input" value="3" type="radio" name="liquido_f" id="liquido_f">
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Anticongelante
                                                </th>
                                                <td><div class="bueno">
                                                    @if ( $cotizacion2->anticongelante == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="anticongelante" id="anticongelante" checked>
                                                        @else
                                                        <input class="form-check-input" value="1" type="radio" name="anticongelante" id="anticongelante">
                                                    @endif
                                                    </div>
                                                </td>
                                                <td><div class="regular">
                                                        @if ($cotizacion2->anticongelante == 2)
                                                        <input class="form-check-input" value="2" type="radio" name="anticongelante" id="anticongelante" checked>
                                                        @else
                                                        <input class="form-check-input" value="2" type="radio" name="anticongelante" id="anticongelante">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td><div class="malo">
                                                        @if ($cotizacion2->anticongelante == 3)
                                                        <input class="form-check-input" value="3" type="radio" name="anticongelante" id="anticongelante" checked>
                                                        @else
                                                        <input class="form-check-input" value="3" type="radio" name="anticongelante" id="anticongelante">
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Aceite de direccion
                                                </th>
                                                <td><div class="bueno">
                                                    @if ( $cotizacion2->aceite_d == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="aceite_d" id="aceite_d" checked>
                                                        @else
                                                        <input class="form-check-input" value="1" type="radio" name="aceite_d" id="aceite_d">
                                                    @endif
                                                    </div>
                                                </td>
                                                <td><div class="regular">
                                                        @if ($cotizacion2->aceite_d == 2)
                                                        <input class="form-check-input" value="2" type="radio" name="aceite_d" id="aceite_d" checked>
                                                        @else
                                                        <input class="form-check-input" value="2" type="radio" name="aceite_d" id="aceite_d">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td><div class="malo">
                                                        @if ($cotizacion2->aceite_d == 3)
                                                        <input class="form-check-input" value="3" type="radio" name="aceite_d" id="aceite_d" checked>
                                                        @else
                                                        <input class="form-check-input" value="3" type="radio" name="aceite_d" id="aceite_d">
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Aceite de transmicion
                                                </th>
                                                <td><div class="bueno">
                                                    @if ( $cotizacion2->aceite_t == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="aceite_t" id="aceite_t" checked>
                                                        @else
                                                        <input class="form-check-input" value="1" type="radio" name="aceite_t" id="aceite_t">
                                                    @endif
                                                    </div>
                                                </td>
                                                <td><div class="regular">
                                                        @if ($cotizacion2->aceite_t == 2)
                                                        <input class="form-check-input" value="2" type="radio" name="aceite_t" id="aceite_t" checked>
                                                        @else
                                                        <input class="form-check-input" value="2" type="radio" name="aceite_t" id="aceite_t">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td><div class="malo">
                                                        @if ($cotizacion2->aceite_t == 3)
                                                        <input class="form-check-input" value="3" type="radio" name="aceite_t" id="aceite_t" checked>
                                                        @else
                                                        <input class="form-check-input" value="3" type="radio" name="aceite_t" id="aceite_t">
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Limpia parabrisas
                                                </th>
                                                <td><div class="bueno">
                                                    @if ( $cotizacion2->limpia_p == 1)
                                                            <input class="form-check-input" value="1" type="radio" name="limpia_p" id="limpia_p" checked>
                                                        @else
                                                        <input class="form-check-input" value="1" type="radio" name="limpia_p" id="limpia_p">
                                                    @endif
                                                    </div>
                                                </td>
                                                <td><div class="regular">
                                                        @if ($cotizacion2->limpia_p == 2)
                                                        <input class="form-check-input" value="2" type="radio" name="limpia_p" id="limpia_p" checked>
                                                        @else
                                                        <input class="form-check-input" value="2" type="radio" name="limpia_p" id="limpia_p">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td><div class="malo">
                                                        @if ($cotizacion2->limpia_p == 3)
                                                        <input class="form-check-input" value="3" type="radio" name="limpia_p" id="limpia_p" checked>
                                                        @else
                                                        <input class="form-check-input" value="3" type="radio" name="limpia_p" id="limpia_p">
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <label for="">
                                        <p class="text-white"><strong>Observaciones</strong></p>
                                    </label>

                                    <div class="input-group form-group mb-5">
                                        <textarea class="form-control" rows="4" cols="6" value="3" id="observaciones2" name="observaciones2">{{$cotizacion2->observaciones}}</textarea>
                                    </div>
                                </div>



                                @if (Auth::check() == true)
                                    @if (auth()->user()->role != 0)
                                        <div class="col-12 text-center mt-2" style="margin-bottom: 8rem !important;">
                                            <button class="btn btn-lg btn-save-neon text-white">
                                                <i class="fas fa-save icon-tc"></i>
                                                Guardar
                                            </button>
                                        </div>
                                    @endif
                                @endif
                        </div>
                    </div>
        </form>
        <btn-ss>
            <div class="modal-cambio-car">
                <button id="btnCapturar" class="btn btn-primary cambio-carro" >
                  <i class="fas fa-camera"></i> Tomar captura
                </button>
            </div>
        </btn-ss>

{{$numero_aleatorio = rand(1,100)}}

{{--    <script src="{{ asset('js/screenshot.js') }}"></script>--}}
<script !src="">
    /**
 * Ejemplo 4 de html2canvas para convertir el HTML de una web
 * a un elemento canvas - Descargar la captura como imagen PNG
 *
 * @author parzibyte
 */
//Definimos el botón para escuchar su click
const $boton = document.querySelector("#btnCapturar"), // El botón que desencadena
  $objetivo = document.body; // A qué le tomamos la fotocanvas
// Nota: no necesitamos contenedor, pues vamos a descargarla

// Agregar el listener al botón
$boton.addEventListener("click", () => {
  const opciones = {
    ignoreElements: elemento => {
      // Una función que ignora elementos. Regresa true si quieres que
      // el elemento se ignore, y false en caso contrario
      const tipo = elemento.nodeName.toLowerCase();
      // Si es imagen o encabezado h1, ignorar
      if (tipo === "navbar" || tipo === "btn-ss") {
        return true;
      }
      // Para todo lo demás, no ignorar
      return false
    }
  };
  html2canvas($objetivo, opciones) // Llamar a html2canvas y pasarle el elemento
    .then(canvas => {
      // Cuando se resuelva la promesa traerá el canvas
      // Crear un elemento <a>
      let enlace = document.createElement('a');
      enlace.download = "Imagen-diagnostico_{{$cotizacion->Cotizacion->User->name}}_{{$cotizacion->Cotizacion->Automovil->placas}}_{{$numero_aleatorio}}.png";
      // Convertir la imagen a Base64
      enlace.href = canvas.toDataURL();
      // Hacer click en él
      enlace.click();
    });
});
</script>



@endsection


