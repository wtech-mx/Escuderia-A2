<!-- Modal -->
<div class="modal fade" id="cambio-car" tabindex="-1" role="dialog" aria-labelledby="cambio-carTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-down-image-border" style="min-height: 10vh;border: solid 3px #00ff37;">

      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Auto Actual:
            @foreach($automovil as $item)
            <strong>{{ $item->submarca }} / {{ $item->placas }}</strong>
            @break
            @endforeach
        </h5>

        <button  class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body ">
                <form action="{{route('current_auto', auth()->user()->id)}}" method="POST" role="form">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="row">

                        <div class="col-12">
                           @foreach($automovil as $item)
                            <ul class="text-white">
                                <li>
                                    <strong>Modelo:</strong>
                                    {{$item->submarca}}
                                </li>
                                <li>
                                    <strong>Año:</strong>
                                    {{$item->año}}
                                </li>
                                <li>
                                    <strong>Placas:</strong>
                                    {{$item->placas}}
                                </li>
                            </ul>
                               @break
                             @endforeach

                            <label for="" class="mt-2 mb-2">
                                <p class="text-white"><strong>Cambia de auto para ver los datos</strong></p>
                            </label>

                            <div class="input-group form-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img class="" src="{{ asset('img/icon/white/coche (7).png') }}" width="25px">
                                    </span>
                                </div>

                                <select class="form-control input-edit-car" id="current_auto" name="current_auto" >
                                    <option value="">Cambiar de Auto</option>
                                    @foreach($automovil as $item)
                                        <option value="{{$item->id}}"><strong>Modelo:</strong>{{$item->submarca}}  / <strong>Placas:</strong>{{$item->placas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12 text-center mt-5 mb-5" >
                            <button class="btn btn-lg btn-save-neon text-white">
                                <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </form>

      </div>

    </div>
  </div>
</div>
