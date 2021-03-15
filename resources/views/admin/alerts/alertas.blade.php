                            <div class="d-flex justify-content-between">

                                <div class="col-6 mt-4">
                                    <a class="btn mb-3 mr-1" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <img class="" src="{{ asset('img/icon/white/flecha-izquierda.png') }}" width="25px" >
                                    </a>

                                    <a class="btn mb-3 " href="#carouselExampleControls" role="button" data-slide="next">
                                        <img class="" src="{{ asset('img/icon/white/flecha-correcta.png') }}" width="25px" >
                                    </a>
                                </div>

                            </div>


                            @if(Session::has('success'))
                            <script>
                                Swal.fire(
                                    'Exito!',
                                    'Se ha guardado exitosamiente.',
                                    'success'
                                )
                            </script>
                        @endif

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

                                            {{  Form::open(['route' => 'index.alert' , 'method' => 'GET' , 'class'=>'form-inline pull-right'] )  }}
                                            <div class="d-flex justify-content-center mt-5">

                                                         <div class="form-group">
                                                              {{ Form::text('titulo', null,['class' => 'form-control','placeholder' => 'titulo'])  }}
                                                         </div>

                                                        <button type="submit" class="btn btn-default">
                                                            <img class="" src="{{ asset('img/icon/white/search.png') }}" width="25px" >
                                                        </button>

                                            </div>
                                            {{Form::close()}}


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

                                                    @foreach($alert as $item)
                                                    <tr>
                                                        @php
                                                        $originalDate = $item->start;
                                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                                        @endphp

                                                          <td></td>
                                                          <td>{{$item->title}}</td>
                                                          <td>{{$item->descripcion}}</td>
                                                          <td>{{$newDate}}</td>
                                                    </tr>
                                                     @endforeach
                                                  </tbody>

                                                </table>
{{--                                                {{ $alert->render() }}--}}
                                            </div>

                                      </div>

                                    </div>

                                  </div>


                            </div>

                        </div>
