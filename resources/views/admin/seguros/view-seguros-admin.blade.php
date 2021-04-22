@extends('admin.layouts.app')

@section('content')

                <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

                <div class="row bg-image" >

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
                                        <strong>Seguros</strong>
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

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                              <div class="carousel-inner">

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Vehculos de user--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center">
                                                    <a class="text-white mt-3 p-2" href="/exportar/seguro" >
                                                        <i class="fa fa-download icon-effect-sm" aria-hidden="true"></i>
                                                    </a>

                                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                                        <strong>Seguros Personales</strong>
                                                    </h5>
                                                </div>
                                            </div>

                                        {{  Form::open(['route' => 'index_admin.seguros' , 'method' => 'GET' , 'class'=>'form-inline pull-right'] )  }}
                                        <div class="d-flex justify-content-center mt-5">

                                                     <div class="form-group">
                                                          {{ Form::text('seguro', null,['class' => 'form-control','placeholder' => 'Busqueda de seguro'])  }}
                                                     </div>

                                                    <button type="submit" class="btn btn-default">
                                                        <img class="" src="{{ asset('img/icon/white/search.png') }}" width="25px" >
                                                    </button>

                                        </div>
                                        {{Form::close()}}

                                        <div class="col-12 mt-4 ">
                                            <div class="d-flex justify-content-center">
                                                {!! $seguros->links() !!}
                                            </div>
                                        </div>

                                        <div class="content container-res-inter">
                                                <div class="col-12">
                                                    @foreach ($seguros as $item)
                                                    <a class="card-text " href="{{ route('edit_admin.seguro',$item->id) }}" style="text-decoration: none;color: #000000">
                                                        <div class="card card-slide-garaje mt-3 mb-3" >
                                                          <div class="card-body p-2" >

                                                              <div class="row">
                                                                  <div class="col-6 mt-3">
                                                                      <p class="card-text" href="{{ route('edit_admin.seguro',$item->id) }}"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->User->name}}</strong></p>
                                                                      <p class="card-text" style="font-size: 12px"><strong>{{$item->Automovil->submarca}}</strong></p>
                                                                      <p class="card-text" style="font-size: 12px"><strong>{{$item->seguro}}</strong></p>
                                                                  </div>
                                                                @if ($item->seguro == 'sin seguro')
                                                                  <div class="col-6">
                                                                    <img class="d-inline mb-2" src="{{ asset('img/icon/page-not-found.png') }}" alt="Icon documento" width="150px">
                                                                  </div>
                                                                @else
                                                                  <div class="col-6">
                                                                    <img class="d-inline mb-2" src="{{ asset('img/icon/seguros/'.$item->seguro.'.png') }}" alt="Icon documento" width="150px">
                                                                  </div>
                                                                @endif


                                                              </div>

                                                          </div>
                                                        </div>
                                                    </a>
                                                   @endforeach
                                                </div>
                                        </div>

                                  </div>

                                </div>

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |Vehculos de empresa--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item ">
                                  <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center">
                                                    <a class="text-white mt-3 p-2" href="/exportar/seguro/empresa" >
                                                        <i class="fa fa-download icon-effect-sm" aria-hidden="true"></i>
                                                    </a>

                                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                                        <strong>Seguros Empresas</strong>
                                                    </h5>
                                                </div>
                                            </div>

                                        {{  Form::open(['route' => 'index_admin.seguros' , 'method' => 'GET' , 'class'=>'form-inline pull-right'] )  }}
                                        <div class="d-flex justify-content-center mt-5">
                                            <div class="form-group">
                                                {{ Form::text('seguro', null,['class' => 'form-control','placeholder' => 'Busqueda de seguro'])  }}
                                            </div>

                                            <button type="submit" class="btn btn-default">
                                                <img class="" src="{{ asset('img/icon/white/search.png') }}" width="25px" >
                                            </button>
                                        </div>
                                        {{Form::close()}}

                                     <div class="content container-res-inter">
                                            <div class="col-12 mt-4">
                                            @foreach ($seguros2 as $item)
                                            <div class="card card-slide-garaje mt-3" >
                                              <div class="card-body p-2" >
                                                  <div class="row">
                                                      <div class="col-6 mt-3">
                                                          <a class="card-text" href="{{ route('edit_admin.seguro',$item->id) }}"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->Empresa->nombre}}</strong></a>
                                                          <p class="card-text" style="font-size: 12px"><strong>{{$item->Automovil->submarca}}</strong></p>
                                                          <p class="card-text" style="font-size: 12px"><strong>{{$item->seguro}}</strong></p>
                                                      </div>
                                                      <div class="col-6">
                                                         <img class="d-inline mb-2" src="{{ asset('img/icon/seguros/'.$item->seguro.'.png') }}" alt="Icon documento" width="150px">
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>
                                            @endforeach
                                        </div>

                                            <div class="col-12 mt-4 ">
                                                <div class="d-flex justify-content-center">
                                                    {!! $seguros2->links() !!}
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
