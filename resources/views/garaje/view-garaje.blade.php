@extends('layouts.app')

@section('content')

<p style="display: none">{{$userId = Auth::id()}}</p>

                <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

                <div class="row bg-blue" style="background: #050F55 0% 0% no-repeat padding-box;">

                    @if(Session::has('success'))
                        <script>
                            Swal.fire(
                                'Exito!',
                                'Se ha guardado auto  exitosamiente.',
                                'success'
                            )
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
                                        <strong>Garaje</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="d-flex justify-content-end">
                                <h4 class="text-white text-tittle-app mr-3">
                                    Agregar
                                </h4>
                                <a class="btn btn-garaje" href="{{ route('create.automovil') }}">
                                     <img class="" src="{{ asset('img/icon/white/add.png') }}" width="20px" >
                                </a>
                            </div>
                        </div>

                        <div class="col-12">

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                              <div class="carousel-inner">

                                <div class="col-12 text-right">
                                    <div class="d-flex justify-content-start">
                                        <a class="btn btn-garaje mb-3 mr-1" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <i class="bi bi-arrow-left-short text-white"></i>
                                        </a>
                                        <a class="btn btn-garaje mb-3 " href="#carouselExampleControls" role="button" data-slide="next">
                                            <i class="bi bi-arrow-right-short text-white"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="carousel-item active">

                                  <div class="row">
                                      @foreach($automovil as $item)
                                        <div class="col-6  mt-4">
                                            <div class="card card-slide-garaje">
                                              <div class="card-body" >
                                                  <img class="d-inline mb-2" src="{{ asset('img/icon/car2.png') }}" alt="Icon documento" width="150px">
                                                  <p class="card-text"><strong>{{$item->submarca}}</strong></p>
                                                  <p class="card-text" style="font-size: 12px"><strong>{{$item->kilometraje}} KM Recorridos</strong></p>
                                              </div>
                                            </div>
                                        </div>
                                      @endforeach
                                  </div>

                                </div>

                              </div>

                        </div>

                    </div>

                        <div class="col-12 mt-5 mb-5">
                            <div class="d-flex justify-content-between">
                                <h4 class="text-white text-tittle-app mr-3">
                                    Detalles de Vehiculo
                                </h4>

                                <a class="btn btn-garaje-2" href="{{ route('edit.automovil',$userId) }}">
                                     <img class="" src="{{ asset('img/icon/white/editar.png') }}" width="20px" >
                                </a>
                            </div>
                        </div>

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <p class="card-text text-center text-garaje">
                                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/proteger.png') }}" alt="Icon documento" width="50px">
                                      <strong>Marca</strong>
                                  </p>
                              </div>
                            </div>
                    </div>

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <p class="card-text text-center text-garaje">
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/documento.png') }}" alt="Icon documento" width="50px">
                                      <strong>Submarca </strong>
                                  </p>
                              </div>
                            </div>
                    </div>

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <p class="card-text text-center text-garaje ">
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/coche (2).png') }}" alt="Icon documento" width="50px">
                                      <strong>Tipo</strong>
                                  </p>
                              </div>
                            </div>
                    </div>


                {{-- ----------------------}}

                     <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <p class="card-text text-center text-garaje">
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/coche (3).png') }}" alt="Icon documento" width="50px">
                                      <strong>Subtipo</strong>
                                  </p>
                              </div>
                            </div>
                    </div>

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <p class="card-text text-center text-garaje">
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/days.png') }}" alt="Icon documento" width="50px">
                                      <strong>Año</strong>
                                  </p>
                              </div>
                            </div>
                    </div>

                     <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <p class="card-text text-center text-garaje">
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/color-palette.png') }}" alt="Icon documento" width="50px">
                                      <strong>Color</strong>
                                  </p>
                              </div>
                            </div>
                    </div>

                {{-- ----------------------}}

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <p class="card-text text-center text-garaje">
                                       <img class="d-inline mb-2" src="{{ asset('img/icon/black/barcode.png') }}" alt="Icon documento" width="50px">
                                      <strong>Num de Serie</strong>
                                  </p>
                              </div>
                            </div>
                    </div>

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <p class="card-text text-center text-garaje">
                                       <img class="d-inline mb-2" src="{{ asset('img/icon/black/llantas.png') }}" alt="Icon documento" width="50px">
                                      <strong>Med llantas</strong>
                                  </p>
                              </div>
                            </div>
                    </div>

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px">
                              <div class="card-body" >
                                  <p class="card-text text-center text-garaje">
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/placa.png') }}" alt="Icon documento" width="50px">
                                      <strong>Num Placas</strong>
                                  </p>
                              </div>
                            </div>
                    </div>

                </div>



@endsection