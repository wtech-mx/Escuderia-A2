@extends('layouts.app')

@section('content')

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

<div class="row bg-blue" style="background-image: linear-gradient(to bottom, #24b6f7, #009fff, #0086ff, #0066ff, #243afc);">

                    @if(Session::has('success'))
                        <script>
                            Swal.fire({
                              title: 'Exito!!',
                              html:
                                'Se ha agragado el <b>DOCUMENTO</b>, ' +
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

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white">
                                        <a href="javascript:history.back()" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong>Fecha de vencimiento de Tarjeta de Circulación</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3 mb-5">
                            <div class="d-flex justify-content-between">
                            <p class="text-center text-white">
                                Agregar mas
                            </p>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                 <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="30px">
                                </button>

                            </div>
                        </div>

                        @if ($documentos->count())
                            @foreach($documentos as $item)
                                <div class="col-6">
                                    <a type="button" class="" data-toggle="modal" data-target="#modal-doc-{{$item->id}}">
                                        <p class="text-center">
                                                <img class="d-inline mb-2" src="{{asset('vencimiento-tc/'.$item->img)}}" alt="{{$item->img}}" width="100px">
                                        <p class="text-center text-white">
                                            Fecha de vencimiento : <br>
                                            <strong>{{$item->fecha_vencimiento }}</strong>
                                        </p>
                                    </a>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-doc-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-doc-{{$item->id}}" aria-hidden="true">
                                  <div class="modal-dialog  modal-sm modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        <div class="d-flex justify-content-end">
                                          <div class="mr-4 mt-3">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                        </div>


                                      <div class="modal-body">
                                          <p class="text-center mb-3">
                                              <img class="d-inline mb-2" src="{{asset('vencimiento-tc/'.$item->img)}}" alt="{{$item->img}}" width="100%">
                                          </p>

                                          <p class="text-center text-dark">
                                              Fecha de vencimiento: <br>
                                              <strong>{{$item->fecha_vencimiento}}</strong>
                                          </p>

                                      </div>

                                    </div>
                                  </div>
                                </div>


                            @endforeach
                        @else

                        {{------------------------------------}}
                        {{--      Documentacion con form    --}}
                        {{------------------------------------}}
                        <div class="col-12 mb3">
                            <p class="text-center title-car">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/paper (1).png') }}" alt="Icon documento" width="150px">

                            </p>
                            <p class="text-center  text-white">
                             <strong style="font: normal normal bold 20px/20px Segoe UI;">Aun no tienes documentos! </strong><br>
                             Escanea tus documentos has <br> click en el botón de + para <br> agregar tus documentos
                            </p>
                        </div>

                        <div class="col-12 mt-5">
                            <p class="text-center">
                                 <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="60px">
                                </button>
                            </p>
                        </div>

                        <div class="col-12 mt-3">
                            <p class="text-center text-white">
                                Escanea tus documentos
                            </p>
                        </div>
                        {{------------------------------------}}
                        {{--      Documentacion con form    --}}
                        {{------------------------------------}}

                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">

                              <div class="modal-body">

                                  <div class="col-12">
                                    <p class="text-center text-dark" style="font: normal normal bold 23px/31px Segoe UI;">
                                        Agregar Datos
                                    </p>
                                  </div>

                                       <form method="POST" action="{{route('store_admin.view-vencimiento-ts-admin', $automovil->id)}}" enctype="multipart/form-data" role="form">
                                             @csrf

                                            <div class="col-12 mt-3">
                                                <label for="">
                                                    <p class="text-dark"><strong>Elegir Img</strong></p>
                                                </label>

                                                  <div class=" custom-file mb-3">
                                                    <input type="file" class="custom-file-input input-group-text" name="img" value="{{ old('img') }}">
                                                    <label class="custom-file-label">Elegir img...</label>
                                                        @if ($errors->has('img'))
                                                            <span class="text-danger">{{ $errors->first('img') }}</span>
                                                        @endif
                                                  </div>

                                                  <label for="">
                                                        <p class="text-dark"><strong>Fecha de Expedicion</strong></p>
                                                    </label>

                                                  <div class="input-group form-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                     <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                                                </span>
                                                            </div>
                                                             <input type="date" class="form-control" placeholder="MM/DD/YYY"  style="border-radius: 0  10px 10px 0;"  name="fecha_vencimiento" value="{{ old('fecha_vencimiento') }}">
                                                            @if ($errors->has('fecha_vencimiento'))
                                                                <span class="text-danger">{{ $errors->first('fecha_vencimiento') }}</span>
                                                            @endif
                                                        </div>

{{--                                                  <p class="text-center mt-3">--}}
{{--                                                        Agregar <br>--}}
{{--                                                        <strong> Fecha de vencimiento de Tarjeta de Circulación</strong>--}}
{{--                                                    </p>--}}

                                                  <button type="submit" class="btn btn-success btn-save text-white">
                                                      <img class="d-inline" src="{{ asset('img/icon/white/save-file-option (1).png') }}" alt="Icon documento" width="30px">
                                                        Guardar
                                                  </button>
                                            </div>
                                       </form>
                                </div>

                              </div>

                            </div>
                          </div>
                        </div>

</div>

@endsection
