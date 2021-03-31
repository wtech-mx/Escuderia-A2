@extends('admin.layouts.app')

@section('content')

                <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

                <div class="row bg-down-blue" style="border-radius: 0 0 0 0;">


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

                        <div class="col-12">

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="90000">
                              <div class="carousel-inner">

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Vehculos de user--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item active">
                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Expediente de personas</strong>
                                    </h5>

                                  <div class="row">
                                    <div class="content" style="margin-bottom: 10% !important;height: 100vh;">
                                        <div class="col-12">

                                            @foreach ($automovil as $item)

                                             <a class="mb-2" data-toggle="collapse" href="#collapse{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapse{{$item->id}}">
                                                <div class="card card-slide-garaje mt-3" >
                                                  <div class="card-body p-2" >

                                                      <div class="row">
                                                          <div class="col-6 mt-3">
                                                              <p class="card-text"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->submarca}}</strong></p>
                                                              <p class="card-text" style="font-size: 12px"><strong>{{$item->User->name}}</strong></p>
                                                          </div>

                                                          <div class="col-6">
                                                            <img class="d-inline mb-2" src="{{ asset('img/icon/color/dosier.png') }}" alt="Icon documento" width="90px">
                                                          </div>

                                                      </div>

                                                  </div>
                                                </div>
                                             </a>

                                            <div class="collapse mt-1 " id="collapse{{$item->id}}">
                                              <div class="card card-body card-slide-garaje">
                                                  <p class="text-center"><strong style="font-size: 19px">Expediente Fisico</strong></p>

                                                  <div class="d-flex justify-content-between">

                                                      <a href="{{ route('create_admin.view-factura-admin',$item->id) }}">
                                                        <span class="badge bg-primary" style="font-size: 70%;">
                                                            @foreach($factura2 as $autofac)
                                                                @if($item->id == $autofac->current_auto)
                                                                        Facturas {{$factura}}
                                                                    @elseif($autofac == NULL)
                                                                        Facturas 0
                                                                @else
                                                                    Facturas 0
                                                                @endif
                                                            @break
                                                            @endforeach
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-tenencia-admin',$item->id) }}">
                                                        <span class="badge bg-primary" style="font-size: 70%;">
                                                            @foreach($tenencias2 as $auto)
                                                                @if($item->id == $auto->current_auto)
                                                                        Tenencias {{$tenencias}}
                                                                @else
                                                                    Tenencias 0
                                                                @endif
                                                            @break
                                                            @endforeach
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-cr-admin',$item->id) }}">
                                                        <span class="badge bg-primary" style="font-size: 70%;">
                                                            @foreach($carta2 as $auto)
                                                                @if($item->id == $auto->current_auto)
                                                                        Carta Responsiva {{$carta}}
                                                                    @else
                                                                        Carta Responsiva 0
                                                                @endif
                                                            @break
                                                            @endforeach
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-poliza-admin',$item->id) }}">
                                                        <span class="badge bg-primary" style="font-size: 70%;">
                                                            @foreach($poliza2 as $auto)
                                                                @if($item->id == $auto->current_auto)
                                                                        Póliza de Seguro {{$poliza}}
                                                                    @else
                                                                        Póliza de Seguro 0
                                                                @endif
                                                            @break
                                                            @endforeach
                                                        </span>
                                                      </a>

                                                  </div>

                                                  <div class="d-flex justify-content-between">

                                                       <a href="{{ route('create_admin.view-tc-admin',$item->id) }}">
                                                        <span class="badge bg-secondary" style="font-size: 70%;">
                                                            @foreach($tc2 as $auto)
                                                                @if($item->id == $auto->current_auto)
                                                                        tarjeta de circulacion {{$tc}}
                                                                    @else
                                                                        tarjeta de circulacion 0
                                                                @endif
                                                            @break
                                                            @endforeach
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-reemplacamiento-admin',$item->id) }}">
                                                        <span class="badge bg-secondary" style="font-size: 70%;">
                                                            @foreach($reemplacamiento2 as $auto)
                                                                @if($item->id == $auto->current_auto)
                                                                        Reemplacamiento {{$reemplacamiento}}
                                                                    @else
                                                                        Reemplacamiento 0
                                                                @endif
                                                            @break
                                                            @endforeach
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-bp-admin',$item->id) }}">
                                                        <span class="badge bg-secondary" style="font-size: 70%;">
                                                            @foreach($placas2 as $auto)
                                                                @if($item->id == $auto->current_auto)
                                                                        Baja de placas {{$placas}}
                                                                    @else
                                                                        Baja de placas 0
                                                                @endif
                                                            @break
                                                            @endforeach
                                                        </span>
                                                      </a>

                                                  </div>

                                                  <div class="d-flex justify-content-between">

                                                       <a href="{{ route('create_admin.view-ine-admin',$item->id) }}">
                                                        <span class="badge bg-success" style="font-size: 70%;">
                                                            @foreach($ine2 as $auto)
                                                                @if($item->id == $auto->current_auto)
                                                                        INE {{$ine}}
                                                                    @else
                                                                        INE 0
                                                                @endif
                                                            @break
                                                            @endforeach
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-cd-admin',$item->id) }}">
                                                        <span class="badge bg-success" style="font-size: 70%;">
                                                            @foreach($comprobante2 as $auto)
                                                                @if($item->id == $auto->current_auto)
                                                                        Comprobante de domicilio {{$comprobante}}
                                                                    @else
                                                                        Comprobante de domicilio 0
                                                                @endif
                                                            @break
                                                            @endforeach
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-rfc-admin',$item->id) }}">
                                                        <span class="badge bg-success" style="font-size: 70%;">
                                                            @foreach($rfc2 as $auto)
                                                                @if($item->id == $auto->current_auto)
                                                                        RFC {{$rfc}}
                                                                    @else
                                                                        RFC 0
                                                                @endif
                                                            @break
                                                            @endforeach
                                                        </span>
                                                      </a>

                                                  </div>

                                              </div>
                                            </div>

                                            @endforeach

                                        </div>
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
                                    <div class="content" style="margin-bottom: 10% !important;height: 100vh;">
                                        <div class="col-12">

                                            @foreach ($automovil2 as $item)

                                             <a class="mb-2" data-toggle="collapse" href="#collapse{{$item->submarca}}" role="button" aria-expanded="false" aria-controls="collapse{{$item->submarca}}">
                                                <div class="card card-slide-garaje mt-3" >
                                                  <div class="card-body p-2" >

                                                      <div class="row">
                                                          <div class="col-6 mt-3">
                                                              <p class="card-text"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->submarca}}</strong></p>
                                                              <p class="card-text" style="font-size: 12px"><strong>{{$item->Empresa->nombre}}</strong></p>
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

                                </div>

                              </div>

                        </div>

                    </div>

                </div>



@endsection
