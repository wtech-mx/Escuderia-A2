<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Servicios Pendientes del Mes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group row">
                <div class="col-4">
                    <label for="">
                        <p><strong>Servicio</strong></p>
                    </label>
                </div>

                <div class="col-5">
                    <label for="">
                        <p><strong>Usuario</strong></p>
                    </label>
                </div>

                <div class="col-3">
                    <label for="">
                        <p><strong>Fecha</strong></p>
                    </label>
                </div>
            </div>

            @foreach ($alertas as $item)
            <hr>
            @if ($item->id_user == NULL )
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->UserEmpresa->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @else
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->User->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @endif
            @endforeach

            @foreach ($seguros as $item)
            <hr>
            @if ($item->id_user == NULL )
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->UserEmpresa->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @else
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->User->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @endif
            @endforeach

            @foreach ($tarjeta as $item)
          <hr>
          @if ($item->id_user == NULL )
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->UserEmpresa->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @else
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->User->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @endif


            @endforeach

            @foreach ($verificacion as $item)
            <hr>
            @if ($item->id_user == NULL )
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->UserEmpresa->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @else
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->User->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @endif
            @endforeach

            @foreach ($llantas as $item)
            <hr>
            @if ($item->id_user == NULL )
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->UserEmpresa->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @else
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->User->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @endif
            @endforeach

            @foreach ($verificacion_segunda as $item)
            <hr>
            @if ($item->id_user == NULL )
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->UserEmpresa->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @else
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->User->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @endif
            @endforeach

            @foreach ($pronostico as $item)
            <hr>
            @if ($item->id_user == NULL )
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->UserEmpresa->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @else
            <div class="form-group row">
                <div class="col-4">
                    <p>{{$item->title}}</p>
                </div>

                <div class="col-5">
                    <p>{{$item->User->name}}</p>
                </div>

                <div class="col-3">
                    <p>{{$item->start}}</p>
                </div>
            </div>
          @endif
            @endforeach

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
