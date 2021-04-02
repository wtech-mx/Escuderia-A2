@extends('admin.layouts.app')

@section('content')


                <style>
                    .bg-blue{
                        background-color:#68fe87
                    }
                </style>

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
                <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

                <div class="row " style="background-image: url('public/img/bg-medida.png');">

                        <div class="col-2 mt-4">
                            <div class="d-flex justify-content-start">
                                   <a class="btn" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                                       <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                          <img class="rounded-circle" src="{{ asset('img-perfil/'.$users->img) }}" width="40px" >
                                       </div>
                                   </a>

                                    <div class="row">
                                      <div class="col">
                                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                                          <div class="card card-body " >
                                              <a class="text-dark " href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                                  <img class="rounded-circle" src="{{ asset('img/icon/white/exit.png') }}" width="15" >
                                              </a>
                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                  {{ csrf_field() }}
                                              </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            </div>
                        </div>

                        <div class="col-8 mt-5">
                            <h5 class="text-center text-white ml-4 mr-4">
                                <strong>Hola : {{$users->name}}</strong> <br> <br>
                            </h5>
                        </div>

                        <div class="col-2 mt-5">
                            <div class="d-flex justify-content-start">
                                    <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()"  class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="30px" >
                                    </button>
                            </div>
                        </div>

                        <div class="col-12 p-3 ">
                            <div class=" d-flex justify-content-between bg-white p-2 rounded-pill">
                                <a href="{{ route('index.alert') }}"> <span class="badge badge-pill" style="background-color: #2ECC71">Alerta</span> </a>
                                <a href="{{ route('index_admin.seguros') }}"> <span class="badge badge-pill" style="background-color: #8E44AD">Seguro</span> </a>
                                <a href="{{ route('indextc_admin.tarjeta-circulacion') }}"> <span class="badge badge-pill" style="background-color: #F1C40F;color: #000000">Tarjeta Circulacion</span> </a>
                                <a href="{{ route('index_admin.verificacion') }}"> <span class="badge badge-pill" style="background-color: #FF0000">Verificacion</span> </a>
                                <a href="#"> <span class="badge badge-pill" style="background-color: #2980B9">Servicos</span> </a>
                            </div>
                        </div>

                        @include('admin.alerts.calendar')

                </div>

                <div class="row-content" style="position: relative;background-color: #31ba4b;width: 360px;left: -10px"></div>
                    <div class="row bg-down-blue" style="z-index:1000;top: -30px;background-image: linear-gradient(to bottom, #00d62e, #2ce048, #43eb5f, #56f574, #68ff88);border-radius: 30px 30px 0 0;">

                    <div class="col-12 p-4">
                        <h6 class="text-center text-white">
                           <strong style="font: normal normal bold 25px/33px Segoe UI;"> ¿Qué haremos hoy?</strong>
                        </h6>
                    </div>

                    <div class="col-6 text-center">
                         <a href="{{ route('index.alert') }}">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/notification.png') }}" alt="Icon User" width="50px">
                                  <p class="card-text text-white"><strong>Alertas</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 text-center">
                         <a href="{{ route('index_admin.user') }}">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/usuario (1).png') }}" alt="Icon User" width="50px">
                                  <p class="card-text text-white"><strong>Usuarios</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 text-center mt-4">
                        <a href="{{ route('index_admin.automovil') }}">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/coche (4).png') }}" alt="Icon User" width="50px">
                                  <p class="card-text text-white"><strong>vehiculos</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 text-center mt-4">
                        <a  class="text-white" data-toggle="modal" data-target="#Servicios" style="cursor: pointer">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/car-service (1).png') }}" alt="Icon Seguro" width="50px">
                                  <p class="card-text"><strong>Servicios</strong></p>
                              </div>
                            </div>
                         </a>
                    </div>

                    <div class="col-6 text-center mt-4">
                        <a href="{{ route('indextc_admin.tarjeta-circulacion') }}" class="text-white">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/documents (1).png') }}" alt="Icon Exp Fisico" width="50px">
                                  <p class="card-text"><strong>T. Circulacion</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 text-center mt-4">
                        <a href="{{ route('index_admin.view-exp-fisico-admin') }}" class="text-white">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/documento (2).png') }}" alt="Icon gift" width="50px">
                                  <p class="card-text"><strong>Exp Fisico</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 text-center mt-4">
                        <a href="{{ route('index_admin.seguros') }}" class="text-white">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/seguro-de-coche (1).png') }}" alt="Icon Tenencia" width="50px">
                                  <p class="card-text text-white"><strong>Seguros</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 text-center mt-4">
                        <a href="{{ route('index_admin.empresa') }}" class="text-white">

                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" alt="Icon Tenencia" width="50px">
                                  <p class="card-text text-white"><strong>Empresas</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 text-center mt-4" style="margin-bottom: 8rem !important;">
                        <a href="{{ route('index_admin.verificacion') }}" class="text-white">

                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/white/editar.png') }}" alt="Icon Tenencia" width="50px">
                                  <p class="card-text text-white"><strong>Verificacion</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    @include('admin.modal-services')
                </div>


@endsection
