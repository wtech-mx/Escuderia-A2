 <div class="row bg-image" style="height: 100vh;">
          <div class="col-12 mt-5">
               <table class="table text-white ">
                   <thead>
                       <tr>
                           <th scope="col">Servicio</th>
                           <th scope="col">Auto</th>
                           <th scope="col">Fecha</th>
                           <th scope="col">Ver más</th>
                       </tr>
                   </thead>

                    @foreach ($aceite_user as $item)
                       <tbody>
                          <tr>
                              <td>Aceite</td>
                              <td>{{$item->Automovilac->placas}}</td>
                              <td>{{$item->updated_at}}</td>
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
                        {!! $aceite_user->links() !!}
                   </div>
               </div>
          </div>
      </div>
