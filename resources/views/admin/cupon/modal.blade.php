<!-- Modal -->
<div class="modal fade" id="example{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cupon : <strong>{{$item->titulo}}</strong> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">

            <div class="body-cupon">

                <div class="contenedor-cupon">

                    <div class="row">

                                <div class="d-flex justify-content-center align-items-center container">
                                    <div class="d-flex card text-center" style="background: {{$item->color}}">

                                        <div class="content-cupon p-3 bg-white" style="border-radius: 20px">
                                            <img class="" src="{{ asset('qr/'.$item->qr) }}" alt="{{ asset('img/qr/'.$item->qr) }}" width="85">
                                        </div>

                                        <h1 class="mt-3">
                                            <strong>  {{$item->precio}} </strong>
                                        </h1>

                                        <h2 class="mt-3">
                                          <strong>  {{$item->titulo}} </strong>
                                        </h2>

                                        <div class="mt-4">
                                            <h3>5 Dias Restantes</h3>
                                        </div>

                                        <div class="mt-4">
                                            <small> Terminos y/o condiciones : <br> <strong> {{$item->aplicacion}} </strong></small>
                                        </div>

                                        <div class="mt-4">
                                          @if($item->estado == 1)
                                          <button type="button" class="btn btn-outline-success text-white">
                                              ACTIVADO
                                          </button>
                                            @else
                                          <button type="button" class="btn btn-outline-danger text-white">
                                              DESACTIVADO
                                          </button>
                                          @endif
                                        </div>

                                    </div>
                                </div>

                    </div>

                </div>

            </div>
        </div>


        <div class="modal-footer">
          <button  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
