@extends('admin.layouts.app')

@section('content')

                <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

                <div class="row bg-down-blue container-res" style="border-radius: 0 0 0 0; ">


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
                                        <strong>Expediente F&iacute;sico</strong>
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
                                    {{  Form::open(['route' => 'index_admin.view-exp-fisico-admin' , 'method' => 'GET' , 'class'=>'form-inline pull-right'] )  }}
                                        <div class="d-flex justify-content-center mt-5">

                                                     <div class="form-group">
                                                          {{ Form::text('placas', null,['class' => 'form-control','placeholder' => 'Busqueda por Placas'])  }}
                                                     </div>

                                                    <button type="submit" class="btn btn-default">
                                                        <img class="" src="{{ asset('img/icon/white/search.png') }}" width="25px" >
                                                    </button>

                                        </div>
                                    {{Form::close()}}
                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Vehculos de user--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item active">
                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Expediente de personas</strong>
                                    </h5>

                                  <div class="row">

                                        <div class="col-12 mt-4 ">
                                            <div class="d-flex justify-content-center">
                                                {!! $automovil->links() !!}
                                            </div>
                                        </div>

                                    <div class="content container-res-inter">
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
                                                  <p class="text-center"><strong style="font-size: 19px">Expediente F&iacute;sico</strong></p>

                                                  <div class="d-flex justify-content-between">

                                                      <a href="{{ route('create_admin.view-factura-admin',$item->id) }}">
                                                        <span class="badge bg-primary" style="font-size: 70%;">
                                                            Facturas

                                                            @if($item->User->id == $item->id_user)
                                                                {{$item->ExpFactura->count()}}
                                                            @endif

                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-tenencia-admin',$item->id) }}">
                                                        <span class="badge bg-primary" style="font-size: 70%;">
                                                            Tenencias

                                                            @if($item->User->id == $item->id_user)
                                                                {{$item->ExpTenencias->count()}}
                                                            @endif
                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-cr-admin',$item->id) }}">
                                                        <span class="badge bg-primary" style="font-size: 70%;">
                                                            Carta Responsiva

                                                            @if($item->User->id == $item->id_user)
                                                                {{$item->ExpCarta->count()}}
                                                            @endif

                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-poliza-admin',$item->id) }}">
                                                        <span class="badge bg-primary" style="font-size: 70%;">
                                                            Póliza de Seguro

                                                            @if($item->User->id == $item->id_user)
                                                                {{$item->ExpPoliza->count()}}
                                                            @endif

                                                        </span>
                                                      </a>

                                                  </div>

                                                  <div class="d-flex justify-content-between">

                                                       <a href="{{ route('create_admin.view-tc-admin',$item->id) }}">
                                                        <span class="badge bg-secondary" style="font-size: 70%;">
                                                            tarjeta de circulaci&oacute;n

                                                            @if($item->User->id == $item->id_user)
                                                                {{$item->ExpTc->count()}}
                                                            @endif

                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-reemplacamiento-admin',$item->id) }}">
                                                        <span class="badge bg-secondary" style="font-size: 70%;">
                                                            Reemplacamiento

                                                            @if($item->User->id == $item->id_user)
                                                                {{$item->ExpReemplacamiento->count()}}
                                                            @endif

                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-certificado-admin',$item->id) }}">
                                                        <span class="badge bg-secondary" style="font-size: 70%;">
                                                            Verificaci&oacute;n

                                                            @if($item->User->id == $item->id_user)
                                                                {{$item->ExpCertificado->count()}}
                                                            @endif

                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-bp-admin',$item->id) }}">
                                                        <span class="badge bg-secondary" style="font-size: 70%;">
                                                            Baja de placas

                                                            @if($item->User->id == $item->id_user)
                                                                {{$item->ExpPlacas->count()}}
                                                            @endif

                                                        </span>
                                                      </a>

                                                  </div>

                                                  <div class="d-flex justify-content-between">

                                                       <a href="{{ route('create_admin.view-ine-admin',$item->id) }}">
                                                        <span class="badge bg-success" style="font-size: 70%;">
                                                            INE

                                                            @if($item->User->id == $item->id_user)
                                                                {{$item->ExpIne->count()}}
                                                            @endif

                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-cd-admin',$item->id) }}">
                                                        <span class="badge bg-success" style="font-size: 70%;">
                                                            Comprobante de domicilio

                                                            @if($item->User->id == $item->id_user)
                                                                {{$item->ExpDomicilio->count()}}
                                                            @endif

                                                        </span>
                                                      </a>

                                                       <a href="{{ route('create_admin.view-rfc-admin',$item->id) }}">
                                                        <span class="badge bg-success" style="font-size: 70%;">
                                                            RFC

                                                            @if($item->User->id == $item->id_user)
                                                                {{$item->ExpRfc->count()}}
                                                            @endif

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
                                        <div class="col-12 mt-4 ">
                                            <div class="d-flex justify-content-center">
                                                {!! $automovil2->links() !!}
                                            </div>
                                        </div>

                                    <div class="content container-res-inter">
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
                                                  <p class="text-center"><strong style="font-size: 19px">Expediente F&iacute;sico</strong></p>

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
                                                            Tarjeta de circulaci&oacute;n
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
