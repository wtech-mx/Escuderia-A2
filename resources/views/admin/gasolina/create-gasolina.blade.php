@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/gauge.min.css') }}" rel="stylesheet">

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

                    <form class="card-details" method="POST" action="{{route('store.gasolina')}}" enctype="multipart/form-data" role="form">
                        @csrf

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

                            @if (auth()->user()->chofer == 1)
                             <input type="hidden" id="id_user" name="id_user" value="{{auth()->user()->id}}">
                            @endif

                            <label for="" class="mt-5">
                                <p class="text-white"><strong>Automovil</strong></p>
                            </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                    </span>
                                </div>

                                    <select class="form-control" id="current_auto" name="current_auto" value="{{ old('current_auto') }}">
                                            <option value="">Seleccione automovil</option>
                                            @foreach($automovil as $item)
                                            <option value="{{$item->id}}">{{ ucfirst($item->placas)}}</option>
                                            @endforeach
                                    </select>
                            </div>

                             <label for="" class="mt-5">
                                 <p class="text-white"><strong>KM Actual</strong></p>
                             </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-signature icon-tc"></i>
                                    </span>
                                </div>

                                <input type="number" class="form-control" name="km_actual" id="km_actual" placeholder="Km actual">
                            </div>

                            {{-- <label for="">
                                <p class="text-white"><strong>Tanque Inicial</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend">
                                   <span class="input-group-text">
                                       <i class="fas fa-signature icon-tc"></i>
                                   </span>
                               </div>

                               <input type="number" class="form-control" name="taque_inicial" id="taque_inicial" placeholder="tanque inicial">
                           </div> --}}

                            <label for="">
                                <p class="text-white"><strong>Importe</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend">
                                   <span class="input-group-text">
                                       <i class="fas fa-signature icon-tc"></i>
                                   </span>
                               </div>

                               <input type="number" class="form-control" name="importe" id="importe" placeholder="Importe">
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

                                <input type="number" class="form-control" name="litros" id="litros" placeholder="Litros">
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

                               <select class="form-control" id="tipo_pago" name="tipo_pago" required>
                                   <option value="Tarjeta Credito">Magna</option>
                                   <option value="Tarjeta Debito">Premium</option>
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

                                <select class="form-control" id="tipo_pago" name="tipo_pago" required>
                                    <option value="Tarjeta Credito">Tarjeta Credito</option>
                                    <option value="Tarjeta Debito">Tarjeta Debito</option>
                                    <option value="Tarjeta empresa">Tarjeta empresa</option>
                                    <option value="Efectivo">Efectivo</option>
                                </select>
                            </div>

                            <label for="" class="mt-3">
                                <p class="text-white mt-3"><strong>Foto odometro</strong></p>
                            </label>

                            <div class=" custom-file mb-3">
                                <input type="file" class="custom-file-input input-group-text" name="odometro" id="odometro">
                            </div>

                            <label for="" class="mt-3">
                                <p class="text-white mt-3"><strong>Foto ticket</strong></p>
                            </label>

                            <div class=" custom-file mb-3">
                                <input type="file" class="custom-file-input input-group-text" name="ticket" id="ticket">
                            </div>

                        <div style="background: #fff">
                            <div>
                                <div id="demoGauge" class="gauge" style="
                                    --gauge-value:0;
                                    width:200px;
                                    height:200px;">

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
                                    <div class="labels">
                                        <div class="value-label"></div>
                                    </div>
                                </div>
                                <p>
                                    <label for="points">Tanque Inicial</label><br />
                                    <input type="range" id="gaugeValue-demoGauge" name="gaugeValue" min="0" max="100" value="0"
                                        onInput="updateGauge('demoGauge', 0, 100);" onChange="updateGauge('demoGauge', 0, 100);" />
                                </p>
                            </div>
                        </div>

                            <div class="col-12 text-center mt-2" style="margin-bottom: 8rem !important;">
                                <button class="btn btn-lg btn-save-neon text-white">
                                    <i class="fas fa-save icon-tc"></i>
                                    Actualizar
                                </button>
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
                            </script>
                        </form>
                    </div>
                </div>

@endsection

