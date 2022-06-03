<!-- Modal -->
@php
    $originalDate = $item->created_at;
    $newDate = date("d/m/Y", strtotime($originalDate));

    $suma = $item->taque_inicial + $item->litros
@endphp
<div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="min-height: 100vh;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><strong>Reporte Gasolina</strong></h5>
                <a type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-window-close text-white" aria-hidden="true"></i>
                </a>
            </div>

            <div class="modal-body">
            <div style="height: 1060px; overflow: scroll">
                <label for="">
                    <p><strong>Fecha Registo</strong></p>
                </label>

                <div class="input-group form-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                                <i class="far fa-calendar-alt icon-tc"></i>
                        </span>
                    </div>
                        <input type="text" class="form-control" value="{{$newDate}}" disabled>
                </div>

                 <label for="">
                     <p><strong>KM Actual</strong></p>
                 </label>

                <div class="input-group form-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-tachometer-alt icon-tc"></i>
                        </span>
                    </div>

                    <input type="number" class="form-control" value="{{$item->km_actual}}" disabled>
                </div>

                <label for="">
                    <p><strong>Importe</strong></p>
                </label>

               <div class="input-group form-group ">
                   <div class="input-group-prepend">
                       <span class="input-group-text">
                          <i class="fas fa-file-invoice-dollar icon-tc"></i>
                       </span>
                   </div>

                   <input type="number" class="form-control" value="{{$item->importe}}" disabled>
               </div>

               <label for="">
                    <p><strong>Litros</strong></p>
                </label>

                <div class="input-group form-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-oil-can icon-tc"></i>
                        </span>
                    </div>

                    <input type="number" class="form-control" value="{{$item->litros}}" disabled>
                </div>

                <label for="">
                    <p><strong>Gasolina</strong></p>
                </label>

               <div class="input-group form-group ">
                   <div class="input-group-prepend " >
                       <span class="input-group-text" >
                        <i class="fas fa-gas-pump icon-tc"></i>
                       </span>
                   </div>

                   <select class="form-control"  disabled>
                       <option value="{{$item->gasolina}}" selected>{{$item->gasolina}}</option>
                   </select>
               </div>

                 <label for="">
                     <p><strong>Tipo Pago</strong></p>
                 </label>

                <div class="input-group form-group ">
                    <div class="input-group-prepend " >
                        <span class="input-group-text" >
                            <i class="fas fa-money-bill icon-tc"></i>
                        </span>
                    </div>

                    <select class="form-control" disabled>
                        <option value="{{$item->tipo_pago}}" selected>{{$item->tipo_pago}}</option>
                    </select>
                </div>

                <label for="">
                    <p><strong>Estatus</strong></p>
                </label>

               <div class="input-group form-group">
                   <div class="input-group-prepend " >
                       <span class="input-group-text" >
                            <i class="fas fa-font icon-tc"></i>
                       </span>
                   </div>

                   <select class="form-control" id="estatus" name="estatus" disabled>
                       <option value="{{$item->estatus}}" selected>{{$item->estatus}}</option>
                   </select>
               </div>

               <p class="text-center mt-3">
                <a class="btn" style="background: #00d62e; color: #fff" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Odometro</a>
                <button class="btn" style="background: #00d62e; color: #fff" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Imagenes</button>
              </p>

              <div class="row">
                <div class="col-12">
                  <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">

                        <div class="row mt-5 ">
                            <div class="col-6">
                               <div id="demoGauge" class="gauge" style="
                                   --gauge-bg: #088478;
                                   --gauge-value:{{$item->taque_inicial}};
                                   --gauge-display-value:{{$item->taque_inicial}};
                                   width:150px;
                                   height:150px;">

                                   <div class="ticks">
                                       <div class="tithe" style="--gauge-tithe-tick:1;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:2;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:3;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:4;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:6;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:7;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:8;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:9;"></div>
                                       <div class="min"></div>
                                       <div class="mid"></div>
                                       <div class="max"></div>
                                   </div>
                                   <div class="tick-circle"></div>

                                   <div class="needle">
                                       <div class="needle-head"></div>
                                   </div>
                               </div>
                               <p>
                                   <label for="points">Tanque Inicial</label><br />
                                   <input type="range" step="10" id="gaugeValue-demoGauge" name="gaugeValue" min="0" max="100" value="{{$item->taque_inicial}}"
                                       onInput="updateGauge('demoGauge', 0, 100);" onChange="updateGauge('demoGauge', 0, 100);" disabled/>
                               </p>
                           </div>

                           <div class="col-6">
                               <div id="demoGauge2" class="gauge" style="
                                   --gauge-bg: #088478;
                                   --gauge-value:{{$suma}};
                                   --gauge-display-value:{{$suma}};
                                   width:150px;
                                   height:150px;">

                                   <div class="ticks">
                                       <div class="tithe" style="--gauge-tithe-tick:1;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:2;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:3;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:4;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:6;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:7;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:8;"></div>
                                       <div class="tithe" style="--gauge-tithe-tick:9;"></div>
                                       <div class="min"></div>
                                       <div class="mid"></div>
                                       <div class="max"></div>
                                   </div>
                                   <div class="tick-circle"></div>

                                   <div class="needle">
                                       <div class="needle-head"></div>
                                   </div>
                               </div>
                               <p>
                                   <label for="points">Tanque despues de carga</label><br />
                                   <input type="range" step="10" id="gaugeValue-demoGauge2" name="gaugeValue2" min="0" max="100" value="{{$suma}}"
                                   onInput="updateGauge('demoGauge2', 0, 100);" onChange="updateGauge('demoGauge2', 0, 100);" disabled/>
                               </p>
                           </div>
                       </div>

                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">

                        <div class="row mt-5 ">
                            <div class="col-6">
                                <p class="text-center">
                                    <a class="venobox" data-gall="myGallery" href="{{asset('/gasolina/odometro/' . $item->odometro)}}">
                                        <img class="img-thumbnail" src="{{asset('/gasolina/odometro/' . $item->odometro)}}" alt="image alt" style="max-width: 100px!important;"/>
                                    </a>

                            </p>
                            </div>
                            <div class="col-6">
                                <p class="text-center">
                                    <a class="venobox" data-gall="myGallery" href="{{asset('/gasolina/ticket/' . $item->ticket)}}">
                                        <img class="img-thumbnail" src="{{asset('/gasolina/ticket/' . $item->ticket)}}" style="max-width: 100px!important;">
                                    </a>
                            </p>
                            </div>
                        </div>

                    </div>
                  </div>
                </div>
              </div>


            </div>
            </div>

        </div>
    </div>
</div>
