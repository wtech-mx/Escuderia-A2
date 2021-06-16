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
            <p class="text-center">Asignacion de Usuarios</p>
            <form method="POST" action="{{ route('store_asignacion.cupon') }}" enctype="multipart/form-data" role="form">
                @csrf
                    <input type="hidden" class="form-control" name="titulo" id="titulo" value="{{$item->titulo}}">
                    <input type="hidden" class="form-control" name="id_cupon" id="id_cupon" value="{{$item->id}}">

                    <label for="">
                        <p class="text-white"><strong>Usuarios</strong></p>
                    </label>

                <div class="input-group form-group mb-5">
                    <div class="input-group-prepend " >
                        <span class="input-group-text" >
                            <i class="fas fa-user-shield icon-tc"></i>
                        </span>
                    </div>

                    <select class="form-control" id="id_user" name="id_user">
                        @foreach ($user as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
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
