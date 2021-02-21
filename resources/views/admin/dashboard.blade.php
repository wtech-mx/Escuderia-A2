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

                            <table class="table text-white mt-5">

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

                <div class="row bg-down-blue" style="z-index:1000;background: transparent linear-gradient(180deg, #24DAF7 0%, #24F7BC 100%) 0% 0% no-repeat padding-box;">
                    <div class="col-12 p-4">
                        <h6 class="text-center text-white">
                           <strong style="font: normal normal bold 25px/33px Segoe UI;"> ¿Qué haremos hoy?</strong> <br>
                            <a href="{{ route('dashboard') }}">
                                Modo User
                            </a>
                        </h6>
                    </div>

                    <div class="col-6">
                         <a href="{{ route('view-alerts') }}">
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
                        <a href="{{ route('index.view-documents-admin') }}" class="text-white">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/documents (1).png') }}" alt="Icon Exp Fisico" width="50px">
                                  <p class="card-text"><strong>Documentacion</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a href="{{ route('view-exp-fisico-admin') }}" class="text-white">
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
