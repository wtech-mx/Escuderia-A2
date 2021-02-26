@extends('layouts.app')

@section('content')

<link href="{{ asset('css/tarjeta-circulacion.css') }}" rel="stylesheet">

<div class="row bg-blue" style="background-image: linear-gradient(to bottom, #24b6f7, #009fff, #0086ff, #0066ff, #243afc);">


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
                                        <strong> Tarjeta de Circulacion</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        {{------------------------------------}}
                        {{--      Tarjeta Circulacion  --}}
                        {{------------------------------------}}

                                         <div class="col-12">
                                            <div class="card mx-auto">
                                                <p class="heading">Tarjeta de Circulacion</p>

                                                <form class="card-details ">

                                                    <div class="form-group">
                                                        <p class="text-warning mb-2">Nombre</p>
                                                        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                                                    </div>

                                                    <div class="form-group">
                                                        <p class="text-warning mb-2">Tipo_placar</p>
                                                        <select class="form-control" id="referencia" name="referencia">
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

                                                    <div class="form-group">
                                                        <p class="text-warning mb-2">lugar_expedicion </p>
                                                        <select class="form-control" name="lugar_expedicion">
                                                            @include('tarjeta-circulacion.estados')
                                                        </select>
                                                    </div>

                                                    <div class="form-group pt-2">
                                                        <div class="row d-flex">

                                                            <div class="col-sm-6">
                                                                <p class="text-warning mb-2">Fecha de emisión</p>
                                                                <input type="date" name="fecha_emision" id="fecha_emision" placeholder="MM/YYYY">
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <p class="text-warning mb-2">Fecha de vencimiento</p>
                                                                <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" placeholder="MM/YYYY">
                                                            </div>

                                                            <div class="col-sm-12 mt-3">
                                                                <p class="text-warning mb-2">Ultimo dígito placa</p>
                                                                <input type="text" name="nombre" id="nombre" placeholder="arf-515">
                                                            </div>

                                                            <div class="col-sm-12 mt-5">
                                                                <button type="button" class="btn btn-primary">
                                                                    <i class="fas fa-arrow-right px-3 py-2"></i>
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>

</div>






@endsection
