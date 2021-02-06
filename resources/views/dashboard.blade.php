@extends('layouts.app')

@section('content')

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">

                <div class="row bg-img-log" style="background-image: url({{ asset('img/bg-log.png') }});">
                    <div class="col-md-12 mt-3 mb-3">

                            <div class="d-flex flex-row-reverse">
                              <div class="p-2">
                                   <a href="{{ route('view-alerts') }}">
                                      <img class="img-thumbnail" src="{{ asset('img/icon/color/campana.png') }}" width="40px" style="border-radius: 50px">
                                  </a>
                              </div>
                            </div>

                            <div class="card" style="border-radius: 15px;position: relative;top: 15px;opacity: 0.7;">
                              <div class="card-body" >
                                  <h4 class="card-text d-inline mr-4 ">
                                     <strong>Servicio de mecanica</strong>
                                  </h4>
                                  <button class="btn" style="border-radius: 10px;background-color: #050f55">
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/white/call.png')}}" alt="Icon User" width="15px">
                                  </button>
                              </div>
                            </div>

                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <p class="card-text">
                                      <strong>CDMX | Calle 25, esquina con Av. Patri TEL : 5510079878</strong>
                                  </p>
                              </div>
                            </div>

                    </div>
                </div>

                <div class="row bg-down-blue" style="z-index:1000">
                    <div class="col-12 p-4">
                        <h6 class="text-center text-white">
                            ¿Que estas buscando?
                        </h6>
                    </div>

                    <div class="col-6">
                         <a href="{{ route('profile') }}">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/black/user.png') }}" alt="Icon User" width="50px">
                                  <p class="card-text text-dark"><strong>Datos de perfil</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6">
                        <a href="{{ route('view-garaje') }}">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/black/coche (2).png') }}" alt="Icon User" width="50px">
                                  <p class="card-text text-dark"><strong>Datos de auto</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a href="{{ route('view-documents') }}" class="text-dark">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/black/documento.png') }}" alt="Icon documento" width="50px">
                                  <p class="card-text"><strong>Documentacion</strong></p>
                              </div>
                            </div>
                         </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a href="{{ route('view-seguros') }}" class="text-dark">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/black/seguro-de-coche.png') }}" alt="Icon Seguro" width="50px">
                                  <p class="card-text"><strong>Seguro</strong></p>
                              </div>
                            </div>
                         </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a href="{{ route('view-exp-fisico') }}" class="text-dark">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/black/expediente.png') }}" alt="Icon Exp Fisico" width="50px">
                                  <p class="card-text"><strong>Exp Fisico</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a href="{{ route('view-win-share') }}" class="text-dark">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/black/gift.png') }}" alt="Icon gift" width="50px">
                                  <p class="card-text"><strong>Comparte y Gana</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mt-4 mb-4">
                        <div class="card" style="border-radius: 15px">
                          <div class="card-body" >
                              <img class="d-inline mb-2" src="{{ asset('img/icon/black/documento (1).png') }}" alt="Icon Tenencia" width="50px">
                              <p class="card-text"><strong>Tenencia</strong></p>
                          </div>
                        </div>
                    </div>

                </div>


@endsection
