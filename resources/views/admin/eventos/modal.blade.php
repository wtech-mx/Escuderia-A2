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
                      <div class="form-group col-8">
                        <label for="">Fecha</label>
                        <input class="form-control" type="text" name="txtFecha" id="txtFecha">
                      </div>

                      <div class="form-group col-4">
                          <label for="">Color</label>
                          <input class="form-control" type="color" name="txtColor" id="txtColor" value="16A085">
                      </div>

                      <div class="form-group col-8">
                          <label for="">Titulo</label>
                          <input class="form-control" type="text" name="txtTitulo" id="txtTitulo">
                      </div>

                      <div class="form-group col-4">
                          <label for="">Hora</label>
                          <input class="form-control" type="time" name="txtHora" id="txtHora" min="07:00" max="19:00" step="600">
                      </div>

                      <div class="form-group col-12">
                         <label for="">Selecionar Usuario</label>
                              <select class="form-control" id="txtID_User" name="txtID_User">
                                   <option value="">Seleccione usuario</option>
                                       @foreach($user as $item)
                                          <option value="{{$item->id}}">{{$item->name}}</option>
                                       @endforeach
                              </select>
                      </div>


                      <label for="">Description</label>
                      <textarea class="form-control" name="txtDescription" id="txtDescription" cols="30" rows="3"></textarea>
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
