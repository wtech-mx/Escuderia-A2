@extends('admin.layouts.app')

@section('bg-color', 'background-color: transparent;')

@section('content')

    <style>
        .tab-content > .active {
            display: flex!important;
        }
    </style>

    <p style="display: none">{{ $userId = Auth::id() }}</p>

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

    <div class="row bg-profile" style="z-index: 100000">

        <div class="d-flex justify-content-between mt-3  mb-3">
                    <div class="text-center text-white">
                        <a type="submit" onclick="history.back()" style="background-color: transparent;clip-path: none">
                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h5 class="text-center text-white ml-4 mr-4 ">
                                <strong>Datos de perfil</strong>
                            </h5>
                        </div>
                    </div>

                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                    </div>
        </div>

        <div class="col-12 p-3">
            <p class="text-center">
                @if ($user->img == null)
                    <i class="far fa-user d-inline icon-effect-users-edit"></i>
                @else
                    <img class="rounded-circle" src="{{ asset('img-perfil/' . $user->img) }}" height="150px"
                        width="150px">
                @endif
                <h4 class="text-center text-white">
                    <strong>{{ $user->name }}</strong>
                </h4>
            </p>
        </div>

    </div>

    <div class="row bg-image">
        <div class="col-12 mt-5">
            @if (Session::has('success'))
                <script>
                    Swal.fire(
                        'Exito!',
                        'Se ha guardado exitosamiente.',
                        'success'
                    )

                </script>
            @endif

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item mr-2">
                    <a class="nav-link active a-perso" id="pills-perfil-tab" data-toggle="pill" href="#perfil" role="tab"
                        aria-controls="perfil" aria-selected="true">
                        Datos de perfil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link a-perso" id="pills-Seguridad-tab" data-toggle="pill" href="#pills-Seguridad"
                        role="tab" aria-controls="pills-Seguridad" aria-selected="false">
                        Seguridad
                    </a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane row fade show active" id="perfil" role="tabpanel" aria-labelledby="pills-perfil-tab">
                    <form method="POST" action="{{ route('update_admin.user', $user->id) }}" enctype="multipart/form-data" role="form" style="display: contents;">
                        @csrf

                        <input type="hidden" name="_method" value="PATCH">

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4 p-3">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Nombre Completo</strong></p>
                            </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-id-badge icon-users-edit"></i>
                                    </span>
                                </div>

                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                                    style="border-radius: 0  10px 10px 0;">

                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4 p-3">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Correo</strong></p>
                            </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-envelope icon-users-edit"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}"
                                    style="border-radius: 0  10px 10px 0;">

                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4 p-3">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Tel&eacute;fono</strong></p>
                            </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone icon-users-edit"></i>
                                    </span>
                                </div>
                                <input type="number" class="form-control" id="telefono" name="telefono" placeholder="5500550055"
                                    value="{{ $user->telefono }}" style="border-radius: 0  10px 10px 0;">
                                @if ($errors->has('telefono'))
                                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4 p-3">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Fecha de nacimiento</strong></p>
                            </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt icon-users-edit"></i>
                                    </span>
                                </div>
                                <input type="date" class="form-control" placeholder="MM/DD/YYY"
                                    style="border-radius: 0  10px 10px 0;" id='fecha_nacimiento' name="fecha_nacimiento"
                                    value="{{ $user->fecha_nacimiento }}">
                                @if ($errors->has('fecha_nacimiento'))
                                    <span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4 p-3">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Direcci&oacute;n</strong></p>
                            </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text">
                                        <i class="fas fa-map-marker-alt icon-users-edit"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Direccion"
                                    style="border-radius: 0  10px 10px 0;" id='direccion' name="direccion"
                                    value="{{ $user->direccion }}">
                                @if ($errors->has('Direccion'))
                                    <span class="text-danger">{{ $errors->first('Direccion') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4 p-3">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Referencia</strong></p>
                            </label>

                            <div class="input-group form-group">
                            <div class="input-group-prepend ">
                                <span class="input-group-text">
                                    <img class="" src="{{ asset('img/icon/white/referencia (1).png') }}" width="25px">
                                </span>
                            </div>

                            <select class="form-control" id="referencia" name="referencia">

                                @if ($user->referencia == null)
                                    <option selected value="">Selecione Usuario</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                @else

                                    @foreach ($users as $item)
                                        @if ($user->referencia == $item->id)
                                            <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endif


                            </select>
                        </div>

                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4 p-3">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Role</strong></p>
                            </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text">
                                        <i class="fas fa-user-tag icon-users-edit"></i>
                                    </span>
                                </div>

                                <select class="form-control" id="role" name="role">
                                    <option value="{{ $user->role }}">Seleccione si va a cambiar de role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                    <option value="0">Usuario</option>
                                </select>
                            </div>

                        </div>

                        @if (auth()->user()->empresa == 1)
                        @if (auth()->user()->id_sector == NULL)
                            <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4 p-3">
                                <label for="" class="mt-3">>
                                    <p class="text-white"><strong>Sector</strong></p>
                                </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text">
                                        <i class="fas fa-user-tag icon-users-edit"></i>
                                    </span>
                                </div>

                                <select class="form-control" id="id_sector" name="id_sector">
                                    <option value="{{ $user->id_sector }}">Seleccione un sector en caso de cambiarlo</option>
                                    @foreach ($sector as $role)
                                        <option value="{{$role->id}}">{{$role->sector}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @else
                                <input type="hidden" id="id_sector" name="id_sector" value="{{auth()->user()->id_sector}}">
                            @endif
                            </div>
                        @endif

                         <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4 p-3">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Género</strong></p>
                            </label>

                            <div class="col-12 text-center">

                                <div class="input-group form-group d-inline">

                                    <div class="d-flex justify-content-between">

                                        <div class="form-check form-check-inline d-block">
                                            @if ($user->genero == 'Masculino')
                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input d-block" type="radio" name="genero"
                                                        id="genero" value="Masculino" checked>
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input d-block" type="radio" name="genero"
                                                        id="genero" value="Masculino">
                                                </div>
                                            @endif
                                            <label class="form-check-label text-white" for="inlineRadio1">
                                                Masculino
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline d-block">
                                            @if ($user->genero == 'Femenino')
                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input  d-block" type="radio" name="genero"
                                                        id="genero" value="Femenino" checked>
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input  d-block" type="radio" name="genero"
                                                        id="genero" value="Femenino">
                                                </div>
                                            @endif
                                            <label class="form-check-label text-white" for="inlineRadio2">
                                                Femenino
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline d-block">
                                            @if ($user->genero == 'Otro')
                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input d-block" type="radio" name="genero"
                                                        id="genero" value="Otro" checked>
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input d-block" type="radio" name="genero"
                                                        id="genero" value="Otro">
                                                </div>
                                            @endif
                                            <label class="form-check-label text-white" for="inlineRadio3">
                                                Otro
                                            </label>
                                        </div>

                                    </div>

                                </div>

                            </div>
                         </div>

                         <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4 p-3">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Foto de Perfil</strong></p>
                            </label>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id='img' name="img" value="{{ $user->img }}">
                                <label class="custom-file-label" for="img">Selecciona imagen</label>
                            </div>

                         </div>

                        <div class="col-12 text-center mt-3 " style="margin-bottom: 8rem !important;">
                            <button class="btn btn-lg btn-save-neon text-white">
                                <i class="fas fa-save icon-save"></i>
                                Actualizar
                            </button>
                        </div>

                    </form>
                </div>

                <div class="tab-pane row fade" id="pills-Seguridad" role="tabpanel" aria-labelledby="pills-Seguridad-tab">

                    <form method="POST" action="{{ route('update_admin_password.user', $user->id) }}"  enctype="multipart/form-data" role="form" style="display: contents;">>
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-6">

                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-6 p-3">
                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Contraseña </strong></p>
                            </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock-open icon-users-edit"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="password"
                                    autocomplete="new-password" placeholder="Contraseña" id="password"
                                    style="border-radius: 0  10px 10px 0;">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-6 p-3">
                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Confirmar Contraseña </strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock icon-users-edit"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="password_confirmation"
                                    autocomplete="new-password" placeholder="Confirmar Contraseña" id="password_confirm"
                                    style="border-radius: 0  10px 10px 0;">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="col-12 text-center mt-5" style="margin-bottom: 8rem !important;">
                            <button class="btn btn-lg btn-save-neon text-white">
                                <i class="fas fa-save icon-save"></i>
                                Actualizar
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
