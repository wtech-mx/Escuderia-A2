@extends('layouts.app')

@section('content')

     <link href="{{ asset('css/edit-garaje.css') }}" rel="stylesheet">

<div class="row bg-blue" style="background-image: linear-gradient(to bottom, #24f7bc, #00edda, #00e1f0, #00d3fb, #24c4fc);">


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
                                        <strong>Agregar Auto</strong>
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
                                <strong>HAVAL F7</strong>
                            </p>

                            <p class="text-left subtitle-car" style="font-size: 12px">
                                <strong>1000 KM Recorridos</strong>
                            </p>
                        </div>


                    {{-- ----------------------------------------------------------------------------}}
                    {{-- |Contendor Tab--}}
                    {{-- |----------------------------------------------------------------------------}}

                    <div class="col-12 mt-5">

                        <ul class="nav nav-pills ml-3 mb-3" id="pills-tab" role="tablist">

                          <li class="nav-item mr-2">
                            <a class="nav-link active a-auto" id="pills-auto-tab" data-toggle="pill" href="#auto" role="tab" aria-controls="auto" aria-selected="true">
                                Datos de auto
                            </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link a-auto" id="pills-Vinculacion-tab" data-toggle="pill" href="#pills-Vinculacion" role="tab" aria-controls="pills-Vinculacion" aria-selected="false">
                                Vinculacion
                            </a>
                          </li>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                          <div class="tab-pane fade show active" id="auto" role="tabpanel" aria-labelledby="pills-auto-tab">


                            <div class="col-12">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text span-edit-car">
                                             <img class="" src="{{ asset('img/icon/black/proteger.png') }}" width="35px">
                                             <a class="input-a-text">Marca</a>
                                        </span>
                                    </div>
                                    <input  type="text" class="form-control input-edit-car" placeholder="Marca" id=''>
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
                                    <input  type="text" class="form-control input-edit-car" placeholder="Submarca" id=''>
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
                                    <input  type="text" class="form-control input-edit-car" placeholder="Tipo" id=''>
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
                                    <input  type="text" class="form-control input-edit-car" placeholder="Subtipo" id=''>
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
                                    <input  type="text" class="form-control input-edit-car" placeholder="Año" id=''>
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
                                    <input  type="text" class="form-control input-edit-car" placeholder="Num Serie" id=''>
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
                                    <input  type="text" class="form-control input-edit-car" placeholder="Color" id=''>
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
                                    <input type="text" class="form-control input-edit-car input-edit-car" placeholder="Num Placas" id=''>
                                </div>
                            </div>


                              <div class="col-12 text-center mt-3 mb-5">

                                  <button class="btn btn-lg btn-success btn-save-border">
                                      <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                      Actualizar
                                 </button>

                              </div>

                          </div>

                        {{-- ----------------------------------------------------------------------------}}
                        {{-- |Tab seguridad--}}
                        {{-- |----------------------------------------------------------------------------}}

                          <div class="tab-pane fade" id="pills-Vinculacion" role="tabpanel" aria-labelledby="pills-Vinculacion-tab">

                              <div class="col-12 text-center mt-5 mb-5">

                                     <label for="">
                                         <p class="subtitle-label"><strong>¿Este auto pertenece a una empresa?</strong></p>
                                     </label>

                                    <div class="row">

                                        <div class="col-9">
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-vinculacion" >
                                                         <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                    </span>
                                                </div>

                                                <select class="form-control" id="exampleFormControlSelect1">
                                                  <option>Ale</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                             <!-- Button trigger modal -->
                                            <a  class="btn btn-circel" data-toggle="modal" data-target="#empresa">
                                                <img class="" src="{{ asset('img/icon/black/boton-circular-plus (1).png') }}" width="25px" >
                                            </a>
                                        </div>

                                    </div>

                                     <label for="">
                                         <p class="subtitle-label" ><strong>¿Este auto pertenece a una persona?</strong></p>
                                     </label>

                                    <div class="row">

                                        <div class="col-9">
                                             <div class="input-group form-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text input-vinculacion" >
                                                          <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                                                     </span>
                                                 </div>

                                                 <select class="form-control" id="exampleFormControlSelect1">
                                                   <option>Ale</option>
                                                 </select>
                                             </div>
                                        </div>

                                        <div class="col-3">
                                            <a  class="btn btn-circel" data-toggle="modal" data-target="#persona">
                                                <img class="" src="{{ asset('img/icon/black/boton-circular-plus (1).png') }}" width="25px" >
                                            </a>
                                        </div>

                                    </div>

                                      <button class="btn btn-lg btn-success btn-save-border">
                                          <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                          Actualizar
                                     </button>

                              </div>

                              @include('admin.garaje.add-bussines-modal')

                          </div>

                        </div>

                    </div>


</div>

@endsection
