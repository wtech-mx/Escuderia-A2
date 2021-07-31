@php
    $host= $_SERVER["REQUEST_URI"];
    $rest = substr($host, 18);
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
<div class="modal fade" id="modal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.expediente',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el Registro? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>
                            <input type="hidden" id="numero" name="numero" value="{{$numero}}">

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
