
                        <div class="col-12">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
                                  <div class="carousel-inner">

                                    {{-- ----------------------------------------------------------------------------}}
                                    {{-- |Servicios Llantas--}}
                                    {{-- |----------------------------------------------------------------------------}}

                                    <div class="carousel-item active">
                                        <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                                            <strong>Servicios</strong>
                                        </h5>

                                      <div class="row">

                                            <div class="carousel-item active">

                                              <div class="row">
                                                <div class="col-12">
                                                    <table class="table text-white ">
                                                      <thead>
                                                        <tr>
                                                          <th scope="col">Servicio</th>
                                                          <th scope="col">Auto</th>
                                                          <th scope="col">Usuario</th>
                                                          <th scope="col">Fecha</th>
                                                          <th scope="col">Más</th>
{{--                                                          <th scope="col">Estatus</th>--}}
                                                        </tr>
                                                      </thead>
                                                        @foreach ($mecanica_user as $item)
                                                            @php
                                                                   switch ($item) {
                                                                        case( $item->servicio == 1 ):
                                                                            $servicio = 'Llantas';
                                                                        break;
                                                                        case( $item->servicio == 2 ):
                                                                            $servicio = 'Banda';
                                                                        break;
                                                                        case( $item->servicio == 3 ):
                                                                            $servicio = 'Freno';
                                                                        break;
                                                                        case( $item->servicio == 4 ):
                                                                            $servicio = 'Aceite';
                                                                        break;
                                                                        case( $item->servicio == 5 ):
                                                                            $servicio = 'Afinacion';
                                                                        break;
                                                                        case( $item->servicio == 6 ):
                                                                            $servicio = 'Amortig';
                                                                        break;
                                                                        case( $item->servicio == 7 ):
                                                                            $servicio = 'Bateria';
                                                                        break;
                                                                   }

                                                                   switch($item) {
                                                                      case($item->servicio == '1'):
                                                                         $user = $item->User->name;
                                                                         $auto = $item->Automovil2->placas;
                                                                         $sub = $item->Automovil2->submarca;
                                                                      break;
                                                                      //Banda
                                                                      case($item->servicio == '2'):
                                                                         $user = $item->Userbn->name;
                                                                         $auto = $item->Automovilbn->placas;
                                                                         $sub = $item->Automovilbn->submarca;
                                                                      break;
                                                                      //Frenos
                                                                      case($item->servicio == '3'):
                                                                          $user = $item->Userfr->name;
                                                                          $auto = $item->Automovilfr->placas;
                                                                          $sub = $item->Automovilfr->submarca;
                                                                      break;
                                                                      //Aceite
                                                                      case($item->servicio == '4'):
                                                                          $user = $item->Userac->name;
                                                                          $auto = $item->Automovilac->placas;
                                                                          $sub = $item->Automovilac->submarca;
                                                                      break;
                                                                      //Afinacion
                                                                      case($item->servicio == '5'):
                                                                          $user = $item->Useraf->name;
                                                                          $auto = $item->Automovilaf->placas;
                                                                          $sub = $item->Automovilaf->submarca;
                                                                      break;
                                                                      //Amorting
                                                                      case($item->servicio == '6'):
                                                                          $user = $item->Useram->name;
                                                                          $auto = $item->Automovilam->placas;
                                                                          $sub = $item->Automovilam->submarca;
                                                                      break;
                                                                      //Bateria
                                                                      case($item->servicio == '7'):
                                                                          $user = $item->Userbt->name;
                                                                          $auto = $item->Automovilbt->placas;
                                                                          $sub = $item->Automovilbt->submarca;
                                                                      break;
                                                                   }

                                                           @endphp
                                                          <tbody>
                                                            <tr>
                                                              <td>{{$servicio}}</td>
                                                              <td>{{$auto}} <br> {{$sub}}</td>
                                                              <td>{{$user}}</td>
                                                              <td>{{$item->start}}</td>
                                                              <td>
                                                                  <a data-toggle="modal" data-target="#example{{$item->id}}"><img class="" src="{{ asset('img/icon/white/add.png') }}" width="15px" ></a>
                                                              </td>
{{--                                                              @if($item->check == 0)--}}
{{--                                                              <td><img class="" src="{{ asset('img/icon/white/cancelar (1).png') }}" width="15px" ></td>--}}
{{--                                                              @else--}}
{{--                                                              <td><img class="" src="{{ asset('img/icon/color/comprobado.png') }}" width="15px" ></td>--}}
{{--                                                              @endif--}}
                                                            </tr>
                                                          </tbody>
                                                            @include('admin.services.view-servicio')
                                                        @endforeach
                                                    </table>
                                                </div>
                                              </div>

                                            </div>

                                      </div>

                                    </div>


                                    </div>

                            </div>

                        </div>
