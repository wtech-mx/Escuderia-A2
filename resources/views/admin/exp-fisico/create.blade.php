@php
switch($rest){
    case($rest == 'factura/view/'.$automovil->id):
        $numero = 1;
    break;
    case($rest == 'bp/view/'.$automovil->id):
        $numero = 2;
    break;
    case($rest == 'cd/view/'.$automovil->id):
        $numero = 3;
    break;
    case($rest == 'cr/view/'.$automovil->id):
        $numero = 4;
        break;
    case($rest == 'ine/view/'.$automovil->id):
        $numero = 5;
        break;
    case($rest == 'poliza/view/'.$automovil->id):
        $numero = 6;
        break;
    case($rest == 'reemplacamiento/view/'.$automovil->id):
        $numero = 7;
        break;
    case($rest == 'rfc/view/'.$automovil->id):
        $numero = 8;
        break;
    case($rest == 'tc/view/'.$automovil->id):
        $numero = 9;
        break;
    case($rest == 'tenencia/view/'.$automovil->id):
        $numero = 10;
        break;
    case($rest == 'certificado/view/'.$automovil->id):
        $numero = 11;
        break;
}
@endphp

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body">

                        <div class="col-12">
                            <p class="text-center text-dark" style="font: normal normal bold 23px/31px Segoe UI;">
                                Agregar Imagen
                            </p>
                        </div>

                        <form method="POST" action="{{ route('store_admin.expedientes', $automovil->id) }}"
                            enctype="multipart/form-data" role="form">
                            @csrf

                            <div class="col-12">
                                <label for="">
                                    <p class="text-white"><strong>T&iacute;tulo</strong></p>
                                </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal">
                                            <img class="" src="{{ asset('img/icon/white/fuente.png') }}"
                                                width="25px">
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Titulo" id="titulo"
                                        name="titulo" style="border-radius: 0  10px 10px 0;">
                                </div>
                            </div>

                            <input type="hidden" id="numero" name="numero" value="{{$numero}}">

                            <div class="col-12 mt-3">
                                <div class=" custom-file mb-3">
                                    <input type="file" class="custom-file-input input-group-text" name="img">
                                </div>

                                <p class="text-center">

                                    <button type="submit" class="btn btn-lg btn-save-dark text-white mt-5">
                                        <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}"
                                            width="20px">
                                        Guardar
                                    </button>

                                </p>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
