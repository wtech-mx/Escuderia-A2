@extends('admin.layouts.app')

@section('content')

    <link href="{{ asset('css/edit-garaje.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

    <div class="row bg-blue"
        style="background-image: linear-gradient(to bottom, #00d62e, #2ce048, #43eb5f, #56f574, #68ff88);">


        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index_admin.automovil') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8  mt-4">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Editar Auto</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="col-12 mb3">
            <img class="d-inline mb-2" src="{{ asset('img/icon/car2.png') }}" alt="Icon documento" width="350px">
            <p class="text-left title-car">
                <strong>{{ $automovil->submarca }}</strong>
            </p>

            <p class="text-left subtitle-car" style="font-size: 14px">
                <strong>{{ $automovil->kilometraje }} KM Recorridos</strong>
            </p>
        </div>


        {{-- -------------------------------------------------------------------------- --}}
        {{-- |Contendor Tab --}}
        {{-- |-------------------------------------------------------------------------- --}}

        <div class="col-12 mt-5">

            <ul class="nav nav-pills ml-3 mb-3" id="pills-tab" role="tablist">

                <li class="nav-item mr-2">
                    <a class="nav-link active a-auto" id="pills-auto-tab" data-toggle="pill" href="#auto" role="tab"
                        aria-controls="auto" aria-selected="true">
                        Datos de auto
                    </a>
                </li>
                @if (auth()->user()->empresa == 0)
                <li class="nav-item">
                    <a class="nav-link a-auto" id="pills-Vinculacion-tab" data-toggle="pill" href="#pills-Vinculacion"
                        role="tab" aria-controls="pills-Vinculacion" aria-selected="false">
                        Vinculaci&oacute;n
                    </a>
                </li>
                @endif

            </ul>
            <form method="POST" action="{{ route('update_admin.automovil', $automovil->id) }}"
                enctype="multipart/form-data" role="form">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade show active" id="auto" role="tabpanel" aria-labelledby="pills-auto-tab">


                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        {{-- <img class="" src="{{ asset('img/icon/black/proteger.png') }}" width="35px"> --}}
                                        <i class="fas fa-shield-alt icon-garaje" aria-hidden="true"></i>
                                        <a class="input-a-text">Marca</a>
                                    </span>
                                </div>
                                <select class="form-control input-edit-car" id="id_marca" name="id_marca">

                                    @foreach ($marca as $item)
                                        <option value="{{ $automovil->Marca->id }}">{{ $automovil->Marca->nombre }}
                                        </option>
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        <i class="fas fa-shield-alt icon-garaje" aria-hidden="true"></i>
                                        <a class="input-a-text">Submarca</a>
                                    </span>
                                </div>
                                <input type="text" class="form-control input-edit-car" value="{{ $automovil->submarca }}"
                                    id="submarca" name="submarca">
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        <i class="fas fa-car icon-garaje"></i>
                                        <a class="input-a-text">tipo</a>
                                    </span>
                                </div>
                                <input type="text" class="form-control input-edit-car" value="{{ $automovil->tipo }}" id="tipo"
                                    name="tipo">
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        <i class="fas fa-car icon-garaje"></i>
                                        <a class="input-a-text">Tanque</a>
                                    </span>
                                </div>
                                <input type="text" class="form-control input-edit-car" value="{{ $automovil->tanque }}" id="tanque"
                                    name="tanque">
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        <i class="fas fa-car icon-garaje"></i>
                                        <a class="input-a-text">Transmisión</a>
                                    </span>
                                </div>
                                <input type="text" class="form-control input-edit-car" value="{{ $automovil->subtipo }}"
                                    id="subtipo" name="subtipo">
                            </div>
                        </div>


                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        <i class="fas fa-car icon-garaje"></i>
                                        <a class="input-a-text">Kilometraje</a>
                                    </span>
                                </div>
                                <input type="text" class="form-control input-edit-car"
                                    value="{{ $automovil->kilometraje }}" id="kilometraje" name="kilometraje">
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        <i class="far fa-calendar-alt icon-garaje"></i>
                                        <a class="input-a-text">Año</a>
                                    </span>
                                </div>
                                <input type="number" class="form-control input-edit-car" value="{{ $automovil->año }}"
                                    id="año" name="año">
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        <i class="fas fa-barcode icon-garaje"></i>
                                        <a class="input-a-text">Num Serie</a>
                                    </span>
                                </div>
                                <input type="text" class="form-control input-edit-car"
                                    value="{{ $automovil->numero_serie }}" id="numero_serie" name="numero_serie">
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        <img class="" src="{{ asset('img/icon/black/placa.png') }}" width="35px">
                                        <a class="input-a-text">Num Placas viejas</a>
                                    </span>
                                </div>
                                <input type="text" class="form-control input-edit-car input-edit-car"
                                    value="{{ $automovil->placas_viejas }}" id="placas_viejas" name="placas_viejas">
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        <img class="" src="{{ asset('img/icon/black/placa.png') }}" width="35px">
                                        <a class="input-a-text">Num Placas</a>
                                    </span>
                                </div>
                                <input type="text" class="form-control input-edit-car input-edit-car"
                                    value="{{ $automovil->placas }}" id="placas" name="placas">
                            </div>
                        </div>

                        @if (auth()->user()->empresa == 1)
                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        <i class="fas fa-shield-alt icon-garaje" aria-hidden="true"></i>
                                        <a class="input-a-text">Sector</a>
                                    </span>
                                </div>
                                <select class="form-control input-edit-car" id="id_sector" name="id_sector"
                                    value="{{ old('submarca') }}">
                                    <option value="{{ $automovil->id_sector }}">Selecciona en caso de cambiar el sector</option>
                                    @foreach ($sector as $item)
                                        <option value="{{ $item->id }}">{{ $item->sector }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif

                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        <i class="fas fa-palette icon-garaje"></i>
                                        <a class="input-a-text">Color</a>
                                    </span>
                                </div>
                                <input type="color" class="form-control input-edit-car" value="{{ $automovil->color }}"
                                    id="color" name="color">
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text span-edit-car">
                                        <i class="far fa-images icon-garaje"></i>
                                        <a class="input-a-text">Foto</a>
                                    </span>
                                </div>
                                <input type="file" class="form-control input-edit-car" id='img' name="img"
                                    value="{{ $automovil->img }}">
                            </div>
                        </div>

                        <div class="col-12 mb-3" style="margin-bottom: 5rem !important;">
                            <p class="text-center">
                                <img class="d-inline mb-2" src="{{ asset('img-auto/' . $automovil->img) }}"
                                    width="150px">
                            </p>
                        </div>

                        @if (auth()->user()->empresa == 1)
                            @if (auth()->user()->id_sector == NULL)
                                <input type="hidden" class="form-control input-edit-car" id="id_empresa"
                                name="id_empresa" value="{{ auth()->user()->id }}">
                            @else
                                <input type="hidden" class="form-control input-edit-car" id="id_empresa"
                                name="id_empresa" value="{{ auth()->user()->id_empresa }}">
                            @endif

                            <div class="col-12" style="margin-bottom: 8rem !important;">
                                <button type="submit" class="btn btn-lg btn-save-dark text-white mt-5">
                                    <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}"
                                        width="20px">
                                    Guardar
                                </button>
                            </div>
                        @endif
                    </div>

                    {{-- -------------------------------------------------------------------------- --}}
                    {{-- |Tab seguridad --}}
                    {{-- |-------------------------------------------------------------------------- --}}
                    @if (auth()->user()->empresa == 0)
                    <div class="tab-pane fade" id="pills-Vinculacion" role="tabpanel"
                        aria-labelledby="pills-Vinculacion-tab">

                        <div class="col-12 text-center mt-5 mb-5">

                            <label for="">
                                <p class="subtitle-label"><strong>¿Este auto pertenece a una empresa?</strong></p>
                            </label>

                            <div class="row">

                                <div class="col-9">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text input-vinculacion"
                                                style="background-color: #FFFFFF;border-radius: 10px 0px 0px 10px;">
                                                <i class="fas fa-building" style="font-size: 30px"></i>
                                            </span>
                                        </div>

                                        <select class="form-control" id="id_empresa" name="id_empresa">
                                            @if ($automovil->id_empresa == null)
                                                <option value="">Seleccione una Empresa</option>
                                            @else
                                                <option value="{{ $automovil->id_user }}">
                                                    {{ $automovil->UserEmpresa->name }}
                                                </option>
                                            @endif

                                            @foreach ($empresa as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <!-- Button trigger modal -->
                                    <a class="btn btn-circel" data-toggle="modal" data-target="#empresa">
                                        <i class="fas fa-plus-circle icon-plus-effect"></i>
                                    </a>
                                </div>

                            </div>

                            <label for="">
                                <p class="subtitle-label"><strong>¿Este auto pertenece a una persona?</strong></p>
                            </label>

                            <div class="row">

                                <div class="col-9">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-vinculacion"
                                                style="background-color: #FFFFFF;border-radius: 10px 0px 0px 10px;">
                                                <i class="fas fa-user" style="font-size: 30px"></i>
                                            </span>
                                        </div>

                                        <select class="form-control" id="id_user" name="id_user">
                                            @if ($automovil->id_user == null)
                                                <option value="">Seleccione un Usuario</option>
                                            @else
                                                <option value="{{ $automovil->id_user }}">{{ $automovil->User->name }}
                                                </option>
                                            @endif
                                            @foreach ($user as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-3">
                                    <a class="btn btn-circel" data-toggle="modal" data-target="#persona">
                                        <i class="fas fa-plus-circle icon-plus-effect"></i>
                                    </a>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-lg btn-save-dark text-white mt-5"
                                style="margin-bottom: 8rem !important;">
                                <i class="fas fa-save icon-save"></i>
                                Actualizar
                            </button>
                        </div>

                    </div>
                    @endif
                </div>
            </form>
            @include('admin.garaje.add-bussines-modal')
        </div>


    </div>

@endsection
