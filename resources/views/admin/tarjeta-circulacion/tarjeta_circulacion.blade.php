@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">
<?php
$originalDate = $tarjeta_circulacion->end;
$newDate = date("d/m/Y", strtotime($originalDate));
?>

        <div class="row bg-down-image-border " >
                    <div class="col-2 mt-5">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                    <a href="{{ route('indextc_admin.tarjeta-circulacion') }}" style="background-color: transparent;clip-path: none">
                                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-8 mt-5">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Tarjeta de Circulaci&oacute;n</strong>
                                </h5>
                    </div>

                    <div class="col-2 mt-5">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </div>
                        </div>
                    </div>

                    <div class="col-12">

                    <form class="card-details" method="POST" action="{{route('update_admin.tarjeta-circulacion',$tarjeta_circulacion->id)}}" enctype="multipart/form-data" role="form">
                        @csrf

                        <input type="hidden" name="_method" value="PATCH">

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


                        <p class="text-left text-white mt-5" style="font: normal normal bold 20px/27px Segoe UI;">
                            <strong>Tarjeta de Circulaci&oacute;n</strong>
                        </p>
                        @if ($tarjeta_circulacion->id_user == NULL)
                        <p class="text-center mb-5" style="color: #00d62e; font: normal normal bold 20px/27px Segoe UI;"><strong>{{$tarjeta_circulacion->UserEmpresa->name}} / {{$tarjeta_circulacion->Automovil->placas}}</strong></p>
                            @if (auth()->user()->id_sector == NULL)
                                    <input type="hidden" class="form-control" id='id_sector' name="id_sector" value="{{ $tarjeta_circulacion->id_sector }}">
                            @else
                                <input type="hidden" class="form-control" id='id_sector' name="id_sector" value="{{ $tarjeta_circulacion->id_sector }}">
                            @endif
                        @else
                        <p class="text-center mb-5" style="color: #00d62e; font: normal normal bold 20px/27px Segoe UI;"><strong>{{$tarjeta_circulacion->User->name}} / {{$tarjeta_circulacion->Automovil->placas}}</strong></p>
                        @endif

                        {{--Datos para el calendario--}}
                        <div class="input-group form-group">
                            <input type="hidden" class="form-control" id='title' name="title" value="{{$tarjeta_circulacion->Automovil->placas}} / {{$tarjeta_circulacion->Automovil->submarca}}">
                        </div>

                        <div class="input-group form-group">
                            <input type="hidden" class="form-control" id='color' name="color" value="#F1C40F">
                        </div>

                        <input type="hidden" class="form-control" id='image' name="image" value="{{asset('img/icon/color/comprobado.png') }}">
                        {{--Datos para el calendario--}}

                        <input type="hidden" id="id_user" name="id_user" value="{{$tarjeta_circulacion->Automovil->id_user}}" readonly>
                        <input type="hidden" id="current_auto" name="current_auto" value="{{$tarjeta_circulacion->Automovil->id}}" readonly>

                            <div class="row">

                                <div class="col-6">
                                     <label for="">
                                         <p class="text-white"><strong>Marca</strong></p>
                                     </label>

                                    <div class="input-group form-group mb-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                 <i class="fas fa-car icon-tc"></i>
                                            </span>
                                        </div>

                                        <input type="text" class="form-control"  value="{{$tarjeta_circulacion->Automovil->Marca->nombre}}" readonly >
                                    </div>

                                </div>

                                <div class="col-6">
                                     <label for="">
                                         <p class="text-white"><strong>Submarca</strong></p>
                                     </label>

                                    <div class="input-group form-group mb-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-bookmark icon-tc"></i>
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

                                    <div class="input-group form-group mb-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                  <i class="fas fa-keyboard icon-tc" ></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control"  id="num_placa" name="num_placa" value="{{$tarjeta_circulacion->Automovil->placas}}" readonly>
                                    </div>
                                </div>

                                <div class="col-6">
                                     <label for="">
                                         <p class="text-white"><strong>Ultimos d&iacute;gito placa</strong></p>
                                     </label>

                                    <div class="input-group form-group mb-5">
                                        <div class="input-group-prepend " >
                                            <span class="input-group-text" >
                                                  <i class="fas fa-sort-numeric-up icon-tc"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control"  id="num_placa" name="num_placa" value="{{$tarjeta_circulacion->num_placa}}">
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-3 mb-3" style="border: 1px solid #00f936;opacity: 1">

                             <label for="">
                                 <p class="text-white"><strong>Nombre de la tarjeta de Circulación</strong></p>
                             </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-signature icon-tc"></i>
                                    </span>
                                </div>

                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la tarjeta de Circulación" value="{{$tarjeta_circulacion->nombre}}" required>
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Tipo placa</strong></p>
                             </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text" >
                                         <i class="fas fa-font icon-tc"></i>
                                    </span>
                                </div>

                                <select class="form-control" id="tipo_placa" name="tipo_placa" required>
                                    <option value="{{$tarjeta_circulacion->tipo_placa}}" selected>{{$tarjeta_circulacion->tipo_placa}}</option>
                                    <option value="Particular">Particular</option>
                                    <option value="Carga">Carga</option>
                                    <option value="Hybrido">Hybrido</option>
                                    <option value="Electrico">Electrico</option>
                                    <option value="Discapacidad">Discapacidad</option>
                                    <option value="Ambulancia">Ambulancia</option>
                                    <option value="Patrulla">Patrulla</option>
                                    <option value="Escolta">Escolta</option>
                                    <option value="Auto Antiguo">Auto Antiguo</option>
                                </select>
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Lugar expedicion</strong></p>
                             </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text" >
                                        <i class="fas fa-user-shield icon-tc"></i>
                                    </span>
                                </div>
                                <select class="form-control" id="lugar_expedicion" name="lugar_expedicion" required>
                                    <option value="{{$tarjeta_circulacion->lugar_expedicion}}" selected>{{$tarjeta_circulacion->lugar_expedicion}}</option>
                                    @include('tarjeta-circulacion.estados')
                                </select>
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Fecha de emisión</strong></p>
                             </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                         <i class="far fa-calendar-alt icon-tc"></i>
                                    </span>
                                </div>
                                 <input type="date" class="form-control" name="fecha_emision" id="fecha_emision" placeholder="MM/YYYY" value="{{$tarjeta_circulacion->fecha_emision}}">
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Fecha de vencimiento</strong></p>
                             </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                          <i class="far fa-calendar-alt icon-tc"></i>
                                    </span>
                                </div>
                                 <input type="date" class="form-control" name="end" id="end" placeholder="MM/YYYY" value="{{$tarjeta_circulacion->end}}">
                            </div>

                             <label for="">
                                 <p class="text-white mt-3"><strong>Agregar imagen</strong></p>
                             </label>

                             <div class="col-12 mt-2">
                                 <div class="d-flex justify-content-center">
                                     <a  class="btn ml-5" data-toggle="modal" data-target="#exampleModal" >
                                        <i class="fas fa-plus-circle icon-tc-r" ></i>
                                     </a>
                                 </div>
                            </div>

                            <div class="col-12 text-center mt-2" style="margin-bottom: 8rem !important;">
                                <button class="btn btn-lg btn-save-neon text-white">
                                    <i class="fas fa-save icon-tc"></i>
                                    Actualizar
                                </button>
                            </div>

                        </form>
                       @include('admin.tarjeta-circulacion.modal-ts-img')
                    </div>
                </div>

@endsection
