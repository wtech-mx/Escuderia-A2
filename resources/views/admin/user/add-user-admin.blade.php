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
                <i class="far fa-user d-inline icon-effect-users-edit"></i>
                <h4 class="text-center text-white">
                    <strong>Nombre</strong>
                </h4>
            </p>
        </div>

    </div>


    <div class="row bg-image">
        <div class="col-12 mt-5">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                <li class="nav-item mr-2">
                    <a class="nav-link active a-perso" id="pills-perfil-tab" data-toggle="pill" href="#perfil2" role="tab"
                        aria-controls="perfil2" aria-selected="true">
                        Datos de perfil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link a-perso" id="pills-Seguridad2-tab" data-toggle="pill" href="#pills-Seguridad2"
                        role="tab" aria-controls="pills-Seguridad2" aria-selected="false">
                        Seguridad
                    </a>
                </li>

            </ul>

            <form method="POST" action="{{ route('store_admin.user') }}" enctype="multipart/form-data" role="form">
                @csrf

                @if (Session::has('success'))
                    <script>
                        Swal.fire(
                            'Exito!',
                            'Se ha guardado exitosamente.',
                            'success'
                        )

                    </script>
                @endif

                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane row fade show active" id="perfil2" role="tabpanel" aria-labelledby="pills-perfil2-tab">

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4">
                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Nombre</strong></p>
                            </label>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-modal">
                                        <i class="far fa-id-badge icon-users-edit"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nombre" id="name" name="name" style="border-radius: 0  10px 10px 0;" required>
                            </div>
                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4">
                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Correo</strong></p>
                            </label>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-modal">
                                        <i class="far fa-envelope icon-users-edit"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="correo@correo.com" id="email" name="email"
                                    style="border-radius: 0  10px 10px 0;" required>
                            </div>
                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Tel&eacute;fono</strong></p>
                            </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-modal">
                                        <i class="fas fa-phone icon-users-edit"></i>
                                    </span>
                                </div>
                                <input type="number" class="form-control" placeholder="00 0000-0000" id="telefono" name="telefono"
                                    style="border-radius: 0  10px 10px 0;">
                            </div>

                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Direcci&oacute;n</strong></p>
                            </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text input-modal">
                                        <i class="fas fa-map-marker-alt icon-users-edit"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Direccion" id="direccion" name="direccion"
                                    style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
                            </div>

                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Fecha de nacimiento</strong></p>
                            </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text input-modal">
                                        <i class="far fa-calendar-alt icon-users-edit"></i>
                                    </span>
                                </div>
                                <input type="date" class="form-control" placeholder="MM/DD/YYY" id="fecha_nacimiento"
                                    name="fecha_nacimiento" style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
                            </div>

                        </div>

                        <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4">
                            @if (auth()->user()->empresa == 0)
                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Referencia</strong></p>
                            </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text input-modal">
                                        <img class="" src="{{ asset('img/icon/white/referencia (1).png') }}" width="25px">
                                    </span>
                                </div>

                                <select class="form-control referencia" id="referencia" name="referencia">
                                    <option value="">Seleccionar Referencia</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                        </div>

                         <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4">

                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Role</strong></p>
                            </label>

                                @if (auth()->user()->id_sector == NULL)
                                <div class="input-group form-group">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">
                                            <i class="fas fa-user-tag icon-users-edit"></i>
                                        </span>
                                    </div>

                                    <select class="form-control" id="role" name="role">
                                        @if (auth()->user()->empresa == 0)
                                            <option value="0">Usuario</option>
                                            @else
                                            <option value="0">Chofer</option>
                                        @endif
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @else
                                <input type="hidden" class="form-control input-edit-car" id="role"
                                name="role" value="0">
                                @endif
                         </div>

                         <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-4">
                            <label for="" class="mt-3">
                                <p class="text-white"><strong>Foto de Perfil</strong></p>
                            </label>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id='img' name="img">
                                <label class="custom-file-label" for="img">Selecciona imagen</label>
                            </div>
                         </div>

                        @if (auth()->user()->empresa == 0)
                            <div class="col-12 col-xs-12 col-sm-6 col-lg-4 text-left mb-5" style="margin-bottom: 8rem !important;">

                                <label for="" class="mt-3">
                                    <p class="text-white"><strong>Género</strong></p>
                                </label>

                                <div class="input-group form-group d-inline">

                                    <div class="d-flex justify-content-between">

                                        <div class="form-check form-check-inline d-block">
                                            <div class="d-flex justify-content-center">
                                                <input class="form-check-input d-block" type="radio" name="genero" id="genero"
                                                    value="masculino">
                                            </div>

                                            <label class="form-check-label text-white" for="inlineRadio1">
                                                Masculino
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline d-block">
                                            <div class="d-flex justify-content-center">
                                                <input class="form-check-input  d-block" type="radio" name="genero" id="genero"
                                                    value="femeninp">
                                            </div>
                                            <label class="form-check-label text-white" for="inlineRadio2">
                                                Femenino
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline d-block">
                                            <div class="d-flex justify-content-center">
                                                <input class="form-check-input d-block" type="radio" name="genero" id="genero"
                                                    value="otro">
                                            </div>
                                            <label class="form-check-label text-white" for="inlineRadio3">
                                                Otro
                                            </label>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="tab-pane row fade" id="pills-Seguridad2" role="tabpanel" aria-labelledby="pills-Seguridad-tab">

                            @if (auth()->user()->empresa == 1)
                                @if (auth()->user()->id_sector == NULL)

                                <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-6">

                                    <label for="" class="mt-3">
                                        <p class="text-white"><strong>Sector</strong></p>
                                    </label>

                                    <div class="input-group form-group">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-tag icon-users-edit"></i>
                                            </span>
                                        </div>

                                        <select class="form-control" id="id_sector" name="id_sector" required>
                                            <option value="">Seleccione un sector</option>
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

                             <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-6">
                                <label for="" class="mt-3">
                                    <p class="text-white"><strong>Contraseña</strong></p>
                                </label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal">
                                            <i class="fas fa-lock-open icon-users-edit"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="****" id="password" name="password"
                                        style="border-radius: 0  10px 10px 0;">
                                </div>
                            </div>

                            <div class="form-group col-12 col-xs-12 col-sm-6 col-lg-6">
                                <label for="" class="mt-3">
                                    <p class="text-white"><strong>Confirmar Contraseña </strong></p>
                                </label>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal">
                                            <i class="fas fa-lock icon-users-edit"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" name="password_confirmation" required
                                        autocomplete="new-password" placeholder="Confirmar Contraseña" id="password-confirm"
                                        style="border-radius: 0  10px 10px 0;">
                                </div>
                            </div>

                            <div class="col-12 text-center mt-5 mb-5">
                                <button class="btn btn-lg btn-save-neon text-white" style="margin-bottom: 8rem !important;">
                                    <i class="fas fa-save icon-save"></i>
                                    Guardar
                                </button>
                            </div>

                        </div>
                </div>
            </form>

        </div>
    </div>


@endsection
@section('select2')
<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js')}}"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('.referencia').select2();
    });

</script>
@endsection
