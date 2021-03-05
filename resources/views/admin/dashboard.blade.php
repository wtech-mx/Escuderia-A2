@extends('layouts.app')

@section('bg-color', 'background-image:none')

@section('content')

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
                <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

                <div class="row " style="background-color: #050F55;">
                    <div class="col-md-12 mt-3 mb-3">
                            <div class="d-flex justify-content-between">

                              <div class="p-2">
                                  -
                              </div>
                              <div class="p-2">
                                   <h2 style="font: normal normal bold 25px/33px Segoe UI;color: #FFFFFF;" >Alertas</h2>
                              </div>
                              <div class="p-2">
                                   <a href="{{ route('view-alerts') }}">
                                      <img class="img-thumbnail" src="{{ asset('img/icon/color/campana.png') }}" width="40px" style="border-radius: 50px">
                                  </a>
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

                            <a type="button"  data-toggle="modal" data-target="#alert-modal">
                                <img class="" src="{{ asset('img/icon/white/plus.png') }}" width="30px" >
                            </a>
                        </div>

                        <div class="col-12">

                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="90000">

                                  <div class="carousel-inner">

                                    {{-- ----------------------------------------------------------------------------}}
                                    {{-- |Vehculos de user--}}
                                    {{-- |----------------------------------------------------------------------------}}

                                    <div class="carousel-item active">
                                        <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                            <strong>Alertas Servicios</strong>
                                        </h5>

                                      <div class="row">
                                        <div class="col-12">
                                            <table class="table text-white ">
                                              <thead>
                                                <tr>
                                                  <th scope="col"></th>
                                                  <th scope="col">Servicio</th>
                                                  <th scope="col">Km</th>
                                                  <th scope="col">Fecha</th>
                                                  <th scope="col">cambio</th>
                                                </tr>
                                              </thead>

                                              <tbody>
                                                <tr>
                                                  <th scope="row">1</th>
                                                  <td>Mark</td>
                                                  <td>Otto</td>
                                                  <td>@mdo</td>
                                                  <td>@mdo</td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                      </div>

                                    </div>

                                    {{-- ----------------------------------------------------------------------------}}
                                    {{-- |Vehculos de empresa--}}
                                    {{-- |----------------------------------------------------------------------------}}

                                    <div class="carousel-item ">

                                        <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                            <strong>Alertas Personalizadas</strong>
                                        </h5>

                                      <div class="row">

                                            <div class="col-12">
                                                <table class="table text-white">

                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Usuario</th>
                                                      <th scope="col">Titulo</th>
                                                      <th scope="col">Descripcion</th>
                                                      <th scope="col">Fecha Inicio</th>
                                                    </tr>
                                                  </thead>

                                                  <tbody>

                                                    @foreach($alert as $item)
                                                    <tr>
                                                        @php
                                                        $originalDate = $item->fecha_inicio;
                                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                                        @endphp

                                                          <td>{{$item->User->name}}</td>
                                                          <td>{{$item->titulo}}</td>
                                                          <td>{{$item->descripcion}}</td>
                                                          <td>{{$newDate}}</td>
                                                    </tr>
                                                     @endforeach
                                                  </tbody>

                                                </table>
                                            </div>

                                      </div>

                                    </div>

                                  </div>

                            </div>

                        </div>

                </div>

                <div class="row bg-down-blue" style="z-index:1000;background: transparent linear-gradient(180deg, #24DAF7 0%, #24F7BC 100%) 0% 0% no-repeat padding-box;">
                    <div class="col-12 p-4">
                        <h6 class="text-center text-white">
                           <strong style="font: normal normal bold 25px/33px Segoe UI;"> ¿Qué haremos hoy?</strong>
                        </h6>
                    </div>

                    <div class="col-6">
                         <a href="{{ route('show.alert') }}">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/campana (1).png') }}" alt="Icon User" width="50px">
                                  <p class="card-text text-white"><strong>Alertas</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6">
                         <a href="{{ route('index_admin.user') }}">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/usuario (1).png') }}" alt="Icon User" width="50px">
                                  <p class="card-text text-white"><strong>Usuarios</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a href="{{ route('index_admin.automovil') }}">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/coche (4).png') }}" alt="Icon User" width="50px">
                                  <p class="card-text text-white"><strong>vehiculos</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a  class="text-white" data-toggle="modal" data-target="#Servicios" style="cursor: pointer">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/car-service (1).png') }}" alt="Icon Seguro" width="50px">
                                  <p class="card-text"><strong>Servicios</strong></p>
                              </div>
                            </div>
                         </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a href="{{ route('indextc_admin.tarjeta-circulacion') }}" class="text-white">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/documents (1).png') }}" alt="Icon Exp Fisico" width="50px">
                                  <p class="card-text"><strong>T. Circulacion</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a href="{{ route('index_admin.view-exp-fisico-admin') }}" class="text-white">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/documento (2).png') }}" alt="Icon gift" width="50px">
                                  <p class="card-text"><strong>Exp Fisico</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mt-4 mb-4">
                        <a href="{{ route('index_admin.seguros') }}" class="text-white">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/seguro-de-coche (1).png') }}" alt="Icon Tenencia" width="50px">
                                  <p class="card-text text-white"><strong>Seguros</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mt-4 mb-4">
                        <a href="{{ route('index_admin.empresa') }}" class="text-white">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" alt="Icon Tenencia" width="50px">
                                  <p class="card-text text-white"><strong>Empresas</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    @include('admin.modal-services')

                </div>


@endsection
