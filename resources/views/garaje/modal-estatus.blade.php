<!-- Modal -->
                    @foreach($automovil as $item)
                        <div class="modal fade" id="modal-estatus-{{$item->id}}" tabindex="-1" aria-labelledby="modal-estatusLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">

                              <div class="modal-body">

                                  <div class="col-12">
                                    <p class="text-center text-dark" style="font: normal normal bold 23px/31px Segoe UI;">
                                        ¿Deseas cambiar el estatus del auto?
                                    </p>
                                      <p class="text-center">
                                        Se cambiar los datos de visualizacon por este auto
                                      </p>
                                  </div>

                                <div class="col-12 text-center">

                                    <div class="input-group form-group d-inline">

                                        <div class="d-flex justify-content-between">

                                            <div class="form-check form-check-inline d-block">
                                                @if($item->estatus == 0)
                                                    <div class="d-flex justify-content-center">
                                                        <input class="form-check-input d-block" type="radio" name="estatus" id="estatus" value="0" checked>
                                                    </div>
                                                @else
                                                    <div class="d-flex justify-content-center">
                                                        <input class="form-check-input d-block" type="radio" name="estatus" id="estatus" value="0">
                                                    </div>
                                                @endif
                                                <label class="form-check-label text-dark" for="inlineRadio1">
                                                    Desactivado
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline d-block">
                                                @if($item->estatus == 1)
                                                    <div class="d-flex justify-content-center">
                                                        <input class="form-check-input  d-block" type="radio" name="estatus" id="estatus" value="1" checked>
                                                    </div>
                                                @else
                                                    <div class="d-flex justify-content-center">
                                                        <input class="form-check-input  d-block" type="radio" name="estatus" id="estatus" value="1">
                                                    </div>
                                                @endif
                                              <label class="form-check-label text-dark" for="inlineRadio2">
                                                  Activado
                                              </label>
                                            </div>

                                        </div>

                                    </div>

                                  </div>

                                <div class="col-12 mt-3">
                                    <a class="btn btn-save text-white">
                                        <img class="d-inline" src="{{ asset('img/icon/white/save-file-option (1).png') }}" alt="Icon documento" width="30px">
                                        Guardar
                                    </a>
                                </div>

                              </div>


                            </div>
                          </div>
                        </div>
                     @endforeach
