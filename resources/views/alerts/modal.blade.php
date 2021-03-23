<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos de la Alerta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">

                  <div class="form-row">

                      <input class="form-control" type="hidden" name="txtID" id="txtID">

                      <div class="form-group col-12">
                        <input class="form-control" type="date" name="txtFecha" id="txtFecha">
                      </div>

                      <div class="form-group col-12">
                          <input type="hidden" class="form-control" name="color" id="color">
                      </div>

                      <div class="form-group col-12" >
                          <input class="form-control" type="hidden" name="estatus" id="estatus" >
                      </div>

                      <div class="form-group col-12">
                          <label for="">Titulo</label>
                          <input class="form-control" type="text" name="title" id="title" disabled>
                      </div>

{{--                      <div class="form-group col-12">
                          <label for="">Hora</label>
                          <input class="form-control" type="time" name="txtHora" id="txtHora" min="07:00" max="19:00" step="600">
                      </div>--}}


                      <div class="form-group col-12">
                            @foreach($user as $item)
                                <input class="form-control" type="hidden" name="id_user" id="id_user" value="{{$item->id_user}}" disabled>
                                 @break
                            @endforeach
                      </div>


                      <label for="">Descripcion</label>
                      <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3" disabled></textarea>
                      <br>

                  </div>

              </div>

              <div class="modal-footer">
                  <button class="btn btn-warning" id="btnModificar">Modificar</button>

              </div>
            </div>
          </div>
        </div>
