@extends('admin.layouts.app')

@section('content')

                <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

                 <div class="row bg-image" >

                        @if(Session::has('success'))
                            <script>
                                Swal.fire({
                                  title: 'Exito!!',
                                  html:
                                    'Se ha actualizado tu  <b>Tarjeta de Circulaci&oacute;n</b>, ' +
                                    'Exitosamente',
                                  // text: 'Se ha agragado la "TC" Exitosamente',
                                  imageUrl: '{{ asset('img/icon/color/dosier.png') }}',
                                  background: '#fff',
                                  imageWidth: 150,
                                  imageHeight: 150,
                                  imageAlt: 'USUARIO IMG',
                                })
                            </script>
                        @endif

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
                                        <strong>Tarjetas Circulaci&oacute;n</strong>
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

                            {{  Form::open(['route' => 'indextc_admin.tarjeta-circulacion' , 'method' => 'GET' , 'class'=>'form-inline pull-right'] )  }}
                            <div class="d-flex justify-content-center mt-5">

                                <div class="form-group">
                                    {{ Form::text('nombre', null,['class' => 'form-control','placeholder' => 'Busqueda de nombre'])  }}
                                </div>

                                <button type="submit" class="btn btn-default">
                                    <img class="" src="{{ asset('img/icon/white/search.png') }}" width="25px" >
                                </button>

                            </div>
                            {{Form::close()}}
                                        <div class="col-12 mt-4 ">
                                            <div class="d-flex justify-content-center">
                                                {!! $tarjeta_circulacion->links() !!}
                                            </div>
                                        </div>
                        <div class="col-12">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                              <div class="carousel-inner">

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |TC de user--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item active">
                                    <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center">
                                                    <a class="text-white mt-3 p-2" href="/exportar/tc" >
                                                        <i class="fa fa-download icon-effect-sm" aria-hidden="true"></i>
                                                    </a>

                                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                                        <strong>Tarjeta Circulacion</strong>
                                                    </h5>
                                                </div>
                                            </div>

                                    @if(Session::has('success'))
                                        <script>
                                            Swal.fire(
                                                'Exito!',
                                                'Se ha guardado exitosamente.',
                                                'success'
                                            )
                                        </script>
                                    @endif



                                      <div class="content" style="margin-bottom: 10% !important;height: 100vh;">
                                      @foreach ($tarjeta_circulacion as $item)
                                        <div class="col-12 mt-4">
                                            <div class="card card-slide-garaje" >
                                              <div class="card-body p-2" >

                                                  <div class="row">
                                                      <div class="col-6 mt-3">
                                                          <a class="card-text" href="{{ route('edit_admin.tarjeta-circulacion',$item->id) }}"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->User->name}}</strong></a>
                                                          <p class="card-text" style="font-size: 12px"><strong>{{$item->nombre}}</strong></p>
                                                          <p class="card-text" style="font-size: 12px"><strong>{{$item->Automovil->Marca->nombre}}</strong></p>
                                                      </div>
                                                  </div>

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

                                <div class="carousel-item">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center">
                                                    <a class="text-white mt-3 p-2" href="/exportar/tc/empresa" >
                                                        <i class="fa fa-download icon-effect-sm" aria-hidden="true"></i>
                                                    </a>

                                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                                        <strong>Tarjeta Circulacion Empresa</strong>
                                                    </h5>
                                                </div>
                                            </div>

                                    @if(Session::has('success'))
                                        <script>
                                            Swal.fire(
                                                'Exito!',
                                                'Se ha guardado exitosamente.',
                                                'success'
                                            )
                                        </script>
                                    @endif


                                  <div class="row">
                                      <div class="content" style="margin-bottom: 10% !important;height: 100vh;">
                                      @foreach ($tarjeta_circulacion2 as $item)
                                        <div class="col-12 mt-4">
                                            <div class="card card-slide-garaje" >
                                              <div class="card-body p-2" >

                                                  <div class="row">
                                                      <div class="col-6 mt-3">
                                                          <a class="card-text" href="{{ route('edit_admin.tarjeta-circulacion',$item->id) }}"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->Empresa->nombre}}</strong></a>
                                                          <p class="card-text" style="font-size: 12px"><strong>{{$item->nombre}}</strong></p>
                                                          <p class="card-text" style="font-size: 12px"><strong>{{$item->Automovil->Marca->nombre}}</strong></p>
                                                      </div>
                                                  </div>

                                              </div>
                                            </div>
                                        </div>
                                      @endforeach
                                        <div class="col-12 mt-4 ">
                                            <div class="d-flex justify-content-center">
                                                {!! $tarjeta_circulacion2->links() !!}
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
