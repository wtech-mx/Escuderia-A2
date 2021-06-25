<!-- Modal -->
<div class="modal fade" id="user{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cupon <strong>{{$item->titulo}}</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <ul class="nav nav-pills ml-3 mb-3" id="pills-tab" role="tablist">

                <li class="nav-item mr-2">
                    <a class="nav-link active a-auto" id="pills-auto-tab" data-toggle="pill" href="#auto" role="tab"
                        aria-controls="auto" aria-selected="true">
                      Asignado a
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link a-auto" id="pills-Vinculacion-tab" data-toggle="pill" href="#pills-Vinculacion"
                        role="tab" aria-controls="pills-Vinculacion" aria-selected="false">
                       Asignar Cupon
                    </a>
                </li>

            </ul>

            <div class="tab-pane fade show active" id="auto" role="tabpanel" aria-labelledby="pills-auto-tab">



            </div>

            <div class="tab-pane fade" id="pills-Vinculacion" role="tabpanel"  aria-labelledby="pills-Vinculacion-tab">
                <form method="POST" action="{{ route('update_asignacion.cupon') }}" enctype="multipart/form-data" role="form">
                    @csrf


                    <input type="hidden" class="form-control" name="titulo" id="titulo" value="{{$item->titulo}}">
                    <input type="hidden" class="form-control" name="id_cupon" id="id_cupon" value="{{$item->id}}">


                    <label for="">
                        <p class="text-dark"><strong>Usuarios</strong></p>
                    </label>

                    <div class="form-group mb-5">
                        <select class="form-control js-example-basic-single " id="id_user" name="id_user">
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success btn-save-neon text-white">
                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>



        </div>

      </div>
    </div>
  </div>
