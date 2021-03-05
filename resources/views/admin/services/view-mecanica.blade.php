@extends('admin.layouts.app')

@section('content')

                <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

                <div class="row bg-blue" style="background: #050F55 0% 0% no-repeat padding-box;">


                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white">
                                        <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong>Servicios</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        <div class="col-6 mt-4">
                            <a class="btn mb-3 mr-1" href="#carouselExampleControls" role="button" data-slide="prev">
                                <img class="" src="{{ asset('img/icon/white/flecha-izquierda.png') }}" width="25px" >
                            </a>

                            <a class="btn mb-3 " href="#carouselExampleControls" role="button" data-slide="next">
                                <img class="" src="{{ asset('img/icon/white/flecha-correcta.png') }}" width="25px" >
                            </a>
                        </div>

                        <div class="col-6 mt-4 d-inline">
                            <h5 class="text-white text-tittle-app mr-3 d-inline" style="font: normal normal bold 15px/20px Segoe UI">
                                Agregar
                            </h5>

                            <a class="btn" href="{{ route('create_servicio.servicio') }}">
                                <img class="" src="{{ asset('img/icon/white/plus.png') }}" width="30px" >
                            </a>
                        </div>

                        <div class="col-12">

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                              <div class="carousel-inner">

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Servicios Llantas--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item active">
                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Servicios Llantas</strong>
                                    </h5>

                                  <div class="row">
                                    @foreach ($mecanica_llantas as $item)
                                        <div class="col-12 mt-4">
                                            <div class="card card-slide-garaje" >
                                              <div class="card-body p-2" >

                                                  <div class="row">
                                                      <div class="col-6 mt-3">
                                                          <p class="card-text" style="font-size: 12px"><strong>Num. Servicio: {{$item->id}}</strong></p>
                                                          @if($item->id_empresa == NULL)
                                                                <a class="card-text" href="#"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->User->name}}</strong></a>
                                                                <p class="card-text" style="font-size: 12px"><strong>{{$item->Automovil2->submarca}}</strong></p>
                                                              @else
                                                                <a class="card-text" href="#"><strong style="font: normal normal bold 20px/27px Segoe UI; color: #fa4251">{{$item->Empresa->nombre}}</strong></a>
                                                                <p class="card-text" style="font-size: 12px"><strong>{{$item->Automovil->submarca}}</strong></p>
                                                          @endif

                                                      </div>

                                                      <div class="col-6">
                                                        <img class="d-inline mb-2" src="{{ asset('img/icon/car.png') }}" alt="Icon documento" width="150px">
                                                      </div>
                                                  </div>

                                              </div>
                                            </div>
                                        </div>
                                    @endforeach
                                  </div>

                                </div>

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Servicios Banda--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item ">

                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Servicios Banda</strong>
                                    </h5>

                                  <div class="row">

                                        <div class="col-12 mt-4">
                                            @foreach ($mecanica_banda as $item)
                                                <div class="col-12 mt-4">
                                                    <div class="card card-slide-garaje" >
                                                      <div class="card-body p-2" >

                                                          <div class="row">
                                                              <div class="col-6 mt-3">
                                                                  <p class="card-text" style="font-size: 12px"><strong>Num. Servicio: {{$item->id}}</strong></p>
                                                                  <a class="card-text" href="#"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->Userbn->name}}</strong></a>
                                                                  <p class="card-text" style="font-size: 12px"><strong>{{$item->Automovilbn->submarca}}</strong></p>
                                                              </div>

                                                              <div class="col-6">
                                                                <img class="d-inline mb-2" src="{{ asset('img/icon/car2.png') }}" alt="Icon documento" width="150px">
                                                              </div>
                                                          </div>

                                                      </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                  </div>

                                </div>

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Servicios Frenos--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item ">

                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Servicios Frenos</strong>
                                    </h5>

                                  <div class="row">

                                        <div class="col-12 mt-4">
                                            @foreach ($mecanica_freno as $item)
                                                <div class="col-12 mt-4">
                                                    <div class="card card-slide-garaje" >
                                                      <div class="card-body p-2" >

                                                          <div class="row">
                                                              <div class="col-6 mt-3">
                                                                  <p class="card-text" style="font-size: 12px"><strong>Num. Servicio: {{$item->id}}</strong></p>
                                                                  <a class="card-text" href="#"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->Userfr->name}}</strong></a>
                                                                  <p class="card-text" style="font-size: 12px"><strong>{{$item->Automovilfr->submarca}}</strong></p>
                                                              </div>

                                                              <div class="col-6">
                                                                <img class="d-inline mb-2" src="{{ asset('img/icon/car2.png') }}" alt="Icon documento" width="150px">
                                                              </div>
                                                          </div>

                                                      </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                  </div>

                                </div>

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Servicios Aceite--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item ">

                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Servicios Aceite</strong>
                                    </h5>

                                  <div class="row">

                                        <div class="col-12 mt-4">
                                            @foreach ($mecanica_aceite as $item)
                                                <div class="col-12 mt-4">
                                                    <div class="card card-slide-garaje" >
                                                      <div class="card-body p-2" >

                                                          <div class="row">
                                                              <div class="col-6 mt-3">
                                                                  <p class="card-text" style="font-size: 12px"><strong>Num. Servicio: {{$item->id}}</strong></p>
                                                                  <a class="card-text" href="#"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->Userac->name}}</strong></a>
                                                                  <p class="card-text" style="font-size: 12px"><strong>{{$item->Automovilac->submarca}}</strong></p>
                                                              </div>

                                                              <div class="col-6">
                                                                <img class="d-inline mb-2" src="{{ asset('img/icon/car2.png') }}" alt="Icon documento" width="150px">
                                                              </div>
                                                          </div>

                                                      </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                  </div>

                                </div>

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Servicios Afinacion--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item ">

                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Servicios Afinacion</strong>
                                    </h5>

                                  <div class="row">

                                        <div class="col-12 mt-4">
                                            @foreach ($mecanica_afinacion as $item)
                                                <div class="col-12 mt-4">
                                                    <div class="card card-slide-garaje" >
                                                      <div class="card-body p-2" >

                                                          <div class="row">
                                                              <div class="col-6 mt-3">
                                                                  <p class="card-text" style="font-size: 12px"><strong>Num. Servicio: {{$item->id}}</strong></p>
                                                                  <a class="card-text" href="#"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->Useraf->name}}</strong></a>
                                                                  <p class="card-text" style="font-size: 12px"><strong>{{$item->Automovilaf->submarca}}</strong></p>
                                                              </div>

                                                              <div class="col-6">
                                                                <img class="d-inline mb-2" src="{{ asset('img/icon/car2.png') }}" alt="Icon documento" width="150px">
                                                              </div>
                                                          </div>

                                                      </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                  </div>
                                </div>

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Servicios Amortiguadores--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item ">

                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Servicios Amortiguadores</strong>
                                    </h5>

                                  <div class="row">

                                        <div class="col-12 mt-4">
                                            @foreach ($mecanica_amortiguadores as $item)
                                                <div class="col-12 mt-4">
                                                    <div class="card card-slide-garaje" >
                                                      <div class="card-body p-2" >

                                                          <div class="row">
                                                              <div class="col-6 mt-3">
                                                                  <p class="card-text" style="font-size: 12px"><strong>Num. Servicio: {{$item->id}}</strong></p>
                                                                  <a class="card-text" href="#"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->Useram->name}}</strong></a>
                                                                  <p class="card-text" style="font-size: 12px"><strong>{{$item->Automovilam->submarca}}</strong></p>
                                                              </div>

                                                              <div class="col-6">
                                                                <img class="d-inline mb-2" src="{{ asset('img/icon/car2.png') }}" alt="Icon documento" width="150px">
                                                              </div>
                                                          </div>

                                                      </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                  </div>
                                </div>

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Servicios Bateria--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item ">

                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Servicios Bateria</strong>
                                    </h5>

                                  <div class="row">

                                        <div class="col-12 mt-4">
                                            @foreach ($mecanica_bateria as $item)
                                                <div class="col-12 mt-4">
                                                    <div class="card card-slide-garaje" >
                                                      <div class="card-body p-2" >

                                                          <div class="row">
                                                              <div class="col-6 mt-3">
                                                                  <p class="card-text" style="font-size: 12px"><strong>Num. Servicio: {{$item->id}}</strong></p>
                                                                  <a class="card-text" href="#"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->Userbt->name}}</strong></a>
                                                                  <p class="card-text" style="font-size: 12px"><strong>{{$item->Automovilbt->submarca}}</strong></p>
                                                              </div>

                                                              <div class="col-6">
                                                                <img class="d-inline mb-2" src="{{ asset('img/icon/car2.png') }}" alt="Icon documento" width="150px">
                                                              </div>
                                                          </div>

                                                      </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                  </div>
                                </div>

                              </div>

                        </div>

                    </div>

                </div>



@endsection
