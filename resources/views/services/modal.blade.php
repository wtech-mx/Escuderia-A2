   @php
        $fechaEntera = strtotime($item->updated_at);
                $anio = date("Y", $fechaEntera);
                $mes = date("m", $fechaEntera);
                $dia = date("d", $fechaEntera);
  @endphp
<!-- Modal -->
<div class="modal fade" id="example{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align:center">Detalles Del Servicio </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <label for="">
              <p><strong>Fecha del Servicio</strong></p>
          </label>
          <div class="input-group form-group">
              <div class="input-group-prepend " >
                  <span class="input-group-text" >
                       <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}" width="25px" >
                  </span>
              </div>
              <input type="number" class="form-control" placeholder="{{$item->fecha_servicio}}" style="border-radius: 0  10px 10px 0;" disabled>
          </div>

        @if($item->servicio == 1)
          <label for="">
             <p><strong>Llantas</strong></p>
          </label>

          <div class="col-12 text-center">
              <div class="input-group form-group d-inline">
                  <div class="d-flex justify-content-between">

                      <div class="form-check form-check-inline d-block">
                          @if($item->llantas_delanteras == 1)
                            <div class="d-flex justify-content-center">
                                 <input class="form-check-input d-block" type="radio" checked disabled>
                            </div>
                               @else
                            <div class="d-flex justify-content-center">
                                <input class="form-check-input d-block" type="radio" disabled>
                            </div>
                          @endif
                          <label class="form-check-label" for="inlineRadio1">
                                Llanta 1
                          </label>
                      </div>

                      <div class="form-check form-check-inline d-block">
                          @if($item->llantas_traseras == 1)
                             <div class="d-flex justify-content-center">
                                  <input class="form-check-input  d-block" type="radio" checked disabled>
                             </div>
                                 @else
                             <div class="d-flex justify-content-center">
                                  <input class="form-check-input  d-block" type="radio" disabled>
                             </div>
                          @endif
                          <label class="form-check-label" for="inlineRadio2">
                               Llanta 2
                          </label>
                      </div>

                  </div>
              </div>
          </div>
        @endif
        @if($item->servicio == 3)
          <label for="">
             <p><strong>Llantas</strong></p>
          </label>

          <div class="col-12 text-center">
              <div class="input-group form-group d-inline">
                  <div class="d-flex justify-content-between">

                      <div class="form-check form-check-inline d-block">
                          @if($item->frenos_delanteras == 1)
                            <div class="d-flex justify-content-center">
                                 <input class="form-check-input d-block" type="radio" checked disabled>
                            </div>
                               @else
                            <div class="d-flex justify-content-center">
                                <input class="form-check-input d-block" type="radio" disabled>
                            </div>
                          @endif
                          <label class="form-check-label" for="inlineRadio1">
                                Frenos Delanteros
                          </label>
                      </div>

                      <div class="form-check form-check-inline d-block">
                          @if($item->frenos_traseras == 1)
                             <div class="d-flex justify-content-center">
                                  <input class="form-check-input  d-block" type="radio" checked disabled>
                             </div>
                                 @else
                             <div class="d-flex justify-content-center">
                                  <input class="form-check-input  d-block" type="radio" disabled>
                             </div>
                          @endif
                          <label class="form-check-label" for="inlineRadio2">
                               Frenos Traseros
                          </label>
                      </div>

                  </div>
              </div>
          </div>
        @endif
        @if($item->servicio == 6)
          <label for="">
             <p><strong>Amortiguadores</strong></p>
          </label>

          <div class="col-12 text-center">
              <div class="input-group form-group d-inline">
                  <div class="d-flex justify-content-between">

                      <div class="form-check form-check-inline d-block">
                          @if($item->amortig_delanteras == 1)
                            <div class="d-flex justify-content-center">
                                 <input class="form-check-input d-block" type="radio" checked disabled>
                            </div>
                               @else
                            <div class="d-flex justify-content-center">
                                <input class="form-check-input d-block" type="radio" disabled>
                            </div>
                          @endif
                          <label class="form-check-label" for="inlineRadio1">
                                Amortiguadores Delanteros
                          </label>
                      </div>

                      <div class="form-check form-check-inline d-block">
                          @if($item->amortig_traseras == 1)
                             <div class="d-flex justify-content-center">
                                  <input class="form-check-input  d-block" type="radio" checked disabled>
                             </div>
                                 @else
                             <div class="d-flex justify-content-center">
                                  <input class="form-check-input  d-block" type="radio" disabled>
                             </div>
                          @endif
                          <label class="form-check-label" for="inlineRadio2">
                               Amortiguadores Traseros
                          </label>
                      </div>

                  </div>
              </div>
          </div>
        @endif


          <label for="">
              <p><strong>Kilometraje</strong></p>
          </label>
          <div class="input-group form-group">
              <div class="input-group-prepend " >
                  <span class="input-group-text" >
                       <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}" width="25px" >
                  </span>
              </div>
              <input type="number" class="form-control" placeholder="{{$item->km_actual}}" style="border-radius: 0  10px 10px 0;" disabled>
          </div>

          <label for="">
              <p><strong>Descripción</strong></p>
          </label>
          <div class="input-group form-group">
              <div class="input-group-prepend " >
                  <span class="input-group-text" >
                       <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}" width="25px" >
                  </span>
              </div>
              <input type="number" class="form-control" placeholder="{{$item->descripcion}}" style="border-radius: 0  10px 10px 0;" disabled>
          </div>

          <label for="">
              <p><strong>Fecha Próximo Servicio</strong></p>
          </label>
          <div class="input-group form-group">
              <div class="input-group-prepend " >
                  <span class="input-group-text" >
                       <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}" width="25px" >
                  </span>
              </div>
              <input type="number" class="form-control" placeholder="{{$dia}}/{{$mes}}/{{$anio}}" style="border-radius: 0  10px 10px 0;" disabled>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
