 <div class="row bg-image" style="height: 100vh;">
          <div class="col-12 mt-5 p-3">
               <table class="table text-white ">
                   <thead>
                       <tr>
                           <th scope="col">Fecha</th>
                           <th scope="col">Servicio</th>
                           <th scope="col">Auto</th>
                           <th scope="col">Ver</th>
                       </tr>
                   </thead>

                   @foreach ($amort_user as $item)
                      @php
                         $fechaEntera = strtotime($item->fecha_servicio);
                               $anio = date("Y", $fechaEntera);
                               $mes = date("m", $fechaEntera);
                               $dia = date("d", $fechaEntera);
                      @endphp
                       <tbody>
                          <tr>
                              <td>{{$dia}}/{{$mes}}/{{$anio}}</td>
                              <td>Amortiguadores</td>
                              <td>{{$item->Automovilam->placas}}</td>
                              <td>
                                  <a data-toggle="modal" data-target="#example{{$item->id}}"><img class="" src="{{ asset('img/icon/white/add.png') }}" width="15px" ></a>
                              </td>
                          </tr>
                       </tbody>
                       @include('services.modal')
                    @endforeach

               </table>
               <div class="col-12 mt-4 ">
                   <div class="d-flex justify-content-center">
                        {!! $amort_user->links() !!}
                   </div>
               </div>
          </div>
      </div>
