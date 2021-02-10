@extends('layouts.app')

@section('bg-color', 'background-image: linear-gradient(to bottom, #050f55, #050f55, #050f55, #050f55, #050f55);')

@section('content')

                <link href="{{ asset('css/servicios.css') }}" rel="stylesheet">

                <div class="row bg-down-blue-border" style="background: #050F55 0% 0% no-repeat padding-box;">

                    <div class="col-2  mt-5">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                    <a href="javascript:history.back()" style="background-color: transparent;clip-path: none">
                                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-8  mt-5">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Servicio Mecanica</strong>
                                </h5>
                    </div>

                    <div class="col-2  mt-5">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </div>
                        </div>
                    </div>
                </div>

                <div class="row bg-down-blue-border mt-5" style="background: #050F55 0% 0% no-repeat padding-box;">

                    <div class="col-12 bg-white" style="height: 38px;">

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                          <div class="carousel-inner">

                            <div class="carousel-item active">

                                <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">

                                  <li class="nav-item">
                                    <a class="nav-link a-nav active" id="pills-Llantas-tab" data-toggle="pill" href="#pills-Llantas" role="tab" aria-controls="pills-Llantas" aria-selected="true">
                                        <img class="" src="{{ asset('img/icon/color/neumatico.png') }}" alt="Icon User" width="20px">
                                        Llanta
                                    </a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link a-nav" id="pills-Banda-tab" data-toggle="pill" href="#pills-Banda" role="tab" aria-controls="pills-Banda" aria-selected="false">
                                         <img class="" src="{{ asset('img/icon/color/cuerda.png') }}" alt="Icon User" width="20px">
                                        Banda
                                    </a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link a-nav" id="pills-Frenos-tab" data-toggle="pill" href="#pills-Frenos" role="tab" aria-controls="pills-Frenos" aria-selected="false">
                                        <img class="" src="{{ asset('img/icon/color/frenos.png') }}" alt="Icon User" width="20px">
                                        Freno
                                    </a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link a-nav" id="pills-Aceite-tab" data-toggle="pill" href="#pills-Aceite" role="tab" aria-controls="pills-Aceite" aria-selected="false">
                                        <img class="" src="{{ asset('img/icon/color/botella-de-aceite.png') }}" alt="Icon User" width="20px">
                                        Aceite
                                    </a>
                                 </li>

                                </ul>
                            </div>

                            <div class="carousel-item">
                                <ul class="nav nav-pills mb-3 bg-white" id="pills-tab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link a-nav" id="pills-Afinacion-tab" data-toggle="pill" href="#pills-Afinacion" role="tab" aria-controls="pills-Afinacion" aria-selected="false">
                                        <img class="" src="{{ asset('img/icon/color/motor-del-coche.png') }}" alt="Icon User" width="20px">
                                        Afinacion
                                    </a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link a-nav" id="pills-Amortig-tab" data-toggle="pill" href="#pills-Amortig" role="tab" aria-controls="pills-Amortig" aria-selected="false">
                                        <img class="" src="{{ asset('img/icon/color/amortiguador (2).png') }}" alt="Icon User" width="20px">
                                        Amortig
                                    </a>
                                  </li>

                                  <li class="nav-item a-nav">
                                    <a class="nav-link" id="pills-Bateria-tab" data-toggle="pill" href="#pills-Bateria" role="tab" aria-controls="pills-Bateria" aria-selected="false">
                                        <img class="" src="{{ asset('img/icon/color/bateria.png') }}" alt="Icon User" width="20px">
                                        Bateria
                                    </a>
                                  </li>
                                </ul>
                            </div>

                          </div>

                          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>

                          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>

                        </div>

                    </div>

                   <div class="col-12">
                        <div class="tab-content" id="pills-tabContent">

                          <div class="tab-pane fade show active" id="pills-Llantas" role="tabpanel" aria-labelledby="pills-home-tab">
                              <div class="row">
                                @include('admin.services.llantas')
                              </div>
                          </div>

                          <div class="tab-pane fade" id="pills-Banda" role="tabpanel" aria-labelledby="pills-profile-tab">
                              <div class="row">
                              @include('admin.services.banda')
                              </div>
                          </div>

                          <div class="tab-pane fade" id="pills-Frenos" role="tabpanel" aria-labelledby="pills-contact-tab">
                              <div class="row">
                              @include('admin.services.frenos')
                              </div>
                          </div>

                          <div class="tab-pane fade" id="pills-Aceite" role="tabpanel" aria-labelledby="pills-contact-tab">
                              <div class="row">
                              @include('admin.services.aceite')
                              </div>
                          </div>

                          <div class="tab-pane fade" id="pills-Afinacion" role="tabpanel" aria-labelledby="pills-contact-tab">
                              <div class="row">
                              @include('admin.services.afincacion')
                              </div>
                          </div>

                          <div class="tab-pane fade" id="pills-Amortig" role="tabpanel" aria-labelledby="pills-contact-tab">
                              <div class="row">
                              @include('admin.services.amortiguadores')
                              </div>
                          </div>

                          <div class="tab-pane fade" id="pills-Bateria" role="tabpanel" aria-labelledby="pills-contact-tab">
                              <div class="row">
                              @include('admin.services.bateria')
                              </div>
                          </div>

                        </div>
                   </div>

                    @include('admin.services.modal-marca')

                </div>


@endsection
