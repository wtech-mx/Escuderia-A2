@extends('layouts.app')

@section('content')

                <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

                <div class="row bg-blue" style="background: transparent linear-gradient(180deg, #24B6F7 0%, #243AFC 100%) 0% 0% no-repeat padding-box;">


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
                                        <strong>Documentos</strong>
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
                            <p>-</p>
                        </div>

                        <div class="col-12">

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                              <div class="carousel-inner">

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Vehculos de user--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item active">
                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Documentos de personas</strong>
                                    </h5>

                                  <div class="row">

                                        <div class="col-12 mt-4">

                                            @foreach ($user as $item)

                                             <a  data-toggle="collapse" href="#collapse{{$item->name}}" role="button" aria-expanded="false" aria-controls="collapse{{$item->name}}">
                                                <div class="card card-slide-garaje" >
                                                  <div class="card-body p-2" >

                                                      <div class="row">
                                                          <div class="col-6 mt-3">
                                                              <p class="card-text"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->name}}</strong></p>
                                                              <p class="card-text" style="font-size: 12px"><strong>{{$item->name}}</strong></p>
                                                          </div>

                                                          <div class="col-6">
                                                            <img class="d-inline mb-2" src="{{ asset('img/icon/color/register.png') }}" alt="Icon documento" width="90px">
                                                          </div>

                                                      </div>

                                                  </div>
                                                </div>
                                             </a>

                                            <div class="collapse mt-1 " id="collapse{{$item->name}}">
                                              <div class="card card-body card-slide-garaje">
                                                  <p class="text-center"><strong style="font-size: 19px">Tarjeta de Circulacion</strong></p>
                                                  <div class="d-flex justify-content-between">


                                                      <a href="{{ route('create.view-exp-ts-admin') }}">
                                                        <span class="badge badge-primary" style="font-size: 70%;">
                                                            Fecha de exp
                                                        </span>
                                                      </a>

                                                      <a href="{{ route('view-lugar-ts-admin') }}">
                                                        <span class="badge badge-secondary" style="font-size: 70%;">
                                                            Fecha de vencimiento
                                                        </span>
                                                      </a>

                                                      <a href="{{ route('view-vencimiento-ts-admin') }}">
                                                        <span class="badge badge-success" style="font-size: 70%;">
                                                            Lugar de expedicion
                                                        </span>
                                                      </a>

                                                      <a href="{{ route('view-otro-ts-admin') }}">
                                                        <span class="badge badge-danger" style="font-size: 70%;">
                                                            otro
                                                        </span>
                                                      </a>

                                                  </div>
                                              </div>
                                            </div>

                                            @endforeach

                                        </div>

                                  </div>

                                </div>

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Vehculos de empresa--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item ">

                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Documentos Empresas</strong>
                                    </h5>

                                  <div class="row">

                                        <div class="col-12 mt-4">
                                            <div class="card card-slide-garaje" >
                                              <div class="card-body p-2" >

                                                  <div class="row">
                                                      <div class="col-6 mt-3">
                                                          <p class="card-text"><strong style="font: normal normal bold 20px/27px Segoe UI;">HAVAL F7</strong></p>
                                                          <p class="card-text" style="font-size: 12px"><strong>nombre</strong></p>
                                                      </div>

                                                      <div class="col-6">
                                                        <img class="d-inline mb-2" src="{{ asset('img/icon/car2.png') }}" alt="Icon documento" width="150px">
                                                      </div>
                                                  </div>

                                              </div>
                                            </div>
                                        </div>

                                  </div>

                                </div>

                              </div>

                        </div>

                    </div>

                </div>



@endsection
