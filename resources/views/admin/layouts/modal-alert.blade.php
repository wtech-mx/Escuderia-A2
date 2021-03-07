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

          <div class="row">
            <form method="POST" action="{{route('store.alert')}}" enctype="multipart/form-data" role="form">
                                 @csrf
                <div class="col-12 ">
                  <div class="card car-modal-ss" >

                      <div class="card-body" >
                          <div class="form-row">

                              <div class="form-group col-12">
                                  <label for="">Titulo</label>
                                  <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Titulo de la alerta">
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

                              <div class="form-group col-12">
                                  <label for="">fecha inicio</label>
                                  <input class="form-control" type="datetime-local" name="start" id="start" placeholder="DD/MM/YYYY" >
                              </div>
                                  <input class="form-control" type="hidden" name="end" id="end" placeholder="DD/MM/YYYY">

                                  <input class="form-control" type="hidden" name="color" id="color" value="16A085">


                              <label for="">Description</label>
                              <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3"></textarea>

                              <button type="submit" class="btn btn-lg btn-success btn-save mt-4">
                                  <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                  Guardar
                              </button>

                          </div>
                      </div>

                  </div>
                </div>
            </form>
          </div>
      </div>
    </div>

  </div>
</div>
