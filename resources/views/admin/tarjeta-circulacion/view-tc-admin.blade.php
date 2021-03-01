@extends('layouts.app')

@section('content')

                <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

                <div class="row bg-blue" style="background: #050F55 0% 0% no-repeat padding-box;">

                        @if(Session::has('success'))
                            <script>
                                Swal.fire({
                                  title: 'Exito!!',
                                  html:
                                    'Se ha actualizado tu  <b>Tarjeta de Circulación</b>, ' +
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
                                        <a href="javascript:history.back()" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong>Tarjetas Circulacion</strong>
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

                            <a class="btn" href="{{ route('create_admin.tarjeta-circulacion') }}">
                                <img class="" src="{{ asset('img/icon/white/plus.png') }}" width="30px" >
                            </a>
                        </div>

                        <div class="col-12">

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                              <div class="carousel-inner">

                                {{-- ----------------------------------------------------------------------------}}
                                {{-- |TC de user--}}
                                {{-- |----------------------------------------------------------------------------}}

                                <div class="carousel-item active">
                                    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                        <strong>Tarjetas Circulacion</strong>
                                    </h5>

                                @if(Session::has('success'))
                                    <script>
                                        Swal.fire(
                                            'Exito!',
                                            'Se ha guardado exitosamiente.',
                                            'success'
                                        )
                                    </script>
                                @endif


                                  <div class="row">
                                    @foreach ($tarjeta_circulacion as $item)
                                        <div class="col-12 mt-4">
                                            <div class="card card-slide-garaje" >
                                              <div class="card-body p-2" >

                                                  <div class="row">
                                                      <div class="col-6 mt-3">
                                                          <a class="card-text" href="#"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->User->name}}</strong></a>
                                                          <p class="card-text" style="font-size: 12px"><strong>{{$item->nombre}}</strong></p>
                                                          <p class="card-text" style="font-size: 12px"><strong>{{$item->current_auto}}</strong></p>
                                                      </div>

                                                    <div class="col-6">
                                                        @if($item->id_tc == NULL)

                                                            @else
                                                            <img class="d-inline mb-2" src="{{ asset('img-tc/'.$item->ImgTc->img) }}"  width="150px">
                                                        @endif
                                                    </div>

                                                  </div>

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



@endsection
