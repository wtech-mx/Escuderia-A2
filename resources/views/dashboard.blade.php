@extends('layouts.app')

@section('bg-color', 'background-image:none')

@section('content')

<p style="display: none">{{$userId = Auth::id()}}</p>

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">

                <div class="row bg-img-log" style="background-image: url({{ asset('img/bg-log.png') }});">
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
                            <strong>Hola : {{$users->name}}</strong> <br> <br>
{{--                             <strong>Auto Activo: {{$user->Automovil->submarca}}</strong>--}}
                        </h5>
                    </div>

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="30px" >
                                </div>
                        </div>
                    </div>

                    <style>
                        #calendar{
                            margin: 0px auto;
                        }
                    </style>

                        <div class="col-12 p-3 ">
                            <div class=" d-flex justify-content-between bg-white p-2 rounded-pill">
                                <span class="badge badge-pill" style="background-color: #2ECC71">Alerta</span>
                                <span class="badge badge-pill" style="background-color: #8E44AD">Seguro</span>
                                <span class="badge badge-pill" style="background-color: #F1C40F;color: #000000">Tarjeta Circulacion</span>
                                <span class="badge badge-pill" style="background-color: #FF0000">Verificacion</span>
                                <span class="badge badge-pill" style="background-color: #2980B9">Servicos</span>
                            </div>
                        </div>

                    <div class="col-md-12">

{{--                            <div class="card" style="border-radius: 15px;position: relative;top: 15px;opacity: 0.7;">--}}
{{--                              <div class="card-body" >--}}
{{--                                  <h4 class="card-text d-inline mr-4 ">--}}
{{--                                     <strong>Servicio de mecanica</strong>--}}
{{--                                  </h4>--}}
{{--                                  <button class="btn" style="border-radius: 10px;background-color: #050f55">--}}
{{--                                      <img class="d-inline mb-2" src="{{ asset('img/icon/white/call.png')}}" alt="Icon User" width="15px">--}}
{{--                                  </button>--}}
{{--                              </div>--}}
{{--                            </div>--}}

{{--                            <div class="card" style="border-radius: 15px">--}}
{{--                              <div class="card-body" >--}}
{{--                                  <p class="card-text">--}}
{{--                                      <strong>CDMX | Calle 25, esquina con Av. Patri TEL : 5510079878</strong>--}}
{{--                                  </p>--}}
{{--                              </div>--}}
{{--                            </div>--}}

                         @include('alerts.calendar')

                    </div>
                </div>

                <div class="row bg-down-blue" style="z-index:1000">
                    <div class="col-12 p-4">
                        <h6 class="text-center text-white">

                            ¿Que estas buscando?

                        </h6>
                    </div>

                    <div class="col-6">
                         <a href="{{ route('calendar.index_calendar_user') }}">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/black/campana.png') }}" alt="Icon User" width="50px">
                                  <p class="card-text text-dark"><strong>Alertas</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6">
                         <a href="{{ route('edit.profile', $userId) }}">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/black/user.png') }}" alt="Icon User" width="50px">
                                  <p class="card-text text-dark"><strong>Datos de perfil</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a href="{{ route('index.automovil') }}">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/black/coche (2).png') }}" alt="Icon User" width="50px">
                                  <p class="card-text text-dark"><strong>Datos de auto</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a href="{{ route('index.tc') }}" class="text-dark">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/black/documento.png') }}" alt="Icon documento" width="50px">
                                  <p class="card-text"><strong>T. de Circulacion</strong></p>
                              </div>
                            </div>
                         </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a href="{{ route('index.seguro') }}" class="text-dark">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/black/seguro-de-coche.png') }}" alt="Icon Seguro" width="50px">
                                  <p class="card-text"><strong>Seguro</strong></p>
                              </div>
                            </div>
                         </a>
                    </div>

                    <div class="col-6 mt-4">
                        <a href="{{ route('index_exp') }}" class="text-dark">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <img class="d-inline mb-2" src="{{ asset('img/icon/black/expediente.png') }}" alt="Icon Exp Fisico" width="50px">
                                  <p class="card-text"><strong>Exp Fisico</strong></p>
                              </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mt-4 mb-5" style="margin-bottom: 8rem !important;">
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
