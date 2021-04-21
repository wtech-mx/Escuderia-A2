@extends('admin.layouts.app')

@section('content')

     <link href="{{ asset('css/edit-garaje.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">
<div class="row bg-blue" style="background-image: linear-gradient(to bottom, #00d62e, #2ce048, #43eb5f, #56f574, #68ff88);">

                    @if(Session::has('empresa'))
                        <script>
                            Swal.fire({
                              title: 'Exito!!',
                              html:
                                'Se ha agragado la <b>EMPRESA</b>, ' +
                                'Exitosamente',
                              // text: 'Se ha agragado la "MARCA" Exitosamente',
                              imageUrl: '{{ asset('img/icon/color/edificio-de-oficinas (3).png') }}',
                              background: '#fff',
                              imageWidth: 150,
                              imageHeight: 150,
                              imageAlt: 'EMPRESA IMG',
                            })
                        </script>
                    @endif

                    @if(Session::has('user'))
                        <script>
                            Swal.fire({
                              title: 'Exito!!',
                              html:
                                'Se ha agragado el <b>USUARIO</b>, ' +
                                'Exitosamente',
                              // text: 'Se ha agragado la "MARCA" Exitosamente',
                              imageUrl: '{{ asset('img/icon/color/empresario.png') }}',
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
                                        <a href="{{ route('index_admin.automovil') }}" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong>Agregar Auto</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        <div class="col-12 mb3">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/car2.png') }}" alt="Icon documento" width="350px">
                            <p class="text-left title-car">
                                <strong>HAVAL F7</strong>
                            </p>

                            <p class="text-left subtitle-car" style="font-size: 12px">
                                <strong>1000 KM Recorridos</strong>
                            </p>
                        </div>


                    {{-- ----------------------------------------------------------------------------}}
                    {{-- |Contendor Tab--}}
                    {{-- |----------------------------------------------------------------------------}}

                    <div class="col-12 mt-5">

                        <ul class="nav nav-pills ml-3 mb-3" id="pills-tab" role="tablist">

                          <li class="nav-item mr-2">
                            <a class="nav-link active a-auto" id="pills-auto-tab" data-toggle="pill" href="#auto" role="tab" aria-controls="auto" aria-selected="true">
                                Datos de auto
                            </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link a-auto" id="pills-Vinculacion-tab" data-toggle="pill" href="#pills-Vinculacion" role="tab" aria-controls="pills-Vinculacion" aria-selected="false">
                                Vinculaci&oacute;n
                            </a>
                          </li>

                        </ul>
                     <form method="POST" action="{{route('store_admin.automovil')}}" enctype="multipart/form-data" role="form">
                         @csrf
                        <div class="tab-content" id="pills-tabContent">

                          <div class="tab-pane fade show active" id="auto" role="tabpanel" aria-labelledby="pills-auto-tab">


                            <div class="col-12 mb-3">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text span-edit-car">
                                             <i class="fas fa-shield-alt icon-garaje" aria-hidden="true"></i>
                                             <a class="input-a-text">Marca</a>
                                        </span>
                                    </div>
                                             <select class="form-control input-edit-car" id="id_marca" name="id_marca" value="{{ old('submarca') }}">
                                                <option>Selecciona la marca de tu carro</option>
                                                @foreach($marca as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                                @endforeach
                                            </select>
                                </div>
                                         @if ($errors->has('id_marca'))
                                            <span class="text-danger">{{ $errors->first('id_marca') }}</span>
                                        @endif
                            </div>

                            <div class="col-12 mb-3">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text span-edit-car">
                                            <i class="fas fa-shield-alt icon-garaje" aria-hidden="true"></i>
                                             <a class="input-a-text">Submarca</a>
                                        </span>
                                    </div>
                                    <input  type="text" class="form-control input-edit-car" placeholder="Submarca" id="submarca" name="submarca" value="{{ old('submarca') }}" >
                                        @if ($errors->has('submarca'))
                                            <span class="text-danger">{{ $errors->first('submarca') }}</span>
                                        @endif
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text span-edit-car">
                                             <i class="fas fa-car icon-garaje"></i>
                                             <a class="input-a-text">Tipo</a>
                                        </span>
                                    </div>
                                    <input  type="text" class="form-control input-edit-car" placeholder="Tipo" id="tipo" name="tipo" value="{{ old('tipo') }}">
                                        @if ($errors->has('tipo'))
                                            <span class="text-danger">{{ $errors->first('tipo') }}</span>
                                        @endif
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text span-edit-car">
                                             <i class="fas fa-car icon-garaje"></i>
                                             <a class="input-a-text">Subtipo</a>
                                        </span>
                                    </div>
                                    <input  type="text" class="form-control input-edit-car" placeholder="Subtipo" id="subtipo" name="subtipo" value="{{ old('subtipo') }}">
                                        @if ($errors->has('Subtipo'))
                                            <span class="text-danger">{{ $errors->first('Subtipo') }}</span>
                                        @endif
                                </div>
                            </div>


                            <div class="col-12 mb-3">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text span-edit-car">
                                             <i class="fas fa-car icon-garaje"></i>
                                             <a class="input-a-text">Kilometraje</a>
                                        </span>
                                    </div>
                                    <input  type="number" class="form-control input-edit-car" placeholder="kilometraje" id="kilometraje" name="kilometraje" value="{{ old('kilometraje') }}">

                                </div>
                                    @if ($errors->has('kilometraje'))
                                        <span class="text-danger">{{ $errors->first('kilometraje') }}</span>
                                    @endif
                            </div>

                            <div class="col-12 mb-3">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text span-edit-car">
                                             <i class="far fa-calendar-alt icon-garaje"></i>
                                             <a class="input-a-text">Año</a>
                                        </span>
                                    </div>
                                    <input  type="number" class="form-control input-edit-car" placeholder="YYYY" id="año" name="año" value="{{ old('año') }}">
                                        @if ($errors->has('año'))
                                            <span class="text-danger">{{ $errors->first('año') }}</span>
                                        @endif
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text span-edit-car">
                                             <i class="fas fa-barcode icon-garaje"></i>
                                             <a class="input-a-text">Num Serie</a>
                                        </span>
                                    </div>
                                    <input  type="text" class="form-control input-edit-car" placeholder="Num Serie" id="numero_serie" name="numero_serie" value="{{ old('numero_serie') }}">
                                        @if ($errors->has('numero_serie'))
                                            <span class="text-danger">{{ $errors->first('numero_serie') }}</span>
                                        @endif
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text span-edit-car" >
                                             <img class="" src="{{ asset('img/icon/black/placa.png') }}" width="35px">
                                              <a class="input-a-text">Num Placas</a>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control input-edit-car input-edit-car" placeholder="Num Placas" id="placas" name="placas" value="{{ old('placas') }}">
                                        @if ($errors->has('placas'))
                                            <span class="text-danger">{{ $errors->first('placas') }}</span>
                                        @endif
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text span-edit-car">
                                             <i class="fas fa-palette icon-garaje"></i>
                                             <a class="input-a-text">Color</a>
                                        </span>
                                    </div>
                                    <input  type="color" value="#563d7c" class="form-control input-edit-car" placeholder="Color" id="color" name="color" value="{{ old('color') }}">
                                        @if ($errors->has('color'))
                                            <span class="text-danger">{{ $errors->first('color') }}</span>
                                        @endif
                                </div>
                            </div>

                        <div class="col-12 " style="margin-bottom: 8rem !important;">
                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text span-edit-car">
                                         <i class="far fa-images icon-garaje"></i>
                                         <a class="input-a-text">Foto</a>
                                    </span>
                                </div>
                                <input  type="file"  class="form-control input-edit-car" id='img' name="img" value="">
                            </div>
                        </div>

                          </div>

                        {{-- ----------------------------------------------------------------------------}}
                        {{-- |Tab seguridad--}}
                        {{-- |----------------------------------------------------------------------------}}

                          <div class="tab-pane fade" id="pills-Vinculacion" role="tabpanel" aria-labelledby="pills-Vinculacion-tab">

                              <div class="col-12 text-center mt-5 mb-5">

                                     <label class="mb-5" for="">
                                         <p class="subtitle-label"><strong>¿Este auto pertenece a una empresa?</strong></p>
                                     </label>

                                    <div class="row">

                                        <div class="col-9">
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-vinculacion" style="background-color: #FFFFFF;border-radius: 10px 0px 0px 10px;">
                                                        <i class="fas fa-building" style="font-size: 30px"></i>
                                                    </span>
                                                </div>

                                                <select class="form-control" id="id_empresa" name="id_empresa">
                                                     <option value="">Seleccione empresa</option>
                                                     @foreach($empresa as $item)
                                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                     @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                             <!-- Button trigger modal -->
                                            <a  class="btn btn-circel" data-toggle="modal" data-target="#empresa">
                                                 <i class="fas fa-plus-circle icon-plus-effect" ></i>
                                            </a>
                                        </div>

                                    </div>

                                     <label class="mb-5" for="">
                                         <p class="subtitle-label" ><strong>¿Este auto pertenece a una persona?</strong></p>
                                     </label>

                                    <div class="row">

                                        <div class="col-9">
                                             <div class="input-group form-group">
                                                 <div class="input-group-prepend">
                                                      <span class="input-group-text input-vinculacion" style="background-color: #FFFFFF;border-radius: 10px 0px 0px 10px;">
                                                          <i class="fas fa-user" style="font-size: 30px"></i>
                                                     </span>
                                                 </div>

                                                 <select class="form-control" id="id_user" name="id_user">
                                                     <option value="">Seleccione usuario</option>
                                                     @foreach($user as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                     @endforeach
                                                 </select>

                                             </div>
                                        </div>

                                        <div class="col-3">
                                            <a  class="btn btn-circel" data-toggle="modal" data-target="#persona">
                                               <i class="fas fa-plus-circle icon-plus-effect" ></i>
                                            </a>
                                        </div>

                                     <div class="col-12" style="margin-bottom: 8rem !important;">
                                         <button type="submit" class="btn btn-lg btn-save-dark text-white mt-5">
                                           <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                                Guardar
                                        </button>
                                     </div>

                                    </div>


                              </div>

                          </div>
                        </div>
                     </form>
                        @include('admin.garaje.add-bussines-modal')
                    </div>


</div>

@endsection
