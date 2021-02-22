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
                                        <strong>Expediente Fisico</strong>
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

                            <a class="btn" href="">
                                <img class="" src="{{ asset('img/icon/white/plus.png') }}" width="30px" >
                            </a>
                        </div>

                        <div class="col-12">

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                              <div class="carousel-inner">

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Vehculos de user--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item active">
                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Expediente de personas</strong>
                                    </h5>

                                  <div class="row">

                                        <div class="col-12 mt-4">

                                            @foreach ($automovil as $item)

                                             <a class="mb-2" data-toggle="collapse" href="#collapse{{$item->submarca}}" role="button" aria-expanded="false" aria-controls="collapse{{$item->submarca}}">
                                                <div class="card card-slide-garaje" >
                                                  <div class="card-body p-2" >

                                                      <div class="row">
                                                          <div class="col-6 mt-3">
                                                              <p class="card-text"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->submarca}}</strong></p>
                                                              <p class="card-text" style="font-size: 12px"><strong>{{$item->User->name}}</strong></p>
                                                              <p class="card-text" style="font-size: 12px"><strong>{{$item->id}}</strong></p>
                                                          </div>

                                                          <div class="col-6">
                                                            <img class="d-inline mb-2" src="{{ asset('img/icon/color/dosier.png') }}" alt="Icon documento" width="90px">
                                                          </div>

                                                      </div>

                                                  </div>
                                                </div>
                                             </a>

                                            <div class="collapse mt-1 " id="collapse{{$item->submarca}}">
                                              <div class="card card-body card-slide-garaje">
                                                  <p class="text-center"><strong style="font-size: 19px">Expediente Fisico</strong></p>

                                                  <div class="d-flex justify-content-between">

                                                      <a href="{{ route('create_admin.view-factura-admin',$item->id) }}">
                                                        <span class="badge badge-primary" style="font-size: 70%;">
                                                          Facturas
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-tenencia-admin',$item->id) }}">
                                                        <span class="badge badge-primary" style="font-size: 70%;">
                                                           Tenencias
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-cr-admin',$item->id) }}">
                                                        <span class="badge badge-primary" style="font-size: 70%;">
                                                            Carta Responsiva
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-poliza-admin',$item->id) }}">
                                                        <span class="badge badge-primary" style="font-size: 70%;">
                                                            Póliza de Seguro
                                                        </span>
                                                      </a>

                                                  </div>

                                                  <div class="d-flex justify-content-between">

                                                       <a href="{{ route('create_admin.view-tc-admin',$item->id) }}">
                                                        <span class="badge badge-secondary" style="font-size: 70%;">
                                                            tarjeta de circulacion
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-reemplacamiento-admin',$item->id) }}">
                                                        <span class="badge badge-secondary" style="font-size: 70%;">
                                                            Reemplacamiento
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-bp-admin',$item->id) }}">
                                                        <span class="badge badge-secondary" style="font-size: 70%;">
                                                            Baja de placas
                                                        </span>
                                                      </a>

                                                  </div>

                                                  <div class="d-flex justify-content-between">

                                                       <a href="{{ route('create_admin.view-ine-admin',$item->id) }}">
                                                        <span class="badge badge-success" style="font-size: 70%;">
                                                            INE
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-cd-admin',$item->id) }}">
                                                        <span class="badge badge-success" style="font-size: 70%;">
                                                            Comprobante de domicilio
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-rfc-admin',$item->id) }}">
                                                        <span class="badge badge-success" style="font-size: 70%;">
                                                            RFC
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
