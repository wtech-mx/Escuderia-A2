@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/gauge.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.3/venobox.min.css" />
@php
    $originalDate = $gasolina->created_at;
    $newDate = date("d/m/Y", strtotime($originalDate));

    $suma = $gasolina->taque_inicial + $gasolina->litros
@endphp
        <div class="row bg-down-image-border " >
                    <div class="col-2 mt-5">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                    <a href="{{ route('index_admin.gasolina') }}" style="background-color: transparent;clip-path: none">
                                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-8 mt-5">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Control Gasolina</strong>
                                </h5>
                    </div>

                    <div class="col-2 mt-5">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <p class="text-center mb-5 mt-5" style="color: #00d62e; font: normal normal bold 20px/27px Segoe UI;"><strong>{{$gasolina->User->name}} / {{$gasolina->Automovil->placas}}</strong></p>

                        @if($gasolina->km_recorridos != NULL)
                            @php
                                $costo= $gasolina->importe / $gasolina->litros;
                                $rendimiento = $gasolina->km_recorridos / $gasolina->consumo;
                            @endphp
                            <div class="card card-body text-white">
                              <p>KM Recorridos: {{$gasolina->km_recorridos}}</p>
                              <p>Costo por litro: {{ round($costo, 2);}}</p>
                              <p>Consumo litros: {{$gasolina->consumo}}</p>
                              <p>Rendiemiento: {{ round($rendimiento, 2);}}</p>
                            </div>
                        @endif

                    <form class="card-details" method="POST" action="{{route('update_admin.gasolina',$gasolina->id)}}" enctype="multipart/form-data" role="form">
                        @csrf

                        <input type="hidden" name="_method" value="PATCH">

                            @if(Session::has('success'))
                                        <script>
                                            Swal.fire({
                                              title: 'Exito!!',
                                              html:
                                                'Se ha actualizado tu  <b>Tarjeta de Circulaci&oacute;n</b>, ' +
                                                'Exitosamente',
                                              // text: 'Se ha agragado la "MARCA" Exitosamente',
                                              imageUrl: '{{ asset('img/icon/color/dosier.png') }}',
                                              background: '#fff',
                                              imageWidth: 150,
                                              imageHeight: 150,
                                              imageAlt: 'USUARIO IMG',
                                            })
                                        </script>
                            @endif



                            <label for="">
                                <p class="text-white"><strong>Fecha Registo</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                            <i class="far fa-calendar-alt icon-tc"></i>
                                    </span>
                                </div>
                                    <input type="text" class="form-control" value="{{$newDate}}" disabled>
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>KM Actual</strong></p>
                             </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-signature icon-tc"></i>
                                    </span>
                                </div>

                                <input type="number" class="form-control" value="{{$gasolina->km_actual}}" disabled>
                            </div>

                            <label for="">
                                <p class="text-white"><strong>Importe</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend">
                                   <span class="input-group-text">
                                       <i class="fas fa-signature icon-tc"></i>
                                   </span>
                               </div>

                               <input type="number" class="form-control" value="{{$gasolina->importe}}" disabled>
                           </div>

                           <label for="">
                            <p class="text-white"><strong>Tanque Inicial</strong></p>
                        </label>

                       <div class="input-group form-group mb-5">
                           <div class="input-group-prepend">
                               <span class="input-group-text">
                                   <i class="fas fa-signature icon-tc"></i>
                               </span>
                           </div>

                           <input type="number" class="form-control" value="{{$gasolina->taque_inicial}}" disabled>
                       </div>

                           <label for="">
                                <p class="text-white"><strong>Litros</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-signature icon-tc"></i>
                                    </span>
                                </div>

                                <input type="number" class="form-control" value="{{$gasolina->litros}}" disabled>
                            </div>

                            <label for="">
                                <p class="text-white"><strong>Tanque Final</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend">
                                   <span class="input-group-text">
                                       <i class="fas fa-signature icon-tc"></i>
                                   </span>
                               </div>

                               <input type="number" class="form-control" value="{{$suma}}" disabled>
                           </div>

                            <label for="">
                                <p class="text-white"><strong>Gasolina</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend " >
                                   <span class="input-group-text" >
                                        <i class="fas fa-font icon-tc"></i>
                                   </span>
                               </div>

                               <select class="form-control"  disabled>
                                   <option value="{{$gasolina->gasolina}}" selected>{{$gasolina->gasolina}}</option>
                                   <option value="Magna">Magna</option>
                                   <option value="Premium">Premium</option>
                                   <option value="Disel">Disel</option>
                               </select>
                           </div>

                             <label for="">
                                 <p class="text-white"><strong>Tipo Pago</strong></p>
                             </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text" >
                                         <i class="fas fa-font icon-tc"></i>
                                    </span>
                                </div>

                                <select class="form-control" disabled>
                                    <option value="{{$gasolina->tipo_pago}}" selected>{{$gasolina->tipo_pago}}</option>
                                    <option value="Tarjeta Credito">Tarjeta Credito</option>
                                    <option value="Tarjeta Debito">Tarjeta Debito</option>
                                    <option value="Tarjeta empresa">Tarjeta empresa</option>
                                    <option value="Efectivo">Efectivo</option>
                                </select>
                            </div>

                            <label for="">
                                <p class="text-white"><strong>Estatus</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend " >
                                   <span class="input-group-text" >
                                        <i class="fas fa-font icon-tc"></i>
                                   </span>
                               </div>

                               <select class="form-control" id="estatus" name="estatus" required>
                                   <option value="{{$gasolina->estatus}}" selected>{{$gasolina->estatus}}</option>
                                   <option value="Pagado">Pagado</option>
                                   <option value="Rembolso">Rembolso</option>
                                   <option value="No procede">No procede</option>
                               </select>
                           </div>

                           <p class="text-center">
                            <a class="btn" style="background: #00d62e; color: #fff" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Odometro</a>
                            <button class="btn" style="background: #00d62e; color: #fff" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Imagenes</button>
                          </p>

                          <div class="row">
                            <div class="col-12">
                              <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body">

                                    <div class="row mt-5 mb-5">
                                        <div class="col-6">
                                           <div id="demoGauge" class="gauge" style="
                                               --gauge-bg: #088478;
                                               --gauge-value:{{$gasolina->taque_inicial}};
                                               --gauge-display-value:{{$gasolina->taque_inicial}};
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
                                               <label class="text-white" for="points">Tanque Inicial</label><br />
                                               <input type="range" step="10" id="gaugeValue-demoGauge" name="gaugeValue" min="0" max="100" value="{{$gasolina->taque_inicial}}"
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
                                               <label class="text-white" for="points">Tanque despues de carga</label><br />
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

                                    <div class="row mt-5 mb-5">
                                        <div class="col-6">
                                            <p class="text-center">
                                                <a class="venobox" data-gall="myGallery" href="{{asset('/gasolina/odometro/' . $gasolina->odometro)}}">
                                                    <img class="img-thumbnail" src="{{asset('/gasolina/odometro/' . $gasolina->odometro)}}" alt="image alt" style="max-width: 100px!important;"/>
                                                </a>

                                        </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="text-center">
                                                <a class="venobox" data-gall="myGallery" href="{{asset('/gasolina/ticket/' . $gasolina->ticket)}}">
                                                    <img class="img-thumbnail" src="{{asset('/gasolina/ticket/' . $gasolina->ticket)}}" style="max-width: 100px!important;">
                                                </a>
                                        </p>
                                        </div>
                                    </div>

                                </div>
                              </div>
                            </div>
                          </div>



                            <div class="col-12 text-center mt-2" style="margin-bottom: 8rem !important;">
                                <button class="btn btn-lg btn-save-neon text-white">
                                    <i class="fas fa-save icon-tc"></i>
                                    Actualizar
                                </button>
                            </div>


                        </form>
                    </div>
                </div>


                <script type="text/javascript">
                    //<![CDATA[
                    function updateGauge(id, min, max) {
                        const newGaugeDisplayValue = document.getElementById("gaugeValue-" + id).value;
                        const newGaugeValue = Math.floor(((newGaugeDisplayValue - min) / (max - min)) * 100);
                        document.getElementById(id).style.setProperty('--gauge-display-value', newGaugeDisplayValue);
                        document.getElementById(id).style.setProperty('--gauge-value', newGaugeValue);
                    }
                //]]>

                $(document).ready(function(){
                $('.venobox').venobox();
                });
                </script>
@endsection
