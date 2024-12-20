@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/container-responsive.css') }}" rel="stylesheet">

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'Exito!!',
                html: 'Se ha actualizado tu  <b>Licencia de Conducir</b>, ' +
                    'Exitosamente',
                // text: 'Se ha agragado la "MARCA" Exitosamente',
                imageUrl: '{{ asset('img/icon/color/dosier.png') }}',
                background: '#fff',
                imageWidth: 150,
                imageHeight: 150,
                imageAlt: 'USUARIO IMG',
            });

        </script>
    @endif

    <div class="row bg-down-image-border" style="min-height: auto!important;">

        <div class="col-2 mt-5">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8 mt-5">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Licencia de conducirs</strong>
            </h5>
        </div>

        <div class="col-2 mt-5">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <p class="text-center" style="color: #00d62e; font: normal normal bold 20px/27px Segoe UI;"><strong>{{$licencia->User->name}}</strong></p>


    </div>
    <style>
        input.form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #fff;
            background-color: transparent !important;
            background-clip: padding-box;
            border: 0px solid #fff;
            text-align: center;
        }

        input.form-control-2 {
            display: block;
            width: 145%;
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #fff;
            background-color: transparent !important;
            background-clip: padding-box;
            border: 0px solid #fff;
            text-align: right;
        }

        input.form-control[type="text"] {
            color: #fff;
        }

        input.form-control[type="date"] {
            color: #fff;
        }

        input.form-control::placeholder {
            color: #dbd8d8;
        }

    </style>

    <div class="container">
        <form method="POST" action="{{ route('update_admin.licencia', $licencia->id) }}" enctype="multipart/form-data"
            role="form">
            @csrf

            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" id="id_user" name="id_user" value="{{ $licencia->id_user }}">
            <div class="row bg-down-image-border">
                <div class="col-6 text-center" style="margin-top: 6rem !important;margin-bottom: 10%;">
                    @if ($licencia->User->img == null)
                        <i class="fas fa-user" style="color: #FFFFFF;font-size: 100px"></i>
                    @else
                        <img class="img-fluid" src="{{ asset('img-perfil/' . $licencia->User->img) }}" width="90px"
                            heigth="90px">
                    @endif
                </div>
                <div class="col-6 text-center" style="margin-top: 6rem !important;">
                    <img class="img-fluid" src="{{ asset('img/licencia/A.png') }}" width="90px" heigth="90px">
                    <p class="text-white mt-3">
                        <strong style="color:#00f936">
                            Licencia No:
                        </strong><br>
                        <input type="text" class="form-control" placeholder="Numero de licencia" id="numero" name="numero"
                            value="{{ $licencia->numero }}">
                    </p>
                </div>

                <div class="col-12 text-center mt-2 mb-5">
                    <h2 class="" style="color:#00f936">{{ $licencia->User->name }}</h2>
                </div>

                <div class="col-12 text-center" style="margin-bottom: 15%;">
                    <div class="row">

                        <div class="col-4">
                            <p class="mb-3" style="color:#00f936">Antiguedad</p>

                            @if ($licencia->permanente == 1)
                                <input class="form-check-input" type="checkbox" value="1" id="permanente" name="permanente"
                                    checked>
                                <label class="form-check-label" style="color:#00f936">
                                    Permanente
                                </label>
                            @elseif($licencia->antiguedad != NULL)
                                <input type="date" class="form-control-2" id="antiguedad" name="antiguedad"
                                    value="{{ $licencia->antiguedad }}">
                            @else
                                <input type="date" class="form-control-2" id="antiguedad" name="antiguedad"
                                    value="{{ $licencia->antiguedad }}">
                                <input class="form-check-input" type="checkbox" value="1" id="permanente" name="permanente">
                                <label class="form-check-label" style="color:#00f936">
                                    Permanente
                                </label>
                            @endif
                        </div>

                        <div class="col-4">
                            <p class="mb-3" style="color:#00f936">Expedicion</p>
                            <input type="date" class="form-control-2" id="expedicion" name="expedicion"
                                value="{{ $licencia->expedicion }}">
                        </div>

                        <div class="col-4">
                            <p class="mb-3" style="color:#00f936">Vigencia</p>
                            <input type="date" class="form-control-2" id="vigencia" name="vigencia"
                                value="{{ $licencia->vigencia }}">
                        </div>

                    </div>
                </div>

                <div class="col-12 text-center">
                    <div class="d-flex justify-content-around">
                        <div class="conten-datos">
                            <p class="mb-3" style="color:#00f936">Nacionalidad</p>
                            <input type="text" class="form-control" placeholder="Nacionalidad" id="nacionalidad"
                                name="nacionalidad" value="{{ $licencia->vigencia }}">
                        </div>

                        <div class="conten-datos">
                            <p class="mb-3" style="color:#00f936">Tipo de sangre</p>
                            <input type="text" class="form-control" placeholder="Tipo de sangre" id="sangre" name="sangre"
                                value="{{ $licencia->sangre }}">
                            <p>
                        </div>

                        <div class="conten-datos">
                            <p class="mb-3" style="color:#00f936">RFC --</p>
                            <input type="text" class="form-control" placeholder="RFC" id="rfc" name="rfc"
                                value="{{ $licencia->rfc }}">
                        </div>

                    </div>
                </div>

                <div class="col-6 text-center mt-5">
                    <p class="mb-3" style="color:#00f936">Tipo de Licencia</p>
                    <select class="form-control" name="tipo" id="tipo">
                        <option value="{{ $licencia->tipo }}">{{ $licencia->tipo }}</option>
                        <option value="Tipo A">Tipo A</option>
                        <option value="Tipo B">Tipo B</option>
                        <option value="Tipo C">Tipo C</option>
                        <option value="Tipo D">Tipo D</option>
                        <option value="Permanente">Permanente</option>
                    </select>
                </div>

                <div class="col-6 text-center mt-5">
                    <p class="mb-3" style="color:#00f936">Entidad de Expedición</p>
                    <select class="form-control" id="entidad" name="entidad">
                        <option value="{{ $licencia->entidad }}" selected>{{ $licencia->entidad }}</option>
                        @include('admin.tarjeta-circulacion.estados')
                    </select>
                </div>

                <div class="col-12 mt-5">
                    <button class="btn btn-lg btn-success btn-save-neon text-white"
                        style="margin-bottom: 15rem !important;">
                        <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                        Guardar
                    </button>
                </div>
            </div>

        </form>
    </div>




@endsection
