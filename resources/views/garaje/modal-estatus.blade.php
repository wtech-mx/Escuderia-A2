<!-- Modal -->
                    @foreach($automovil as $item)
                         <div class="modal fade" id="modal-estatus-{{$item->id}}" tabindex="-1" aria-labelledby="modal-estatusLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-body">

                                  <div class="col-12">
                                    <p class="text-center text-dark" style="font: normal normal bold 23px/31px Segoe UI;">
                                        Activar Carro
                                    </p>
                                      <p class="text-center">
                                        Seleccione el carro que desea utilizar
                                      </p>
                                  </div>

                                 <form action="{{route('current_auto', auth()->user()->id)}}" method="POST">
                                    @csrf
                                   <input name="_method" type="hidden" value="PATCH">

                                                <div class="col-12 text-center">
                                                    <div class="input-group form-group d-inline">
                                                        <div class="d-flex justify-content-between">

                                                             <select class="form-control input-edit-car" id="current_auto" name="current_auto">

                                                                <option>Selecciona tu carro</option>
                                                                @foreach($automovil as $item)
                                                                     @if ($item->id == auth()->user()->current_auto)
                                                                         <option selected value="{{$item->id}}">{{$item->submarca}}</option>
                                                                     @else
                                                                        <option value="{{$item->id}}">{{$item->submarca}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mt-3">
                                                     <button type="submit" class="btn btn-lg btn-success btn-save ">
                                                           <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                                                Guardar
                                                     </button>
                                                </div>

                                 </form>

                              </div>
                            </div>
                          </div>
                        </div>

                   @endforeach
