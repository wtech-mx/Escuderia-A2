@extends('layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

        <div class="row bg-down-image-border" >
                @include('seguros.modal-pol-img')
                    <div class="col-2 mt-5">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-8 mt-5">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Tarjeta de Circulacion</strong>
                                </h5>
                    </div>

                    <div class="col-2 mt-5">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </div>
                        </div>
                    </div>

        </div>

                <div class="row  bg-down-image-border" >

                    @if ($tarjeta_circulacion == NULL)

                        <div class="row overflow-hidden" style="height: 85vh;">

                            <div class="col-12" >
                                <p class="text-center title-car">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/coche (7).png') }}" alt="Icon documento" width="150px">
                                </p>

                                <p class="text-center  text-white">
                                    <strong style="font: normal normal bold 20px/20px Segoe UI;">Aun no tienes Tarjeta de circulacion! </strong><br>
                                    <br> Cree un Auto para generar su tarjeta de circulacion <br>
                                    <br> click en el botón de + para <br> agregar tu Auto
                                </p>

                                <p class="text-center">
                                    <a type="button" class="btn " href="{{ route('create.automovil') }}">
                                        <img class="d-inline" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="60px">
                                    </a>
                                </p>
                            </div>

                        </div>
                    @else

                       @php
                        $originalDate = $tarjeta_circulacion->end;
                        $newDate = date("d/m/Y", strtotime($originalDate));
                        @endphp

                        <div class="col-12">
                            <form class="card-details" method="POST" action="{{route('update.tc',$tarjeta_circulacion->id)}}" enctype="multipart/form-data" role="form">

                            @csrf

                            <input type="hidden" name="_method" value="PATCH">

                                @if(Session::has('success'))
                                            <script>
                                                Swal.fire({
                                                  title: 'Exito!!',
                                                  html:
                                                    'Se ha actualizado tu  <b>Tarjeta de Circulación</b>, ' +
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

                            <p class="text-left text-white mt-5 mb-5" style="font: normal normal bold 20px/27px Segoe UI;">
                                <strong>Detalles de Tarjeta de Circulacion</strong>
                            </p>

                            {{--Datos para el calendario--}}
                            <div class="input-group form-group">
                                <input type="hidden" class="form-control" id='title' name="title" value="{{$tarjeta_circulacion->Automovil->placas}}">
                            </div>

                            <div class="input-group form-group">
                                <input type="hidden" class="form-control" id='descripcion' name="descripcion" value="Su tarjeta de circulacion expira el dia: {{$newDate}}">
                            </div>

                            <div class="input-group form-group">
                                <input type="hidden" class="form-control" id='color' name="color" value="#F1C40F">
                            </div>

                                <input type="hidden" class="form-control" id='image' name="image" value="{{asset('img/icon/color/comprobado.png') }}">
                            {{--Datos para el calendario--}}

                                <div class="row">
                                    <div class="col-6">
                                         <label for="">
                                             <p class="text-white"><strong>Marca</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                     <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input type="text" class="form-control"  value="{{$tarjeta_circulacion->Automovil->Marca->nombre}}" readonly >
                                        </div>

                                    </div>

                                    <div class="col-6">
                                         <label for="">
                                             <p class="text-white"><strong>Submarca</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                     <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                                </span>
                                            </div>
                                            <input type="text" class="form-control"  value="{{$tarjeta_circulacion->Automovil->submarca}}" readonly>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                         <label for="">
                                             <p class="text-white"><strong>Placa</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                     <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                                </span>
                                            </div>
                                            <input type="text" class="form-control"  id="num_placa" name="num_placa" value="{{$tarjeta_circulacion->Automovil->placas}}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                         <label for="">
                                             <p class="text-white"><strong>Ultimos dígito placa</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text" >
                                                     <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}" width="25px" >
                                                </span>
                                            </div>
                                            <input type="text" class="form-control"  id="num_placa" name="num_placa" value="{{$tarjeta_circulacion->num_placa}}">
                                        </div>
                                    </div>
                                </div>

                                <hr class="mt-3 mb-3" style="border: 1px solid #00f936;opacity: 1">

                                 <label for="">
                                     <p class="text-white"><strong>Nombre</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                             <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{$tarjeta_circulacion->nombre}}">
                                </div>

                                 <label for="">
                                     <p class="text-white"><strong>Tipo_placa</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text" >
                                             <img class="" type="date" src="{{ asset('img/icon/white/seguro (1).png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <select class="form-control" id="tipo_placa" name="tipo_placa"><option value="{{$tarjeta_circulacion->tipo_placa}}" selected>{{$tarjeta_circulacion->tipo_placa}}</option>
                                        <option value="Particular">Particular</option>
                                        <option value="Carga">Carga</option>
                                        <option value="Hybrido">Hybrido</option>
                                        <option value="Electrico">Electrico</option>
                                        <option value="Discapacidad">Discapacidad</option>
                                        <option value="Ambulancia">Ambulancia</option>
                                        <option value="Patrulla">Patrulla</option>
                                        <option value="Escolta">Escolta</option>
                                    </select>
                                </div>

                                 <label for="">
                                     <p class="text-white"><strong>Lugar_expedicion</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text" >
                                             <img class="" type="date" src="{{ asset('img/icon/white/seguro (1).png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <select class="form-control" id="lugar_expedicion" name="lugar_expedicion">
                                        <option value="{{$tarjeta_circulacion->lugar_expedicion}}" selected>{{$tarjeta_circulacion->lugar_expedicion}}</option>
                                        @include('tarjeta-circulacion.estados')
                                    </select>
                                </div>

                                 <label for="">
                                     <p class="text-white"><strong>Fecha de emisión</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                             <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                        </span>
                                    </div>
                                     <input type="date" class="form-control" name="fecha_emision" id="fecha_emision" placeholder="MM/YYYY" value="{{$tarjeta_circulacion->fecha_emision}}">
                                </div>

                                 <label for="">
                                     <p class="text-white"><strong>Fecha de vencimiento</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                             <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="25px" >
                                        </span>
                                    </div>
                                     <input type="date" class="form-control" name="end" id="end" placeholder="MM/YYYY" value="{{$tarjeta_circulacion->end}}">
                                </div>

                                 <label for="">
                                     <p class="text-white mt-3"><strong>Agregar imagen</strong></p>
                                 </label>

                                 <div class="col-12 mt-3">
                                     <div class="d-flex justify-content-center">
                                         <a type="button" class="btn ml-5" data-toggle="modal" data-target="#exampleModal" >
                                             <img class="d-inline mb-2" src="{{ asset('img/icon/white/add.png') }}" width="30px">
                                         </a>
                                     </div>
                                </div>

                                <div class="col-12 text-center mt-5" style="margin-bottom: 8rem !important;">
                                    <button class="btn btn-lg btn-save-neon text-white">
                                        <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                        Actualizar
                                    </button>
                                </div>

                            </form>
                                @include('tarjeta-circulacion.modal-ts-img')
                        </div>
                    @endif

                </div>






@endsection
