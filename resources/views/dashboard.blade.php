@extends('layouts.app')

@section('bg-color', 'background-image:none')
@section('max-height', 'max-height: 300px;')

@section('content')

<p style="display: none">{{$userId = Auth::id()}}</p>

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">

                <div class="row bg-img-log" style="z-index:1000;background-image: linear-gradient(to bottom, #00d62e, #2ce048, #43eb5f, #56f574, #68ff88);">
                    <div class="col-2 ">
                        <div class="d-flex justify-content-start">
                               <a class="btn" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                                   <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="rounded-circle" src="{{ asset('img-perfil/'.$users->img) }}" width="40px" >
                                   </div>
                               </a>

                                <div class="row">
                                  <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                      <div class="card card-body">
                                          <a class="text-dark" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                              <img class="rounded-circle" src="{{ asset('img/icon/black/exit.png') }}" width="15" >
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

                    <div class="col-8">
                        <h5 class="text-center text-white ml-4 mr-4 ">
                            <strong>Hola: {{$users->name}}</strong> <br> <br>
{{--                             <strong>Auto Activo: {{$user->Automovil->submarca}}</strong>--}}
                        </h5>
                    </div>

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                            <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()"  class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="30px" >
                            </button>
                        </div>
                    </div>

                    <style>
                        #calendar{
                            margin: 0px auto;
                        }
                    </style>

                    <div class="col-12 p-3 ">
                            <div class=" d-flex justify-content-between bg-white p-2 rounded-pill">
                                <div class=" d-flex justify-content-between bg-white p-2 rounded-pill">
                                    <a href="{{ route('calendar.index_calendar_user') }}"> <span class="badge badge-pill" style="background-color: #2ECC71">Alerta</span> </a>
                                    <a href="{{ route('index.seguro') }}"> <span class="badge badge-pill" style="background-color: #8E44AD">Seguro</span> </a>
                                    <a href="{{ route('index.tc') }}"> <span class="badge badge-pill" style="background-color: #F1C40F;color: #faf7f7">Tarjeta Circulacion</span> </a>
                                    <a href=""> <span class="badge badge-pill" style="background-color: #FF0000">Verificacion</span> </a>
                                    <a href=""> <span class="badge badge-pill" style="background-color: #2980B9">Servicos</span> </a>
                                </div>
                            </div>
                        </div>

                    <div class="col-12 mb-2" style="height: 300px;">
                         <div class="overflow-auto" style="@yield('max-height')">
                              @include('alerts.calendar')
                          </div>
                    </div>
                </div>

                <div class="row-content" style="position: relative;background-color: #31ba4b;width: 360px;left: -10px"></div>
                    <div class="row bg-down-blue" style="z-index:1000;top: -30px">

                        <div class="col-12 p-4">
                            <h6 class="text-center text-white">

                                ¿Que estas buscando?

                            </h6>
                        </div>

                        <div class="col-6 text-center">
                             <a href="{{ route('calendar.index_calendar_user') }}">
                                <div class="card" style="border-radius: 15px">
                                  <div class="card-body" >
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/campana.png') }}" alt="Icon User" width="50px">
                                      <p class="card-text text-dark"><strong>Alertas</strong></p>
                                  </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 text-center">
                             <a href="{{ route('edit.profile', $userId) }}">
                                <div class="card" style="border-radius: 15px">
                                  <div class="card-body" >
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/user.png') }}" alt="Icon User" width="50px">
                                      <p class="card-text text-dark"><strong>Datos de perfil</strong></p>
                                  </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 text-center mt-4">
                            <a href="{{ route('index.automovil') }}">
                                <div class="card" style="border-radius: 15px">
                                  <div class="card-body" >
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/coche (2).png') }}" alt="Icon User" width="50px">
                                      <p class="card-text text-dark"><strong>Datos de auto</strong></p>
                                  </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 text-center mt-4">
                            <a href="{{ route('index.tc') }}" class="text-dark">
                                <div class="card" style="border-radius: 15px">
                                  <div class="card-body" >
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/documento.png') }}" alt="Icon documento" width="50px">
                                      <p class="card-text"><strong>T. de Circulacion</strong></p>
                                  </div>
                                </div>
                             </a>
                        </div>

                        <div class="col-6 text-center mt-4">
                            <a href="{{ route('index.seguro') }}" class="text-dark">
                                <div class="card" style="border-radius: 15px">
                                  <div class="card-body" >
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/seguro-de-coche.png') }}" alt="Icon Seguro" width="50px">
                                      <p class="card-text"><strong>Seguro</strong></p>
                                  </div>
                                </div>
                             </a>
                        </div>

                        <div class="col-6 text-center mt-4">
                            <a href="{{ route('index_exp') }}" class="text-dark">
                                <div class="card" style="border-radius: 15px">
                                  <div class="card-body" >
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/expediente.png') }}" alt="Icon Exp Fisico" width="50px">
                                      <p class="card-text"><strong>Exp Fisico</strong></p>
                                  </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 text-center mt-4 mb-5" style="margin-bottom: 8rem !important;">
                            <a href="{{ route('view-win-share') }}" class="text-dark">
                                <div class="card" style="border-radius: 15px">
                                  <div class="card-body" >
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/gift.png') }}" alt="Icon gift" width="50px">
                                      <p class="card-text"><strong>Comparte y Gana</strong></p>
                                  </div>
                                </div>
                            </a>
                        </div>

                    </div>


@endsection
