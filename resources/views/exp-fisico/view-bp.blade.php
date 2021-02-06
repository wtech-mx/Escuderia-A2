@extends('layouts.app')

@section('content')


<div class="row bg-blue" style="background-image: linear-gradient(to bottom, #246af7, #315ffb, #4351fe, #573ffe, #6b24fc);">


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
                                        <strong>Baja de placas</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3 mb-5">
                            <div class="d-flex justify-content-between">
                            <p class="text-center text-white">
                                Agregar mas
                            </p>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                 <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="30px">
                                </button>

                            </div>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('view-exp-ts') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/ts.jpg') }}" alt="Icon documento" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                                Fecha: 05/05/20
                            </p>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">

                              <div class="modal-body">

                                  <div class="col-12">
                                    <p class="text-center text-dark" style="font: normal normal bold 23px/31px Segoe UI;">
                                        Agregar Imagen
                                    </p>
                                  </div>

                                <div class="col-12 mt-3">
                                    <p class="text-center">
                                        <a href="{{ route('view-exp-ts') }}">
                                            <img class="d-inline mb-2" src="{{ asset('img/icon/black/plus (2).png') }}" alt="Icon documento" width="30px">
                                        </a>
                                    </p>

                                    <p class="text-center">
                                        Agregar <br>
                                        Baja de placas

                                        <br>

                                        <a class="btn btn-save text-white">
                                            <img class="d-inline" src="{{ asset('img/icon/white/save-file-option (1).png') }}" alt="Icon documento" width="30px">
                                            Guardar
                                        </a>
                                    </p>



                                </div>

                              </div>


                            </div>
                          </div>
                        </div>

</div>

@endsection
