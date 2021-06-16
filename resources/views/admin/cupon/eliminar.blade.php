<div class="modal fade" id="modaleliminar{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.cupon',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Cupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el cupon <strong>{{$item->titulo}}</strong>? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>
                           <p class="text-center"><img src="{{ asset('img/icon/color/warning.png') }}" style="width: 30%"></p>

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
