<!-- Modal -->
<div class="modal fade" id="alert-modal" tabindex="-1" aria-labelledby="alert-modal" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">


      <div class="modal-body">

        <div class="row">
            <div class="col-12">
                <h2 class="text-center" style="color: var(--unnamed-color-050f55);font: normal normal bold 25px/33px Segoe UI;">
                    <img class="d-inline mr-2" src="{{ asset('img/icon/black/boton-circular-plus (1).png') }}" alt="Icon Seguro" width="20px">
                    Crear Alerta
                </h2>
            </div>
        </div>

          <script !src="">
            $('#datetimepicker1').datetimepicker({
                defaultDate: new Date(),
                format: 'DD/MM/YYYY hh:mm:ss A',
                sideBySide: true
            });
          </script>

          <div class="row">
              <div class="col-12 ">
                  <div class="card car-modal-ss" >

                      <div class="card-body" >
                          <div class="form-row">

                              <div class="form-group col-8">
                                  <label for="">Titulo</label>
                                  <input class="form-control" type="text" name="titulo" id="titulo">
                              </div>

                              <div class="form-group col-4">
                                  <label for="">Duracion</label>
                                  <input class="form-control" type="number" name="tiempo" id="tiempo" >
                              </div>

                              <label for="">Description</label>
                              <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3"></textarea>

                          </div>
                      </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>

    </div>
  </div>
</div>
