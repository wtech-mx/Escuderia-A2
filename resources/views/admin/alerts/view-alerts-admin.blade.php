@extends('layouts.app')

@section('content')

                <div class="row bg-blue" style="background: #050F55 0% 0% no-repeat padding-box;">

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
                                        <strong>Alertas y Calendario</strong>
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

                            <a type="button"  data-toggle="modal" data-target="#alert-modal">
                                <img class="" src="{{ asset('img/icon/white/plus.png') }}" width="30px" >
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
                                            <strong>Alertas Servicios</strong>
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
                                        <div class="col-12">
                                            <table class="table text-white ">
                                              <thead>
                                                <tr>
                                                  <th scope="col"></th>
                                                  <th scope="col">Servicio</th>
                                                  <th scope="col">Km</th>
                                                  <th scope="col">Fecha</th>
                                                  <th scope="col">cambio</th>
                                                </tr>
                                              </thead>

                                              <tbody>
                                                <tr>
                                                  <th scope="row">1</th>
                                                  <td>Mark</td>
                                                  <td>Otto</td>
                                                  <td>@mdo</td>
                                                  <td>@mdo</td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                      </div>

                                    </div>

                                    {{-- ----------------------------------------------------------------------------}}
                                    {{-- |Vehculos de empresa--}}
                                    {{-- |----------------------------------------------------------------------------}}

                                    <div class="carousel-item ">

                                        <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                            <strong>Alertas Personalizadas</strong>
                                        </h5>

                                      <div class="row">

                                            <div class="col-12">
                                                <table class="table text-white">

                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Usuario</th>
                                                      <th scope="col">Titulo</th>
                                                      <th scope="col">Descripcion</th>
                                                      <th scope="col">Fecha Inicio</th>
                                                    </tr>
                                                  </thead>

                                                  <tbody>
                                                    <tr>
                                                        @foreach($alert as $item)

                                                        @php
                                                        $originalDate = $item->fecha_inicio;
                                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                                        @endphp

                                                          <td>{{$item->User->name}}</td>
                                                          <td>{{$item->titulo}}</td>
                                                          <td>{{$item->descripcion}}</td>
                                                          <td>{{$newDate}}</td>
                                                        @endforeach
                                                    </tr>
                                                  </tbody>

                                                </table>
                                            </div>

                                      </div>

                                    </div>

                                  </div>

                            </div>

                        </div>

                    @foreach($alert as $item)
                     <script>

                            Push.create('{{$item->titulo}}', {
                                body: '{{$item->descripcion}}',
                                icon: '{{ asset('/icon-512x512.ico') }}',
                                timeout: 6000,
                                onClick: function () {
                                    window.focus();
                                    this.close();
                                }
                            });

                    </script>
                    @endforeach



                </div>



@endsection
