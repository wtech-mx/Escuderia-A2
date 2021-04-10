@extends('layouts.app')

@section('content')

     <link href="{{ asset('css/edit-garaje.css') }}" rel="stylesheet">

<div class="row bg-blue" style="background-image: linear-gradient(to bottom, #00d62e, #2ce048, #43eb5f, #56f574, #68ff88);">

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white">
                                        <a href="{{ route('index.automovil') }}" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong> Editar Auto</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <p class="text-center">
                                @if($automovil->img == NULL)
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/car3.png') }}"  width="150px">
                                @else
                                    <img class="d-inline mb-2" src="{{ asset('img-auto/'.$automovil->img) }}"  width="150px">
                               @endif
                            </p>

                            <p class="text-left title-car">
                                <strong>{{$automovil->submarca}}</strong>
                            </p>

                            <p class="text-left subtitle-car" style="font-size: 12px">
                                <strong>{{$automovil->kilometraje}} KM Recorridos</strong>
                            </p>
                        </div>

       <form method="POST" action="{{route('update.automovil',$automovil->id)}}" enctype="multipart/form-data" role="form">
                        @csrf

                        <input type="hidden" name="_method" value="PATCH">

                        <div class="col-12 mt-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/proteger.png') }}" width="35px">
                                         <a class="input-a-text">Marca</a>
                                    </span>
                                </div>

                                <select class="form-control input-edit-car" id="id_marca" name="id_marca">
                                    @foreach($marca as $item)
                                        <option value="{{$automovil->Marca->id}}">{{$automovil->Marca->nombre}}</option>
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/proteger.png') }}" width="35px">
                                         <a class="input-a-text">Submarca</a>
                                    </span>
                                </div>
                                <input  type="text" class="form-control input-edit-car" value="{{$automovil->submarca}}" id="submarca" name="submarca">
                            </div>
                                    @if ($errors->has('submarca'))
                                        <span class="text-danger">{{ $errors->first('submarca') }}</span>
                                    @endif
                        </div>

                        <div class="col-12 mt-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/coche (2).png') }}" width="35px">
                                         <a class="input-a-text">Tipo</a>
                                    </span>
                                </div>
                                <input  type="text" class="form-control input-edit-car" value="{{$automovil->tipo}}" id="tipo" name="tipo">
                            </div>
                                    @if ($errors->has('tipo'))
                                        <span class="text-danger">{{ $errors->first('tipo') }}</span>
                                    @endif
                        </div>

                        <div class="col-12 mt-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/coche (3).png') }}" width="35px">
                                         <a class="input-a-text">Subtipo</a>
                                    </span>
                                </div>
                                <input  type="text" class="form-control input-edit-car" value="{{$automovil->subtipo}}" id="subtipo" name="subtipo">
                            </div>
                                    @if ($errors->has('subtipo'))
                                        <span class="text-danger">{{ $errors->first('subtipo') }}</span>
                                    @endif
                        </div>

                        <div class="col-12 mt-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/km.png') }}" width="35px">
                                         <a class="input-a-text"> KM</a>
                                    </span>
                                </div>
                                <input  type="number" class="form-control input-edit-car" value="{{$automovil->kilometraje}}" id="kilometraje" name="kilometraje">
                            </div>
                                    @if ($errors->has('kilometraje'))
                                        <span class="text-danger">{{ $errors->first('kilometraje') }}</span>
                                    @endif
                        </div>

                        <div class="col-12 mt-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/days.png') }}" width="35px">
                                         <a class="input-a-text">Año</a>
                                    </span>
                                </div>
                                <input  type="number" class="form-control input-edit-car" value="{{$automovil->año}}" id="año" name="año">
                            </div>
                                    @if ($errors->has('año'))
                                        <span class="text-danger">{{ $errors->first('año') }}</span>
                                    @endif
                        </div>

                        <div class="col-12 mt-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/barcode.png') }}" width="35px">
                                         <a class="input-a-text">Num Serie</a>
                                    </span>
                                </div>
                                <input  type="text" class="form-control input-edit-car" value="{{$automovil->numero_serie}}" id="numero_serie" name="numero_serie">
                            </div>
                                    @if ($errors->has('numero_serie'))
                                        <span class="text-danger">{{ $errors->first('numero_serie') }}</span>
                                    @endif
                        </div>

                        <div class="col-12 mt-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car" >
                                         <img class="" src="{{ asset('img/icon/black/placa.png') }}" width="35px">
                                          <a class="input-a-text">Num Placas</a>
                                    </span>
                                </div>
                                <input type="text" class="form-control input-edit-car input-edit-car" value="{{$automovil->placas}}" id="placas" name="placas">
                            </div>
                                    @if ($errors->has('placas'))
                                        <span class="text-danger">{{ $errors->first('placas') }}</span>
                                    @endif
                        </div>

                        <div class="col-12 mt-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/color-palette.png') }}" width="35px">
                                         <a class="input-a-text">Color</a>
                                    </span>
                                </div>
                                <input  type="color" class="form-control input-edit-car" value="{{$automovil->color}}" id="color" name="color">
                            </div>
                                    @if ($errors->has('color'))
                                        <span class="text-danger">{{ $errors->first('color') }}</span>
                                    @endif
                        </div>

                        <div class="col-12 mt-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/camara-fotografica.png') }}" width="35px">
                                         <a class="input-a-text">Foto</a>
                                    </span>
                                </div>
                                <input  type="file"  class="form-control input-edit-car" id='img' name="img" value="{{$automovil->img}}">
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <p class="text-center">
                                @if($automovil->img == NULL)
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/car3.png') }}"  width="90px">
                                @else
                                    <img class="d-inline mb-2" src="{{ asset('img-auto/'.$automovil->img) }}"  width="90px">
                               @endif
                            </p>
                        </div>

                        <div class="col-12 text-center mt-3" style="margin-bottom: 8rem !important;">
                             <button type="submit" class="btn btn-lg btn-save-dark text-white">
                                   <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                        Guardar
                             </button>
                        </div>
       </form>

</div>

@endsection
