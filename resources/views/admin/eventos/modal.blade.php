<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos del Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">

                  <div class="form-row">

                      <input class="form-control" type="hidden" name="txtID" id="txtID">

                      <div class="form-group col-12">
                        <label for="">Fecha</label>
                        <input class="form-control" type="text" name="txtFecha" id="txtFecha">
                      </div>

                      <div class="form-group col-12">
                          <input type="hidden" class="form-control" name="color" id="color">
                      </div>

                      <div class="form-group col-12" >
                          <input class="form-control" type="hidden" name="status" id="status" >
                      </div>

                      <div class="form-group col-12">
                          <label for="">Titulo</label>
                          <input class="form-control" type="text" name="title" id="title">
                      </div>

                      <div class="form-group col-12">
                          <label for="">Hora</label>
                          <input class="form-control" type="time" name="txtHora" id="txtHora" min="07:00" max="19:00" step="600">
                      </div>

                      <div class="form-group col-12">
                         <label for="">Selecionar Usuario</label>
                              <select class="form-control" id="id_user" name="id_user">
                                   <option value="">Seleccione usuario</option>
                                       @foreach($user as $item)
                                          <option value="{{$item->id}}">{{$item->name}}</option>
                                       @endforeach
                              </select>
                      </div>


                      <label for="">Description</label>
                      <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3"></textarea>
                      <br>

                  </div>

              </div>

              <div class="modal-footer">
                  <button class="btn btn-success" id="btnAgregar">Agregar</button>
                  <button class="btn btn-warning" id="btnModificar">Modificar</button>
                  <button class="btn btn-danger" id="btnBorrar">Borrar</button>

              </div>
            </div>
          </div>
        </div>
