@extends('layouts.app')

@section('content')

                <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

                 @include('garaje.modal-estatus')

                <div class="row bg-image" >

                        @if(Session::has('success'))
                            <script>
                                Swal.fire(
                                    'Exito!',
                                    'Se ha guardado auto  exitosamiente.',
                                    'success'
                                )
                            </script>
                        @endif

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white">
                                        <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong>Garaje</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                </div>

                <div class="row bg-image">

                        <div class="col-12 mt-4">
                            <div class="d-flex justify-content-between">

                                <div class="arrows">

                                    <style>
                                        .page-item.active .page-link {
                                            z-index: 3;
                                            color: #fff;
                                            background-color: #00d62e;
                                            border-color: #00d62e;
                                        }
                                    </style>

                                {!! $automovil->links() !!}
                                </div>

                                <div class="btn-add">
                                    <a class="btn btn-garaje text-white" href="{{ route('create.automovil') }}">
                                       Agregar
                                         <img class="" src="{{ asset('img/icon/white/add.png') }}" width="20px" >
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="col-12">
                                  <div class="row">
                                      @if ($automovil->count())
                                      @foreach($automovil as $item)
                                          @foreach($users as $item2)
                                             @if($item2->current_auto == $item->id)
                                                    <div class="col-6  mt-4">
                                                            <div class="card card-slide-garaje" style="background-image: linear-gradient(to bottom, #00d62e, #2ce048, #43eb5f, #56f574, #68ff88);">
                                                              <div class="card-body" >
                                                                   @if($item->img == NULL)
                                                                      <div class="col-6">
                                                                        <img class="d-inline mb-2" src="{{ asset('img/icon/car.png') }}"  width="80px">
                                                                      </div>
                                                                    @else
                                                                      <div class="col-6">
                                                                        <img class="d-inline mb-2" src="{{ asset('img-auto/'.$item->img) }}"  width="80px">
                                                                      </div>
                                                                    @endif
                                                                  <p class="card-text"><strong>{{$item->submarca}}</strong></p>
                                                                  <p class="card-text" style="font-size: 12px"><strong>{{$item->kilometraje}} KM Recorridos</strong></p>
                                                              </div>
                                                            </div>
                                                    </div>
                                             @else
                                                <div class="col-6  mt-4">
                                                     <a type="button" class="" data-toggle="modal" data-target="#modal-estatus-{{$item->id}}">
                                                        <div class="card card-slide-garaje">
                                                          <div class="card-body" >
                                                                   @if($item->img == NULL)
                                                                        <img class="d-inline mb-2" src="{{ asset('img/icon/car3.png') }}"  width="80px">
                                                                    @else
                                                                        <img class="d-inline mb-2" src="{{ asset('img-auto/'.$item->img) }}"  width="80px">
                                                                    @endif
                                                              <p class="card-text"><strong>{{$item->submarca}}</strong></p>
                                                              <p class="card-text" style="font-size: 12px"><strong>{{$item->kilometraje}} KM Recorridos</strong></p>
                                                          </div>
                                                        </div>
                                                     </a>
                                                </div>
                                             @endif
                                              @break
                                          @endforeach
                                      @endforeach
                                        @else
                                        <div class="row overflow-hidden" style="height: 75vh;">

                                            <div class="col-12" >
                                                <p class="text-center title-car">
                                                <img class="d-inline mb-2" src="{{ asset('img/icon/white/coche (7).png') }}" alt="Icon documento" width="150px">

                                                </p>
                                                <p class="text-center  text-white">
                                                 <strong style="font: normal normal bold 20px/20px Segoe UI;">A&uacute;n no tienes Autos registrados! </strong><br>
                                                 <br> click en el botón de + para <br> agregar tu Auto
                                                </p>

                                                <p class="text-center">
                                                     <a type="button" class="btn " href="{{ route('create.automovil') }}">
                                                        <img class="d-inline" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="60px">
                                                    </a>
                                                </p>
                                            </div>

                                        </div>
                                    @endif
                                  </div>

                        </div>

                    @foreach ($carro as $item)

                    <div class="col-12 mt-5 mb-5">
                            <div class="d-flex justify-content-between">
                                <h4 class="text-white text-tittle-app mr-3">
                                    Detalles de Veh&iacute;culo
                                </h4>

                                <a class="btn btn-garaje-2" href="{{ route('edit.automovil',$item->id) }}">
                                     <img class="" src="{{ asset('img/icon/white/editar.png') }}" width="20px" >
                                </a>
                            </div>
                        </div>

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px;height: 160px!important;">
                              <div class="card-body text-center text-garaje" >
                                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/proteger.png') }}" alt="Icon documento" width="50px">
                                      <strong>Marca</strong>
                                        @foreach($marca as $value)
                                            @if($item->id_marca == $value->id)
                                            <p class="text-center" style="font-size: 12px">{{ $value->nombre }}</p>
                                          @endif
                                        @endforeach
                              </div>
                            </div>
                    </div>

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px;height: 160px!important;">
                              <div class="card-body text-center text-garaje" >
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/documento.png') }}" alt="Icon documento" width="50px">
                                      <strong>Submarca </strong>
                                      <p class="text-center" style="font-size: 12px">{{$item->submarca}}</p>
                              </div>
                            </div>
                    </div>

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px;height: 160px!important;">
                              <div class="card-body text-center text-garaje" >
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/coche (2).png') }}" alt="Icon documento" width="50px">
                                      <strong>Tipo</strong>
                                      <p class="text-center" style="font-size: 12px">{{$item->tipo}}</p>
                              </div>
                            </div>
                    </div>


                {{-- ----------------------}}

                     <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px;height: 160px!important;">
                              <div class="card-body text-center text-garaje" >
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/coche (3).png') }}" alt="Icon documento" width="50px">
                                      <strong>Subtipo</strong>
                                      <p class="text-center" style="font-size: 12px">{{$item->subtipo}}</p>
                              </div>
                            </div>
                    </div>

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px;height: 160px!important;">
                              <div class="card-body text-center text-garaje" >
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/days.png') }}" alt="Icon documento" width="50px">
                                      <strong>Año</strong>
                                      <p class="text-center" style="font-size: 12px">{{$item->año}}</p>
                              </div>
                            </div>
                    </div>

                     <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px;height: 160px!important;">
                              <div class="card-body text-center text-garaje" >

                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/color-palette.png') }}" alt="Icon documento" width="50px">
                                      <strong>Color</strong>
                                      <p class="text-center" style="font-size: 12px">
                                        <input class="" type="color" value="{{$item->color}}" id="example-color-input" Disabled>
                                      </p>
                              </div>
                            </div>
                    </div>

                {{-- ----------------------}}

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px;height: 160px!important;margin-bottom: 8rem !important;">
                              <div class="card-body text-center text-garaje" >
                                       <img class="d-inline mb-2" src="{{ asset('img/icon/black/barcode.png') }}" alt="Icon documento" width="50px">
                                      <strong>Num de Serie</strong>
                                      <p class="text-center" style="font-size: 12px">{{$item->numero_serie}}</p>
                              </div>
                            </div>
                    </div>

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px;height: 160px!important;margin-bottom: 8rem !important;">
                              <div class="card-body text-center text-garaje" >
                                       <img class="d-inline mb-2" src="{{ asset('img/icon/black/llantas.png') }}" alt="Icon documento" width="50px">
                                      <strong>Kilometraje</strong>
                                      <p class="text-center" style="font-size: 12px">{{$item->kilometraje}}</p>
                              </div>
                            </div>
                    </div>

                    <div class="col-4 mb-3">
                            <div class="card" style="border-radius: 15px;height: 160px!important;margin-bottom: 8rem !important;">
                              <div class="card-body text-center text-garaje" >
                                      <img class="d-inline mb-2" src="{{ asset('img/icon/black/placa.png') }}" alt="Icon documento" width="50px">
                                      <strong>Num Placas</strong>
                                      <p class="text-center" style="font-size: 12px">{{$item->placas}}</p>
                              </div>
                            </div>
                    </div>

@endforeach

</div>



@endsection
