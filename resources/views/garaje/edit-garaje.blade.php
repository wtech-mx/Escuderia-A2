@extends('layouts.app')

@section('content')

     <link href="{{ asset('css/edit-garaje.css') }}" rel="stylesheet">

<div class="row bg-blue" style="background-image: linear-gradient(to right top, #24f7bc, #00edda, #00e1f0, #00d3fb, #24c4fc);">


                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white">
                                        <a href="javascript:history.back()" style="background-color: transparent;clip-path: none">
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

                        <div class="col-12 mb3">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/car2.png') }}" alt="Icon documento" width="500px">
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
                        <div class="col-12">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/proteger.png') }}" width="35px">
                                         <a class="input-a-text">Marca</a>
                                    </span>
                                </div>
                                        <select class="form-control input-edit-car" id="id_marca" name="id_marca">
                                            @foreach($marca as $item)
                                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/proteger.png') }}" width="35px">
                                         <a class="input-a-text">Submarca</a>
                                    </span>
                                </div>
                                <input  type="text" class="form-control input-edit-car" value="{{$automovil->submarca}}" id="submarca" name="submarca">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/coche (2).png') }}" width="35px">
                                         <a class="input-a-text">Tipo</a>
                                    </span>
                                </div>
                                <input  type="text" class="form-control input-edit-car" value="{{$automovil->tipo}}" id="tipo" name="tipo">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/coche (3).png') }}" width="35px">
                                         <a class="input-a-text">Subtipo</a>
                                    </span>
                                </div>
                                <input  type="text" class="form-control input-edit-car" value="{{$automovil->subtipo}}" id="subtipo" name="subtipo">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/km.png') }}" width="35px">
                                         <a class="input-a-text"> KM</a>
                                    </span>
                                </div>
                                <input  type="text" class="form-control input-edit-car" value="{{$automovil->kilometraje}}" id="kilometraje" name="kilometraje">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/days.png') }}" width="35px">
                                         <a class="input-a-text">Año</a>
                                    </span>
                                </div>
                                <input  type="number" class="form-control input-edit-car" value="{{$automovil->año}}" id="año" name="año">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/barcode.png') }}" width="35px">
                                         <a class="input-a-text">Num Serie</a>
                                    </span>
                                </div>
                                <input  type="text" class="form-control input-edit-car" value="{{$automovil->numero_serie}}" id="numero_serie" name="numero_serie">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <img class="" src="{{ asset('img/icon/black/color-palette.png') }}" width="35px">
                                         <a class="input-a-text">Color</a>
                                    </span>
                                </div>
                                <input  type="text" class="form-control input-edit-car" value="{{$automovil->color}}" id="color" name="color">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car" >
                                         <img class="" src="{{ asset('img/icon/black/placa.png') }}" width="35px">
                                          <a class="input-a-text">Num Placas</a>
                                    </span>
                                </div>
                                <input type="text" class="form-control input-edit-car input-edit-car" value="{{$automovil->placas}}" id="placas" name="placas">
                            </div>
                        </div>

                        <div class="col-12 text-center mt-3 mb-5">
                             <button class="btn btn-lg btn-success btn-save ">
                                   <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                        Guardar
                             </button>
                        </div>
    </form>

</div>

@endsection